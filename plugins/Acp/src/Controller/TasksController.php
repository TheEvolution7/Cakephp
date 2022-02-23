<?php
namespace Acp\Controller;

use Acp\Controller\AppController;
use Cake\Utility\Text;

class TasksController extends AppController
{
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__d('acp', 'The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The task could not be saved. Please, try again.'));
        }

        $this->set(compact('task'));
    }

    public function add()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->newEntity($this->request->getData());
            $task->user_id = $this->Auth->user('id');
            $task->role_id = $this->Auth->user('role_id');
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__d('acp', 'The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The task could not be saved. Please, try again.'));
        }

        $this->set(compact('task'));
    }

    public function index()
    {

        $this->paginate = [
            'contain' => [],
            'limit' => 10,
            'order' => ['Tasks.id' => 'DESC']
        ];
        
        $tasks = $this->paginate($this->Tasks);
        $this->set(compact('tasks'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__d('acp', 'The task has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function updateStatus()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $task = $this->Tasks->get($this->request->getData('id'));
            $oldStatus = $task->status;
            if (isset($task)) {
                $task = $this->Tasks->patchEntity($task, $this->request->getData());
                switch ($task->status) {
                    case 0:
                        $task->status = 1;
                        break;
                    case 1:
                        $task->status = 2;
                        break;
                    case 2:
                        $task->status = 1;
                        break;
                    default:
                        $task->status = 3;
                        break;
                }
                if ($this->Tasks->save($task)) {
                    $result['status'] = 1;
                    $result['data']['newStatus'] = $task->status;
                    $result['data']['oldStatus'] = $oldStatus;
                    $result['message'] = 'This task update status complete';
                }else{
                    $result['status'] = 0;
                    $result['message'] = 'This task update status error';
                }
            }else{
                $result['status'] = 0;
                $result['message'] = 'This task is empty';
            }
            echo json_encode($result);
        }
        
    }
}
