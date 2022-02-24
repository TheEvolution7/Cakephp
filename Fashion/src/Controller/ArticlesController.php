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
    
    public function blog()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][3];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $articles = $this->Articles
            ->find()
            ->where(['Articles.status' => 1])
            ->innerJoinWith('ArticleCategories', function ($q) {
                return $q->where(['ArticleCategories.id' => 1]);
            });

        $order['Articles.sort'] = 'ASC';
        $order['Articles.id'] = 'DESC';
        $this->paginate = [
            'limit' => 6,
            'order' => $order
        ];

        $articles = $this->paginate($articles)->toArray();

        $this->set(compact('title', 'description', 'image','articles')); 
    }
    public function details($slug = null)
    {
        $article = $this->Articles->find()->where([
            'Articles.status' => 1,
            'Articles_slug_translation.content' => $slug
        ])->contain(['ArticleCategories'])->first();

        $related  = $this->Articles
            ->find()
            ->where(['Articles.status' => 1, 'Articles.id !=' => $article->id])
            ->matching('ArticleCategories', function ($q) use($article){
                return $q->where(['ArticleCategories.id' => $article->article_categories[0]->id]);
            })->toArray();


        $title = $article->title;
        $description = $article->meta_description;
        $image =  'uploads' . DS . 'articles' . DS . $article->id . DS .$article->image;
        $this->set(compact('article', 'title', 'description', 'image','related'));

    }
}