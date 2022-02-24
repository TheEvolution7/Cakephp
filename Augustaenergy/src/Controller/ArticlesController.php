<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    
    public function projectDetails($slug = null, $id = null){
        $article = $this->Articles->get($id,[
            'contain' => ['ArticleCategories']
        ]);
        $title = $article->title;
        $this->set(compact('article', 'title', 'description'));
    }

    public function projects(){
        $articles = $this->Articles
            ->find()
            ->where(['Articles.status' => 1, 'ArticleCategories.parent_id' => 5])
            ->contain(['ArticleCategories'])
            ->innerjoinwith('ArticleCategories');

        $articleCategories = $this->Articles->ArticleCategories
            ->find()
            ->where(['ArticleCategories.status' => 1, 'ArticleCategories.parent_id' => 5]);

        $title = 'Projects';
        $this->set(compact('articles', 'articleCategories', 'title', 'description', 'image'));
    }

    public function articleDetails($slug = null, $id = null){
        $article = $this->Articles->get($id,[
            'contain' => ['ArticleCategories']
        ]);
        $title = $article->title;

        $articleCategories = $this->Articles->ArticleCategories
            ->find()
            ->where(['ArticleCategories.status' => 1, 'ArticleCategories.parent_id' => 3]);

        $articles = $this->Articles
            ->find()
            ->where(['Articles.status' => 1, 'ArticleCategories.parent_id' => 3])
            ->contain(['ArticleCategories'])
            ->innerjoinwith('ArticleCategories');

        $this->set(compact('article', 'title', 'description', 'articleCategories', 'articles'));
    }

    public function articles(){
        $articles = $this->Articles
            ->find()
            ->where(['Articles.status' => 1, 'ArticleCategories.parent_id' => 3])
            ->contain(['ArticleCategories'])
            ->innerjoinwith('ArticleCategories');

        $articleCategories = $this->Articles->ArticleCategories
            ->find()
            ->where(['ArticleCategories.status' => 1, 'ArticleCategories.parent_id' => 3]);

        $title = 'Blog';
        $this->set(compact('articles', 'articleCategories', 'title', 'description', 'image'));
    }
}