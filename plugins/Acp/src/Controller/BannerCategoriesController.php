<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * BannerCategories Controller
 *
 * @property \Acp\Model\Table\BannerCategoriesTable $BannerCategories
 *
 * @method \Acp\Model\Entity\BannerCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BannerCategoriesController extends AppController
{

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
