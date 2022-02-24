<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[26][0]->id . DS . $banners[26][0]->image) ?>" alt="<?= $banners[26][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[26][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[26][0]->description ?></h2></div>
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
                    <div class="position-re o-hidden"><img src="<?= $this->Url->build('/uploads/articles/'.$service->id . DS . $service->image) ?>" alt="<?= $service->title ?>"> </div>
                    <div class="con"> <span class="category">
                                <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'serviceDetails',$service->slug,$service->id]) ?>">. <?= $service->article_categories[0]->title ?></a>
                            </span>
                        <h5><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'serviceDetails',$service->slug,$service->id]) ?>"><?= $service->title ?></a></h5> <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'serviceDetails',$service->slug,$service->id]) ?>"><i class="ti-arrow-right"></i></a> </div>
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
            <div class="col-md-12"> <span class="heading-meta"><?= $banners[26][1]->title ?></span>
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[26][1]->description ?></h2> </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-theme package-slide">
            <?php foreach($services as $service): ?>
                <div class="item thumb-ani">
                    <div class="cont">
                        <div class="type">
                            <h6><?= $service->title ?></h6></div>
                            <?= $service->description ?>
                        </div>
                    <div class="btn-book thumb-ani"> <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'serviceDetails',$service->slug,$service->id]) ?>"><span>See more</span></a> </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>