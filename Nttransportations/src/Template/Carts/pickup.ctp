<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    echo $this->element('meta'); 
?>  
        <?= $this->element('header_booking') ?> 
        <section class="booking-detail">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="blog-sidebar __booking-form">
                            <div class="sidebar-widget">
                                <h2><?= __('Pick Up Information') ?></h2>
                                <div class="form-booking">
                                <?= $this->Form->create(null,['url' => ['controller' => 'Carts', 'action' => 'pickup']]) ?>
                                    <div class="row">
                                        <div class="col-12" style="padding-bottom: 15px;">
                                            <h3><?= $banners[18][2]->title ?></h3>
                                            <p><?= $banners[18][2]->description ?></p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('Airport:') ?></label>
                                                <input class="form-control" type="text" readonly=""  name="airport" value="<?= $product['location'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <div class="select-box-thumb" style="display: block; margin-top: 0;">
                                                    <label for=""><?= __('Hotel / Drop Off Location:') ?></label>
                                                    <select name="location_pickup" id="" class="select-2">
                                                        <?php foreach($banners[26] as $banner): ?>
                                                            <option value="<?= $banner->title ?>" <?=  !empty($booking['location_pickup']) && $booking['location_pickup'] == $banner->title ? 'selected' : ''  ?>><?= $banner->title ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('If your hotel does not appear in the drop down please add here:') ?></label>
                                                <input class="form-control" type="text" name="content_pickup" value="<?= !empty($booking['content_pickup']) ?  $booking['content_pickup'] : '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('Arrival Date') ?> <span>*</span></label>
                                                <input class="form-control" type="date" name="date" value="<?= !empty($booking['date']) ?  $booking['date'] : '' ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('Arrival Time:') ?> <span>*</span></label>
                                                <input class="form-control" type="time" name="time" value="<?= !empty($booking['time']) ?  $booking['time'] : '' ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12" style="padding-bottom: 15px;">
                                            <p>"<?= __('Arrival Note* Important – Please call or text 1 (808) 999-9994 when you arrive at the baggage claim') ?>"</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('Airline:') ?><span>*</span></label>
                                                <input class="form-control" type="text" name="airline_pickup" value="<?= !empty($booking['airline_pickup']) ?  $booking['airline_pickup'] : '' ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('Flight Number:') ?> <span>*</span></label>
                                                <input class="form-control" type="text" name="flight_pickup" value="<?= !empty($booking['flight_pickup']) ?  $booking['flight_pickup'] : '' ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12" style="padding-bottom: 15px;">
                                            <h3><?= $banners[18][3]->title ?></h3>
                                            <p><?= $banners[18][3]->description ?></p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""> <?= __('Departure Date') ?></label>
                                                <input class="form-control" type="date" name="departure_date" value="<?= !empty($booking['departure_date']) ?  $booking['departure_date'] : '' ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('Request Pick Up Time') ?></label>
                                                <input class="form-control" type="time" name="departure_time" value="<?= !empty($booking['departure_time']) ?  $booking['departure_time'] : '' ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="input-group">
                                                <div class="select-box-thumb" style="display: block; margin-top: 0;">
                                                    <label for=""><?= __('Hotel / Drop Off Location:') ?></label>
                                                    <select name="location_departure" id="" class="select-2">
                                                        <?php foreach($banners[27] as $banner): ?>
                                                            <option value="<?= $banner->title ?>" <?=  !empty($booking['location_departure']) && $booking['location_departure'] == $banner->title ? 'selected' : ''  ?>><?= $banner->title ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('If your hotel does not appear in the drop down please add here:') ?></label>
                                                <input class="form-control" type="text" name="content_departure" value="<?= !empty($booking['content_departure']) ?  $booking['content_departure'] : '' ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('Airline:') ?> <span>*</span></label>
                                                <input class="form-control" type="text" name="airline_departure" value="<?= !empty($booking['airline_departure']) ?  $booking['airline_departure'] : '' ?>" required>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group">
                                                <label for=""><?= __('Flight Number:') ?> <span>*</span></label>
                                                <input class="form-control" type="text" name="flight_departure" value="<?= !empty($booking['flight_departure']) ?  $booking['flight_departure'] : '' ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group-btn">
                                        <a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'bookingLeiGreeting']) ?>" class="btn btn-primary"><?= __('Previous') ?></a>
                                        <button type="submit" class="btn btn-primary"><?= __('Next') ?></button>
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
        