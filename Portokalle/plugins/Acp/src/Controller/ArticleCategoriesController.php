<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * ArticleCategories Controller
 *
 * @property \Acp\Model\Table\ArticleCategoriesTable $ArticleCategories
 *
 * @method \Acp\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticleCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentArticleCategories'],
            'limit' => 5,
            'order' => ['ArticleCategories.id' => 'DESC']
        ];
        
        $articleCategories_id = $this->ArticleCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );
        $this->paginate = [
            'contain' => ['ParentArticleCategories'],
            'order' => ['ArticleCategories.lft' => 'ASC']
        ];
        $articleCategories = $this->paginate($this->ArticleCategories->find('translations',['order' => ['ArticleCategories.lft' => 'ASC']]));
        $this->set(compact('articleCategories','articleCategories_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $articleCategory = $this->ArticleCategories->get($id, [
    //         'contain' => ['ParentArticleCategories', 'ChildArticleCategories', 'Articles']
    //     ]);

    //     $this->set('articleCategory', $articleCategory);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articleCategory = $this->ArticleCategories->newEntity();
        if ($this->request->is('post')) {
            $articleCategory = $this->ArticleCategories->patchEntity($articleCategory, $this->request->getData());
            $articleCategory->uuid = Text::uuid();
            $articleCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $articleCategory->slug = strtolower(Text::slug($articleCategory->title));
            if ($this->ArticleCategories->save($articleCategory)) {
                $uploadPath = 'uploads' . DS . 'article_categories'. DS . $articleCategory->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($articleCategory->uuid,$articleCategory->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The article category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The article category could not be saved. Please, try again.'));
        }
        $parentArticleCategories = $this->ArticleCategories->ParentArticleCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('articleCategory', 'parentArticleCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->articleCategory->setlocale($getQueryLanguageId);
        }
        
        $articleCategory = $this->ArticleCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleCategory = $this->ArticleCategories->patchEntity($articleCategory, $this->request->getData());
            $articleCategory->slug = strtolower(Text::slug($articleCategory->title));
            if ($this->ArticleCategories->save($articleCategory)) {
                $this->Flash->success(__d('acp', 'The article category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The article category could not be saved. Please, try again.'));
        }
        $parentArticleCategories = $this->ArticleCategories->ParentArticleCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('articleCategory', 'parentArticleCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articleCategory = $this->ArticleCategories->get($id);
        if ($this->ArticleCategories->delete($articleCategory)) {
            $this->Flash->success(__d('acp', 'The article category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The article category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function sort($id = null)
    {
        $articleCategory = $this->ArticleCategories->find('threaded')->toArray();
        $this->set(compact('articleCategory'));
    }
}
