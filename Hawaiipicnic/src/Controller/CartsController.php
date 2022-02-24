<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use Cake\Mailer\TransportFactory; 
use Cake\ORM\Query;
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
    
    public function booking(){
        $title = __('Booking');
        $session = $this->getRequest()->getSession();
        $this->loadModel('Products');
        $this->loadModel('Acp.AttributeValues');

        $appointments = $this->AttributeValues
            ->find()
            ->order(['AttributeValues.sort' => 'ASC','AttributeValues.id' => 'DESC'])
            ->where(['AttributeValues.attribute_id' => 1,'AttributeValues.status' => 1])
            ->toArray();

        $services = $this->Products
            ->find()
            ->order(['Products.sort' => 'ASC','Products.id' => 'DESC'])
            ->where(['Products.status' => 1])
            ->innerJoinWith('ProductCategories', function ($q) {
            return $q->where(['ProductCategories.parent_id' => 1]);
        });
        
        if ($this->request->is(['post'])) {
            $booking = $this->request->getData();
            $session->write('Booking',$booking);      
            return $this->redirect(['controller' => 'Carts', 'action' => 'bookingInfo']);
        }
        $this->set(compact('title','services','booking','appointments'));
    }
    public function bookingInfo(){
        $title = __('Booking Information');
     
        $this->loadModel('Products');
        $this->loadModel('AttributeValues');
        $session = $this->getRequest()->getSession();
        $booking = $session->read('Booking');
       
        $service = $this->Products->get($booking['package']);
        $appointment = $this->AttributeValues->get($booking['appointment']);
        if ($this->request->is(['post'])) {
            $this->loadModel('Orders');
            $currency = '$';
            $rate = 1;
            $data = $session->read('Booking');
            $total_price = 0;
            $data_c = [];
            $total_price = $service['price'] + (!empty($appointment['color']) ? $appointment['color'] : 0);
            $data_c[] = [
                    'product_id'    => $booking['package'],
                    'quantity'      => 1,
                    'attribute'     => $booking['appointment'],
                    'amount'        => $total_price
                ]; 

            $data['order_details'] = $data_c;
            $data['amount'] = $total_price;
            $data['rate'] = $rate;
            $data['currency'] = $currency;
            $data['product_id'] = $booking['package'];
            $data['date'] = $booking['date'];
            $data['pay_method'] = 1;
            $booking_info = array_merge($data,$this->request->getData());
            $order = $this->Orders->newEntity($booking_info,['associated'=> ['OrderDetails']]);
            if ($this->Orders->save($order)) {
                $order_complete['id'] = $order->id;
                $session->write('Order',$order_complete);
                
                TransportFactory::setConfig('mailjet', [
                    'host' => Configure::read('Core.setting.email_host'),
                    'port' => Configure::read('Core.setting.email_port'),
                    'username' => Configure::read('Core.setting.email_user'),
                    'password' => Configure::read('Core.setting.email_password'),
                    'className' => 'Smtp',
                    'tls' => true
                ]);
                
                $content='Booking from '.Configure::read('Core.setting.owner').'<br/><br/>Dear <b>'.$order->first_name.' '. $order->last_name.'</b> , thank you so for your form in our system.<br>We will contact you as soon as possible.';
                $email = new Email();
                $email->transport('mailjet');

                $email->from([Configure::read('Core.setting.email_emailsend')  => Configure::read('Core.setting.owner')])
                    ->to($order->email)
                    ->subject('Email booking from website '.Configure::read('Core.setting.owner'))
                    ->emailFormat('both')
                    ->send($content);

                return $this->redirect(['controller' => 'Carts','action' => 'complete']);
                $session->delete('Booking');
            }
        }

        $this->loadModel('Acp.ArticleCategories');

        $articleCategories = $this->ArticleCategories
            ->find()
            ->where(['parent_id' => 6])
            ->contain(['Articles' => function(Query $q){
                $q->where(['Articles.status' => 1]);
                return $q;
            }])
            ->toArray();
            
        $listArticleCategories = $this->ArticleCategories
            ->find('list', [
                'keyField' => 'id',
                'valueField' => 'title'
            ])
            ->where(['parent_id' => 6])
            ->contain(['Articles' => function(Query $q){
                $q->where(['Articles.status' => 1]);
                return $q;
            }])
            ->toArray();

        $this->set(compact('title','service','booking','appointment', 'articleCategories', 'listArticleCategories'));
    }
    public function complete(){
        $title = __('Completed');
        $this->set(compact('title'));
    }  
}