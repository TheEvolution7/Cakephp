<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?>
<main class="main-content">
      <!--== Start Hero Area Wrapper ==-->
      <section class="home-slider-area slider-default">
        <div class="home-slider-content">
          <div class="swiper-container home-slider-container">
            <div class="swiper-wrapper">
            <?php foreach($banners[5] as $banner): ?>
              <div class="swiper-slide">
                <!-- Start Slide Item -->
                <div class="home-slider-item">
                  <div class="bg-thumb bg-overlay bg-img" data-bg-img="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>"></div>
                  <div class="slider-content-area">
                    <div class="container">
                      <div class="row align-items-center">
                        <div class="col-md-8 col-lg-5 m-auto">
                          <div class="content">
                            <div class="inner-content">
                              <h2><?= $banner->title ?></h2>
                              <p><?= $banner->description ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Slide Item -->
              </div>
            <?php endforeach ?> 
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <!--== End Hero Area Wrapper ==-->

      <!--== Start Video Divider Area Wrapper ==-->
      <div class="divider-area divider-about-area">
        <div class="parallax-container js-text-parallax">
          <div class="fx-wrap" data-x="200">
            <h3 class="fx-target"><?= $banners[6][1]->title ?></h3>
          </div>
        </div>
        <div class="container-fluid xs-pr-15 xs-pl-15 p-0">
          <div class="row">
            <div class="col-md-12">
              <div class="divider-about-content">
                <div class="divider-content" data-aos="fade-up" data-aos-duration="1000">
                  <span><?= $banners[6][0]->title ?></span>
                  <img class="logo-divider" src="<?= $this->Url->build('/uploads/banners/'.$banners[2][0]->id . DS . $banners[2][0]->image) ?>" alt="<?= $banners[2][0]->title ?>">
                  <p><?= $banners[6][0]->description ?></p>
                  <a href="<?= $banners[6][0]->url ?>" class="btn-theme btn-black btn-border">Read more</a>
                </div>
                <div class="video-content" data-aos="fade-up" data-aos-duration="1000">
                  <div class="thumb">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banners[6][0]->id . DS . $banners[6][0]->image) ?>" alt="<?= $banners[6][0]->title ?>">
                    <a class="btn-play play-video-popup" href="<?= $banners[6][1]->url ?>">
                      <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="110" height="110" fill="none"
                        viewBox="0 0 110 110">
                        <circle cx="55" cy="55" r="54" stroke="currentColor" stroke-width="2" fill="none"></circle>
                        <path stroke="currentColor" stroke-width="2" d="M43.5 35.081L78 55 43.5 74.919V35.08z"
                          fill="none"></path>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Video Divider Area Wrapper ==-->
      


      <!--== Start Products Area Wrapper ==-->
      <section class="product-area new-product-area">
        <div class="parallax-container js-text-parallax">
          <div class="fx-wrap fx-section-2" data-x="200">
            <h3 class="fx-target"><?= $banners[4][0]->title ?></h3>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-lg-6 m-auto">
              <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="title"><?= $banners[4][0]->title ?></h2>
                <h5 class="subtitle"><?= $banners[4][0]->description ?></h5>
              </div>
            </div>
          </div>
          <div class="row row-gutter-60" data-aos="fade-up" data-aos-duration="1000">
          <?php foreach($product_home as $product): ?>
            <div class="col-sm-6 col-lg-4">
              <!-- Start Product Item -->
              <div class="product-item hover-effect effect-style1">
                <div class="product-thumb">
                  <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$product->slug,$product->id]) ?>">
                    <img src="<?= $this->Url->build('/uploads/products/'.$product->id.'/'.$product->image) ?>" alt="<?= $product->title ?>">
                    <span class="thumb-overlay"></span>
                    <div class="effect-content"></div>
                  </a>
                </div>
                <div class="product-info">
                  <div class="content-inner">
                    <h4 class="title"><a href="#"><?= $product->title ?></a></h4>
                    <div class="prices">
                      <span class="price"><?= $this->getConfigure('Core')['setting']['currency'],$product->price ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Product Item -->
            </div>
          <?php endforeach ?>
            <div class="col-md-12 text-center">
              <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'category','women-s-2']) ?>" class="btn-theme btn-primary btn-border btn-padding mt-20">View more</a>
            </div>
          </div>
        </div>
      </section>
      <!--== End Products Area Wrapper ==-->
      


     

      <!--== Start Featured Area Wrapper ==-->
      <section class="brand-logo-area brand-logo-style1-area">
      <div class="parallax-container js-text-parallax">
        <div class="fx-wrap fx-section-2" data-x="200">
          <h3 class="fx-target"><?= $banners[7][0]->title ?></h3>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-6 m-auto">
            <div class="section-title text-center">
              <h2 class="title"><?= $banners[7][0]->title ?></h2>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="swiper-container brand-logo-slider-container">
              <div class="swiper-wrapper brand-logo-slider">
              <?php foreach($banners[8] as $banner): ?>
                <div class="swiper-slide">
                    <div class="brand-logo-item">
                      <a href="<?= $banner->url ?>"><img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>"></a>
                    </div>
                  </div>
              <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </main>