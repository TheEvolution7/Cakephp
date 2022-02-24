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
        $keyword = $banners->url;

        $this->loadModel('Products');
        $this->loadModel('Articles');
        
        $services = $this->Products
            ->find()
            ->where(['Products.status' => 1,'home' => 1])
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.parent_id' => 1]);
            
            })->limit(3)->toArray();

        $articles_home  = $this->Articles
            ->find()
            ->where(['Articles.status' => 1,'home' => 1])
            ->order(['Articles.id DESC'])
            ->contain(['ArticleCategories'])
            ->limit(3)
            ->toArray();
            
        $this->set(compact('title','description','image','articles_home','services','keyword'));
    }
    public function about()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][1];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $keyword = $banners->url;
        $this->set(compact('title','description','image','keyword'));
    }
    public function addOn()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][3];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $keyword = $banners->url;
        $this->set(compact('title','description','image','keyword'));
    }
    public function activities()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][4];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $keyword = $banners->url;
        $this->loadModel('Albums');
        $albums = $this->Albums->AlbumImages
            ->find()
            ->where(['album_id' => 1])
            ->toArray();

        $this->set(compact('title','description','image','albums','keyword'));
    }
    public function partyfavors()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][5];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $keyword = $banners->url;
        $this->set(compact('title','description','image','keyword'));
    }
    // public function snippets()
    // {
    //     $banners = Cache::read('banners_' . I18n::getLocale())[1][6];
    //     $title = $banners->title;
    //     $description = $banners->description;
    //     $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
    //     $this->loadModel('Albums');
    //     $albums = $this->Albums
    //         ->find()
    //         ->where(['Albums.status' => 1])
    //         ->order(['Albums.sort' => 'ASC','Albums.id' => 'DESC'])
    //         ->innerJoinWith('AlbumCategories', function ($q) {
    //             return $q->where(['AlbumCategories.id' => 2]);
            
    //         })->contain(['AlbumImages'])->toArray();
    //     $this->set(compact('title','description','image','albums'));
    // }
    public function faq()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][8];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $keyword = $banners->url;
        $this->loadModel('Acp.Faqs');
        $faqs = $this->Faqs
            ->find()
            ->where(['Faqs.status' => 1])
            ->order(['Faqs.sort' => 'ASC','Faqs.id' => 'DESC'])
            ->toArray();
        $this->set(compact('title','description','image','faqs','keyword'));
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
                    $content .= 'Name: ' . $contact->name . '<br>';
                    $content .= 'Email: ' . $contact->email . '<br>';
                    $content .= 'Subject: ' . $contact->title . '<br>';
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
        $banners = Cache::read('banners_' . I18n::getLocale())[1][9];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $keyword = $banners->url;
        $this->set(compact('title', 'description', 'image','keyword','contact'));   
    }
    
    public function anySize(){
        $this->autoRender = false;
        require dirname(__DIR__) . '/Vendor/anysize.php';
        return false;
    }
}