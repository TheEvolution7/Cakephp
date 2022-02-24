<?php
namespace App\Mailer;

use Cake\Core\Configure;
use Cake\Mailer\Mailer;

class OrderMailer extends Mailer
{
    
    public function complete($order)
    {
        
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => Configure::read('Core.setting.owner')])
            ->to($order->email)
            ->subject(__d('mail', '{0} received the order #{1}', Configure::read('Core.setting.owner'), $order->id))
            ->set(compact('order'));
    }
    public function instruction($order)
    {
        
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => Configure::read('Core.setting.owner')])
            ->to($order->email)
            ->subject(__d('mail', '{0}  pick up instruction order #{1}', Configure::read('Core.setting.owner'), $order->id))
            ->set(compact('order'));
    }
}
