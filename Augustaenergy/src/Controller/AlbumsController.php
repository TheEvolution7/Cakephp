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
class AlbumsController extends AppController
{
    public function details($id = null){
        $albums = $this->Albums->get($id,[
            'contain' => ['AlbumCategories','AlbumImages']
        ]);
        $title_for_layout = $albums->title;
        $this->set(compact('albums','title_for_layout'));
    }

    public function index(){
    	$title_for_layout = __('Albums');
    	$albums = $this->Albums->find('all',['condistion' => ['status' => 1]]);
        $this->set(compact('albums','title_for_layout'));
    }
}