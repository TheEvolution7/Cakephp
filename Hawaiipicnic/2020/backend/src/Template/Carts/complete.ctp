<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[33][0]->id . DS . $banners[33][0]->image) ?>" alt="<?= $banners[33][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta"><?= $banners[33][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[33][0]->description ?></h2></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Complete Page -->
<section class="complete-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="inner-box">
                    <h2><?= $banners[33][1]->title ?></h2>
                    <img src="<?= $webroot ?>images/check.png" alt="">
                    <p><?= $banners[33][1]->description ?></p>
                    <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'booking']) ?>"><span>Back</span></a></div>
                </div>
            </div>
        </div>
    </div>
</section>