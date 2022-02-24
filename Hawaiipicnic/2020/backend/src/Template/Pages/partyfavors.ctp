<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[21][0]->id . DS . $banners[21][0]->image) ?>" alt="<?= $banners[21][0]->title ?>"></div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[21][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[21][0]->description ?></h2></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- party -->
<div class="party-section">
    <div class="container-fluid">
        <div class="row step-list">
        <?php foreach($banners[22] as $banner): ?>
            <div class="col-md-4 d-flex">
                <div class="box-step thumb-ani animate-box" data-animate-effect="fadeInLeft">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                    <h3><?= $banner->title ?></h3>
                    <p><?= $banner->description ?></p>
                </div>
            </div>
        <?php endforeach ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="btn-book thumb-ani"><a href="<?= $this->url->build(['controller' => 'Products','action'=> 'booking']) ?>" target="_blank"><span>Book Now</span></a></div>
            </div>
        </div>
    </div>
</div>
<!-- CTA -->
<?= $this->element('subscribe') ?>