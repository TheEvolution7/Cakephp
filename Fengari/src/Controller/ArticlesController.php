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
    
    public function details($slug = null, $id = null){
        $article = $this->Articles->get($id,[
            'contain' => ['ArticleCategories']
        ]);
        $title = $article->title;
        $this->set(compact('article', 'title', 'description'));
    }

    public function index(){
        $title_for_layout = __('Articles');
        $articles = $this->Articles->find('all',[
            'condistion' => ['status' => 1],
            'contain' => ['ArticleCategories']
        ]);
        $articleCategories = $this->Articles->ArticleCategories->find('all',['condistion' => ['status' => 1]]);
        $title = 'Articles';
        $this->set(compact('articles', 'articleCategories', 'title', 'description', 'image'));
    }
}