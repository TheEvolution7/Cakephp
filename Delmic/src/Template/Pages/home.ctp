<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<main class="page-content" data-barba="container" data-barba-namespace="homepage-en">
    <div class="hm-intro h_100vh pos_r z_2 o_h"
        style="contain: size;content-visibility:auto;contain-intrinsic-sizе: 100vh" data-scroll-section>
        <picture>
            <source srcset="<?= $webroot ?>DPM/i/homepage/intro2.jpg" type="image/avif">
            <img data-scroll data-scroll-speed="-2" width="1900" height="1144"  class="w_100 d_b pos_a z-1 fit_cover" src="<?= $this->Url->build('/uploads/banners/'.$banners[4][0]->id . DS . $banners[4][0]->image) ?>" alt="<?= $banners[4][0]->title ?>">
        </picture>

        <div class="h_100 flex_c flex_je pl_19 pr_19">
            <div class="split-words hm-intro-head fz120 c_w lh_100">
                <div><span class="fw_m"><?= $banners[4][0]->title ?></span></div>
                <div><?= $banners[4][0]->description ?></div>
            </div>
            <div class="flex_jsb mt_10 mb_8 c_w">
                <div>
                    <div class="hm-intro-text d_b fz34 c_w lh_120 mb_4 op_0">
                        <?= $banners[4][1]->title ?>
                    </div>
                    <a class="bt-round-next js-jump bottom_" href="#first-section">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w_100 h_100" viewBox="0 0 80 80">
                            <circle r="38" cx="40" cy="40" stroke="#fff" stroke-width="2" fill="none"></circle>
                            <circle r="38" cx="40" cy="40" stroke="#fff" stroke-width="2" fill="none"></circle>
                        </svg>
                        <i></i>
                        <span class="c_w"><span><?= __('FIND OUT MORE') ?></span></span>
                    </a>
                </div>
                <div class="bld-slider-container pos_r flex">
                    <div class="bld-slider-container-line"></div>
                    <div class="bld-slider-pagination ml_2"></div>
                    <div class="bld-slider swiper-container">
                        <div class="swiper-wrapper">
                        <?php foreach($banners[5] as $banner): ?>
                            <div class="swiper-slide bld-slider-img bgs_cov flex_ae pl_3 pr_3 pb_3"
                                style="background-image: url(<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>);">
                                <div class="bld-slider-text fz14 lh_140 c_w">
                                    <span class="fw_m"><?= $banner->title ?></span> <br>
                                    <?= $banner->description ?></div>
                                <a href="<?= $banner->url ?>" title="<?= $banner->title ?>" class="overlay-link"></a>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                    <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'properties']) ?>" class="hm-projects-link pos_r flex_ac flex_jc c_w fw_b ml_2 custom-cursor"
                        data-cursor-text="MORE">
                        <svg class="hm-projects-link-rect w_100 h_100 pos_a" viewBox="0 0 195 197">
                            <rect x="1" y="1" width="193" height="195" stroke-width="1" stroke="#D8D8D8"
                                fill="none"></rect>
                        </svg>
                        <span class="o_h">
                            <span class="hm-projects-link-text flex_ac"><?= __('Projects') ?><svg
                                    class="stroke_white sz_26 ml_1">
                                    <use xlink:href="#arrow"></use>
                                </svg></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="pt_18 pb_18 pr_19 pl_19 bgc_w pos_r z_1"
        style="content-visibility:auto;contain-intrinsic-sizе: 1000px" id="first-section" data-scroll-section>
        <img class="hm-bg-projects" loading="lazy" src="<?= $webroot ?>DPM/i/homepage/draw.jpg" data-scroll
            data-scroll-speed="-2" data-scroll-call="play_drawing" alt="">
        <div class="flex pb_10">
            <div class="fz16 w_50">
                <div class="anim-from-black-overlay" data-scroll data-scroll-offset="10%">
                    <div><?= $banners[6][0]->title ?></div>
                </div>
            </div>
            <div class="w_50 fz34 effect-fade-in" data-scroll data-scroll-offset="5%"><?= $banners[6][0]->description ?></div>
        </div>
        <div class="split-words fz120 lh_100 pb_10" data-scroll data-scroll-call="play_splitted_words, 2"
            data-scroll-offset="5%">
            <div><?= $banners[6][1]->title ?></div>
        </div>
        <div class="flex_ae flex_jsb">
            <a class="bt-round-next black_" href="<?= $banners[6][1]->url ?>" data-scroll data-scroll-offset="10%">
                <svg xmlns="http://www.w3.org/2000/svg" class="w_100 h_100" viewBox="0 0 80 80">
                    <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="2" fill="none"></circle>
                    <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="2" fill="none"></circle>
                </svg>
                <i></i>
                <span class=""><span><?= $banners[6][1]->description ?></span></span>
            </a> 
            <div class="w_50 flex_w">
                <?php foreach ($banners[7] as $banner): ?>
                    <div class="w_50 pr_2 mb_4 effect-fade-in" data-scroll data-scroll-offset="10%">
                        <div class="c_beige fz18 mb_2 split-black-boxes" data-scroll data-scroll-offset="10%"><?= $banner->description ?>
                        </div>
                        <div class="fz24"><?= $banner->title ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="pb_18 pr_19 pl_19 pos_r z_5" data-scroll-section>
        <div class="line mb_18 bgc_b"></div>
        <div class="flex pb_10">
            <div class="fz16 w_50">
                <div class="anim-from-black-overlay" data-scroll data-scroll-offset="10%">
                    <div><?= $banners[8][0]->title ?></div>
                </div>
            </div>
            <div class="w_50 fz24 effect-fade-in" data-scroll data-scroll-offset="5%">
                <?= $banners[8][0]->description ?></div>
        </div>
        <div class="flex js-next-long-trigger">
            <div class="w_50 flex_c flex_jsb">
                <div class="pt_18"></div>
                <div class="fz120 lh_100 split-words pb_10" data-scroll
                    data-scroll-call="play_splitted_words, 3" data-scroll-offset="5%">
                    <div data-scroll data-scroll-call="play_space,smart" data-scroll-offset="5%"><span
                            class="fw_m"><?= $banners[8][1]->title ?>
                    </div>
                </div>
                <a class="bt-round-next black_" href="tech/index.html" data-scroll data-scroll-offset="10%">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w_100 h_100" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="2" fill="none"></circle>
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="2" fill="none"></circle>
                    </svg>
                    <i></i>
                    <span class=""><span><?= $banners[8][1]->description ?></span></span>
                </a>
            </div>
            <div class="w_50">
                <!--            <div class="bdrs100 bgs_cov img-square" style="background-image: url();"></div>-->
                <div class="dpm-space-container img-square" id="space-smart">
                    <div class="dpm-space-circle c0 o_h bdrs100" style="width: 100%;height: 100%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 100%;height: 100%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c1 o_h bdrs100" style="width: 50%;height: 50%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 200%;height: 200%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c2 o_h bdrs100"
                        style="width: 33.333333333333%;height: 33.333333333333%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 300%;height: 300%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c3 o_h bdrs100" style="width: 25%;height: 25%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 400%;height: 400%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c4 o_h bdrs100" style="width: 20%;height: 20%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 500%;height: 500%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c5 o_h bdrs100"
                        style="width: 16.666666666667%;height: 16.666666666667%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 600%;height: 600%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c6 o_h bdrs100"
                        style="width: 14.285714285714%;height: 14.285714285714%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 700%;height: 700%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c7 o_h bdrs100" style="width: 12.5%;height: 12.5%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 800%;height: 800%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c8 o_h bdrs100"
                        style="width: 11.111111111111%;height: 11.111111111111%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 900%;height: 900%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c9 o_h bdrs100" style="width: 10%;height: 10%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 1000%;height: 1000%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c10 o_h bdrs100"
                        style="width: 9.0909090909091%;height: 9.0909090909091%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 1100%;height: 1100%">
                        </div>
                    </div>
                    <div class="dpm-space-circle c11 o_h bdrs100"
                        style="width: 8.3333333333333%;height: 8.3333333333333%">
                        <div class="bgs_cov"
                            style="background-image: url(<?= $webroot ?>DPM/i/homepage/live_smart.jpg);width: 1200%;height: 1200%">
                        </div>
                    </div>
                    <div class="dpm-space-orbit-circle">
                        <svg class="w_100 h_100" viewBox="0 0 100 100">
                            <linearGradient id="space-orbit-circle-gr">
                                <stop offset="0%" style="stop-color:#fff;stop-opacity:0" />
                                <stop offset="50%" style="stop-color:#fff;stop-opacity:0" />
                                <stop offset="100%" style="stop-color:#fff" />
                            </linearGradient>
                            <circle fill="none" style="stroke:url(#space-orbit-circle-gr); stroke-width:.1"
                                r="49.9" cx="50" cy="50"></circle>
                        </svg>
                    </div>
                    <div class="dpm-space-orbit o">
                        <div class="dpm-space-planet">
                            <div class="dpm-space-planet-img">
                                <img src="<?= $webroot ?>DPM/i/icons/smart-house%EF%B9%962.png" class="w_100 h_100" alt="">
                            </div>
                            <div class="dpm-space-planet-img">
                                <img src="<?= $webroot ?>DPM/i/icons/eco%EF%B9%962.png" class="w_100 h_100" alt="">
                            </div>
                            <div class="dpm-space-planet-img">
                                <img src="<?= $webroot ?>DPM/i/icons/smart-key%EF%B9%962.png" class="w_100 h_100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb_18 pr_19 pl_19 bgc_w pos_r z_2" data-scroll-section>
        <div class="line mb_18 bgc_b pos_r z_5"></div>
        <div class="pos_a w_100 h_95 z-1 bgs_cov" data-scroll data-scroll-speed="-2"
            data-scroll-trigger=".js-next-long-trigger"
            style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[9][0]->id . DS . $banners[9][0]->image) ?>);background-position: 50% 0;top: 1%;">
        </div>
        <div class="flex pb_10">
            <div class="fz16 w_50">
                <div class="anim-from-black-overlay" data-scroll data-scroll-offset="10%">
                    <div><?= $banners[9][0]->title ?></div>
                </div>
            </div>
            <div class="w_50 fz34 effect-fade-in" data-scroll data-scroll-offset="5%">
                <?= $banners[9][0]->description ?></div>
        </div>
        <div class="fz120 lh_100 pb_10 c_w split-words" style="margin-top: 110rem;" data-scroll
            data-scroll-call="play_splitted_words, 4" data-scroll-offset="5%">
            <div><span class="fw_m"><?= $banners[9][1]->title ?>
            </div>
        </div>
        <div class="flex">
            <div class="w_50 flex_ae">
                <a class="bt-round-next" href="interior/index.html" data-scroll data-scroll-offset="10%">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w_100 h_100" viewBox="0 0 80 80">
                        <circle r="38" cx="40" cy="40" stroke="#fff" stroke-width="2" fill="none"></circle>
                        <circle r="38" cx="40" cy="40" stroke="#fff" stroke-width="2" fill="none"></circle>
                    </svg>
                    <i></i>
                    <span class="c_w"><span><?= $banners[9][2]->title ?></span></span>
                </a> </div>
            <div class="w_50 fz24 c_w effect-fade-in" data-scroll data-scroll-offset="5%">
                <?= $banners[9][2]->description ?>
            </div>
        </div>
    </div>
    <div class="footer-links flex pos_r z_2" data-scroll-section>
        <a href="<?= $this->Url->build(['controller' => 'Albums', 'action' => 'index']) ?>" data-cursor-text="MORE"
            class="w_50 footer-links-item custom-cursor flex_ac flex_jc pos_r c_w">
            <span class="footer-links-img bgs_cov"
                style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[10][0]->id . DS . $banners[10][0]->image) ?>);"></span>
            <div class="pos_a ml_6 mt_4"><?= $banners[10][0]->title ?></div>
            <div class="fz54 ta_c mt_4 footer-links-text">
                <?= $banners[10][0]->description ?></div>
        </a>
        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']) ?>" data-cursor-text="MORE"
            class="w_50 footer-links-item custom-cursor flex_ac flex_jc pos_r c_w">
            <span class="footer-links-img bgs_cov"
                style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[10][1]->id . DS . $banners[10][1]->image) ?>);"></span>
            <div class="pos_a ml_6 mt_4"><?= $banners[10][1]->title ?></div>
            <div class="fz54 ta_c mt_4 footer-links-text">
                <?= $banners[10][1]->description ?></div>
        </a>
    </div>
    <?= $this->element('footer') ?>
</main>


       
   