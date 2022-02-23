<?php
namespace App\Controller\Practitioner;

use App\Controller\Practitioner\AppController;

class UsersController extends AppController
{
	public function index() {
        if ($this->AuthUser->user('role_id')) {
            $role = $this->Users->Roles->get($this->AuthUser->user('role_id'));
            $this->set(compact('role'));
        }
    }

    public function account() {
        $user = $this->Users->get($this->AuthUser->user('id'));
        if ($this->request->is('put')) {
            $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__("Your information has been updated !"));
            }
        }
        $this->set(compact('user'));
    }

    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Username or password is incorrect'));
        }
    }

    public function register() {
        /** @var \App\Model\Entity\User $user */
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {

            $user->role_id = static::ROLE_USER;
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['fields' => ['username']]);

            if ($this->Users->save($user)) {
                $this->Auth->setUser($user->toArray());
                $this->Flash->success('Registered and logged in :-)');

                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Please try again'));
        }

        $this->set(compact('user'));
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
