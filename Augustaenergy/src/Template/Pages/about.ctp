<?php 
    echo $this->element('meta');
    $banners = $this->getCache('banners_' . $configs['language']); 
?>

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[57][0]->id . DS . $banners[57][0]->image) ?>)">
    </div>
    <div class="page-header-border"></div>
    <div class="page-header-border page-header-border-two"></div>
    <div class="page-header-border page-header-border-three"></div>
    <div class="page-header-border page-header-border-four"></div>
    <div class="page-header-border page-header-border-five"></div>
    <div class="page-header-border page-header-border-six"></div>

    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="page-header-shape-3"></div>

    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                <li class="active"><?= $banners[57][0]->title ?></li>
            </ul>
            <h2><?= $banners[57][0]->description ?></h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Page Start-->
<section class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 order-1 order-xl-0">
                <div class="about-page__left wow fadeIn" data-wow-delay="100ms"
                data-wow-duration="2500ms">
                    <div class="about-page__img">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banners[58][0]->id . DS . $banners[58][0]->image) ?>" alt="">
                    </div>
                    <!-- <div class="about-page__founded">
                        <h5>Founded <br> in 1987</h5>
                    </div> -->
                </div>
            </div>
            <div class="col-xl-6 order-0 order-xl-1">
                <div class="about-page__right wow fadeIn" data-wow-delay="100ms"
                data-wow-duration="2500ms">
                    <div class="section-title text-left">
                        <span class="section-title__tagline"><?= $banners[58][0]->url ?></span>
                        <h2 class="section-title__title"><?= $banners[58][0]->title ?></h2>
                    </div>
                    <?= $banners[58][0]->description ?>
                    <!-- <div class="about-page__points-box">
                        <ul class="list-unstyled about-page__points">
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p>Develop a vision statement</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p>Grow your customer base</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled about-page__points about-page__points-two">
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p>Increase your monthly sales</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p>Beat your competition</p>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Page End-->


<!--About Page Start-->
<section class="about-page _2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-page__left wow fadeIn" data-wow-delay="100ms"
                data-wow-duration="2500ms">
                    <div class="section-title text-left">
                        <span class="section-title__tagline"><?= $banners[58][1]->url ?></span>
                        <h2 class="section-title__title"><?= $banners[58][1]->title ?></h2>
                    </div>
                    <?= $banners[58][1]->description ?>
                    <!-- <div class="about-page__points-box">
                        <ul class="list-unstyled about-page__points">
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p>Develop a vision statement</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p>Grow your customer base</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled about-page__points about-page__points-two">
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p>Increase your monthly sales</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p>Beat your competition</p>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-page__right wow fadeIn" data-wow-delay="100ms"
                data-wow-duration="2500ms">
                    <div class="about-page__img">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banners[58][1]->id . DS . $banners[58][1]->image) ?>" alt="">
                    </div>
                    <!-- <div class="about-page__founded">
                        <h5>Founded <br> in 1987</h5>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
<!--About Page End-->

<!--Counter Two Start-->
<!-- <section class="counter-two about-page-counter-two">
    <div class="container">
        <div class="counter-two__inner wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
            <div class="counter-two-shape1"></div>
            <div class="counter-two-shape2"></div>
            <div class="counter-two-shape3"></div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="counter-two__left">
                        <h2 class="counter-two__title"><?= $banners[58][2]->title ?></h2>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="counter-two__right">
                        <ul class="list-unstyled counter-two__list">
                            <li class="counter-two__single wow fadeInUp" data-wow-delay="100ms">
                                <div class="counter-two__icon">
                                    <span class="icon-checking"></span>
                                </div>
                                <h3 class="odometer" data-count="<?= $banners[60][0]->description ?>">00</h3>
                                <p class="counter-two__text"><?= $banners[60][0]->title ?></p>
                            </li>
                            <li class="counter-two__single wow fadeInUp" data-wow-delay="100ms">
                                <div class="counter-two__icon">
                                    <span class="icon-recommend"></span>
                                </div>
                                <h3 class="odometer" data-count="<?= $banners[60][1]->description ?>">00</h3>
                                <p class="counter-two__text"><?= $banners[60][1]->title ?></p>
                            </li>
                            <li class="counter-two__single wow fadeInUp" data-wow-delay="100ms">
                                <div class="counter-two__icon">
                                    <span class="icon-consulting"></span>
                                </div>
                                <h3 class="odometer" data-count="<?= $banners[60][2]->description ?>">00</h3>
                                <p class="counter-two__text"><?= $banners[60][2]->title ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--Counter Two End-->

<!--Qutiiz Ready Two-->
<section class="qutiiz-ready-two">
    <div class="qutiiz-ready-two-bg-box wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
        <div class="qutiiz-ready-two-bg jarallax" data-jarallax data-speed="-0.2" data-imgPosition="50% 0%"
            style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[59][0]->id . DS . $banners[59][0]->image) ?>)"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="qutiiz-ready-two__inner wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <h2 class="qutiiz-ready-two__title"><?= $banners[59][0]->title ?></h2>
                    <a href="<?= $this->Url->build(['action' => 'about']) ?>" class="qutiiz-ready-two__btn thm-btn"><?= $banners[59][0]->description ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Qutiiz Ready End-->

<!--Team One Start-->
<!-- <section class="team-one">
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
    </div>
</section> -->
<!--Team One End-->

<!--Testimonial Two Start-->
<!-- <section class="testimonial-two clearfix">
    <div class="testimonial-two-map"
        style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[63][0]->id . DS . $banners[63][0]->image) ?>)"></div>
    <div class="container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
            <span class="section-title__tagline"><?= $banners[63][0]->title ?></span>
            <h2 class="section-title__title"><?= $banners[63][0]->description ?></h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="testimonial-two__carousel owl-theme owl-carousel wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <?php foreach ($banners[64] as $banner): ?>
                        <div class="testimonial-one__single">
                            <p class="testimonial-one__text"><?= $banner->description ?>
                            </p>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-img">
                                    <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image) ?>" alt="">
                                    <div class="testimonial-one__quote">
                                        <img src="<?= $webroot ?>assets/images/testimonial/testimonial-one-quote.png" alt="">
                                    </div>
                                </div>
                                <div class="testimonial-one__client-details">
                                    <h4 class="testimonial-one__client-name"><?= $banner->title ?></h4>
                                    <p class="testimonial-one__client-title"><?= $banner->url ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--Testimonial Two End-->
