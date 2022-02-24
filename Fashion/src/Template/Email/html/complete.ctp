<?php
use Cake\Core\Configure;
    use Cake\I18n\I18n;
    $language = I18n::getLocale();
    $configs['language'] = $language;
    $total = 0;
    $currency = 'GBP';
    $convertCurrency = '£';
    $shipping = [
        1 => 'Ship',
        2 => 'Pickup',
      ];
?>
<p><?= __('Below is your Order Summary and Shipping Information') ?>.</p>

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
                                    <td colspan="2"><span style="font-size:15pt;font-weight:normal;"><?= __('Delivery address') ?>:</span></td>
                                </tr>
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
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->phone_number?></span><br></td>  
                                </tr>  
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Address') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->address ?></span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Apartment, suite, unit, etc. (optional)') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->address2 ?></span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('City') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->city ?></span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Country') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->country_id ?></span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('State') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->state ?></span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Zip Code') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order->zip_code ?></span><br></td>  
                                </tr> 
                        </table>
                    
                    </td>
                    <td align="right" valign="top">
                        <table width="100%" >
                                <tr>
                                    <td colspan="2"><span style="font-size:15pt;;font-weight:normal;"><?= __('Payment details') ?>:</span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Shipping information') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= __('Cash on delivery') ?></span></td><br>
                                        <td align="right"><span style="font-size:10pt;;">Shipping: <?= $shipping[$order->shipping_method] ?></span></td>  
                                        
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
                    <td style="border-bottom:1px solid #E0DFDF; max-width:271px;"><span style="font-size:10pt;;font-weight:bold;"><?= __('Product Name') ?></span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;font-weight:bold;"><?= __('Quantity') ?></span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;font-weight:bold;"><?= __('Total') ?></span></td>
                </tr>
                <?php 
                $stt = 1; 
                foreach($cart as $item){?>
                <?php 
                    if(!empty($item->discount)){
                        $total += $item->discount * $item->quantity;
                    }else{
                        $total += $item->price * $item->quantity;
                    }                  
                ?>
                <tr>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"><?= $stt;?></span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"><?= $item['title'];?><br>
                        <?php foreach($item->attributes as $key => $attr): ?>
                            <span>Size: <?= $attr['value']?></span><br>
                        <?php endforeach ?>
                        <span><?= 'Date: ' . date_format(date_create($item['date']),'m-d-Y') ?></span>
                    </span>
                    </td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"><?= $item['quantity'];?></span></td>
                    <td style="border-bottom:1px solid #E0DFDF;"><span style="font-size:10pt;"><?php echo $convertCurrency,$item->price * $item->quantity; ?></span></td>
                </tr>
                <?php
        $stt++;
        }?>
            </table>
            
            <table>
                <tr>
                    <td height="20"></td>
                </tr>
        </table>
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                        <td width="200" align="left"><span style="font-size:15pt;font-weight:normal;"><?= __('Note') ?>:</span><span style="font-size:13px;;">&nbsp;<?= $order->description ?></span></td>
                     
                     
                     <td align="right">
                        <span style="font-size:10pt;font-weight:700;"><?= __('Total') ?>:</span>
                    </td>
                    <td align="left" width="200">
                         <span style="font-size:13px;;">&nbsp; <?php echo $convertCurrency,$total; ?> GBP</span>
                    </td>
                </tr>
            </table>
            
            <table width="100%" style="border-bottom:1px solid #E0DFDF;">
                <tr>
                    <td height="20"></td>
                 </tr>
            </table>
            
            <table width="100%" style="">
                <tr>
                    <td height="10"></td>
                 </tr>
            </table>
            
            
        <!-- // end content -->
        </td>
    </tr>
</table>
