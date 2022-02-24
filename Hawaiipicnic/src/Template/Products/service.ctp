<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[36][0]->id . DS . $banners[36][0]->image ) ?>" alt="<?= $banners[36][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[36][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[36][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services -->
<div class="services-section services pt-0 pb-90">
    <div class="container-fluid">
        <div class="row">
        <?php foreach($services as $service): ?>
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <div class="item mb-30">
                    
                <div class="position-re o-hidden"> <img src="<?= $this->Url->build('/uploads/products/'.$service->id . DS . $service->image) ?>" alt="<?= $service->title ?>"> </div>
                    <div class="con"> <span class="category">
                                <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'serviceDetails',$service->slug]) ?>">. <?= $service->product_categories[0]->title ?></a>
                            </span>
                        <h5><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'serviceDetails',$service->slug]) ?>">“<?= $service->title ?>”</a></h5> <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'serviceDetails',$service->slug]) ?>"><i class="ti-arrow-right"></i></a> </div>
                </div>
            </div>
        <?php endforeach ?>  
        </div>
    </div>
</div>
<!-- Pricing -->
<div class="price-section pt-60 pb-60 price bg-pink">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> <span class="heading-meta"><?= $banners[36][1]->title ?></span>
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[36][1]->description ?></h2> </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-theme package-slide">
            <?php foreach($services as $service): ?>    
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