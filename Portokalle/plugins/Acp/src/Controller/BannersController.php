<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Banners Controller
 *
 * @property \Acp\Model\Table\BannersTable $Banners
 *
 * @method \Acp\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BannersController extends AppController
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
        
        $conditions = [];
        $order = ['Banners.sort' => 'ASC','Banners.id' => 'DESC'];

        if (!empty($requestQuery['keyword'])) {
            $conditions['Banners_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';

        }
        if (!empty($requestQuery['banner_category_id'])) {
            $bannerCategory = $this->Banners->BannerCategories->get($requestQuery['banner_category_id'], [
                'contain' => []
            ]);
            if (!empty($bannerCategory)) {
                $conditions['BannerCategories.lft >='] = $bannerCategory->lft;
                $conditions['BannerCategories.rght <='] = $bannerCategory->rght;
            }
        }
        $this->paginate = [
            'contain' => ['BannerCategories', 'Users'],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $banners = $this->paginate($this->Banners->find('translations'));

        $bannerCategories = $this->Banners->BannerCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--']
        );

        $this->set(compact('banners', 'requestQuery', 'bannerCategories'));
    }

    public function add()
    {
        $banner = $this->Banners->newEntity();
        if ($this->request->is('post')) {

            $banner = $this->Banners->patchEntity($banner, $this->request->getData());
            $banner->uuid = Text::uuid();
            $banner->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $banner->slug = strtolower(Text::slug($banner->title));

            if ($this->Banners->save($banner)) {

                $uploadPath = 'uploads' . DS . 'banners'. DS . $banner->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($banner->uuid,$banner->id,$uploadPath));
                }

                $banner = $this->Banners->get($banner->id, [
		            'contain' => ['BannerCategories']
		        ]);

		        $this->Flash->set(__d('acp', 'The banner has been saved.'),['element' => 'fly_success']);
                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'banner_category_id' => $banner->banner_category->id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The banner could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        $bannerCategories = $this->Banners->BannerCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Banners->Users->find('list', ['limit' => 200]);
        $this->set(compact('banner', 'bannerCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Banner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Banners->setlocale($getQueryLanguageId);
        }
        
        $banner = $this->Banners->get($id, [
            'contain' => ['BannerCategories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banner = $this->Banners->patchEntity($banner, $this->request->getData());
            $banner->slug = strtolower(Text::slug($banner->title));
            if ($this->Banners->save($banner)) {
                $this->Flash->set(__d('acp', 'The banner has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'banner_category_id' => $banner->banner_category->id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The banner could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        $bannerCategories = $this->Banners->BannerCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Banners->Users->find('list', ['limit' => 200]);
        $this->set(compact('banner', 'bannerCategories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Banner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        if ($this->Banners->delete($banner)) {
            $this->Flash->set(__d('acp', 'The banner has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The banner could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
