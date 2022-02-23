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
    
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    
    public function category($id = null){

        $conditions['status'] = 1;
        $conditions['article_category_id IN'] = $id;

        $order['order'] = 'ASC';
        $order['id'] = 'DESC';

        $this->paginate = [
            'order' => $order,
            'conditions' => $conditions,
        ];

        $news = $this->paginate($this->Articles->find('all'));

        $articleCategories = $this->Articles->ArticleCategories->get($id);
        $title_for_layout = $articleCategories->title;

        $this->set(compact('news','title_for_layout','articleCategories'));
    }
    
    public function newsDetails($id = null){
        $news = $this->Articles->get($id,[
            'contain' => ['ArticleCategories']
        ]);

        $title_for_layout = $news->title;
        $this->set(compact('news','title_for_layout'));
    }

    public function news()
    {

        $articleCategories = $this->Articles->ArticleCategories->find('all',['conditions' => ['parent_id' => 10,'status' => 1]])->toArray();
        $title_for_layout = __('News');
        $this->set(compact('articleCategories','title_for_layout'));
    }
    
    public function newsCategories($id = null)
    {
        $this->layout = 'event';
        $conditions = [
            'status' => 1
        ];

        $articleCategories = $this->Articles->ArticleCategories->get($id);
            
        $conditions['article_category_id IN'] = $articleCategories->id;
        
        $articles = $this->Articles->find('all',['conditions' => $conditions])->toArray();
        $title_for_layout = $articleCategories->title;

        $this->set(compact('articleCategories','title_for_layout','articles'));
    }

    public function newsDetail($id = null)
    {
        $article = $this->Articles->get($id,[
            'contain' => ['ArticleCategories']
        ]);
        $title_for_layout = $article->title;
        $this->set(compact('article','title_for_layout'));
    }
}