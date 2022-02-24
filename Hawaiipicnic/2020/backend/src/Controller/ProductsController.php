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
class ProductsController extends AppController
{
    public function booking()
    {
        $banners = Cache::read('banners_' . I18n::getLocale())[1][10];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $products = $this->Products
            ->find()
            ->where(['Products.status' => 1])
            ->innerJoinWith('ProductCategories')
            ->toArray();
        
        $this->loadModel('Acp.Attributes');  
        $attributes =  $this->Attributes->find()->contain(['AttributeValues'])->first();  
        $this->set(compact('title', 'description', 'image','products','attributes'));
    }
    public function bookingDetails($slug = null,$id = null)
    {
        $product = $this->Products->get($id, ['contain' => ['AttributeValues']]);
        $banners = Cache::read('banners_' . I18n::getLocale())[1][10];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $products = $this->Products
            ->find()
            ->where(['Products.status' => 1])
            ->innerJoinWith('ProductCategories')
            ->toArray();
        $this->set(compact('title', 'description', 'image','products','product'));
    }
}