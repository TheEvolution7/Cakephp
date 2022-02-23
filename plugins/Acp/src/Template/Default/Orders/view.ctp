<?php

$status = [
  0 => '<label class="badge badge-light btn-outline-light">'.__d('acp', 'Waiting',true).'</label>',
  1 => '<label class="badge badge-info">'.__d('acp', 'Pending',true).'</label>',
  2 => '<label class="badge badge-warning">'.__d('acp', 'Shipping',true).'</label>',
  3 => '<label class="badge badge-success">'.__d('acp', 'Finish',true).'</label>',
  4 => '<label class="badge badge-danger">'.__d('acp', 'Pending',true).'</label>',
];

$btns = [
  0 => 'href="'.$this->Url->build(['plugin' => 'acp','controller' => 'orders','action' => 'change_status',$order->id,0]).'" class="btn btn-secondary btn-outline-secondary mr-1">'.__d('acp', 'Waiting',true),
  1 => 'href="'.$this->Url->build(['plugin' => 'acp','controller' => 'orders','action' => 'change_status',$order->id,1]).'" class="btn btn-info mr-1">'.__d('acp', 'Pending',true),
  2 => 'href="'.$this->Url->build(['plugin' => 'acp','controller' => 'orders','action' => 'change_status',$order->id,2]).'" class="btn btn-warning mr-1">'.__d('acp', 'Shipping',true),
  3 => 'href="'.$this->Url->build(['plugin' => 'acp','controller' => 'orders','action' => 'change_status',$order->id,3]).'" class="btn btn-success mr-1">'.__d('acp', 'Finished',true),
  4 => 'href="'.$this->Url->build(['plugin' => 'acp','controller' => 'orders','action' => 'change_status',$order->id,4]).'" class="btn btn-danger mr-1">'.__d('acp', 'Canceled',true),
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
              <h1 class="kt-invoice__title"><?= __d('acp', 'INVOICE');?></h1>
              <div href="#" class="kt-invoice__logo">
                <!-- <a href="#"><img src="<?= $webrootAcp ?>media/company-logos/logo_client_white.png"></a> -->
                <span class="kt-invoice__desc">
                  <span><?=  $order['full_name']; ?></span>
                  <span><?=  $order['company']; ?></span>
                  <span><?=  $order['email']; ?></span>
                  <span><?=  $order['country_id']; ?></span>
                  <span><?=  $order['phone']; ?></span>

                </span>
              </div>
            </div>
            <div class="kt-invoice__items">
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'DATA');?></span>
                <span class="kt-invoice__text"><?php echo $order['created'] ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'INVOICE NO');?>.</span>
                <span class="kt-invoice__text">#<?php echo $order['id']; ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'INVOICE TO');?>.</span>
                <span class="kt-invoice__text"><?= $order['address'].$order['city'].$order['state']; ?></span>
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
                    <th><?= __d('acp', 'Description');?></th>
                    <th><?= __d('acp', 'Quantity');?></th>
                    <th><?= __d('acp', 'Unit cost');?></th>
                    <th><?= __d('acp', 'Total');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order->order_details as $key => $detail): ?>
                      <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $detail->product->title?></td>
                        <td><?= $detail->quantity?></td>
                        <td><?=$this->Cms->price_translate($detail->amount,$order->currency,$this->getConfigure('Core')['setting']['currency']).' '.$this->getConfigure('Core')['setting']['currency'] ?></td>
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
              <div class="kt-invoice__title"><?= __d('acp', 'NOTE');?></div>
              <div class="kt-invoice__item">
                <span><?= $order->description ?></span>
              </div>
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
              <span class="kt-invoice__notice">Taxes Included</span>
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