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
    public function details($slug = null)
    {
        $product = $this->Products->find()->where([
            'Products.status' => 1,
            'Products_slug_translation.content' => $slug
        ])
        ->contain(['AttributeValues'])
        ->first();
        $title = $product->title;
        $description = $product->description;
        $image =  'uploads' . DS . 'products' . DS . $product->id . DS .$product->image;
        $this->set(compact('title','description','image','product'));
    }

    public function services()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][2];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $products = $this->Products
            ->find()
            ->where(['Products.status' => 1])
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.id' => 1]);
            })->toArray();

        $this->set(compact('title','description','image','products'));
    }
    public function servicesDetails($slug = null)
    {
        $service = $this->Products->find()->where([
            'Products.status' => 1,
            'Products_slug_translation.content' => $slug
        ])->first();

        $select_services = $this->Products->find('List', ['keyField' => 'id','valueField' => 'title'])
            ->where(['Products.status' => 1])
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.id' => 1]);
        });
        $title = $service->title;
        $description = $service->description;
        $image =  'uploads' . DS . 'products' . DS . $service->id . DS .$service->image;
        $this->set(compact('service','title','description','image','recent_post','select_services'));
    }
}