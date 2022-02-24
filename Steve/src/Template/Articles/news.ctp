<?php 
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>News</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">
                        News
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls page_portfolio section_padding_top_100 section_padding_bottom_75">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="isotope_container isotope row masonry-layout columns_bottom_margin_30">
                <?php foreach($news as $new): ?>
                    <div class="isotope-item col-lg-4 col-md-6 col-sm-12 to_animate" data-animation="fadeInUp">
                        <article class="vertical-item content-padding mosaic-post post format-standard text-center with_border">
                            <div class="item-media entry-thumbnail">
                                <img src="<?= $this->Url->build('/uploads/articles/'.$new->id. DS . $new->image) ?>" alt="<?= $new->title ?>">
                                <div class="media-links">
                                    <a class="abs-link" title="" href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newDetails',$new->slug,$new->id]) ?>"></a>
                                </div>
                            </div>
                            <div class="item-content entry-content">
                                <header class="entry-header">
                                    <h3 class="entry-title">
                                        <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newDetails',$new->slug,$new->id]) ?>" rel="bookmark"><?= $new->title ?></a>
                                    </h3>
                                </header>
                                <!-- .entry-header -->
                                <p><?= $new->description ?></p>
                            </div>
                        </article>
                    </div>
                <?php endforeach ?>
                </div>
                <!-- eof .isotope_container.row -->
                <div class="row topmargin_40">
                    <div class="col-sm-12 text-center">
                        <ul class="pagination">
                            <?php if ($this->Paginator->numbers()): ?>
                                <?php
                                    $this->Paginator->templates([
                                        'nextDisabled' => '<li><a disabled="disabled">{{text}}</a></li>',
                                        'nextActive' => '<li><a href="{{url}}" onclick="return false;">{{text}}</a></li>',
                                        'prevActive' => '<li><a href="{{url}}">{{text}}</a></li>',
                                        'prevDisabled' => '<li><a disabled="disabled">{{text}}</a></li>',
                                        'number' => '<li><a href="{{url}}">{{text}}</a></li>',
                                        'current' => '<li class="active"><a href="">{{text}}</a></li>',
                                    ]);
                                ?>
                                <?= $this->Paginator->prev('<span class="sr-only">Prev</span><i class="fa  fa-angle-left"></i>',  ['escape' => false ]) ?>
                                        <?= $this->Paginator->numbers([
                                            'modulus' => 2,
                                            'first' => 1,
                                            'last' => 1
                                    ]) ?>
                                <?= $this->Paginator->next('<span class="sr-only">Next</span><i class="fa fa-angle-right"></i>', ['escape' => false ]) ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>