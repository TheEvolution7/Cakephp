<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
    <div class="main2 container-banner center">
    <div class="box-slide-home" data-aos="animation-translate-up" data-aos-delay="300">
        <div class="js-slider-home">
            <?php if ($configs['language'] == 'al'): ?>
                <div class="banner__slide">
                    <div class="banner-item">
                    <img src="<?= $webroot ?>TRANSLATE-1.png">
                    </div>
                </div>
                <div class="banner__slide">
                    <div class="banner-item">
                    <img src="<?= $webroot ?>TRANSLATE-2.png">
                    </div>
                </div>
                <div class="banner__slide">
                    <div class="banner-item">
                    <img src="<?= $webroot ?>TRANSLATE-3.png">
                    </div>
                </div>
                <div class="banner__slide">
                    <div class="banner-item">
                    <img src="<?= $webroot ?>TRANSLATE-4.png">
                    </div>
                </div>
                <div class="banner__slide">
                    <div class="banner-item">
                    <img src="<?= $webroot ?>TRANSLATE-5.png">
                    </div>
                </div>
                <div class="banner__slide">
                    <div class="banner-item">
                    <img src="<?= $webroot ?>TRANSLATE-6.png">
                    </div>
                </div>
                <div class="banner__slide">
                    <div class="banner-item">
                    <img src="<?= $webroot ?>TRANSLATE-7.png">
                    </div>
                </div>
            <?php else: ?>
                <?php foreach($banners[3] as $banner): ?>
                    <div class="banner__slide">
                        <div class="banner-item">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>">
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
    
        </div>
    </div>
    <div class="main2__center content-banner">
        <div class="main2__wrap" data-aos="animation-scale-top" data-aos-delay="300">
        <h1 class="main2__title h4" data-aos="animation-scale-top"><?= $banners[4][0]->title ?></h1>
        <div class="main2__info info" data-aos="animation-scale-top" data-aos-delay="300"><?= $banners[4][0]->description ?></div>
        <form action="<?= $this->Url->build(['controller' => 'Pages','action' => 'newsletter']) ?>" method="post">
            <div class="field">
            <div class="field__wrap">
                <input class="field__input" type="email" name="email" placeholder="<?= __('Enter your email address') ?>">
            </div>
            </div>
            <div class="main2__btns" data-aos="animation-scale-top" data-aos-delay="500">
            <button type="button" onclick="window.location.href='<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>'" class="main2__btn btn btn_blue"><?= __('Get Started') ?></button>
            <!-- <button class="main2__btn btn btn_blue-light">View more</button> -->
            </div>
        </form>
        <div class="main-btn-download">
            <h5><?= $banners[4][1]->title ?></h5>
            <div class="btn-list-down">
            <a href="<?= $banners[4][2]->url ?>"><img src="<?= $webroot ?>img/app-store.svg" alt=""></a>
            <a href="<?= $banners[4][3]->url ?>"><img src="<?= $webroot ?>img/play-store.svg" alt=""></a>
            </div>   
        </div>
        
        </div>
        <div class="main-img-ab" data-aos="zoom-in-up" data-aos-delay="700">
        <img src="<?= $webroot ?>img/earphone.svg" alt="">
        </div>
    </div>
    </div>
    <div class="advantages2 bg-2">
    <div class="advantages2__center center">
        <div class="advantages2__row" data-aos="animation-scale-top">
        <div class="advantages2__bg"><img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[5][0]->id . DS . $banners[5][0]->image ) ?>"
            src="<?= $this->Url->build('/uploads/banners/' . $banners[5][0]->id . DS . $banners[5][0]->image ) ?>" alt="<?= $banners[5][0]->title ?>">
        </div>
        <div class="advantages2__wrap">
            <h4 class="advantages2__title h4" data-aos="animation-scale-top"><?= $banners[5][0]->title ?></h4>
            <div class="advantages2__info info" data-aos="animation-scale-top"><?= $banners[5][0]->description ?></div>
            <a href="<?= $this->Url->build(['action' => 'ourDoctor']) ?>" class="faq__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('Meet our doctor') ?></a>
        </div>
        </div>
    </div>
    </div>

    <!-- <div class="advantages bg">
    <div class="advantages__center center">
        <div class="advantages__row" data-aos="animation-scale-top">
        <div class="advantages__bg">
            <div class="advantages__group">
            <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[5][1]->id . DS . $banners[5][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[5][1]->id . DS . $banners[5][1]->image ) ?>" alt="<?= $banners[5][1]->title  ?>"></div>
            <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[5][2]->id . DS . $banners[5][2]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[5][2]->id . DS . $banners[5][2]->image ) ?>" alt="<?= $banners[5][2]->title  ?>"></div>
            </div> 
        </div>
        <div class="advantages__wrap">
            <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[5][1]->title ?></h3>
            <div class="advantages__info info" data-aos="animation-scale-top"><?= $banners[5][1]->description ?></div>
            <button class="advantages__btn btn btn_blue" data-aos="animation-scale-top" onclick="window.location.href='<?= $banners[5][1]->url ?>'"><?= __('View More') ?></button>
        </div>
        </div>
        <div class="advantages__row" data-aos="animation-scale-top">
        <div class="advantages__bg">
            <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[5][3]->id . DS . $banners[5][3]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[5][3]->id . DS . $banners[5][3]->image ) ?>" alt="<?= $banners[5][3]->title  ?>"></div>
            <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[5][4]->id . DS . $banners[5][4]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[5][4]->id . DS . $banners[5][4]->image ) ?>" alt="<?= $banners[5][4]->title  ?>"></div>
        </div>
        <div class="advantages__wrap">
            <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[5][3]->title ?></h3>
            <div class="advantages__info info" data-aos="animation-scale-top"><?= $banners[5][3]->description ?></div>
            <button class="advantages__btn btn btn_blue" data-aos="animation-scale-top" onclick="window.location.href='<?= $banners[5][3]->url ?>'"><?= __('View More') ?></button>
        </div>
        </div>
    </div>
    </div> -->
    
    <div class="quality2">
    <div class="quality2__center center">
        <h4 class="quality2__title h3 text-center" data-aos="animation-scale-top"><?= $banners[6][0]->title ?></h4>
        <div class="quality3__list">
        <div class="quality3__item">
            <div class="detail" data-aos="animation-scale-top">
            <div class="quality2__icon __icon-number bg-blue-light">
                <span>1</span>

            </div>
            <div class="quality2__category"><?= $banners[7][0]->title ?></div>
            <div class="quality2__text"><?= $banners[7][0]->description ?></div>
            
            </div>
            <div class="fl-module-content fl-node-content" data-aos="animation-scale-top">
            <div class="mpl-hiw-symptoms rebrand2020 start" role="presentation" aria-hidden="true">
                <span class="h3 ml2"><?= $banners[6][1]->title ?></span>
                <ul class="sym-list">
                <?= $banners[6][1]->description ?>
                </ul>
                <div class="hiw-image">
                <img data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" width="146" height="230" src="<?= $webroot ?>img/home/how/pencil.png" class="attachment-full size-full lazyloaded" alt="" loading="lazy" data-ll-status="loaded"><noscript><img width="146" height="230" src="<?= $webroot ?>img/home/how/pencil.png" class="attachment-full size-full" alt="" loading="lazy" /></noscript>	
                </div>
            </div>
            </div>
        </div>
        <div class="quality3__item">
            <div class="detail" data-aos="animation-scale-top">
            <div class="quality2__icon __icon-number bg-green-light">
                <span>2</span>  
            </div>
            <div class="quality2__category"><?= $banners[7][1]->title ?></div>
            <div class="quality2__text"><?= $banners[7][1]->description ?></div>
            </div>
            <div class="fl-module-content fl-node-content" data-aos="animation-scale-top">
            <div class="mpl-hiw-provider rebrand2020 start" role="presentation" aria-hidden="true">
                <div class="img">
                <img width="200"
                    src="<?= $this->Url->build('/uploads/banners/' . $banners[6][2]->id . DS . $banners[6][2]->image) ?>"
                    class="hiw-headshot" alt="" loading="lazy" sizes="(max-width: 200px) 100vw, 200px"
                    srcset="<?= $this->Url->build('/uploads/banners/' . $banners[6][2]->id . DS . $banners[6][2]->image) ?>"></div>
                <span class="h3"><?= $banners[6][2]->title ?></span>
                <span class="h5"><?= $banners[6][2]->description ?></span>
                <ul>
                <li>
                    <img class="db lazyloaded" role="presentation" alt="" src="<?= $webroot ?>img/home/how/chat.png" srcset="<?= $webroot ?>img/home/how/chat.png">
                </li>
                <li>
                    <img class="db lazyloaded" role="presentation" alt=""
                    src="<?= $webroot ?>img/home/how/video.png"
                    srcset="<?= $webroot ?>img/home/how/video.png">
                </li>
                <li>
                    <img class="db lazyloaded" role="presentation" alt=""
                    src="<?= $webroot ?>img/home/how/phone.png"
                    srcset="<?= $webroot ?>img/home/how/phone.png">
                </li>
                </ul>
                <div class="equip-img">
                <img data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" role="presentation" alt=""
                    src="<?= $webroot ?>img/home/how/equip.png"
                    srcset="<?= $webroot ?>img/home/how/equip.png">
                </div>
            </div>
            </div>
        </div>
        <div class="quality3__item">
            <div class="detail" data-aos="animation-scale-top">
            <div class="quality2__icon __icon-number bg-orange-light">
                <span>3</span>  
            </div>
            <div class="quality2__category"><?= $banners[7][2]->title ?></div>
            <div class="quality2__text"><?= $banners[7][2]->description ?></div>
            </div>
            <div class="fl-module-content fl-node-content" data-aos="animation-scale-top">
            <div class="mpl-hiw-prescription rebrand2020 start" role="presentation" aria-hidden="true">
                <?= $banners[6][3]->description ?>
                <div class="delivery">
                    <span class="deliver">
                    <img role="presentation" alt=""
                        src="<?= $webroot ?>img/home/how/icon-shipping.png"
                        srcset="<?= $webroot ?>img/home/how/icon-shipping.png">
                    <p><?= $banners[6][4]->title ?></p>
                    </span>
                    <span class="pickup">
                    <img role="presentation" alt=""
                        src="<?= $webroot ?>img/home/how/icon-location.png"
                        srcset="<?= $webroot ?>img/home/how/icon-location.png">
                    <p><?= $banners[6][5]->title ?></p>
                    </span>
                </div>
                </div>
                <div class="prescrip-img">
                <img data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" role="presentation" alt=""
                    src="<?= $webroot ?>img/home/how/prescription.png"
                    srcset="<?= $webroot ?>img/home/how/prescription.png">
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="text-center" style="padding-top: 30px;">
        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'howItWork']) ?>" class="faq__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('View More') ?></a>
        </div>
    </div>
    </div> 
    <div class="cases cases_group bg-2">
    <div class="cases__center center">
        <h2 class="quality3__title h2" data-aos="animation-scale-top"><?= $banners[8][0]->title ?></h2>
        <div class="quality3__info info" data-aos="animation-scale-top"><?= $banners[8][0]->description ?></div>
        <div class="cases__group __2 js-slider-mobile js-slider-resize">
    <?php foreach($banners[9] as $banner): ?>
        <a class="cases__box case__hover" href="<?= $banner->url ?>">
            <div class="cases__photo">
            <img srcset="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"> 
            </div>
            <div class="cases__body">
            <div class="cases__subtitle"><?= $banner->title ?></div>
            <div class="more"><?= __('Read more') ?>
                <svg class="icon icon-arrow-right">
                <use xlink:href="#icon-arrow-right"></use>
                </svg>
            </div>
            </div>
        </a>
    <?php endforeach ?>
        </div>
    </div>
    </div>
    <div class="review1">
    <div class="review1__center center">
        <div class="review1__head">
        <h2 class="review1__title h2" data-aos="animation-scale-top"><?= $banners[10][0]->title ?></h2>
        <div class="review1__info info" data-aos="animation-scale-top"><?= $banners[10][0]->description ?></div>
        </div>
        <div class="review1__container" data-aos="animation-scale-top">
        <div class="review1__slider js-slider-review1">
        <?php foreach($banners[11] as $banner): ?>
            <div class="review1__slide">
            <div class="review1__item">
                <div class="review1__photo"><img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                <div class="review1__details">
                <div class="review1__author"><?= $banner->title ?></div>
                <div class="review1__text"><?= $banner->description ?></div>
                </div>
            </div>
            </div>
        <?php endforeach ?>
        </div>
        </div>
        
    </div>
    </div>


    <div class="packages">
    <div class="packages__center center">
        <div class="packages__head">
        <h2 class="packages__title h2" data-aos="animation-scale-top"><?= $banners[12][0]->title ?></h2>
        <div class="packages__info info" data-aos="animation-scale-top"><?= $banners[12][0]->description ?></div>
        
        </div>
        <div class="packages__group" data-aos="animation-scale-top">
    <?php foreach($banners[13] as $banner): ?>
        <div class="packages__item">
            <div class="packages__subtitle color-orange"><?= $banner->title ?></div>
            <?= $banner->description ?>
            <button class="packages__btn btn btn_blue btn_wide" onclick="window.location.href='<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>'"><?= __('Get Started') ?></button>
        </div>
    <?php endforeach ?>
        </div>
        <div class="text-center" style="padding-top: 30px;">
        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'pricing']) ?>" class="faq__btn btn btn_blue-light aos-init" data-aos="animation-scale-top"><?= __('Pricing options') ?></a>
        </div>
    </div>
    </div>

    <div class="banner cta-section">
    <div class="banner__center center"><a class="banner__wrap" href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" style="background-image: url('<?= $this->Url->build('/uploads/banners/' . $banners[15][0]->id . DS . $banners[15][0]->image ) ?>');">
        <div class="banner__title h4"><?= $banners[15][0]->title ?></div>
        <div class="banner__btn btn btn_blue"><?= $banners[15][0]->description ?></div></a></div>
    </div>
</div>