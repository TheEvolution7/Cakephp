<link href="<?= $webrootAcp ?>css/pages/invoices/invoice-1.css" rel="stylesheet" type="text/css" />
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-invoice-1">
        <div class="kt-invoice__head" style="background-image: url(<?= $webrootAcp ?>media/bg/bg-2.jpg);">
          <div class="kt-invoice__container">
            <div class="kt-invoice__brand">
              <h1 class="kt-invoice__title"><?= __d('acp', 'BOOKING');?></h1>
              <div href="#" class="kt-invoice__logo">
                <!-- <a href="#"><img src="<?= $webrootAcp ?>media/company-logos/logo_client_white.png"></a> -->
                <span class="kt-invoice__desc">
                <h3><?= __d('acp', 'Your Information');?></h3>
                  <span>First Name : <?=  $order['first_name']; ?></span>
                  <span>Last Name : <?=  $order['last_name']; ?></span>
                  <span>Phone : <?=  $order['phone']; ?></span>
                  <span>Email : <?=  $order['email']; ?></span>
                  <span>Additional Information : <?=  $order['description']; ?></span>
              </div>
            </div>
            <h5>Pick Up Location</h5>
            <div class="kt-invoice__items">
             
            <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'AirPort');?></span>
                <span class="kt-invoice__text"><?= h($order->airport) ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Hotel / Drop Off Location:');?></span>
                <span class="kt-invoice__text"><?= h($order->location_pickup) ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Arrival Date');?></span>
                <span class="kt-invoice__text"><?= h($order->date->format('d/m/Y')) ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Arrival Time');?>.</span>
                <span class="kt-invoice__text"><?= $order->time->format('h:i A') ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'If your hotel does not appear in the drop down please add here');?>.</span>
                <span class="kt-invoice__text"><?= h($order->content_pickup) ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Airline');?></span>
                <span class="kt-invoice__text"><?= $order['airline_pickup']; ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Flight Number');?></span>
                <span class="kt-invoice__text"><?= $order['flight_pickup']; ?></span>
              </div> 
            </div>
            <br>
            <h5>Departure Pick Up</h5>
            <div class="kt-invoice__items">
            <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"></span>
                <span class="kt-invoice__text"></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Hotel / Drop Off Location:');?></span>
                <span class="kt-invoice__text"><?= h($order->location_departure) ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Arrival Date');?></span>
                <span class="kt-invoice__text"><?= empty($order->departure_date) ? NULL : $order->departure_date->format('d/m/Y') ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Arrival Time');?>.</span>
                <span class="kt-invoice__text"><?= empty($order->departure_time) ? NULL : $order->departure_time->format('h:i A') ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'If your hotel does not appear in the drop down please add here');?></span>
                <span class="kt-invoice__text"><?= h($order->content_departure) ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Airline');?></span>
                <span class="kt-invoice__text"><?= $order['airline_departure']; ?></span>
              </div>
              <div class="kt-invoice__item">
                <span class="kt-invoice__subtitle"><?= __d('acp', 'Flight Number');?></span>
                <span class="kt-invoice__text"><?= $order['flight_departure']; ?></span>
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
                    <th><?= __d('acp', 'Service');?></th>
                    <th><?= __d('acp', 'Quantity Passengers');?></th>
                    <th><?= __d('acp', 'Quantity Leis');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order->order_details as $key => $detail): ?>
                      <tr>
                        <td>#<?= $order->id ?></td>
                        <td><?= $detail->product->title?></td>
                        <td><?= $detail->quantity?></td>
                        <td><?= $order->qty?></td>
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
              <!-- <div class="kt-invoice__title"><?= __d('acp', 'Other Requests? How Else May We Serve You?');?></div>
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
            <!-- <button type="button" class="btn btn-label-brand btn-bold" onclick="window.print();">Download Invoice</button>
            <button type="button" class="btn btn-brand btn-bold" onclick="window.print();">Print Invoice</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>