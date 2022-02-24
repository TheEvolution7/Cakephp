<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Utility\Text;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    use MailerAwareTrait;

    public function edit()
    {
        $this->autoRender = false ;
        $user = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 3;
            if ($this->Users->save($user)) {
                $this->Flash->set(__('The user has been saved.'),['element' => 'fly_success']);
                return $this->redirect(['controller' =>'Users','action' => 'index']);
            }
            $this->Flash->set(__('Your username or password was incorrect.'));  
        }
        unset($user->password);
        $this->set(compact('user'));
    }
    public function login() {
        if ($this->Auth->user('id')) {
            $this->Flash->set(__('You are already logged in.'), ['element' => 'fly_info']);
            $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $userLogin = null;
        if ($this->request->is('post')) {

            $userLogin = $this->Auth->identify();
            if ($userLogin) {
                if (Configure::read('Core.setting.active') == 1) {
                    $userLogin = $this->Users->get($userLogin['id']);
                    if ($userLogin->active == 0 && !in_array($userLogin->role, [1,2])) {
                        $this->Cookie->delete('CookieAuth');
                        $code = md5(rand() . uniqid() . time());

                        $userLogin->email_active_code = $code;
                        $userLogin->email_active_password_code_expire = new Time();

                        $this->Users->save($userLogin);

                        $viewVars = [
                            'userId' => $userLogin->id,
                            'name' => $userLogin->full_name,
                            'username' => $userLogin->email,
                            'code' => $code
                        ];

                        $this->getMailer('User')->send('activeEmail', [$userLogin, $viewVars]);

                        $this->Flash->set(__("An E-mail has been send to <strong>{0}</strong>. Please follow the instructions in the E-mail.", h($userLogin->email)), ['element' => 'fly_success','escape' => false]);
                        return $this->redirect($this->Auth->logout());
                    }
                }
                $userLogin = $this->Auth->identify();
                if ($userLogin['status'] == false) {
                    $this->Flash->set(__('This account has been deleted.'), ['element' => 'fly_success']);
                    break;
                }
                $this->Auth->setUser($userLogin);

                if ($this->request->getData('remember_me') == 1) {

                    $this->Cookie->configKey('CookieAuth', [
                        'expires' => '+1 year',
                        'httpOnly' => true
                    ]);
                    $this->Cookie->write('CookieAuth', [
                        'email' => $this->request->data('email'),
                        'password' => $this->request->data('password')
                    ]);
                }

                $this->Flash->set(__('Login success'), ['element' => 'fly_success']);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set(__('Your username or password was incorrect.'));
            $userLogin = $this->Users->newEntity($this->request->getParsedBody());
        }

        $this->set(compact('userLogin'));

        
        $title = __('Login');
        $this->set(compact('title', 'description', 'image','title'));
    }
    public function index()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => [
                'Orders' => [
                    'OrderDetails' => ['Products']
                ]
            ]
        ]);
        
        $this->set(compact('user'));

        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 3;
            if ($this->Users->save($user)) {
                $this->request->session()->write('Auth.User.role_id', $user->role_id);

                $this->Flash->set(__("Your account has been upgraded."), ['element' => 'fly_success']);
                $this->set(compact('user'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->set(__("The user could not be saved. Please, try again."));
        }

        $roles = $this->Users->Roles->find('list')->where(['Roles.id NOT IN' => [1,2,3]])->toArray();

        unset($user->password);

        $title = 'Profile';
        $this->set(compact('title', 'description', 'image', 'user', 'roles'));
    }

    public function changePassword()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        $this->set(compact('user'));
        if (is_null($user) || $user->is_deleted == true) {
            $this->Flash->set(__('This user doesn\'t exist or has been deleted.'));

            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }

        if ($this->request->is('post')) {
            $this->Users->patchEntity($user, $this->request->getParsedBody());
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                $this->Flash->set(__("Your password has been changed !"), ['element' => 'fly_success']);
            }else{
                $this->Flash->set(__("Your password could not be changed. Please, try again."));
            }
        }

        $title = __('Change Password');
        $this->set(compact('title', 'description', 'image'));
    }

    public function forgotPassword()
    {
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        if ($this->request->is('post')) {
            $user = $this->Users
                ->find()
                ->where([
                    'Users.email' => $this->request->getData('email')
                ])
                ->first();

            if (is_null($user)) {
                $this->Flash->set(__("This E-mail doesn't exist or the account has been deleted."));

                $this->set(compact('user'));

                return;
            }

            $code = md5(rand() . uniqid() . time());

            $user->password_code = $code;
            $user->password_code_expire = new Time();

            $this->Users->save($user);

            $viewVars = [
                'userId' => $user->id,
                'name' => $user->full_name,
                'username' => $user->email,
                'code' => $code
            ];

            $this->getMailer('User')->send('forgotPassword', [$user, $viewVars]);
            $this->Flash->set(__('An E-mail has been send to <strong>{0}</strong>. Please follow the instructions in the E-mail.', h($user->email)), ['element' => 'fly_success','escape' => false]);
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $this->set(compact('user'));

        $title = __('Forgot Password');
        $this->set(compact('title', 'description', 'image'));
    }

    public function activeEmail()
    {
        $this->autoRender = false;
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        //Prevent for empty code.
        if (empty(trim($this->request->code))) {
            $this->Flash->set(__("This code is not associated with this users or is incorrect."));

            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $user = $this->Users
            ->find()
            ->where([
                'Users.email_active_code' => $this->request->code,
                'Users.id' => $this->request->id
            ])
            ->first();


        if (is_null($user)) {
            $this->Flash->set(__("This code is not associated with this users or is incorrect."));

            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $this->Flash->set(__("Your account has been actived !"), ['element' => 'fly_success']);

        $user->active = 1;
        //Reset the code and the time.
        $user->email_active_code = '';
        $user->email_active_code_expire = new Time();
        if ($this->Users->save($user)) {
            $user = $this->Users->get($user->id);
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
            }
        }
        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }

    public function resetPassword()
    {
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        //Prevent for empty code.
        if (empty(trim($this->request->code))) {
            $this->Flash->set(__("This code is not associated with this users or is incorrect."));

            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $user = $this->Users
            ->find()
            ->where([
                'Users.password_code' => $this->request->code,
                'Users.id' => $this->request->id
            ])
            ->first();

        if (is_null($user)) {
            $this->Flash->set(__("This code is not associated with this users or is incorrect."));

            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        if ($this->request->is(['post', 'put'])) {

            $this->Users->patchEntity($user, $this->request->getParsedBody());

            if ($this->Users->save($user)) {
                $this->Flash->set(__("Your password has been changed !"), ['element' => 'fly_success']);

                //Reset the code and the time.
                $user->password_code = '';
                $user->password_code_expire = new Time();
                $user->password_reset_count = $user->password_reset_count + 1;
                $this->Users->save($user);

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }else{
                $this->Flash->set(__("The user could not be saved. Please, try again."), ['element' => 'fly_error']);
                return $this->redirect($this->referer());
            }
        }

        $this->set(compact('user'));

        $title = __('Reset Password');
        $this->set(compact('title', 'description', 'image'));
    }
    public function logout() {
        $this->Flash->set(__('Good-Bye, See you later.'), ['element' => 'fly_success']);
        $this->redirect($this->Auth->logout());
    }
    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 3;
            $user->active = 1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'),['element' => 'fly_success']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $title = __('Sign Up');
        $this->set(compact('user', 'roles', 'countries','title'));
    }
}
