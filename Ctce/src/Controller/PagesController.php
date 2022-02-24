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

        $this->loadModel('Products');
        $products = $this->Products
            ->find()
            ->where(['status' => 1, 'home' => 1])
            ->toArray();
        $this->set(compact('title','description','image', 'products'));
    }
    public function contact()
    {
        $this->loadModel('Contacts');
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
        $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->set(__('Your message has been successfully sent. We will contact you soon!'), ['element' => 'fly_success']);

                // TransportFactory::setConfig('mailjet', [
                //     'host' => Configure::read('Core.setting.email_host'),
                //     'port' => Configure::read('Core.setting.email_port'),
                //     'username' => Configure::read('Core.setting.email_user'),
                //     'password' => Configure::read('Core.setting.email_password'),
                //     'className' => 'Smtp',
                //     'tls' => true
                // ]);
                
                // $content='Contact from '.Configure::read('Core.setting.owner').'<br/><br/>Dear <b>'.$contact->name.'</b> , thank you so for your form in our system.<br/>We will contact you as soon as possible!';
                // $email = new Email();
                // $email->transport('mailjet');

                // $email->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                //     ->to($contact->email)
                //     ->subject('Email contact from website '.Configure::read('Core.setting.owner'))
                //     ->emailFormat('both')
                //     ->send($content);

                
                //     $content='Contact from '.Configure::read('Core.setting.owner').'<br>';
                //     $content .= 'First Name: ' . $contact->name . '<br>';
                //     $content .= 'Last Name: ' . $contact->last_name . '<br>';
                //     $content .= 'Email: ' . $contact->email . '<br>';
                //     $content .= 'Phone: ' . $contact->phone . '<br>';
                //     $content .= 'Discusss about: ' . $contact->title . '<br>';
                //     $content .= 'Message: ' . $contact->content;

                // $email_admin = new Email();
                // $email_admin->transport('mailjet');

                // $email_admin->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                //     ->to(Configure::read('Core.setting.email'))
                //     ->subject('Email contact from website '.Configure::read('Core.setting.owner'))
                //     ->emailFormat('both')
                //     ->send($content);  

                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            } 
            $this->Flash->set(__('Error'), ['element' => 'fly_error']);
        }
        $banners = Cache::read('banners_' . I18n::getLocale())[1][1];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function page($slug = null)
    {
        $this->loadModel('Acp.Pages');
        $page = $this->Pages->find()->where([
            'Pages.status' => 1,
            'Pages_slug_translation.content' => $slug
        ])->first();
        $title = $page->title;
        $this->set(compact('title','page'));     
    }
    public function newsletter()
    {
        $this->autoRender = false;
        $this->loadModel('Newsletters');
        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->getData());
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->set(__('Sent Successfully!'), ['element' => 'fly_success']);
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            }
            $this->Flash->set(__('Error'), ['element' => 'fly_error']);
        }
    }
}