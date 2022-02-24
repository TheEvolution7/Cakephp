<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/pages/'.$terms->id . DS . $terms->image) ?>" alt="<?= $terms->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta">Policy</span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $terms->title ?></h2></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us -->
<div class="about-section active-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                    <h3><?= $terms->title ?></h3>
                    <?= $terms->description ?>
            </div>
        </div>
    </div>
</div>
