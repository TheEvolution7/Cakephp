<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\Collection\Collection;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function category($slug = null,$id = null)
    {
        // $requestQuery = $this->request->getQuery();  
        $limit = !empty($requestQuery['show']) ? $requestQuery['show'] : 12;
        
        $size = $this->Products->AttributeValues->find('list',['keyField' => 'id','valueField' => 'title','conditions' => ['status' => 1,'attribute_id' => 1]]);
        // $listAttrSize = [];
        // if (!empty($requestQuery['size'])) {
        //     $listAttrSize[] = $requestQuery['size'];
        // }else{
        //     $listAttrSize = array_keys($size->toArray());
        // }
        // if (!empty($listAttrSize)) {
        //     $listSize = $this->Products
        //         ->find('list')
        //         ->where(['Products.status' => 1])
        //         ->matching('AttributeValues', function ($q) use ($listAttrSize){
        //                 return $q->where(['AttributeValues.id IN' => $listAttrSize]);
        //         })
        //     ->toList();

        // }
        // $listArrProducts =  $listSize;
        if (!empty($requestQuery['sort-by'])){
            switch ($requestQuery['sort-by']){
                 case 'created-asc':
                     $order['created-asc'] = 'ASC';
                     break;
                 case 'created-desc':
                     $order['created-desc'] = 'DESC';
                     break;
                 case 'price':
                     $order['price-asc'] = 'ASC';
                     break;
                case 'price':
                    $order['price-desc'] = 'DESC';
                    break;
                 default:
                     $order['order'] = 'ASC';
                     $order['id'] = 'DESC';
                     break;
            }
        }else{
             $order['order'] = 'ASC';
             $order['id'] = 'DESC';
        }

        // $this->paginate = [
        //     'order' => $order,
        //     'maxLimit' => $limit,
           
        // ];
        // if($listArrProducts){
        //     $query = $this->Products
        //         ->find('all')
        //         ->where(['Products.id IN' => $listArrProducts])
        //         ->contain(['AttributeValues'])
        //         ->matching('ProductCategories', function ($q) use($id){
        //             return $q->where(['ProductCategories.status' => 1,
        //                     'ProductCategories.id IN' => $id]);
        //         });
        //     $products = $this->paginate($query)->toArray();
            
        // }else{
        //     $query = $this->Products->find()
        //     ->where(['Products.status' => 1])
        //     ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
        //     ->contain(['AttributeValues'])
        //     ->matching('ProductCategories', function ($q) use($id){
        //         return $q->where(['ProductCategories.status' => 1,
        //                 'ProductCategories.id IN' => $id]);
        //     });
        // }
     
        $this->paginate = [
            'order' => $order,
            'limit' => $limit,
            'contain' => ['AttributeValues']
        ];
        
        $products = $this->Products
            ->find()
            ->innerJoinWith('ProductCategories', function ($q) use ($id) {
            return $q->where(['ProductCategories.id' => $id]);
        });
        $products = $this->paginate($products)->toArray();

        $category = $this->Products->ProductCategories->get($id);
        $title = $category->title;
        $description = $category->description;
        $this->set(compact('lists','products','category','title','description','size'));
    }
    public function details($slug = null,$id = null)
    {
        $product = $this->Products->get($id,['contain' => [
            'ProductCategories',
            'AttributeValues' => [
                'AttributeValuesAmounts' => function(Query $q) use ($id){
            return $q
                ->where(['AttributeValuesAmounts.product_id' => $id]);

        }]]]);
        
        $getProductById = $this->Products->AttributeValues->AttributeValuesAmounts
            ->find()
            ->where(['product_id' => $id])
            ->toArray();

        $collection = new Collection($getProductById);
        $sumOfAmount =  $collection->sumOf('amount');

        $related_product = $this->Products
            ->find()
            ->where(['Products.status' => 1,'Products.id !=' => $product->id])
            ->order(['Products.id DESC'])
            ->limit(10)
        ->toArray();

        $title = $product->title;
        $description = $product->description;
        $image =  'uploads' . DS . 'products' . DS . $product->id . DS .$product->image;

        $this->loadModel('OrderDetails');
        $order_details = $this->OrderDetails
            ->find()
            ->where(['OrderDetails.product_id' => $id]);

        $collection = new Collection($order_details);
        $ordersByAttrbute =  $collection->countBy('attribute')->toArray();
        // $this->loadModel('Acp.Items');
        // $items = $this->Items
        //     ->find()
        //     ->contain('AttributeValues', function (Query $q) {
        //         return $q
        //             ->where(['AttributeValues.status' => 1])
        //             ->contain(['Attributes']);
        //     })
        //     ->where(['product_id' => $id])
        //     ->toArray();
        $this->set(compact('product','title','image','description','related_product', 'items', 'sumOfAmount', 'ordersByAttrbute'));
    }
    public function search()
    {
        $products = null;
        $this->loadModel('Products');
        if ($this->request->getQuery('keyword')!= '') {
            $products = $this->paginate($this->Products->find('all',['conditions' => ['Products.status' => 1,'Products_title_translation.content LIKE' => '%'.$this->request->getQuery('keyword').'%']]))->toArray();
        }
        $title = __('Search');
        $this->set(compact('products','title','news'));
    }
    public function wishList()
    {
        $title = __('What I want');
        if ($this->request->is('post')){
            $list = $this->Cookie->read('Wishlist');
            if (!count($list)) {
                $list[] = $this->request->getData('id');
                $this->Cookie->write('Wishlist', $list);
            }else{
                $flag = false;

                foreach ($list as $key => $value) {
                    $product = $this->Products->find()->where(['Products.status' => 1,'Products.id' => $value])->first();
                    if (!$product) {
                       unset($list[$key]);
                    }
                }
                if ($flag == false) {
                    $list[] = $this->request->getData('id');
                    $this->Cookie->write('Wishlist', $list);
                }
            } 
            $this->Flash->set(__('Saved to wishlist'), ['element' => 'fly_success']);
            return $this->redirect($this->referer());
        }else{
            $list = $this->Cookie->read('Wishlist');
            if (empty($list)) {
                $this->Flash->set(__('There are no products in wishlist'), ['element' => 'fly_warning']);
            	return $this->redirect('/products/category/women-2');
            }
        }
        $products = $this->Products->find()->where(['Products.id IN' => array_values($list)])->contain(['ProductCategories','AttributeValues'])->toArray();

        $this->set(compact('products','title','list'));
    }
    public function removeWishList($id = null)
    {
    	$this->autoReder = false;
        $list = $this->Cookie->read('Wishlist');
    	if ($id != null && count($list) >= 1) {
    		$this->Cookie->delete('Wishlist.' . $id);
    		$this->Flash->set(__('The product has been removed.'), ['element' => 'fly_success']);
    	}else{
    		$this->Flash->set(__('The product could not be removed. Please, try again.'), ['element' => 'fly_warning']);
    	}

    	return $this->redirect($this->referer());
    }
}