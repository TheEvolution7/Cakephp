<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
use Cake\I18n\I18n;
use Cake\I18n\Time;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlbumsController extends AppController
{
    public function snippet(){
        $banners = Cache::read('banners_' . I18n::getLocale())[1][8];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        
        $albums = $this->Albums
            ->find()
            ->where(['Albums.status' => 1])
            ->order(['Albums.sort' => 'ASC','Albums.id' => 'DESC'])
            ->innerJoinWith('AlbumCategories', function ($q) {
                return $q->where(['AlbumCategories.id' => 2]);
            })
        ->contain(['AlbumImages'])
        ->toArray();
        $this->set(compact('title', 'description', 'image','albums'));
    }
    public function addOn(){
        $banners = Cache::read('banners_' . I18n::getLocale())[1][7];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $albums = $this->Albums
            ->find()
            ->where(['Albums.status' => 1])
            ->order(['Albums.sort' => 'ASC','Albums.id' => 'DESC'])
            ->innerJoinWith('AlbumCategories', function ($q) {
                return $q->where(['AlbumCategories.id' => 3]);
            })
        ->toArray();
        $this->set(compact('title', 'description', 'image','albums'));
    }
}