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
        $product_home = $this->Products->find()->where(['Products.status' => 1,'home' => 1])->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])->limit(6);
        $this->set(compact('title', 'description', 'image','product_home'));
    }
    public function work()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][1];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));
    }
    public function faq()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][2];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->loadModel('Acp.Faqs');
        $shoping = $this->Faqs->find()->where(['Faqs.status' => 1,'Faqs.faq_category_id' => 2])->order(['Faqs.sort' => 'ASC','Faqs.id' => 'DESC'])->toArray();
        $payment = $this->Faqs->find()->where(['Faqs.status' => 1,'Faqs.faq_category_id' => 3])->order(['Faqs.sort' => 'ASC','Faqs.id' => 'DESC'])->toArray();
        $this->set(compact('title', 'description', 'image','shoping','payment'));
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

                // TransportFactory::setConfig('mailjet', [
                //     'host' => Configure::read('Core.setting.email_host'),
                //     'port' => Configure::read('Core.setting.email_port'),
                //     'username' => Configure::read('Core.setting.email_user'),
                //     'password' => Configure::read('Core.setting.email_password'),
                //     'className' => 'Smtp',
                //     'tls' => true
                // ]);
                
                // $content='Newsletters from '.Configure::read('Core.setting.owner').'<br/><br/>Thank you so for your form in our system.';
                // $email = new Email();
                // $email->transport('mailjet');

                // $email->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                //     ->to($contact->email)
                //     ->subject('Email newsletters from website '.Configure::read('Core.setting.owner'))
                //     ->emailFormat('both')
                //     ->send($content);

                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            }
            
            $this->Flash->set(__('Error'), ['element' => 'fly_error']);
        }
    }

    public function anySize(){
        $this->autoRender = false;
        require dirname(__DIR__) . '/Vendor/anysize.php';
        return false;
    }
    public function pages($slug = null)
    {
        $this->loadModel('Acp.Pages');
        $page = $this->Pages->find()->where([
            'Pages.status' => 1,
            'Pages_slug_translation.content' => $slug
        ])->first();
        $title = $page->title;
        $description = $page->description;
        $image =  'uploads' . DS . 'Pages' . DS . $page->id . DS .$page->image;
        $this->set(compact('title', 'description', 'image','page'));
    }
   
}