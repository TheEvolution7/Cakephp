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
    
    public function learn()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][2];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $articles = $this->Articles
            ->find()
            ->where(['Articles.status' => 1])
            ->order(['Articles.sort' => 'ASC','Articles.id' => 'DESC'])
            ->innerJoinWith('ArticleCategories', function ($q)  {
                return $q->where(['ArticleCategories.id' => 1]);
            });

        $this->set(compact('title', 'description', 'image', 'articles'));
    }
    public function search()
    {
        if ($this->request->getQuery('keyword')!= '') { 
            $articles = $this->Articles->find('all',['conditions' => ['Articles.status' => 1,'OR' => ['Articles_title_translation.content LIKE' => '%'.$this->request->getQuery('keyword').'%','Articles_description_translation.content LIKE' => '%'.$this->request->getQuery('keyword').'%']]])->toArray();
        }
        $title = __('Search');
        $this->set(compact('title','articles'));
    }
}