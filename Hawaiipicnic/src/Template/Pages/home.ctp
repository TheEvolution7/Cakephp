<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<!-- Slider -->
<aside id="pwe-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url('<?= $this->Url->build('/uploads/banners/' . $banners[6][0]->id . DS . $banners[6][0]->image ) ?>');">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1><?= $banners[6][0]->title ?></h1>
                                    <p><?= $banners[6][0]->description ?></p>
                                    <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'booking']) ?>" target="_blank"><span><?= __('Buy Now') ?></span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            
        </ul>
    </div>
</aside>
<!-- Services -->
<div class="services-section services clear pt-90 pb-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[7][0]->title ?></span> 
                <h2 class="pwe-heading animate-box detail-title" data-animate-effect="fadeInLeft"><?= $banners[7][0]->description ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                <?php foreach($services as $service): ?>
                    <div class="item thumb-ani">
                        <div class="position-re o-hidden"> <img src="<?= $this->Url->build('/uploads/products/'.$service->id . DS . $service->image) ?>" alt="<?= $service->title ?>"> </div>
                        <div class="con"> 
                            
                            <h5><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'serviceDetails',$service->slug]) ?>"><?= $service->title ?></a></h5> 
                            <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'serviceDetails',$service->slug]) ?>"><i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- How to book -->
<div class="how-section pb-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[8][0]->title ?></span> 
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[8][0]->description ?></h2>
            </div>
        </div>
        <div class="row step-list">
        <?php foreach($banners[9] as $banner): ?>
            <div class="col-md-4 d-flex">
                <div class="box-step thumb-ani animate-box" data-animate-effect="fadeInLeft">
                    <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>">
                    <h3><?= $banner->title ?></h3>
                    <p>
                        <?= $banner->description ?>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
        </div>
        <div class="row how-list">
            <div class="col-md-6 d-flex img-box">
                <div class="thumb-img animate-box" data-animate-effect="fadeInLeft">
                    <img src="<?= $this->Url->build('/uploads/banners/' . $banners[10][0]->id . DS . $banners[10][0]->image ) ?>" alt="<?= $banners[10][0]->title ?>">
                </div>
            </div>
            <div class="col-md-6 d-flex content-box">
                <div class="box-content thumb-ani animate-box" data-animate-effect="fadeInRight">
                    <h3 class="pwe-heading"><?= $banners[10][0]->title ?></h3>
                    <p><?= $banners[10][0]->description ?></p>
                    <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'addOn']) ?>"><span><?= __('Add-Ons') ?></span></a></div>
                </div>
            </div>
        </div>
        <div class="row how-list">
            <div class="col-md-6 d-flex img-box">
                <div class="thumb-img animate-box" data-animate-effect="fadeInRight">
                    <img src="<?= $this->Url->build('/uploads/banners/' . $banners[10][1]->id . DS . $banners[10][1]->image ) ?>" alt="<?= $banners[10][1]->title ?>">
                </div>
            </div>
            <div class="col-md-6 d-flex content-box">
                <div class="box-content thumb-ani animate-box" data-animate-effect="fadeInLeft">
                    <h3 class="pwe-heading"><?= $banners[10][1]->title ?></h3>
                    <p><?= $banners[10][1]->description ?></p>
                    <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'activities']) ?>"><span><?= __('Activity Package') ?></span></a></div>
                </div>
            </div>
        </div>
        <div class="row how-list">
            <div class="col-md-6 d-flex img-box">
                <div class="thumb-img animate-box" data-animate-effect="fadeInLeft">
                    <img src="<?= $this->Url->build('/uploads/banners/' . $banners[10][2]->id . DS . $banners[10][2]->image ) ?>" alt="<?= $banners[10][2]->title ?>">
                </div>
            </div>
            <div class="col-md-6 d-flex content-box">
                <div class="box-content thumb-ani animate-box" data-animate-effect="fadeInRight">
                    <h3 class="pwe-heading"><?= $banners[10][2]->title ?></h3>
                    <?= $banners[10][2]->description ?>
                    <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'partyfavors']) ?>"><span><?= __('Party Favors') ?></span></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testiominals -->
<div class="testiominal-section pt-90 pb-90 testimonials bg-img bg-fixed" data-overlay-dark="5" data-background="<?= $webroot ?>img/pinic/client.jpg">
    <div class="container-fluid">
        <div class="row">
            <div class="section-head col-md-5"> 
                <h4><?= $banners[11][0]->title ?></h4>
                <p><?= $banners[11][0]->description ?></p>
            </div>
            <div class="owl-carousel owl-theme col-md-7">
            <?php foreach($banners[12] as $banner): ?>
                <div class="item-box"> <span class="quote">
                        <img src="<?= $webroot ?>images/quot.png" alt="">
                    </span>
                    <p><?= $banner->description ?></p>
                    <div class="info">
                        <div class="author-img"> <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"> </div>
                        <div class="cont">
                            <h6><?= $banner->title ?></h6> <span><?= $banner->url ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- Blog -->
<div class="blog-section blog pt-90 pb-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-30"><span class="heading-meta"><?= $banners[13][0]->title ?></span>
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[13][0]->description ?></h2>
            </div>
        </div>
        <div class="row">
        <?php foreach($articles_home as $article): ?>
            <div class="col-md-4 d-flex">
                <div class="item thumb-ani mb-30 animate-box" data-animate-effect="fadeInLeft">
                    <div class="post-img"> <img src="<?= $this->Url->build('/uploads/articles/'.$article->id . '/thumbnail/' . $article->image) ?>" alt="<?= $article->title ?>">
                        
                    </div>
                    <div class="content"> <span class="tag">
                            <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'category',$article->article_categories[0]->slug]) ?>"><?= $article->article_categories[0]->title ?></a>
                        </span>
                        <h5><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'details',$article->slug]) ?>" class="detail-title"><?= $article->title ?></a></h5>
                        <p><?= $article->description ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Instargram -->
<div class="instargram-section">
    <div class="pwe-section pt-0 pb-60">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[14][0]->title ?></span>
                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[14][0]->description ?></h2>
                </div>
            </div>
            <!-- Gallery -->
            <div class="row mb-60">
            <?php foreach($banners[15] as $banner): ?>
                <div class="col-md-4 gallery-item animate-box" data-animate-effect="fadeInLeft">
                    <a href="<?= $banner->url ?>">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>" class="img-fluid mx-auto d-block"> </div>
                            <div class="gallery-detail text-center"> <i class="ti-instagram"></i> </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>  
            </div>
        </div>
    </div>
</div>