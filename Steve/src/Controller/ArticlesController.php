<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
use Cake\Cache\Cache;
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
    
    public function news()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][2];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $query = $this->Articles
            ->find()
            ->where(['Articles.status' => 1])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.id' => 2]);
            });

        $order['Articles.sort'] = 'ASC';
        $order['Articles.id'] = 'DESC';
        $this->paginate = [
            'limit' => 6,
            'order' => $order
        ];
        
        $news = $this->paginate($query)->toArray();

        

        $this->set(compact('title', 'description', 'image','news')); 
    }
    public function Newdetails($slug = null,$id = null){
        $new = $this->Articles->get($id);
        $recent_post = $this->Articles
            ->find()
            ->where(['Articles.status' => 1,'Articles.id !=' => $id])
            ->order(['Articles.id DESC'])
            ->limit(3)
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.id' => 2]);
            });

        $title = $new->title;
        $description = $new->description;
        $image =  'uploads' . DS . 'articles' . DS . $new->id . DS .$new->image;
        $this->set(compact('new','title','description','image','recent_post'));
    }
    public function services()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][4];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $services = $this->Articles
            ->find()
            ->where(['Articles.status' => 1])
            ->order(['Articles.sort' => 'ASC','Articles.id' => 'DESC'])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.id' => 1]);
            });

        $this->set(compact('title', 'description', 'image','services')); 
    }
}