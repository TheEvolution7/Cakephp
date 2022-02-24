<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Items Controller
 *
 * @property \Acp\Model\Table\ItemsTable $Items
 *
 * @method \Acp\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
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
        
        $conditions = $this->request->getQuery();
        $order = ['Items.sort' => 'ASC','Items.id' => 'DESC'];

        $this->paginate = [
            'contain' => [],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $items = $this->paginate($this->Items->find());

        $this->set(compact('items', 'requestQuery'));
    }

    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {

            $item = $this->Items->patchEntity($item, $this->request->getData());
            $item->uuid = Text::uuid();
            $item->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $item->slug = strtolower(Text::slug($item->title));

            if ($this->Items->save($item)) {

                $uploadPath = 'uploads' . DS . 'items'. DS . $item->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($item->uuid,$item->id,$uploadPath));
                }

                $item = $this->Items->get($item->id, [
		            'contain' => ['ItemCategories']
		        ]);

		        $this->Flash->set(__d('acp', 'The item has been saved.'),['element' => 'fly_success']);
                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'item_category_id' => $item->item_category->id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The item could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        $itemCategories = $this->Items->ItemCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Items->Users->find('list', ['limit' => 200]);
        $this->set(compact('item', 'itemCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Items->setlocale($getQueryLanguageId);
        }
        
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            $item->slug = strtolower(Text::slug($item->title));
            if ($this->Items->save($item)) {
                $this->Flash->set(__d('acp', 'The item has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'product_id' => $item->product_id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The item could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $users = $this->Items->Users->find('list', ['limit' => 200]);
        $products = $this->Items->Products->find('list', ['limit' => 200]);
        $orders = $this->Items->Orders->find('list', ['limit' => 200]);
        $this->set(compact('item', 'users', 'products', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->set(__d('acp', 'The item has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The item could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
