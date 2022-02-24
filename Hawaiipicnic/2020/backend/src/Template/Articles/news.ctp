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
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[27][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[27][0]->description ?></h2></div>
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
            <?php foreach($news as $new): ?>
                <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                    <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newsDetails',$new->slug,$new->id]) ?>" class="blog-img"><img src="<?= $this->Url->build('/uploads/articles/'.$new->id . DS . $new->image) ?>" class="img-fluid" alt="<?= $new->title ?>"></a>
                    <div class="desc"> <span><small><?= $new->created->format('m D, Y') ?> | <?= $new->article_categories[0]->title ?></small></span>
                        <h3><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newsDetails',$new->slug,$new->id]) ?>"><?= $new->title ?></a></h3>
                        <p><?= $new->description ?></p>
                        <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newsDetails',$new->slug,$new->id]) ?>"><span>Read More</span></a></div>
                    </div>
                </div>
            <?php endforeach ?>
                <!-- Pagination -->
                <ul class="pwe-pagination-wrap align-center">
                    <?php if ($this->Paginator->numbers()): ?>
                        <?php
                            $this->Paginator->templates([
                                'nextDisabled' => '<li><a href="" disabled="disabled">{{text}}</a></li>',
                                'nextActive' => '<li><a href="{{url}}" onclick="return false;">{{text}}</a></li>',
                                'prevActive' => '<li><a href="{{url}}" onclick="return false;">{{text}}</a></li>',
                                'prevDisabled' => '<li><a href="" disabled="disabled">{{text}}</a></li>',
                                'number' => '<li><a href="{{url}}">{{text}}</a></li>',
                                'current' => '<li><a href="" class="active">{{text}}</a></li>',
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
                            <input type="text" name="keyword" class="form-control search-field" id="search" placeholder="Search...">
                            <button type="submit" class="ti-arrow-right pwe-sidebar-search-submit"></button>
                        </form>
                    </div>
                    <div class="pwe-sidebar-block pwe-sidebar-block-categories">
                        <div class="pwe-sidebar-block-title"> Categories </div>
                        <div class="pwe-sidebar-block-content">
                            <ul class="ul1">
                            <?php foreach($categories as $cat): ?>
                                <li <?= $this->request->getParam('id') == $cat->id ? 'class="active"' : '' ?>> <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'category',$cat->slug,$cat->id]) ?>"><?= $cat->title ?></a> </li>
                            <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="pwe-sidebar-block pwe-sidebar-block-latest-posts">
                        <div class="pwe-sidebar-block-title"> Latest Posts </div>
                        <div class="pwe-sidebar-block-content">
                        <?php foreach($latestPosts as $post): ?>
                            <div class="latest">
                                <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newsDetails',$post->slug,$post->id]) ?>" class="clearfix">
                                    <div class="txt1"><?= $post->title ?></div>
                                    <div class="txt2"><?= $post->created->format('m D, Y') ?></div>
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
<?= $this->element('client-logo') ?>
<!-- CTA -->
<?= $this->element('subscribe') ?>