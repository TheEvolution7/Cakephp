<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
        <div class="main1">
            <div class="main1__bg">
                <div class="main1__preview" data-aos="animation-translate-up" data-aos-delay="300" data-aos-anchor=".main1__bg"><img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[37][0]->id . DS . $banners[37][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[37][0]->id . DS . $banners[37][0]->image ) ?>" alt="<?= $banners[37][0]->title ?>"></div>
            </div>
            <div class="main1__center center">
                <div class="main1__wrap">
                <h1 class="main1__title h2" data-aos="animation-scale-top"><?= $banners[37][0]->title ?></h1>
                <div class="main1__info info" data-aos="animation-scale-top" data-aos-delay="300"><?= $banners[37][0]->description ?><a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>"><?= __('Click here to learn more') ?></a> <br><br>
                <!-- <?= $banners[37][1]->title ?><a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>"><?= __('click here') ?></a>. -->
                </div>
                <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" class="main1__btn btn btn_blue" data-aos="animation-scale-top" data-aos-delay="600"><?= $banners[37][2]->title ?></a>
                </div>
            </div>
        </div>
        <div class="packages bg-2">
            <div class="packages__center center">
              <div class="packages__head">
                <h2 class="packages__title h2" data-aos="animation-scale-top"><?= $banners[36][0]->title ?></h2>
                <div class="packages__info info" data-aos="animation-scale-top"><?= $banners[36][0]->description ?></div>
              </div>
              <div class="packages__group" data-aos="animation-scale-top">
                <div class="packages__item pricing-box">
                    <!-- <div class="item__title">
                        <h3><?= $banners[38][0]->title ?></h3>
                        <p><?= $banners[38][0]->description ?></p>
                    </div> -->
                    <div class="packages-content">
                    <?php foreach($banners[40] as $banner): ?>
                        <div class="packages__icon">
                          <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>">
                        </div>
                        <div class="packages1__top">
                            <div class="packages1__subtitle"><?= $banner->title ?></div>
                        </div>
                        <div class="packages1__text"><?= $banner->description ?></div>
                        <div class="packages1__line packages1__line_border">
                           <?= $banner->content ?>
                        </div>
                    <?php endforeach ?>    
                    </div>
                    <div class="end-box">
                    <ul class="packages1__list">
                      <?= $banners[38][0]->content ?>
                      </ul>
                  <button class="packages__btn btn btn_blue btn_wide" onclick="window.location.href='<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>'"><?= __('Get Started') ?></button>
                </div>
                </div>
                <div class="packages__item pricing-box">
                    <!-- <div class="item__title">
                        <h3><?= $banners[39][0]->title ?></h3>
                        <p><?= $banners[39][0]->description ?></p>
                    </div> -->
                    <div class="packages-content">
                    <?php foreach($banners[41] as $banner): ?>
                      <div class="packages__icon">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>">
                      </div>
                        <div class="packages1__top">
                            <div class="packages1__subtitle"><?= $banner->title ?></div>
                        </div>
                        <div class="packages1__text"><?= $banner->description ?></div>
                        <div class="packages1__line packages1__line_border">
                            <?= $banner->content ?>
                        </div>
                      <?php endforeach ?>     
                    </div>
                    <div class="end-box">
                    <ul class="packages1__list">
                        <?= $banners[39][0]->content ?>
                    </ul>
                  <button class="packages__btn btn btn_blue btn_wide" onclick="window.location.href='<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>'"><?= __('Get Started') ?></button>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="faq-link">
          </div>
          <div class="quality3">
            <div class="quality3__center center">
              <h2 class="quality3__title h2" data-aos="animation-scale-top"><?= $banners[36][1]->title ?></h2>
              <div class="quality3__list" data-aos="animation-scale-top">
              <?php foreach($banners[42] as $banner): ?>
                <div class="quality3__item __item-4">
                  <div class="quality3__icon bg-red-light"><img class="some-icon" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                  <div class="content">
                  <div class="quality3__category"><?= $banner->title ?></div>
                  <div class="quality3__text"><?= $banner->description ?></div>
                  </div>
                </div>
              <?php endforeach ?>      
              </div>
            </div>
          </div>
      <div class="banner cta-section">
        <div class="banner__center center"><a class="banner__wrap" href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" style="background-image: url('<?= $this->Url->build('/uploads/banners/' . $banners[15][0]->id . DS . $banners[15][0]->image ) ?>');">
            <div class="banner__title h4"><?= $banners[15][0]->title ?></div>
            <div class="banner__btn btn btn_blue"><?= $banners[15][0]->description ?></div></a></div>
        </div>
    </div>