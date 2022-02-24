<?php
    use Cake\Core\Configure;
?>
<p>Booking Hawaii Picnic.</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;font-family:arial;font-size:10pt;">
    <tr>
        <td>
        <!-- // content here -->
            
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #E0DFDF;">
                <tr>
                    <td width="50%">
                    <span style="font-size:20pt; font-weight:bold; color:#666;"></span><?= Configure::read('Core.setting.owner') ?></td>
                    <td width="50%" align="right">
                        <span style="font-size:18pt;">#<?= $order->id;?> / <?= date('d-m-Y');?></span><br>
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
                                    <td colspan="2"><span style="font-size:15pt;font-weight:normal;">Booking Info:</span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;">First Name:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->first_name ?> </span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;">Last Name:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->last_name ?> </span><br></td>  
                                </tr>
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;">Email:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->email ?></span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;">Phone:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->phone ?></span><br></td>  
                                </tr>  
                        </table>
                    </td>
                </tr>
            </table>
            
        <table>
                <tr>
                    <td height="30"></td>
                 </tr>
            </table>
            
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            
                <tr>
                    <td style="border-bottom:1px solid #E0DFDF;" width="20"><span style="font-size:10pt;;font-weight:bold;">#</span></td>
                    <td style="border-bottom:1px solid #E0DFDF; max-width:271px;"><span style="font-size:10pt;;font-weight:bold;">Package</span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;font-weight:bold;">Add Appointment</span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;font-weight:bold;">Date time</span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;font-weight:bold;">Total</span></td>
                </tr>
                <?php 
                $stt = 1; 
                $subTotal = 0;
                foreach($cart as $item){?>
                <tr>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"><?= $stt;?></span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"><?= $item->title ?> <?= \Cake\Core\Configure::read('Core.setting.currency').number_format($item->price)  ?> </span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"><?= $item->attribute_values[0]->title ?> <?= \Cake\Core\Configure::read('Core.setting.currency').number_format($item->attribute_values[0]->color)  ?></span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"><?= $item->date ?></span></td>
                    <?php $subTotal = $item->attribute_values[0]->color + $item->price ?>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"> <?= \Cake\Core\Configure::read('Core.setting.currency').number_format($subTotal, 2, '.', ',')  ?></span></td>
                </tr>
                <?php
                $subTotal += $item->price;
        $stt++;
        }?>
            </table>
            <table>
                <tr>
                    <td height="20"></td>
                </tr>
        </table>  
        <!-- // end content -->
        </td>
    </tr>
</table>
