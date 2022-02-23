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
    public function details($slug = null, $id = null){
        $album = $this->Albums->get($id,[
            'contain' => ['AlbumCategories','AlbumImages']
        ]);
        $title = $album->title;
        $this->set(compact('album', 'title', 'description', 'image'));
    }

    public function index(){
    	$title_for_layout = __('Albums');
    	$albums = $this->Albums->find('all',[
            'condistion' => ['status' => 1],
            'contain' => ['AlbumCategories']
        ]);
        $albumCategories = $this->Albums->AlbumCategories->find('all',['condistion' => ['status' => 1]]);
        $title = 'Projects';
        $this->set(compact('albums', 'albumCategories', 'title', 'description', 'image'));
    }
}