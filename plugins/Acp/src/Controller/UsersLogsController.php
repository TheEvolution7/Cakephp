<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

/**
 * UsersLogs Controller
 *
 * @property \Acp\Model\Table\UsersLogsTable $UsersLogs
 *
 * @method \Acp\Model\Entity\UsersLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersLogsController extends AppController
{
    public function view($user_id = null, $index = null)
    {
        $usersLogs = $this->UsersLogs
            ->findByUserId($user_id)
            ->cache(function ($q) {
                return 'usersLogs-view' . md5(serialize($q->clause('where')));
            });

        $this->paginate = [
            'order' => ['UsersLogs.id' => 'DESC'],
            'limit' => 50
        ];
        $usersLogs = $this->paginate($usersLogs);
        $this->set(compact('usersLogs', 'index'));
    }

    public function index()
    {
        $usersLogs = $this->UsersLogs
            ->find()
            ->cache(function ($q) {
                return 'usersLogs-index' . md5(serialize($q->clause('where')));
            });
        $this->paginate = [
            'order' => ['UsersLogs.id' => 'DESC'],
            'limit' => 50
        ];
        $usersLogs = $this->paginate($usersLogs);
        $this->set(compact('usersLogs'));
    }
}
