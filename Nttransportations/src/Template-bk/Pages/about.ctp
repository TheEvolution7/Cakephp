<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    echo $this->element('meta'); 
?>   
<header class="title">
    <div class="background-image-holder parallax-background">
        <img class="background-image" alt="<?= $banners[11][0]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[11][0]->id . DS . $banners[11][0]->image ) ?>">
    </div>

    <div class="container align-bottom">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-white"><?= $banners[11][0]->title ?></h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</header>

<section class="article-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-9">
                        <div class="article-body">
                            <p class="lead">
                                <?= $banners[11][1]->title ?>
                            </p>
                            <?= $banners[11][1]->content ?>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-4">
            <div class="blog-sidebar">
            <div class="sidebar-widget">
                <h5><?= __('Book Now') ?></h5>
                <?= $this->Form->create(null,['url' => ['controller' => 'Carts', 'action' => 'add']]) ?>
                        <div class="form-booking">
                            <div class="input-group">
                                <div class="select-box-thumb" style="display: block;">
                                    <label for=""><?= __('Choose Your Destination:') ?></label><br>
                                    <?= $this->Form->select('destination', $select_services, ['class' => 'select-2', 'empty' => false]) ?>
                                </div>
                            </div>
                            <!-- <div class="input-group">
                                <label for="">Select Tour Date</label>
                                <?php echo $this->Form->text('date', array('type' => 'date','class' => 'form-control')); ?>
                            </div>
                            <div class="input-group">
                                <label for="">Pick-Up Time From Hotel</label>
                                <?php echo $this->Form->text('time', array('type' => 'time','class' => 'form-control')); ?>
                            </div> -->
                            <div class="input-group">
                                <label for=""><?= __('No. Of Passengers') ?></label>
                                <div class="quantity">
                                    <button type="button" class="minus"><i class="icon icon_minus-06"></i></button>
                                    <input type="text" readonly="true" name="quantity" step="1" value="1" min="1" title="Qty" class="input-text qty text">
                                    <button type="button" class="plus"><i class="icon icon_plus"></i></button>
                                </div>
                                <p class="sub-input"><strong>*ROUND-TRIP transportation*</strong>Pricing for 1-6 passengers. $25 per additional passenger thereafter.</p>
                            </div>
                            
                            <!-- <div class="input-group">
                                <label for="">No. Of Child Car Seats Needed?</label>
                                <div class="quantity">
                                    <button type="button" class="minus"><i class="icon icon_minus-06"></i></button>
                                    <input type="text" readonly="true" name="quantity2" step="1" value="0" min="0" title="Qty" class="input-text qty text">
                                    <button type="button" class="plus"><i class="icon icon_plus"></i></button>
                                </div>
                            </div> -->
                            <button type="submit" class="btn btn-primary"><?= __('Book Now') ?></button>
                        </div>
                        <?php $this->Form->end(); ?>
        </div>

                </div>
                <!--end of row-->

                <!-- <div class="row">
                    <div class="col-md-8 col-sm-9">

                        <div class="comment-form-wrapper">
                            <br>
                            <h5><?= $banners[11][2]->title ?></h5>
                            <p>
                                <?= $banners[11][2]->description ?>
                            </p>
                            <div class="comment-respond">
                                <h5><?= __('Leave a reply') ?></h5>
                                <form class="comment-form" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>" method="post">
                                    <div class="form-input">
                                        <input type="text" name="name" placeholder="<?= __('Your Name') ?>" required/>
                                    </div>

                                    <div class="form-input">
                                        <input type="text" name="email" placeholder="<?= __('Your Email') ?>" required/>
                                    </div>

                                    <div class="form-input">
                                        <input type="text" name="phone" placeholder="<?= __('Your Phone Number') ?>" required/>
                                    </div>

                                    <div class="form-input">
                                        <textarea rows="8" name="content" placeholder="<?= __('Your comment here') ?>" required></textarea>
                                    </div>

                                    <div class="form-input">
                                        <input type="Submit" class="btn btn-primary" value="<?= __('Submit Comment') ?>" />
                                    </div>

                                </form>
                            </div>
                        </div>
                      
                    </div>
                   
                </div> -->
                

            </div>
            <!--end of container-->
        </section>
