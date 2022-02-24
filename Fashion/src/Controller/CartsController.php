<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Mailer\TransportFactory;
use Cake\Mailer\Email;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

define('PAYPAL_API_CLIENT_ID', 'ATs8k6FSLwHqx6m2t2ss_U0xTVc6RnlzCoOWerH_RXb29cEf1BahvLD0aRRFv7sYKYshisjib4AIYdKv');  
define('PAYPAL_API_SECRET', 'EBHTkObjxey-EQxifuUUbBWerWFWWnEJVyZFQX4k87fC0-gOiTXCei7ez52SDu_NtoKbhRItwfGPOpv7'); 
define('PAYPAL_SANDBOX', true); //set false for production 

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
    
    public function postcode()
    {
        $this->autoRender = false;

        $res['status'] = 0;
        $res['data'] = "<p style=\"color: red;\">Sorry we haven't provided services in your area yet, please subscribe to our email list and we will inform you when it's available.<a href=\"javascript:;\"id=\"btn-email\">Click here</a></p>";

        if ($this->request->getData('postcode')) {
            if (count(explode(' ', $this->request->getData('postcode'))) == 2) {
                $data = str_replace(' ', '%20', $this->request->getData('postcode'));
                $contents = file_get_contents("https://www.doogal.co.uk/GetPostcode.ashx?postcode=" . $data);
                if (!empty($contents)) {
                    $splitContents = explode("\t", $contents);
                    $str = '';
                    $str .= "Postcode - " . $splitContents[0] . "<br/>";
                    $str .= "latitude - " . $splitContents[1] . "<br/>";
                    $str .= "longitude - " . $splitContents[2] . "<br/>";
                    $str .= "quality - " . $splitContents[3] . "<br/>";
                    $str .= "Constituency - " . $splitContents[4] . "<br/>";
                    $str .= "District - " . $splitContents[5] . "<br/>";
                    $str .= "Ward - " . $splitContents[6] . "<br/>";
                    $str .= "Lower Super Output Area - " . $splitContents[7] . "<br/>";
                    $str .= "County - " . $splitContents[8] . "<br/>";
                    $str .= "Region - " . $splitContents[9] . "<br/>";
                    $str .= "Country - " . $splitContents[10] . "<br/>";
                    $str .= "National park - " . $splitContents[11] . "<br/>";
                    $str .= "Altitude - " . $splitContents[12] . "<br/>";
                    $str .= "Rural/urban - " . $splitContents[13] . "<br/>";
                    $str .= "Travel to work area - " . $splitContents[14] . "<br/>";
                    $str .= "LSOA code - " . $splitContents[15] . "<br/>";
                    
                    

                    if ($splitContents[9] == 'London') {
                        $res['status'] = 1;
                        $res['data'] = "<p style=\"color: green;\">Your Post Code Valid</p>";
                    }
                }
            }
            
        }

        echo json_encode($res);
        
    }
    public function index(){
        $session = $this->getRequest()->getSession();
        $carts = $session->read('Cart');
        $title = __('Cart');
        $this->loadModel('Products');
        $product_featured = $this->Products->find()->where(['Products.status' => 1,'featured' => 1])->order(['Products.id' => 'DESC']);
        $this->set(compact('carts','product_featured','title'));
    }

    public function addToCart($id = null){
        $this->autoRender = false;
        if ($this->request->is(['patch', 'post', 'put'])) {

            $session = $this->getRequest()->getSession();

            $cart = $session->read('Cart');

            $this->loadModel('Products');
            $product_seclect = $this->Products->get($id);

            $attributeValuesAmount = $this->Products->AttributeValues->AttributeValuesAmounts
                ->find()
                ->where(['attribute_value_id' => $this->request->getData('attributes.size.value')])
                ->first();

            if (isset($attributeValuesAmount->amount) && $attributeValuesAmount->amount == 0) {
                $product_seclect['price'] = 0;
            }else{
                $product_seclect['price'] = $product_seclect['price'];
            }

            if(!isset($this->request->data['attributes'])){
                $this->request->data['attributes'] = [];
            }

            $product_seclect['attributes'] = $this->request->data['attributes'];
            $product_seclect['date'] = $_POST['date'];
            $product_seclect['quantity'] = 1;

            if(!count($cart)){
                $cart[] = $product_seclect;
                $session->write('Cart',$cart);
            }else{
                $flag = false;
                for ($i=0; $i<count($cart); $i++) {
                    $cartItem = $cart[$i];
                    if($cartItem['id'] == $id && serialize($this->request->getData('attributes')) == serialize($cartItem['attributes']))
                    {
                        
                        $cart[$i]['quantity'] = ($cart[$i]['quantity'] + 1);
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
                ['controller' => 'Carts', 'action' => 'index']
            );
        }
    }

    // public function shippingAddress(){

    //     $cart = array();
    //     $session = $this->getRequest()->getSession();

    //     if ($session->check('Cart')) $cart = $session->read('Cart');
    //     if (count($cart) == 0) return $this->redirect(['action' => 'index']);

    //     // if (empty($session->read('Auth.User')))
    //     // {
    //     //     $this->Flash->set(__('Please login or register as our customer to continue checkout!'), ['element' => 'fly_warning']);
    //     //     return $this->redirect(['action' => 'index']);
    //     // }
    //     $title = __('Shipping Address');
    //     $this->set(compact('title'));

    //     if ($this->request->is('post')) {
    //         if (!$this->Auth->user()) {
    //             $this->loadModel('Users');
    //             $user = $this->Users->newEntity($this->request->getData());
    //             $user->role_id = 3;
    //             if ($this->Users->save($user)) {
    //                 $this->Auth->setUser($user->toArray());
    //                 $this->Flash->set(__('Register success'), ['element' => 'fly_success']);
    //                 return $this->redirect(['controller' => 'carts', 'action' => 'payment']);
    //             }
    //             $this->Flash->set(__('Your re-password or password was dissimilarity.'), ['element' => 'fly_error']);
    //         }else{
    //             return $this->redirect(['controller' => 'carts', 'action' => 'payment']);
    //         }
    //     }
    // }
    public function checkout(){
        $title = __('Checkout');
        $session = $this->getRequest()->getSession();
        $this->loadModel('Users');
        $user = null;
        if ($session->check('Auth.User')) {
            $user = $session->read('Auth.User');
            $user = $this->Users->get($session->read('Auth.User.id'));
        }
        if (!$session->check('Cart')){
            $this->Flash->set(__('Your cart empty.'), ['element' => 'fly_error']);
            return $this->redirect(['action' => 'index']);
        }
        // if (!$session->check('Order')){
        //     $this->Flash->set(__('Your shipping address empty.'), ['element' => 'fly_error']);
        //     return $this->redirect(['action' => 'index']);
        // }

        $carts = $session->read('Cart');
        if($this->request->is(['patch', 'post', 'put'])) {

            $session->write('Order', $this->request->getData());
                $this->process();
            // if (!$this->Auth->user()) {
            //     $user = $this->Users->newEntity($this->request->getData());
            //     $user->role_id = 3;
            //     $password = rand();
            //     $user->password = $password;
            //     $user->confirm_password = $password;
            //     if ($this->Users->save($user)) {
            //         $this->Auth->setUser($user->toArray());
            //         $session->write('Order', $this->request->getData());
            //         $this->process();
            //     }else{
            //         $this->Flash->set(__('Your re-password or password was dissimilarity.'), ['element' => 'fly_error']);
            //     }
            // }else{
            //     $session->write('Order', $this->request->getData());
            //     $this->process();
            // }
            
        }
        $this->set(compact('carts','title', 'user'));
    }

    public function email()
    {
        $this->layout = false;
        $this->loadModel('Orders');
        $this->loadModel('Products');
        $session = $this->getRequest()->getSession();
        $tmp = $session->read('Order.id');
        $order = $this->Orders->get($tmp);
        $cart = $session->read('CartComplete');

        $attributeValues = $this->Products->AttributeValues->find('list', [
                'keyField' => 'id',
                'valueField' => 'title'
            ])->toArray();

        TransportFactory::setConfig('mailjet', [
                'host' => Configure::read('Core.setting.email_host'),
                'port' => Configure::read('Core.setting.email_port'),
                'username' => Configure::read('Core.setting.email_user'),
                'password' => Configure::read('Core.setting.email_password'),
                'className' => 'Smtp',
                'tls' => true
            ]);

            $email = new Email();

            $tmp = $session->read('Order.id');
            $order = $this->Orders->get($tmp);

            $cart = $session->read('CartComplete');

           $email
                ->transport('mailjet')
                ->template('complete')
                ->setViewVars(['order' => $order,'cart' => $cart, 'attributeValues' => $attributeValues])
                ->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                ->to($order->email)
                ->subject('Email order from website '.Configure::read('Core.setting.owner'))
                ->emailFormat('html')
                ->helpers(['Cms'])
                ->send();

        $this->set(compact('order','cart', 'attributeValues'));
    }
    public function process(){

        $this->autoRender = false;
        $cart = array();

        $session = $this->getRequest()->getSession();
        if ($session->check('Cart')) $cart = $session->read('Cart');
       
        if (count($cart) == 0) return $this->redirect(['action' => 'index']);
        $this->loadModel('Orders');
        $currency = "£";
        $rate = 1;
        
        $data = $session->read('Order');
        $total_price = 0;
        $data_c = [];
        $this->loadModel('AttributeValuesAmounts');
        foreach ($cart as $c) {

            // $amount = $this->AttributeValuesAmounts
            //     ->find()
            //     ->where(['product_id' => $c->id])
            //     ->first();
            // $amount->amount = $amount->amount - $c->quantity;
            // $this->AttributeValuesAmounts->save($amount);
            $data_c[] = [
                'product_id'    => $c->id,
                'attribute'     => $c->attributes['size']['value'],
                'start'          => $c->date,
                'quantity'      => $c->quantity,
                'amount'        => ($c->quantity * $c->price),
            ]; 
       
        $total_price += ($c->quantity * $c->price);
        }
        $data['rate'] = $rate;
        $data['currency'] = $currency;
        $data['order_details'] = $data_c;
        $data['amount'] = $total_price;
        
        if ($session->check('Auth')) $data['user_id'] = $session->read('Auth.User.id');
        
        $order = $this->Orders->newEntity($data,['associated'=> ['OrderDetails']]);
        if ($order->postcode) {
            $contents = null;
            if (count(explode(' ', $this->request->getData('postcode'))) == 2) {
                $data = str_replace(' ', '%20', $order->postcode);
                $contents = file_get_contents("https://www.doogal.co.uk/GetPostcode.ashx?postcode=" . $data);
            }
            
            if (!empty($contents)) {
                $splitContents = explode("\t", $contents);
                
                if ($splitContents[9] == 'London') {
                    $order->is_active = 1;
                }else{
                    $this->loadModel('Contacts');
                    $data = [
                        'email' => $order->email,
                        'notLondon' => 1
                    ];
                    $contact = $this->Contacts->newEntity($data);
                    $this->Contacts->save($contact);
                    $session->delete('Cart');
                    $this->Flash->set(__("Sorry we haven't provided services in your area yet, please subscribe to our email list and we will inform you when it's available."), ['element' => 'fly_error']);
                    return $this->redirect(['controller'=>'Pages','action' => 'home']); 
                }
            }else{
                $this->loadModel('Contacts');
                $data = [
                    'email' => $order->email,
                    'notLondon' => 1
                ];
                $contact = $this->Contacts->newEntity($data);
                $this->Contacts->save($contact);
                $session->delete('Cart');
                $this->Flash->set(__("Sorry we haven't provided services in your area yet, please subscribe to our email list and we will inform you when it's available."), ['element' => 'fly_error']);
                return $this->redirect(['controller'=>'Pages','action' => 'home']); 
            }

            if ($this->Orders->save($order)) {
                // update session Order function complete
                $order_se = $session->read('Order');
                $order_complete['id'] = $order->id;
                $session->write('Order',$order_complete);
                $session->write('CartComplete', $session->read('Cart'));
              
               
               //  TransportFactory::setConfig('mailjet', [
               //      'host' => Configure::read('Core.setting.email_host'),
               //      'port' => Configure::read('Core.setting.email_port'),
               //      'username' => Configure::read('Core.setting.email_user'),
               //      'password' => Configure::read('Core.setting.email_password'),
               //      'className' => 'Smtp',
               //      'tls' => true
               //  ]);

               //  $email = new Email();
               //  $email->transport('mailjet');

               //  $tmp = $session->read('Order.id');
               //  $order = $this->Orders->get($tmp);

               //  $cart = $session->read('CartComplete');

               // $email
               //      ->template('complete')
               //      ->setViewVars(['order' => $order,'cart' => $cart])
               //      ->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
               //      ->to($order->email)
               //      ->subject('Email order from website '.Configure::read('Core.setting.owner'))
               //      ->emailFormat('html')
               //      ->helpers(['Cms']);
               //  if ($email->send()) {
               //      $this->Flash->set(__('Order Successfully!'), ['element' => 'fly_success']);
               //  }else{
               //      $this->Flash->set(__('Order error'), ['element' => 'fly_error']);
               //  }

                //$this->Flash->set(__('Successfully!'), ['element' => 'fly_success']);
                $session->delete('Cart');
                if ($order->amount > 0) {
                    return $this->redirect(['controller'=>'Carts','action' => 'payment']);  
                }else{
                    return $this->redirect(['controller'=>'Carts','action' => 'complete']);  
                }
                
            }
        }
    }

    public function payment(){
        $title = __('Payment');

        $this->loadModel('Orders');
        $session = $this->getRequest()->getSession();
        $tmp = $session->read('Order.id');
        $order = $this->Orders->get($tmp);

        $carts = $session->read('CartComplete');

        $paypalEnv       = PAYPAL_SANDBOX?'sandbox':'production'; 
        $paypalURL       = PAYPAL_SANDBOX?'https://api.sandbox.paypal.com/v1/':'https://api.paypal.com/v1/'; 
        $paypalClientID  = PAYPAL_API_CLIENT_ID; 
        $paypalSecret   = PAYPAL_API_SECRET; 

        $this->set(compact('title','order','carts', 'paypalEnv', 'paypalURL', 'paypalClientID', 'paypalSecret'));
    }

    public function processPaypal(){
        $this->autoRender = false;

        if (!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) && !empty($_GET['pid'])) {
            $paymentID = $_GET['paymentID']; 
            $token = $_GET['token']; 
            $payerID = $_GET['payerID']; 
            $productID = $_GET['pid']; 
            
            $paymentCheck = $this->validate($paymentID, $token, $payerID, $productID); 
            $status = 'Failed';
            if ($paymentCheck && $paymentCheck->state == 'approved') {
                $id = $paymentCheck->id; 
                $state = $paymentCheck->state; 
                $payerFirstName = $paymentCheck->payer->payer_info->first_name; 
                $payerLastName = $paymentCheck->payer->payer_info->last_name; 
                $payerName = $payerFirstName.' '.$payerLastName; 
                $payerEmail = $paymentCheck->payer->payer_info->email; 
                $payerID = $paymentCheck->payer->payer_info->payer_id; 
                $payerCountryCode = $paymentCheck->payer->payer_info->country_code; 
                $paidAmount = $paymentCheck->transactions[0]->amount->details->subtotal; 
                $currency = $paymentCheck->transactions[0]->amount->currency; 
                $status = 'Paid';
            }

            $this->loadModel('Orders');
            $order = $this->Orders->get($productID);
            $amount = number_format($paidAmount, 0, '.', '');
            if ($order->amount >= (int)$amount) {
                $data = array( 
                    'product_id' => $productID, 
                    'txn_id' => $id, 
                    'payment_gross' => $paidAmount, 
                    'currency_code' => $currency, 
                    'payer_id' => $payerID, 
                    'payer_name' => $payerName, 
                    'payer_email' => $payerEmail, 
                    'payer_country' => $payerCountryCode, 
                    'payment_status' => $state 
                );
                $order->ref_code = serialize($data);
                $order->status = $status;
                $order->payment_status = 1;
                $order->pay_type = 'paypal';
                if ($this->Orders->save($order)) {
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
                $session = $this->getRequest()->getSession();
                $tmp = $session->read('Order.id');
                
                $cart = $session->read('CartComplete');


                $email
                    ->template('complete')
                    ->setViewVars(['order' => $order,'cart' => $cart])
                    ->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                    ->to($order->email)
                    ->subject('Email order from website '.Configure::read('Core.setting.owner'))
                    ->emailFormat('html')
                    ->helpers(['Cms']);
                if ($email->send()) {
                    $this->Flash->set(__('Order Successfully!'), ['element' => 'fly_success']);
                }else{
                    $this->Flash->set(__('Order error'), ['element' => 'fly_error']);
                }
            }
                // $session = $this->getRequest()->getSession();
                // $this->getMailer('Appointment')->send('bookingComplete', [$session->read('Booking')->toArray()]);
            }
        }
        return $this->redirect(['action' => 'complete']);
    }

    public function validate($paymentID, $paymentToken, $payerID, $productID){ 
        $this->autoRender = false;

        $paypalEnv       = PAYPAL_SANDBOX?'sandbox':'production'; 
        $paypalURL       = PAYPAL_SANDBOX?'https://api.sandbox.paypal.com/v1/':'https://api.paypal.com/v1/'; 
        $paypalClientID  = PAYPAL_API_CLIENT_ID; 
        $paypalSecret   = PAYPAL_API_SECRET; 

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $paypalURL.'oauth2/token'); 
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_USERPWD, $paypalClientID.":".$paypalSecret); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials"); 
        $response = curl_exec($ch); 
        curl_close($ch); 
         
        if(empty($response)){ 
            return false; 
        }else{ 
            $jsonData = json_decode($response); 
            $curl = curl_init($paypalURL.'payments/payment/'.$paymentID); 
            curl_setopt($curl, CURLOPT_POST, false); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
            curl_setopt($curl, CURLOPT_HEADER, false); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($curl, CURLOPT_HTTPHEADER, array( 
                'Authorization: Bearer ' . $jsonData->access_token, 
                'Accept: application/json', 
                'Content-Type: application/xml' 
            )); 
            $response = curl_exec($curl); 
            curl_close($curl); 
             
            // Transaction data 
            $result = json_decode($response); 
             
            return $result; 
        } 
     
    } 
    public function paypal($id){
        $this->autoRender = false;

        $enableSandbox = Configure::read('Core.setting.paypal_status');
        $paypalConfig = [
            'email' => Configure::read('Core.setting.paypal_account'),
            'client_id' => Configure::read('Core.setting.paypal_client'),
            'client_secret' => Configure::read('Core.setting.paypal_serect'),
            'return_url' =>  '/carts/complete',
            'cancel_url' =>  '/carts/complete',
            'notify_url' =>  '/carts/paypal_ipn'
        ];

        $paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

        $this->loadModel('Orders');
        
        $order = $this->Orders->find()->where(['Orders.id' => $id])->first();
        $itemName = 'Orders#'.$order->id;
        $itemAmount = round($order->amount);

        $_POST['cmd'] = '_xclick';
        $_POST['no_note'] = 1;
        $_POST['lc'] = 'UK';
        $_POST['bn'] = 'PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest';
        $_POST['first_name'] = 'Customer First Name';
        $_POST['last_name'] = 'Customer Last Name';
        $_POST['item_number'] = $order->id;

        if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

            // Grab the post data so that we can set up the query string for PayPal.
            // Ideally we'd use a whitelist here to check nothing is being injected into
            // our post data.
            $data = [];
            foreach ($_POST as $key => $value) {
                $data[$key] = $value;
            }

            // Set the PayPal account.
            $data['business'] = $paypalConfig['email'];

            // Set the PayPal return addresses.
            $data['return'] = $paypalConfig['return_url'];
            $data['cancel_return'] = $paypalConfig['cancel_url'];
            $data['notify_url'] = $paypalConfig['notify_url'];

            // Set the details about the product being purchased, including the amount
            // and currency so that these aren't overridden by the form data.
            $data['item_name'] = $itemName;
            $data['amount'] = $itemAmount;
            $data['currency_code'] = 'GBP';

            // Add any custom fields for the query string.
            //$data['custom'] = USERID;

            // Build the query string from the data.
            $queryString = http_build_query($data);

            // Redirect to paypal IPN
            header('location:' . $paypalUrl . '?' . $queryString);
            exit();
        }
    }
    function paypal_ipn(){
        $this->autoRender = false;

        $raw_post_data = file_get_contents('php://input'); 
        $raw_post_array = explode('&', $raw_post_data); 
        $myPost = array(); 
        foreach ($raw_post_array as $keyval) { 
            $keyval = explode ('=', $keyval); 
            if (count($keyval) == 2) 
                $myPost[$keyval[0]] = urldecode($keyval[1]); 
        } 
         
        // Read the post from PayPal system and add 'cmd' 
        $req = 'cmd=_notify-validate'; 
        if(function_exists('get_magic_quotes_gpc')) { 
            $get_magic_quotes_exists = true; 
        } 
        foreach ($myPost as $key => $value) { 
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
                $value = urlencode(stripslashes($value)); 
            } else { 
                $value = urlencode($value); 
            } 
            $req .= "&$key=$value"; 
        } 
         
        /* 
         * Post IPN data back to PayPal to validate the IPN data is genuine 
         * Without this step anyone can fake IPN data 
         */ 
        $paypalURL = Configure::read('Core.setting.paypal_url'); 
        $ch = curl_init($paypalURL); 
        if ($ch == FALSE) { 
            return FALSE; 
        } 
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req); 
        curl_setopt($ch, CURLOPT_SSLVERSION, 6); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1); 
         
        // Set TCP timeout to 30 seconds 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name')); 
        $res = curl_exec($ch); 
         
        /* 
         * Inspect IPN validation result and act accordingly 
         * Split response headers and payload, a better way for strcmp 
         */  
        $tokens = explode("\r\n\r\n", trim($res)); 
        $res = trim(end($tokens)); 
        if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) { 
             
            // Retrieve transaction info from PayPal 
            $item_number    = $_POST['item_number']; 
            $txn_id         = $_POST['txn_id']; 
            $payment_gross     = $_POST['mc_gross']; 
            $currency_code     = $_POST['mc_currency']; 
            $payment_status = $_POST['payment_status']; 
            
            //Check if transaction data exists with the same TXN ID 
            $this->loadModel('Orders');
            $this->Orders->save(array('id' => $item_number, 'status' => 1,'payment_status' => $payment_status,'txn_id' => $txn_id,'payment_status' => $payment_status));
        } 
    }

    public function complete(){
        $title = __('Order completed');

        $this->loadModel('Orders');
        $session = $this->getRequest()->getSession();
        $tmp = $session->read('Order.id');
        $order = $this->Orders->get($tmp);

        $carts = $session->read('CartComplete');
        $this->set(compact('title','order','carts'));
    }
    public function delete($id = null){
		$this->autoRender = false;
		$flag = array('status' => 0);
		$session = $this->getRequest()->getSession();
        $cart = $session->read('Cart');
		
		if($id == -1) {
			$cart = array();	
			$flag['status'] = 2;
		}
		else {
			$flag['status'] = 1;
			$flag['reduce_amount'] = $cart[$id]['price'] * $cart[$id]['quantity'];
			$flag['reduce_quantity'] = $cart[$id]['quantity'];
			unset($cart[$id]);
		}
		$cart = @array_values($cart);
		$session->write('Cart',$cart);
		if ($flag['status'] == 2) return $this->redirect(['controller' => 'Carts', 'action' => 'index']);

		return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
    }
}