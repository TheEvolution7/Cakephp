<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
use Cake\I18n\I18n;

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

        $albums = $this->Albums
            ->find()
            ->where(['status' => 1, 'Albums.id !=' => $id])
            ->contain(['AlbumCategories'])
            ->toArray();

        $this->set(compact('album','title', 'albums'));
    }

    public function index(){
    	$banners = Cache::read('banners_' . I18n::getLocale())[1][5];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $albums = $this->Albums
            ->find()
            ->where(['status' => 1])
            ->contain(['AlbumCategories'])
            ->toArray();
        $albumCategories = $this->Albums->AlbumCategories
            ->find()
            ->where(['status' => 1])
            ->toArray();
        $this->set(compact('title', 'description', 'image', 'albums', 'albumCategories'));
    }
}