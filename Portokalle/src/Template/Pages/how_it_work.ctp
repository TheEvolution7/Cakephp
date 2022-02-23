<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
      <div class="main2 container-banner">
        <div class="box-slide-home" data-aos="animation-translate-up" data-aos-delay="300">
            <div class="banner__slide">
                <div class="banner-item">
                  <img src="<?= $this->Url->build('/uploads/banners/' . $banners[18][0]->id . DS . $banners[18][0]->image ) ?>" alt="<?= $banners[18][0]->title ?>">
                </div>
            </div>
        </div>
        <div class="main2__center center content-banner">
          <div class="main2__wrap" data-aos="animation-scale-top" data-aos-delay="300">
            <h1 class="main2__title h4" data-aos="animation-scale-top"><?= $banners[18][0]->title ?></h1>
            <div class="main2__info info" data-aos="animation-scale-top" data-aos-delay="300"><?= $banners[18][0]->description ?></div>
            <form action="<?= $this->Url->build(['controller' => 'Pages','action' => 'newsletter']) ?>" method="post">
              <div class="field">
                <div class="field__wrap">
                  <input class="field__input" type="email" name="email" placeholder="Enter your email address">
                </div>
              </div>
              <div class="main2__btns" data-aos="animation-scale-top" data-aos-delay="500">
                <button type="submit" class="main2__btn btn btn_blue"><?= __('Get Started Now') ?></button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
      <div class="advantages2 how-it-section bg-2">      
        <div class="advantages2__center center">
        <h2 class="how__title h2" data-aos="animation-scale-top"><?= $banners[19][0]->title ?></h2>   
        </div>
      </div>
      <div class="advantages how-it-section_bg bg-2">
        <div class="advantages__center center">
            <div class="advantages__row">
                <div class="advantages__bg"><img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[19][1]->id . DS . $banners[19][1]->image ) ?>"
                    src="<?= $this->Url->build('/uploads/banners/' . $banners[19][1]->id . DS . $banners[19][1]->image ) ?>" alt="<?= $banners[19][1]->title ?>">
                </div>
                <div class="advantages__wrap">
                    <h5 class="advantages__title h5" data-aos="animation-scale-top"><?= $banners[19][1]->title ?></h5>
                    <div class="advantages__info info" data-aos="animation-scale-top">
                          <?= $banners[19][1]->description ?>
                    </div>
                    <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" class="faq__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('Get started') ?></a>
                </div>
            </div>
          <div class="advantages__row">
            <div class="advantages__bg">
              <div class="advantages__group">
                <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[20][0]->id . DS . $banners[20][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[20][0]->id . DS . $banners[20][0]->image ) ?>" alt="<?= $banners[20][0]->title ?>"></div>
                <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[20][1]->id . DS . $banners[20][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[20][1]->id . DS . $banners[20][1]->image ) ?>" alt="<?= $banners[20][1]->title ?>"></div>
              </div>
              <!-- <button class="advantages__play play">
                <svg class="icon icon-play">
                  <use xlink:href="#icon-play"></use>
                </svg>
              </button> -->
            </div>
            <div class="advantages__wrap">
              <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[20][0]->title ?></h3>
              <div class="advantages__info info" data-aos="animation-scale-top">
              <?= $banners[20][0]->description ?> 
              </div>
              <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" class="advantages__btn btn btn_blue" data-aos="animation-scale-top"><?= __('Get started') ?></a>
            </div>
          </div>
          <div class="advantages__row">
            <div class="advantages__bg">
              <div class="advantages__group">
                <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[21][0]->id . DS . $banners[21][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[21][0]->id . DS . $banners[21][0]->image ) ?>" alt="<?= $banners[21][0]->title ?>"></div>
                <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[21][1]->id . DS . $banners[21][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[21][1]->id . DS . $banners[21][1]->image ) ?>" alt="<?= $banners[21][1]->title ?>"></div>
              </div>
              <!-- <button class="advantages__play play">
                <svg class="icon icon-play">
                  <use xlink:href="#icon-play"></use>
                </svg>
              </button> -->
            </div>
            <div class="advantages__wrap">
              <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[21][0]->title ?></h3>
              <div class="advantages__info info" data-aos="animation-scale-top">
              <?= $banners[21][0]->description ?> 
              </div>
              <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" class="advantages__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('Get started') ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="faq bg-3">
        <div class="faq__center center">
          <div class="faq__top">
            <h2 class="faq__title h2" data-aos="animation-scale-top"><?= $banners[17][0]->title ?></h2>   
          </div>
          <div class="faq__row">
            <div class="faq__col">
            <?php foreach($banners[22] as $k => $banner): if($k%2 == 0): ?>
                <div class="faq__item">
                  <div class="faq__head"><?= $banner->title ?></div>
                  <div class="faq__body"><?= $banner->description ?></div>
                </div>
            <?php endif;endforeach ?> 
            </div>
            <div class="faq__col">
            <?php foreach($banners[22] as $k =>  $banner): if($k%2 != 0): ?>
              <div class="faq__item">
              <div class="faq__head"><?= $banner->title ?></div>
                <div class="faq__body"><?= $banner->description ?></div>
              </div>
            <?php endif;endforeach ?> 
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