<?php 
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Project Details</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Albums','action' => 'projects']) ?>">
                            Projects
                        </a>
                    </li>
                    <li class="active">Project Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls page_portfolio section_padding_top_100 section_padding_bottom_75">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="isotope_container isotope row masonry-layout columns_margin_top_0 columns_margin_bottom_30" data-filters=".isotope_filters">
                <?php foreach($project_images as $img): ?>
                    <div class="isotope-item col-lg-4 col-md-6 col-sm-12 to_animate" data-animation="fadeInUp">
                        <div class="vertical-item gallery-item content-absolute text-center ds">
                            <div class="item-media">
                                <div class="entry-thumbnail2">
                                    <img src="<?= $this->Url->build('/uploads/albums/'.$project->id . DS . $img->image) ?>" alt="<?= $img->title ?>">
                                </div>
                                <div class="media-links">
                                    <div class="item-content darken_gradient">
                                        <h4>
                                            <?= $img->title ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="topmargin_20">
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
    </div>
</section>

			