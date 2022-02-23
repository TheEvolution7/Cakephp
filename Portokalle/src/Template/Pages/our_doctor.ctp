<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
    $arr = $banners[170];
    $collection = new \Cake\Collection\Collection($arr);
    $chunked = $collection->chunk(ceil(count($collection->toArray()) / 3));
?> 
<div class="outer__container">
        <div class="main">
            <div class="main__center center">
                <h1 class="main__title h2" data-aos="animation-scale-top"><?= $banners[31][0]->title ?></h1>
                <div class="main__info info" data-aos="animation-scale-top"><?= $banners[31][0]->description ?></div>
                <div class="main__btns" data-aos="animation-scale-top">
                    <button class="main__btn btn btn_blue" onclick="window.location.href='<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>'"><?= __('Get Started') ?></button>
                    <button class="main__btn btn btn_blue-light" onclick="window.location.href='<?= $banners[31][1]->url ?>'"><?= __('View more') ?></button>
                </div>
                <div class="main__bg" data-aos="animation-scale-top">
                    <!-- <div class="main__preview"><img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[31][0]->id . DS . $banners[31][0]->image ) ?>"
                            src="<?= $this->Url->build('/uploads/banners/' . $banners[31][0]->id . DS . $banners[31][0]->image ) ?>" alt="<?= $banners[31][0]->title ?>"></div> -->
                </div>
            </div>
            <div class="list-doctor-img">
              <?php foreach ($chunked as $c): ?>
                <ul>
                  <?php foreach ($c as $banner): ?>
                    <li data-aos="animation-scale-top">
                      <div class="box-img">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="">
                      </div>
                    </li>
                  <?php endforeach ?>
                </ul>
              <?php endforeach ?>
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
        <div class="treatable">
            <div class="treatable__center center">
                <h2 class="review__title h2" data-aos="animation-scale-top"><?= $banners[30][0]->title ?></h2>
                <div class="quality3__list" data-aos="animation-scale-top">
                <?php foreach($banners[32] as $k => $banner): ?>
                    <a href="#modal-<?= $k+1 ?>" class="quality3__item __item-4 modal-doctor">
                        <div class="detail">
                              <div class="quality3__icon bg-red-light"><img class="some-icon" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                      <div class="quality3__category"><?= $banner->title ?></div>
                      <div class="quality2__text"><?= $banner->description ?></div>
                    
                        </div>
                        <div class="btn-view-all"><?= __('See examples') ?></div>
                    </a>
                    <div id="modal-<?= $k+1 ?>" class="mfp-hide white-popup-block">
                      <div class="box-content">
                        <a class="popup-modal-dismiss" href="javascript:;">
                          <svg class="icon icon-close">
                            <use xlink:href="#icon-close"></use>
                          </svg>
                        </a>
                        <?= $banner->content ?>
                      </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="can-section bg-2">
          <div class="can__center center">
            <h2 class="review__title h2" data-aos="animation-scale-top"><?= $banners[30][1]->title ?></h2>
            <div class="quality3__list" data-aos="animation-scale-top">
            <?php foreach($banners[33] as $k => $banner): ?>
              <a href="#modal-c-<?= $k+1 ?>" class="quality3__item __item-4 modal-doctor">
                  <div class="detail">
                        <div class="quality3__icon bg-orange-light"><img class="some-icon" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                <div class="quality3__category"><?= $banner->title ?></div>
                <div class="quality2__text"><?= $banner->description ?></div>
              
                  </div>
                  <div class="btn-view-all"><?= __('See more') ?></div>
              </a>
              <div id="modal-c-<?= $k+1 ?>" class="mfp-hide white-popup-block">
                <div class="box-content __2">
                  <a class="popup-modal-dismiss" href="javascript:;">
                    <svg class="icon icon-close">
                      <use xlink:href="#icon-close"></use>
                    </svg>
                  </a>
                  <?= $banner->content ?>
                  <a href="<?= $banner->url ?>" class="faq__btn btn btn_blue-light aos-init aos-animate" data-aos="animation-scale-top"><?= __('Learn more') ?></a>
                </div>
              </div>
            <?php endforeach ?> 
          </div>
          </div>
        </div>


        <!-- <div class="cannot-section">
          <div class="can__center center">
            <h2 class="review__title h2" data-aos="animation-scale-top"><?= $banners[30][1]->title ?></h2>
            <div class="quality3__list" data-aos="animation-scale-top">
            <?php foreach($banners[33] as $k => $banner): ?>
              <a href="#modal-cannot-<?= $k+1 ?>" class="quality3__item __item-4 modal-doctor">
                  <div class="detail">
                        <div class="quality3__icon bg-<?= $banner->url ?>-light"><img class="some-icon" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                <div class="quality3__category"><?= $banner->title ?></div>
                <div class="quality2__text"><?= $banner->description ?></div>
              
                  </div>
                  <div class="btn-view-all"><?= __('See more') ?></div>
              </a>
              <div id="modal-cannot-<?= $k+1 ?>" class="mfp-hide white-popup-block">
                <div class="box-content __2">
                  <a class="popup-modal-dismiss" href="javascript:;">
                    <svg class="icon icon-close">
                      <use xlink:href="#icon-close"></use>
                    </svg>
                  </a>
                  <?= $banner->content ?>
                </div>
                
              </div> 
            <?php endforeach ?>  
          </div>
          </div>
        </div> -->
        <div class="advantages2 bg">
          <div class="advantages2__center center">
            <div class="advantages2__row" data-aos="animation-scale-top">
              <div class="advantages2__bg"><img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[35][0]->id . DS . $banners[35][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[35][0]->id . DS . $banners[35][0]->image ) ?>" alt="<?= $banners[35][0]->title ?>">
              </div>
              <div class="advantages2__wrap">
                <h4 class="advantages2__title h4" data-aos="animation-scale-top"><?= $banners[35][0]->title ?></h4>
                <div class="advantages2__info info" data-aos="animation-scale-top"><?= $banners[35][0]->description ?></div>
                <a href="<?= $this->Url->build(['action' => 'becomeAProvider']) ?>" class="faq__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('Join our team') ?></a>
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