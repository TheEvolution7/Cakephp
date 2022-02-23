<?php 
use Cake\Utility\Text;
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
  <div class="main2 container-banner">
    <div class="box-slide-home" data-aos="animation-translate-up" data-aos-delay="300">
        <div class="banner__slide">
            <div class="banner-item">
            <img src="<?= $this->Url->build('/uploads/banners/' . $banners[57][0]->id . DS . $banners[57][0]->image ) ?>" alt="<?= $banners[57][0]->title ?>">
            </div>
        </div>
    </div>
    <div class="main2__center center content-banner">
      <div class="main2__wrap" data-aos="animation-scale-top" data-aos-delay="300">
        <h1 class="main2__title h4" data-aos="animation-scale-top"><?= $banners[57][0]->title ?></h1>
        <div class="main2__info info" data-aos="animation-scale-top" data-aos-delay="300">
          <?= $banners[57][0]->description ?>
        </div>
        <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" type="submit" class="main2__btn btn btn_blue"><?= __('Get Started Now') ?></a>
      </div>
    </div>
  </div>

  <div class="treatable bg-0">
    <div class="treatable__center center">
        <h2 class="review__title h2" data-aos="animation-scale-top"><?= $banners[56][0]->title ?></h2>
        <!-- <div class="filter-box" data-aos="animation-scale-top">
            <select name="" id="filter-select">
                <option value="all">All</option>
              <?php foreach($categories as $k =>  $cat): ?>
                <option value="<?= $k ?>"><?= $cat ?></option>
              <?php endforeach ?>
            </select>
        </div> -->
        <div class="quality3__list" data-aos="fade-up">
        <?php foreach($specialities as $speciality): ?>
            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'speciality', $speciality->slug]) ?>" class="quality3__item __item-4 filter-item">
                <div class="detail">
                      <div class="quality3__icon bg-red-light"><img class="some-icon" src="<?= $this->Url->build('/uploads/specialities/' . $speciality->id . DS . $speciality->image ) ?>" alt="<?= $speciality->title ?>"></div>
              <div class="quality3__category"><?= $speciality->title ?></div>
              <div class="quality2__text"><?= Text::truncate(
                  $speciality->content,
                    100,
                    [
                        'ellipsis' => '...',
                        'exact' => false
                    ]
                ); ?></div>
            
                </div>
                <div class="btn-view-all"><?= __('Read more') ?></div>
            </a>
        <?php endforeach ?>
        </div>
    </div>
</div>
  <div class="advantages2 how-it-section bg-2">
      
    <div class="advantages2__center center">
    <h2 class="how__title h2" data-aos="animation-scale-top"><?= $banners[62][0]->title ?></h2>
      
    </div>
  </div>

  <div class="advantages how-it-section_bg bg-2">
    <div class="advantages__center center">
        <div class="advantages__row">
            <div class="advantages__bg"><img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[62][1]->id . DS . $banners[62][1]->image ) ?>"
                src="<?= $this->Url->build('/uploads/banners/' . $banners[62][1]->id . DS . $banners[62][1]->image ) ?>" alt="<?= $banners[62][1]->title ?>">
            </div>
            <div class="advantages__wrap">
                <h5 class="advantages__title h5" data-aos="animation-scale-top"><?= $banners[62][1]->title ?></h5>
                <div class="advantages__info info" data-aos="animation-scale-top"> 
                  <?= $banners[62][1]->description ?> 
                </div>
                <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" class="faq__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('Get started') ?></a>
            </div>
        </div>
      <div class="advantages__row">
        <div class="advantages__bg">
          <div class="advantages__group">
            <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[63][0]->id . DS . $banners[63][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[63][0]->id . DS . $banners[63][0]->image ) ?>" alt="<?= $banners[63][0]->title ?>"></div>
            <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[63][1]->id . DS . $banners[63][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[63][1]->id . DS . $banners[63][1]->image ) ?>" alt="<?= $banners[63][1]->title ?>"></div>
          </div>
        </div>
        <div class="advantages__wrap">
          <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[63][0]->title ?></h3>
          <div class="advantages__info info" data-aos="animation-scale-top">
            <?= $banners[63][0]->description ?>
          </div>
          <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" class="advantages__btn btn btn_blue" data-aos="animation-scale-top"><?= __('Get started') ?></a>
        </div>
      </div>
      <div class="advantages__row">
        <div class="advantages__bg">
          <div class="advantages__group">
            <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[64][0]->id . DS . $banners[64][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[64][0]->id . DS . $banners[64][0]->image ) ?>" alt="<?= $banners[64][0]->title ?>"></div>
            <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[64][1]->id . DS . $banners[64][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[64][1]->id . DS . $banners[64][1]->image ) ?>" alt="<?= $banners[64][1]->title ?>"></div>
          </div>  
        </div>
        <div class="advantages__wrap">
          <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[64][0]->title ?> </h3>
          <div class="advantages__info info" data-aos="animation-scale-top">   
            <?= $banners[64][0]->description ?> 
          </div>
          <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?> " class="advantages__btn btn btn_blue-light" data-aos="animation-scale-top"><?= __('Get started') ?></a>
        </div>
      </div>
    </div>
  </div>
<div class="banner cta-section">
<div class="banner__center center"><a class="banner__wrap" href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" style="background-image: url('<?= $this->Url->build('/uploads/banners/' . $banners[15][0]->id . DS . $banners[15][0]->image ) ?>');">
    <div class="banner__title h4"><?= $banners[15][0]->title ?></div>
    <div class="banner__btn btn btn_blue"><?= $banners[15][0]->description ?></div></a></div>
</div>
</div>