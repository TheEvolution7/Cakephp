<?php   
    echo $this->element('meta'); 
    $total_leis = $booking['quantity2'] * $booking['price-lie'];
    $total_price = $booking['price'] + $total_leis;
?>    
<?= $this->element('header_booking') ?> 
<section class="booking-detail">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-sidebar __booking-form">
                    <div class="sidebar-widget">
                        <h2><?= __('Payment Stripe') ?></h2>
                        <div class="form-booking">
                        <?= $this->Form->create(null, ['url' => ['controller' => 'Carts', 'action' => 'paymentStripe'], 'id' => 'paymentFrom']);?>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('First Name') ?> <span>*</span></label>
                                        <input class="form-control" type="text" name="first_name" value="<?= $order['first_name'] ?>" id="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('Last Name') ?><span>*</span></label>
                                        <input class="form-control" type="text" name="last_name" value="<?= $order['last_name'] ?>" id="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('Email') ?> <span>*</span></label>
                                        <input class="form-control" type="email" name="email" value="<?= $order['email'] ?>" id="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('Phone Number') ?> <span>*</span></label>
                                        <input class="form-control" type="tel" name="phone" value="<?= $order['phone'] ?>" id="" readonly>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('Additional Information') ?></label>
                                        <textarea name="description" id="" cols="30" rows="5" value="<?= $order['description'] ?>" class="form-control" disabled><?= $order['description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="box-cart-sum">
                                        <table class="">
                                            <thead>
                                                <tr>
                                                    <th><?= __('Product') ?></th>
                                                    <th><?= __('Price') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="title-c">
                                                        <h5><?= __('Roundtrip Shuttle Service') ?></h5>
                                                        <p><?= __('No. of passengers:'). ' ' .$booking['quantity'] ?></p>
                                                        <p><?= __('No. of leis:') .' '.$booking['quantity2'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price"><?= '$'.$booking['price'] ?></div>
                                                
                                                    <div class="price"><?= '$'.$total_leis ?></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <ul>
                                            <li><?= __('Gratuity is not included') ?></li>

                                            <li><?= __('Drivers will load and unload your luggage.') ?></li>
                                        </ul>
                                    </div>
                                </div>
                                 <div class="col-xs-12" id="paymentResponse" role="alert" ></div> 
                                <div class="col-xs-12">
                                        <div class="input-group">  
                                        <label for=""><?= __('Card Number') ?> <span>*</span></label>
                                        <div id="card_number" class="field form-control"></div>
                                        </div> 
                                    </div>   
                                    <div class="col-xs-12">
                                        <div class="input-group">     
                                        <label for="address-co"><?= __('Expiry') ?> <span>*</span></label>
                                        <div id="card_expiry" class="field form-control"></div>
                                        </div> 
                                    </div>   
                                    <div class="col-xs-12">
                                        <div class="input-group">     
                                        <label for="address-co">CVC <span>*</span></label>
                                        <div id="card_cvc" class="field form-control"></div>
                                    </div> 
                                    </div>   
                                <div class="col-xs-12">
                                    <div class="input-group-check" style="align-items: flex-start;">
                                        <input type="checkbox" name="check-box" id="check-box" required style="margin-top: 5px;" requied>
                                        <label for="check-box" style="font-weight: 400;font-size: 13px;"><?= __('By checking off the box, you are confirming that you have read and agree to our cancellation policy. You will be charged a 30% fee if your reservation has been made in a private time slot or if there was potential business lost due to rescheduling.') ?></label>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="input-group price" style="margin-top: 20px;">
                                        <label for=""><?= __('Total:') ?></label>
                                        <p class="price-text">
                                            <?= $order->currency.$order->amount ?>
                                        </p>
                                    </div>
                                </div>


                            </div>
                            <div class="group-btn">   
                                <button type="submit" class="btn btn-primary"><?= __('Submit') ?></a>
                            </div>
                        <?php $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end of row-->
    </div>
<!--end of container-->
</section>
<style> #paymentResponse p {
    background: red;
    color: #fff;
    padding: 5px 10px;
    margin-bottom: 10px;
} </style>