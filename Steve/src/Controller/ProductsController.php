<?php
namespace App\Controller;
use Cake\I18n\I18n;
use Cake\Cache\Cache;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function index()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][6];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;

        $query = $this->Products
            ->find()
            ->where(['Products.status' => 1])
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.id' => 1]);
        });

        $order['Products.sort'] = 'ASC';
        $order['Products.id'] = 'DESC';
        $this->paginate = [
            'limit' => 6,
            'order' => $order
        ];
        $products = $this->paginate($query)->toArray();
        $this->set(compact('title','description','image','products'));
    }

    public function details($slug = null,$id = null)
    {
       $product = $this->Products->get($id, ['contain' => ['Brands','ProductCategories','AttributeValues']]);
       $title = $product->title;
       $description = $product->description;
       $image =  'uploads' . DS . 'products' . DS . $product->id . DS .$product->image;
       $this->set(compact('title','description','image','product'));
    }
}