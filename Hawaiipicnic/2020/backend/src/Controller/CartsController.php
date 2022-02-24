<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Cache\Cache;
use Cake\I18n\I18n;
use Cake\I18n\Time;
use Cake\Mailer\TransportFactory;
use Cake\Mailer\Email;
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
    
    public function bookingInfo(){
        $session = $this->getRequest()->getSession();
        $carts = $session->read('Cart');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session->delete('Cart');
            return $this->redirect(['controller' => 'Products', 'action' => 'booking']);
        }    
        $title = 'Booking Info';
        $this->set(compact('carts','title'));
    }

    public function add($id = null){
        $this->autoRender = false;

        if ($this->request->is(['patch', 'post', 'put'])) {

            if (empty($this->request->getData('attributes.Appointment'))) {
                $this->Flash->set(__('You must choose Appointment'));
                return $this->redirect($this->referer());
            }
            if (empty($this->request->getData('date'))) {
                $this->Flash->set(__('You must choose Datetime'));
                return $this->redirect($this->referer());
            }
            $session = $this->getRequest()->getSession();
            $cart = $session->read('Cart');

            $this->loadModel('Acp.Products');
            $attr = $this->Products->AttributeValues
            	->find()
            	->where(['AttributeValues_slug_translation.content' => $this->request->getData('attributes.Appointment')])
            	->first();

            $product_seclect = $this->Products->get($id,[
                'contain' => [
                    'AttributeValues' => function ($q) use($attr) {
                        return $q->where(['AttributeValues.status' => 1, 'AttributeValues.id' => $attr->id]);
                    }
                ]
            ]);

            if(!isset($this->request->data['attributes'])){
                $this->request->data['attributes'] = [];
            }
            $product_seclect['attributes'] = $this->request->getData('attributes.Appointment');
            $product_seclect['date'] = $this->request->getData('date');
            $product_seclect['quantity'] = 1;
            $product_seclect['price'] = $product_seclect['price'];
        
            if(!count($cart)){
                $cart[] = $product_seclect;
                $session->write('Cart',$cart);
            }else{
                $flag = false;
                for ($i=0; $i<count($cart); $i++) {
                    $cartItem = $cart[$i];
                    if($cartItem['id'] == $id && serialize($this->request->getData('attributes')) == serialize($cartItem['attributes']))
                    {
                        $cart[$i]['quantity'] = ($cart[$i]['quantity'] + $product_seclect['quantity']);
                        $session->write('Cart',$cart);
                        $flag = true;
                        break;
                    }
                    
                }

                if (!$flag) {
                    $cart[] = $product_seclect;
                    $session->write('Cart',$cart);
                }
            }
            return $this->redirect(
                ['controller' => 'Carts', 'action' => 'bookingInfo']
            );
        }
    }

    public function shippingAddress(){

        $cart = array();
        $session = $this->getRequest()->getSession();
        
        if ($session->check('Cart')) $cart = $session->read('Cart');
        if (count($cart) == 0) return $this->redirect(['action' => 'index']);

        $title_for_layout = __('Shipping addresses');
        $this->set(compact('title_for_layout'));

        if($this->request->getData()) {
            $session->write('Order',$this->request->getData());
            return $this->redirect(['controller' => 'carts', 'action' => 'checkout']);
        }
        else{
            $this->loadModel('Countries');
            $countries = $this->Countries->find('list', ['keyField' => 'id','valueField' => 'countryName']);
            $this->set(compact('countries'));
           
        }
    }

    public function checkout(){
        $this->autoRender = false;
        $cart = array();
        $session = $this->getRequest()->getSession();
        $session->write('Order',$this->request->getData());
        if ($session->check('Cart')) $cart = $session->read('Cart');
        if (count($cart) == 0) return $this->redirect(['action' => 'index']);
        
        $this->loadModel('Orders');

        $currency = '$';
        $rate = 1;

        $data = $session->read('Order');

        $total_price = 0;
        $date = '';
        $attr = '';
        $amount_attr = '';
        $data_c = [];
        foreach ($cart as $c) {
            $data_c[] = [
                'product_id'    => $c->id,
                'date'          => $c->date,
                'quantity'      => $c->quantity,
                'amount'        => $c->quantity * $c->price,
            ]; 
            $attr = $c->attribute_values[0]->title;
            $amount_attr = $c->attribute_values[0]->color;
            $date =  $c->date;
            $total_price += ($c->quantity * $c->price);
        }
        $data['attr'] = $attr;
        $data['amount_attr'] = $amount_attr;
        $data['order_details'] = $data_c;
        $data['date'] = $date;
        $data['amount'] = $total_price;
        $data['rate'] = $rate;
        $data['currency'] = $currency;

        if ($session->check('Auth')) $data['user_id'] = $session->read('Auth.User.id');
        
        $order = $this->Orders->newEntity($data,['associated'=> ['OrderDetails']]);

        

        if ($this->Orders->save($order)) {
            // update session Order function complete
            $order_se = $session->read('Order');
            $order_complete['id'] = $order->id;
            $session->write('Order',$order_complete);

            //
            $session->write('CartComplete', $session->read('Cart'));
            TransportFactory::setConfig('mailjet', [
                'host' => Configure::read('Core.setting.email_host'),
                'port' => Configure::read('Core.setting.email_port'),
                'username' => Configure::read('Core.setting.email_user'),
                'password' => Configure::read('Core.setting.email_password'),
                'className' => 'Smtp',
                'tls' => true
            ]);
            $email = new Email();
            $email->transport('mailjet');

            $email
                ->template('orderComplete')
                ->setViewVars(['order' => $order,'cart' => $cart])
                ->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                ->to($order->email)
                ->subject('Email order from website '.Configure::read('Core.setting.owner'))
                ->emailFormat('html')
                ->helpers(['Cms']);

            $email->send();

            $session->delete('Cart');

            return $this->redirect(['action' => 'complete']);
        }
        $this->set(compact('cart'));
    }

    public function complete(){
        $title = __('Booking completed');
        $this->loadModel('Orders');
        $session = $this->getRequest()->getSession();
        $tmp = $session->read('Order.id');
        $order = $this->Orders->get($tmp);
        $cart = $session->read('CartComplete');
        $this->set(compact('title','order','cart','countries'));
    }
}