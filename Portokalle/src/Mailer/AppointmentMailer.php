<?php
namespace App\Mailer;

use App\Model\Entity\Appointment;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;
use Cake\Http\ServerRequest;

class AppointmentMailer extends Mailer
{
    public function bookingComplete($viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Welcome on {0} !', Configure::read('Core.setting.owner'))])
            ->to($viewVars['patient']['user']['email'])
            ->subject(__d('mail', 'A booking appointment form {0} !', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }

    public function connectZoom($viewVars = [])
    {
        $this
            ->transport('mailjet')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Welcome on {0} !', Configure::read('Core.setting.owner'))])
            ->to($viewVars['patient']['user']['email'])
            ->subject(__d('mail', 'A scheduling form {0} !', Configure::read('Core.setting.owner')))
            ->set($viewVars);
    }
}