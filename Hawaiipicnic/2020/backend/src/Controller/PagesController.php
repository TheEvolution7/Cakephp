<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\Mailer\TransportFactory;
use Cake\Cache\Cache;
use Cake\I18n\I18n;
use Cake\I18n\Time;


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

        $this->loadModel('Articles');
        $this->loadModel('Albums');
        $services = $this->Articles
            ->find()
            ->where(['Articles.status' => 1,'home' => 1])
            ->order(['Articles.sort' => 'ASC','Articles.id' => 'DESC'])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.parent_id' => 1]);
            })
        ->toArray();

        $news = $this->Articles
            ->find()
            ->limit(3)
            ->where(['Articles.status' => 1,'home' => 1])
            ->order(['Articles.sort' => 'ASC','Articles.id' => 'DESC'])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.parent_id' => 2]);
        });

        $album = $this->Albums
            ->find()
            ->where(['Albums.status' => 1])
            ->contain(['AlbumImages'])
            ->first();

        $this->set(compact('title', 'description', 'image','services','news','album'));
    }

    public function about()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][1];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));
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
                    $content .= 'Subject' . $contact->title . '<br>';
                    $content .= 'Message: ' . $contact->content . '<br>';
                
                $email_admin = new Email();
                $email_admin->transport('mailjet');

                $email_admin->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                    ->to(Configure::read('Core.setting.email'))
                    ->subject('Email contact from website '.Configure::read('Core.setting.owner'))
                    ->emailFormat('both')
                    ->send($content);
                $list_emailcc = explode(',', Configure::read('Core.setting.emailcc'));
                foreach ($list_emailcc as $emailcc) {
                    if (!empty($emailcc)) {
                        $content='Contact from '.Configure::read('Core.setting.owner'). '<br>';
                        $content .= 'Name: ' . $contact->name . '<br>';
                        $content .= 'Email: ' . $contact->email . '<br>';
                        $content .= 'Subject' . $contact->title . '<br>';
                        $content .= 'Message' . $contact->content . '<br>';
                        $email_cc = new Email();
                        $email_cc->transport('mailjet');

                        $email_cc->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                            ->to($emailcc)
                            ->subject('You have email contact from website '.Configure::read('Core.setting.owner'))
                            ->emailFormat('both')
                            ->send($content);
                    }
                }
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            } 
            $this->Flash->set(__('Error'));
        }
        $banners = Cache::read('banners_' . I18n::getLocale())[1][2];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }

    public function faq()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][3];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->loadModel('Acp.Faqs');
        $faqs = $this->Faqs->find('all')->where(['status' => 1])->order(['Faqs.sort' => 'ASC','Faqs.id' => 'DESC'])->toArray();
        $this->set(compact('title', 'description', 'image','faqs'));
    }
    public function partyfavors()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][4];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));
    }
    public function terms()
    {
        $this->loadModel('Acp.Pages');
        $terms = $this->Pages->find()->where(['status' => 1,'Pages.id' => 1])->first();
        $title = $terms->title;
        $description = $terms->description;
        $image =  'uploads' . DS . 'pages' . DS . $terms->id . DS .$terms->image;
        $this->set(compact('title', 'description', 'image','terms'));
    }
    public function activities()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][5];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        // gallery
        $this->loadModel('Albums');
        $album = $this->Albums
            ->find()
            ->where(['Albums.status' => 1,'Albums.id' => 1])
            ->contain(['AlbumImages'])
            ->first();
        $this->set(compact('title', 'description', 'image','album'));
    }
    public function anySize(){
        $this->autoRender = false;
        require dirname(__DIR__) . '/Vendor/anysize.php';
        return false;
    }
}