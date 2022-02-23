<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Patients Controller
 *
 * @property \Acp\Model\Table\PatientsTable $Patients
 *
 * @method \Acp\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PatientsController extends AppController
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
        $order = ['Patients.sort' => 'ASC','Patients.id' => 'DESC'];

        if (!empty($requestQuery['keyword'])) {
            $conditions['Patients_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';

        }
        
        if (!empty($requestQuery['user_id'])) {
            $conditions['Appointments.patient_id'] = $requestQuery['user_id'];
        }

        if (!empty($requestQuery['doctor_id'])) {
            $conditions['Appointments.practitioner_id'] = $requestQuery['doctor_id'];
        }

        $this->paginate = [
            'contain' => ['Users'],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];

        $query = $this->Patients
            ->find()
            ->innerJoinWith('Appointments');
            
        $query->formatResults(function (\Cake\Collection\CollectionInterface $results) {
            return $results->map(function ($row) {
                $row['age'] = $row['date_of_birth']->diff(new \DateTime)->y;
                return $row;
            });
        });

        $patients = $this->paginate($query);
        $this->set(compact('patients', 'requestQuery'));
    }

    public function add()
    {
        $patient = $this->Patients->newEntity();
        if ($this->request->is('post')) {

            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            $patient->uuid = Text::uuid();
            $patient->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $patient->slug = strtolower(Text::slug($patient->title));

            if ($this->Patients->save($patient)) {

                $uploadPath = 'uploads' . DS . 'patients'. DS . $patient->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($patient->uuid,$patient->id,$uploadPath));
                }

                $patient = $this->Patients->get($patient->id, [
		            'contain' => ['PatientCategories']
		        ]);

		        $this->Flash->set(__d('acp', 'The patient has been saved.'),['element' => 'fly_success']);
                return $this->redirect([
                	'action' => 'index',
                	'?' => [
                		'patient_category_id' => $patient->patient_category->id
                	]
                ]);
            }
            $this->Flash->set(__d('acp', 'The patient could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        $patientCategories = $this->Patients->PatientCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'patientCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Patients->setlocale($getQueryLanguageId);
        }
        
        $patient = $this->Patients->get($id, [
            'contain' => ['Users', 'Records']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            $patient->slug = strtolower(Text::slug($patient->title));
            if ($this->Patients->save($patient)) {
                $this->Flash->set(__d('acp', 'The patient has been saved.'),['element' => 'fly_success']);
            }
            $this->Flash->set(__d('acp', 'The patient could not be saved. Please, try again.'),['element' => 'fly_error']);
        }
        
        $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'patientCategories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
            $this->Flash->set(__d('acp', 'The patient has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The patient could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
