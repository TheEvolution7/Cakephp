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
                        <h2><?= __('Your Information') ?></h2>
                        <div class="form-booking">
                        <?= $this->Form->create(null,['url' => ['controller' => 'Carts', 'action' => 'information']]) ?>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('First Name') ?> <span>*</span></label>
                                        <input class="form-control" type="text" name="first_name" id="" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('Last Name') ?><span>*</span></label>
                                        <input class="form-control" type="text" name="last_name" id="" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('Email') ?> <span>*</span></label>
                                        <input class="form-control" type="email" name="email" id="" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('Phone Number') ?> <span>*</span></label>
                                        <input class="form-control" type="tel" name="phone" id="" required>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <label for=""><?= __('Additional Information') ?></label>
                                        <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
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
                                
                                <div class="col-md-12">
                                    <div class="input-group price" style="margin-top: 20px;">
                                        <label for=""><?= __('Total:') ?></label>
                                        <p class="price-text">
                                            <?= '$'.$total_price ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="group-btn">
                                <a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'pickup']) ?>" class="btn btn-primary"><?= __('Previous') ?></a>
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