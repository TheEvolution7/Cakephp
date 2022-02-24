<?php
namespace App\Controller;

use App\Controller\AppController;

// Custom
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function myAccountDownload()
    {
        $userRole = $this->getRequest()->getSession()->read('Auth.User.role_id');

        $mDocument = TableRegistry::getTableLocator()->get('Acp.Documents');
        $mDocument->hasOne('DocumentsRoles');

        $documents = $mDocument->find('all')->contain(['DocumentsRoles'])->where(['DocumentsRoles.role_id' => $userRole])->toArray();


        $title_for_layout = __('Download');
        $this->set('title_for_layout', $title_for_layout);
        $this->set('documents', $documents);
    }

    public function profileManagement()
    {
        
    }

    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'countries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 3;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'countries'));
    }

    /**
     * Login method
     *
     * @param array|null User
     * @return Returns array|boolean User record data, or false, if the user could not be identified.
     */
    public function login() {
        // if ($this->Auth->user('id')) {
        //     $this->Flash->set(__('You are already logged in.'), ['element' => 'fly_info']);
        //     $this->redirect(['controller' => 'Pages', 'action' => 'display']);
        // }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            pr($user);exit;
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->set(__('Login success'), ['element' => 'fly_success']);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set(__('Your username or password was incorrect.'), ['element' => 'fly_error']);
        }
    }

    public function jlogin(){
        $this->autoRender = false;

        if ($this->request->is('post','ajax')) {


            // check username login is email
            $value = $this->request->data['username'];
                
            if (preg_match('/^[0-9]+$/', $value)) {
                $this->request->data['phone_number'] = $this->request->data['username'];

                $this->Auth->config('authenticate' , [
                    'Form' => [
                        'fields' => [
                            'username' => 'phone_number',
                            'password' => 'password',
                        ]
                    ]
                ]);
            }else{
                if (filter_var($this->request->data['username'], FILTER_VALIDATE_EMAIL)) {
                    $this->request->data['email'] = $this->request->data['username'];

                    $this->Auth->config('authenticate' , [
                        'Form' => [
                            'fields' => [
                                'username' => 'email',
                                'password' => 'password',
                            ]
                        ]
                    ]);
                }else{

                    $result['status'] = 0;
                    $result['msg'] = __('Your account must email or phone.');

                    $this->response->body(json_encode($result));
                    return $this->response;
                }
            }

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                $result['status'] = 1;
                $result['msg'] = __('Login success.');
            }else{
                $result['status'] = 0;
                $result['msg'] = __('Your username or password is incorrect.');
            }
            $this->response->body(json_encode($result));
            return $this->response;
        }
    }

    public function jregister(){
        $this->autoRender = false;

        if ($this->request->is('post','ajax')) {

            $value = $this->request->data['username'];

            if (preg_match('/^[0-9]+$/', $value)) {
                $this->request->data['phone_number'] = $this->request->data['username'];
            }else{
                if (filter_var($this->request->data['username'], FILTER_VALIDATE_EMAIL)) {
                    $this->request->data['email'] = $this->request->data['username'];
                }else{

                    $result['status'] = 0;
                    $result['msg'] = __('Your account must email or phone.');

                    $this->response->body(json_encode($result));
                    return $this->response;
                }
            }

            $user = $this->Users->newEntity();

            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {

                    $result['status'] = 1;
                    $result['msg'] = __('The user has been saved.');
                    
                }else{
                    $result['status'] = 0;
                    foreach ($user->errors() as $key => $error) {
                        $result['msg'][] = array_values($error)[0];
                    }
                }
            }

            $this->response->body(json_encode($result));
            return $this->response;
        }
    }

    public function profile()
    {
        if (!$this->Auth->user('id')) {
            $this->Flash->set(__d('acp', 'You are already logged in.'), ['element' => 'fly_info']);
            $this->redirect(['plugin' => false, 'controller' => 'Users', 'action' => 'login']);
        }
        
    }
    /**
     * Logout method
     *
     * @return Returns the logout action to redirect to login.
     */
    public function logout() {
        $this->Flash->set(__('Good-Bye, See you later.'), ['element' => 'fly_success']);
        $this->redirect($this->Auth->logout());
    }
}
