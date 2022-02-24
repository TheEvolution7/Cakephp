<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
 <!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[27][0]->id . DS . $banners[27][0]->image) ?>" alt="<?= $banners[27][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $new->article_categories[0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $new->title ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Post -->
<div class="post-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 image-content animate-box" data-animate-effect="fadeInLeft"> <img src="<?= $this->Url->build('/uploads/articles/'.$new->id . DS . $new->image) ?>" class="img-fluid mb-30" alt="<?= $new->title ?>"> </div>
        </div>
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
               <?= $new->content ?>
            </div>
        </div>
    </div>
</div>
<!-- Clients -->
<?= $this->element('client-logo') ?>
<!-- CTA -->
<?= $this->element('subscribe') ?>