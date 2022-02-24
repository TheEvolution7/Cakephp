<?php

$status = [
  1 => '<label class="badge badge-info">'.__d('acp', 'Pending',true).'</label>',
  2 => '<label class="badge badge-success">'.__d('acp', 'Finish',true).'</label>',
  3 => '<label class="badge badge-danger">'.__d('acp', 'Canceled',true).'</label>',
];

$btns = [
  1 => 'href="'.$this->Url->build(['plugin' => 'acp','controller' => 'orders','action' => 'change_status',$order->id,1]).'" class="btn btn-info mr-1">'.__d('acp', 'Pending',true),
  2 => 'href="'.$this->Url->build(['plugin' => 'acp','controller' => 'orders','action' => 'change_status',$order->id,3]).'" class="btn btn-success mr-1">'.__d('acp', 'Finished',true),
  3 => 'href="'.$this->Url->build(['plugin' => 'acp','controller' => 'orders','action' => 'change_status',$order->id,4]).'" class="btn btn-danger mr-1">'.__d('acp', 'Canceled',true),
];
?>
<link href="<?= $webrootAcp ?>css/pages/invoices/invoice-1.css" rel="stylesheet" type="text/css" />
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-invoice-1">
        <div class="kt-invoice__head" style="background-image: url(<?= $webrootAcp ?>media/bg/bg-2.jpg);">
          <div class="kt-invoice__container">
            <div class="kt-invoice__brand">
              <h1 class="kt-invoice__title"><?= __d('acp', 'BOOKING INFO');?></h1>
              <div href="#" class="kt-invoice__logo">
                <!-- <a href="#"><img src="<?= $webrootAcp ?>media/company-logos/logo_client_white.png"></a> -->
                <span class="kt-invoice__desc">
                  <span>First Name: <?=  $order['first_name']; ?></span>
                  <span>Last Name : <?=  $order['last_name']; ?></span>
                  <span>Phone: <?=  $order['phone']; ?></span>
                  <span>Email: <?=  $order['email']; ?></span>
                </span>
              </div>
            </div>
            <div class="kt-invoice__items">
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Datetime Booking');?></span>
                <span class="kt-invoice__text"><?php echo $order['date'] ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Location');?>.</span>
                <span class="kt-invoice__text">Where would you like to have your picnic ?  : <?=  $order['address']; ?></span>
                <span class="kt-invoice__text">If your desired location is not listed, please let us know here. : <?=  $order['content']; ?></span>
                <span class="kt-invoice__text">What would you like on your custom message board? (happy birthday, happy anniversary, etc)  35 letters max.  : <?=  $order['description']; ?></span>
                
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Add-On Details');?>.</span>
                <span class="kt-invoice__text">If you got "Picnic n Chill" Package or "Grandeur" Package which game of choice would you like?  : <?=  $order['package']; ?></span>
                <span class="kt-invoice__text">If you got "Grandeur" Package, which Hand-Crafted Arch would you like? : <?=  $order['arch']; ?></span>
                <span class="kt-invoice__text">If you got a number balloon, please submit the numbers you would like. Max 2 balloons. : <?=  $order['number']; ?></span>
                <span class="kt-invoice__text">If you got a balloon column/garland, which colors do you want (2 Colors + 1 Accent Color) : <?=  $order['color']; ?></span>
                <span class="kt-invoice__text">Where did you hear about us? : <?=  $order['social']; ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="kt-invoice__body">
          <div class="kt-invoice__container">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?= __d('acp', 'Package');?></th>
                    <th><?= __d('acp', 'Appointment');?></th>
                    <th><?= __d('acp', 'Appointment Price');?></th>
                    <th><?= __d('acp', 'Total');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order->order_details as $key => $detail): ?>
                      <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $detail->product->title?></td>
                        <td><?= $appointment->title ?></td>
                        <td><?=$this->Cms->price_translate($appointment->color,$this->getConfigure('Core')['setting']['currency']).' '.$this->getConfigure('Core')['setting']['currency'] ?></td>
                        <td><?=$this->Cms->price_translate($detail->amount*$detail->quantity,$order->currency,$this->getConfigure('Core')['setting']['currency']).' '.$this->getConfigure('Core')['setting']['currency'] ?></td>
                      </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="kt-invoice__footer">
          <div class="kt-invoice__container">
            <div class="kt-invoice__bank">
              <!-- <div class="kt-invoice__title"><?= __d('acp', 'NOTE');?></div>
              <div class="kt-invoice__item">
                <span><?= $order->description ?></span>
              </div> -->
            </div>
            <!-- <div class="kt-invoice__bank">
              <div class="kt-invoice__title">BANK TRANSFER</div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__label">Account Name:</span>
                <span class="kt-invoice__value">Barclays UK</span></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__label">Account Number:</span>
                <span class="kt-invoice__value">1234567890934</span></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__label">Code:</span>
                <span class="kt-invoice__value">BARC0032UK</span></span>
              </div>
            </div> -->
            <div class="kt-invoice__total">
              <span class="kt-invoice__title"><?= __d('acp', 'TOTAL AMOUNT');?></span>
              <span class="kt-invoice__price"><?=$this->Cms->price_translate($order->amount,$order->currency,$this->getConfigure('Core')['setting']['currency']).' '.$this->getConfigure('Core')['setting']['currency'] ?></span>
            </div>
          </div>
        </div>
        <div class="kt-invoice__actions">
          <div class="kt-invoice__container">
            <button type="button" class="btn btn-label-brand btn-bold" onclick="window.print();"><?= __d('acp','Print Invoice') ?></button>
            <?php 
              foreach ($btns as $key => $btn) {
                if ($key <= $order->status) {
                  echo '<button disabled '.$btn.'</button>';
                }else{
                  echo '<a '.$btn.'</a>';
                }
              }
              ?>     
            <!-- <button type="button" class="btn btn-label-brand btn-bold" onclick="window.print();">Download Invoice</button>
            <button type="button" class="btn btn-brand btn-bold" onclick="window.print();">Print Invoice</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>