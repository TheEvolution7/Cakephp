<?php
namespace Acp\Mailer;

use Acp\Model\Entity\User;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function loginIp(User $user, $viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->template('Acp.loginIp')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Your code login - {0}', Configure::read('Core.setting.owner'))])
            ->to($user->email)
            ->subject(__d('mail', 'Your code login - {0}', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }

    public function loginEmail(User $user, $viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->template('Acp.loginEmail')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Your code login - {0}', Configure::read('Core.setting.owner'))])
            ->to($user->email)
            ->subject(__d('mail', 'Your code login - {0}', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }
    public function login($viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->template('Acp.login')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Connection on your account - {0}', Configure::read('Core.setting.owner'))])
            ->to($viewVars['email'])
            ->subject(__d('mail', 'Connection on your account {0} !', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }
}
