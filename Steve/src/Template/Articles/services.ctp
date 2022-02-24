<?php 
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Services</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">Services</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_top_150 section_padding_bottom_120">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            <?php foreach($services as $service): ?>
                <article class="vertical-item content-padding post format-gallery with_border to_animate" data-animation="fadeInUp">
                <?php $images = explode('|', $service->images); unset($images[count($images) - 1]); ?>
                    <div class="entry-thumbnail item-media">
                        <div class="owl-carousel" data-loop="true" data-margin="0" data-nav="false" data-dots="true" data-themeclass="entry-thumbnail-carousel" data-center="false" data-items="1" data-autoplay="true" data-responsive-xs="1" data-responsive-sm="1" data-responsive-md="1"
                            data-responsive-lg="1">
                        <?php foreach($images as $image): ?>
                            <div class="item entry-thumbnail2">
                                <img src="<?= $this->Url->build('/uploads/articles/' . DS . $service->id . DS . $image) ?>" alt="<?= $service->title ?>">
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                    <div class="item-content entry-content top-zebra-border">
                        <header class="entry-header">
                            <h3 class="entry-title">
                                <?= $service->title ?>
                            </h3>
                        </header>
                        <!-- .entry-header -->
                        <?= $service->content ?>
                    </div>
                    <!-- .item-content.entry-content -->
                </article>
            <?php endforeach ?>
            </div>
            <!--eof .col-sm-8 (main content)-->
        </div>
    </div>
</section>