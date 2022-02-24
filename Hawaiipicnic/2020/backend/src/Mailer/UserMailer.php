<?php
namespace App\Mailer;

use App\Model\Entity\User;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

class UserMailer extends Mailer
{
    public function forgotPassword(User $user, $viewVars = [])
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
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Forgot your Password - {0}', Configure::read('Core.setting.owner'))])
            ->to($user->email)
            ->subject(__d('mail', 'Forgot your Password - {0}', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }
}
