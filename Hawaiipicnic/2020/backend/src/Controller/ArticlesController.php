<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
use Cake\I18n\I18n;
use Cake\I18n\Time;
use Cake\Utility\Text;
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
    
    public function newsDetails($slug = null,$id = null){
        $new = $this->Articles->find()->where(['Articles.id' => $id])->contain(['ArticleCategories'])->first();  
        $banners = Cache::read('banners_' . I18n::getLocale())[1][8];
        $title = $new->title;
        $description = $new->description;
        $image =  'uploads' . DS . 'articles' . DS . $new->id . DS .$new->image;
        $this->set(compact('title', 'description', 'image','new'));
    }

    public function news()
    {
        $requestQuery = $this->request->getQuery();
        $banners = Cache::read('banners_' . I18n::getLocale())[1][9];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $categories = $this->Articles->ArticleCategories->find()->where(['ArticleCategories.status' => 1,'ArticleCategories.parent_id' => 2])->toArray();

        $conditions = [];
        if (!empty($requestQuery['keyword'])) {
            $conditions['Articles_slug_translation.content like'] = '%' . Text::slug($requestQuery['keyword']) . '%';
        }
        $conditions['Articles.status'] = 1;
        $news = $this->Articles
            ->find()
            ->where($conditions)
            ->order(['Articles.sort' => 'ASC','Articles.id' => 'DESC'])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.parent_id' => 2]);
        });

        $this->paginate = [
            'limit' => 3
        ];
        $news = $this->paginate($news)->toArray();

        $latestPosts  = $this->Articles
            ->find()
            ->limit(3)
            ->where(['Articles.status' => 1,'featured' => 1])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.parent_id' => 2]);
        });
        $this->set(compact('title', 'description', 'image', 'news','categories','latestPosts'));
    }

    public function category($slug = null,$id = null){
        $requestQuery = $this->request->getQuery();
        $categories = $this->Articles->ArticleCategories->find()->where(['ArticleCategories.status' => 1,'ArticleCategories.parent_id' => 2])->toArray();
        $newCategories = $this->Articles->ArticleCategories->get($id);  

        $latestPosts  = $this->Articles
            ->find()
            ->limit(3)
            ->where(['Articles.status' => 1,'featured' => 1])
            ->innerJoinWith('ArticleCategories', function ($q) use($id){
                return $q->where(['ArticleCategories.id' => $id]);
        });

        $conditions = [];
        if (!empty($requestQuery['keyword'])) {
            $conditions['Articles_slug_translation.content like'] = '%' . Text::slug($requestQuery['keyword']) . '%';
        }
        $conditions['Articles.status'] = 1;

        $news = $this->Articles
            ->find()
            ->where($conditions)
            ->order(['Articles.sort' => 'ASC','Articles.id' => 'DESC'])
            ->innerJoinWith('ArticleCategories', function ($q) use($id){
                return $q->where(['ArticleCategories.id' => $id]);
        });
        
        $this->paginate = [
            'limit' => 3
        ];
        $news = $this->paginate($news)->toArray();
       
        $title = $newCategories->title;
        $description = $newCategories->description;
        $image =  'uploads' . DS . 'article_categories' . DS . $newCategories->id . DS .$newCategories->image;
        $this->set(compact('title', 'description', 'image', 'news','categories','latestPosts'));
    }
    public function service(){
        $banners = Cache::read('banners_' . I18n::getLocale())[1][6];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $services = $this->Articles
            ->find()
            ->where(['Articles.status' => 1])
            ->order(['Articles.sort' => 'ASC','Articles.id' => 'DESC'])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.parent_id' => 1]);
            })
        ->toArray();
        
        $this->set(compact('title', 'description', 'image','services'));
    }
    public function serviceDetails($slug = null,$id = null){

        $service = $this->Articles->get($id);  

        $serviceOther = $this->Articles
            ->find()
            ->where(['Articles.status' => 1,'Articles.id !=' => $id])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.parent_id' => 1]);
            })
        ->toArray();

        $title = $service->title;
        $description = $service->description;
        $image =  'uploads' . DS . 'articles' . DS . $service->id . DS .$service->image;
        $this->set(compact('title', 'description', 'image','service','serviceOther'));
    }
}