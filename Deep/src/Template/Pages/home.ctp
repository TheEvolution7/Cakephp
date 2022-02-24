<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<!-- Banner Section Start -->
<div class="rs-banner style3 rs-rain-animate modify1"> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="banner-content text-center">
                    <!-- <h1 class="title"><?= $banners[9][0]->title ?></h1> -->
                    <p class="desc"><?= $banners[9][0]->description ?></p>
                    <ul class="banner-btn">
                        <li><a class="readon started" href="<?= $this->Url->build($banners[9][0]->url) ?>"><?= __('Learn More') ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> 
    <div class="scroll-down">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- Banner Section End -->


        
<!-- About Section Start -->
<div id="rs-about" class="rs-about pt-80 md-pt-70 pb-30 md-pb-40">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="sec-title mb-50">
                    <div class="sub-text style4-bg wow fadeInUp" data-wow-duration="1500ms"><?= $banners[10][0]->title ?></div>
                    <!-- <h2 class="title pb-20 wow fadeInUp" data-wow-duration="1500ms">
                        
                    </h2> -->
                    <div class="desc wow fadeInUp" data-wow-duration="1500ms">
                    <?= $banners[10][0]->description ?>
                    </div>
                    <div class="mt-25 wow fadeInUp" data-wow-duration="1500ms">
                        <a class="readon started mr-20" href="<?= $this->Url->build($banners[10][0]->url) ?>"><?= __('Learn More') ?></a>
                        <a class="readon started" href="https://buy.stripe.com/9AQ15ybxSeaRdmU14a"><?= __('Join') ?></a>
                    </div>    
                </div>
                <!-- Counter Section Start -->
                <div class="rs-counter style3">
                    <div class="container">
                        <div class="counter-top-area">
                            <div class="row">
                                <div class="col-sm-6 sm-pr-0 sm-pl-0 xs-mb-30">
                                    <div class="counter-list">
                                        <div class="counter-text wow fadeInUp" data-wow-duration="1500ms">
                                            <div class="count-number">
                                                <span class="rs-count plus orange-color"><?= $banners[10][1]->description ?></span>
                                            </div>
                                            <h3 class="title"><?= $banners[10][1]->title ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 sm-pr-0 sm-pl-0">
                                    <div class="counter-list">
                                        <div class="counter-text wow fadeInUp" data-wow-duration="1500ms">
                                            <div class="count-number">
                                                <span class="rs-count plus"><?= $banners[10][2]->description ?></span>
                                            </div>
                                            <h3 class="title"><?= $banners[10][2]->title ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- Counter Section End -->
            </div>
            <div class="col-lg-7">
                <!-- Services Section Start -->
                <div class="rs-services style3 md-pt-50 ani-bg-el">
                    <div class="el-bg">
                        <img src="<?= $webroot ?>images/new/ab/01.png" alt="" class="__1">
                    </div>
                    <div class="container">
                        <div class="row">
                       
                                <div class="col-md-6 pr-10 pt-40 sm-pt-0 sm-pr-0 sm-pl-0">
                                <?php foreach($banners[11] as $k =>  $banner): ?>
                                    <?php if($k %2 == 0): ?>
                                        <div class="services-item mb-20 wow fadeInUp" data-wow-duration="1500ms">
                                            <!-- <div class="services-icon">
                                                <div class="image-part">
                                                    <img class="main-img" src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                                                    <img class="hover-img" src="<?= $this->Url->build('/uploads/banners/'.$banners[12][$k]->id . DS . $banners[12][$k]->image) ?>" alt="<?= $banners[12][$k]->title ?>">
                                                </div>
                                            </div> -->
                                            <div class="services-content pt-0">
                                                <div class="services-text">
                                                    <h3 class="title"><a href="<?= $banner->url ?>"><?= $banner->title ?></a></h3>
                                                </div>
                                                <div class="services-desc">
                                                    <p>
                                                        <?= $banner->description ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                                </div>
                           
                                <div class="col-md-6 pl-10 sm-pr-0 sm-pl-0 sm-mt-20">
                                    <?php foreach($banners[11] as $k =>  $banner): ?>
                                        <?php if($k %2 != 0): ?>
                                            <div class="services-item gold-bg mb-20 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
                                                <!-- <div class="services-icon">
                                                    <div class="image-part">
                                                        <img class="main-img" src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                                                        <img class="hover-img" src="<?= $this->Url->build('/uploads/banners/'.$banners[12][$k]->id . DS . $banners[12][$k]->image) ?>" alt="<?= $banners[12][$k]->title ?>">
                                                    </div>
                                                </div> -->
                                                <div class="services-content pt-0">
                                                    <div class="services-text">
                                                        <h3 class="title"><a href="<?= $banner->url ?>"><?= $banner->title ?></a></h3>
                                                    </div>
                                                    <div class="services-desc">
                                                        <p>
                                                        <?= $banner->description ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach ?>    
                                </div>
                           
                        </div>
                    </div>
                </div>
                <!-- Services Section End -->
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->


<!-- Services Section Start -->
<div class="rs-services bg-section style3 ani-bg rs-rain-animate gray-color pt-40 pb-20 md-pt-30 md-pb-30">
    <!-- <div class="bg" style="background-image: url(<?= $webroot ?>images/bg-2.jpg);">
    </div> -->
    <!-- <div class="content bg-ani"></div> -->
    <div class="container">
        <div class="row md-mb-60">
            <div class="col-lg-6 mb-20 md-mb-10">
                <div class="ec-title md-center">
                    <div class="sec-title mb-40">
                        <div class="sub-text style4-bg left wow fadeInUp" data-wow-duration="1500ms"><?= $banners[13][0]->title ?></div>
                        <h2 class="title pb-20 wow fadeInUp" data-wow-duration="1500ms">
                            <?= $banners[13][0]->description ?>
                        </h2>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-6 mb-60 md-mb-0">
                <div class="btn-part text-right mt-60 md-mt-0 md-center wow fadeInUp" data-wow-duration="1500ms">
                    <a class="readon started" href="<?= $this->Url->build($banners[13][0]->url) ?>"><?= __('Learn More') ?></a>
                </div>
            </div> -->
        </div>
        <div class="row">
        <?php foreach($banners[14] as $k => $banner): ?>
            <div class="col-lg-4 col-md-6 mb-20 d-flex">
                <div class="services-item wow fadeInUp" data-wow-delay="100ms">
                    <!-- <div class="video-bg">
                        <video class="video-hover" muted loop src="<?= $webroot ?>video/<?= $k+1 ?>.mp4"></video>
                    </div> -->
                    <div class="services-icon">
                        <div class="image-part">
                            <img class="main-img" src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                            <img class="hover-img" src="<?= $this->Url->build('/uploads/banners/'.$banners[15][$k]->id . DS . $banners[15][$k]->image) ?>" alt="<?= $banners[15][$k]->title ?>">
                        </div>
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="title"><a href="<?= $banner->url ?>"> <?= $banner->title ?></a></h3>
                        </div>
                        <div class="services-desc">
                            <p>
                                <?= $banner->description ?>
                            </p>
                        </div>
                        <div class="serial-number">
                            0<?= $k+1 ?>
                        </div>
                    </div>
                </div> 
            </div>
        <?php endforeach ?> 
        </div>
    </div>
    
</div>
<!-- Services Section End -->

<!-- Choose Section Start -->
<div class="rs-why-choose pb-30 md-pb-40 pt-30 md-pt-40">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-6 mb-5 mb-md-0"> -->
                <!-- <div class="image-part wow fadeInUp" data-wow-duration="1500ms">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banners[16][0]->id . DS . $banners[16][0]->image) ?>" alt="<?= $banners[16][0]->title ?>">
                </div> -->
                <!-- <div class="animation style2">
                    <div class="top-shape">
                        <img class="dance" src="<?= $webroot ?>images/choose/dotted-2.png" alt="images">
                    </div>
                    <div class="bottom-shape">
                        <img class="dance2" src="<?= $webroot ?>images/choose/dotted-1.png" alt="images">
                    </div>
                </div>  -->
            <!-- </div> -->
            <div class="col-lg-12 d-flex align-items-center">
                <div>
                    <div class="sec-title mb-40">
                        <div class="sub-text style4-bg left wow fadeInUp" data-wow-duration="1500ms"><?= $banners[16][0]->title ?></div>
                        <!-- <h2 class="title pb-20 wow fadeInUp" data-wow-duration="1500ms">
                            <?= $banners[16][0]->title ?>
                        </h2> -->
                        <div class="desc wow fadeInUp" data-wow-duration="1500ms">
                        <?= $banners[16][0]->description ?>
                        </div>
                    </div>
                    <!-- <?php foreach($banners[17] as $banner): ?>
                        <div class="services-wrap mb-25 wow fadeInUp" data-wow-duration="1500ms">
                            <div class="services-icon">
                                <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">
                            </div>
                            <div class="services-text">
                                <h3 class="title"><a href="<?= $banner->url ?>"><?= $banner->title ?></a></h3>
                                <p class="services-txt"><?= $banner->description ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>    -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Choose Section End -->

<!-- Choose Section Start -->
<div class="rs-why-choose bg-section style2 gray-color rs-rain-animate pt-30 pb-50 md-pt-40 md-pb-40" id="membership">
    <!-- <div class="bg" style="background-image: url(<?= $webroot ?>images/bg-3.jpeg);">
    </div> -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sec-title mb-40">
                <div class="sub-text style4-bg left wow fadeInUp" data-wow-duration="1500ms"><?= $banners[18][0]->title ?></div>
                    <h2 class="title pb-20 wow fadeInUp" data-wow-duration="1500ms">
                        <?= $banners[18][0]->title ?>
                    </h2>
                    <div class="desc wow fadeInUp" data-wow-duration="1500ms">
                        <?= $banners[18][0]->description ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 md-mb-30">
                
                <div class="services-wrap mb-25 wow fadeInUp" data-wow-duration="1500ms">
                    <div class="services-icon">
                        <img src="<?= $webroot ?>images/choose/icons/style2/1.png" alt="">
                    </div>
                    <div class="services-text">
                        <h3 class="title"><a href="#"><?= $banners[18][1]->title ?></a></h3>
                        <p class="services-txt"><?= $banners[18][1]->description ?></p>
                    </div>
                </div>
                
                
            </div>
            <!-- <div class="col-xl-6 col-lg-6 md-mb-30">
                <div class="services-wrap mb-25 wow fadeInUp" data-wow-duration="1500ms">
                    <div class="services-icon">
                        <img src="<?= $webroot ?>images/choose/icons/style2/2.png" alt="">
                    </div>
                    <div class="services-text">
                        <h3 class="title"><a href="#"><?= $banners[19][1]->title ?></a></h3>
                        <p class="services-txt"> <?= $banners[19][1]->description ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 md-mb-30">
                <div class="services-wrap wow fadeInUp" data-wow-duration="1500ms">
                    <div class="services-icon">
                        <img src="<?= $webroot ?>images/choose/icons/style2/3.png" alt="">
                    </div>
                    <div class="services-text">
                        <h3 class="title"><a href="#"><?= $banners[19][2]->title ?></a></h3>
                        <p class="services-txt"><?= $banners[19][2]->description ?></p>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                <div id="chart"></div> 
            </div> -->
            <div class="col-12 mt-3 wow fadeInUp" data-wow-duration="1500ms">
                <div class="rs-contact mod1">
                    <div class="contact-wrap">
                        <div class="content-part mb-25">
                            <h2 class="title mb-15"><?= $banners[2][0]->title ?></h2>
                            <p class="desc"><?= $banners[2][0]->description ?></p>
                        </div>
                        <div id="form-messages"></div>
                        <form method="post" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 mb-15 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="name" name="name" placeholder="<?= __('Name') ?>" required>
                                    </div> 
                                    <div class="col-lg-12 mb-15 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="email" name="email" placeholder="<?= __('E-Mail') ?>" required>
                                    </div>   
                                    <div class="col-lg-12 mb-15 col-md-6 col-sm-6">
                                        <textarea class="from-control" name="content" placeholder="<?= __('Your request has been sent and you will receive a reply shortly') ?>" cols="30" rows="5"></textarea>
                                    </div>  
                                </div>
                                <div class="form-group mb-0">
                                    <button class="submit-btn orange-btn" type="submit"><?= __('Join') ?></button>
                                </div>
                            </fieldset>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Choose Section End -->
