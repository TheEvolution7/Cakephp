<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[35][0]->id . DS . $banners[35][0]->image ) ?>" alt="<?= $banners[35][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $article->article_categories[0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $article->title ?></h2>
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
            <div class="col-md-12 image-content animate-box" data-animate-effect="fadeInLeft"> <img src="<?= $this->Url->build('/uploads/articles/'.$article->id . DS . $article->image) ?>" alt="<?= $article->title ?>" class="img-fluid mb-30"> </div>
        </div>
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <?= $article->content ?>
                <?php foreach ($article->tags as $tag): ?>
                    <?= $this->Html->link($tag->title, ['action' => 'tags', $tag->slug]) ?>
                <?php endforeach ?>
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