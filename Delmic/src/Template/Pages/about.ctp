<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<main class="page-content" data-barba="container" data-barba-namespace="inner-en-company">
<div data-page-title="Company"></div>
<div class="h_50vh pos_r z_2 o_h" data-scroll-section>
    <div class="h_100 flex_c flex_je pl_19 pr_19 pb_10 lh_110">
        <div class="prj-header fz120 split-words">
            <div><span class="fw_m"><?= $banners[11][0]->title ?></div>
        </div>
    </div>
</div>
<div class="pb_10" data-scroll-section>
    <div class="prj-header-line o_h mr_19 ml_19">
        <div class="line bgc_b"></div>
    </div>
    <div class="page-submenu flex pl_19 pr_19 o_h pb_6 pt_6">
        <div class="anim-from-black-overlay mr_6"><a class="fz16 td_uh js-jump" href="#first-section"><?= $banners[11][0]->description ?></a></div>
    </div>
</div>

<div class="pos_r" data-scroll-section>
    <div class="page-intro-image">
        <img src="<?= $this->Url->build('/uploads/banners/'.$banners[11][0]->id . DS . $banners[11][0]->image) ?>" width="2000" height="1250" class="d_b w_100 h_a"
            alt="" data-scroll data-scroll-speed="-2">
    </div>
    <a class="bt-scroll-down bottom_ js-jump c_w" href="#first-section">
        <svg xmlns="http://www.w3.org/2000/svg" class="w_100 h_100" viewBox="0 0 90 90">
            <circle r="7" cx="45" cy="45" stroke-width="14" fill="none"></circle>
            <circle r="21" cx="45" cy="45" stroke-width="16" fill="none"></circle>
            <circle r="36" cx="45" cy="45" stroke-width="16" fill="none"></circle>
        </svg>
        <i></i>
        <span><span><?= $banners[11][1]->title ?></span></span>
    </a>
</div>

<div id="first-section" class="pt_18 pr_19 pl_19 pb_18 pos_r z_1" data-scroll-section>
    <div class="flex">
        <div class="fz16 w_50 flex_as">
            <div class="anim-from-black-overlay" data-scroll data-scroll-offset="5%">
                <div><?= $banners[11][2]->title ?></div>
            </div>
        </div>
        <div class="w_50">
            <?= $banners[11][2]->description ?>
        </div>
    </div>
</div>
<div class="mountains o_h pos_r z_2" data-scroll-section>
    <img width="2500" height="801" src="<?= $webroot ?>DPM/i/company/mountain1.jpg" data-scroll
        data-scroll-target=".mountains" data-scroll-speed="-3" class="mountain-1" alt="">
    <img width="2500" height="708" src="<?= $webroot ?>DPM/i/company/mountain2.png" data-scroll
        data-scroll-target=".mountains" data-scroll-speed="-1.5" class="mountain-2" alt="">
    <img width="2500" height="600" src="<?= $webroot ?>DPM/i/company/mountain3.png" data-scroll data-scroll-speed=".2"
        class="mountain-3" alt="">
    <img width="2500" height="883" src="<?= $webroot ?>DPM/i/company/clouds%EF%B9%962.png" data-scroll
        data-scroll-target=".mountains" data-scroll-speed=".2" class="mountain-clouds" alt="">
    <div class="mountain-black-overlay" data-scroll data-scroll-speed=".2"></div>
</div>
<div class="pr_19 pl_19 pos_r z_5 c_w" data-scroll-section>
    <div class="fz54 split-words ta_c pos_r" style="margin-top: -30rem;" data-scroll
        data-scroll-call="play_splitted_words, 1">
        <div><?= $banners[11][3]->title ?></div>
    </div>
    <div class="flex_jc mt_8">
        <div class="w_35 lh_160 ta_c effect-fade-in" data-scroll data-scroll-offset="5%">
            <?= $banners[11][3]->description ?></div>
    </div>
</div>
<div class="anim-circles-pin-trigger bgc_b2 o_h" data-scroll-section>
    <div class="anim-circles-spacer bgc_b2" style="height: 450vh;">
        <div class="anim-circles-container" data-scroll data-scroll-sticky
            data-scroll-target=".anim-circles-pin-trigger">
            <div class="pos_r h_100vh">
                <div class="anim-circles">
                    <div class="anim-circle left_">
                        <svg viewBox="0 0 640 640">
                            <circle r="318" cx="320" cy="320" stroke="#fff" stroke-width="1" fill="none" />
                        </svg>
                        <div class="anim-circle-text">
                            <div class="fz54 c_w"><?= $banners[11][4]->title ?></div>
                        </div>
                    </div>
                    <div class="anim-circle right_">
                        <svg viewBox="0 0 640 640">
                            <circle r="318" cx="320" cy="320" stroke="#fff" stroke-width="1" fill="none" />
                        </svg>
                        <div class="anim-circle-text">
                            <div class="fz54 c_w"><?= $banners[11][4]->description ?></div>
                        </div>
                    </div>
                </div>
                <div class="anim-circle-img-container">
                    <div class="anim-circle-img-left-rect">
                        <div class="anim-circle-img-left-circle">
                            <img width="1900" height="1307" src="<?= $this->Url->build('/uploads/banners/'.$banners[11][5]->id . DS . $banners[11][5]->image) ?>" alt="">
                        </div>
                        <div class="anim-circle-img-left-text fz54 c_w"><?= $banners[11][5]->title ?></div>
                    </div>
                    <div class="anim-circle-img-right-rect">
                        <div class="anim-circle-img-right-circle">
                            <img width="1900" height="1307" src="<?= $this->Url->build('/uploads/banners/'.$banners[11][6]->id . DS . $banners[11][6]->image) ?>" alt="">
                        </div>
                        <div class="anim-circle-img-right-text fz54 c_w"><?= $banners[11][6]->title ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pos_r z_5 c_w">
        <div class="h_40vh pos_r">
            <div class="black_tone bottom-up_ strong_"></div>
        </div>
        <div class="bgc_b pb_20 pr_19 pl_19">
            <div class="fz54 lh_120 split-words ta_c pos_r" data-scroll
                data-scroll-call="play_splitted_words, 2" data-scroll-offset="5%">
                <?= $banners[11][7]->title ?>
            </div>
            <div class="flex_jc mt_8">
                <div class="w_35 lh_160 effect-fade-in" data-scroll data-scroll-offset="5%">
                    <?= $banners[11][7]->description ?></div>
            </div>
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