<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[31][0]->id . DS . $banners[31][0]->image ) ?>" alt="<?= $banners[31][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[31][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[31][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us -->
<div class="about-section active-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 animate-box d-flex box-img" data-animate-effect="fadeInLeft"> 
                <div class="thumb-img">
                    <img src="<?= $this->Url->build('/uploads/banners/' . $banners[31][1]->id . DS . $banners[31][1]->image ) ?>" alt="<?= $banners[31][1]->title ?>" class="img-fluid mb-30"> 
                </div>
                
            </div>
            <div class="col-md-7 animate-box box-content" data-animate-effect="fadeInLeft">
                <h3><?= $banners[31][1]->title ?></h3>
                <p><?= $banners[31][1]->description ?></p>
                <div class="btn-book thumb-ani">
                    <a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'booking']) ?>" target="_blank"><span><?= __('Book now') ?></span></a>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Album -->
<div class="album-section pt-60 pb-60 bg-pink">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> <span class="heading-meta"><?= $banners[31][2]->title ?></span>
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[31][2]->description ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme animate-box" data-animate-effect="fadeInLeft">
            <?php foreach($albums as $album): ?>
                <div class="item gallery-item">
                    <a href="<?= $this->Url->build('/uploads/albums/' . $album->album_id . DS . $album->image ) ?>" title="<?= $album->title ?>" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="<?= $this->Url->build('/uploads/albums/' . $album->album_id . DS . $album->image ) ?>" class="img-fluid mx-auto d-block" alt="<?= $album->title ?>"> </div>
                            <div class="gallery-detail text-center"> <i class="ti-plus"></i> </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>