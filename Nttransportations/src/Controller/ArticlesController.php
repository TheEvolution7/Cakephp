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

    public function details($slug = null)
    {
        $article = $this->Articles->find()->where([
            'Articles.status' => 1,
            'Articles_slug_translation.content' => $slug
        ])
        ->contain(['ArticleCategories'])
        ->first();
        
        $recent_post = $this->Articles
            ->find()
            ->where(['Articles.status' => 1,'Articles.id !=' => $article->id])
            ->order(['Articles.id DESC'])
            ->limit(3)
            ->innerJoinWith('ArticleCategories', function ($q) use($article) {
                return $q->where(['ArticleCategories.id' => $article->article_categories[0]->id]);
            });

        $title = $article->title;
        $description = $article->description;
        $image =  'uploads' . DS . 'articles' . DS . $article->id . DS .$article->image;
        $this->set(compact('article','title','description','image','recent_post'));
    }

    public function index()
    {
        $articles = $this->Articles
            ->find()
            ->where(['Articles.status' => 1])
            ->order(['Articles.sort ASC','Articles.id DESC'])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.id' => 1]);
            });
        $banners = Cache::read('banners_' . I18n::getLocale())[1][3];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('articles','title','description','image'));
    }
  
}