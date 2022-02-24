<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[17][0]->id . DS . $banners[17][0]->image ) ?>" alt="<?= $banners[17][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[17][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[17][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us -->
<div class="about-section pt-3 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-center"> <img src="<?= $this->Url->build('/uploads/banners/' . $banners[18][0]->id . DS . $banners[18][0]->image ) ?>" alt="<?= $banners[18][0]->title ?>" class="img-fluid mb-30 animate-box" data-animate-effect="fadeInLeft">
                <h4 class="pwe-about-subheading animate-box" data-animate-effect="fadeInUp"><?= $banners[18][0]->title ?></h4>
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <h3 class="pwe-about-heading"><?= $banners[18][0]->description ?></h3>
                <h4 class="pwe-about-subheading"><?= $banners[18][1]->title ?></h4>
                <?= $banners[18][1]->description ?>
            </div>
        </div>
    </div>
</div>
<!-- Team -->
<div class="team-section team pt-90 pb-90 bg-pink">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[19][0]->title ?></span>
                <h2 class="pwe-heading mb-30 animate-box" data-animate-effect="fadeInLeft"><?= $banners[19][0]->description ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme animate-box" data-animate-effect="fadeInLeft">
            <?php foreach($banners[20] as $banner): ?>
                <div class="item">
                    <div class="img"> <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"> </div>
                    <div class="info">
                        <h6><?= $banner->title ?></h6>
                        <p><?= $banner->description ?></p>
                        <div class="social valign">
                            <div class="full-width">
                                <p><i><?= __('Follow Me!') ?></i></p> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter-alt"></i></a> <a href="#"><i class="ti-instagram"></i></a> <a href="#"><i class="ti-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- Clients -->
<div class="clients-section clients">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme">
            <?php foreach($banners[21] as $banner): ?>
                <div class="client-logo">
                    <a href="<?= $banner->url ?>"><img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></a>
                </div>
            <?php endforeach ?> 
            </div>
        </div>
    </div>
</div>