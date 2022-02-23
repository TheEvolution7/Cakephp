<tr>
    <td>
        <table width="100%">
            <tr>
                <td valign="middle">
                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <h1>
                                    <?= __d('mail', 'Hi {0},', h('anhfighter')) ?>
                                </h1>
                                <p>
                                    <?= 'Access to CMS: '.\Cake\Routing\Router::url('/acp',true) ?>
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
                                    <?= __d('mail', "Website {0}.", \Cake\Core\Configure::read('Core.setting.site_title')) ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>