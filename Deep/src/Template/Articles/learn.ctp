<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<!-- Breadcrumbs Start -->
<style>
    .breadcrumbs-inner h2,
    .breadcrumbs-inner h3,
    .breadcrumbs-inner h4,
    .breadcrumbs-inner h5 {
        color: #fff
    }
</style>
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-inner text-center">
        <h1 class="page-title"><?= $banners[28][0]->title ?></h1>
        <p class="page-descript">
            <?= $banners[28][0]->description ?>
        </p>
        <div class="col-12  mt-5 mb-5 text-center wow fadeInUp" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
            <a class="readon started" href="/~deep/#membership"><?= __('Join') ?></a>
        </div>
        <h3 class="text-center"><?= $banners[28][1]->title ?></h3>
        <p class="page-descript">
            <?= $banners[28][1]->description ?>
        </p>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Contact Section Start -->

<div class="rs-inner-blog pt-50 pb-50 md-pt-40 md-pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pr-35 md-pr-15">
                <div class="row">
                <?php foreach($articles as $article): ?>
                    <div class="d-flex col-md-6 col-lg-4 mb-30 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="blog-item">
                            <!-- <div class="blog-img">
                                <a href="<?= !empty($article->pdf) ? $this->Url->build('/uploads/pdf/' . $article->id . '/' . $article->pdf) : $this->Url->build('/learn#') ?>"><img src="<?= !empty($article->pdf) ? $this->Url->build('/uploads/articles/' . $article->id . '/' . $article->image) : $this->Url->build('/learn#') ?>" alt="<?= $article->title ?>"></a>
                            </div> -->
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="<?= !empty($article->pdf) ? $this->Url->build('/uploads/pdf/' . $article->id . '/' . $article->pdf) : $this->Url->build('/learn#') ?>" target="_blank"><?= $article->title ?></a></h3>
                                <div class="blog-meta">
                                    <ul class="btm-cate">
                                        <li>
                                            <div class="blog-date">
                                                <i class="fa fa-calendar-check-o"></i> <?= $article->created->format('M d, Y') ?>                                                      
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="inner-blog mt-20">
                                    
                                    <a class="readon started" href="<?= !empty($article->pdf) ? $this->Url->build('/uploads/pdf/' . $article->id . '/' . $article->pdf) : $this->Url->build('/learn#') ?>" target="_blank"><?= __('Read More') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
                <div class="col-12 mt-40 text-center wow fadeInUp" data-wow-duration="1500ms">
                    <a class="readon started" href="https://buy.stripe.com/9AQ15ybxSeaRdmU14a"><?= __('Membership') ?></a>
                </div>
            </div>
        </div> 
    </div>
</div>
