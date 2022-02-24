<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<footer class="page_footer ds section_padding_top_65 section_padding_bottom_40 columns_margin_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 to_animate" data-animation="fadeInUp">
                <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>" class="logo">
                    <img src="<?= $this->Url->build('/uploads/banners/' . $banners[4][0]->id . DS . $banners[4][0]->image ) ?>" alt="<?= $banners[4][0]->title ?>">
                </a>
                <p>
                    <?= $banners[4][0]->description ?>
                </p>
                <p>
                    <a href="<?= \Cake\Core\Configure::read('Core.setting.facebook_url') ?>" class="social-icon theme-color-icon soc-facebook"></a>
                    <a href="<?= \Cake\Core\Configure::read('Core.setting.google_plus_url') ?>" class="social-icon theme-color-icon soc-google"></a>
                    <a href="<?= \Cake\Core\Configure::read('Core.setting.twitter_url') ?>" class="social-icon theme-color-icon soc-twitter"></a>
                </p>
            </div>
            <div class="col-md-3 col-sm-6 to_animate" data-animation="fadeInUp">
                <div class="topmargin_15 columns_margin_0">
                    <div class="widget widget_pages">

                        <h3 class="widget-title">Useful
                            <strong>Links</strong>
                        </h3>
                        <hr class="divider_30_3 zebra_bg divider_left">
                        <div class="row columns_padding_0 columns_margin_0">
                            <div class="col-xs-6">
                                <ul class="greylinks">    
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>">About</a>
                                    </li>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'faqs']) ?>">FAQs</a>
                                    </li> 
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'team']) ?>">Our Team</a>
                                    </li> 
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'founder']) ?>">Founder</a>
                                    </li>                                            
                                </ul>
                            </div>
                            <div class="col-xs-6">
                                <ul class="greylinks">
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'services']) ?>">Services</a>
                                    </li>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'index']) ?>">Products</a>
                                    </li>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Albums','action' => 'projects']) ?>">Projects</a>
                                    </li>
                                    <li>
                                        <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'news']) ?>">News</a>
                                    </li>  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 to_animate" data-animation="fadeInUp">
                <div class="widget widget_text topmargin_15">
                    <h3 class="widget-title">Get in
                        <strong>Touch</strong>
                    </h3>
                    <hr class="divider_30_3 zebra_bg divider_left">
                    <div class="media small-teaser">
                        <div class="media-left">
                            <i class="fa fa-envelope highlight fontsize_18"></i>
                        </div>
                        <div class="media-body greylinks">
                            <a href="<?= $banners[6][1]->url ?>"><span class="__cf_email__" data-cfemail=""><?= $banners[6][1]->title ?></span></a>
                        </div>
                    </div>
                    <div class="media small-teaser">
                        <div class="media-left">
                            <i class="fa fa-phone highlight fontsize_18"></i>
                        </div>
                        <div class="media-body">
                            <?= $banners[6][2]->title ?>
                        </div>
                    </div>
                    <div class="media small-teaser">
                        <div class="media-left">
                            <i class="fa fa-clock-o highlight fontsize_18"></i>
                        </div>
                        <div class="media-body">
                            <?= $banners[6][0]->title ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 to_animate" data-animation="fadeInUp">
                <div class="topmargin_15">
                    <div class="widget widget_twitter">
                        <h3 class="widget-title">Address
                            <strong>Office</strong>
                        </h3>
                        <hr class="divider_30_3 zebra_bg divider_left">
                        <div class="media small-teaser">
                        <div class="media-left">
                            <i class="fa fa-map-marker highlight fontsize_18"></i>
                        </div>
                        <div class="media-body">
                            <?= $banners[7][0]->title ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="ds ms page_copyright section_padding_15">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="lightfont"><?= $banners[4][1]->title ?>
                    <i class="fa fa-heart highlight" aria-hidden="true"></i><?= $banners[4][1]->description ?></p>
            </div>
        </div>
    </div>
</section>
