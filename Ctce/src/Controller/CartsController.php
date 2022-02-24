<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{
    
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    
    public function index(){
        $session = $this->getRequest()->getSession();

        $carts = $session->read('Carts');

        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->request->getData('updatebt') == 1) {
                $sl = $this->request->getData('quantity');
                for($i = 0 ; $i < count($carts) ; $i++) {
                    $carts[$i]['quantity'] = $sl[$i];
                }
                $session->write('Carts',$carts);
            }
        }    
        $this->set(compact('carts'));
    }

    public function addToCart($id = null){
        $this->autoRender = false;

        if ($this->request->is(['patch', 'post', 'put'])) {

            $session = $this->getRequest()->getSession();

            $cart = $session->read('Carts');

            $this->loadModel('Products');
            $product_seclect = $this->Products->get($id);

            
            $product_seclect['quantity'] = 1;
            $product_seclect['price'] = $product_seclect['price'];

            if(!count($cart)){
                $cart[] = $product_seclect;
                $session->write('Carts',$cart);
            }else{
                $flag = false;
                for ($i=0; $i<count($cart); $i++) {
                    $cartItem = $cart[$i];
                    if($cartItem['id'] == $id)
                    {
                        $flag = true;
                        break;
                    }
                    
                }

                if (!$flag) {
                    $cart[] = $product_seclect;
                    $session->write('Carts',$cart);
                }
            }
            return $this->redirect(
                ['controller' => 'Carts', 'action' => 'index']
            );
        }
    }

    public function shippingAddress(){

        $cart = array();
        $session = $this->getRequest()->getSession();
        
        if ($session->check('Carts')) $cart = $session->read('Carts');
        if (count($cart) == 0) return $this->redirect(['action' => 'index']);

        $title_for_layout = __('Shipping addresses');
        $this->set(compact('title_for_layout'));

        if($this->request->getData()) {
            //$session->write('Order',$this->request->getData());
            return $this->redirect(['controller' => 'carts', 'action' => 'checkout']);
        }
        else{
            $this->loadModel('Countries');
            $countries = $this->Countries->find('list', ['keyField' => 'id','valueField' => 'countryName']);
            $this->set(compact('countries'));
           
        }
    }

    public function checkout(){
        $title_for_layout = __('Payment method');

        if ($this->request->is('post')) {

            $cart = array();

            $session = $this->getRequest()->getSession();
            if ($session->check('Carts')) $cart = $session->read('Carts');
            if (count($cart) == 0) return $this->redirect(['action' => 'index']);
            
            $this->loadModel('Orders');
            $currency = '$';
            $rate = 1;

            $data = [
                'status' => 1,
                'currency' => $currency,
                'rate' => $rate,
            ];

            // $shipping = $session->read('Order');
            // $data = array_merge($data,$shipping);

            $data = $this->request->getData();
            $total_price = 0;
            $data_c = [];
            foreach ($cart as $c) {
                $data_c[] = [
                    'product_id'    => $c->id,
                    'attribute'     => serialize($c->attributes),
                    'quantity'      => $c->quantity,
                    'amount'        => $c->quantity * $c->price,
                ]; 

                $total_price += ($c->quantity * $c->price);
            }
            $data['order_details'] = $data_c;
            $data['amount'] = $total_price;

            if ($session->check('Auth.User')) {
                $data['user_id'] = $session->read('Auth.User.id');
            }else{
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            
            $order = $this->Orders->newEntity($data,['associated'=> ['OrderDetails']]);

            if ($this->Orders->save($order)) {
                // update session Order function complete
                $order_se = $session->read('Order');
                $order_complete['id'] = $order->id;
                $session->write('Order',$order_complete);

                //
                $session->write('CartComplete', $session->read('Carts'));
                $session->delete('Carts');

                return $this->redirect(['action' => 'complete']);
            }
            
            // if($this->getRequest()->getSession('pay_method') != null && $this->getRequest()->getSession('pay_method') < 3){
            //     return $this->redirect(['action' => 'complete']);
            // }
        }
        $this->set(compact('title_for_layout','cart'));
    }

    public function complete(){
        $title_for_layout = __('Order completed');

        $this->loadModel('Orders');
        $session = $this->getRequest()->getSession();
        $tmp = $session->read('Order.id');
        $order = $this->Orders->get($tmp);

        $cart = $session->read('CartComplete');

        $this->loadModel('Countries');
        $countries = $this->Countries->find('list', ['keyField' => 'id','valueField' => 'countryName'])->toArray();
        $this->set(compact('title_for_layout','order','cart','countries'));
    }

    public function remove($id = null){
        $this->autoRender = false;
        $session = $this->getRequest()->getSession();
        $session->delete('Carts.' . $id);

        return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
    }
}