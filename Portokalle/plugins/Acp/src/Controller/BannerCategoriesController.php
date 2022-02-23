<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;

/**
 * BannerCategories Controller
 *
 * @property \Acp\Model\Table\BannerCategoriesTable $BannerCategories
 *
 * @method \Acp\Model\Entity\BannerCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BannerCategoriesController extends AppController
{

    public function test(){
        $this->autoRender = false;
        // $category = $this->BannerCategories->get(65, ['contain' => 'Banners']);
        // $categories = $this->BannerCategories
        //     ->find('children', ['for' => 65])
        //     ->contain(['Banners'])
        //     ->toArray();

        // $data['title'] = 'Internist';
        // $data['slug'] = strtolower(Text::slug('Internist'));
        // $data['image'] = $category->image;
        // $data['description'] = $category->description;
        // $data['sort'] = $category->sort;
        // $data['url'] = $category->url;
        // $data['status'] = 1;

        // foreach ($category->banners as $key => $value) {
        //     $data['banners'][$key]['title'] = $value->title;
        //     $data['banners'][$key]['slug'] = strtolower(Text::slug($value->title));
        //     $data['banners'][$key]['image'] = $value->image;
        //     $data['banners'][$key]['description'] = $value->description;
        //     $data['banners'][$key]['content'] = $value->content;
        //     $data['banners'][$key]['sort'] = $value->sort;
        //     $data['banners'][$key]['url'] = $value->url;
        //     $data['banners'][$key]['status'] = 1;
        // }

        // $bannerCategories = TableRegistry::getTableLocator()->get('Acp.BannerCategories');
        // $entity = $bannerCategories->newEntity($data);
        // if ($bannerCategories->save($entity)) {

        //     $data = null;
        //     $listOld = [];
        //     foreach ($categories as $key => $value) {
        //         $data[$key]['title'] = $value->title;
        //         $data[$key]['parent_id'] = $entity->id;
        //         $data[$key]['slug'] = strtolower(Text::slug($value->title));
        //         $data[$key]['image'] = $value->image;
        //         $data[$key]['description'] = $value->description;
        //         $data[$key]['sort'] = $value->sort;
        //         $data[$key]['url'] = $value->url;
        //         $data[$key]['status'] = 1;
        //         foreach ($value->banners as $k => $banner) {
        //             $data[$key]['banners'][$k]['title'] = $banner->title;
        //             $data[$key]['banners'][$k]['slug'] = strtolower(Text::slug($banner->title));
        //             $data[$key]['banners'][$k]['image'] = $banner->image;
        //             $data[$key]['banners'][$k]['description'] = $banner->description;
        //             $data[$key]['banners'][$k]['content'] = $banner->content;
        //             $data[$key]['banners'][$k]['sort'] = $banner->sort;
        //             $data[$key]['banners'][$k]['url'] = $banner->url;
        //             $data[$key]['banners'][$k]['status'] = 1;
        //             $listOld[$key][$k] = $banner->id;
        //         }
        //     }
        //     $bannerCategories = TableRegistry::getTableLocator()->get('Acp.BannerCategories');
        //     $entities = $bannerCategories->newEntities($data);

        //     if ($bannerCategories->saveMany($entities)) {
        //         foreach ($entities as $key => $e) {
        //             foreach ($e->banners as $k => $value) {
        //                 $dir = new Folder(WWW_ROOT . DS .'uploads' . DS .'banners' . DS . $listOld[$key][$k] . DS);
        //                 $dir->copy(WWW_ROOT . DS .'uploads' . DS .'banners' . DS . $value->id . DS);
        //             }
        //         }
        //     }
        // }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $requestQuery = $this->request->getQuery();

        $conditions = [];
        if (!empty($requestQuery['keyword'])) {
            $conditions['BannerCategories_title_translation.content like'] = '%' . $requestQuery['keyword'] . '%';
        }
        if (!empty($requestQuery['parent_banner_category'])) {
            $conditions['BannerCategories.parent_id'] = $requestQuery['parent_banner_category'];
        }

        $bannerCategories_id = $this->BannerCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );

        $this->paginate = [
            'contain' => ['ParentBannerCategories'],
            'conditions' => $conditions
        ];
        $bannerCategories = $this->paginate($this->BannerCategories->find('translations'));
        $this->set(compact('bannerCategories','bannerCategories_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Banner Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    
    public function view($id = null)
    {
        $bannerCategory = $this->BannerCategories->get($id, [
            'contain' => ['ParentBannerCategories', 'ChildBannerCategories', 'Banners']
        ]);

        $this->set('bannerCategory', $bannerCategory);
    }
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bannerCategory = $this->BannerCategories->newEntity();
        if ($this->request->is('post')) {
            $bannerCategory = $this->BannerCategories->patchEntity($bannerCategory, $this->request->getData());
            $bannerCategory->uuid = Text::uuid();
            $bannerCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $bannerCategory->slug = strtolower(Text::slug($bannerCategory->title));
            if ($this->BannerCategories->save($bannerCategory)) {
                $uploadPath = 'uploads' . DS . 'banner_categories'. DS . $bannerCategory->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($bannerCategory->uuid,$bannerCategory->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The banner category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The banner category could not be saved. Please, try again.'));
        }
        
        $parentBannerCategories = $this->BannerCategories->ParentBannerCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('bannerCategory', 'parentBannerCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Banner Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->BannerCategories->setlocale($getQueryLanguageId);
        }

        $bannerCategory = $this->BannerCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bannerCategory = $this->BannerCategories->patchEntity($bannerCategory, $this->request->getData());
            $bannerCategory->slug = strtolower(Text::slug($bannerCategory->title));
            if ($this->BannerCategories->save($bannerCategory)) {
                $this->Flash->success(__d('acp', 'The banner category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The banner category could not be saved. Please, try again.'));
        }
        
        $parentBannerCategories = $this->BannerCategories->ParentBannerCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('bannerCategory', 'parentBannerCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Banner Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bannerCategory = $this->BannerCategories->get($id);
        if ($this->BannerCategories->delete($bannerCategory)) {
            $this->Flash->warning(__d('acp', 'The banner category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The banner category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
