<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>About Us</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">About Us</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section id="about" class="ls section_padding_top_100 section_padding_bottom_100 table_section table_section_md columns_padding_25 columns_margin_bottom_30">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 text-center text-md-right to_animate" data-animation="fadeInUp">
                <img src="<?= $this->Url->build('/uploads/banners/'.$banners[20][0]->id . DS . $banners[20][0]->image) ?>" alt="<?= $banners[20][0]->title ?>" />
            </div>
            <div class="col-lg-5 col-md-6 to_animate" data-animation="fadeInUp">
                <h2 class="section_header numbered-header"><?= $banners[20][0]->title ?>
                </h2>
                <hr class="divider_30_3 zebra_bg divider_left">
                    <?= $banners[20][0]->description ?>
            </div>
        </div>
    </div>
</section>

<section class="collap-section-about ds section_padding_top_100 section_padding_bottom_100">
    <div class="container">
        <div class="row row-flex">
            <div class="col-md-5 order-1 order-md-0 to_animate" data-animation="fadeInUp">
                <h2 class="section_header numbered-header"><?= $banners[36][0]->title ?></h2>
                <div class="panel-group topmargin_0 bottommargin_0" id="accordion1">
                <?php foreach($banners[21] as $key => $banner): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title our">
                                <a data-toggle="collapse" data-img="<?= $webroot ?>images/gallery/6.jpg" data-parent="#accordion1" href="#collapse<?= $key ?>" class="<?= $key == 0 ? '' : 'collapsed' ?>">
                                    <?= $banner->title ?>
                                </a>
                            </h2>
                        </div>
                        <div id="collapse<?= $key ?>" class="panel-collapse collapse <?= $key == 0 ? 'in' : '' ?>">
                            <div class="panel-body">
                                <?= $banner->description ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
            <div class="col-md-7 order-0 order-md-1 to_animate" data-animation="fadeInUp">
                <div class="entry-thumbnail2">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banners[21][0]->id . DS . $banners[21][0]->image) ?>" alt="<?= $banners[21][0]->title ?>" class="img-about">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ls section_padding_top_100 section_padding_bottom_100 table_section table_section_md">
    <div class="container">
        <div class="row">
            <div class="col-md-7 to_animate" data-animation="fadeInUp">
                <div class="thumb-project">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banners[22][0]->id . DS . $banners[22][0]->image) ?>" alt="<?= $banners[22][0]->title ?>">
                </div>
            </div>
            <div class="col-md-5 to_animate" data-animation="fadeInUp">
                <div class="hea-box-about">
                    <h2 class="section_header numbered-header"><?= $banners[22][0]->title ?>
                    </h2>
                    <hr class="divider_30_3 zebra_bg divider_left">

                </div>
                <div class="panel-group topmargin_0 bottommargin_0" id="our-value">
                    <p><?= $banners[22][0]->description ?></p>
                <?php foreach($banners[24] as $key => $banner): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title _2">
                                <a data-toggle="collapse" data-img="<?= $webroot ?>images/gallery/6.jpg" data-parent="#our-value" href="#value<?= $key ?>" class="<?= $key == 0 ? '' : 'collapsed' ?>">
                                   <?= $banner->title ?>
                                </a>
                            </h4>
                        </div>
                        <div id="value<?= $key ?>" class="panel-collapse collapse <?= $key == 0 ? 'in' : '' ?>">
                            <div class="panel-body">
                                <?= $banner->description ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ls section_padding_top_100 section_padding_bottom_50 table_section table_section_md columns_padding_25 columns_margin_bottom_30">
    <div class="container">
        <div class="hea-box-about text-center to_animate" data-animation="fadeInUp">
            <h2 class="section_header numbered-header">
                <strong><?= $banners[23][0]->title ?></strong>
            </h2>
            <p class="small-text"><?= $banners[23][0]->description ?></p>
            <hr class="divider_30_3 zebra_bg">

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="vertical-item content-padding post format-standard to_animate" data-animation="fadeInUp">
                    <div class="" style="text-align: center;">
                        <img src="<?= $this->Url->build('/uploads/banners/'.$banners[23][0]->id . DS . $banners[23][0]->image) ?>" alt="<?= $banners[23][0]->title ?>">
                    </div>						
                    <!-- <div class="horizontal-roadmap to_animate" data-animation="fadeInUp">
                        <div class="swiper-container swiper-milestone">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="roadmap-item odd" data-year="2019">
                                        <div class="roadmap-icon">
                                            <h3>Steve Gen was created as a Construction and Readlty Development Icn.</h3>
                                        </div>
                                        <div class="roadmap-text">
                                            <div class="roadmap-item-text">
                                                <h4>Lorem ipsum dolor</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="roadmap-item even" data-year="2020">
                                        <div class="roadmap-icon">
                                            <h3>Started to acquire Stone and Sand Quarry and delivery aggregates</h3>
                                        </div>
                                        <div class="roadmap-text">
                                            <div class="roadmap-item-text">
                                                <h4>Lorem ipsum dolor</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="roadmap-item odd" data-year="2021">
                                        <div class="roadmap-icon">
                                            <h3>Steve Gen acquired numbers of quarry sites and operated 3 crushing plants and heavy houling.</h3>
                                        </div>
                                        <div class="roadmap-text">
                                            <div class="roadmap-item-text">
                                                <h4>Lorem ipsum dolor</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination pagination-time"></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="cs parallax text-center section_counters section_padding_top_100 section_padding_bottom_100 columns_margin_bottom_75">
    <div class="container">
        <h2 class="section_header numbered-header to_animate" data-animation="fadeInUp"><?= $banners[26][0]->title ?>
        </h2>
        <hr class="divider_30_3 zebra_bg to_animate" data-animation="fadeInUp">
        <div class=" to_animate" data-animation="fadeInUp">
            <?= $banners[26][0]->description ?>
        </div>
            
    </div>
</section>

<section class="ls section_padding_top_100 section_padding_bottom_100 table_section table_section_md columns_padding_25 columns_margin_bottom_30">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="hea-box-about text-center to_animate" data-animation="fadeInUp">
                    <h2 class="section_header numbered-header"><?= $banners[27][0]->title ?></h2>
                    <hr class="divider_30_3 zebra_bg">
                </div>
                <div class="vertical-item content-padding post format-standard">
                    <!-- <p class=" to_animate" data-animation="fadeInUp"><?= $banners[27][1]->title ?></p>
                    <div class="item-media entry-thumbnail2 mb-30 to_animate" data-animation="fadeInUp">
                        <img src="<?= $this->Url->build('/uploads/banners/'.$banners[27][0]->id . DS . $banners[27][0]->image) ?>" alt="<?= $banners[27][0]->title ?>">
                    </div> -->
                    <div class=" to_animate" data-animation="fadeInUp">
                        <?= $banners[27][0]->description ?>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</section>
<section class="cs parallax text-center section_counters section_padding_top_100 section_padding_bottom_100 columns_margin_bottom_75">
    <div class="container">
        <h2 class="section_header numbered-header to_animate" data-animation="fadeInUp"><?= $banners[35][0]->title ?>
        </h2>
        <hr class="divider_30_3 zebra_bg to_animate" data-animation="fadeInUp">
        <div class=" to_animate" data-animation="fadeInUp">
            <p><?= $banners[35][0]->description ?></p>
        </div>
            
    </div>
</section>
