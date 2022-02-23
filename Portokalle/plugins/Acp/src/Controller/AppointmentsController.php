<?php
namespace Acp\Controller;

use Acp\Controller\AppController;
use Cake\I18n\FrozenTime;

class AppointmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients', 'Personals'],
            'order' => ['Appointments.id' => 'DESC']
        ];
        $appointments = $this->paginate($this->Appointments);

        $this->set(compact('appointments'));
    }

    /**
     * View method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Patients', 'Personals'],
        ]);
        $appointments = $this->Appointments
            ->find()
            ->where([])
            ->contain(['Patients', 'Personals']);

        $dateCalendar = [];
        foreach ($appointments as $key => $ap) {  
            $dateCalendar[$key]['title'] = $ap->patient->full_name . ' ' .  strtolower($ap->status);
            $dateCalendar[$key]['start'] = new FrozenTime($ap->date . ' ' . $ap->start_time);
            $dateCalendar[$key]['end'] = new FrozenTime($ap->date . ' ' . $ap->end_time); 
            if ($ap->id == $id) {
                $dateCalendar[$key]['className'] = 'fc-event-light fc-event-solid-success';
            }
        }
        $this->set(compact('appointment', 'dateCalendar'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appointment = $this->Appointments->newEntity();
        if ($this->request->is('post')) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }

        $appointments = $this->Appointments
            ->find()
            ->where([])
            ->contain(['Patients', 'Practitioners']);

        $dateCalendar = [];
        foreach ($appointments as $key => $ap) {          
            $dateCalendar[$key]['title'] = $ap->patient->full_name . ' ' .  strtolower($ap->status);
            $dateCalendar[$key]['start'] = new FrozenTime($ap->date . ' ' . $ap->start_time);
            $dateCalendar[$key]['end'] = new FrozenTime($ap->date . ' ' . $ap->end_time); 
        }

        $patients = $this->Appointments->Patients->find('list', ['limit' => 200]);
        $practitioners = $this->Appointments->Practitioners->find('list', ['limit' => 200]);
        $this->set(compact('appointment', 'patients', 'practitioners', 'dateCalendar'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Patients', 'Personals'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $appointments = $this->Appointments
            ->find()
            ->where([])
            ->contain(['Patients', 'Personals']);

        $dateCalendar = [];
        foreach ($appointments as $key => $ap) {          
            $dateCalendar[$key]['title'] = $ap->patient->full_name . ' ' .  strtolower($ap->status);
            $dateCalendar[$key]['start'] = new FrozenTime($ap->date . ' ' . $ap->start_time);
            $dateCalendar[$key]['end'] = new FrozenTime($ap->date . ' ' . $ap->end_time); 
            if ($ap->id == $id) {
                $dateCalendar[$key]['className'] = 'fc-event-light fc-event-solid-success';
            }
        }
    
        $patients = $this->Appointments->Patients->find('list', ['limit' => 200]);
        $practitioners = $this->Appointments->Personals->find('list', ['limit' => 200]);

        $this->set(compact('appointment', 'patients', 'practitioners', 'dateCalendar'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointment)) {
            $this->Flash->success(__('The appointment has been deleted.'));
        } else {
            $this->Flash->error(__('The appointment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
