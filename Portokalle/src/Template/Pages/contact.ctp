<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
      <div class="main2 container-banner">
          <div class="box-slide-home" data-aos="animation-translate-up" data-aos-delay="300">
              <div class="banner__slide">
                  <div class="banner-item">
                    <img src="<?= $this->Url->build('/uploads/banners/' . $banners[51][0]->id . DS . $banners[51][0]->image ) ?>" alt="<?= $banners[51][0]->title ?>">
                  </div>
              </div>
          </div>
          <div class="main2__center center content-banner">
            <div class="main2__wrap" data-aos="animation-scale-top" data-aos-delay="300">
              <h1 class="main2__title h4" data-aos="animation-scale-top"><?= $banners[51][0]->title ?></h1>
              <div class="main2__info info" data-aos="animation-scale-top" data-aos-delay="300"><?= $banners[51][0]->description ?></div>
              <div class="main2__btns" data-aos="animation-scale-top" data-aos-delay="500">
                  <a href="#form-contact" class="main2__btn btn btn_blue">Become a provider</a>
              </div>
              
            </div>
          </div>
        </div>
        <!-- <div class="cases bg-0">
          <div class="cases__section">
              <div class="cases__center center">
                  <h2 class="cases__title h2" data-aos="animation-scale-top"><?= $banners[50][0]->title ?></h2>
                  <div class="cases__list list__full">
                  <?php foreach($banners[53] as $banner): ?>
                      <div class="cases__item">
                          <div class="cases__preview"><img srcset="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>">
                              </div>
                          <div class="cases__details">
                              <div class="cases__subtitle"><?= $banner->title ?></div>
                              <div class="cases__text"><?= $banner->description ?></div>
                          </div>
                      </div>
                  <?php endforeach ?>  
                  </div>
                  <div class="cases__container ">
                      <div class="cases__bg"><img srcset="<?= $this->Url->build('/uploads/banners/' . $banners[50][1]->id . DS . $banners[50][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[50][1]->id . DS . $banners[50][1]->image ) ?>" alt="<?= $banners[50][1]->title ?>">
                      </div>
                      <div class="cases__wrap">
                        <h5 class="cases__title h5"><?= $banners[50][1]->title ?></h5>
                        <div class="cases__info info"><p><?= $banners[50][1]->description ?></p></div>
                      </div>
                    </div>
              </div>
          </div>
      </div> -->
      <div class="can-section bg">
          <div class="can__center center">
              <h2 class="review__title h2" data-aos="animation-scale-top"><?= $banners[50][2]->title ?></h2>
              <div class="quality3__list" data-aos="animation-scale-top">
              <?php foreach($banners[54] as $banner): ?>
                  <div class="quality3__item">
                      <div class="detail">
                          <div class="quality3__icon bg-blue-light"><img class="some-icon" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                          <div class="quality3__category"><?= $banner->title ?></div>
                          <div class="quality2__text"><?= $banner->description ?></div>
                      </div>
                      <div class="btn-view-all">See more</div>
                  </div>
              <?php endforeach ?>   
              </div>
          </div>
      </div>
      <div class="faq bg-3">
            <div class="faq__center center">
                <div class="faq__top">
                <h2 class="faq__title h2" data-aos="animation-scale-top"><?= $banners[65][0]->title ?></h2>   
                </div>
                <div class="faq__row">
                <div class="faq__col">
                <?php foreach($banners[69] as $k => $banner): if($k%2 == 0): ?>
                    <div class="faq__item">
                    <div class="faq__head"><?= $banner->title ?></div>
                    <div class="faq__body"><?= $banner->description ?></div>
                    </div>
                <?php endif;endforeach ?> 
                </div>
                <div class="faq__col">
                <?php foreach($banners[69] as $k =>  $banner): if($k%2 != 0): ?>
                <div class="faq__item">
                <div class="faq__head"><?= $banner->title ?></div>
                    <div class="faq__body"><?= $banner->description ?></div>
                </div>
                <?php endif;endforeach ?> 
                </div>
                </div>
            </div>
        </div>
      <div class="message bg" id="form-contact">
        <div class="message__center center">
          <h3 class="message__title h3" data-aos="animation-scale-top"><?= $banners[50][2]->title ?></h3>
          <div class="message__info info"><?= $banners[50][2]->description ?></div>
          <form class="message__form" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>" method="post">
            <div class="message__fieldset">
              <div class="message__line">
                <div class="field">
                  <div class="field__wrap">
                      <div class="field__label">Full Name *</div>
                    <input class="field__input" type="text" placeholder="" name="name" required>
                  </div>
                </div>
                <div class="field">
                  <div class="field__wrap">
                      <div class="field__label">Email Address *</div>
                    <input class="field__input" type="email" placeholder="" name="email" required>
                  </div>
                </div>
              </div>
              <div class="message__line">
                  <div class="field">
                    <div class="field__wrap">
                      <div class="field__label">Phone Number *</div>
                      <input id="input_4_10" class="field__input" type="tel" placeholder="(###) ###-####" name="phone" required>
                    </div>
                  </div>
                  <div class="field">
                    <div class="field__wrap">
                      <div class="field__label">Speciality *</div>
                      <input class="field__input" type="email" placeholder="Emergency" name="title" required>
                    </div>
                  </div>
                </div>
              <div class="message__line check__line">
                  <!-- <div class="field field-label">
                      <div class="field__wrap">
                        <div class="field__label">Region(s) of Licensure *</div>
                      </div>
                    </div> -->
              <!-- <?php foreach($banners[55] as $banner): ?>
                <div class="field">
                  <div class="message__control">
                      <label class="checkbox">
                        <input class="checkbox__input" type="checkbox" name="address"><span class="checkbox__in"><span class="checkbox__tick"></span><span class="checkbox__text"><?= $banner->title ?></span></span>
                      </label>
                  </div>
                </div>
              <?php endforeach ?> -->
              </div>
              <div class="message__line">
                  <div class="field __100">
                    <div class="field__wrap">
                      <div class="field__label">How did you hear about us? *</div>
                      <input class="field__input" type="text" placeholder="" name="about" required>
                    </div>
                  </div>
                </div>
                <div class="message__line">
                  <div class="field __100">
                    <div class="field__wrap">
                      <div class="field__label">Physician College Online Listing (optional)</div>
                      <input class="field__input" type="text" placeholder="" name="content">
                    </div>
                  </div>
                  
                </div>
            </div>
            <div class="message__control">
              <label class="checkbox">
                <input class="checkbox__input" type="checkbox" required><span class="checkbox__in"><span class="checkbox__tick"></span><span class="checkbox__text">I agree to the Terms & Conditions</span></span>
              </label>
              <button type="submit" class="message__btn btn btn_blue">Send request</button>
            </div>
          </form>
        </div>
      </div>
    </div>