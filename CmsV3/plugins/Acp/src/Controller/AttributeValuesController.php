<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * AttributeValues Controller
 *
 * @property \Acp\Model\Table\AttributeValuesTable $AttributeValues
 *
 * @method \Acp\Model\Entity\AttributeValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttributeValuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        $requestQuery = $this->request->getQuery();
        $limit = !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10;
        
        $conditions = ['AttributeValues.attribute_id' => $id];
        $order = ['AttributeValues.id' => 'DESC'];

        $this->paginate = [
            'contain' => [],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $attribute_values = $this->paginate($this->AttributeValues->find('translations'));
        $id_attribute = $id;
        $this->set(compact('attribute_values', 'requestQuery','id_attribute'));
    }

    /**
     * View method
     *
     * @param string|null $id AttributeValue id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $attribute_value = $this->AttributeValues->get($id, [
    //         'contain' => ['AttributeValueCategories', 'Users']
    //     ]);

    //     $this->set('attribute_value', $attribute_value);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $attribute_value = $this->AttributeValues->newEntity();
        if ($this->request->is('post')) {
            $attribute_value = $this->AttributeValues->patchEntity($attribute_value, $this->request->getData());
            $attribute_value->uuid = Text::uuid();
            $attribute_value->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $attribute_value->attribute_id = $id;
            $attribute_value->slug = strtolower(Text::slug($attribute_value->title));
            if ($this->AttributeValues->save($attribute_value)) {
                $uploadPath = 'uploads' . DS . 'attribute_values'. DS . $attribute_value->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($attribute_value->uuid,$attribute_value->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The attribute_value has been saved.'));

                return $this->redirect(['action' => 'index',$id]);
            }
            $this->Flash->error(__d('acp', 'The attribute_value could not be saved. Please, try again.'));
        }

        $this->set(compact('attribute_value'));
    }

    /**
     * Edit method
     *
     * @param string|null $id AttributeValue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->AttributeValues->setlocale($getQueryLanguageId);
        }
        
        $attribute_value = $this->AttributeValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attribute_value = $this->AttributeValues->patchEntity($attribute_value, $this->request->getData());
            $attribute_value->slug = strtolower(Text::slug($attribute_value->title));
            if ($this->AttributeValues->save($attribute_value)) {
                $this->Flash->success(__d('acp', 'The attribute_value has been saved.'));

                return $this->redirect(['action' => 'index',$attribute_value->attribute_id]);
            }
            $this->Flash->error(__d('acp', 'The attribute_value could not be saved. Please, try again.'));
        }
        $this->set(compact('attribute_value'));
    }

    /**
     * Delete method
     *
     * @param string|null $id AttributeValue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attribute_value = $this->AttributeValues->get($id);
        if ($this->AttributeValues->delete($attribute_value)) {
            $this->Flash->success(__d('acp', 'The attribute_value has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The attribute_value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
