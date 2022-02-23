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
class MedicalRequestsController extends AppController
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
        $order = ['MedicalRequests.sort' => 'ASC','MedicalRequests.id' => 'DESC'];

        $this->paginate = [
            'contain' => ['Users', 'Doctors', 'Patients', 'Records'],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $medical_requests = $this->paginate($this->MedicalRequests);
        
        $this->set(compact('medical_requests', 'requestQuery'));
    }

    public function view($id = null)
    {
        $medical_request = $this->MedicalRequests->get($id, [
            'contain' => ['Users', 'Doctors', 'Patients', 'Records']
        ]);
        
        $this->set(compact('medical_request', 'users'));
    }

    public function add()
    {
        $medical_request = $this->Records->newEntity();
        if ($this->request->is('post')) {

            $medical_request = $this->Records->patchEntity($medical_request, $this->request->getData());
            $medical_request->uuid = Text::uuid();
            $medical_request->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $medical_request->slug = strtolower(Text::slug($medical_request->title));

            if ($this->Records->save($medical_request)) {

                $uploadPath = 'uploads' . DS . 'records'. DS . $medical_request->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($medical_request->uuid,$medical_request->id,$uploadPath));
                }

                $medical_request = $this->Records->get($medical_request->id, [
		            'contain' => ['RecordCategories']
		        ]);

		        $this->Flash->set(__d('acp', 'The medical_request has been saved.'),['element' => 'fly_success']);
                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'record_category_id' => $medical_request->record_category->id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The medical_request could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        $recordCategories = $this->Records->RecordCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Records->Users->find('list', ['limit' => 200]);
        $this->set(compact('medical_request', 'recordCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When medical_request not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->MedicalRequests->setlocale($getQueryLanguageId);
        }
        
        $medical_request = $this->MedicalRequests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medical_request = $this->MedicalRequests->patchEntity($medical_request, $this->request->getData());
            $medical_request->slug = strtolower(Text::slug($medical_request->title));
            if ($this->MedicalRequests->save($medical_request)) {
                $this->Flash->set(__d('acp', 'The medical_request has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'record_category_id' => $medical_request->record_category->id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The medical_request could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        $users = $this->MedicalRequests->Users->find('list', ['limit' => 200]);
        $this->set(compact('medical_request', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id MedicalRequest id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When medical_request not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medical_request = $this->Records->get($id);
        if ($this->Records->delete($medical_request)) {
            $this->Flash->set(__d('acp', 'The medical_request has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The medical_request could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
