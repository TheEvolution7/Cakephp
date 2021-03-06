<main class="page-content" data-barba="container"
    data-barba-namespace="inner-en-projects-schopfheim115-project_detail">
    <div data-page-title="Projects"></div>

    <div class="h_50vh pos_r z_2 o_h" data-scroll-section>
        <div class="h_100 flex_c flex_je pl_19 pr_19 pb_10 lh_110">
            <div class="prj-header fz120 fw_m split-words">
                <div><?= $album->title ?></div>
            </div>
            <div class="prj-header-location fz50 split-words">
                <div><?= explode('|', $album->description)[1] ?></div>
            </div>
        </div>
    </div>
    <div class="pb_10" data-scroll-section>
        <div class="prj-header-line o_h mr_19 ml_19">
            <div class="line bgc_b"></div>
        </div>
        <div class="flex pl_19 pr_19 o_h">
            <?php foreach (explode(',', $album->attribute) as $attribute): ?>
                <?php $str = explode(':', $attribute) ?>
                <div class="prj-header-call w_33 pl_4 pr_4 pb_6 pt_6 flex_jsb flex_ac">
                    <div class="anim-from-black-overlay">
                        <div class="fz16"><?= $str[0] ?></div>
                    </div>
                    <div class="anim-from-black-overlay">
                        <div class="fz24"><?= $str[1] ?></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="o_h prj-detail-intro" data-scroll-section>
        <img src="<?= $this->Url->build('/uploads/albums/' . $album->id . DS . $album->image) ?>" width="1900" height="1140"
            class="prj-detail-intro-img d_b w_100" alt="" data-scroll data-scroll-speed="-2">
    </div>


    <div class="pt_16 pb_16 pr_19 pl_19 bgc_w pos_r z_2" data-scroll-section>
        <div class="flex">
            <div class="fz16 w_50">Project Description</div>
            <div class="w_50 fz36">
                <?= $album->content ?> </div>
        </div>
        <div class="flex_w fz36">
        </div>
    </div>

    <!-- <div class="flex_je pb_12 pr_19 pl_19" data-scroll-section>
        <div class="w_50">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam perferendis, commodi quos vel ducimus nisi vero quod sunt quo dolor rerum consequatur a libero, tenetur ut nihil ipsa accusamus atque.    
        </div>
    </div> -->
    <div class="project-map-section pt_6" data-scroll-section>
        <div class="line bgc_b mr_19 ml_19"></div>
        <div class="pt_6 pb_5 pr_19 pl_19 bgc_w pos_r z_2 flex_jsb flex_ac" data-scroll data-scroll-sticky
            data-scroll-target=".project-map-section">
            <div class="fz50">Infrastructure</div>
            <!-- <div class="flex map-category-list">
                <a class="map-category on ml_2" data-barba-prevent href="#all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <div>All</div>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#87">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-churches"></use>
                    </svg>
                    <span class="d_b o_h"><span>Churches</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#88">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-medical_centers"></use>
                    </svg>
                    <span class="d_b o_h"><span>Medical centers</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#89">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-pharmacies"></use>
                    </svg>
                    <span class="d_b o_h"><span>Pharmacies</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-veterinary_clinics"></use>
                    </svg>
                    <span class="d_b o_h"><span>Veterinary clinics</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#91">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-schools"></use>
                    </svg>
                    <span class="d_b o_h"><span>Schools</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#92">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-sports_centers"></use>
                    </svg>
                    <span class="d_b o_h"><span></span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#93">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-post_offices"></use>
                    </svg>
                    <span class="d_b o_h"><span>Post offices</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#94">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-supermarkets"></use>
                    </svg>
                    <span class="d_b o_h"><span>Supermarkets</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-kindergartens"></use>
                    </svg>
                    <span class="d_b o_h"><span>Kindergartens</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#97">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-restaurant-cafe"></use>
                    </svg>
                    <span class="d_b o_h"><span>Restaurant/Cafe</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#98">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-train"></use>
                    </svg>
                    <span class="d_b o_h"><span>Train</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#118">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-cinema"></use>
                    </svg>
                    <span class="d_b o_h"><span>Cinema</span></span>
                </a>
                <a class="map-category on ml_2" data-barba-prevent href="#122">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pos_a" viewBox="0 0 80 80">
                        <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="1" fill="none"></circle>
                    </svg>
                    <svg>
                        <use xlink:href="#ico-museum"></use>
                    </svg>
                    <span class="d_b o_h"><span>Museum</span></span>
                </a>
            </div> -->
        </div>
        <div class="project-map-1 mh_70vh">
            <?= $album->map ?>
        </div>
    </div>
    <div class="gallery-section" data-scroll-section>
        <div class="pt_12 pb_5 pr_19 pl_19 bgc_w pos_r z_2 flex_jsb flex_ac" data-scroll data-scroll-sticky
            data-scroll-target=".gallery-section">
            <div class="fz50">Gallery</div>
            <!-- <div class="w_50 flex">
                <div class="block-menu project-galleries-menu">
                    <a class="active" href="#exterior">Exterior</a>
                </div>
            </div> -->
        </div>

        <div class="h_80vh">
            <div class="swiper-container project-galleries h_100">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-container project-gallery h_100">
                            <div class="swiper-wrapper">
                                <?php foreach ($album->album_images as $image): ?>
                                    <div class="swiper-slide o_h">
                                        <div class="w_100 h_100 bgs_cov will_c_t" data-swiper-parallax-x="20%"
                                            style="background-image: url(<?= $this->Url->build('/uploads/albums/' . $album->id . DS . $image->image) ?>);">
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>

                            <div class="project-gallery-info pos_alb w_100 pl_19 pr_19 mb_6 z_2 c_w">
                                <div class="flex_jsb">
                                    <div class="w_50">
                                        <div class="project-gallery-counter"></div>
                                    </div>
                                    <div class="w_50 flex_c flex_je ta_r">
                                        <div class="fz24"><?= $album->title . ', ' . explode('|', $album->description)[1] ?></div>
                                        <div class="line mt_3 mb_3 bgc_w"></div>
                                        <div class="flex_je">
                                            <a class="project-gallery-arrow-left"><svg class="sz_26">
                                                    <use xlink:href="#arrow"></use>
                                                </svg></a>
                                            <a class="project-gallery-arrow-right ml_4"><svg class="sz_26">
                                                    <use xlink:href="#arrow"></use>
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="pt_10 pb_10 pr_19 pl_19 bgc_w pos_r flex" data-scroll-section>
        <div class="fz50">Other projects</div>
    </div>

    <div class="flex pos_r z_2" data-scroll-section>
        <?php foreach ($albums as $al): ?>
            <div class="projects-list-item w_50 pos_r">
                <div class="projects-list-img bgs_cov pl_19 pr_6 pb_6 pt_6 flex_ae pos_r z_1">
                    <div class="pos_a w_100 h_110 z-1 bgs_cov" data-scroll data-scroll-speed="-2"
                        style="background-image: url(<?= $this->Url->build('/uploads/albums/' . $al->id . DS . $al->image) ?>)">
                    </div>
                    <div class="flex_ac c_w">
                        <?php if (!empty(explode('|', $al->description)[0])): ?>
                            <div class="mr_4 ta_c">
                                <div class="projects-list-flats-cnt mb_1">
                                    <?= explode('|', $al->description)[0] ?> </div>
                                <?= $al->album_categories[0]->title ?>
                            </div>
                        <?php endif ?>
                        <div class="lh_110 pb_2">
                            <div class="fz50"><?= $al->title ?></div>
                            <div class="fz24"><?= explode('|', $al->description)[1] ?></div>
                        </div>
                    </div>
                </div>
                <a href="<?= $this->Url->build(['controller' => 'Albums', 'action' => 'details', $al->slug, $album->id]) ?>" class="overlay-link custom-cursor" data-cursor-text="DISCOVER"
                    title=" "></a>
            </div>
        <?php endforeach ?>
    </div>
    <script id="project_infra_data">
        var infra = [{
            "id": "117",
            "name": "Lidl",
            "coord": ["47.646581379173", "7.8091004190504"],
            "sec_name": "Supermarkets",
            "sec_id": "94",
            "sec_code": "supermarkets",
            "text": "<p><\/p>"
        }, {
            "id": "118",
            "name": "REWE",
            "coord": ["47.646810315321", "7.8084129395607"],
            "sec_name": "Supermarkets",
            "sec_id": "94",
            "sec_code": "supermarkets",
            "text": "<p><\/p>"
        }, {
            "id": "119",
            "name": "Hieber's Frische Center",
            "coord": ["47.648308851254", "7.8147464690267"],
            "sec_name": "Supermarkets",
            "sec_id": "94",
            "sec_code": "supermarkets",
            "text": "<p><\/p>"
        }, {
            "id": "120",
            "name": "Gewerbe Akademie Schopfheim",
            "coord": ["47.644448053774", "7.812260691418"],
            "sec_name": "Schools",
            "sec_id": "91",
            "sec_code": "schools",
            "text": "<p><\/p>"
        }, {
            "id": "121",
            "name": "Kreiskrankenhaus Schopfheim",
            "coord": ["47.646554245978", "7.823244311306"],
            "sec_name": "Medical centers",
            "sec_id": "88",
            "sec_code": "medical_centers",
            "text": "<p><\/p>"
        }, {
            "id": "122",
            "name": "Bahnhof Apotheke",
            "coord": ["47.64839463927", "7.8222064649901"],
            "sec_name": "Pharmacies",
            "sec_id": "89",
            "sec_code": "pharmacies",
            "text": "<p><\/p>"
        }, {
            "id": "124",
            "name": "Gasthaus Sonne",
            "coord": ["47.650011931297", "7.8199929581345"],
            "sec_name": "Restaurant/Cafe",
            "sec_id": "97",
            "sec_code": "restaurant-cafe",
            "text": "<p><\/p>"
        }, {
            "id": "125",
            "name": "Hermes Griechisches",
            "coord": ["47.65042319994", "7.8205115739411"],
            "sec_name": "Restaurant/Cafe",
            "sec_id": "97",
            "sec_code": "restaurant-cafe",
            "text": "<p><\/p>"
        }, {
            "id": "126",
            "name": "Waldorf School Schopfheim e.V.",
            "coord": ["47.646324719175", "7.8286186497346"],
            "sec_name": "Schools",
            "sec_id": "91",
            "sec_code": "schools",
            "text": "<p><\/p>"
        }, {
            "id": "127",
            "name": "Theodor-Heuss-Gymnasium Schopfheim",
            "coord": ["47.647129320868", "7.8294819436524"],
            "sec_name": "Schools",
            "sec_id": "91",
            "sec_code": "schools",
            "text": "<p><\/p>"
        }, {
            "id": "128",
            "name": "Schopfheim",
            "coord": ["47.648141253027", "7.8224175096031"],
            "sec_name": "Train",
            "sec_id": "98",
            "sec_code": "train",
            "text": "<p><\/p>"
        }, {
            "id": "129",
            "name": "Friedrich-Ebert-Schule",
            "coord": ["47.651383818207", "7.8277906391201"],
            "sec_name": "Schools",
            "sec_id": "91",
            "sec_code": "schools",
            "text": "<p><\/p>"
        }, {
            "id": "130",
            "name": "Neuapostolische Kirche",
            "coord": ["47.650953506579", "7.8316878966256"],
            "sec_name": "Churches",
            "sec_id": "87",
            "sec_code": "churches",
            "text": "<p><\/p>"
        }, {
            "id": "131",
            "name": "Freizeitbad Schopfheim",
            "coord": ["47.652153177411", "7.8353650780007"],
            "sec_name": "Sports centers",
            "sec_id": "92",
            "sec_code": "sports_centers",
            "text": "<p><\/p>"
        }, {
            "id": "181",
            "name": "Evangelische Chrischonagemeinde",
            "coord": ["47.663354150197", "7.832972171974"],
            "sec_name": "Churches",
            "sec_id": "87",
            "sec_code": "churches",
            "text": "<p><\/p>"
        }, {
            "id": "182",
            "name": "St. Agathe Evangelische Kirche",
            "coord": ["47.661393096399", "7.8358362593495"],
            "sec_name": "Churches",
            "sec_id": "87",
            "sec_code": "churches",
            "text": "<p><\/p>"
        }, {
            "id": "183",
            "name": "Evangelische Kirche Fahrnau",
            "coord": ["47.660607151739", "7.8360802353241"],
            "sec_name": "Churches",
            "sec_id": "87",
            "sec_code": "churches",
            "text": "<p><\/p>"
        }, {
            "id": "184",
            "name": "Kath. Gemeindehaus Fahrnau",
            "coord": ["47.660327124323", "7.8379525570138"],
            "sec_name": "Churches",
            "sec_id": "87",
            "sec_code": "churches",
            "text": "<p><\/p>"
        }, {
            "id": "185",
            "name": "Agathen-Apotheke",
            "coord": ["47.658605432134", "7.8359153195935"],
            "sec_name": "Pharmacies",
            "sec_id": "89",
            "sec_code": "pharmacies",
            "text": "<p><\/p>"
        }, {
            "id": "186",
            "name": "SCALA Kino Schopfheim",
            "coord": ["47.648129001389", "7.8217488495846"],
            "sec_name": "Cinema",
            "sec_id": "118",
            "sec_code": "cinema",
            "text": "<p><\/p>"
        }, {
            "id": "187",
            "name": "Kindergarten Waldorf",
            "coord": ["47.661295415124", "7.8326665903554"],
            "sec_name": "Kindergartens",
            "sec_id": "95",
            "sec_code": "kindergartens",
            "text": "<p><\/p>"
        }, {
            "id": "188",
            "name": "St??dt. Kindergarten",
            "coord": ["47.659440736216", "7.838805351475"],
            "sec_name": "Kindergartens",
            "sec_id": "95",
            "sec_code": "kindergartens",
            "text": "<p><\/p>"
        }, {
            "id": "189",
            "name": "Kindergarten Bremt in Fahrnau",
            "coord": ["47.658647979578", "7.8327094964976"],
            "sec_name": "Kindergartens",
            "sec_id": "95",
            "sec_code": "kindergartens",
            "text": "<p><\/p>"
        }, {
            "id": "190",
            "name": "Otto Erich D??bele Museum",
            "coord": ["47.651758791832", "7.8245229289738"],
            "sec_name": "Museum",
            "sec_id": "122",
            "sec_code": "museum",
            "text": "<p><\/p>"
        }, {
            "id": "191",
            "name": "St??dtisches Museum",
            "coord": ["47.650447332797", "7.8206496283771"],
            "sec_name": "Museum",
            "sec_id": "122",
            "sec_code": "museum",
            "text": "<p><\/p>"
        }, {
            "id": "192",
            "name": "Deutsche Post Filiale",
            "coord": ["47.656384159223", "7.8350603242074"],
            "sec_name": "Post offices",
            "sec_id": "93",
            "sec_code": "post_offices",
            "text": "<p><\/p>"
        }, {
            "id": "193",
            "name": "German Post AG",
            "coord": ["47.650394503259", "7.8242721726187"],
            "sec_name": "Post offices",
            "sec_id": "93",
            "sec_code": "post_offices",
            "text": "<p><\/p>"
        }, {
            "id": "194",
            "name": "Post Hochrhein",
            "coord": ["47.650124734402", "7.8237617581754"],
            "sec_name": "Post offices",
            "sec_id": "93",
            "sec_code": "post_offices",
            "text": "<p><\/p>"
        }, {
            "id": "195",
            "name": "Cafe Classico Restaurant Pizzeria",
            "coord": ["47.658332689194", "7.835776181989"],
            "sec_name": "Restaurant/Cafe",
            "sec_id": "97",
            "sec_code": "restaurant-cafe",
            "text": "<p><\/p>"
        }, {
            "id": "196",
            "name": "Doan Vuong Phat",
            "coord": ["47.657419630601", "7.8355690978847"],
            "sec_name": "Restaurant/Cafe",
            "sec_id": "97",
            "sec_code": "restaurant-cafe",
            "text": "<p><\/p>"
        }, {
            "id": "197",
            "name": "Grundschule Fahrnau",
            "coord": ["47.660119545298", "7.8351105910037"],
            "sec_name": "Schools",
            "sec_id": "91",
            "sec_code": "schools",
            "text": "<p><\/p>"
        }, {
            "id": "198",
            "name": "Golfanlage Schopfheim",
            "coord": ["47.666328184139", "7.8310857264508"],
            "sec_name": "Sports centers",
            "sec_id": "92",
            "sec_code": "sports_centers",
            "text": "<p><\/p>"
        }, {
            "id": "199",
            "name": "leotta sapore italiano",
            "coord": ["47.660067511613", "7.8343942187988"],
            "sec_name": "Supermarkets",
            "sec_id": "94",
            "sec_code": "supermarkets",
            "text": "<p><\/p>"
        }, {
            "id": "200",
            "name": "Hieber's Frische Center KG",
            "coord": ["47.658235121085", "7.834212125531"],
            "sec_name": "Supermarkets",
            "sec_id": "94",
            "sec_code": "supermarkets",
            "text": "<p><\/p>"
        }, {
            "id": "201",
            "name": "Schopfheim Schlattholz",
            "coord": ["47.653821926177", "7.8333481156841"],
            "sec_name": "Train",
            "sec_id": "98",
            "sec_code": "train",
            "text": "<p><\/p>"
        }, {
            "id": "202",
            "name": "Tierphysiotherapie Petra Seidl",
            "coord": ["47.656655592466", "7.8384343730784"],
            "sec_name": "Veterinary clinics",
            "sec_id": "90",
            "sec_code": "veterinary_clinics",
            "text": "<p><\/p>"
        }, {
            "id": "203",
            "name": "Kleintierpraxis Animo Gmbh",
            "coord": ["47.657552040529", "7.83999741363"],
            "sec_name": "Veterinary clinics",
            "sec_id": "90",
            "sec_code": "veterinary_clinics",
            "text": "<p><\/p>"
        }, {
            "id": "204",
            "name": "Kleintierpraxis Dr. Xaver Schlipf",
            "coord": ["47.647780366115", "7.8275205446436"],
            "sec_name": "Veterinary clinics",
            "sec_id": "90",
            "sec_code": "veterinary_clinics",
            "text": "<p><\/p>"
        }];
        var prj_coord = JSON.parse('["47.660506","7.834307"]');
        var prj_data = JSON.parse(
            '{"NAME":"Schopfheim","COORDINATES":"47.660506,7.834307","LOCATION":"Hauptstra\u00dfe 249","IMG":"\/upload\/iblock\/a26\/a26c5ddb2f7bd601c062411d9acd1850.jpg"}'
            );
    </script>

<?= $this->element('footer') ?>
</main>