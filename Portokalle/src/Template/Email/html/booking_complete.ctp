<?php
    use Cake\Core\Configure;
    use Cake\I18n\Number;
    use Cake\I18n\Time;
?>
<table
    border="0"
    width="100%"
    height="100%"
    cellpadding="0"
    cellspacing="0"
    bgcolor="#FFFFFF"
    style="
        border-spacing: 0px;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        font-style: normal;
        font-variant-caps: normal;
        font-weight: normal;
        letter-spacing: normal;
        text-align: start;
        text-indent: 0px;
        text-transform: none;
        white-space: normal;
        word-spacing: 0px;
        background-color: rgb(255, 255, 255);
        text-decoration: none;
    "
>
    <tbody>
        <tr>
            <td align="center" valign="top" bgcolor="#FFFFFF" style="border-collapse: collapse; background-color: rgb(255, 255, 255);">
                <table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" style="border-spacing: 0px; font-family: Helvetica, Arial, sans-serif; color: rgb(107, 107, 107); max-width: 600px;">
                    <tbody>
                        <tr>
                            <td style="border-collapse: collapse; text-align: center; padding: 20px 0px;">
                                <a
                                    href="<?= $this->Url->build('/', true) ?>"
                                    style="color: rgb(231, 102, 80); text-decoration: none;"
                                    target="_blank"
                                >
                                    <img
                                        src="<?= $this->Url->build('/uploads/settings/1/' . Configure::read('Core.setting.image'), true) ?>"
                                        width="90"
                                        height="30"
                                        border="0"
                                        alt="Portokalle"
                                        style="max-width: 90px; border: 0px; width: 90px;"
                                        class="CToWUd"
                                    />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#FFFFFF" style="border-collapse: collapse; background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">
                                <div>
                                    <h2 style="color: rgb(33, 33, 33); line-height: 1.2; margin: 0px 0px 25px; font-size: 30px; font-weight: 400; font-family: Georgia, serif; text-align: center;">
                                        Your appointment is booked for <?php 
                                        $data = [];
                                        $data['date'] = $date;
                                        $data['time'] = $start_time;
                                        $time = new Time(__('{date} {time}', $data));
                                        echo $time->nice() . ' - ' . $service['duration'] . ' minutes';
                                        ?>.
                                    </h2>
                                    <p style="font-size: 16px; line-height: 1.5; margin: 0px 0px 25px; color: rgb(107, 107, 107);">
                                        Thank you for choosing Portokalle! Our provider is looking forward to helping you. In the meantime, please update your medical history on Portokalle prior to your visit start time — this includes medical
                                        conditions, medications, surgeries, allergies, and any relevant notes from existing providers.<span>&nbsp;</span><br />
                                        <br />
                                        Click this button to get back to your consultation request, and make any changes if needed. If you need technical assistance, you can message us any time at<span>&nbsp;</span>
                                        <a href="mailto:support@portokalle.al" style="color: rgb(231, 102, 80); text-decoration: underline;" target="_blank">support@portokalle.al</a>.
                                    </p>
                                    <p style="font-size: 16px; line-height: 1.5; margin: 0px 0px 25px; color: rgb(107, 107, 107);">
                                        Get ready to log in to your Portokalle account. If you have any questions about your appointment, please reach out to us anytime at<span>&nbsp;</span>
                                        <a href="mailto:support@portokalle.al" style="color: rgb(231, 102, 80); text-decoration: underline;" target="_blank">support@portokalle.al</a>.
                                    </p>
                                </div>
                                <p style="font-size: 16px; line-height: 1.5; margin: 0px 0px 25px; color: rgb(107, 107, 107); text-align: center;">
                                    <a
                                        href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Appointments', 'action' => 'view', $id], true) ?>"
                                        style="
                                            color: rgb(68, 31, 75);
                                            text-decoration: none !important;
                                            background-color: rgb(255, 255, 255);
                                            border-top-left-radius: 30px;
                                            border-top-right-radius: 30px;
                                            border-bottom-right-radius: 30px;
                                            border-bottom-left-radius: 30px;
                                            border: 1px solid rgb(68, 31, 75);
                                            display: inline-block;
                                            font-size: 16px;
                                            font-weight: bold;
                                            line-height: 20px;
                                            min-height: 20px;
                                            padding: 10px 30px;
                                        "
                                        target="_blank"
                                    >
                                        View appointment
                                    </a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-collapse: collapse; padding: 30px 0px;">
                                <table cellpadding="0" cellspacing="0" width="100%" border="0" style="border-spacing: 0px; font-family: Helvetica, Arial, sans-serif;">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="border-collapse: collapse; padding-left: 10px; padding-right: 10px;">
                                                <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    border="0"
                                                    bgcolor="#FFFFFF"
                                                    style="
                                                        border-spacing: 0px;
                                                        font-family: Helvetica, Arial, sans-serif;
                                                        border-top-left-radius: 10px;
                                                        border-top-right-radius: 10px;
                                                        border-bottom-right-radius: 10px;
                                                        border-bottom-left-radius: 10px;
                                                        width: 580px;
                                                        background-color: rgb(255, 255, 255);
                                                    "
                                                >
                                                    <tbody>
                                                        <tr>
                                                            <td style="border-collapse: collapse; padding: 30px;">
                                                                <table cellpadding="0" cellspacing="0" border="0" bgcolor="transparent" width="100%" style="border-spacing: 0px; font-family: Helvetica, Arial, sans-serif;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign="middle" style="border-collapse: collapse; font-size: 25px; color: rgb(33, 33, 33); padding-right: 8px; padding-bottom: 20px;">
                                                                                Your receipt<span>&nbsp;</span>
                                                                            </td>
                                                                            <td valign="middle" style="border-collapse: collapse; font-size: 13px; padding-left: 8px; padding-bottom: 20px; text-align: right !important;">
                                                                                <?= $order['created']->nice() ?>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table cellpadding="0" cellspacing="0" border="0" bgcolor="transparent" width="100%" style="border-spacing: 0px; font-family: Helvetica, Arial, sans-serif;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td
                                                                                style="
                                                                                    border-collapse: collapse;
                                                                                    padding-right: 8px;
                                                                                    border-bottom-width: 1px;
                                                                                    border-bottom-style: solid;
                                                                                    border-bottom-color: rgb(107, 107, 107);
                                                                                    padding-bottom: 15px;
                                                                                    padding-top: 15px;
                                                                                "
                                                                            >
                                                                                Scheduled appointment:
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    border-collapse: collapse;
                                                                                    padding-left: 8px;
                                                                                    border-bottom-width: 1px;
                                                                                    border-bottom-style: solid;
                                                                                    border-bottom-color: rgb(107, 107, 107);
                                                                                    padding-bottom: 15px;
                                                                                    padding-top: 15px;
                                                                                    text-align: right !important;
                                                                                "
                                                                            >
                                                                                <?= $this->Number->currency($order['amount'], 'USD'); ?><span>&nbsp;</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                style="
                                                                                    border-collapse: collapse;
                                                                                    padding-right: 8px;
                                                                                    border-bottom-width: 1px;
                                                                                    border-bottom-style: solid;
                                                                                    border-bottom-color: rgb(107, 107, 107);
                                                                                    padding-bottom: 15px;
                                                                                    padding-top: 15px;
                                                                                "
                                                                            >
                                                                                Tax:
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    border-collapse: collapse;
                                                                                    padding-left: 8px;
                                                                                    border-bottom-width: 1px;
                                                                                    border-bottom-style: solid;
                                                                                    border-bottom-color: rgb(107, 107, 107);
                                                                                    padding-bottom: 15px;
                                                                                    padding-top: 15px;
                                                                                    text-align: right !important;
                                                                                "
                                                                            >
                                                                                <?= $this->Number->currency(0, 'USD'); ?><span>&nbsp;</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                style="
                                                                                    border-collapse: collapse;
                                                                                    padding-right: 8px;
                                                                                    border-bottom-width: 1px;
                                                                                    border-bottom-style: solid;
                                                                                    border-bottom-color: rgb(107, 107, 107);
                                                                                    padding-bottom: 15px;
                                                                                    padding-top: 15px;
                                                                                "
                                                                            >
                                                                                Total:
                                                                            </td>
                                                                            <td
                                                                                style="
                                                                                    border-collapse: collapse;
                                                                                    padding-left: 8px;
                                                                                    border-bottom-width: 1px;
                                                                                    border-bottom-style: solid;
                                                                                    border-bottom-color: rgb(107, 107, 107);
                                                                                    padding-bottom: 15px;
                                                                                    padding-top: 15px;
                                                                                    text-align: right !important;
                                                                                "
                                                                            >
                                                                                <?= $this->Number->currency($order['amount'], 'USD'); ?><span>&nbsp;</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-collapse: collapse; background-color: rgb(255, 255, 255); padding: 20px 40px 30px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                                                <p style="font-size: 16px; line-height: 1.5; margin: 0px 0px 25px; color: rgb(107, 107, 107);">
                                                                    Your credit card has been charged for the above amount. Thank you!<span>&nbsp;</span>
                                                                </p>
                                                                <div style="font-size: 16px; line-height: 1.5; margin-top: 0px; margin-right: 0px; margin-left: 0px; color: rgb(107, 107, 107); margin-bottom: 0px !important;">
                                                                    <a
                                                                        href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'account'], true) ?>"
                                                                        style="color: rgb(231, 102, 80); text-decoration: underline;"
                                                                        target="_blank"
                                                                    >
                                                                        View your account<span>&nbsp;</span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing: 0px; font-family: Helvetica, Arial, sans-serif; margin-top: 30px;">
                                    <tbody>
                                        <tr>
                                            <td bgcolor="#FFFFFF" style="border-collapse: collapse; background-color: rgb(255, 255, 255); padding: 20px 10px;">
                                                <h2 style="color: rgb(33, 33, 33); line-height: 1.2; margin: 0px 0px 25px; font-size: 18px; font-weight: 400; font-family: Helvetica, Arial, sans-serif; text-align: center;">
                                                    Invite friends &amp; family<span>&nbsp;</span>
                                                </h2>
                                                <p style="font-size: 16px; line-height: 1.5; margin: 0px 0px 25px; color: rgb(107, 107, 107);">
                                                    You'll get $10 in Portokalle credits for every person who signs up with your link. As a bonus, your friends &amp; family will get $10 in credits too!<br />
                                                    <br />
                                                    You can use the credits towards your next purchase, and there's no limit to how much you can earn.<span>&nbsp;</span>
                                                </p>
                                                <p style="font-size: 16px; line-height: 1.5; margin: 0px 0px 25px; color: rgb(107, 107, 107); text-align: center;">
                                                    <a
                                                        href="#"
                                                        style="
                                                            color: rgb(255, 255, 255);
                                                            text-decoration: none !important;
                                                            background-color: rgb(231, 102, 80);
                                                            border-top-left-radius: 30px;
                                                            border-top-right-radius: 30px;
                                                            border-bottom-right-radius: 30px;
                                                            border-bottom-left-radius: 30px;
                                                            border-width: 11px 30px;
                                                            border-style: solid;
                                                            border-color: rgb(231, 102, 80);
                                                            display: inline-block;
                                                            font-size: 16px;
                                                            font-weight: bold;
                                                            line-height: 20px;
                                                            min-height: 20px;
                                                        "
                                                        target="_blank"
                                                    >
                                                        Share the care<span>&nbsp;</span>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<table
    border="0"
    width="100%"
    height="100%"
    cellpadding="0"
    cellspacing="0"
    bgcolor="#FFFFFF"
    style="
        border-spacing: 0px;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        font-style: normal;
        font-variant-caps: normal;
        font-weight: normal;
        letter-spacing: normal;
        text-align: start;
        text-indent: 0px;
        text-transform: none;
        white-space: normal;
        word-spacing: 0px;
        background-color: rgb(255, 255, 255);
        text-decoration: none;
    "
>
    <tbody>
        <tr>
            <td align="center" valign="top" bgcolor="#FFFFFF" style="border-collapse: collapse; background-color: rgb(255, 255, 255);">
                <table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" style="border-spacing: 0px; font-family: Helvetica, Arial, sans-serif; color: rgb(107, 107, 107); max-width: 600px;">
                    <tbody>
                        <tr>
                            <td style="border-collapse: collapse;">
                                <table
                                    cellspacing="0"
                                    border="0"
                                    cellpadding="0"
                                    align="center"
                                    width="600"
                                    bgcolor="#FFFFFF"
                                    style="border-spacing: 0px; font-family: Helvetica, Arial, sans-serif; width: 600px; background-color: rgb(255, 255, 255);"
                                >
                                    <tbody>
                                        <tr>
                                            <td align="center" style="border-collapse: collapse; vertical-align: middle; text-align: center; color: rgb(67, 67, 67); font-size: 12px; padding: 20px 20px 10px;">
                                                <table align="center" style="border-spacing: 0px; font-family: Helvetica, Arial, sans-serif;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="border-collapse: collapse; vertical-align: middle; text-align: center; color: rgb(67, 67, 67); font-size: 12px; padding-left: 4px; padding-right: 4px;">
                                                                <a
                                                                    href=""
                                                                    style="color: rgb(231, 102, 80); text-decoration: none; display: inline-block;"
                                                                    target="_blank"
                                                                >
                                                                    <img
                                                                        src="https://ci4.googleusercontent.com/proxy/TuNT2yySpU_V_nuEaUn8tiNOZBn28kD0vODXKjGKvzcT9Qohj-IImujOr0ymIhd3LvqOLB64j7r20NL_=s0-d-e1-ft#https://portokalle.al/email/facebook-2x.png"
                                                                        width="21"
                                                                        border="0"
                                                                        style="max-width: 21px; border: 0px; vertical-align: middle; width: 21px;"
                                                                        class="CToWUd"
                                                                    />
                                                                </a>
                                                            </td>
                                                            <td style="border-collapse: collapse; vertical-align: middle; text-align: center; color: rgb(67, 67, 67); font-size: 12px; padding-left: 4px; padding-right: 4px;">
                                                                <a
                                                                    href=""
                                                                    style="color: rgb(231, 102, 80); text-decoration: none; display: inline-block;"
                                                                    target="_blank"
                                                                >
                                                                    <img
                                                                        src="https://ci4.googleusercontent.com/proxy/cjiKt4BJNZQdYkcC1l6_hi2Bm6cT8hBgFkpHyhRyvJn7wM17Aipbkm8YMMSk-PX2IjH71YiU0p9Ubt0=s0-d-e1-ft#https://portokalle.al/email/twitter-2x.png"
                                                                        width="21"
                                                                        border="0"
                                                                        style="max-width: 21px; border: 0px; vertical-align: middle; width: 21px;"
                                                                        class="CToWUd"
                                                                    />
                                                                </a>
                                                            </td>
                                                            <td style="border-collapse: collapse; vertical-align: middle; text-align: center; color: rgb(67, 67, 67); font-size: 12px; padding-left: 4px; padding-right: 4px;">
                                                                <a
                                                                    href=""
                                                                    style="color: rgb(231, 102, 80); text-decoration: none; display: inline-block;"
                                                                    target="_blank"
                                                                >
                                                                    <img
                                                                        src="https://ci6.googleusercontent.com/proxy/neNkNsHP5ZDuygWFYvvCPN0wqerG8Ip3CUgAWh2AVts7ln12P06aUYi20rJlkkF57tub-WHkMTEik3U=s0-d-e1-ft#https://portokalle.al/email/youtube-2x.png"
                                                                        width="21"
                                                                        border="0"
                                                                        style="max-width: 21px; border: 0px; vertical-align: middle; width: 21px;"
                                                                        class="CToWUd"
                                                                    />
                                                                </a>
                                                            </td>
                                                            <td style="border-collapse: collapse; vertical-align: middle; text-align: center; color: rgb(67, 67, 67); font-size: 12px; padding-left: 4px; padding-right: 4px;">
                                                                <a
                                                                    href=""
                                                                    style="color: rgb(231, 102, 80); text-decoration: none; display: inline-block;"
                                                                    target="_blank"
                                                                >
                                                                    <img
                                                                        src="https://ci6.googleusercontent.com/proxy/AFcId_vRs41FG5ffrHNdFi_TFsyYZpAfkxNGDgFs7Vi-vKzC1ZNRuRTJMQ6Z53ymEQA945nJSXuL-GJ8mw=s0-d-e1-ft#https://portokalle.al/email/instagram-2x.png"
                                                                        width="21"
                                                                        border="0"
                                                                        style="max-width: 21px; border: 0px; vertical-align: middle; width: 21px;"
                                                                        class="CToWUd"
                                                                    />
                                                                </a>
                                                            </td>
                                                            <td style="border-collapse: collapse; vertical-align: middle; text-align: center; color: rgb(67, 67, 67); font-size: 12px; padding-left: 4px; padding-right: 4px;">
                                                                <a
                                                                    href=""
                                                                    style="color: rgb(231, 102, 80); text-decoration: none; display: inline-block;"
                                                                    target="_blank"
                                                                >
                                                                    <img
                                                                        src="https://ci4.googleusercontent.com/proxy/UFVprmWNGeoGvsSOwbyWC3NzQhlSJt9p-PBYwSsBxjlBxxA3hMmJL2-02-6Iy8xMDYYKEmPVnsarG8mB=s0-d-e1-ft#https://portokalle.al/email/linkedin-2x.png"
                                                                        width="21"
                                                                        border="0"
                                                                        style="max-width: 21px; border: 0px; vertical-align: middle; width: 21px;"
                                                                        class="CToWUd"
                                                                    />
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-collapse: collapse; vertical-align: middle; text-align: center; color: rgb(107, 107, 107); font-size: 10px; padding: 0px 20px 20px;">
                                                You’ve received this email because you signed up for an account with<br />
                                                Portokalle Corporation •
                                                <a
                                                    href=""
                                                    target="_blank"
                                                >
                                                    
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
