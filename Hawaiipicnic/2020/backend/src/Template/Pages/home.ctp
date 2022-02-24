<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<!-- Slider -->
<aside id="pwe-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
        <?php foreach($banners[3] as $banner): ?>
            <li style="background-image: url('<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>');">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h6><?= $banner->content ?></h6>
                                    <h1><?= $banner->title ?></h1>
                                    <p><?= $banner->description ?></p>
                                    <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'booking']) ?>" target="_blank"><span><?= __('Booking Now') ?></span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
        </ul>
    </div>
</aside>
<!-- Services -->
<div class="services-section services clear pt-90 pb-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[2][2]->title ?></span> 
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[2][2]->description ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                <?php foreach($services as $service): ?>
                    <div class="item thumb-ani">
                        <div class="position-re o-hidden"><img src="<?= $this->Url->build('/uploads/articles/'.$service->id . DS . $service->image) ?>" alt="<?= $service->title ?>"> </div>
                        <div class="con"> 
                            <span class="category">
                                <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'serviceDetails',$service->slug,$service->id]) ?>"><?= $service->article_categories[0]->title ?></a>
                            </span>
                            <h5><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'serviceDetails',$service->slug,$service->id]) ?>"><?= $service->title ?></a></h5> 
                            <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'serviceDetails',$service->slug,$service->id]) ?>"><i class="ti-arrow-right"></i></a>
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
            <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[4][0]->title ?></span> 
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[4][0]->description ?></h2>
            </div>
        </div>
        <div class="row step-list">
        <?php foreach($banners[5] as $banner): ?>
            <div class="col-md-4 d-flex">
                <div class="box-step thumb-ani animate-box" data-animate-effect="fadeInLeft">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                    <h3><?= $banner->title ?></h3>
                    <p><?= $banner->description ?></p>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    <?php foreach($banners[6] as $banner): ?>
        <div class="row how-list">
            <div class="col-md-6 d-flex img-box">
                <div class="thumb-img animate-box" data-animate-effect="fadeInLeft">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                </div>
            </div>
            <div class="col-md-6 d-flex content-box">
                <div class="box-content thumb-ani animate-box" data-animate-effect="fadeInRight">
                    <h3><?= $banner->title ?></h3>
                    <?= $banner->description ?>
                    <div class="btn-contact"><a href="<?= $banner->url ?>"><span><?= $banner->content ?></span></a></div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</div>
<!-- Testiominals -->
<div class="testiominal-section pt-90 pb-90 testimonials bg-img bg-fixed" data-overlay-dark="5" data-background="<?= $webroot ?>images/banner.jpg">
    <div class="container-fluid">
        <div class="row">
            <div class="section-head col-md-5"> <span><?= $banners[7][0]->title ?></span>
                <h4><?= $banners[7][0]->description ?></h4>
                <p><?= $banners[7][0]->content ?></p>
            </div>
            <div class="owl-carousel owl-theme col-md-7">
            <?php foreach($banners[8] as $banner): ?>
                <div class="item-box"> <span class="quote">
                        <img src="<?= $webroot ?>images/quot.png" alt="">
                    </span>
                    <p><?= $banner->description ?></p>
                    <div class="info">
                        <div class="author-img"> <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>"></div>
                        <div class="cont">
                            <h6><?= $banner->title ?></h6> <span><?= $banner->content ?></span>
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
            <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[2][0]->title ?></span>
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[2][0]->description ?></h2>
            </div>
        </div>
        <div class="row">
        <?php foreach($news as $new): ?>
            <div class="col-md-4 d-flex">
                <div class="item thumb-ani mb-30 animate-box" data-animate-effect="fadeInLeft">
                    <div class="post-img"> <img src="<?= $this->Url->build('/uploads/articles/'.$new->id . DS . $new->image) ?>" alt="<?= $new->title ?>">
                        <div class="date">
                            <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newsDetails',$new->slug,$new->id]) ?>"> <span><?= $new->created->format('M') ?></span> <i><?= $new->created->format('d') ?></i> </a>
                        </div>
                    </div>
                    <div class="content"> <span class="tag">
                            <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'category',$new->article_categories[0]->slug,$new->article_categories[0]->id]) ?>"><?= $new->article_categories[0]->title ?></a>
                        </span>
                        <h5><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newsDetails',$new->slug,$new->id]) ?>"><?= $new->title ?></a></h5>
                        <p><?= $new->description ?></p>
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
                <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[2][1]->title ?></span>
                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[2][1]->description ?></h2>
                </div>
            </div>
            <!-- Gallery -->
            <div class="row mb-60">
            <?php foreach($album->album_images as $album): ?>
                <div class="col-md-4 gallery-item animate-box" data-animate-effect="fadeInLeft">
                    <a href="<?= $album->description ?>">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="<?= $this->Url->build('/uploads/albums/'.$album->album_id . DS . $album->image) ?>" class="img-fluid mx-auto d-block" alt="<?= $album->title ?>"></div>
                            <div class="gallery-detail text-center"> <i class="ti-instagram"></i> </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- Clients -->
<?= $this->element('client-logo') ?>
<!-- CTA -->
<?= $this->element('subscribe') ?>