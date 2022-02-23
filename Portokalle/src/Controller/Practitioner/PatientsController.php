<?php
namespace App\Controller\Practitioner;

use App\Controller\Practitioner\AppController;

class PatientsController extends AppController
{
	/**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
    	$patients = $this->Patients
            ->find('list')
            ->innerJoinWith('Appointments.Personals', function ($q) {
                return $q->where(['Personals.user_id' => $this->AuthUser->user('id')]);
            })->toArray();
        if (!empty($patients)) {
            $patients = $this->Patients
                ->find()
                ->where(['Patients.id IN' => array_keys($patients)]);
            $patients = $this->paginate($patients);
        }else{
            $patients = [];
        }
        
        $this->set(compact('patients'));
    }

    /**
     * View method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patient = $this->Patients->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('patient'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
            $this->Flash->success(__('The patient has been deleted.'));
        } else {
            $this->Flash->error(__('The patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
