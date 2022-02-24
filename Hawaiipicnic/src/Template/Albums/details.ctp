<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[28][0]->id . DS . $banners[28][0]->image ) ?>" alt="<?= $banners[28][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[28][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[28][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq -->

<div class="snippets-section">
    <div class="container-fluid p-0">
        <div class="row">
        <?php foreach($album->album_images as $k => $img): ?>
            <div class="col-md-3">
                <a href="<?= $this->Url->build('/uploads/albums/' . $album->id . DS . $img->image ) ?>" class="img-item img-album" data-fancybox="gallery-<?= $k+1 ?>">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="<?= $this->Url->build('/uploads/albums/' . $album->id . DS . $img->image ) ?>" class="img-fluid mx-auto d-block" alt="<?= $img->title ?>"> </div>
                        <div class="gallery-detail text-center"><i class="ti-plus"></i> </div>
                    </div>
                </a>
                <!-- <div class="box-gallery-hidden">
                <?php foreach($album->album_images as $img): ?>
                    <a href="<?= $this->Url->build('/uploads/albums/' . $img->album_id . DS . $img->image ) ?>" data-fancybox="gallery-<?= $k+1 ?>"><img src="<?= $this->Url->build('/uploads/albums/' . $img->album_id . DS . $img->image ) ?>" alt="<?= $img->title ?>"></a>
                <?php endforeach ?>
                </div> -->
            </div>
        <?php endforeach ?>
        </div>
    </div>
</div>