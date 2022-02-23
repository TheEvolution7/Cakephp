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
        $this->loadModel('ProductCategories');
        $productcategories =  $this->ProductCategories->find('all')->where(['ProductCategories.status' => 1])->limit(4)->toArray(); 
        $this->set(compact('title', 'description', 'image','productcategories'));
    }

    public function about()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][1];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));
    }

    public function service()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][2];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));
    }
    public function team()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][3];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));
    }
    
    public function contact()
    {
        // $this->loadModel('Contacts');
        // $contact = $this->Contacts->newEntity();
        // if ($this->request->is('post')) {
        // $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
        //     if ($this->Contacts->save($contact)) {
        //         $this->Flash->set(__('Your message has been successfully sent. We will contact you soon!'), ['element' => 'fly_success']);

        //         TransportFactory::setConfig('mailjet', [
        //             'host' => Configure::read('Core.setting.email_host'),
        //             'port' => Configure::read('Core.setting.email_port'),
        //             'username' => Configure::read('Core.setting.email_user'),
        //             'password' => Configure::read('Core.setting.email_password'),
        //             'className' => 'Smtp',
        //             'tls' => true
        //         ]);
                
        //         $content='Request Membership from '.Configure::read('Core.setting.owner').'<br/><br/>Dear <b>'.$contact->name.'</b> , thank you so for your form in our system.<br/>We will contact you as soon as possible!';
        //         $email = new Email();
        //         $email->transport('mailjet');

        //         $email->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
        //             ->to($contact->email)
        //             ->subject('Email request membership from website '.Configure::read('Core.setting.owner'))
        //             ->emailFormat('both')
        //             ->send($content);

                
        //             $content='Request Membership from '.Configure::read('Core.setting.owner').'<br>';
        //             $content .= 'Name: ' . $contact->name . '<br>';
        //             $content .= 'Email: ' . $contact->email . '<br>';
        //             $content .= 'Message: ' . $contact->content;

        //         $email_admin = new Email();
        //         $email_admin->transport('mailjet');

        //         $email_admin->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
        //             ->to(Configure::read('Core.setting.email'))
        //             ->subject('Email request membership from website '.Configure::read('Core.setting.owner'))
        //             ->emailFormat('both')
        //             ->send($content);  

        //         return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        //     } 
        //     $this->Flash->set(__('Error'), ['element' => 'fly_error']);
        // }
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