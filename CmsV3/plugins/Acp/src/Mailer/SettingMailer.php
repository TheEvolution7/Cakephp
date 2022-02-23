<?php
namespace Acp\Mailer;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;

class SettingMailer extends Mailer
{
    public function settingEdit()
    {
        $this
            ->transport('mailjet')
            ->template('Acp.settingEdit')
            ->emailFormat('html')
            ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', '{0}', Configure::read('Core.setting.site_title'))])
            ->to('anhfighter@gmail.com')
            ->subject(__d('mail', 'A Message from - {0}', Configure::read('Core.setting.site_title')));
    }
}
