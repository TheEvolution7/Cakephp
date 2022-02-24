<?php
namespace Acp\Controller;

use Acp\Controller\AppController;
// Custom
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\I18n\I18n;
/**
 * Pages Controller
 *
 * @property \Acp\Model\Table\PagesTable $Pages
 *
 * @method \Acp\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

    public function dashboard()
    {
        $mArticles = TableRegistry::getTableLocator()->get('Acp.Articles');
        $mOrders = TableRegistry::getTableLocator()->get('Acp.Orders');
        $mProducts = TableRegistry::getTableLocator()->get('Acp.Products');
        $mContacts = TableRegistry::getTableLocator()->get('Acp.Contacts');
        $mUsers = TableRegistry::getTableLocator()->get('Acp.Users');
        $mUsersLogs = TableRegistry::getTableLocator()->get('Acp.UsersLogs');
        $mTasks = TableRegistry::getTableLocator()->get('Acp.Tasks');
        

        $countArticles = $mArticles->find()->count();
        $countOrders = $mOrders->find()->count();
        $countProducts = $mProducts->find()->count();
        $countContacts = $mContacts->find()->count();

        $articles = $mArticles
            ->find()
            ->limit(3)
            ->order(['Articles.id' => 'DESC']);

        $orders = $mOrders
            ->find()
            ->limit(3)
            ->order(['Orders.id' => 'DESC']);

        $products = $mProducts
            ->find()
            ->limit(3)
            ->order(['Products.view_count' => 'DESC','Products.id' => 'DESC'])
            ->contain(['OrderDetails']);

        $contacts = $mContacts
            ->find()
            ->order(['Contacts.id' => 'desc'])
            ->limit(3);
        
        $users = $mUsers
            ->find()
            ->order(['Users.id' => 'desc'])
            ->limit(5);

        $logs_login = $mUsersLogs->find()
            ->where([
                'UsersLogs.action IN' => [
                    'Users.login.successed',
                    'Users.login.failed'
                    ]
                ])
            ->order(['UsersLogs.id' => 'desc'])
            ->limit(6)->toArray();

        $logs_action = $mUsersLogs->find()
            ->where([
                'UsersLogs.action NOT IN' => [
                    'Users.login.successed',
                    'Users.login.failed'
                    ]
                ])
            ->order(['UsersLogs.id' => 'desc'])
            ->limit(6)->toArray();

        $tasks_year = $mTasks
            ->find()
            ->where(function (QueryExpression $exp, Query $q) {
                $year = $q->func()->year([
                    'date' => 'identifier'
                ]);
                return $exp
                    ->eq($year, Time::now()->year);
            })->order(['Tasks.id' => 'DESC'])
            ->toArray();

        $tasks_month = $mTasks
            ->find()
            ->where(function (QueryExpression $exp, Query $q) {
                $month = $q->func()->month([
                    'date' => 'identifier'
                ]);
                return $exp
                    ->eq($month, Time::now()->month);
            })->order(['Tasks.id' => 'DESC'])
            ->toArray();

        $tasks_date = $mTasks
            ->find()
            ->where(function (QueryExpression $exp, Query $q) {
                $day = $q->func()->day([
                    'date' => 'identifier'
                ]);
                return $exp
                    ->eq($day, Time::now()->day);
            })->order(['Tasks.id' => 'DESC'])
            ->toArray();

        $this->set(compact('users','articles','orders','products','users','contacts','countArticles', 'countOrders', 'countProducts', 'countContacts','logs_action','logs_login','tasks_year','tasks_month','tasks_date'));



        $mapper = function ($aritlce, $key, $mapReduce) {
            $month_aritlce = new Time($aritlce['created']);
            for ($month=0; $month < 12; $month++) {
                if ($month_aritlce->month == $month) {
                    $mapReduce->emitIntermediate(1, $month);
                }else{
                    $mapReduce->emitIntermediate(0, $month);
                }
            }
        };
        $reducer = function ($aritlces, $month, $mapReduce) {
            $mapReduce->emit($aritlces, $month);
        };
        $aritlces_year = $mArticles
            ->find()
            ->where(function (QueryExpression $exp, Query $q) {
                $year = $q->func()->year([
                    'created' => 'identifier'
                ]);
                return $exp
                    ->eq($year, Time::now()->year);
            })->order(['Articles.view_count' => 'DESC','Articles.id' => 'DESC'])
            ->mapReduce($mapper, $reducer)
            ->disableHydration()
            ->toArray();
        $data_aritlces_year = [];
        $count_data_articles_year = 0;
        foreach ($aritlces_year as $month => $aritlces) {
            if (!isset($data_aritlces_year[$month])) {
                $data_aritlces_year[$month] = 0;
            }
            foreach ($aritlces as $aritlce) {
                $data_aritlces_year[$month] += $aritlce;
                if ($aritlce > 0) {
                    $count_data_articles_year++;
                }
            }
        }
        ksort($data_aritlces_year);

        $mapper = function ($order, $key, $mapReduce) {
            $month_order = new Time($order['created']);
            for ($month=0; $month < 12; $month++) {
                if ($month_order->month == $month) {
                    $mapReduce->emitIntermediate(1, $month);
                }else{
                    $mapReduce->emitIntermediate(0, $month);
                }
            }
        };
        $reducer = function ($orders, $month, $mapReduce) {
            $mapReduce->emit($orders, $month);
        };
        $orders_final_year = $mOrders
            ->find()
            ->where(function (QueryExpression $exp, Query $q) {
                $year = $q->func()->year([
                    'created' => 'identifier'
                ]);
                return $exp
                    ->eq($year, Time::now()->year);
            })->andWhere(['Orders.status >=' => 3])
            ->order(['Orders.created' => 'DESC','Orders.id' => 'DESC'])
            ->mapReduce($mapper, $reducer)
            ->disableHydration()
            ->toArray();
        $data_orders_final_year = [];
        foreach ($orders_final_year as $month => $orders) {

            if (!isset($data_orders_final_year[$month])) {
                $data_orders_final_year[$month] = 0;
            }
            foreach ($orders as $order) {
                $data_orders_final_year[$month] += $order;
            }
        }
        ksort($data_orders_final_year);

        $orders_watting_year = $mOrders
            ->find()
            ->where(function (QueryExpression $exp, Query $q) {
                $year = $q->func()->year([
                    'created' => 'identifier'
                ]);
                return $exp
                    ->eq($year, Time::now()->year);
            })->andWhere(['Orders.status <' => 3])
            ->order(['Orders.created' => 'DESC','Orders.id' => 'DESC'])
            ->mapReduce($mapper, $reducer)
            ->disableHydration()
            ->toArray();
        $data_orders_watting_year = [];
        foreach ($orders_watting_year as $month => $orders) {
            if (!isset($data_orders_watting_year[$month])) {
                $data_orders_watting_year[$month] = 0;
            }
            foreach ($orders as $order) {
                $data_orders_watting_year[$month] += $order;
            }
        }
        ksort($data_orders_watting_year);
        
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
        $mapper = function ($product, $key, $mapReduce) {
            $month_product = new Time($product['created']);
            for ($month=0; $month < 12; $month++) {
                if ($month_product->month == $month) {
                    $mapReduce->emitIntermediate(1, $month);
                }else{
                    $mapReduce->emitIntermediate(0, $month);
                }
            }
        };
        $reducer = function ($products, $month, $mapReduce) {
            $mapReduce->emit($products, $month);
        };
        $products_year = $mProducts
            ->find()
            ->where(function (QueryExpression $exp, Query $q) {
                $year = $q->func()->year([
                    'created' => 'identifier'
                ]);
                return $exp
                    ->eq($year, Time::now()->year);
            })->order(['Products.view_count' => 'DESC','Products.id' => 'DESC'])
            ->mapReduce($mapper, $reducer)
            ->disableHydration()
            ->toArray();
        $data_products_year = [];
        $count_data_products_year =0;
        foreach ($products_year as $month => $products) {

            if (!isset($data_products_year[$month])) {
                $data_products_year[$month] = 0;
            }
            foreach ($products as $product) {
                $data_products_year[$month] += $product;
                if ($product > 0) {
                    $count_data_products_year++;
                }
            }
        }
        ksort($data_products_year);

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
        $users_gender = $mUsers
            ->find()
            ->where(['Users.role_id' => 3,'Users.status' => 1])->order(['Users.id' => 'DESC'])
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


        $this->set(compact('data_products_year','data_aritlces_year','count_data_products_year','count_data_articles_year','data_orders_final_year','data_orders_watting_year','data_users_gender','count_data_users','orders_country','data_orders_country'));
    }
    
    public function search()
    {
        $arrModel = ['Articles', 'Products', 'Albums', 'Banners'];
        foreach ($arrModel as $model) {
            $this->loadModel('Acp.' . $model);
        }

        $listData  = [];

        if (!empty($this->request->getQuery() && $this->request->getQuery('keyword') != '')) {

            $requestQuery = $this->request->getQuery();
            $conditions = [];

            if (!empty($requestQuery['keyword'])) {
                if (is_numeric($requestQuery['keyword'])) {
                    foreach ($arrModel as $model) {
                        $conditions[$model][$model . '.id'] = $requestQuery['keyword'];
                    }
                } else {
                    foreach ($arrModel as $model) {
                        $conditions[$model][$model . '_slug_translation.content like'] = '%' . strtolower(Text::slug($requestQuery['keyword'])) . '%';
                    }
                }
            }
            
            // In a controller action
            foreach ($arrModel as $model) {
                $models = $this->paginate($this->$model->find('translations')->where($conditions[$model])->contain([rtrim($model,"s") . 'Categories' => 'Parent'. rtrim($model,"s") .'Categories']), ['scope' => strtolower(rtrim($model,"s")),'limit' => 20]);
                $listData[$model] = $models;
            }  

            $this->set(compact('listData'));
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $requestQuery = $this->request->getQuery();
        $limit = !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10;
        
        $conditions = [];
        $order = ['Pages.id' => 'DESC'];

        if (!empty($requestQuery['keyword'])) {
            $conditions['Pages_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';


        }
        if (!empty($requestQuery['page_category_id'])) {
            $pageCategory = $this->Pages->PageCategories->get($requestQuery['page_category_id'], [
                'contain' => []
            ]);

            if (!empty($pageCategory)) {
                $conditions['PageCategories.lft >='] = $pageCategory->lft;
                $conditions['PageCategories.rght <='] = $pageCategory->rght;
            }

            $order = ['Pages.sort' => 'DESC'];
        }

        $this->paginate = [
            'contain' => ['PageCategories', 'Users'],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $pages = $this->paginate($this->Pages->find('translations'));

        $pageCategories = $this->Pages->PageCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('pages', 'requestQuery', 'pageCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => ['PageCategories', 'Users']
        ]);

        $this->set('page', $page);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            $page->uuid = Text::uuid();
            $page->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $page->slug = strtolower(Text::slug($page->title));
            $page->slug_custom = strtolower(Text::slug($page->slug_custom));

            if ($this->Pages->save($page)) {
                $uploadPath = 'uploads' . DS . 'pages'. DS . $page->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($page->uuid,$page->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The page could not be saved. Please, try again.'));
        }
        $pageCategories = $this->Pages->PageCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('page', 'pageCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Pages->setlocale($getQueryLanguageId);
        }
        
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            $page->slug = strtolower(Text::slug($page->title));
            $page->slug_custom = strtolower(Text::slug($page->slug_custom));
            if ($this->Pages->save($page)) {
                $this->Flash->success(__d('acp', 'The page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The page could not be saved. Please, try again.'));
        }
        $pageCategories = $this->Pages->PageCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('page', 'pageCategories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__d('acp', 'The page has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
