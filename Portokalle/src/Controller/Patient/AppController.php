<?php

namespace App\Controller\Patient;

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
    }

    protected function _authSetup() {
        $this->Auth->config('authenticate');
        $this->Auth->config('authorize', [
            'TinyAuth.Tiny' => [
                'superAdminRole' => 3,
                'superAdmin' => 3,
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
    }
}
