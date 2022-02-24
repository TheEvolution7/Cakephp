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
    public function projects()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][5];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $categories = $this->Albums->AlbumCategories->find('list', ['keyfield' => 'id','valueField' => 'title','AlbumCategories.status' => 1])->where(['AlbumCategories.parent_id' => 1])->toArray();

        $projects = $this->Albums
            ->find()
            ->where(['Albums.status' => 1])
            ->order(['Albums.sort' => 'ASC','Albums.id' => 'DESC'])
            ->innerJoinWith('AlbumCategories', function ($q) {
                return $q->where(['AlbumCategories.parent_id' => 1]);
            });
        
        $this->set(compact('title', 'description', 'image','projects','categories')); 
    }

    public function projectDetails($slug = null,$id = null)
    {
        $project = $this->Albums->get($id,[
            'contain' => ['AlbumCategories','AlbumImages']
        ]);
        
        // $query = $this->Albums->AlbumImages->find()->where(['album_id' => $id]);
        // $this->paginate = [
        //     'limit' => 9
        // ];
        // $project_images = $this->paginate($query)->toArray();
        $title = $project->title;
        $description = $project->description;
        $image =  'uploads' . DS . 'albums' . DS . $project->id . DS .$project->image;
        $this->set(compact('title', 'description', 'image','project','project_images')); 
    }
}