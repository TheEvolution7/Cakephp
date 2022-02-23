<link href="<?= $webrootAcp ?>css/pages/invoices/invoice-1.css" rel="stylesheet" type="text/css" />
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-invoice-1">
                <div class="kt-invoice__head" style="background-image: url(<?=$webrootAcp?>media/bg/bg-2.jpg);">
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
                                        <th><?= __d('acp', 'Title');?></th>
                                        <th><?= __d('acp', 'Price');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $order->appointment->service->title ?></td>
                                        <td><?= \Cake\I18n\Number::currency($order->appointment->service->price, 'USD') ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="kt-invoice__footer">
                    <div class="kt-invoice__container">
                        <div class="kt-invoice__bank">
                            <!-- <div class="kt-invoice__title"><?= __d('acp', 'NOTE');?></div> -->
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
                            <span class="kt-invoice__price"><?= \Cake\I18n\Number::currency($order->amount, 'USD') ?></span>
                            <!-- <span class="kt-invoice__notice">Taxes Included</span> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="kt-invoice__actions">
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
          </div>
        </div> -->
            </div>
        </div>
    </div>
</div>
