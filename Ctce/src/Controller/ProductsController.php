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
class ProductsController extends AppController
{
    public function category($id = null)
    {
        $category = $this->Products->ProductCategories->get($id);
        $cat_parent = $this->Products->ProductCategories->get($category->parent_id);

        $products = $this->Products
            ->find()
            ->where(['Products.status' => 1])
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->innerJoinWith('ProductCategories', function ($q) use($id) {
                return $q->where(['ProductCategories.id' => $id]);
            })->toArray();
            
        $title = $category->title;
        $description = $category->description;
        $image =  'uploads' . DS . 'product_categories' . DS . $category->id . DS .$category->image;
        $this->set(compact('title','description','image','products','category','cat_parent'));
    }

    public function details($id = null)
    {
        $product = $this->Products->get($id, ['contain' => ['ProductCategories', 'Users']]);
        $product_related = $this->Products
            ->find()
            ->where(['Products.status' => 1,'Products.id !=' => $id])
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->innerJoinWith('ProductCategories', function ($q) use($product) {
                return $q->where(['ProductCategories.id' => $product->product_categories[0]->id ]);
            })->toArray();
            
        $title = $product->title;
        $description = $product->description;
        $image =  'uploads' . DS . 'products' . DS . $product->id . DS .$product->image;
        $this->set(compact('title','description','image','product','product_related'));
    }
}