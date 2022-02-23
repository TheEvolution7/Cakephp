<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<main class="page-content" data-barba="container" data-barba-namespace="inner-en-projects-projects_list">
    <div data-page-title="Projects"></div>


    <div class="pos_r z_2 o_h custom-cursor projects-map-container" style="height: 45vh;"
        data-cursor-text="SHOW MAP" data-scroll-section>
        <div class="projects-map w_100 h_100 d_b pos_a z-1"></div>
        <!--    <div class="projects-map-overlay"></div>-->
        <div class="projects-map-overlay flex_c flex_je pl_19 pr_19 pb_5 pos_r z_1">
            <div class="pos_a w_100 h_100 z-1 op_80" style="background: #d1cbc0;"></div>
            <div class="fz120 c_w lh_110 fw_m c_w">
                Our Projects </div>
        </div>
        <div class="projects-map-close">Close</div>
    </div>

    <div class="pt_6 pl_19 pr_19 pb_6" data-scroll-section>
        <div class="flex_jsb">
            <div class="tag-menu w_50 flex" data-barba-prevent="all">
                <button data-status-id="all"
                    class="tag-menu-item active bt-transparent fz16 c_b mr_6">All</button>
                    <?php foreach ($albumCategories as $albumCategory): ?>
                        <button data-status-id="<?= $albumCategory->id ?>" class="tag-menu-item bt-transparent fz16 c_b mr_6"><?= $albumCategory->title ?></button>
                    <?php endforeach ?>
            </div>
            <div class="w_50 d_n">
                <div>Sort by</div>
            </div>
        </div>
    </div>
    <div class="pl_7 pr_6 pb_6 projects-list flex_w" data-scroll-section>
        <?php foreach ($albums as $album): ?>
            <div class="projects-list-item o_h w_50 pos_r mb_6" data-status="<?= $album->album_categories[0]->id ?>">
                <div class="projects-list-img mb_6 pl_6 pr_6 pb_6 pt_6 flex_ae pos_r o_h z_1">
                    <div class="projects-list-img-inner pos_a w_100 h_100 z-2 bgs_cov"
                        data-big-image="/upload/iblock/359/3595fd67547b13e8a2b88fcf578e6088.jpg"
                        data-big-width="1900" data-big-height="1000"
                        style="background-image: url(<?= $this->Url->build('/uploads/albums/' . $album->id . DS . $album->image) ?>);">
                    </div>
                    <div class="flex_ac c_w">
                        <div class="mr_4 ta_c projects-list-flats-container">
                            <div class="projects-list-flats-cnt mb_1">
                                <?= explode('|', $album->description)[1] ?> </div>
                            <?= $album->album_categories[0]->title ?>
                        </div>
                        <div class="lh_110 pb_2">
                            <div class="fz50 o_h">
                                <div class="projects-list-param"><?= $album->title ?></div>
                            </div>
                            <div class="fz24 o_h">
                                <div class="projects-list-param"><?= explode('|', $album->description)[0] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pl_12 pr_12">
                    <div class="pt_2 pb_2">
                        <div class="flex_jsb o_h">
                            <div class="projects-list-param">Status</div>
                            <div class="projects-list-param">For sale</div>
                        </div>
                    </div>
                    <div class="line bgc_b"></div>
                    <div class="pt_2 pb_2">
                        <div class="flex_jsb o_h">
                            <div class="projects-list-param">Year of construction</div>
                            <div class="projects-list-param">2022</div>
                        </div>
                    </div>
                    <div class="line bgc_b"></div>
                    <div class="pt_2 pb_2">
                        <div class="flex_jsb o_h">
                            <div class="projects-list-param">Number of apartaments</div>
                            <div class="projects-list-param">8</div>
                        </div>
                    </div>
                </div>
                <a href="<?= $this->Url->build(['controller' => 'Albums', 'action' => 'details', $album->slug, $album->id]) ?>" class="overlay-link custom-cursor projects-list-link"
                    data-cursor-text="DISCOVER" title="Project 1"></a>
            </div>
        <?php endforeach ?>
        
    </div>
    <div class="footer-links flex pos_r z_2" data-scroll-section>
                <a href="#" data-cursor-text="MORE"
            class="w_50 footer-links-item custom-cursor flex_ac flex_jc pos_r c_w">
            <span class="footer-links-img bgs_cov"
                style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[10][0]->id . DS . $banners[10][0]->image) ?>);"></span>
            <div class="pos_a ml_6 mt_4"><?= $banners[10][0]->title ?></div>
            <div class="fz54 ta_c mt_4 footer-links-text">
                <?= $banners[10][0]->description ?></div>
        </a>
        <a href="#" data-cursor-text="MORE"
            class="w_50 footer-links-item custom-cursor flex_ac flex_jc pos_r c_w">
            <span class="footer-links-img bgs_cov"
                style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[10][1]->id . DS . $banners[10][1]->image) ?>);"></span>
            <div class="pos_a ml_6 mt_4"><?= $banners[10][1]->title ?></div>
            <div class="fz54 ta_c mt_4 footer-links-text">
                <?= $banners[10][1]->description ?></div>
        </a>
            </div>
            <script id="projectsCoord">
                var project_coord = [{
                    "NAME": "L\u00f6rrach",
                    "COORDINATES": "47.615183,7.648478",
                    "LOCATION": "Lettenweg 44",
                    "IMG": "\/upload\/iblock\/dfe\/dfefa8f97f07362dd59c6fcf1d3c6eab.jpg",
                    "LINK": "\/en\/projects\/lorrach\/"
                }, {
                    "NAME": "Schopfheim",
                    "COORDINATES": "47.652158,7.825019",
                    "LOCATION": "Hauptstra\u00dfe 111",
                    "IMG": "\/upload\/iblock\/419\/419f261696e8ddfff030c77699095f2e.jpg",
                    "LINK": "\/en\/projects\/schopfheim\/"
                }, {
                    "NAME": "Schopfheim",
                    "COORDINATES": "47.660506,7.834307",
                    "LOCATION": "Hauptstra\u00dfe 249",
                    "IMG": "\/upload\/iblock\/a26\/a26c5ddb2f7bd601c062411d9acd1850.jpg",
                    "LINK": "\/en\/projects\/schopfheim115\/"
                }, {
                    "NAME": "Grenzach-Wyhlen",
                    "COORDINATES": "47.552540596772,7.6626559639761",
                    "LOCATION": "Markgrafenstra\u00dfe 11",
                    "IMG": "\/upload\/iblock\/1f1\/1f19974f480d9af501cd16f8223cfe95.jpg",
                    "LINK": "\/en\/projects\/grenzach-Wyhlen\/"
                }, {
                    "NAME": "Rheinfelden",
                    "COORDINATES": "47.559703,7.783999",
                    "LOCATION": "Nollinger Stra\u00dfe 7",
                    "IMG": "\/upload\/iblock\/13c\/13cc8403a3a3db96324b3e756cff2be1.jpg",
                    "LINK": "\/en\/projects\/rheinfelden3020\/"
                }];
            </script>
    <?= $this->element('footer') ?>
</main>