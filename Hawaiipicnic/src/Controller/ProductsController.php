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
class ProductsController extends AppController
{
    public function service()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][2];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $services = $this->Products
            ->find()
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->where(['Products.status' => 1])
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.parent_id' => 1]);
        });
        $this->set(compact('title','description','image','services'));
    }

    public function serviceDetails($slug = null)
    {
        $service = $this->Products->find()->where([
            'Products.status' => 1,
            'Products_slug_translation.content' => $slug
        ])->contain(['ProductCategories'])->first();

        $service_other = $this->Products
            ->find()
            ->where(['Products.status' => 1,'Products.id !=' => $service->id])
            ->innerJoinWith('ProductCategories', function ($q) use($service) {
                return $q->where(['ProductCategories.id' => $service->product_categories[0]->id]);
            });
                
       $title = $service->title;
       $description = $service->description;
       $image =  'uploads' . DS . 'products' . DS . $service->id . DS .$service->image;
       $keyword = $service->meta_keyword;
       $this->set(compact('title','description','image','service','keyword','service_other'));
    }
}