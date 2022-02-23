<?php 
$banners = $this->getCache('banners_' . $configs['language']);
echo $this->element('meta') 
?> 
<main class="page-content" data-barba="container" data-barba-namespace="inner-en-interior">
<div data-page-title="Services"></div>
    <div data-scroll-section>
        <div class="h_50vh pos_r z_2 o_h">
            <div class="h_100 flex_c flex_je pl_19 pr_19 pb_10 lh_110">
                <div class="prj-header fz120 split-words">
                    <div><span class="fw_m"><?= $banners[14][0]->title ?></div>
                </div>
            </div>
        </div>
        <div class="pb_10">
            <div class="prj-header-line o_h mr_19 ml_19">
                <div class="line bgc_b"></div>
            </div>
            <div class="page-submenu flex pl_19 pr_19 o_h pb_6 pt_6">
                <div class="anim-from-black-overlay mr_6"><a class="fz16 td_uh js-jump"
                        href="#first-section"><?= $banners[14][1]->title ?></a></div>
                <div class="anim-from-black-overlay mr_6"><a class="fz16 td_uh js-jump"
                        href="#section-walls"><?= $banners[14][2]->title ?></a></div>
                <div class="anim-from-black-overlay mr_6"><a class="fz16 td_uh js-jump"
                        href="#section-sanitary"><?= $banners[14][3]->title ?> </a></div>
            </div>
        </div>
    </div>

    <div class="pos_r" data-scroll-section>
        <div class="page-intro-image">
            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[14][4]->id . DS . $banners[14][4]->image) ?>" width="2000" height="1333" class="d_b w_100 h_a"
                alt="" data-scroll data-scroll-speed="-2">
        </div>
        <a class="bt-scroll-down bottom_ js-jump" href="#first-section">
            <svg xmlns="http://www.w3.org/2000/svg" class="w_100 h_100" viewBox="0 0 90 90">
                <circle r="7" cx="45" cy="45" stroke-width="14" fill="none"></circle>
                <circle r="21" cx="45" cy="45" stroke-width="16" fill="none"></circle>
                <circle r="36" cx="45" cy="45" stroke-width="16" fill="none"></circle>
            </svg>
            <i></i>
            <span><span><?= $banners[14][4]->title ?></span></span>
        </a>
    </div>

    <div id="first-section" class="pt_18 pr_19 pl_19 pos_r z_5" data-scroll-section>
        <div class="flex">
            <div class="fz16 w_50 flex_as">
                <div class="anim-from-black-overlay" data-scroll data-scroll-offset="2%">
                    <div><?= $banners[14][5]->title ?></div>
                </div>
            </div>
            <div class="w_50">
                <?= $banners[14][5]->description ?>
            </div>
        </div>
    </div>
    <div class="anim-circles-pin-trigger bgc_w o_h" data-scroll-section>
        <div class="anim-circles-spacer bgc_w" style="height: 450vh;">
            <div class="anim-circles-container" data-scroll data-scroll-sticky
                data-scroll-target=".anim-circles-pin-trigger">
                <div class="pos_r">
                    <div class="anim-circles">
                        <div class="anim-circle left_">
                            <svg viewBox="0 0 640 640">
                                <circle r="318" cx="320" cy="320" stroke="#000" stroke-width="1" fill="none" />
                            </svg>
                            <div class="anim-circle-text">
                                <div class="fz54"><?= $banners[14][6]->title ?></div>
                            </div>
                        </div>
                        <div class="anim-circle right_">
                            <svg viewBox="0 0 640 640">
                                <circle r="318" cx="320" cy="320" stroke="#000" stroke-width="1" fill="none" />
                            </svg>
                            <div class="anim-circle-text">
                                <div class="fz54"><?= $banners[14][7]->title ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="anim-circle-img-container">
                        <div class="anim-circle-img-left-rect">
                            <div class="anim-circle-img-left-circle">
                                <img src="<?= $this->Url->build('/uploads/banners/' . $banners[14][6]->id . DS . $banners[14][6]->image) ?>" alt="">
                            </div>
                        </div>
                        <div class="anim-circle-img-right-rect">
                            <div class="anim-circle-img-right-circle">
                                <img src="<?= $this->Url->build('/uploads/banners/' . $banners[14][7]->id . DS . $banners[14][7]->image) ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pr_19 pl_19 bgc_w pos_r z_2" id="section-walls">
            <div class="round-icon pos-a-top_ text-up_">
                <span class="fz36 c_w lh_120">
                    <?= $banners[14][8]->title ?> </span>
                <img class="w_100 h_100" src="<?= $webroot ?>DPM/i/icons/cube-v2.gif" alt="">
            </div>
            <div class="w_60 ta_c pt_18 pb_10 ml_a mr_a effect-fade-in" data-scroll data-scroll-offset="2%">
                <?= $banners[14][8]->description ?>
            </div>
            <div class="line bgc_b anim-line" data-scroll></div>
        </div>

        <div class="pt_10 pb_6 pr_19 pl_19 bgc_w pos_r flex_ac">
            <div class="w_65 o_h effect-fade-in" data-scroll data-scroll-offset="2%">
                <img src="<?= $this->Url->build('/uploads/banners/' . $banners[14][9]->id . DS . $banners[14][9]->image) ?>" data-scroll data-scroll-speed="-2" alt=""
                    class="img-responsive-w">
            </div>
            <div class="w_30 pl_10">
                <div class="fz36 lh_120 pb_4 effect-fade-in" data-scroll data-scroll-offset="2%">
                    <?= $banners[14][9]->title ?></div>
                <div class="pb_4 lh_160 effect-fade-in" data-scroll data-scroll-offset="2%">
                    <?= $banners[14][9]->description ?></div>
                <!--            <div class="line mb_4 effect-fade-in" data-scroll data-scroll-offset="2%"></div>-->
                <!--            <div class="lh_160 effect-fade-in mb_4" data-scroll data-scroll-offset="2%">-->
                <!--                Floorplans fact 1-->
                <!--            </div>-->
                <!--            <div class="line mb_4 effect-fade-in" data-scroll data-scroll-offset="2%"></div>-->
                <!--            <div class="lh_160 effect-fade-in" data-scroll data-scroll-offset="2%">-->
                <!--                Floorplans fact 2-->
                <!--            </div>-->
            </div>
        </div>
    </div>

    <div class="pt_6 pr_19 pl_19 pos_r flex_jsb flex_ac pos_r z_2 bgc_w" data-scroll-section>
        <div class="w_30 pr_10">
            <div class="fz36 lh_120 pb_4 effect-fade-in" data-scroll data-scroll-offset="2%">
                <?= $banners[14][10]->title ?></div>
            <div class="pb_4 lh_160 effect-fade-in" data-scroll data-scroll-offset="2%">
                <?= $banners[14][10]->description ?>
            </div>
        </div>
        <div class="w_65 o_h">
            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[14][10]->id . DS . $banners[14][10]->image) ?>" data-scroll data-scroll-speed="-2" alt=""
                class="img-responsive-w">
        </div>
    </div>
    <div class="pointer-at-image-target pt_18 pb_18 pr_19 pl_19 bgc_w pos_r z_5"
        data-scroll-section>
        <div class="pos_a w_100 h_100 o_h z-1">
            <div class="w_100 h_110 bgs_cov" data-scroll data-scroll-speed="-2"
                style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[14][11]->id . DS . $banners[14][11]->image) ?>);background-position: 50% 0;top: -10%">
            </div>
        </div>
        <div class="fade-top-white"></div>
        <div class="flex_je mt_10" style="padding-bottom: 90rem;">
            <div class="w_50 flex_je">
                <div class="w_50 pos_r effect-fade-in-only" data-scroll data-scroll-offset="0%">
                    <!--                <div class="pointer-at-image left_"><i></i></div>-->
                    <div class="fz36 lh_120 pb_4">
                        <?= $banners[14][11]->title ?> </div>
                    <div class="pb_4 lh_160">
                        <?= $banners[14][11]->description ?> </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w_50 flex_jc">
                <div class="w_50 c_w effect-fade-in-only" data-scroll data-scroll-offset="0%">
                    <div class="fz36 lh_120 pb_4">
                        <?= $banners[14][12]->title ?></div>
                    <div class="pb_4 lh_160">
                        <?= $banners[14][12]->description ?></div>
                </div>
            </div>
        </div>
        <div class="round-icon pos-a-bottom_">
            <img class="w_100 h_100" src="<?= $webroot ?>DPM/i/icons/warm-v2.gif" alt="">
        </div>
    </div>


    <div data-scroll-section>
        <div class="pr_19 pl_19 pb_10 bgc_w pos_r">
            <div class="w_60 fz24 ta_c pt_18 ml_a mr_a effect-fade-in" data-scroll data-scroll-offset="2%">
                <?= $banners[14][13]->title ?> </div>
        </div>

        <div class="pb_18 pr_19 pl_19 pos_r bgc_w" id="section-sanitary">
            <div class="line mb_18 bgc_b anim-line" data-scroll data-scroll-offset="2%"></div>
            <div class="flex pb_12">
                <div class="fz16 w_50 flex_as">
                    <div class="anim-from-black-overlay" data-scroll data-scroll-offset="2%">
                        <div><?= $banners[14][15]->title ?> </div>
                    </div>
                </div>
                <div class="w_50">
                    <div class="fz36 lh_120 mb_10 effect-fade-in" data-scroll data-scroll-offset="2%">
                        <?= $banners[14][15]->description ?></div>
                </div>
            </div>
            <div class="flex_jsb">
                <div class="w_25 flex_c flex_jc">
                    <div class="fz36 lh_120 pb_4 effect-fade-in" data-scroll data-scroll-offset="2%"
                        data-scroll-call="play_space,bath">
                        <?= $banners[14][16]->title ?></div>
                    <div class="pb_4 lh_160 effect-fade-in" data-scroll data-scroll-offset="2%">
                    </div>
                    <div class="lh_160 effect-fade-in" data-scroll data-scroll-offset="2%">
                        <?= $banners[14][16]->description ?> </div>
                </div>
                <div class="w_60">
                    <!--                <div class="bdrs100 bgs_cov img-square" style="background-image: url(/<?= $webroot ?>DPM/i/interior/bathroom.jpg);"></div>-->
                    <div class="dpm-space-container img-square" id="space-bath">
                        <div class="dpm-space-circle c0 o_h bdrs100" style="width: 100%;height: 100%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 100%;height: 100%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c1 o_h bdrs100" style="width: 50%;height: 50%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 200%;height: 200%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c2 o_h bdrs100"
                            style="width: 33.333333333333%;height: 33.333333333333%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 300%;height: 300%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c3 o_h bdrs100" style="width: 25%;height: 25%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 400%;height: 400%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c4 o_h bdrs100" style="width: 20%;height: 20%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 500%;height: 500%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c5 o_h bdrs100"
                            style="width: 16.666666666667%;height: 16.666666666667%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 600%;height: 600%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c6 o_h bdrs100"
                            style="width: 14.285714285714%;height: 14.285714285714%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 700%;height: 700%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c7 o_h bdrs100" style="width: 12.5%;height: 12.5%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 800%;height: 800%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c8 o_h bdrs100"
                            style="width: 11.111111111111%;height: 11.111111111111%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 900%;height: 900%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c9 o_h bdrs100" style="width: 10%;height: 10%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 1000%;height: 1000%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c10 o_h bdrs100"
                            style="width: 9.0909090909091%;height: 9.0909090909091%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 1100%;height: 1100%">
                            </div>
                        </div>
                        <div class="dpm-space-circle c11 o_h bdrs100"
                            style="width: 8.3333333333333%;height: 8.3333333333333%">
                            <div class="bgs_cov"
                                style="background-image: url(<?= $webroot ?>DPM/i/interior/bathroom.jpg);width: 1200%;height: 1200%">
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
                                    <img src="<?= $webroot ?>DPM/i/icons/water%EF%B9%962.png" alt="">
                                </div>
                                <div class="dpm-space-planet-img">
                                    <img src="<?= $webroot ?>DPM/i/icons/steam%EF%B9%962.gif" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pos_r z_2" data-scroll-section>
        <div class="pos_r w_100 o_h">
            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[14][17]->id . DS . $banners[14][17]->image) ?>" alt="" class="img-responsive-w" data-scroll
                data-scroll-speed="-2">
        </div>
        <div class="round-icon pos-a-bottom_ text-up_">
            <span class="fz36 c_w lh_120">
                <?= $banners[14][17]->title ?></span>
            <img src="<?= $webroot ?>DPM/i/icons/diamond-v2.gif" alt="">
        </div>
    </div>
    <div class="pt_18 pb_10 pr_19 pl_19 bgc_w pos_r" data-scroll-section>
        <div class="flex_jc pb_10">
            <div class="w_55 fz24 ta_c ml_a mr_a effect-fade-in" data-scroll data-scroll-offset="2%">
                <?= $banners[14][17]->description ?>
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