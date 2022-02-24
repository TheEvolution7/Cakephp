<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?>
 <main class="main-content">
      <!--== Start Page Title Area ==-->
 
<section class="page-title-area">
  <div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="page-title-content">
        <h2 class="title">How It Words</h2>
            <div class="bread-crumbs">
              <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
              <span class="active">How It Words</span>
            </div>
        </div>
    </div>
    </div>
  </div>
</section>
      <!--== End Page Title Area ==-->

      <!--== Start Video Divider Area Wrapper ==-->
      <div class="divider-area divider-about-area">
        <div class="parallax-container js-text-parallax">
          <div class="fx-wrap" data-x="200">
            <h3 class="fx-target"><?= $banners[10][0]->title ?></h3>
          </div>
        </div>
        <div class="container-fluid xs-pr-15 xs-pl-15 p-0">
          <div class="row">
            <div class="col-md-12">
              <div class="divider-about-content">
                <div class="divider-content" data-aos="fade-up" data-aos-duration="1000">
                  <span><?= $banners[10][1]->title ?></span>
                  <img class="logo-divider" src="<?= $this->Url->build('/uploads/banners/'.$banners[2][0]->id . DS . $banners[2][0]->image) ?>" alt="<?= $banners[2][0]->title ?>">
                  <p><?= $banners[10][1]->description ?></p>
                  <a href="<?= $banners[10][1]->url ?>" class="btn-theme btn-black btn-border">Read more</a>
                </div>
                <div class="video-content" data-aos="fade-up" data-aos-duration="1000">
                  <div class="thumb">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banners[10][1]->id . DS . $banners[10][1]->image) ?>" alt="<?= $banners[10][1]->title ?>">
                    <a class="btn-play play-video-popup" href="<?= $banners[10][0]->url ?>">
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

      <!--== Start Featured Area Wrapper ==-->
      <section class="featured-area _2">
        <div class="parallax-container js-text-parallax">
          <div class="fx-wrap fx-section-2" data-x="-200">
            <h3 class="fx-target"><?= $banners[11][0]->title ?> </h3>
          </div>
        </div>
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
          <div class="row">
            <div class="col-md-8 col-lg-6 m-auto">
              <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="title"><?= $banners[11][0]->title ?></h2>
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-duration="1200">
            <div class="col-md-12">
              <div class="featured-content">
                <div class="swiper-container featured-swiper">
                  <div class="swiper-wrapper">
                  <?php foreach($banners[12] as $banner): ?>
                    <div class="swiper-slide">
                      <!-- Start Slide Item -->
                      <div class="slider-item">
                        <div class="featured-item">
                          <div class="content">
                            <span class="icon">
                              <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                            </span>
                            <div class="inner-content">
                              <p><?= $banner->title ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Slide Item -->
                    </div>
                  <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Featured Area Wrapper ==-->

      <!--== Start Social Network Area Wrapper ==-->
      <section class="social-area social-style1-area">
        <div class="parallax-container js-text-parallax">
          <div class="fx-wrap fx-wrap-2" data-x="200">
            <h3 class="fx-target"><?= $banners[13][0]->title ?> </h3>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 m-auto">
              <div class="section-title text-center">
                <h2 class="title"><?= $banners[13][0]->description ?></h2>
              </div>
            </div>
          </div>
          <div class="row row-gutter-70 social-items-style1">
            <div class="col-lg-7">
              <div class="social-item">
                <div class="thumb">
                  <img src="<?= $this->Url->build('/uploads/banners/'.$banners[13][1]->id . DS . $banners[13][1]->image) ?>" alt="<?= $banners[13][1]->title ?>">
                </div>
                <div class="content">
                  <div class="inner-content">
                    <h4 class="title"><?= $banners[13][1]->title ?></h4>
                    <p><?= $banners[13][1]->description ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="social-item item-style2">
                <div class="thumb">
                  <img src="<?= $this->Url->build('/uploads/banners/'.$banners[13][2]->id . DS . $banners[13][2]->image) ?>" alt="<?= $banners[13][2]->title ?>">
                </div>
                <div class="content">
                  <div class="inner-content">
                    <h4 class="title"><?= $banners[13][2]->title ?></h4>
                    <p><?= $banners[13][2]->description ?></p>
                  </div>
                </div>
              </div>
              <div class="social-item item-style2">
                <div class="thumb">
                  <img src="<?= $this->Url->build('/uploads/banners/'.$banners[13][3]->id . DS . $banners[13][3]->image) ?>" alt="<?= $banners[13][3]->title ?>">
                </div>
                <div class="content">
                  <div class="inner-content">
                    <h4 class="title"><?= $banners[13][3]->title ?></h4>
                    <p><?= $banners[13][3]->description ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Social Network Area Wrapper ==-->

      <!--== Start Team Area Wrapper ==-->
    <section class="team-area team-creative-area">
      <div class="parallax-container js-text-parallax">
        <div class="fx-wrap" data-x="-200">
          <h3 class="fx-target"><?= $banners[14][0]->title ?></h3>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title text-center">
              <h2 class="title"><?= $banners[14][0]->description ?></h2>
            </div>
          </div>
        </div>
        <div class="row team-members-style2 row-gutter-60">
        <?php foreach($banners[15] as $banner): ?>
          <div class="col-sm-6 col-md-4">
            <div class="team-member">
              <div class="thumb">
                <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
              </div>
              <div class="content">
                <div class="member-info">
                  <h4 class="name"><?= $banner->title ?></h4>
                  <p><?= $banner->description ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        </div>
      </div>
    </section>
    <!--== End Team Area Wrapper ==-->

    </main>