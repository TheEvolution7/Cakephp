<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<section class="intro_section page_mainslider ds">
    <div class="flexslider" data-dots="false">
        <ul class="slides">
            <?php foreach($banners[3] as $banner): ?>
                <li>
                    <div class="thumb-banner" style="background-image: url('<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>');"></div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <!-- eof flexslider -->
    <div class="scroll-icon greylinks">
        <div class="to_animate" data-animation="floating">
            <a href="#about" class="to_animate" data-animation="floating">
                <i class="towyicon-mouse grey"></i>
                Scroll
            </a>
        </div>
    </div>
</section>
<section id="contacts" class="ds columns_margin_0 columns_padding_0 table_section table_section_lg overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 text-center to_animate" data-animation="fadeInUp">
                <div class="with_icon_bg with_padding_small with_skew_bg skew_right main_bg_color cs home-top">
                    <div class="background-icon-wrap">
                        <i class="towyicon-clock background-icon"></i>
                    </div>
                    <div class="teaser media small-teaser topmargin_0 inline-block">
                        <div class="media-left media-middle">
                            <div class="teaser_icon main_bg_color with_shadow round size_small">
                                <i class="towyicon-clock"></i>
                            </div>
                        </div>
                        <div class="media-body media-middle">
                            <h3 class="text-uppercase grey margin_0">
                                <?= $banners[5][0]->title  ?>
                                <strong><?= $banners[5][0]->description  ?></strong>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center to_animate" data-animation="fadeInUp">
                <div class="with_padding_small home-top">
                    <div class="teaser">
                        <h3 class="text-uppercase highlight big margin_0">
                            <?= $banners[5][1]->title  ?>
                            <strong><?= $banners[5][1]->description  ?></strong>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center to_animate" data-animation="fadeInUp">
                <div class="with_icon_bg with_padding_small with_skew_bg skew_left main_bg_color cs home-top">
                    <div class="background-icon-wrap">
                        <i class="towyicon-phone background-icon"></i>
                    </div>
                    <div class="teaser media small-teaser topmargin_0 inline-block">
                        <div class="media-left media-middle">
                            <a href="<?= $banners[5][2]->url ?>" class="teaser_icon main_bg_color with_shadow round size_small">
                                <i class="towyicon-phone"></i>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <h3 class="text-uppercase grey margin_0">
                                <strong><?= $banners[5][2]->description  ?></strong> <?= $banners[5][2]->title  ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="ls section_padding_top_150 section_padding_bottom_150 table_section table_section_md columns_padding_25 columns_margin_bottom_30">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 text-center text-md-right to_animate" data-animation="fadeInUp">
                <img src="<?= $this->Url->build('/uploads/banners/'.$banners[8][0]->id . DS . $banners[8][0]->image) ?>" alt="<?= $banners[8][0]->title ?>" />
            </div>
            <div class="col-lg-5 col-md-6 to_animate" data-animation="fadeInUp">
                <h2 class="section_header numbered-header">
                    <?= $banners[8][0]->title ?>
                </h2>
                <hr class="divider_30_3 zebra_bg">
                    <?= $banners[8][0]->description ?>
            </div>
        </div>
    </div>
</section>

<section id="features" class="ds parallax section_counters section_padding_top_100 section_padding_bottom_50 columns_margin_bottom_60">
    <div class="container-fluid">
    <?php foreach($banners[9] as $banner) : ?>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="teaser text-center">
                <div class="teaser_icon highlight size_big">
                    <i class="towyicon-star"></i>
                </div>
                <h3 class="counter grey" data-from="0" data-to="<?= $banner->description ?>" data-speed="2100">0</h3>
                <p class="lightfont"><?= $banner->title ?></p>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</section>

<section id="services" class="ls section_padding_top_100 section_padding_bottom_75 columns_margin_0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2 class="section_header numbered-header"><?= $banners[10][0]->title ?>
                </h2>
                <p class="small-text"><?= $banners[10][0]->description ?></p>
                <hr class="divider_30_3 zebra_bg">
            </div>
        </div>
        <div class="row topmargin_30">
        <?php foreach($services as $key => $service): ?>
            <div class="col-md-4 to_animate" data-animation="fadeInUp">
                <div class="with_padding">
                    <div class="teaser text-center">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banners[28][$key]->id . DS . $banners[28][$key]->image ) ?>" alt="<?= $service->title ?>" />
                        <h4 class="regular">
                            <?= $service->title ?>
                        </h4>
                        <p><?= substr($service->description,0,100) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>  
        </div>
    </div>
</section>

<section id="quote" class="parallax get_quote section_padding_0 columns_margin_0">
    <div class="container-fluid">
        <div class="row row_columns_padding_0 display_table_md">

            <div class="cs col-md-6 section_padding_top_60 section_padding_bottom_65 display_table_cell_md vertical_top">
                <div class="container-left-half horizontal-center">
                    <div class="row">
                        <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                            <h2 class="section_header"><?= $banners[11][0]->title ?>
                            </h2>
                            <p class="small-text"><?= $banners[11][0]->description ?></p>
                            <hr class="divider_30_3 zebra_bg">
                            <p class="topmargin_90 bottommargin_90 grey">
                                <?= $banners[11][1]->description ?>
                            </p>
                            <a href="<?= $banners[11][0]->url ?>" class="theme_button">Apply today</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ds col-md-6 section_padding_top_60 section_padding_bottom_65 display_table_cell_md vertical_top">
                <div class="container-right-half horizontal-center wide-half-container">
                    <div class="row">
                        <div class="col-md-12 text-center to_animate" data-animation="fadeInUp">
                            <h2 class="section_header">
                                <strong class="highlight"><?= $banners[11][2]->title ?></strong>
                            </h2>
                            <p class="small-text lightfont"><?= $banners[11][2]->description ?></p>
                            <hr class="divider_30_3 zebra_bg">
                            <form method="post" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">
                                <input type="hidden" name="type" value="1">
                                <div class="row columns_margin_bottom_15">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="full-name" class="sr-only">Full Name
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" size="30" value="" name="name" id="full-name" class="form-control" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone-number" class="sr-only">Phone Number
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" size="30" value="" name="phone" id="phone-number" class="form-control" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="start-address" class="sr-only">Email
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text"  size="30" value="" name="email" id="start-address" class="form-control" placeholder="Email" required> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="end-address" class="sr-only">Address
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text"  size="30" value="" name="address" id="end-address" class="form-control" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group select-group">
                                            <label for="vechicle" class="sr-only">Service Type
                                                <span class="required">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select aria-required="true" id="vechicle" name="title" class="choice empty form-control">
                                                    <?php foreach($banners[12] as $key => $banner): ?>
                                                        <option value="<?= $banner->title ?>" <?= $key == 0 ? 'disabled selected data-default' : ''?>><?= $banner->title ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tow-date" class="sr-only">Date
                                                <span class="required">*</span>
                                            </label>
                                            <input type="date" name="date_time" id="tow-date" value="" class="form-control" required>
                                            
                                        </div>
                                    </div>
                                </div>
                                <p class="form-submit">
                                    <button type="submit" id="submit" name="submit" class="theme_button color1">Send</button>
                                </p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <img src="<?= $webroot ?>images/hook.png" alt="" class="top_image to_animate" data-animation="fadeInDown" />
</section>

<section id="our-project" class="ls page_portfolio section_padding_top_100 section_padding_bottom_50 columns_padding_0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2 class="section_header numbered-header"><?= $banners[13][0]->title ?></h2>
                <p class="small-text"><?= $banners[13][0]->description ?></p>
                <hr class="divider_30_3 zebra_bg">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="isotope_container isotope row masonry-layout">
                <?php foreach($projects as $project): ?>                                        
                    <div class="isotope-item col-lg-4 col-md-6 col-sm-6 col-xs-12 to_animate" data-animation="fadeInUp">
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

<section id="our-product" class="ds section_padding_top_100 section_padding_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 to_animate" data-animation="fadeInUp">
                <div class="hea-box-pro text-center">
                    <h2 class="section_header numbered-header"><?= $banners[14][0]->title ?></h2>
                    <p class="small-text"><?= $banners[14][0]->description ?></p>
                    <hr class="divider_30_3 zebra_bg">
                </div>
            </div>
            <div class="col-md-7 to_animate" data-animation="fadeInUp">
                <div class="thumb-pro">
                    <img src="<?= $this->Url->build('/uploads/products/'.$products[0]->id. DS . $products[0]->image) ?>" alt="" class="img-pro">
                </div>
                
            </div>
            <div class="col-md-5 to_animate" data-animation="fadeInUp">
                
                <div class="panel-group bottommargin_0" id="accordion1">
                <?php foreach($products as $k => $product): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-img="<?= $this->Url->build('/uploads/products/'.$product->id. DS . $product->image) ?>" data-parent="#accordion1" href="#collapse<?= $k ?>" class="<?= $k == 0 ? 'link_img_pro' : 'collapsed link_img_pro' ?>">
                                   <?= $product->title ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?= $k ?>" class="panel-collapse collapse <?= $k == 0 ? 'in' : '' ?>">
                            <div class="panel-body">
                                <?= $product->description ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="our-partner" class="ls section_padding_top_100 section_padding_bottom_50 columns_margin_0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2 class="section_header numbered-header"><?= $banners[15][0]->title ?>
                </h2>
                <p class="small-text"><?= $banners[15][0]->description ?></p>
                <hr class="divider_30_3 zebra_bg">
            </div>
        </div>
        <div class="swiper-container our-partner-slide to_animate" data-animation="fadeInUp">
            <div class="swiper-wrapper">
            <?php foreach($banners[16] as $banner): ?>
                <div class="swiper-slide">
                    <div class="thumb-partner">
                        <img src="<?= $this->Url->build('/uploads/banners/'. $banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                    </div>
                </div>
            <?php endforeach ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section class="ds columns_margin_0 columns_padding_0 table_section table_section_lg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 text-center with_skew_bg skew_right main_bg_color cs to_animate" data-animation="fadeInUp">
                <div class="with_icon_bg with_padding_small home-end">
                    <i class="fa fa-envelope background-icon"></i>
                    <h3 class="text-uppercase grey margin_0">
                        <?= $banners[17][0]->title ?>
                        <strong><?= $banners[17][0]->description ?></strong>
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 text-center to_animate" data-animation="fadeInUp">
                <div class="with_padding_small home-end">
                    <div class="content-justify vertical-center justify-content-center">
                        <h3 class="text-uppercase highlight margin_0">
                            <?= $banners[17][1]->title ?>
                            <strong><?= $banners[17][1]->description ?></strong>
                        </h3>
                        <a href="<?= $banners[17][1]->url ?>" class="theme_button round_button color1 margin_0">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center with_skew_bg skew_left main_bg_color cs to_animate" data-animation="fadeInUp">
                <div class="with_icon_bg with_padding_small home-end">
                    <i class="towyicon-newspaper background-icon"></i>
                    <h3 class="text-uppercase grey margin_0">
                        <?= $banners[17][2]->title ?>
                        <strong><?= $banners[17][2]->description ?></strong>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
