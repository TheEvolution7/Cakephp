<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[23][0]->id . DS . $banners[23][0]->image) ?>" alt="<?= $banners[23][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[23][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[23][0]->description ?></h2></div>
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
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banners[23][1]->id . DS . $banners[23][1]->image) ?>" class="img-fluid mb-30" alt="<?= $banners[23][1]->title ?>"> 
                </div>      
            </div>
            <div class="col-md-7 animate-box box-content" data-animate-effect="fadeInLeft">
                    <h3><?= $banners[23][1]->title ?></h3>
                    <p><?= $banners[23][1]->description ?></p>
                <div class="btn-book thumb-ani">
                    <a href="<?= $this->url->build(['controller' => 'Products','action'=> 'booking']) ?>" target="_blank"><span>Book now</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Album -->
<div class="album-section pt-60 pb-60 bg-pink">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> <span class="heading-meta"><?= $banners[23][2]->title ?></span>
                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[23][2]->description ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme animate-box" data-animate-effect="fadeInLeft">
            <?php foreach($album->album_images as $img): ?>
                <div class="item gallery-item">
                    <a href="<?= $this->Url->build('/uploads/albums/' . DS . $img->album_id . DS . $img->image) ?>" title="Add Ons" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="<?= $this->Url->build('/uploads/albums/' . DS . $img->album_id . DS . $img->image) ?>" class="img-fluid mx-auto d-block" alt="<?= $img->title ?>"> </div>
                            <div class="gallery-detail text-center"> <i class="ti-plus"></i> </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- CTA -->
<?= $this->element('subscribe') ?>