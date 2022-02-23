<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Mailer\Email;

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
        $title = __('Home');
        $this->loadModel('Articles');
        $articles = $this->Articles
            ->find()
            ->where(['Articles.status' => 1])
            ->toArray();

        $this->set(compact('title', 'description', 'image', 'articles'));
    }

    public function process()
    {
        $title = __('Process');
        $this->set(compact('title', 'description', 'image'));
    }

    public function contact()
    {
        $this->loadModel('Contacts');
        $contact = $this->Contacts->newEntity();

        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            $contact->data = serialize($this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->set(__('Your message has been successfully sent. We will contact you soon!'), ['element' => 'fly_success']);

                $content='Contact from '.Configure::read('Core.setting.owner').'<br><br>Dear <b>'.$contact->name.'</b> , thank you so for your contact in our system.';

                $email = new Email();
                $email
                    ->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                    ->to($contact->email)
                    ->subject('Email contact from website '.Configure::read('Core.setting.owner'))
                    ->emailFormat('both')
                    ->send($content);

                $content='Contact from '.Configure::read('Core.setting.owner').'<br>';
                $content .= 'Name: ' . $contact->name . '<br>';
                $content .= 'Email: ' . $contact->email . '<br>';
                $content .= 'Message: ' . $contact->content . '<br>';

                $list_emailcc = [];
                if (Configure::read('Core.setting.emailcc')) {
                    $list_emailcc = explode(',', Configure::read('Core.setting.emailcc'));
                };

                $email_admin = new Email();
                $email_admin
                    ->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                    ->to(Configure::read('Core.setting.email'))
                    ->subject('You have email contact from website '.Configure::read('Core.setting.owner'))
                    ->cc($list_emailcc)
                    ->emailFormat('both')
                    ->send($content);

                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            }
            
            $this->Flash->set(__('Error'), ['element' => 'fly_error']);
        }

        // $banners = Cache::read('banners_' . I18n::getLocale())[13][0];
        // $title = $banners->title;
        // $description = $banners->description;
        // $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $title = __('Contact');
        $this->set(compact('title', 'description', 'image', 'contact'));
    }

    public function anySize(){
        $this->autoRender = false;
        require dirname(__DIR__) . '/Vendor/anysize.php';
        return false;
    }
}