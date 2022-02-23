<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Brands Controller
 *
 * @property \Acp\Model\Table\BrandsTable $Brands
 *
 * @method \Acp\Model\Entity\ProductCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BrandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentBrands'],
            'limit' => 5,
            'order' => ['Brands.id' => 'DESC']
        ];
        
        $brands_id = $this->Brands->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );
        $this->paginate = [
            'contain' => ['ParentBrands'],
            'order' => ['Brands.lft' => 'ASC']
        ];
        $brands = $this->paginate($this->Brands->find('translations',['order' => ['Brands.lft' => 'ASC']]));
        $this->set(compact('brands','brands_id'));
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
    //     $brand = $this->Brands->get($id, [
    //         'contain' => ['ParentBrands', 'ChildBrands', 'Products']
    //     ]);

    //     $this->set('brand', $brand);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brand = $this->Brands->newEntity();
        if ($this->request->is('post')) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
            $brand->uuid = Text::uuid();
            $brand->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $brand->slug = strtolower(Text::slug($brand->title));
            if ($this->Brands->save($brand)) {
                $uploadPath = 'uploads' . DS . 'brands'. DS . $brand->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($brand->uuid,$brand->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The brand category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The brand category could not be saved. Please, try again.'));
        }
        $parentBrands = $this->Brands->ParentBrands->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('brand', 'parentBrands'));
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
            $this->brand->setlocale($getQueryLanguageId);
        }
        
        $brand = $this->Brands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
            $brand->slug = strtolower(Text::slug($brand->title));
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__d('acp', 'The brand category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The brand category could not be saved. Please, try again.'));
        }
        $parentBrands = $this->Brands->ParentBrands->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('brand', 'parentBrands'));
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
        $brand = $this->Brands->get($id);
        if ($this->Brands->delete($brand)) {
            $this->Flash->success(__d('acp', 'The brand category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The brand category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function sort($id = null)
    {
        $brand = $this->Brands->find('threaded')->toArray();
        $this->set(compact('brand'));
    }
}
