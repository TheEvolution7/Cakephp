<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[15][0]->id . DS . $banners[15][0]->image) ?>" alt="<?= $banners[15][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[15][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[15][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us -->
<div class="about-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-center"> <img src="<?= $this->Url->build('/uploads/banners/'.$banners[15][1]->id . DS . $banners[15][1]->image) ?>" alt="<?= $banners[15][1]->title ?>" class="img-fluid mb-30 animate-box" data-animate-effect="fadeInLeft" >
                <h4 class="pwe-about-subheading animate-box" data-animate-effect="fadeInUp"><?= $banners[15][1]->content ?></h4>
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <h3 class="pwe-about-heading"><?= $banners[15][1]->title ?></h3>
                <?= $banners[15][1]->description ?>
            </div>
        </div>
    </div>
</div>
<!-- Team -->
<div class="team-section team pt-90 pb-90 bg-pink">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-30"> <span class="heading-meta"><?= $banners[15][2]->title ?></span>
                <h2 class="pwe-heading mb-30 animate-box" data-animate-effect="fadeInLeft"><?= $banners[15][2]->description ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme animate-box" data-animate-effect="fadeInLeft">
            <?php foreach($banners[16] as $banner): ?>
                <div class="item">
                    <div class="img"> <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>"> </div>
                    <div class="info">
                        <h6><?= $banner->title ?></h6>
                        <p><?= $banner->description ?></p>
                        <div class="social valign">
                            <div class="full-width">
                                <p><i>Follow Me!</i></p> 
                                <?= $banner->content ?>
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
<?= $this->element('client-logo') ?>
<!-- CTA -->
<?= $this->element('subscribe') ?>