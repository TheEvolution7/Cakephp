<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    echo $this->element('meta'); 
?>  
<header class="fullscreen-element no-pad centered-text">
    <div class="background-image-holder parallax-background overlay">
        <img class="background-image" alt="<?= $banners[16][1]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[16][1]->id . DS . $banners[16][1]->image ) ?>">
    </div>

    <div class="container align-vertical">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="text-white alt-font"><?= $product->excerpt ?></span>
                <h1 class="text-white"><?= $product->title ?> Detail</h1>
                <p class="lead text-white"><?= $product->description ?></p>
                <a href="<?= $banners[24][0]->url ?>" class="btn btn-primary btn-filled"><?= __('Call Us') ?></a>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</header>

<section class="title-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="title-content">
                    <h1><?= $product->title ?></h1>
                    <div class="price">
                        <span><?= $product->currency.$product->price ?></span><?= __('/Per Person') ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex-center">
                <div class="info-tour">
                    <ul>
                        <li>
                            <div class="info-item">
                                <i class="icon icon_clock_alt"></i>
                            </div>
                            <div class="content">
                                <h5><?= __('Duration') ?></h5>
                                <p><?= $product->duration ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="info-item">
                                <i class="icon icon_ribbon_alt"></i>
                            </div>
                            <div class="content">
                                <h5><?= __('Tour Type') ?></h5>
                                <p><?= $product->type ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="info-item">
                                <i class="icon icon_pin_alt"></i>
                            </div>
                            <div class="content">
                                <h5><?= __('Location') ?></h5>
                                <p><?= $product->location ?></p>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-bottom" style="background-image: url(<?= $webroot ?>img/accolades-ornaments-bottom.png);"></div>
</section>

<section class="article-single detail-tour-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="article-body">
                    <?= $product->content ?>
                    <p class="lead"><?= __('Included/Exclude') ?></p>
                        <ul class="list-tour-info">
                    <?php foreach($product->attribute_values as $attr): ?>
                        <?php if($attr->attribute_id == 1): ?>
                            <li>
                                <div class="icon">
                                    <i class="icon icon_check"></i>
                                </div>
                                <div class="text">
                                    <p><?= $attr->title ?></p>
                                </div>
                            </li>
                        <?php endif ?>
                        <?php if($attr->attribute_id == 2): ?>
                            <li>
                                <div class="icon">
                                    <i class="icon icon_close"></i>
                                </div>
                                <div class="text">
                                    <p><?= $attr->title ?></p>
                                </div>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?> 
                    </ul>
                <?php if($product->id == 13): ?>
                    <p class="lead">
                        <?= $banners[16][1]->title ?>
                    </p>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php foreach($banners[17] as $k => $banner): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading-<?= $k ?>">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= $k ?>" aria-expanded="<?= $k == 0 ? 'true' : 'false' ?>" aria-controls="collapse-<?= $k ?>">
                                    <div class="text"><span><?= $banner->title ?></span> <?= $banner->description  ?></div><i class="arrow_carrot-down"></i>
                                    </a>
                                </h4>
                                </div>
                                <div id="collapse-<?= $k ?>" class="panel-collapse collapse <?= $k == 0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading-<?= $k ?>">
                                <div class="panel-body">
                                    <?= $banner->content  ?>
                                </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                    <figure>
                        <div class="projects-container column-projects">
                            <?php $images = explode('|', $product->images); unset($images[count($images) - 1]) ?>
                            <?php foreach($images as $img): ?>
                            <div class="col-md-4 col-sm-6 project development image-holder">
                                <a href="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $img) ?>" data-lightbox="true" data-title="<?= $product->title ?>">
                                    <div class="background-image-holder">
                                        <img class="background-image" alt="<?= $product->title ?>" src="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $img) ?>">
                                    </div>
                                </a>
                                </div>
                            <?php endforeach ?>  
                        </div>
                    </figure>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="blog-sidebar __booking-form">
                    <!-- <div class="sidebar-widget">
                        <h5><?= __('Book Now') ?></h5>
                        <?= $this->Form->create($product , ['url' => ['controller' => 'Carts', 'action' => 'add']]) ?>
                        <div class="form-booking">
                            <div class="input-group">
                                <label for="">Select Tour Date</label>
                                <?php echo $this->Form->text('date', array('type' => 'date','class' => 'form-control')); ?>
                            </div>
                            <div class="input-group">
                                <label for="">Pick-Up Time From Hotel</label>
                                <?php echo $this->Form->text('time', array('type' => 'time','class' => 'form-control')); ?>
                            </div>
                            <div class="input-group">
                                <label for="">No. Of Passengers</label>
                                <div class="quantity">
                                    <button type="button" class="minus"><i class="icon icon_minus-06"></i></button>
                                    <input type="text" readonly="true" name="quantity" step="1" value="1" min="1" title="Qty" class="input-text qty text">
                                    <button type="button" class="plus"><i class="icon icon_plus"></i></button>
                                </div>
                                <p class="sub-input">For 1-6 passengers. $60 per additional passenger thereafter.</p>
                            </div>
                            
                            <div class="input-group">
                                <label for="">No. Of Child Car Seats Needed?</label>
                                <div class="quantity">
                                    <button type="button" class="minus"><i class="icon icon_minus-06"></i></button>
                                    <input type="text" readonly="true" name="quantity2" step="1" value="0" min="0" title="Qty" class="input-text qty text">
                                    <button type="button" class="plus"><i class="icon icon_plus"></i></button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                        <?php $this->Form->end(); ?>
                    </div> -->
                    <div class="sidebar-widget">
                        <h5><?= __('More Information') ?></h5>
                        <div class="form-booking">
                            <div class="input-group">
                                <label for=""><?= __('Phone Number:') ?></label>
                                <p class="link-p"><a href="tel:<?= \Cake\Core\Configure::read('Core.setting.phone_number') ?>"><i class="icon icon_mobile"></i>&nbsp;&nbsp; <?= \Cake\Core\Configure::read('Core.setting.phone_number') ?></a></p>

                            </div>
                            <div class="input-group">
                                <label for=""><?= __('Email:') ?></label>
                                <p class="link-p"><a href="mailto:<?= \Cake\Core\Configure::read('Core.setting.email') ?>"><i class="icon icon_mail_alt"></i>&nbsp;&nbsp; <?= \Cake\Core\Configure::read('Core.setting.email') ?></a></p>
                            </div>
                            <div class="input-group">
                                <label for=""> <?= $banners[24][0]->title ?></label>
                                <?= $banners[24][0]->content ?>
                            </div>
                            <div class="input-group">
                                <label for=""> <?= $banners[24][0]->description ?></label>
                            </div>
                            <a href="<?= $banners[24][0]->url ?>" class="btn btn-primary"><?= __('Call Us') ?></a>
                            
                        </div>
                    </div>
                    <!-- <div class="sidebar-widget">
                        <h5><?= __('Destination History') ?></h5>
                        <div class="destination-box">
                        <?php foreach($product->articles as $article): ?>
                            <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'details',$article->slug,$article->id]) ?>" class="item">
                                <div class="img">
                                    <img src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image ) ?>" alt="<?= $article->title ?>">
                                </div>
                                <div class="content-b">
                                    <h4 class="title"><?= $article->title ?></h4>
                                    <span class="location"><?= $product->location ?></span>
                                </div>
                            </a>
                        <?php endforeach ?>   
                        </div>
                    </div> -->

                    
                </div>
            </div>

        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
