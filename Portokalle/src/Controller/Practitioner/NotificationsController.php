<?php
namespace App\Controller\Practitioner;

use App\Controller\Practitioner\AppController;
use Cake\Network\Exception\NotFoundException;

class NotificationsController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'limit' => 10
        ];
        $this->loadModel('Users');
        $getPersonalId = $this->Users->get($this->Auth->user('id'), ['contain' => ['Personals']])['personal']['id'];
        $notifications = $this->Notifications
            ->find()
            ->where([
                'Notifications.user_id' => $getPersonalId
            ])
            ->contain(['Appointments' => ['Personals']])
            ->order([
                'is_read' => 'ASC',
                'Notifications.created' => 'DESC'
            ])
            ->find('map', [
                'session' => $this->request->session()
        ]);

        $notifications = $this->paginate($notifications)->toArray();
        $this->set(compact('notifications'));

    }

    public function view($id = null)
    {
        $this->loadModel('Users');
        $getPersonalId = $this->Users->get($this->Auth->user('id'), ['contain' => ['Personals']])['personal']['id'];

        $notification = $this->Notifications
            ->find()
            ->where([
                'Notifications.id' => $id,
                'Notifications.user_id' => $getPersonalId
            ])
            ->contain(['Appointments' => ['Personals']])
            ->order([
                'is_read' => 'ASC',
                'Notifications.created' => 'DESC'
            ])
            ->find('map', [
                'session' => $this->request->session()
        ])->first();

        $this->set(compact('notification'));

    }

    public function markAsRead()
    {
        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $this->Notifications = $this->loadModel('Notifications');

        $json = [
            'error' => false
        ];

        $notification = $this->Notifications
            ->find()
            ->where([
                'id' => $this->request->getData('id')
            ])
            ->first();

        if (is_null($notification) || $notification->user_id != $this->Auth->user('id')) {
            $json['error'] = true;

            $this->set(compact('json'));

            $this->set('_serialize', 'json');

            return;
        }

        if ($notification->is_read) {
            $this->set(compact('json'));
            $this->set('_serialize', 'json');

            return;
        }

        $notification->is_read = 1;
        $this->Notifications->save($notification);

        $this->set(compact('json'));
        $this->set('_serialize', ['json']);
    }
}
