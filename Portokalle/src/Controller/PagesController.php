<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\Cache\Cache;
use Cake\Routing\Router;
use Cake\Mailer\TransportFactory; 

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

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
    // public function test()
    // {
    //     $this->autoRender = false;

    //     $this->loadModel('Acp.BannerCategories');
    //     $node = 152;
    //     $listId[] = $node;
    //     $bannerCategories = $this->BannerCategories
    //         ->find('list')
    //         ->where(['parent_id' => $node])
    //         ->toArray();
    //     $listId = array_merge($listId, $bannerCategories);

    //     $id = [65, 66, 67, 69, 70, 71];

    //     $file = new File(APP . DS . 'Template' . DS .'Pages' . DS . 'ob_gyn.ctp');
    //     $file->replaceText($id, $listId);
    //     $file->close();
    // }

    public function termAndConditions(){

    }

    public function privacyPolicy(){

    }
    
    public function home()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][0];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function ourDoctor()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][1];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function pricing()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][2];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function specialities()
    {
        $this->loadModel('Specialities');

        $specialities = $this->Specialities
            ->find()
            ->where(['Specialities.status' => 1]);

        // $this->loadModel('Acp.Banners');
        // $categories = $this->Banners->BannerCategories->find('list', [
        //     'keyField' => 'id',
        //     'valueField' => 'title',
        //     'conditions' => 
        //         [
        //         'BannerCategories.status' => 1,
        //         'BannerCategories.parent_id' => 58
        //         ]
        //     ]
        // );   
        // $query_banners = $this->Banners
        //     ->find()
        //     ->where(['Banners.status' => 1])
        //     ->innerJoinWith('BannerCategories', function ($q) {
        //         return $q->where(['BannerCategories.parent_id' => 58]);
        //    });
            
        $banners = Cache::read('banners_' . I18n::getLocale())[1][3];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image','categories','query_banners', 'specialities'));
        
    }

    public function speciality($slug = null){
        $this->loadModel('Specialities');
        $speciality = $this->Specialities
            ->find()
            ->where(['Specialities_slug_translation.content like' => $slug])
            ->first();
            
        $title = $speciality->title;

        $this->loadModel('Acp.BannerCategories');
        //$this->BannerCategories->setlocale('Al');
        $getCategory = $this->BannerCategories
            ->find()
            ->where(['BannerCategories_slug_translation.content like' => '%' . $slug . '%'])
            ->first();
        
        if (isset($getCategory)) {
            $node = $getCategory->id;
            $listId[] = $node;
            $bannerCategories = $this->BannerCategories
                ->find('list')
                ->where(['parent_id' => $node])
                ->toArray();
            $listId = array_merge($listId, $bannerCategories);
        }
        
        //$id = [65, 66, 67, 69, 70, 71];
        // $id = [74, 75, 76, 77, 78, 79];
        // $file = new File(APP . DS . 'Template' . DS .'Pages' . DS . 'pediatric.ctp');
        // $content = $file->read();
        // $new = str_replace($id, $listId, h($content));
        $this->set(compact('speciality', 'title', 'new', 'listId'));
    }

    public function features()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][4];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function howItWork()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][5];
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
                    $content .= 'Full Name: ' . $contact->name . '<br>';
                    $content .= 'Email: ' . $contact->email . '<br>';
                    $content .= 'Phone: ' . $contact->phone . '<br>';
                    $content .= 'Speciality: ' . $contact->title . '<br>';
                    $content .= 'Region(s) of Licensure: ' . $contact->address . '<br>';
                    $content .= 'How did you hear about us?: ' . $contact->about . '<br>';
                    $content .= 'Physician College Online Listing (optional): ' . $contact->content . '<br>';

         
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
        $banners = Cache::read('banners_' . I18n::getLocale())[1][6];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function about()
    {
         $banners = Cache::read('banners_' . I18n::getLocale())[1][7];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
   
    // public function dermatology()
    // {
    //     $banners = Cache::read('banners_' . I18n::getLocale())[1][8];
    //     $title = $banners->title;
    //     $description = $banners->description;
    //     $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
    //     $this->loadModel('Articles');
    //     $articles = $this->Articles
    //         ->find()
    //         ->where(['Articles.status' => 1,'featured' => 1])
    //         ->limit(3)
    //         ->innerJoinWith('ArticleCategories', function ($q) {
    //             return $q->where(['ArticleCategories.id' => 2]);
    //         });
    //     $this->set(compact('title', 'description', 'image','articles'));   
    // }
    public function pediatric()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][9];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }
    public function neurology()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][10];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }

    public function neuropediatrics()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][11];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }
    
    public function psychiatric()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][12];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }

    
    public function dermatology()
    {
         $banners = Cache::read('banners_' . I18n::getLocale())[1][13];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
       
    }
    public function cardiology()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][14];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }
    public function pediatricCardiologists()
    {
         $banners = Cache::read('banners_' . I18n::getLocale())[1][15];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }
    public function pulmonary()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][16];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }
    public function surgery()
    {
         $banners = Cache::read('banners_' . I18n::getLocale())[1][17];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }
    public function gi()
    {
         $banners = Cache::read('banners_' . I18n::getLocale())[1][18];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function rheumatology()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][19];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));    
    }
    public function allergist()
    {
         $banners = Cache::read('banners_' . I18n::getLocale())[1][20];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
    }
    public function endocrinology()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][21];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
    }
    public function obGyn()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][22];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title', 'description', 'image'));   
        
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

    public function becomeAProvider()
    {
        $this->loadModel('Personals');
        $personal = $this->Personals->newEntity();

        if ($this->request->is('post')) {
            $session = $this->getRequest()->getSession();
            $session->write('becomeAProvider', $this->request->getData());
            return $this->redirect(['prefix' => 'practitioner', 'controller' => 'Users','action' => 'register']);
        }

        $this->set(compact('personal'));
    }

    public function anySize(){
        $this->autoRender = false;
        require dirname(__DIR__) . '/Vendor/anysize.php';
        return false;
    }
}