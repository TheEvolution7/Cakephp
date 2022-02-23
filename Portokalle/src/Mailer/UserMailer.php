<?php
namespace App\Mailer;

use App\Model\Entity\User;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;
use Cake\Http\ServerRequest;

class UserMailer extends Mailer
{
    /**
     * Register Email.
     *
     * @param User $user The user information.
     * @param array $viewVars The variables to pass to the view.
     *
     * @return void
     */
    public function register(User $user, $viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Welcome on {0} !', Configure::read('Core.setting.owner'))])
            ->to($user->email)
            ->subject(__d('mail', 'Welcome on {0} !', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }

    /**
     * Login Email. Used when someone fail to login and his group is a staff group.
     *
     * @param array $viewVars The variables to pass to the view.
     *
     * @return void
     */
    public function login($viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Connexion on your account {0} !', h($viewVars['username']))])
            ->to($viewVars['email'])
            ->subject(__d('mail', 'Connexion on your account {0} !', h($viewVars['username'])))
            ->set($viewVars);
    }

    /**
     * ForgotPassword Email.
     *
     * @param User $user The user information.
     * @param array $viewVars The variables to pass to the view.
     *
     * @return void
     */
    public function forgotPassword(User $user, $viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Forgot your Password - {0}', Configure::read('Core.setting.owner'))])
            ->to($user->email)
            ->subject(__d('mail', 'Forgot your Password - {0}', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }

    public function activeEmail(User $user, $viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Active your Email - {0}', Configure::read('Core.setting.owner'))])
            ->to($user->email)
            ->subject(__d('mail', 'Active your Email - {0}', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }
}