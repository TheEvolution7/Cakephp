<?php
namespace App\Controller\Practitioner;

use App\Controller\Practitioner\AppController;

class DashboardsController extends AppController
{
	public function index() {
		$this->loadModel('Notifications');
		$notifications = $this->Notifications
            ->find()
            ->where([
                'Notifications.user_id' => $this->Auth->user('id')
            ])
            ->contain(['Appointments' => ['Personals']])
            ->order([
                'is_read' => 'ASC',
                'Notifications.created' => 'DESC'
            ])
            ->find('map', [
                'session' => $this->request->session()
        	])
            ->toArray();

        $this->loadModel('Patients');

        $newPatients = $this->Patients
            ->find()
            ->innerJoinWith('Appointments', function ($q) {
                return $q->where([
                	'Appointments.practitioner_id' => $this->AuthUser->user('id'),
                	'Appointments.created >=' => new \DateTime('-7 days')
                ]);
            })
            ->group('Patients.id')
            ->toArray();

        $patients = $this->Patients
            ->find()
            ->innerJoinWith('Appointments', function ($q) {
                return $q->where(['Appointments.practitioner_id' => $this->AuthUser->user('id')]);
            })
            ->group('Patients.id')
            ->toArray();

        $this->set(compact('notifications', 'patients', 'newPatients'));
    }
}
