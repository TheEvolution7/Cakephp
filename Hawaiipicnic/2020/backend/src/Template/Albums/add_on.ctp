<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
 <!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[24][0]->id . DS . $banners[24][0]->image) ?>" alt="<?= $banners[24][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[24][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[24][0]->description ?></h2></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio -->
<div class="portfolio-section portfolio pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
        <?php foreach($albums as $album): ?>
            <div class="col-md-4">
                <div class="item animate-box" data-animate-effect="fadeInLeft">
                    <div class="portfolio-img">
                        <a href="javascript:;"><img src="<?= $this->Url->build('/uploads/albums/'.$album->id . DS . $album->image) ?>" alt="<?= $album->title ?>"></a>
                    </div>
                    <div class="content">
                        <h5><a href="javascript:;"><?= $album->title ?></a></h5> </div>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Clients -->
<?= $this->element('client-logo') ?>
<!-- CTA -->
<?= $this->element('subscribe') ?>