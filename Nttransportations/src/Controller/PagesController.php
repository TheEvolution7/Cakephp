<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\I18n\I18n;
use Cake\Cache\Cache;
use Cake\Routing\Router;
use Cake\Mailer\TransportFactory; 

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
   

    public function home()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][0];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->loadModel('Acp.Albums');
        $this->loadModel('Products');
        $gallery = $this->Albums->find()->where(['Albums.status' => 1,'Albums.id' => 1])->first();

        $tours = $this->Products
            ->find()
            ->where(['Products.status' => 1,'home' => 1,'featured' => 0])
            ->order(['Products.id' => 'DESC'])
            ->limit(2)
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.id' => 2]);
            })->toArray();

        $package = $this->Products
            ->find()
            ->where(['Products.status' => 1,'home' => 1])
            ->order(['Products.id' => 'DESC'])
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.id' => 5]);
            })->toArray();

        $this->set(compact('title','description','image','gallery','tours','package'));
    }
    public function about()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][1];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->loadModel('Acp.Products');
        $select_services = $this->Products->find('List', ['keyField' => 'id','valueField' => 'title'])
            ->where(['Products.status' => 1])
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.id' => 1]);
        });
        $this->set(compact('title','description','image','select_services'));
    }
    public function terms()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][5];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title','description','image'));
    }
    public function contact()
    {
        $this->loadModel('Contacts');
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
        $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->set(__('Your message has been successfully sent. We will contact you soon!'), ['element' => 'fly_success']);  
                TransportFactory::setConfig('mailjet', [
                    'host' => Configure::read('Core.setting.email_host'),
                    'port' => Configure::read('Core.setting.email_port'),
                    'username' => Configure::read('Core.setting.email_user'),
                    'password' => Configure::read('Core.setting.email_password'),
                    'className' => 'Smtp',
                    'tls' => true
                ]);
                
                $content='Contact from '.Configure::read('Core.setting.owner').'<br/><br/>Dear <b>'.$contact->name.'</b> , thank you so for your form in our system.';
                $email = new Email();
                $email->transport('mailjet');

                $email->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                    ->to($contact->email)
                    ->subject('Email contact from website '.Configure::read('Core.setting.owner'))
                    ->emailFormat('both')
                    ->send($content);

                
                    $content='Contact from '.Configure::read('Core.setting.owner').'<br>';
                    $content .= 'Full Name: ' . $contact->name . '<br>';
                    $content .= 'Email: ' . $contact->email . '<br>';
                    $content .= 'Phone: ' . $contact->phone . '<br>';
                    $content .= 'Message: ' . $contact->content;

                $email_admin = new Email();
                $email_admin->transport('mailjet');

                $email_admin->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                    ->to(Configure::read('Core.setting.email'))
                    ->subject('Email contact from website '.Configure::read('Core.setting.owner'))
                    ->emailFormat('both')
                    ->send($content);     
                
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            } 
            $this->Flash->set(__('Error'), ['element' => 'fly_error']);
        }
        $banners = Cache::read('banners_' . I18n::getLocale())[1][4];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function anySize(){
        $this->autoRender = false;
        require dirname(__DIR__) . '/Vendor/anysize.php';
        return false;
    }
}