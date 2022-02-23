<?php
    use Cake\Core\Configure;
    use Cake\I18n\Number;
    use Cake\I18n\Time;
?>
<h1 style="font-size:18pt;"><?= __('Scheduling Appointment Details') ?>.</h1>

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;font-family:arial;font-size:10pt;">
    <tr>
        <td>
        <!-- // content here -->
            
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #E0DFDF;">
                <tr>
                    <td width="50%">
                    <span style="font-size:20pt; font-weight:bold; color:#666;"></span><?= Configure::read('Core.setting.owner') ?></td>
                    <td width="50%" align="right">
                        <span style="font-size:18pt;">#<?= $id;?> / <?php $t = new Time($created); echo $t->nice()?></span><br>
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
                                    <td colspan="2"><span style="font-size:15pt;font-weight:normal;"><?= __('Information') ?>:</span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Service') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $service['title'] ?> </span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;">Provider:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $personal['title'] . ' ' . $personal['forename'] . ' ' . $personal['surname'] ?></span><br></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('When') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;">
                                            <?php 
                                            $data['date'] = $date;
                                            $data['time'] = $start_time;
                                            $time = new Time(__('{date} {time}', $data));
                                            echo $time->nice() . ' - ' . $service['duration'] . ' minutes';
                                            ?>
                                        </span><br></td>  
                                </tr>  
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Price') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $this->Number->currency($service['price'], 'USD'); ?></span><br></td>  
                                </tr>
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Meeting Id') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $meeting['id']; ?></span><br></td>  
                                </tr>  
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Topic') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $meeting['topic']; ?></span><br></td>  
                                </tr>  
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Join URL') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><a href="<?= $meeting['join_url'] ?>" target="_blank"><?= $meeting['join_url'] ?></a></span><br></td>  
                                </tr>  
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Meeting Password') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $meeting['password'] ?></span><br></td>  
                                </tr>   

                        </table>
                    </td>
                    <td align="right" valign="top">
                        <table width="100%" >
                                <tr>
                                    <td colspan="2"><span style="font-size:15pt;;font-weight:normal;"><?= __('Status') ?>:</span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Appointment Status') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?php echo $status; ?></span></td>  
                                </tr> 
                                <tr>
                                    <td><span style="font-size:10pt;;font-weight:bold;"><?= __('Payment status') ?>:</span></td>
                                        <td align="right"><span style="font-size:10pt;;"><?= $order['status'] ?></span></td>  
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
            
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="right">
                        <span style="font-size:10pt;font-weight:700;"><?= __('Total') ?>:</span>
                    </td>
                    <td align="left" width="200">
                         <span style="font-size:13px;;">&nbsp; <?php echo $this->Number->currency($order['amount'], 'USD'); ?></span>
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
