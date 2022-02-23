<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Attributes Controller
 *
 * @property \Acp\Model\Table\AttributesTable $Attributes
 *
 * @method \Acp\Model\Entity\Attribute[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttributesController extends AppController
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
        $order = ['Attributes.id' => 'DESC'];

        $this->paginate = [
            'contain' => [],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $attributes = $this->paginate($this->Attributes->find('translations'));

        $this->set(compact('attributes', 'requestQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id Attribute id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $attribute = $this->Attributes->get($id, [
    //         'contain' => ['AttributeCategories', 'Users']
    //     ]);

    //     $this->set('attribute', $attribute);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attribute = $this->Attributes->newEntity();
        if ($this->request->is('post')) {
            $attribute = $this->Attributes->patchEntity($attribute, $this->request->getData());
            $attribute->uuid = Text::uuid();
            $attribute->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $attribute->slug = strtolower(Text::slug($attribute->title));
            if ($this->Attributes->save($attribute)) {
                $this->Flash->success(__d('acp', 'The attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The attribute could not be saved. Please, try again.'));
        }

        $this->set(compact('attribute'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribute id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Attributes->setlocale($getQueryLanguageId);
        }
        
        $attribute = $this->Attributes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attribute = $this->Attributes->patchEntity($attribute, $this->request->getData());
            $attribute->slug = strtolower(Text::slug($attribute->title));
            if ($this->Attributes->save($attribute)) {
                $this->Flash->success(__d('acp', 'The attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The attribute could not be saved. Please, try again.'));
        }
        $this->set(compact('attribute'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribute id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attribute = $this->Attributes->get($id);
        if ($this->Attributes->delete($attribute)) {
            $this->Flash->success(__d('acp', 'The attribute has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The attribute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
