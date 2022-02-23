<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Utility\Text;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Acp\Event\Users;

use Cake\I18n\Time;
use Cake\Mailer\MailerAwareTrait;

use Cake\Collection\Collection;

/**
 * Users Controller
 *
 * @property \Acp\Model\Table\UsersTable $Users
 *
 * @method \Acp\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    use MailerAwareTrait;

    public function  statements($id = null)
    {
        $this->loadModel('Orders');
        $ordersTime = [];
        $ordersDate = [];
        $ordersMonth = [];
        $data_orders_country = [];
        $data_users_gender = [];

        $today = new \DateTime('now');

        $orderByToday = $this->Orders
            ->find()
            ->select([
                'time' => 'TIME_FORMAT(created,\'%H:%i\')',
                'count' => 'COUNT(id)',
                'total' => 'SUM(amount)'
            ])
            ->where(['user_id' => $id, 'DATE(created)' => $today->format('Y-m-d')])
            ->group('TIME_FORMAT(created,\'%H\')')
            ->toArray();

        $a = '00:00';
        $b = $today->format('H:i');

        $a = strtotime($a);
        $b = strtotime($b);
        $ordersTime = [];
        for($i = 0; $i < $b - $a; $i += 3600) {
          $ordersTime[date('H:i', $a + $i)] = 0;
        }

        $totalOrdersTime = 0;
        foreach ($orderByToday as $order) {
            $ordersTime[$order->time] = intval($order->total);
            $totalOrdersTime += $order->total;
        }

        $dateThisMonth = new \DateTime('now');
        $dateThisMonth = $dateThisMonth->modify('last day of last month');

        $orderByThisMonth = $this->Orders
            ->find()
            ->select([
                'date' => 'DATE_FORMAT(created,\'%d-%m-%Y\')',
                'count' => 'COUNT(id)',
                'total' => 'SUM(amount)'
            ])
            ->where(['user_id' => $id, 'DATE(created) >=' => $dateThisMonth->format('Y-m-d')])->group('DATE(created)')
            ->order([
                'date' => 'desc'
            ])->toArray();

        $d1 = new \DateTime('now');
        $d2 = $dateThisMonth;
        $interval = $d1->diff($d2);

        $ordersDate = [];
        for ($i = 0; $i < $interval->d; $i++) {
            $date = new \DateTime("$i days ago");

            $ordersDate[$date->format('d-m-Y')] = 0;
        }

        $totalOrderByThisMonth = 0;
        foreach ($orderByThisMonth as $order) {
            $ordersDate[$order->date] = intval($order->total);
            $totalOrderByThisMonth += $order->total;
        }
        $ordersDate = array_reverse($ordersDate);

        $orders = $this->Orders
            ->find()
            ->select([
                'date' => 'DATE_FORMAT(created,\'%m-%Y\')',
                'count' => 'COUNT(id)',
                'total' => 'SUM(amount)'
            ])
            ->where(['user_id' => $id])->group('DATE(created)')
            ->order([
                'date' => 'desc'
            ])->toArray();

        $orderDateMin = $this->Orders
            ->find()
            ->select([
                'date' => 'DATE_FORMAT(created,\'%d-%m-%Y\')'
            ])
            ->where(['user_id' => $id])
            ->toArray();

        $totalOrder = 0;
        $countOrder = 0;

        if (!empty($orderDateMin)) {
            $collection = new \Cake\Collection\Collection($orderDateMin);
            $getMin = $collection->min('created');

            $d1 = new \DateTime('now');
            $d2 = new \DateTime($getMin->date);
            $interval = $d1->diff($d2);

            $ordersMonth = [];
            for ($i = 0; $i < $interval->m; $i++) {
                $date = new \DateTime("$i months ago");

                $ordersMonth[$date->format('m-Y')] = 0;
            }

            
            foreach ($orders as $order) {
                $ordersMonth[$order->date] = intval($order->total);
                $totalOrder += $order->total;
                $countOrder += $order->count;
            }
            $ordersMonth = array_reverse($ordersMonth);
        }
            
        $user = $this->Users->get($id);
        $this->set(compact('ordersTime', 'ordersDate', 'totalOrderByThisMonth', 'totalOrdersTime', 'ordersMonth', 'totalOrder', 'countOrder', 'data_orders_country', 'data_users_gender', 'count_data_users', 'countOrders', 'user'));
    }

    public function  doctorStatements($id = null)
    {
        $this->loadModel('Orders');
        $ordersTime = [];
        $ordersDate = [];
        $ordersMonth = [];
        $data_orders_country = [];
        $data_users_gender = [];

        $today = new \DateTime('now');

        $orderByToday = $this->Orders
            ->find()
            ->select([
                'time' => 'TIME_FORMAT(created,\'%H:%i\')',
                'count' => 'COUNT(id)',
                'total' => 'SUM(amount)'
            ])
            ->where(['Orders.practitioner_id' => $id, 'DATE(created)' => $today->format('Y-m-d')])
            ->group('TIME_FORMAT(created,\'%H\')')
            ->toArray();

        $a = '00:00';
        $b = $today->format('H:i');

        $a = strtotime($a);
        $b = strtotime($b);
        $ordersTime = [];
        for($i = 0; $i < $b - $a; $i += 3600) {
          $ordersTime[date('H:i', $a + $i)] = 0;
        }

        $totalOrdersTime = 0;
        foreach ($orderByToday as $order) {
            $ordersTime[$order->time] = intval($order->total);
            $totalOrdersTime += $order->total;
        }

        $dateThisMonth = new \DateTime('now');
        $dateThisMonth = $dateThisMonth->modify('last day of last month');

        $orderByThisMonth = $this->Orders
            ->find()
            ->select([
                'date' => 'DATE_FORMAT(created,\'%d-%m-%Y\')',
                'count' => 'COUNT(id)',
                'total' => 'SUM(amount)'
            ])
            ->where(['Orders.practitioner_id' => $id, 'DATE(created) >=' => $dateThisMonth->format('Y-m-d')])->group('DATE(created)')
            ->order([
                'date' => 'desc'
            ])->toArray();

        $d1 = new \DateTime('now');
        $d2 = $dateThisMonth;
        $interval = $d1->diff($d2);

        $ordersDate = [];
        for ($i = 0; $i < $interval->d; $i++) {
            $date = new \DateTime("$i days ago");

            $ordersDate[$date->format('d-m-Y')] = 0;
        }

        $totalOrderByThisMonth = 0;
        foreach ($orderByThisMonth as $order) {
            $ordersDate[$order->date] = intval($order->total);
            $totalOrderByThisMonth += $order->total;
        }
        $ordersDate = array_reverse($ordersDate);

        $orders = $this->Orders
            ->find()
            ->select([
                'date' => 'DATE_FORMAT(created,\'%m-%Y\')',
                'count' => 'COUNT(id)',
                'total' => 'SUM(amount)'
            ])
            ->where(['Orders.practitioner_id' => $id])->group('DATE(created)')
            ->order([
                'date' => 'desc'
            ])->toArray();

        $orderDateMin = $this->Orders
            ->find()
            ->select([
                'date' => 'DATE_FORMAT(created,\'%d-%m-%Y\')'
            ])
            ->where(['Orders.practitioner_id' => $id])
            ->toArray();

        $totalOrder = 0;
        $countOrder = 0;

        if (!empty($orderDateMin)) {
            $collection = new \Cake\Collection\Collection($orderDateMin);
            $getMin = $collection->min('created');

            $d1 = new \DateTime('now');
            $d2 = new \DateTime($getMin->date);
            $interval = $d1->diff($d2);

            $ordersMonth = [];
            for ($i = 0; $i < $interval->m; $i++) {
                $date = new \DateTime("$i months ago");

                $ordersMonth[$date->format('m-Y')] = 0;
            }

            
            foreach ($orders as $order) {
                $ordersMonth[$order->date] = intval($order->total);
                $totalOrder += $order->total;
                $countOrder += $order->count;
            }
            $ordersMonth = array_reverse($ordersMonth);
        }
        
        $mOrders = TableRegistry::getTableLocator()->get('Acp.Orders');

        $mapper = function ($order, $key, $mapReduce) {
            $mCountries = TableRegistry::getTableLocator()->get('Acp.Countries');
            $countries = $mCountries->find('list',[
                'keyField' => 'id',
                'valueField' => 'countryName'
            ]);
            foreach ($countries as $key => $country) {
                if ($order['country_id'] == $key) {
                    $mapReduce->emitIntermediate($order['id'], $country);
                }
            }
        };
        $reducer = function ($orders, $country, $mapReduce) {
            $mapReduce->emit(count($orders), $country);
        };
        $orders_country = $mOrders
            ->find()
            ->where(['practitioner_id' => $id])
            ->order(['Orders.created' => 'DESC','Orders.id' => 'DESC'])
            ->mapReduce($mapper, $reducer)
            ->disableHydration()
            ->toArray();
        $data_orders_country = [];
        $data_i = 0;
        foreach ($orders_country as $key => $value) {
            if ($data_i > 2) {
                $data_orders_country[$data_i]['label'] = __d('acp','Other countries');
                if (isset($data_orders_country[$data_i]['value'])) {
                    $data_orders_country[$data_i]['value'] += $value;
                }else{
                    $data_orders_country[$data_i]['value'] = $value;
                }
            }else{
                $data_orders_country[$data_i]['label'] = $key;
                $data_orders_country[$data_i]['value'] = $value;
                $data_i++;
            }
        }

        ksort($data_orders_country);

        $mapper = function ($user, $key, $mapReduce) {
            for ($gender=0; $gender < 3; $gender++) {
                if ((int)$user['gender'] == (int)$gender) {
                    $mapReduce->emitIntermediate(1, $gender);
                }else{
                    $mapReduce->emitIntermediate(null, $gender);
                }
            }
        };
        $reducer = function ($users, $gender, $mapReduce) {
            $mapReduce->emit($users, $gender);
        };
        $users_gender = $this->Users
            ->find()
            ->where([])
            ->innerjoinwith('Orders', function ($q) use ($id) {
                return $q->where(['Orders.practitioner_id' => $id]);
            })
            ->disableHydration()
            ->mapReduce($mapper, $reducer)
            ->toArray();

        $data_users_gender = [];
        $count_data_users = 0;
        foreach ($users_gender as $gender => $users) {
            if (!isset($data_users_gender[$gender])) {
                $data_users_gender[$gender] = 0;
            }
            foreach ($users as $user) {
                if (!empty($user)) {
                    $data_users_gender[$gender] += $user;
                    $count_data_users++;
                }
            }
        }
        ksort($data_users_gender);

        $countOrders = $this->Orders->find()->where(['practitioner_id' => $id])->count();
        $this->set(compact('ordersTime', 'ordersDate', 'totalOrderByThisMonth', 'totalOrdersTime', 'ordersMonth', 'totalOrder', 'countOrder', 'data_orders_country', 'data_users_gender', 'count_data_users', 'countOrders', 'user'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $limit = $this->request->getQuery('limit')?$this->request->getQuery('limit'):10;
        $conditions = [];
        if ($this->request->getQuery('role_id')) {
            $conditions['Users.role_id'] = $this->request->getQuery('role_id');
        }
        $this->paginate = [
            'maxLimit' => $limit,
            'contain' => ['Roles', 'Countries']
        ];
        $users = $this->Users
            ->find()
            ->where($conditions)
            ->contain([
                'Roles', 
                'Countries'
            ])
            ->order([
                'Users.created' => 'desc'
            ]);
        $users = $this->paginate($users);
        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'title']);
        $this->set(compact('users','roles'));
    }

    public function doctor()
    {
        $limit = $this->request->getQuery('limit')?$this->request->getQuery('limit'):24;
        $conditions = [];
        
        $conditions['Users.role_id'] = 5;

        $this->paginate = [
            'maxLimit' => $limit,
        ];
        $users = $this->Users
            ->find()
            ->where($conditions)
            ->order([
                'Users.id' => 'DESC'
            ]);
        $users = $this->paginate($users);

        $this->set(compact('users'));
    }

    public function account()
    {
        $limit = $this->request->getQuery('limit')?$this->request->getQuery('limit'):24;
        $conditions = [];
        
        $conditions['Users.role_id'] = 3;

        $this->paginate = [
            'maxLimit' => $limit,
        ];
        $users = $this->Users
            ->find()
            ->where($conditions)
            ->order([
                'Users.id' => 'DESC'
            ]);
        $users = $this->paginate($users);

        $this->set(compact('users'));
    }

    public function creditCards($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    public function payments()
    {
        $conditions = [];
        $request = $this->request->getQuery('user_id');
        if ($request) {
            $conditions['user_id'] = $request;
        }
        $orders = $this->Users->Orders
            ->find()
            ->where($conditions)
            ->order(['Orders.id' => 'desc']);
        $orders = $this->paginate($orders);

        $this->set(compact('orders'));
    }

    public function customers()
    {
        $conditions = [];
        $request = $this->request->getQuery('user_id');
        if ($request) {
            $conditions['practitioner_id'] = $request;
        }
        $orders = $this->Users->Orders
            ->find()
            ->where($conditions)
            ->order(['Orders.id' => 'desc']);
        $orders = $this->paginate($orders);

        $this->set(compact('orders'));
    }

    public function paymentDetails($id = null)
    {
        $order = $this->Users->Orders->get($id);

        $this->set(compact('order'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Countries']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->uuid = Text::uuid();
            $user->slug = strtolower(Text::slug($user->full_name));
            if ($this->Users->save($user)) {
                $this->Flash->success(__d('acp', 'The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'title']);
        $genders = $this->Users->setGenders();
        $countries = $this->Users->Countries->find('list', ['keyField' => 'id', 'valueField' => 'countryName']);
        $this->set(compact('user', 'roles', 'genders', 'countries'));
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
            $user->slug = strtolower(Text::slug($user->full_name));

            if ($this->Users->save($user)) {
                $this->Flash->success(__d('acp', 'The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'title']);
        $genders = $this->Users->setGenders();
        $countries = $this->Users->Countries->find('list', ['keyField' => 'id', 'valueField' => 'countryName']);
        $this->set(compact('user', 'roles', 'genders', 'countries'));
    }

    public function editDoctor($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Doctors']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->slug = strtolower(Text::slug($user->full_name));

            if ($this->Users->save($user)) {
                $this->Flash->success(__d('acp', 'The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'title']);
        $genders = $this->Users->setGenders();
        $countries = $this->Users->Countries->find('list', ['keyField' => 'id', 'valueField' => 'countryName']);

        if (!empty($user->doctor->note)) {
            foreach (unserialize($user->doctor->note) as $key => $value) {
                $user->doctor->$key = $value;
            }
        }
        

        $this->set(compact('user', 'roles', 'genders', 'countries'));
    }

    public function editAccount($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Pharmacys']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->slug = strtolower(Text::slug($user->full_name));

            if ($this->Users->save($user)) {
                $this->Flash->success(__d('acp', 'The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'title']);
        $genders = $this->Users->setGenders();
        $countries = $this->Users->Countries->find('list', ['keyField' => 'id', 'valueField' => 'countryName']);
        $this->set(compact('user', 'roles', 'genders', 'countries'));
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__d('acp', 'The user has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function notFound()
    {
        $this->autoRender = false;
        $session = $this->getRequest()->getSession();
        if (!$session->read('Auth')) {
            $this->redirect(['controller' => 'Pages', 'action' => 'dashboard']);
        }
    }

    /**
     * Login method
     *
     * @param array|null User
     * @return Returns array|boolean User record data, or false, if the user could not be identified.
     */
    public function login() {

        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                //Check duplicate login
                $sid = session_id();
                if ($sid != $this->Auth->user('sid')) {
                    $connection = ConnectionManager::get('default');
                    $connection->update('sessions', ['data' => ''], ['id' => $this->Auth->user('sid')]);
                }
                $user = $this->Users->get($this->Auth->user('id'),['default' => true]);
                $user->sid = $sid;
                $code = null;
                if (Configure::read('Core.setting.status_logout_email') == 1) {
                    $code = md5(rand() . uniqid() . time());

                    $user->logout_email_code = $code;
                    $this->Users->save($user,['default' => true]);
                }

                $this->eventManager()->attach(new Users());
                $event = new Event('Users.login.successed', $this, [
                    'user_id' => $user->id,
                    'role_id' => $user->role_id,
                    'user_ip' => $this->request->clientIp(),
                    'email' => $user->email,
                    'user_agent' => $this->request->header('User-Agent'),
                    'action' => 'Users.login.successed',
                    'model' => 'Users',
                    'content' => 'Login success',
                    'code' => $code

                ]);
                $this->eventManager()->dispatch($event);

                $this->Flash->set(__d('acp', 'Login success'), ['element' => 'fly_success']);
                return $this->redirect($this->Auth->redirectUrl());
            }

            $user = $this->Users
                ->find()
                ->where([
                    'email' => $this->request->getData('email')
                ])
                ->first();

            if (!is_null($user)) {
                $this->eventManager()->attach(new Users());
                $event = new Event('Users.login.failed', $this, [
                    'user_id' => $user->id,
                    'role_id' => $user->role_id,
                    'user_ip' => $this->request->clientIp(),
                    'email' => $user->email,
                    'user_agent' => $this->request->header('User-Agent'),
                    'action' => 'Users.login.failed',
                    'model' => 'Users',
                    'content' => 'Login failed'
                ]);
                $this->eventManager()->dispatch($event);
            }
            $this->Flash->set(__d('acp', 'Your username or password was incorrect.'), ['element' => 'fly_error']);
        }
    }

    public function logoutByEmail()
    {
        $this->autoRender = false;
        //Prevent for empty code.
        if (empty(trim($this->request->getQuery('code')))) {
            $this->Flash->set(__("This code is not associated with this users or is incorrect."), ['element' => 'fly_error']);

            return $this->redirect(['plugin' => false, 'controller' => 'Pages', 'action' => 'home']);
        }

        $user = $this->Users
            ->find('all', ['default' => true])
            ->where([
                'Users.logout_email_code' => $this->request->getQuery('code'),
                'Users.id' => $this->request->getQuery('id')
            ])
            ->first();



        if (is_null($user)) {
            $this->Flash->set(__("This code is not associated with this users or is incorrect."), ['element' => 'fly_error']);

            return $this->redirect(['plugin' => false, 'controller' => 'Pages', 'action' => 'home']);
        }

        $this->Flash->set(__("Your account has been logout successed !"), ['element' => 'fly_success']);
        $user->logout_email_code = '';
        $connection = ConnectionManager::get('default');
        $connection->update('sessions', ['data' => ''], ['id' => $user->sid]);
        $user->sid = '';
        $this->Users->save($user);

        return $this->redirect(['plugin' => false, 'controller' => 'Pages', 'action' => 'home']);
    }

    public function loginIp()
    {
        $this->viewBuilder()->setLayout('login');
        if (!Configure::read('Core.setting.status_ip_config')) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->getQuery('code') && $this->request->getQuery('id')) {
            if (empty(trim($this->request->getQuery('code')))) {
                $this->Flash->set(__("This code is not associated with this users or is incorrect."), ['element' => 'fly_error']);

                return $this->redirect(['plugin' => null,'controller' => 'Pages', 'action' => 'home']);
            }
            $user = $this->Users
                ->find('all',['default' => true])
                ->where([
                    'Users.login_code_ip' => $this->request->getQuery('code'),
                    'Users.id' => $this->request->getQuery('id')
                ])
                ->first();

            if (is_null($user)) {
                $this->Flash->set(__("This code is not associated with this users or is incorrect."), ['element' => 'fly_error']);

                return $this->redirect(['plugin' => null,'controller' => 'Pages', 'action' => 'home']);
            }

            $this->Users->patchEntity($user, $this->request->getParsedBody());
            $user->login_status_ip = 1;
            if ($this->Users->save($user,['default' => true])) {
                $this->Flash->set(__("Success !"), ['element' => 'fly_success']);

                //Reset the code and the time.
                $user->login_code_ip = '';
                $this->Users->save($user,['default' => true]);
                $user = $user->toArray();
                $this->Auth->setUser($user);

                 //Check duplicate login
                $sid = session_id();
                if ($sid != $this->Auth->user('sid')) {
                    $connection = ConnectionManager::get('default');
                    $connection->update('sessions', ['data' => ''], ['id' => $this->Auth->user('sid')]);
                }
                $user = $this->Users->get($this->Auth->user('id'),['default' => true]);
                $user->sid = $sid;
                $this->Users->save($user,['default' => true]);

                $this->eventManager()->attach(new Users());
                $event = new Event('Users.login.successed', $this, [
                    'user_id' => $user->id,
                    'role_id' => $user->role_id,
                    'user_ip' => $this->request->clientIp(),
                    'email' => $user->email,
                    'user_agent' => $this->request->header('User-Agent'),
                    'action' => 'Users.login.successed',
                    'model' => 'Users',
                    'content' => 'Login ip success'

                ]);
                $this->eventManager()->dispatch($event);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->set(__("The user could not be saved. Please, try again."), ['element' => 'fly_error']);
                return $this->redirect($this->referer());
            }
        }

        if ($this->request->is('post')) {
            $user = $this->Users
                ->find('all',['default' => true])
                ->where([
                    'Users.email' => $this->request->getData('email')
                ])
                ->first();

            if (is_null($user)) {
                $this->Flash->set(__("This E-mail doesn't exist or the account has been deleted."), ['element' => 'fly_error']);

                $this->set(compact('user'));

                return;
            }
            $code = md5(rand() . uniqid() . time());
            $user->login_code_ip = $code;
            $this->Users->save($user,['default' => true]);

            $viewVars = [
                'userId' => $user->id,
                'name' => $user->full_name,
                'username' => $user->email,
                'code' => $code
            ];

            $this->getMailer('Acp.User')->send('loginIp', [$user, $viewVars]);
            $this->Flash->set(__("An E-mail has been send to <strong>{0}</strong>. Please follow the instructions in the E-mail.", h($user->email)), ['element' => 'fly_success','escape' => false]);
        }
    }

    public function loginEmail()
    {
        $this->viewBuilder()->setLayout('login');

        if (!Configure::read('Core.setting.status_login_email')) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->getQuery('code') && $this->request->getQuery('id')) {
            if (empty(trim($this->request->getQuery('code')))) {
                $this->Flash->set(__("This code is not associated with this users or is incorrect."), ['element' => 'fly_error']);

                return $this->redirect(['plugin' => null,'controller' => 'Pages', 'action' => 'home']);
            }
            $user = $this->Users
                ->find('all',['default' => true])
                ->where([
                    'Users.login_code_email' => $this->request->getQuery('code'),
                    'Users.id' => $this->request->getQuery('id')
                ])
                ->first();

            
            if (is_null($user)) {
                $this->Flash->set(__("This code is not associated with this users or is incorrect."), ['element' => 'fly_error']);

                return $this->redirect(['plugin' => null,'controller' => 'Pages', 'action' => 'home']);
            }

            $this->Users->patchEntity($user, $this->request->getParsedBody());
            $user->login_status_email = 1;
            if ($this->Users->save($user,['default' => true])) {
                $this->Flash->set(__("Success !"), ['element' => 'fly_success']);

                //Reset the code and the time.
                $user->login_code_email = '';
                $this->Users->save($user,['default' => true]);
                $user = $user->toArray();
                $this->Auth->setUser($user);

                //Check duplicate login
                $sid = session_id();
                if ($sid != $this->Auth->user('sid')) {
                    $connection = ConnectionManager::get('default');
                    $connection->update('sessions', ['data' => ''], ['id' => $this->Auth->user('sid')]);
                }
                $user = $this->Users->get($this->Auth->user('id'),['default' => true]);
                $user->sid = $sid;
                $this->Users->save($user,['default' => true]);

                $this->eventManager()->attach(new Users());
                $event = new Event('Users.login.successed', $this, [
                    'user_id' => $user->id,
                    'role_id' => $user->role_id,
                    'user_ip' => $this->request->clientIp(),
                    'email' => $user->email,
                    'user_agent' => $this->request->header('User-Agent'),
                    'action' => 'Users.login.successed',
                    'model' => 'Users',
                    'content' => 'Login email success'

                ]);
                $this->eventManager()->dispatch($event);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->set(__("The user could not be saved. Please, try again."), ['element' => 'fly_error']);
                return $this->redirect($this->referer());
            }
        }

        if ($this->request->is('post')) {
            $user = $this->Users
                ->find('all',['default' => true])
                ->where([
                    'Users.email' => $this->request->getData('email')
                ])
                ->first();

            if (is_null($user)) {
                $this->Flash->set(__("This E-mail doesn't exist or the account has been deleted."), ['element' => 'fly_error']);

                $this->set(compact('user'));

                return;
            }
            $code = md5(rand() . uniqid() . time());
            $user->login_code_email = $code;
            $this->Users->save($user,['default' => true]);

            $viewVars = [
                'userId' => $user->id,
                'name' => $user->full_name,
                'username' => $user->email,
                'code' => $code
            ];

            $this->getMailer('Acp.User')->send('loginEmail', [$user, $viewVars]);
            $this->Flash->set(__("An E-mail has been send to <strong>{0}</strong>. Please follow the instructions in the E-mail.", h($user->email)), ['element' => 'fly_success','escape' => false]);
        }
    }

    public function emailLogin() {
        $this->viewBuilder()->setLayout('login');


        $requestQuery = $this->getRequest()->getQuery();

        // Login link
        if (isset($requestQuery['login_code_ip']) && !empty($requestQuery['login_code_ip']) && isset($requestQuery['email']) && !empty($requestQuery['email'])) {

            $user = $this->Users->find('all',['default' => true])->where(['email' => $requestQuery['email'], 'login_code_ip' => $requestQuery['login_code_ip']])->first();
            if (!empty($user)) {

                $user = $this->Users->patchEntity($user, []);
                $user->login_status_ip = 1;
                $this->Users->save($user,['default' => true]);

                $user = $user->toArray();
                $user['loginEmail'] = true;

                $this->Auth->setUser($user);
                $this->Flash->set(__d('acp', 'Login success'), ['element' => 'fly_success']);
                return $this->redirect(['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']);
            } else {
                $this->Flash->error(__d('acp', 'The email is incorrect or the code has expired'));
            }
        }

        if ($this->request->is(['patch', 'post', 'put'])) {

            $getData = $this->request->getData();

            // Login code
            if (isset($getData['login_code_ip']) && !empty($getData['login_code_ip']) && isset($requestQuery['email']) && !empty($requestQuery['email'])) {

                $user = $this->Users->find('all',['default' => true])->where(['email' => $requestQuery['email'], 'login_code_ip' => $getData['login_code_ip']])->first();
                if (!empty($user)) {
                    $user = $user->toArray();
                    $user['loginEmail'] = true;

                    $this->Auth->setUser($user);
                    $this->Flash->set(__d('acp', 'Login success'), ['element' => 'fly_success']);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__d('acp', 'The email is incorrect or the code has expired'));
                }
            }

            // Send code and link
            if (isset($getData['email']) && !empty($getData['email'])) {
                $user = $this->Users
                    ->find('all',['default' => true])
                    ->where(['Users.email' => $getData['email']])
                    ->first();
                $codeLogin = Text::uuid();

                if (!empty($user)) {

                    $user = $this->Users->patchEntity($user, []);
                    $user->login_code_ip = $codeLogin;

                    if ($this->Users->save($user,['default' => true])) {
                          
                        $mSettings = TableRegistry::getTableLocator()->get('Acp.Settings');
                        $setting = $mSettings->find()->first();

                        TransportFactory::setConfig('sendMail', [
                            'host' => $setting->email_host,
                            'port' => $setting->email_port,
                            'username' => $setting->email_user,
                            'password' => $setting->email_password,
                            'tls' => $setting->email_smtpsecure,
                            'className' => 'Smtp'
                        ]);
                        
                        $linkLogin = Router::url([
                            'plugin' => 'Acp', 
                            'controller' => 'Users', 
                            'action' => 'emailLogin', 
                            '?' => ['email' => $getData['email'], 'login_code_ip' => $codeLogin],
                            '_full' => true
                        ]);

                        $email = new Email();
                        $email->transport('sendMail');
                        $email->from([Configure::read('Core.setting.email_emailsend') => Configure::read('Core.setting.site_title')])
                            ->to($getData['email'])
                            ->emailFormat('html')
                            ->subject(__d('acp', 'Login By Email'))
                            ->send('You code: ' . $codeLogin .'<br>' . 'Or go to link <a href="' . $linkLogin . '">' . $linkLogin . '</a>');


                        $this->redirect(['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'emailLogin', '?' => ['email' => $getData['email'], 'confirm' => 'code']]);
                    }

                } else {
                    $this->Flash->error(__d('acp', 'This user does not exist'));
                }
            }
        }
    }

    /**
     * Logout method
     *
     * @return Returns the logout action to redirect to login.
     */
    public function logout() {

        $user = $this->Users->get($this->Auth->user('id'));
        $this->Users->patchEntity($user, []);
        if (Configure::read('Core.setting.status_ip_config') && $user->login_status_ip == 1) {
            $user->login_status_ip = 0;
            $this->Users->save($user);
        }
        if (Configure::read('Core.setting.status_login_email') && $user->login_status_email == 1) {
            $user->login_status_email = 0;
            $this->Users->save($user);
        }
        $this->Flash->set(__d('acp', 'Good-Bye, See you later.'), ['element' => 'fly_success']);
        $this->redirect($this->Auth->logout());
    }

    public function exportExcel() {
        header('Content-type: application/excel;charset=UTF-8');
        $filename = 'users.xls';
        header('Content-Disposition: attachment; filename='.$filename);
        
        $data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
        <head>
            <!--[if gte mso 9]>
            <xml>
                <x:ExcelWorkbook>
                    <x:ExcelWorksheets>
                        <x:ExcelWorksheet>
                            <x:Name>Customers</x:Name>
                            <x:WorksheetOptions>
                                <x:Print>
                                    <x:ValidPrinterInfo/>
                                </x:Print>
                            </x:WorksheetOptions>
                        </x:ExcelWorksheet>
                    </x:ExcelWorksheets>
                </x:ExcelWorkbook>
            </xml>
            <![endif]-->
        </head>
        
        <body>';
        
        $users = $this->Users->find('all');
        $data .= '
        
        
        <table style="border:1px solid #ccc;" >
                    <tr style="background:#ccc;">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>';
                $i = 1;
                foreach($users as $user)
                {
                    $data .=    '
                    <tr>
                        <td>'. $i .'</td>
                        <td>'. $user->full_name. '</td>
                        <td>'. $user->email. '</td>
                    </tr>';
                $i++;
                }
                $data .= '
            </table>';
        
        $data .= '</body></html>';
        //mb_convert_encoding($data, 'UTF-16LE', 'UTF-8');
        echo $data;
        $this->autoRender = false;
    }
}
