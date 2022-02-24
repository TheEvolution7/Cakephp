<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Cache\Cache;
use Cake\I18n\I18n;
use Cake\Core\Configure;
use Cake\ORM\Query;


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
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function account() {
      
        $title = __('Account Details');
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 3;
            if ($this->Users->save($user)) {
                $this->request->session()->write('Auth.User', $user->toArray());
                $this->Flash->set(__('The user has been saved.'),['element' => 'fly_success']);

                return $this->redirect(['controller' =>'Users','action' => 'account']);
            }
             $this->Flash->set(__('Your username or password was incorrect.'), ['element' => 'fly_error']);
        }

        $this->set(compact('user','title'));
    }

    public function orders() {
        $title = __('What I wear');
        $this->loadModel('Orders');
        $session = $this->getRequest()->getSession();
        $user = $session->read('Auth.User'); 
        $orders = $this->Orders
            ->find()
            ->where(['Orders.user_id'=> $user['id'], 'Orders.is_active' => 1])
            ->contain([
                'OrderDetails' => [
                    'Products' => [
                        'AttributeValuesAmounts'
                    ]
                ]
            ])
            ->order(['Orders.id' => 'DESC'])
            ->toArray();
        
        $attributeValues = $this->Products->AttributeValues->find('list', [
                'keyField' => 'id',
                'valueField' => 'title'
            ])->toArray();

        $this->set(compact('title', 'orders', 'products', 'attributeValues'));
    }
    /**
     * Login method
     *
     * @param array|null User
     * @return Returns array|boolean User record data, or false, if the user could not be identified.
     */
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                // if ($user['active'] == false) {
                //     $this->Flash->info(__('You must active account by email'));
                //     return $this->redirect($this->Auth->logout());
                // }
                if ($this->request->getQuery('redirect')) {
                    return $this->redirect($this->request->getQuery('redirect'));
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Username or password is incorrect'));
        }
    }

    public function wantToReturn($id){
        $this->loadModel('OrderDetails');
        if ($this->request->is('post')) {
            $orderDetail = $this->OrderDetails->get($id);
            $orderDetail->wantToReturn = 1;
            $orderDetail->end = $this->request->getData('end');
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->set(__('Success'), ['element' => 'fly_success']);
            }
        }
        return $this->redirect($this->referer());
    }

    public function action($id){
        $this->loadModel('OrderDetails');
        if ($this->request->is('post')) {
            $orderDetail = $this->OrderDetails->get($id);
            switch ($this->request->getData('action')) {
                case 'damage':
                    $orderDetail->damage = 1;
                    break;
                case 'lost':
                    $orderDetail->lost = 1;
                    break;
                case 'lost':
                    $orderDetail->wantToBuy = 1;
                    break;
                default:
                    // code...
                    break;
            }
            $orderDetail->description = $this->request->getData('description');
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->set(__('Success'), ['element' => 'fly_success']);
            }
        }
        return $this->redirect($this->referer());
    }
    
    public function forgotPassword() {
        if ($this->Auth->user()) {
            return $this->redirect('/');
        }
        $user = null;
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

    public function register() 
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData(), ['associated' => [], 'validate' => 'create']);
            $code = md5(rand() . uniqid() . time());

            $user->email_active_code = $code;
            $user->email_active_password_code_expire = new Time();
            $user->role_id = 3;
            
            if ($this->request->getData('postcode')) {
                if (count(explode(' ', $this->request->getData('postcode'))) == 2) {
                    $data = str_replace(' ', '%20', $this->request->getData('postcode'));
                    $contents = file_get_contents("https://www.doogal.co.uk/GetPostcode.ashx?postcode=" . $data);
                    if (!empty($contents)) {
                        $splitContents = explode("\t", $contents);
                        if ($splitContents[9] == 'London') {
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
                            }else{
                                $this->Flash->error(__('Please try again'));
                            }
                        }else{
                            $this->Flash->set("Sorry we haven't provided services in your area yet", ['element' => 'error', 'escape' => false]);
                        }
                    }else{
                        $this->Flash->set("Not Found", ['element' => 'error', 'escape' => false]);
                    }
                }else{
                    $this->Flash->set("Error Postcode", ['element' => 'error', 'escape' => false]);
                }
                
            }
        }

        $title = 'Register';
        $this->set(compact('user', 'title'));
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
