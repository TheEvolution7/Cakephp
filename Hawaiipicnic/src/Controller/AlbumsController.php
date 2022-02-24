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
class AlbumsController extends AppController
{
    public function details($slug = null, $id = null){
        $album = $this->Albums->get($id,[
            'contain' => ['AlbumCategories','AlbumImages']
        ]);
        $title = $album->title;
        $description = $album->description;
        $this->set(compact('album', 'title', 'description'));
    }

    public function index()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][6];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $keyword = $banners->url;
        $albums = $this->Albums
            ->find()
            ->where(['Albums.status' => 1])
            ->order(['Albums.sort' => 'ASC','Albums.id' => 'DESC'])
            ->innerJoinWith('AlbumCategories', function ($q) {
                return $q->where(['AlbumCategories.id' => 2]);
            
            })->contain(['AlbumImages'])->toArray();
        $this->set(compact('title','description','image','albums', 'keyword'));
    }
}