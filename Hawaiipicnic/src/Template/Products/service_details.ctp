<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[37][0]->id . DS . $banners[37][0]->image ) ?>" alt="<?= $banners[37][0]->title ?>"></div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[37][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $service->title ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us -->
<div class="package-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 animate-box" data-animate-effect="fadeInLeft"> <img src="<?= $webroot ?>images/services/7.jpg" class="img-fluid mb-30" alt=""> </div>
            <div class="col-md-7 animate-box content-box" data-animate-effect="fadeInLeft">
                <span class="price"><?= $service->excerpt ?></span>
                <p><?= $service->description ?></p>
                <?= $service->content ?>
                <div class="btn-contact text-center"><a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'booking']) ?>"><span><?= __('Book Now') ?></span></a> </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing -->
<div class="price-section pt-60 pb-60 price bg-pink">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> <span class="heading-meta"><?= $service->product_categories[0]->title ?></span>
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= __('Other PACKAGES')  ?></h2> </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-theme package-slide">
            <?php foreach($service_other as $service): ?>    
                <div class="item thumb-ani">
                    <div class="cont">
                        <div class="type">
                            <h6><?= $service->title ?></h6> </div>
                        <div class="value">
                            <!-- <h4>2500<span>$</span></h4> -->
                            <p><?= $service->excerpt ?></p>
                        </div>
                        <div class="feat">
                            <p><?= $service->description ?></p>
                        </div>
                    </div>
                    <div class="btn-book thumb-ani"> <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'serviceDetails',$service->slug]) ?>"><span><?= __('See more') ?></span></a> </div>
                </div>
            <?php endforeach ?>  
            </div>
        </div>
    </div>
</div>