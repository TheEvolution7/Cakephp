<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-inner text-center">
        <h1 class="page-title"><?= __('Search') ?></h1>
        <ul>
            <li title="">
                <a class="active" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><?= __('Home') ?></a>
            </li>
            <li><?= __('Search') ?></li>
        </ul>
    </div>
</div>
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-inner text-center">
        <h1 class="page-title"><?= __('Search results for') ?> "<span><?= $_GET['keyword'] ?></span>"</h1>
        <p><?= __('Results') ?> : <?= count($articles) ?> 
    </div>
</div>
<div class="rs-inner-blog pt-50 pb-50 md-pt-40 md-pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pr-35 md-pr-15">
                <div class="row">
                <?php foreach($articles as $article): ?>
                    <div class="col-md-6 mb-50 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="<?= !empty($article->pdf) ? $this->Url->build('/uploads/pdf/' . $article->id . '/' . $article->pdf) : $this->Url->build('/learn#') ?>"><img src="<?= !empty($article->pdf) ? $this->Url->build('/uploads/articles/' . $article->id . '/' . $article->image) : $this->Url->build('/learn#') ?>" alt="<?= $article->title ?>"></a>
                            </div>
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
                                <div class="blog-button inner-blog">
                                    <a class="blog-btn" href="<?= !empty($article->pdf) ? $this->Url->build('/uploads/pdf/' . $article->id . '/' . $article->pdf) : $this->Url->build('/learn#') ?>" target="_blank"><?= __('Continue Reading') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div> 
    </div>
</div>

