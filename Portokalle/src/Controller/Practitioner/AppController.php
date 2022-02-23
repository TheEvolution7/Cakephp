<?php

namespace App\Controller\Practitioner;

use App\Controller\AppController as BaseAppController;
use Cake\Event\Event;

class AppController extends BaseAppController
{
    /**
     * @var array
     */

    public $components = ['TinyAuth.AuthUser'];

    public $helpers = ['TinyAuth.AuthUser'];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->_authSetup();

        $this->loadModel('Appointments');
        $countAppointment = $this->Appointments
            ->find()
            ->where(['Personals.user_id' => $this->AuthUser->user('id'),'practitioner_read' => 0])
            ->contain(['Personals', 'Patients'])
            ->count();

        $this->loadModel('Patients');
        $countPatient = $this->Patients
            ->find()
            ->innerJoinWith('Appointments', function ($q) {
                return $q->where(['Appointments.practitioner_id' => $this->AuthUser->user('id')]);
            })
            ->group('Patients.id')
            ->count();
        $this->set(compact('countAppointment', 'countPatient'));
    }

    protected function _authSetup() {
        $this->Auth->config('authenticate');
        $this->Auth->config('authorize', [
            'TinyAuth.Tiny' => [
                'superAdminRole' => 5,
                'superAdmin' => 5,
                'aliasColumn' => 'slug'
            ]
        ]);

        $this->Auth->config('loginAction', [
            'controller' => 'Users',
            'action' => 'login',
        ]);
        $this->Auth->config('loginRedirect', [
            'controller' => 'Dashboards',
            'action' => 'index',
        ]);
        $this->Auth->config('logoutRedirect', [
            'controller' => 'Users',
            'action' => 'login',
        ]);
        $this->Auth->config('authError', 'Did you really think you are allowed to see that?');

        //pr($this->Auth);exit;
    }
}
