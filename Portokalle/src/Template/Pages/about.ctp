<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
    <div class="main2 container-banner">
    <div class="box-slide-home" data-aos="animation-translate-up" data-aos-delay="300">
        <div class="banner__slide">
            <div class="banner-item">
                <img src="<?= $this->Url->build('/uploads/banners/' . $banners[44][0]->id . DS . $banners[44][0]->image ) ?>" alt="<?= $banners[44][0]->title ?>">
            </div>
        </div>
    </div>
    <div class="main2__center center content-banner">
        <div class="main2__wrap" data-aos="animation-scale-top" data-aos-delay="300">
        <h1 class="main2__title h4" data-aos="animation-scale-top"><?= $banners[44][0]->title ?></h1>
        <div class="main2__info info" data-aos="animation-scale-top" data-aos-delay="300"><?= $banners[44][0]->description ?></div>
        </div>
    </div>
    </div>
    <div class="advantages2 bg-0">
    <div class="advantages2__center center">
        <div class="advantages2__row" data-aos="animation-scale-top">
        <div class="advantages2__bg">
        <img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[45][0]->id . DS . $banners[45][0]->image ) ?>"
            src="<?= $this->Url->build('/uploads/banners/' . $banners[45][0]->id . DS . $banners[45][0]->image ) ?>" alt="<?= $banners[45][0]->title ?>">
        </div>
        <div class="advantages2__wrap">
            <h5 class="advantages2__title h5" data-aos="animation-scale-top"><?= $banners[45][0]->title ?></h5>
            <div class="advantages2__info info" data-aos="animation-scale-top"><?= $banners[45][0]->description ?></div>
            <!-- <a href="#" class="faq__btn btn btn_blue-light" data-aos="animation-scale-top">Meet our doctor</a> -->
        </div>
        </div>
    </div>
    </div>
    <div class="advantages how-it-section_bg bg-2">
    <div class="advantages__center center">
        <div class="advantages__row">
            <div class="advantages__bg"><img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[46][0]->id . DS . $banners[46][0]->image ) ?>"
            src="<?= $this->Url->build('/uploads/banners/' . $banners[46][0]->id . DS . $banners[46][0]->image ) ?>" alt="<?= $banners[46][0]->title ?>">
            </div>
            <div class="advantages__wrap">
                <h5 class="advantages__title h5" data-aos="animation-scale-top"><?= $banners[46][0]->title ?></h5>
                <div class="advantages__info info" data-aos="animation-scale-top">
                    <p><?= $banners[46][0]->description ?></p>
        
                </div>
                <a href="<?= $banners[46][0]->url ?>" class="faq__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('Get started') ?></a>
            </div>
        </div>
        <div class="advantages__row">
        <div class="advantages__bg">
            <div class="advantages__group">
            <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[47][0]->id . DS . $banners[47][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[47][0]->id . DS . $banners[47][0]->image ) ?>" alt="<?= $banners[47][0]->title ?>"></div>
            <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[47][1]->id . DS . $banners[47][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[47][1]->id . DS . $banners[47][1]->image ) ?>" alt="<?= $banners[47][1]->title ?>"></div>
            </div>
        </div>
        <div class="advantages__wrap">
            <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[47][0]->title ?></h3>
            <div class="advantages__info info" data-aos="animation-scale-top">
            
            <p><?= $banners[47][0]->description ?></p>
            </div>
            <a href="<?= $banners[47][0]->url ?>" class="advantages__btn btn btn_blue" data-aos="animation-scale-top"><?= __('Get started') ?></a>
        </div>
        </div>
        <div class="advantages__row">
        <div class="advantages__bg">
            <div class="advantages__group">
            <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[48][0]->id . DS . $banners[48][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[48][0]->id . DS . $banners[48][0]->image ) ?>" alt="<?= $banners[48][0]->title ?>"></div>
            
            </div>
        </div>
        <div class="advantages__wrap">
            <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[48][0]->title ?></h3>
            <div class="advantages__info info" data-aos="animation-scale-top">
            <p><?= $banners[48][0]->description ?></p>
            </div>
            <a href="<?= $banners[48][0]->url ?>" class="advantages__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('Get started') ?></a>
        </div>
        </div>
    </div>
    </div>
    <div class="treatable bg-0">
        <div class="treatable__center center">
        <h2 class="review__title h2" data-aos="animation-scale-top"><?= $banners[43][0]->title ?></h2>
            <div class="quality3__list" data-aos="fade-up">
            <?php foreach($banners[49] as $banner): ?>
                <a href="<?= $banner->url ?>" class="quality3__item __item-4 modal-doctor filter-item a-1 a-2 a-3">
                    <div class="detail">
                        <div class="quality3__icon bg-red-light"><img class="some-icon" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                        <div class="quality3__category"><?= $banner->title ?></div>
                        <div class="quality2__text"><?= $banner->description ?></div>
                    </div>
                    <div class="btn-view-all"><?= __('Read more') ?></div>
                </a>
            <?php endforeach ?>
            </div>
        </div>
    </div>
<div class="review bg">
    <div class="review__center center">
        <h2 class="review__title h2" data-aos="animation-scale-top"><?= $banners[23][1]->title ?></h2>
        <p class="review__info" data-aos="animation-scale-top"><?= $banners[23][1]->description ?></p>
        <div class="review__container">
            <div class="review__slider js-slider-review doctor-slide">
                <?php foreach($banners[29] as $banner): ?>
                    <div class="review__item">
                        <div class="review__user">
                            <div class="review__ava"><img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                            <div class="review__details">
                                <div class="review__author"><?= $banner->title ?></div>
                                <?= $banner->description ?>
                            </div>
                        </div>
                        <div class="review__text"><?= $banner->url ?></div>
                        <!-- <div class="btn-readmore">Read more</div> -->
                    </div>
                <?php endforeach ?>   
            </div>
        </div>
    </div>
</div>
<div class="banner cta-section">
        <div class="banner__center center"><a class="banner__wrap" href="<?= $banners[15][0]->url ?>" style="background-image: url('<?= $this->Url->build('/uploads/banners/' . $banners[15][0]->id . DS . $banners[15][0]->image ) ?>');">
            <div class="banner__title h4"><?= $banners[15][0]->title ?></div>
            <div class="banner__btn btn btn_blue"><?= $banners[15][0]->description ?></div></a></div>
        </div>
</div>