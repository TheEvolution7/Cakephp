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
                                <h2><?= $banners[25][0]->title ?></h2>
                                <div class="form-booking">
                                <?= $this->Form->create(null,['url' => ['controller' => 'Carts', 'action' => 'bookingLeiGreeting']]) ?>
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-8 col-xs-12">
                                            <div class="content">
                                                <div class="thumb-img">
                                                    <img src="<?= $this->Url->build('/uploads/banners/' . $banners[25][0]->id . DS . $banners[25][0]->image ) ?>" alt="<?= $banners[25][0]->title ?>">
                                                </div>
                                                <?= $banners[25][0]->content ?>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-2 col-md-8 col-xs-12">
                                            <div class="input-group">
                                                <label for=""><?= __('No. Of Flower Leis') ?></label>
                                                <div class="quantity">
                                                    <button type="button" class="minus"><i class="icon icon_minus-06"></i></button>
                                                    <input id="passenger" type="text" readonly="true" name="quantity2"  step="1" value="<?= !empty($booking['quantity2']) ? $booking['quantity2'] : '1' ?>" min="1" title="Qty" class="input-text qty text">
                                                    <button type="button" class="plus"><i class="icon icon_plus"></i></button>
                                                </div>
                                                <p class="note-booking"><?= $banners[25][0]->description ?></p>
                                                <input type="hidden" name="price-lie" value="<?= $banners[25][0]->url ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group-btn">
                                        <a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'booking']) ?>" class="btn btn-primary"><?= __('Previous') ?></a>
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
        