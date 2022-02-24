<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
/**
 * Articles Controller
 *
 * @property \Acp\Model\Table\ArticlesTable $Articles
 *
 * @method \Acp\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $requestQuery = $this->request->getQuery();

        $limit = !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10;
        
        $conditions_article = [];
        $conditions_article_category = [];
        if (!empty($requestQuery['keyword'])) {
            $conditions_article['Articles_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';
        }

        if (!empty($requestQuery['article_category_id'])) {
            $articleCategory = $this->Articles->ArticleCategories->get($requestQuery['article_category_id'], [
                'contain' => []
            ]);

            if (!empty($articleCategory)) {
                $conditions_article_category['ArticleCategories.lft >='] = $articleCategory->lft;
                $conditions_article_category['ArticleCategories.rght <='] = $articleCategory->rght;
            }
        }

        $listArticles = $this->Articles
            ->find('list')
            ->where($conditions_article)
            ->matching('ArticleCategories', function ($q) use ($conditions_article_category){
                return $q->where($conditions_article_category);
            })
            ->toArray();
        $this->paginate = [
            'order' => ['Articles.id' => 'DESC'],
            'maxLimit' => $limit
        ];
        
        $query = $this->Articles
            ->find('translations')
            ->contain(['ArticleCategories']);

        if ($listArticles) {
           $query = $this->Articles
                ->find('translations')
                ->where(['Articles.id IN' => array_keys($listArticles)])
                ->contain(['ArticleCategories']);
        }

        $articles = $this->paginate($query)->toArray();

        $articleCategories = $this->Articles->ArticleCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('articles', 'requestQuery','articleCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $article = $this->Articles->get($id, [
    //         'contain' => ['ArticleCategories', 'Users']
    //     ]);

    //     $this->set('article', $article);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();

        if ($this->request->is('post')) {
            unset($this->request->data['image_list']);
            unset($this->request->data['image_fix']);
            unset($this->request->data['images_delete']);

            if ($this->request->getData('tags')) {
                $decode = json_decode($this->request->getData('tags'),true);
                $changeTags = [];
                foreach ($decode as $value) {
                    foreach ($value as $k => $v) {
                        $changeTags[] = $v;
                    }
                }
                $listTags = [];
                foreach ($changeTags as $key => $value) {
                    if (!empty($value)) {
                        $listTags[$key]['title'] = $value;
                        $listTags[$key]['slug'] = strtolower(Text::slug($value));      
                    }
                }

                $data_tag = [];
                foreach ($listTags as $key => $tag) {
                    $chooseTag = $this->Articles->Tags->find()->where(['Tags_slug_translation.content' => $tag['slug'], 'type' => $this->name])->first();

                    if (!empty($chooseTag)) {
                        $data_tag[$key]['id'] = $chooseTag->id;
                    }else{
                        $data_tag[$key]['title'] = $tag['title'];
                        $data_tag[$key]['type'] = $this->name;
                        $data_tag[$key]['slug'] = $tag['slug'];
                    }
                }

                $this->request->data['tags'] = $data_tag;
            }
            $article = $this->Articles->patchEntity($article, $this->request->getData(), [
                'associated' => ['Tags','ArticleCategories']
            ]);
            
            $article->uuid = Text::uuid();
            $article->user_id = $this->getRequest()->getSession()->read('Auth.User.id');

            if ($this->request->getData('slug') == '') {
                $article->slug = strtolower(Text::slug($article->title));
            }

			

            if ($this->Articles->save($article)) {
                $uploadPath = 'uploads' . DS . 'articles'. DS . '0' .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace('0',$article->id,$uploadPath));
                }

                $articlesTable = TableRegistry::getTableLocator()->get('Articles');
                $art = $articlesTable->get($article->id, ['contain' => ['ArticleCategories']]);
                $art->image = $this->request->data['image'];
                
                $articlesTable->save($art);

                $this->Flash->success(__d('acp', 'The article has been saved.'));

                return $this->redirect([
                    'action' => 'index',
                    '?' => [
                        'article_category_id' => $art->article_categories[0]->id
                    ]
                ]);
            }
            $this->Flash->error(__d('acp', 'The article could not be saved. Please, try again.'));
        }

        //$articles = $this->Article->Tags->find('list');

        $articleCategories = $this->Articles->ArticleCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'articleCategories', 'users','articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function reorderImage($id = null)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is('post','ajax')) {

            $images = explode('|', $article->images);
            unset($images[count($images) - 1]);
            $imagesT = [];
            if (!empty($this->request->getData('imageIds'))) {
                foreach ($this->request->getData('imageIds') as $k => $ids) {
                    $imagesT[$k] = $images[$ids];
                }
            }
            foreach ($imagesT as $key => $image) {
                $images[$key] = $image;
            }
            $images[] = '';
            $article->images = implode('|', $images);

            if ($this->Articles->save($article)) {
                $result['status'] = 1;
            }else{
                $result['status'] = 0;
            }
            $this->response->body(json_encode($result));
            return $this->response;
        }
        $this->set(compact('article'));
    }
    
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Articles->setlocale($getQueryLanguageId);
        }
        
        $article = $this->Articles->get($id, [
            'contain' => ['Tags','ArticleCategories']
        ]);
        $old_pdf = $article->pdf;
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->request->getData('tags')) {
                $decode = json_decode($this->request->getData('tags'),true);
                $changeTags = [];
                foreach ($decode as $value) {
                    foreach ($value as $k => $v) {
                        $changeTags[] = $v;
                    }
                }
                $listTags = [];
                foreach ($changeTags as $key => $value) {
                    if (!empty($value)) {
                        $listTags[$key]['title'] = $value;
                        $listTags[$key]['slug'] = strtolower(Text::slug($value));      
                    }
                }

                $data_tag = [];
                foreach ($listTags as $key => $tag) {
                    $chooseTag = $this->Articles->Tags->find()->where(['Tags_slug_translation.content' => $tag['slug'], 'type' => $this->name])->first();

                    if (!empty($chooseTag)) {
                        $data_tag[$key]['id'] = $chooseTag->id;
                    }else{
                        $data_tag[$key]['title'] = $tag['title'];
                        $data_tag[$key]['type'] = $this->name;
                        $data_tag[$key]['slug'] = $tag['slug'];
                    }
                }

                $this->request->data['tags'] = $data_tag;
            }

            $article = $this->Articles->patchEntity($article, $this->request->getData(), [
                'associated' => ['Tags','ArticleCategories']
            ]);
            if ($this->request->getData('slug') == '') {
                $article->slug = strtolower(Text::slug($article->title));
            }

            $pdf = $_FILES['pdf']['name'];
            if (!empty($pdf)) {
            	$dir = new Folder(WWW_ROOT . DS .'uploads/pdf/' . DS . $article->id . DS);
            	if ($dir) {
            		$dir = new Folder(WWW_ROOT . DS .'uploads/pdf/' . DS . $article->id . DS, true, 0755);
            	}
            	$target_dir = WWW_ROOT . DS .'uploads/pdf/' . DS . $article->id . DS;
				$target_file = $target_dir . basename($_FILES['pdf']['name']);
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				move_uploaded_file($_FILES['pdf']['tmp_name'], $target_dir . $article->slug . '.' . $imageFileType);
				$article->pdf = $article->slug . '.' . $imageFileType;
            }else{
            	$article->pdf = $old_pdf;
            }

            if (empty($pdf) && $this->request->getData('remove-pdf') == true) {
            	$article->pdf = '';
            	$dir = new Folder(WWW_ROOT . DS .'uploads/pdf/' . DS . $article->id . DS);
            	$dir->delete();
            }

            if ($this->Articles->save($article)) {
                $articlesTable = TableRegistry::getTableLocator()->get('Articles');
                $art = $articlesTable->get($article->id);
                $art->image = $this->request->data['image'];
                $articlesTable->save($art);

                // if (empty($article->images)) {
                //     $dir = new Folder(WWW_ROOT . DS .'uploads/articles/' . DS . $article->id . DS);
                //     $dir->delete();
                // }
                
                $this->Flash->success(__d('acp', 'The article has been saved.'));

                return $this->redirect([
                    'action' => 'index',
                    '?' => [
                        'article_category_id' => $article->article_categories[0]->id
                    ]
                ]);
            }
            $this->Flash->error(__d('acp', 'The article could not be saved. Please, try again.'));
        }

        $arr = [];
        foreach ($article->tags as $tag) {
            $arr[$tag->title] = $tag->title;
        }
        $tags = implode(',',$arr);

        $articleCategories = $this->Articles->ArticleCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'articleCategories', 'users', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__d('acp', 'The article has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function exportExcel() {
        header('Content-type: application/excel;charset=UTF-8');
        $filename = 'export_articles_' . time() . '.xls';
        header('Content-Disposition: attachment; filename='.$filename);
        
        $data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
        <head>
            <!--[if gte mso 9]>
            <xml>
                <x:ExcelWorkbook>
                    <x:ExcelWorksheets>
                        <x:ExcelWorksheet>
                            <x:Name>Customers</x:Name>
                            <x:WorksheetOptions>
                                <x:Print>
                                    <x:ValidPrinterInfo/>
                                </x:Print>
                            </x:WorksheetOptions>
                        </x:ExcelWorksheet>
                    </x:ExcelWorksheets>
                </x:ExcelWorkbook>
            </xml>
            <![endif]-->
        </head>
        
        <body>';
        
        $articles = $this->Articles->find()->contain(['ArticleCategories'])->toArray();
        $data = '
        
        
        <table style="border:1px solid #ccc;" >
                    <tr style="background:#ccc;">
                        <th>#</th>
                        <th>Title</th>
                        <th>Categories</th>
                        <th>Image</th>
                        <th>Images</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Pdf</th>
                        <th>Status</th>
                        <th>Sort</th>
                        <th>Modified</th>
                        <th>Created</th>
                    </tr>';
                $i = 1;
                foreach($articles as $article)
                {
                    $images = null;
                    foreach (explode('|', $article->images) as $img) {
                        $images[] = Router::url('/uploads/articles/' . $article->id . DS . $img, true);
                    }
                    $category = null;
                    foreach ($article->article_categories as $cat) {
                        $category[] = $cat->title;
                    }
                    if (!empty($images)) {
                        unset($images[count($images) - 1]);
                        $images = implode('|', $images);
                    }
                    if (!empty($category)) {
                        $category = implode('|', $category);
                    }
                    $pdf = '';
                    if ($article->pdf != '') {
                        $pdf = Router::url('/uploads/pdf/' . $article->id . DS . $article->pdf, true);
                    }
                    $image = '';
                    if ($article->image != '') {
                        $image = Router::url('/uploads/image/' . $article->id . DS . $article->image, true);
                    }
                    $data .=    '
                    <tr>
                        <td>'. $i .'</td>
                        <td>'. $article->title . '</td>
                        <td>'. $category . '</td>
                        <td>'. $image . '</td>
                        <td>'. $images . '</td>
                        <td>'. h($article->description) . '</td>
                        <td>'. '' . '</td>
                        <td>'. $pdf . '</td>
                        <td>'. $article->status . '</td>
                        <td>'. $article->sort . '</td>
                        <td>'. $article->modified . '</td>
                        <td>'. $article->created . '</td>
                    </tr>';
                $i++;
                }
                $data .= '
            </table>';
        
        $data .= '</body></html>';
        //mb_convert_encoding($data, 'UTF-16LE', 'UTF-8');
        echo $data;
        $this->autoRender = false;
    }
}
