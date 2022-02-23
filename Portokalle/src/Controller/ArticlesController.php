<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\Cache\Cache;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
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
    

    public function career()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][24];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $careers = $this->Articles
            ->find()
            ->where(['Articles.status' => 1])
            ->order(['Articles.sort' => 'ASC','Articles.id' => 'DESC'])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.id' => 3]);
            });
        $this->set(compact('title', 'description', 'image','careers'));   
        
    }
    public function careerDetails($slug = null,$id = null)
    {
        
        $career = $this->Articles->get($id);
        //form career
        $this->loadModel('Careers');
        $careers = $this->Careers->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['uuid'] = $career->uuid;
            $this->request->data['slug'] = $career->slug;
            $this->request->data['article_id'] = $career->id;
            $careers = $this->Careers->patchEntity($careers, $this->request->getData());
            if ($this->Careers->save($careers)) {
                $this->Flash->set(__('Sent Successfully!'), ['element' => 'fly_success']);
                TransportFactory::setConfig('mailjet', [
                    'host' => Configure::read('Core.setting.email_host'),
                    'port' => Configure::read('Core.setting.email_port'),
                    'username' => Configure::read('Core.setting.email_user'),
                    'password' => Configure::read('Core.setting.email_password'),
                    'className' => 'Smtp',
                    'tls' => true
                ]);

                $content='Career from '.Configure::read('Core.setting.owner').'<br/><br/>Dear <b>'.$careers->name.'</b>,thank you so for your form in our system.</br></br> We will contact you as soon as possible.';
                $email = new Email();
                $email->transport('mailjet');

                $email->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                    ->to($careers->email)
                    ->subject('Email career from website '.Configure::read('Core.setting.owner'))
                    ->emailFormat('both')
                    ->send($content);

                return $this->redirect(['controller' => 'Articles', 'action' => 'career']);
            }
            $this->Flash->set(__('Error'), ['element' => 'fly_error']);
        }

        $title = $career->title;
        $description = $career->description;
        $image =  'uploads' . DS . 'articles' . DS . $career->id . DS .$career->image;
        $this->set(compact('career','title','description','image'));
    }

}