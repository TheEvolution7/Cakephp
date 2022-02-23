<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * ProductCategories Controller
 *
 * @property \Acp\Model\Table\ProductCategoriesTable $ProductCategories
 *
 * @method \Acp\Model\Entity\ProductCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentProductCategories'],
            'limit' => 5,
            'order' => ['ProductCategories.id' => 'DESC']
        ];
        
        $productCategories_id = $this->ProductCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );
        $this->paginate = [
            'contain' => ['ParentProductCategories'],
            'order' => ['ProductCategories.lft' => 'ASC']
        ];
        $productCategories = $this->paginate($this->ProductCategories->find('translations',['order' => ['ProductCategories.lft' => 'ASC']]));
        $this->set(compact('productCategories','productCategories_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $productCategory = $this->ProductCategories->get($id, [
    //         'contain' => ['ParentProductCategories', 'ChildProductCategories', 'Products']
    //     ]);

    //     $this->set('productCategory', $productCategory);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productCategory = $this->ProductCategories->newEntity();
        if ($this->request->is('post')) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            $productCategory->uuid = Text::uuid();
            $productCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $productCategory->slug = strtolower(Text::slug($productCategory->title));
            if ($this->ProductCategories->save($productCategory)) {
                $uploadPath = 'uploads' . DS . 'product_categories'. DS . $productCategory->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($productCategory->uuid,$productCategory->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The product category could not be saved. Please, try again.'));
        }
        $parentProductCategories = $this->ProductCategories->ParentProductCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('productCategory', 'parentProductCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->productCategory->setlocale($getQueryLanguageId);
        }
        
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            $productCategory->slug = strtolower(Text::slug($productCategory->title));
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__d('acp', 'The product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The product category could not be saved. Please, try again.'));
        }
        $parentProductCategories = $this->ProductCategories->ParentProductCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('productCategory', 'parentProductCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productCategory = $this->ProductCategories->get($id);
        if ($this->ProductCategories->delete($productCategory)) {
            $this->Flash->success(__d('acp', 'The product category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function sort($id = null)
    {
        $productCategory = $this->ProductCategories->find('threaded')->toArray();
        $this->set(compact('productCategory'));
    }
}
