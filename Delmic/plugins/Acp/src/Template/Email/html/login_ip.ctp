
<tr>
    <td>
        <table width="100%">
            <tr>
                <td valign="middle">
                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <h1>
                                    <?= __d('mail', 'Hi {0},', h($name)) ?>
                                </h1>
                                <p style="background: #f2f2f2;border-width: 1px 1px 2px 5px;border-style: solid;border-color: #E6E9ED;border-radius: 3px;background-color: #FFF;padding: 10px !important;border-left-color: #1ABC9C;">
                                    <?= __d(
                                        'mail',
                                        'To complete this process, please follow this link : {0}',
                                        $this->Html->link(
                                            __d('mail', 'here'),
                                            [
                                                'controller' => 'Users',
                                                'action' => 'loginIp',
                                                'plugin' => 'Acp',
                                                'id' => $userId,
                                                'code' => $code,
                                                '_full' => true
                                            ],
                                            [
                                                'style' => 'color:#1ABC9C;text-decoration:none;'
                                            ]
                                        )
                                    ) ?>
                                </p>
                            </td>
                            <td class="expander"></td>
                        </tr>
                    </table>

                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <p>
                                    <?= __d('mail', 'Regards,') ?><br />
                                    <?= __d('mail', "{0}'s Website.", \Cake\Core\Configure::read('Core.setting.site_title')) ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>