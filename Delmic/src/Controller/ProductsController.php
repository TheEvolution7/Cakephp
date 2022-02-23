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
    public function index()
    {

        $conditions['status'] = 1;
        $order['order'] = 'ASC';
        $order['id'] = 'DESC';

        $this->paginate = [
            'order' => $order,
            'limit' => 10,
            'conditions' => $conditions
        ];

        $products = $this->paginate($this->Products->find('all'))->toArray();

        $title_for_layout = __('Products');
        $this->set(compact('title_for_layout','products'));
    }

    public function category($id = null)
    {
        $conditions['status'] = 1;
        $conditions['product_category_id IN'] = $id;

        $order['order'] = 'ASC';
        $order['id'] = 'DESC';

        $this->paginate = [
            'order' => $order,
            'conditions' => $conditions,
        ];

        $products = $this->paginate($this->Products->find('all'))->toArray();

        $productCategories = $this->Products->ProductCategories->get($id);
        $title_for_layout = $productCategories->title;

        $this->set(compact('products','title_for_layout','productCategories'));
    }
    
    public function details($id = null)
    {
        $product = $this->Products->get($id);
        $title_for_layout = $product->title;
        $productCategories = $this->Products->ProductCategories->get($product->product_category_id);

        $colors = $this->Products->AttributeValues->find('list',['keyField' => 'id','valueField' => 'title','conditions' => ['status' => 1,'attribute_id' => 2]]);
        $sizes = $this->Products->AttributeValues->find('list',['keyField' => 'id','valueField' => 'title','conditions' => ['status' => 1,'attribute_id' => 1]]);
        $this->set(compact('product','productCategories','title_for_layout','colors','sizes'));
    }
}