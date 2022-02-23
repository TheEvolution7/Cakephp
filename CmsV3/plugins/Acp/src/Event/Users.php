<?php
namespace Acp\Event;

use Acp\Event\Logs;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

class Users implements EventListenerInterface
{
    use MailerAwareTrait;

    /**
     * ImplementedEvents method.
     *
     * @return array
     */
    public function implementedEvents()
    {
        return [
            'Users.login.failed' => 'usersLoginFailed',
            'Users.login.successed' => 'usersLoginSuccessed',
            'Users.save.successed' => 'usersSaveSuccessed'
        ];
    }

    /**
     * An staff user failed to login. Send a mail to the user.
     *
     * @param Event $event The event that was fired.
     *
     * @return bool
     */
    public function usersLoginFailed(Event $event)
    {
        //Logs Event.
        EventManager::instance()->attach(new Logs());
        $logs = new Event('Log.User', $this, [
            'user_id' => $event->getData('user_id'),
            'role_id' => $event->getData('role_id'),
            'email' => $event->getData('email'),
            'user_ip' => $event->getData('user_ip'),
            'user_agent' => $event->getData('user_agent'),
            'action' => $event->getData('action'),
            'model' => $event->getData('model'),
            'content' => $event->getData('content')
        ]);
        EventManager::instance()->dispatch($logs);
        return true;
    }

    public function usersLoginSuccessed(Event $event)
    {
        //Logs Event.
        EventManager::instance()->attach(new Logs());
        $logs = new Event('Log.User', $this, [
            'user_id' => $event->getData('user_id'),
            'role_id' => $event->getData('role_id'),
            'email' => $event->getData('email'),
            'user_ip' => $event->getData('user_ip'),
            'user_agent' => $event->getData('user_agent'),
            'action' => $event->getData('action'),
            'model' => $event->getData('model'),
            'content' => $event->getData('content')
        ]);
        if (Configure::read('Core.setting.status_logout_email') == 1) {
            $this->getMailer('Acp.User')->send('login', [$event->getData()]);
        }
        
        EventManager::instance()->dispatch($logs);
        return true;
    }

    public function usersSaveSuccessed(Event $event)
    {
        //Logs Event.
        EventManager::instance()->attach(new Logs());
        $logs = new Event('Log.User', $this, [
            'user_id' => $event->getData('user_id'),
            'role_id' => $event->getData('role_id'),
            'email' => $event->getData('email'),
            'user_ip' => $event->getData('user_ip'),
            'user_agent' => $event->getData('user_agent'),
            'action' => $event->getData('action'),
            'model' => $event->getData('model'),
            'content' => $event->getData('content')
        ]);
        EventManager::instance()->dispatch($logs);
        return true;
    }
}
