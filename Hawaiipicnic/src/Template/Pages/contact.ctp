<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[33][0]->id . DS . $banners[33][0]->image ) ?>" alt="<?= $banners[33][0]->title ?>"></div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[33][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[33][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact -->
<div class="contact-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row pb-60">
        <?php foreach($banners[34] as $banner): ?>
            <div class="col-md-4 mb-30 animate-box" data-animate-effect="fadeInLeft">
                <div class="line p-30">
                    <p><i class="ti-location-pin"></i> <b><?= $banner->title ?></b></p>
                    <?= $banner->description ?>
                </div>
            </div>
        <?php endforeach ?>
        </div>
        <!-- Map Section-->
        <div class="map-section">
            <div class="row">
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInLeft">
                    <?= $banners[32][1]->description ?>
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <h3 class="pwe-about-heading"><?= $banners[32][0]->title ?></h3>
                    <p><?= $banners[32][0]->description ?></p>
                    <form method="post" class="row" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?= __('Name') ?>" name="name" required> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?= __('Email') ?>" name="email" required> </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?= __('Subject') ?>" name="title"> </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea  id="message" cols="30" rows="7" class="form-control" name="content" placeholder="<?= __('Message') ?>"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-contact" value="<?= __('Say Hello!') ?>"></div>
                        </div>
                    </form>
                </div>
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