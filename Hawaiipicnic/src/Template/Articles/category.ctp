<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[30][0]->id . DS . $banners[30][0]->image ) ?>" alt="<?= $banners[30][0]->title ?>"></div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= __('Categories') ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $categories->title ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog -->
<div class="blog-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-8">
            <?php foreach($articles as $article): ?>
                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                    <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'details',$article->slug]) ?>" class="blog-img"><img src="<?= $this->Url->build('/uploads/articles/'.$article->id . DS . $article->image) ?>" alt="<?= $article->title ?>" class="img-fluid"></a>
                    <div class="desc"> <span><small><?= $article->created->format('M d,Y') ?> | <?= $article->article_categories[0]->title ?></small></span>
                        <h3><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'details',$article->slug]) ?>"><?= $article->title ?></a></h3>
                        <p><?= $article->description ?></p>
                        <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'details',$article->slug]) ?>"><span><?= __('Read More') ?></span></a></div>
                    </div>
                </div>
            <?php endforeach ?> 
                <!-- Pagination -->
                <ul class="pwe-pagination-wrap align-center">
                    <?php if ($this->Paginator->numbers()): ?>
                        <?php
                            $this->Paginator->templates([
                                'nextDisabled' => '<li><a disabled="disabled">{{text}}</a></li>',
                                'nextActive' => '<li><a href="{{url}}">{{text}}</a></li>',
                                'prevActive' => '<li><a href="{{url}}">{{text}}</a></li>',
                                'prevDisabled' => '<li><a disabled="disabled">{{text}}</a></li>',
                                'number' => '<li><a href="{{url}}">{{text}}</a></li>',
                                'current' => '<li><a  class="active" href="">{{text}}</a></li>',
                                'ellipsis' => '<li><a  href="" onclick="return false;">...</a></li>'
                            ]);
                        ?>
                        <?= $this->Paginator->prev('<i class="ti-arrow-left"></i>',  ['escape' => false ]) ?>
                                <?= $this->Paginator->numbers([
                                    'modulus' => 2,
                                    'first' => 1,
                                    'last' => 1
                            ]) ?>
                        <?= $this->Paginator->next('<i class="ti-arrow-right"></i>', ['escape' => false ]) ?>
                    <?php endif; ?>
                </ul>
                
            </div>
            <div class="col-sm-4">
                <div class="pwe-sidebar-part animate-box" data-animate-effect="fadeInLeft">
                    <div class="pwe-sidebar-block pwe-sidebar-block-search">
                        <form class="pwe-sidebar-search-form" method="get">
                            <input type="text" name="keyword" class="form-control search-field" id="search" placeholder="<?= __('Search...') ?>">
                            <button type="submit" class="ti-arrow-right pwe-sidebar-search-submit"></button>
                        </form>
                    </div>
                    <div class="pwe-sidebar-block pwe-sidebar-block-categories">
                        <div class="pwe-sidebar-block-title"><?= __('Categories') ?></div>
                        <div class="pwe-sidebar-block-content">
                            <ul class="ul1">
                                <?php foreach($articleCategories as $s => $cat): ?>
                                    <li> <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'category',$s]) ?>"><?= $cat ?></a> </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="pwe-sidebar-block pwe-sidebar-block-latest-posts">
                        <div class="pwe-sidebar-block-title"><?= __('Latest Posts') ?></div>
                        <div class="pwe-sidebar-block-content">
                        <?php foreach($latest_posts as $post): ?>
                            <div class="latest">
                                <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'details',$post->slug]) ?>" class="clearfix">
                                    <div class="txt1"><?= $post->title ?></div>
                                    <div class="txt2"><?= $post->created->format('M d,Y') ?> </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
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