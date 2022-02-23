<?php
namespace App\Controller\Patient;

use App\Controller\Patient\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
use App\Event\Notifications;
use Cake\Routing\Router;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;
use Cake\Utility\Text;

class UsersController extends AppController
{
    use MailerAwareTrait;

	public function index() {
        if ($this->AuthUser->user('role_id')) {
            $role = $this->Users->Roles->get($this->AuthUser->user('role_id'));
            $this->set(compact('role'));
        }
    }

    public function account() {
        $user = $this->Users->get($this->AuthUser->user('id'));
        $user->slug = strtolower(Text::slug($user->full_name));
        if ($this->request->is('put')) {
            $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->request->session()->write('Auth.User', $user->toArray());
                $this->Flash->success(__("Your information has been updated !"));
            }
        }
        $this->set(compact('user'));
    }

    public function security() {
        $user = $this->Users->get($this->AuthUser->user('id'));
        if ($this->request->is('put')) {
            $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'resetpassword']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("Your information has been updated !"));
            }
        }

        $this->loadModel('UsersLogs');
        $logs = $this->UsersLogs
            ->find()
            ->where(['user_id' => $this->AuthUser->user('id')])
            ->limit(10)
            ->toArray();

        $this->loadModel('Appointments');
        $appointments = $this->Appointments
            ->find()
            ->where(['Patients.user_id' => $this->AuthUser->user('id')])
            ->contain(['Personals', 'Patients'])
            ->order(['Appointments.id' => 'DESC'])
            ->limit(10)
            ->toArray();
        $this->set(compact('user', 'logs', 'appointments'));
    }

    public function notifications() {
        $user = $this->Users->get($this->AuthUser->user('id'));
        $this->set(compact('user'));
    }

    public function languages() {
        $user = $this->Users->get($this->AuthUser->user('id'));
        $this->set(compact('user'));
    }

    public function credits() {
    }

    public function billing() {
        // $this->loadModel('Appointments');
        // $appointments = $this->Appointments
        //     ->find()
        //     ->where(['Patients.user_id' => $this->AuthUser->user('id')])
        //     ->contain(['Personals', 'Patients'])
        //     ->order(['Appointments.id' => 'DESC'])
        //     ->toArray();
        // $this->set(compact('appointments'));

        $this->loadModel('Orders');
        $orders = $this->Orders
            ->find()
            ->where(['Orders.user_id' => $this->AuthUser->user('id')])
            ->contain(['Appointments'])
            ->order(['Orders.id' => 'DESC'])
            ->toArray();
        $this->set(compact('orders'));
    }

    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if ($user['active'] == false) {
                    $this->Flash->info(__('You must active account by email'));
                    return $this->redirect($this->Auth->logout());
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Username or password is incorrect'));
        }
    }

    public function forgotPassword() {
        $this->layout = 'login';
        if ($this->Auth->user()) {
            return $this->redirect('/');
        }

        if ($this->request->is('post')) {
            $user = $this->Users
                ->find()
                ->where([
                    'Users.email' => $this->request->getData('email')
                ])
                ->first();

            if (is_null($user)) {
                $this->Flash->error(__("This E-mail doesn't exist or the account has been deleted."));

                $this->set(compact('user'));

                return;
            }

            //Generate the unique code
            $code = md5(rand() . uniqid() . time());

            //Update the user's information
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

            $this->Flash->success(__("An E-mail has been send to <strong>{0}</strong>. Please follow the instructions in the E-mail.", h($user->email)));
        }

        $this->set(compact('user'));
    }

    public function resetPassword() {
        $this->layout = 'login';

        if ($this->Auth->user()) {
            return $this->redirect('/');
        }

        if (empty(trim($this->request->code))) {
            $this->Flash->error(__("This code is not associated with this users or is incorrect."));

            return $this->redirect('/');
        }

        $user = $this->Users
            ->find()
            ->where([
                'Users.password_code' => $this->request->code,
                'Users.id' => $this->request->id
            ])
            ->first();

        if (is_null($user)) {
            $this->Flash->error(__("This code is not associated with this users or is incorrect."));

            return $this->redirect('/');
        }

        $expire = $user->password_code_expire->timestamp + (30 * 60);

        if ($expire < time()) {
            $this->Flash->error(__("This code is expired, please ask another E-mail code."));

            return $this->redirect(['action' => 'forgotPassword']);
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->getParsedBody(), ['validate' => 'resetpassword']);

            if ($this->Users->save($user)) {
                $this->Flash->success(__("Your password has been changed !"));

                //Reset the code and the time.
                $user->password_code = '';
                $user->password_code_expire = new Time();
                $user->password_reset_count = $user->password_reset_count + 1;
                $this->Users->save($user);

                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
        }

        $this->set(compact('user'));
    }

    public function register() {
        $this->layout = 'login';

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData(), ['associated' => ['Patients'], 'validate' => 'create']);
            $code = md5(rand() . uniqid() . time());

            $user->email_active_code = $code;
            $user->email_active_password_code_expire = new Time();
            $user->role_id = 3;
            $user->patients[0]->first_name = $user->first_name;
            $user->patients[0]->last_name = $user->last_name;
            $user->patients[0]->relationship = 'You';
            
            if ($this->Users->save($user)) {

                $viewVars = [
                    'userId' => $user->id,
                    'name' => $user->full_name,
                    'username' => $user->email,
                    'code' => $code
                ];

                $this->getMailer('User')->send('activeEmail', [$user, $viewVars]);

                $this->Flash->set(__("An E-mail has been send to <strong>{0}</strong>. Please follow the instructions in the E-mail.", h($user->email)), ['element' => 'success','escape' => false]);
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }

            $this->Flash->error(__('Please try again'));
        }

        $this->loadModel('Countries');
        $countries = $this->Countries
            ->find('list', [
                'keyField' => 'countryCode',
                'valueField' => 'countryName'
            ]);

        $this->set(compact('user', 'countries'));
    }

    public function logout() {
        $this->Flash->info(__('See you later {0} !', h($this->Auth->user('email'))));
        return $this->redirect($this->Auth->logout());
    }

    public function activeEmail()
    {
        $this->autoRender = false;
        if (empty(trim($this->request->getQuery('code')))) {
            $this->Flash->set(__("This code is not associated with this users or is incorrect."), ['element' => 'error']);

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $user = $this->Users
            ->find()
            ->where([
                'Users.email_active_code' => $this->request->getQuery('code'),
                'Users.id' => $this->request->getQuery('id')
            ])
            ->first();

        if (is_null($user)) {
            $this->Flash->set(__("This code is not associated with this users or is incorrect."), ['element' => 'error']);

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        

        $user->active = 1;
        //Reset the code and the time.
        $user->email_active_code = '';
        $user->email_active_code_expire = new Time();
        if ($this->Users->save($user)) {
            $this->Flash->set(__("Your account has been actived !"), ['element' => 'success']);
        }
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
