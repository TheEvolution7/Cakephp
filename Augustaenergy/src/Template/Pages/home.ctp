<?php 
    echo $this->element('meta');
    $banners = $this->getCache('banners_' . $configs['language']); 
?>

<section class="main-slider">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
"effect": "fade",
"pagination": {
"el": "#main-slider-pagination",
"type": "bullets",
"clickable": true
},
"navigation": {
"nextEl": "#main-slider__swiper-button-next",
"prevEl": "#main-slider__swiper-button-prev"
},
"autoplay": {
"delay": 5000
}}'>
        <div class="swiper-wrapper">
            <?php foreach ($banners[45] as $banner): ?>
                <div class="swiper-slide banner-slide">
                    <div class="image-layer"
                        style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image) ?>);">
                    </div>
                    <!-- /.image-layer -->
                    <div class="main-slider-border"></div>
                    <div class="main-slider-border main-slider-border-two"></div>
                    <div class="main-slider-border main-slider-border-three"></div>
                    <div class="main-slider-border main-slider-border-four"></div>
                    <div class="main-slider-border main-slider-border-five"></div>
                    <div class="main-slider-border main-slider-border-six"></div>

                    <div class="main-slider-shape-1"></div>
                    <div class="main-slider-shape-2"></div>
                    <div class="main-slider-shape-3"></div>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">
                                    <p><?= $banner->description ?></p>
                                    <h2><?= $banner->title ?></h2>
                                    <a href="<?= $banner->url ?>" class="thm-btn"><?= __('Discover More') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-pagination" id="main-slider-pagination"></div>
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-right-arrow icon-left-arrow"></i><?= __('Prev') ?>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <?= __('Next') ?> <i class="icon-right-arrow"></i>
            </div>
        </div>
    </div>
</section>
<!--Main Slider End-->

<!--Services One Start-->
<section class="services-one">
    <div class="services-one-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
            class="float-bob-x" src="<?= $webroot ?>assets/images/shapes/services-one-shape.png" alt=""></div>
    <div class="container">
        <div class="services-one__top">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="services-one__top-left">
                        <div class="section-title text-left  wow fadeIn" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <span class="section-title__tagline"><?= $banners[46][0]->title ?></span>
                            <h2 class="section-title__title"><?= $banners[46][0]->description ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="services-one__top-text-box  wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <p class="services-one__top-text"><?= $banners[46][1]->title ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="team-one__carousel owl-theme owl-carousel">
                    <?php foreach ($banners[47] as $banner): ?>
                        <div class="team-one__single wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="team-one__img">
                                <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image) ?>" alt="">
                            </div>
                            <div class="team-one__content">
                                <h4 class="team-one__name"><?= $banner->title ?></h4>
                                <p class="team-one__title"><?= $banner->description ?></p>
                            </div>
                            <div class="team-one__hover">
                                <h4 class="team-one__hover-name"><?= $banner->title ?></h4>
                                <p class="team-one__hover-title"><?= $banner->description ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <!-- <div class="services-one__bottom">
            <div class="row">
                <div class="col-xl-12">
                    <ul class="list-unstyled services-one__list">
                        <li class="services-one__single wow fadeInUp" data-wow-delay="100ms">
                            <div class="services-one__icon">
                                <span class="icon-online-shopping"></span>
                            </div>
                            <div class="services-one__count"></div>
                            <h3 class="services-one__title"><a href="#">Lorem Ipsum<br>is simply dummy</a></h3>
                            <a class="services-one__arrow" href="#"><span
                                    class="icon-right-arrow"></span></a>
                        </li>
                        <li class="services-one__single wow fadeInUp" data-wow-delay="200ms">
                            <div class="services-one__icon">
                                <span class="icon-growth"></span>
                            </div>
                            <div class="services-one__count"></div>
                            <h3 class="services-one__title"><a href="#">Lorem Ipsum<br>is simply dummy</a></h3>
                            <a class="services-one__arrow" href="#"><span
                                    class="icon-right-arrow"></span></a>
                        </li>
                        <li class="services-one__single wow fadeInUp" data-wow-delay="300ms">
                            <div class="services-one__icon">
                                <span class="icon-webpage"></span>
                            </div>
                            <div class="services-one__count"></div>
                            <h3 class="services-one__title"><a href="#">Lorem Ipsum<br>is simply dummy</a></h3>
                            <a class="services-one__arrow" href="#"><span
                                    class="icon-right-arrow"></span></a>
                        </li>
                        <li class="services-one__single wow fadeInUp" data-wow-delay="400ms">
                            <div class="services-one__icon">
                                <span class="icon-front-end"></span>
                            </div>
                            <div class="services-one__count"></div>
                            <h3 class="services-one__title"><a href="#">Lorem Ipsum<br>is simply dummy</a></h3>
                            <a class="services-one__arrow" href="#"><span
                                    class="icon-right-arrow"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="services-one__find-solutions">
            <div class="row">
                <div class="col-xl-12">
                    <p class="services-one__find-solutions-text wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms"><?= $banners[46][2]->title ?><a href="<?= $banners[46][2]->url ?>"><?= $banners[46][2]->description ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Services One End-->

<!--Get To Know Start-->
<section class="get-to-know">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="get-to-know__left wow slideInLeft" data-wow-delay="100ms"
                    data-wow-duration="2500ms">
                    <div class="get-to-know__img">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banners[48][0]->id . DS . $banners[48][0]->image) ?>" alt="">
                        <div class="get-to-know__video-link">
                            <a href="<?= $banners[48][0]->url ?>" class="video-popup">
                                <div class="get-to-know__video-icon">
                                    <span class="icon-play-button"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="get-to-know__right">
                    <div class="get-to-know-big-text"><?= $banners[48][1]->title ?></div>
                    <div class="section-title text-left wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <?= $banners[48][1]->description ?>
                    </div>
                    <p class="get-to-know__text-1 wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <?= $banners[48][2]->title ?></p>
                    <p class="get-to-know__text-2 wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <?= $banners[48][3]->title ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Get To Know End-->



<!--Project One Start-->
<section class="project-one">
    <div class="container">
        <div class="section-title text-center wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
            <span class="section-title__tagline">recent projects</span>
            <h2 class="section-title__title">Subdivisions</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <ul class="project-filter style1 post-filter has-dynamic-filters-counter list-unstyled wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                    <?php foreach ($projectCategories as $category): ?>
                        <li data-filter=".<?= $category->slug ?>"><span class="filter-text"><?= $category->title ?></span></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="row filter-layout masonary-layout wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
            <?php $arr =  array_chunk($projects->toArray(), 5); ?>
            <?php foreach ($arr as $articless): ?>
                <?php foreach ($articless as $k => $article): ?>
                    <?php
                        $str = null;
                        foreach ($article->article_categories as $key => $value) {
                             $str .= $value->slug . ' ';
                         } 
                    ?>
                    <div class="col-xl-<?= $k == 1 ? 6 : 3 ?> col-lg-6 col-md-6 filter-item <?= $str ?>">
                        <!--Portfolio One Single-->
                        <div class="project-one__single">
                            <div class="project-one__img">
                                <img src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image) ?>" alt="">
                                <div class="project-one__hover project-one__hover-pl-40">
                                    <p class="project-one__tagline"><?= $article->article_categories[0]->title ?></p>
                                    <h3 class="project-one__title"><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'projectDetails', $article->slug, $article->id]) ?>"><?= $article->title ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!--Project One End-->

<!--Counter One Start-->
<section class="counter-one">
    <div class="counter-one-shape-1"></div>
    <div class="counter-one-shape-2"></div>
    <div class="counter-one-shape-3"></div>
</section>
<!--Counter One End-->

<!--Why Choose One Start-->
<section class="why-choose-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="why-choose-one__left wow fadeInLeft" data-wow-delay="100ms"
                    data-wow-duration="2500ms">
                    <div class="why-choose-one__img">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banners[50][0]->id . DS . $banners[50][0]->image) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="why-choose-one__right">
                    <div class="section-title text-left wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <span class="section-title__tagline"><?= $banners[50][0]->title ?></span>
                        <h2 class="section-title__title"><?= $banners[50][0]->description ?></h2>
                    </div>
                    <p class="why-choose-one__text wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms"><?= $banners[50][1]->description ?></p>
                    <div class="why-choose-one__bottom wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <div class="why-choose-one__bottom-img">
                            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[50][1]->id . DS . $banners[50][1]->image) ?>" alt="">
                        </div>
                        <ul class="list-unstyled why-choose-one__points">
                            <?php foreach ($banners[51] as $banner): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-draw-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p><?= $banner->title ?></p>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Why Choose One End-->



<!--Get To Know Two Start-->
<section class="get-to-know-two">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="get-to-know-two__left wow slideInLeft" data-wow-delay="100ms"
                    data-wow-duration="2500ms">
                    <div class="get-to-know-two__img-box">
                        <div class="get-to-know-two__img">
                            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[52][0]->id . DS . $banners[52][0]->image) ?>" alt="">
                        </div>
                        <div class="get-to-know-two__small-img">
                            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[52][1]->id . DS . $banners[52][1]->image) ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="get-to-know-two__right">
                    <div class="section-title text-left wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <span class="section-title__tagline"><?= $banners[52][0]->title ?></span>
                        <h2 class="section-title__title"><?= $banners[52][0]->description ?></h2>
                    </div>
                    <p class="get-to-know-two__text wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms"><?= $banners[52][1]->description ?></p>
                    <p class="get-to-know-two__text wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms"><?= $banners[52][2]->title ?></p>
                    <div class="get-to-know-two__points-box  wow fadeIn" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <ul class="list-unstyled get-to-know-two__points">
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p><?= $banners[52][3]->title ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p><?= $banners[52][3]->description ?></p>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled get-to-know-two__points get-to-know-two__points-two">
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p><?= $banners[52][4]->title ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p><?= $banners[52][4]->description ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Get To Know Two End-->

<!--Qutiiz Ready Two
<section class="qutiiz-ready-two">
    <div class="qutiiz-ready-two-bg-box">
        <div class="qutiiz-ready-two-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url(<?= $webroot ?>assets/images/backgrounds/qutiiz-ready-two-bg.jpg)"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="qutiiz-ready-two__inner">
                    <h2 class="qutiiz-ready-two__title">Auguste is a ready to protect <br> your businesses</h2>
                    <a href="#" class="qutiiz-ready-two__btn thm-btn">Discover more</a>
                </div>
            </div>
        </div>
    </div>
</section>
Qutiiz Ready End-->

<!--Why Choose Two Start
    <section class="why-choose-two">
        <div class="container">
            <div class="why-choose-two__top">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="why-choose-two__top-left">
                            <div class="why-choose-two__top-img">
                                <img src="<?= $webroot ?>assets/images/resources/why-choose-two-bg.png" alt="">
                                <div class="why-choose-two__video-link">
                                    <a href="https://www.youtube.com/watch?v=" class="video-popup">
                                        <div class="why-choose-two__video-icon">
                                            <span class="icon-play-button"></span>
                                            <i class="ripple"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="why-choose-two__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">company benefits</span>
                                <h2 class="section-title__title">Why You should choose qutiiz services?</h2>
                            </div>
                            <p class="why-choose-two__text">Supply of equipment, materials and components for the construction of power lines.</p>
                            <ul class="list-unstyled why-choose-two__points">
                                <li>
                                    <div class="icon">
                                        <span class="icon-draw-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Nsectetur cing elit.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-draw-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Suspe ndisse suscipit sit sagittis leo.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-draw-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Entum estibulum est dignissim posuere.</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="why-choose-two__counter">
                                <div class="why-choose-two__counter-icon">
                                    <span class="icon-conversation"></span>
                                </div>
                                <div class="why-choose-two__counter-content">
                                    <h3 class="odometer" data-count="870500">00</h3>
                                    <p>A positive mind transformations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="why-choose-two__bottom">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="why-choose-two__single">
                            <div class="why-choose-two__icon">
                                <span class="icon-suitcase"></span>
                            </div>
                            <div class="why-choose-two__content">
                                <h4 class="why-choose-two__content-text">business planning <br> strategies</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="why-choose-two__single">
                            <div class="why-choose-two__icon">
                                <span class="icon-lamp"></span>
                            </div>
                            <div class="why-choose-two__content">
                                <h4 class="why-choose-two__content-text">Skilled & Professional <br> Team Members
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="why-choose-two__single">
                            <div class="why-choose-two__icon">
                                <span class="icon-darts"></span>
                            </div>
                            <div class="why-choose-two__content">
                                <h4 class="why-choose-two__content-text">Enjoy the people you <br> work with</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
Why Choose Two End-->

<!--Qutiiz Ready Start-->
<section class="qutiiz-ready">
    <div class="qutiiz-ready-bg-box wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
        <div class="qutiiz-ready-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[53][0]->id . DS . $banners[53][0]->image) ?>)"></div>
    </div>
    <div class="container">
        <div class="qutiiz-ready__inner wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
            <h2 class="qutiiz-ready__title"><?= $banners[53][0]->title ?></h2>
        </div>
    </div>
</section>
<!--Qutiiz Ready End-->

<!--Financial Advice Start-->
<section class="financial-advice">
    <div class="financial-advice-bg"
        style="background-image: url(<?= $webroot ?>assets/images/shapes/financial-advice-shape.png)"></div>
    <div class="container">
        <div class="financial-advice__tab-box tabs-box">
            <ul class="tab-buttons clearfix list-unstyled">
                <li data-tab="#<?= $banners[53][1]->description ?>" class="tab-btn"><span><?= $banners[53][1]->title ?></span></li>
                <li data-tab="#<?= $banners[53][2]->description ?>" class="tab-btn active-btn"><span><?= $banners[53][2]->title ?></span></li>
                <li data-tab="#<?= $banners[53][3]->description ?>" class="tab-btn"><span><?= $banners[53][3]->title ?></span></li>
            </ul>
            <div class="tabs-content">
                <!--tab-->
                <div class="tab" id="business">
                    <div class="tabs-content__inner">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="tabs-content__left">
                                    <ul class="list-unstyled tabs-content__points">
                                        <?= $banners[54][0]->description ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="tabs-content__right">
                                    <div class="tabs-content__experience-box">
                                        <div class="tabs-content__experience-content">
                                            <div class="tabs-content__experience-icon">
                                                <span class=""></span>
                                            </div>
                                            <h3 class="tabs-content__experience-title"><?= $banners[54][0]->title ?></h3>
                                            <a href="<?= $banners[54][0]->url ?>" class="tabs-content__experience-btn">Read
                                                More</a>
                                        </div>
                                        <div class="tabs-content__experience-img">
                                            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[54][0]->id . DS . $banners[54][0]->image) ?>"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--tab-->
                <div class="tab active-tab" id="financial">
                    <div class="tabs-content__inner">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="tabs-content__left">
                                    <ul class="list-unstyled tabs-content__points">
                                        <?= $banners[54][1]->description ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="tabs-content__right">
                                    <div class="tabs-content__experience-box">
                                        <div class="tabs-content__experience-content">
                                            <div class="tabs-content__experience-icon">
                                                <span class=""></span>
                                            </div>
                                            <h3 class="tabs-content__experience-title"><?= $banners[54][1]->title ?></h3>
                                            <a href="<?= $banners[54][1]->url ?>" class="tabs-content__experience-btn">Read
                                                More</a>
                                        </div>
                                        <div class="tabs-content__experience-img">
                                            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[54][1]->id . DS . $banners[54][1]->image) ?>"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--tab-->
                <div class="tab " id="soltution">
                    <div class="tabs-content__inner">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="tabs-content__left">
                                    <ul class="list-unstyled tabs-content__points">
                                        <?= $banners[54][2]->description ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="tabs-content__right">
                                    <div class="tabs-content__experience-box">
                                        <div class="tabs-content__experience-content">
                                            <div class="tabs-content__experience-icon">
                                                <span class=""></span>
                                            </div>
                                            <h3 class="tabs-content__experience-title"><?= $banners[54][2]->title ?></h3>
                                            <a href="<?= $banners[54][2]->url ?>" class="tabs-content__experience-btn">Read
                                                More</a>
                                        </div>
                                        <div class="tabs-content__experience-img">
                                            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[54][2]->id . DS . $banners[54][2]->image) ?>"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="financial-advice__bottom">
            <p class="financial-advice__bottom-text"><?= $banners[55][0]->title ?> <a
                    href="<?= $banners[55][0]->url ?>"><?= $banners[55][0]->description ?></a></p>
        </div>
    </div>
</section>
<!--Financial Advice End-->

<?= $this->element('map') ?>

<!--Blog One Start-->
<section class="blog-one">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline"><?= $banners[55][1]->title ?></span>
            <h2 class="section-title__title"><?= $banners[55][1]->description ?></h2>
        </div>
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <!--Blog One Start-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image) ?>">
                            <a href="#">
                                <span class="blog-one__plus"></span>
                            </a>
                            <!-- <div class="blog-one__date">
                                <p>25 <br> AUG</p>
                            </div> -->
                        </div>
                        <div class="blog-one__content">
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'details', $article->slug, $article->id]) ?>"><i class="far fa-folder-open"></i> <?= $article->article_categories[0]->title ?></a></li>
                                </li>
                            </ul>
                            <h3 class="blog-one__title">
                                <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'articleDetails', $article->slug, $article->id]) ?>"><?= $article->title ?></a>
                            </h3>
                            <div class="blog-one__person">
                                <div class="blog-one__person-img">
                                    <!-- <img src="<?= $webroot ?>assets/images/blog/blog-one-person-img-1.jpg" alt=""> -->
                                </div>
                                <div class="blog-one__person-content">
                                    <p><?= $article->created->nice() ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!--Blog One End-->

<!--CTA One Start-->
<!-- <section class="cta-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="cta-one__inner wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="cta-one-shape-1"></div>
                    <div class="cta-one-shape-2"></div>
                    <div class="cta-one-shape-3"></div>
                    <div class="cta-one__left">
                        <h2 class="cta-one__title"><?= $banners[55][2]->title ?></h2>
                    </div>
                    <div class="cta-one__right">
                        <a href="<?= $banners[55][2]->url ?>" class="cta-one__btn thm-btn"><?= $banners[55][2]->description ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--CTA One End-->

<!--Team One Start-->
<section class="team-one">
    <div class="team-one-container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
            <span class="section-title__tagline"><?= $banners[61][0]->title ?></span>
            <h2 class="section-title__title"><?= $banners[61][0]->description ?></h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="__partner owl-theme owl-carousel wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <?php foreach ($banners[62] as $banner): ?>
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image) ?>" alt="">
                            </div>
                            <!-- <div class="team-one__content">
                                <h4 class="team-one__name"><?= $banner->title ?></h4>
                                <p class="team-one__title"><?= $banner->description ?></p>
                            </div>
                            <div class="team-one__hover">
                                <h4 class="team-one__hover-name"><?= $banner->title ?></h4>
                                <p class="team-one__hover-title"><?= $banner->description ?></p>

                            </div> -->
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Team One End-->
