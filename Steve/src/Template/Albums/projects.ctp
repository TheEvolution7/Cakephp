<?php 
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Projects</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">Projects</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="project ls page_portfolio section_padding_top_40 section_padding_bottom_0 columns_padding_0 columns_margin_0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="filters isotope_filters text-center">
                    <a class="to_animate animated fadeInUp selected active" data-animation="fadeInUp" href="#" data-filter="*" class="selected">All</a>
                <?php foreach($categories as $k => $cat): ?>
                    <a class="to_animate" data-animation="fadeInUp" href="#" data-filter=".<?= $k ?>"><?= $cat ?></a>
                <?php endforeach ?>
                </div>
                <div class="isotope_container isotope row masonry-layout" data-filters=".isotope_filters">
                <?php foreach($projects as $project): ?>
                    <div class="isotope-item col-lg-4 col-md-6 col-sm-6 col-xs-12 <?= $project->album_categories[0]->id ?>">
                        <div class="vertical-item gallery-title-item content-absolute">
                            <div class="item-media">
                                <div class="thumb-project">
                                    <img src="<?= $this->Url->build('/uploads/albums/'.$project->id . DS . $project->image) ?>" alt="<?= $project->title ?>">
                                </div>
                                <div class="media-links">
                                    <a class="abs-link" title="" href="<?= $this->Url->build(['controller' => 'Albums','action' => 'projectDetails',$project->slug,$project->id]) ?>"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-title text-center">
                            <span class="categories-links small-text">
                                <a rel="category" href="<?= $this->Url->build(['controller' => 'Albums','action' => 'projectDetails',$project->slug,$project->id]) ?>"><?= $project->album_categories[0]->title ?></a>
                            </span>
                            <h3>
                                <a href="<?= $this->Url->build(['controller' => 'Albums','action' => 'projectDetails',$project->slug,$project->id]) ?>"><?= $project->title ?></a>
                            </h3>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
                <!-- eof .isotope_container.row -->
            </div>
        </div>
    </div>
</section>

<!-- <section class="ls section_padding_bottom_150">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="#" class="theme_button margin_0">Load More</a>
            </div>
        </div>
    </div>
</section> -->
