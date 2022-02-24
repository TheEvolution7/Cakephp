<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
use Cake\Cache\Cache;
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
    public function index()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][7];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $requestQuery = $this->request->getQuery();
        $conditions = [];   
        $conditions['Articles.status'] = 1;
        if (!empty($requestQuery['keyword'])) {
            $conditions['Articles_slug_translation.content like'] = '%' . strtolower(Text::slug($requestQuery['keyword'])) . '%';
        }
        $latest_posts  = $this->Articles
            ->find()
            ->where(['Articles.status' => 1,'featured' => 1])
            ->order(['Articles.id DESC'])
            ->limit(3)
            ->toArray();

        $order['Articles.sort'] = 'ASC';
        $order['Articles.id'] = 'DESC';

        $this->paginate = [
            'order' => $order,
            'limit' => 3
        ];
        $query = $this->Articles->find('all')->where($conditions)->contain(['ArticleCategories']);
        $articles = $this->paginate($query)->toArray();
        $articleCategories = $this->Articles->ArticleCategories->find('list', ['keyField' => 'slug','valueField' => 'title'])->where(['ArticleCategories.status' => 1,'ArticleCategories.parent_id' => 1]);
        $this->set(compact('title','description','image','articles','articleCategories','latest_posts'));
    }
    public function category($slug = null)
    {
        $categories = $this->Articles->ArticleCategories->find()->where([
            'ArticleCategories.status' => 1,
            'ArticleCategories_slug_translation.content' => $slug
        ])->first();

        $requestQuery = $this->request->getQuery();
        $conditions = [];   
        $conditions['Articles.status'] = 1;
        if (!empty($requestQuery['keyword'])) {
            $conditions['Articles_slug_translation.content like'] = '%' . strtolower(Text::slug($requestQuery['keyword'])) . '%';
        }
        $latest_posts  = $this->Articles
            ->find()
            ->where(['Articles.status' => 1,'featured' => 1])
            ->order(['Articles.id DESC'])
            ->limit(3)
            ->toArray();

        $order['Articles.sort'] = 'ASC';
        $order['Articles.id'] = 'DESC';

        $this->paginate = [
            'order' => $order,
            'limit' => 3
        ];

        $query = $this->Articles->find('all')->where($conditions)
        ->matching('ArticleCategories', function ($q) use ($categories) {
            return $q->where(['ArticleCategories.id' => $categories->id]);
        });

        $articles = $this->paginate($query)->toArray();
        $articleCategories = $this->Articles->ArticleCategories->find('list', ['keyField' => 'slug','valueField' => 'title'])->where(['ArticleCategories.status' => 1,'ArticleCategories.parent_id' => 1]);
        $title = $categories->title;
        $description = $categories->description;
        $image =  'uploads' . DS . 'article_categories' . DS . $categories->id . DS .$categories->image;
        $this->set(compact('title','description','image','articles','articleCategories','latest_posts','categories'));
    }

    public function details($slug = null)
    {
       $article = $this->Articles->find()->where([
            'Articles.status' => 1,
            'Articles_slug_translation.content' => $slug
        ])->contain(['ArticleCategories', 'Tags'])->first();

       $title = $article->title;
       $description = $article->description;
       $image =  'uploads' . DS . 'articles' . DS . $article->id . DS .$article->image;
       $keyword = $article->meta_keyword;
       $this->set(compact('title','description','image','article','keyword','recent_post'));
    }

    public function tags($tags)
    {
        $tag = $this->Articles->Tags
            ->find()
            ->where(['Tags_slug_translation.content' => $tags])
            ->first();

        $articles = $this->Articles
            ->find()
            ->where(['Tags.id' => $tag->id])
            ->innerJoinWith('Tags')
            ->contain(['ArticleCategories']);
        
        $this->paginate = [
        ];
        $articles = $this->paginate($articles)->toArray();

        $title = $tag->title;
        $keyword = $tag->title;
        $this->set(compact('articles', 'tag', 'title', 'keyword'));
    }
}