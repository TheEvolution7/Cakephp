<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $this->fetch('title') ?></title>
        <meta charset="utf-8">
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?= $webroot ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= $webroot ?>css/animations.css">
        <link rel="stylesheet" href="<?= $webroot ?>css/swiper.min.css">
        <link rel="stylesheet" href="<?= $webroot ?>css/fonts.css">
        <link rel="stylesheet" href="<?= $webroot ?>css/main.css" id="color-switcher-link">
        <link rel="stylesheet" href="<?= $webroot ?>css/style.css">
        <script src="<?= $webroot ?>js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
            <div id="canvas">
                <div id="box_wrapper">
                    <?= $this->element('header') ?>
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                    <footer class="page_footer ds section_padding_top_65 section_padding_bottom_40 columns_margin_bottom_20">
                        <div class="container">

                            <div class="row">

                                <div class="col-md-3 col-sm-6 to_animate" data-animation="fadeInUp">
                                    <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>" class="logo">
                                        <img src="<?= $webroot ?>images/W-logo.png" alt="">
                                    </a>

                                    <p>
                                        To provide an excellent service to the clients at a competitive best quality above par.
                                    </p>

                                    <p>
                                        <a href="#" class="social-icon theme-color-icon soc-facebook"></a>
                                        <a href="#" class="social-icon theme-color-icon soc-google"></a>
                                        <a href="#" class="social-icon theme-color-icon soc-linkedin"></a>
                                    </p>
                                </div>

                                <div class="col-md-3 col-sm-6 quick-link to_animate" data-animation="fadeInUp">
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
                                                <a href="mailto:info@stevegen.com"><span class="__cf_email__" data-cfemail="">info@stevegen.com</span></a>
                                            </div>
                                        </div>
                                        <div class="media small-teaser">
                                            <div class="media-left">
                                                <i class="fa fa-phone highlight fontsize_18"></i>
                                            </div>
                                            <div class="media-body">
                                                +63 0286515916
                                            </div>
                                        </div>
                                        <div class="media small-teaser">
                                            <div class="media-left">
                                                <i class="fa fa-clock-o highlight fontsize_18"></i>
                                            </div>
                                            <div class="media-body">
                                                24 hours a day, 7 days a week
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 to_animate" data-animation="fadeInUp">
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
                                                Ecotower, 32nd Street / 9th Avenue Units 1, 2 and 4, 35th Floor and 36th Floor Penthouse, Taguig
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="<?= $webroot ?>js/compressed.js"></script>
        <script src="<?= $webroot ?>js/swiper.min.js"></script>
        <script src="<?= $webroot ?>js/main.js"></script>
        <script src="<?= $webroot ?>js/vendor/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="<?= $webroot ?>js/vendor/jquery-jvectormap-world-merc.js"></script>
    </body>
</html>
