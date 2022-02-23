<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Records Controller
 *
 * @property \Acp\Model\Table\RecordsTable $Records
 *
 * @method \Acp\Model\Entity\Record[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecordsController extends AppController
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
        $order = ['Records.sort' => 'ASC','Records.id' => 'DESC'];

        if (!empty($requestQuery['keyword'])) {
            $conditions['Records_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';

        }
        if (!empty($requestQuery['record_category_id'])) {
            $recordCategory = $this->Records->RecordCategories->get($requestQuery['record_category_id'], [
                'contain' => []
            ]);
            if (!empty($recordCategory)) {
                $conditions['RecordCategories.lft >='] = $recordCategory->lft;
                $conditions['RecordCategories.rght <='] = $recordCategory->rght;
            }
        }

        if (!empty($requestQuery['user_id'])) {
            $conditions['Records.patient_id'] = $requestQuery['patient_id'];
        }

        if (!empty($requestQuery['doctor_id'])) {
            $conditions['Records.user_id'] = $requestQuery['doctor_id'];
        }

        $this->paginate = [
            'contain' => ['RecordCategories', 'Users', 'Patients'],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $records = $this->paginate($this->Records->find());
        
        $recordCategories = $this->Records->RecordCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('records', 'requestQuery', 'recordCategories'));
    }

    public function view($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Records->setlocale($getQueryLanguageId);
        }
        
        $record = $this->Records->get($id, [
            'contain' => ['RecordCategories']
        ]);
        
        $users = $this->Records->Users->find('list', ['limit' => 200]);
        $this->set(compact('record', 'recordCategories', 'users'));
    }

    public function add()
    {
        $record = $this->Records->newEntity();
        if ($this->request->is('post')) {

            $record = $this->Records->patchEntity($record, $this->request->getData());
            $record->uuid = Text::uuid();
            $record->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $record->slug = strtolower(Text::slug($record->title));

            if ($this->Records->save($record)) {

                $uploadPath = 'uploads' . DS . 'records'. DS . $record->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($record->uuid,$record->id,$uploadPath));
                }

                $record = $this->Records->get($record->id, [
		            'contain' => ['RecordCategories']
		        ]);

		        $this->Flash->set(__d('acp', 'The record has been saved.'),['element' => 'fly_success']);
                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'record_category_id' => $record->record_category->id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The record could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        $recordCategories = $this->Records->RecordCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Records->Users->find('list', ['limit' => 200]);
        $this->set(compact('record', 'recordCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Records->setlocale($getQueryLanguageId);
        }
        
        $record = $this->Records->get($id, [
            'contain' => ['RecordCategories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $record = $this->Records->patchEntity($record, $this->request->getData());
            $record->slug = strtolower(Text::slug($record->title));
            if ($this->Records->save($record)) {
                $this->Flash->set(__d('acp', 'The record has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'record_category_id' => $record->record_category->id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The record could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        $recordCategories = $this->Records->RecordCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Records->Users->find('list', ['limit' => 200]);
        $this->set(compact('record', 'recordCategories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $record = $this->Records->get($id);
        if ($this->Records->delete($record)) {
            $this->Flash->set(__d('acp', 'The record has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The record could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
