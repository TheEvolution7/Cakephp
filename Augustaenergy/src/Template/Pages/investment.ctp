<?php 
    echo $this->element('meta');
    $banners = $this->getCache('banners_' . $configs['language']); 
?>

<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[68][0]->id . DS . $banners[68][0]->image) ?>)">
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
                <li class="active"><?= $banners[68][0]->title ?></li>
            </ul>
            <h2><?= $banners[68][0]->description ?></h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Page Start-->
<section class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-page__left">
                    <div class="section-title text-left wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <span class="section-title__tagline"><?= $banners[68][1]->title ?></span>
                        <h2 class="section-title__title"><?= $banners[68][1]->description ?></h2>
                    </div>
                    <p class="about-page__right-text-1 wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms"> <?= $banners[68][2]->title ?></p>
                    <p class="about-page__right-text-2 wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms"><?= $banners[68][2]->description ?></p>
                    <div class="about-page__points-box wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <ul class="list-unstyled about-page__points">
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p><?= $banners[68][3]->title ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p><?= $banners[68][3]->description ?></p>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled about-page__points about-page__points-two">
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p><?= $banners[68][4]->title ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-draw-check-mark"></span>
                                </div>
                                <div class="text">
                                    <p><?= $banners[68][4]->description ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-page__right wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="about-page__img">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banners[68][5]->id . DS . $banners[68][5]->image) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="content wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <h3><?= $banners[68][5]->title ?></h3>
                    <?= $banners[68][5]->description ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Page End-->

<!--Qutiiz Ready Two-->
<section class="qutiiz-ready-two">
    <div class="qutiiz-ready-two-bg-box wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
        <div class="qutiiz-ready-two-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[68][6]->id . DS . $banners[68][6]->image) ?>)"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="qutiiz-ready-two__inner wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <h2 class="qutiiz-ready-two__title"><?= $banners[68][6]->description ?></h2>
                    <a href="<?= $this->Url->build(['action' => 'about']) ?>" class="qutiiz-ready-two__btn thm-btn"><?= $banners[68][6]->description ?></a>
                </div>
            </div>
        </div>
    </div>
</section>