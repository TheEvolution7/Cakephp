<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use Cake\Mailer\MailerAwareTrait;
use Cake\I18n\I18n;
use Cake\Cache\Cache;
use Stripe;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{
    use MailerAwareTrait;
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function add(){
        $this->autoRender = false;
        if ($this->request->is(['post'])) {
            $session = $this->getRequest()->getSession();
            $booking = $this->request->getData();
            $session->write('Booking',$booking);      
            return $this->redirect(['action' => 'booking']);  
        }
    }
    
    public function booking(){
        $session = $this->getRequest()->getSession();
        $booking = $session->read('Booking');
        // $product = $this->Products->get($booking['destination']);
        $select_services = $this->Products
            ->find()
            ->where(['Products.status' => 1])
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->innerJoinWith('ProductCategories', function ($q) {
                return $q->where(['ProductCategories.id' => 1]);
        });
        if ($this->request->is(['post'])) {
            $booking_merge = array_merge($booking,$this->request->getData());
            $session->write('Booking',$booking_merge);   
            return $this->redirect(['controller' => 'Carts', 'action' => 'bookingLeiGreeting']);
        }
        $banners = Cache::read('banners_' . I18n::getLocale())[1][6];
        $title = $banners->title;
        $description = $banners->description;
        $image =  'uploads' . DS . 'banners' . DS . $banners->id . DS .$banners->image;
        $this->set(compact('title','description','image','select_services','booking','product'));
    }
    public function bookingLeiGreeting(){
        $session = $this->getRequest()->getSession();
        $booking = $session->read('Booking');
        if ($this->request->is(['post'])) {    
            $booking_merge = array_merge($booking,$this->request->getData());
            $session->write('Booking',$booking_merge);  
            return $this->redirect(['controller' => 'Carts', 'action' => 'pickup']);
        }
        $title = __('Lei Greeting');
        $this->set(compact('title','booking'));
    }
    public function pickup(){
        $session = $this->getRequest()->getSession();
        $booking = $session->read('Booking');
        $product = $this->Products->get($booking['destination']);
        if ($this->request->is(['post'])) {
            $pickup = array_merge($booking,$this->request->getData());
            $session->write('Booking',$pickup);      
            return $this->redirect(['controller' => 'Carts', 'action' => 'information']);
        }
        $banners = Cache::read('banners_' . I18n::getLocale())[1][6];
        $title = __('Pick Up Information');
        $this->set(compact('title','product','booking'));
    }
    public function information(){
        $session = $this->getRequest()->getSession();
        $booking = $session->read('Booking');
        if ($this->request->is(['post'])) {
        $this->loadModel('Orders');
        $currency = '$';
        $rate = 1;
        
        $data = $session->read('Booking');

        $total_price = 0;
        $data_c = [];
        $total = $booking['quantity2'] * $booking['price-lie'];
        $data_c[] = [
                'product_id'    => $booking['destination'],
                'quantity'      => $booking['quantity'],
                'amount'        => $booking['price'] + $total,
            ]; 
        $total_price = $booking['price'] + $total;

        $data['order_details'] = $data_c;
        $data['amount'] = $total_price;
        $data['rate'] = $rate;
        $data['currency'] = $currency;
        $data['product_id'] = $booking['destination'];
        $data['qty'] = $booking['quantity2'];
        $data['quantity'] = $booking['quantity'];
        $data['airport'] = $booking['airport'];
        $data['location_pickup'] = $booking['location_pickup'];
        $data['content_pickup'] = $booking['content_pickup'];
        $data['date'] = $booking['date'];
        $data['time'] = $booking['time'];
        $data['airline_pickup'] = $booking['airline_pickup'];
        $data['flight_pickup'] = $booking['flight_pickup'];
        $data['departure_date'] = $booking['departure_date'] ;
        $data['departure_time'] = $booking['departure_time'];
        $data['location_departure'] = $booking['location_departure'];
        $data['content_departure'] = $booking['content_departure'];
        $data['airline_departure'] = $booking['airline_departure'];
        $data['flight_departure'] = $booking['flight_departure'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['description'] = $_POST['description'];
        $data['pay_method'] = 1;
        $order = $this->Orders->newEntity($data,['associated'=> ['OrderDetails']]);
        if ($this->Orders->save($order)) {
            $order_complete['id'] = $order->id;
            $session->write('Order',$order_complete);
            return $this->redirect(['action' => 'stripe']);
        }
    }
        $title = __('Information');
        $this->set(compact('title','product','total_price','booking'));
    }
    
    
    public function stripe(){
        $this->loadModel('Orders');
        $session = $this->getRequest()->getSession();
        $tmp = $session->read('Order.id');
        
        $booking = $session->read('Booking');
        $order = $this->Orders->get($tmp);
        
        $title = __('Stripe Payment');
        $this->set(compact('order','title','booking'));
    }

    public function paymentStripe(){

        $session = $this->getRequest()->getSession();
        
        $this->loadModel('Orders');
        $this->loadModel('Products');
        $session = $this->getRequest()->getSession();
        $tmp = $session->read('Order.id');
        $order = $this->Orders->get($tmp,['contain'=> ['OrderDetails']]);
        
        $product = $this->Products->get($order->order_details[0]->product_id);
        
        $str = $product->title;

        $itemName = $str; 
        $itemNumber = $order['id']; 
        $itemPrice = $order['amount']; 
        $currency = "USD";
        
        $payment_id = $statusMsg = ''; 
        $ordStatus = 'error'; 
        if(!empty($_POST['stripeToken'])){ 
             
            // Retrieve stripe token, card and user info from the submitted form data 
            $token  = $_POST['stripeToken']; 
            $email = $order['email']; 
            // Include Stripe PHP library 
            require_once(ROOT . DS . 'vendor' . DS . 'stripe-php' . DS . 'init.php');
            // Set API key 
            $secret_key = \Cake\Core\Configure::read('Core.setting.stripe_secret_key');
            
            \Stripe\Stripe::setApiKey(\Cake\Core\Configure::read('Core.setting.stripe_secret_key')); 
            // Add customer to stripe 
            try {  
                $customer = \Stripe\Customer::create(array( 
                    'email' => $email,  
                    'source'  => $token 
                )); 
            }catch(Exception $e) {  
                $api_error = $e->getMessage();  
            } 
             
            if(empty($api_error) && $customer){  
                 
                // Convert price to cents 
                $itemPriceCents = ($itemPrice*100); 
                 
                // Charge a credit or a debit card 
                try {  
                    $charge = \Stripe\Charge::create(array( 
                        'customer' => $customer->id, 
                        'amount'   => $itemPriceCents, 
                        'currency' => $currency, 
                        'description' => $itemName 
                    )); 
                }catch(Exception $e) {  
                    $api_error = $e->getMessage();  
                } 
                 
                if(empty($api_error) && $charge){ 
                 
                    // Retrieve charge details 
                    $chargeJson = $charge->jsonSerialize(); 
                 
                    // Check whether the charge is successful 
                    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
                        // Transaction details  
                        $transactionID = $chargeJson['balance_transaction']; 
                        $paidAmount = $chargeJson['amount']; 
                        $paidAmount = ($paidAmount/100); 
                        $paidCurrency = $chargeJson['currency']; 
                        $payment_status = $chargeJson['status']; 
                        $payment_id = $order['id'];
                        $arr = [
                            'email' => $email,
                            'itemName' => $itemName,
                            'itemNumber' => $itemNumber,
                            'itemPrice' => $itemPrice,
                            'currency' => $currency,
                            'paidAmount' => $paidAmount,
                            'paidCurrency' => $paidCurrency,
                            'transactionID' => $transactionID,
                            'payment_status' => $payment_status,
                            'payment_id' => $payment_id,
                        ];

                        $order->stripe_status = serialize($arr);
                        $order->status = 2;
                        
                        $this->Orders->save($order);
                        $this->getMailer('Order')->send('complete', [$order, $session->read('Booking')]);
                        $this->getMailer('Order')->send('instruction',[$order, $session->read('Booking')]);
                        $session->delete('Booking');
                        // If the order is successful 
                        if($payment_status == 'succeeded'){ 
                            $ordStatus = 'success'; 
                            $statusMsg = 'Your Payment has been Successful!'; 
                        }else{ 
                            $statusMsg = "Your Payment has Failed!"; 
                        } 
                    }else{ 
                        $statusMsg = "Transaction has been failed!"; 
                    } 
                }else{ 
                    $statusMsg = "Charge creation failed! $api_error";  
                } 
            }else{  
                $statusMsg = "Invalid card details! $api_error";  
            } 
        }else{ 
            $statusMsg = "Error on form submission."; 
        }
        $title = __('Payment Completed');
        $this->set(compact('title'));
    }
    
    // public function delete($id = null){
	// 	$this->autoRender = false;
	// 	$flag = array('status' => 0);
	// 	$session = $this->getRequest()->getSession();
    //     $cart = $session->read('Cart');
		
	// 	if($id == -1) {
	// 		$cart = array();	
	// 		$flag['status'] = 2;
	// 	}
	// 	else {
	// 		$flag['status'] = 1;
	// 		$flag['reduce_amount'] = $cart[$id]['price'] * $cart[$id]['quantity'];
	// 		$flag['reduce_quantity'] = $cart[$id]['quantity'];
	// 		unset($cart[$id]);
	// 	}
	// 	$cart = @array_values($cart);
	// 	$session->write('Cart',$cart);
	// 	if ($flag['status'] == 2) return $this->redirect(['controller' => 'Carts', 'action' => 'index']);

	// 	return $this->redirect(['controller' => 'Carts', 'action' => 'index']);
    // }
   
    // public function complete(){
    //     $title = __('Booking Completed');
    //     $this->loadModel('Orders');
    //     $session = $this->getRequest()->getSession();
    //     $tmp = $session->read('Order.id');
    //     $order = $this->Orders->get($tmp);
    //     $cart = $session->read('CartComplete');
    //     $this->set(compact('title','order','cart','countries'));
    // }
   


    // //paypal
    // public function paypal($id){
    //     $this->autoRender = false;

    //     $enableSandbox = Configure::read('Core.setting.paypal_status');
    //     $paypalConfig = [
    //         'email' => Configure::read('Core.setting.paypal_account'),
    //         'client_id' => Configure::read('Core.setting.paypal_client'),
    //         'client_secret' => Configure::read('Core.setting.paypal_serect'),
    //         'return_url' =>  '/carts/complete',
    //         'cancel_url' =>  '/carts/complete',
    //         'notify_url' =>  '/carts/paypal_ipn'
    //     ];

    //     $paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

    //     $this->loadModel('Orders');
        
    //     $order = $this->Orders->find()->where(['Orders.id' => $id])->first();
    //     $itemName = 'Orders#'.$order->id;
    //     $itemAmount = round($order->amount);

    //     $_POST['cmd'] = '_xclick';
    //     $_POST['no_note'] = 1;
    //     $_POST['lc'] = 'UK';
    //     $_POST['bn'] = 'PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest';
    //     $_POST['first_name'] = 'Customer First Name';
    //     $_POST['last_name'] = 'Customer Last Name';
    //     $_POST['item_number'] = $order->id;

    //     if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

    //         // Grab the post data so that we can set up the query string for PayPal.
    //         // Ideally we'd use a whitelist here to check nothing is being injected into
    //         // our post data.
    //         $data = [];
    //         foreach ($_POST as $key => $value) {
    //             $data[$key] = $value;
    //         }

    //         // Set the PayPal account.
    //         $data['business'] = $paypalConfig['email'];

    //         // Set the PayPal return addresses.
    //         $data['return'] = $paypalConfig['return_url'];
    //         $data['cancel_return'] = $paypalConfig['cancel_url'];
    //         $data['notify_url'] = $paypalConfig['notify_url'];

    //         // Set the details about the product being purchased, including the amount
    //         // and currency so that these aren't overridden by the form data.
    //         $data['item_name'] = $itemName;
    //         $data['amount'] = $itemAmount;
    //         $data['currency_code'] = 'USD';

    //         // Add any custom fields for the query string.
    //         //$data['custom'] = USERID;

    //         // Build the query string from the data.
    //         $queryString = http_build_query($data);

    //         // Redirect to paypal IPN
    //         header('location:' . $paypalUrl . '?' . $queryString);
    //         exit();
    //     }
    // }
    // function paypal_ipn(){
    //     $this->autoRender = false;

    //     $raw_post_data = file_get_contents('php://input'); 
    //     $raw_post_array = explode('&', $raw_post_data); 
    //     $myPost = array(); 
    //     foreach ($raw_post_array as $keyval) { 
    //         $keyval = explode ('=', $keyval); 
    //         if (count($keyval) == 2) 
    //             $myPost[$keyval[0]] = urldecode($keyval[1]); 
    //     } 
         
    //     // Read the post from PayPal system and add 'cmd' 
    //     $req = 'cmd=_notify-validate'; 
    //     if(function_exists('get_magic_quotes_gpc')) { 
    //         $get_magic_quotes_exists = true; 
    //     } 
    //     foreach ($myPost as $key => $value) { 
    //         if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
    //             $value = urlencode(stripslashes($value)); 
    //         } else { 
    //             $value = urlencode($value); 
    //         } 
    //         $req .= "&$key=$value"; 
    //     } 
    //     /* 
    //      * Post IPN data back to PayPal to validate the IPN data is genuine 
    //      * Without this step anyone can fake IPN data 
    //      */ 
    //     $paypalURL = Configure::read('Core.setting.paypal_url'); 
    //     $ch = curl_init($paypalURL); 
    //     if ($ch == FALSE) { 
    //         return FALSE; 
    //     } 
    //     curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
    //     curl_setopt($ch, CURLOPT_POST, 1); 
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $req); 
    //     curl_setopt($ch, CURLOPT_SSLVERSION, 6); 
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
    //     curl_setopt($ch, CURLOPT_FORBID_REUSE, 1); 
         
    //     // Set TCP timeout to 30 seconds 
    //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name')); 
    //     $res = curl_exec($ch); 
         
    //     /* 
    //      * Inspect IPN validation result and act accordingly 
    //      * Split response headers and payload, a better way for strcmp 
    //      */  
    //     $tokens = explode("\r\n\r\n", trim($res)); 
    //     $res = trim(end($tokens)); 
    //     if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) { 
             
    //         // Retrieve transaction info from PayPal 
    //         $item_number    = $_POST['item_number']; 
    //         $txn_id         = $_POST['txn_id']; 
    //         $payment_gross     = $_POST['mc_gross']; 
    //         $currency_code     = $_POST['mc_currency']; 
    //         $payment_status = $_POST['payment_status']; 
            
    //         //Check if transaction data exists with the same TXN ID 
    //         $this->loadModel('Orders');
    //         $this->Orders->save(array('id' => $item_number, 'status' => 2,'payment_status' => $payment_status,'txn_id' => $txn_id,'payment_status' => $payment_status));
    //     } 
    // }
}