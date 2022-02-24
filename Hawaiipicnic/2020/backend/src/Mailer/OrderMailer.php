<?php
namespace App\Mailer;

use Cake\Core\Configure;
use Cake\Mailer\Mailer;

class OrderMailer extends Mailer
{
    
    public function orderComplete($order, $carts)
    {
        TransportFactory::setConfig('mailjet', [
            'host' => Configure::read('Core.setting.email_host'),
            'port' => Configure::read('Core.setting.email_port'),
            'username' => Configure::read('Core.setting.email_user'),
            'password' => Configure::read('Core.setting.email_password'),
            'className' => 'Smtp',
            'tls' => true
        ]);
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => Configure::read('Core.setting.owner')])
            ->to($order->email)
            ->subject(__d('mail', '{0} received the order #{1}', Configure::read('Core.setting.owner'), $order->id))
            ->set(compact('order', 'carts'));
    }
}
