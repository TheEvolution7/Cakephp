<?php
use Cake\Core\Configure;
    use Cake\I18n\I18n;
    $language = I18n::getLocale();
    $configs['language'] = $language;
    $total = 0;
    $currency = $configs['language'] == 'vi' ? 'VND' : 'USD';
    $convertCurrency = $configs['language'] == 'vi' ? '₫' : '$';  
?>
<p><?= __('Booking information') ?>.</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;font-family:arial;font-size:10pt;">
    <tr>
        <td>
        <!-- // content here -->
            
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #E0DFDF;">
                <tr>
                    <td width="50%">
                    <span style="font-size:20pt; font-weight:bold; color:#666;"></span><?= Configure::read('Core.setting.owner') ?></td>
                    <td width="50%" align="right">
                        <span style="font-size:18pt;">#<?= $order['id'];?> / <?= date('d M,Y');?></span><br>
                    </td>
                </tr>
                <tr>
                        <td height="10"></td>
                         <td></td>
                </tr>
            </table>
            
            <table>
                <tr>
                    <td height="20"></td>
                 </tr>
            </table>
            
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
            <tr>
                    <td height="5"></td>
                    <td></td>
            </tr>
                
            <tr>
                    <td align="left" valign="top">
                        <table width="100%">
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('First name') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->first_name;?> </span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Last name') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->last_name;?> </span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Email:') ?></span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->email?></span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Phone') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->phone?></span><br></td>  
                                </tr>   
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Datetime Booking') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->date?></span><br></td>  
                                </tr>   
                        </table>
                    </td>
                </tr>
            </table>
        <!-- // end content -->
        </td>
    </tr>
</table>
