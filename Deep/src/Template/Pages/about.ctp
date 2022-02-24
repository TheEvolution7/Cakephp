<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-inner text-center">
        <h1 class="page-title"><?= __('About Us') ?></h1>
        <ul>
            <li title="">
                <a class="active" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><?= __('Home') ?></a>
            </li>
            <li><?= __('About Us') ?></li>
        </ul>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- About Section Start -->
<div class="rs-about gray-color pt-80 pb-80 md-pt-60 md-pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pb-80 md-pb-70 md-pb-40 wow fadeInUp" data-wow-duration="1500ms">
                <!-- <div class="rs-animation-shape">
                    <div class="images">
                        <img src="<?= $this->Url->build('/uploads/banners/'.$banners[21][0]->id . DS . $banners[21][0]->image) ?>" alt="<?= $banners[21][0]->title ?>"> 
                    </div>
                </div> -->
                <div id="rs-faq" class="rs-faq">
                    <div class="contact-wrap">
                        <div class="sec-title mb-30">
                            <div class="sub-text style4-bg wow fadeInUp" data-wow-duration="1500ms"><?= $banners[22][0]->description ?></div> 
                        </div>
                    </div>
                    <div class="row">
                       
                       <div class="col-lg-12">
                           <div class="faq-content">
                               <div id="accordion" class="accordion">
                                <?php foreach($banners[23] as $k => $banner): ?>
                                    
                                    <div class="card wow fadeInUp" data-wow-duration="1500ms">
                                        <div class="card-header">
                                            <a class="card-link <?= $k != 0  ? 'collapsed' : null  ?>" data-toggle="collapse" href="#collapse-<?= $k+1 ?>"><?= $banner->title ?></a>
                                        </div>
                                        <div id="collapse-<?= $k+1 ?>" class="collapse <?= $k == 0  ? 'show' : null  ?>" data-parent="#accordion">
                                            <div class="card-body">
                                                <?= $banner->description ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                  
                               </div>
                           </div>
                       </div>  
                    </div>
            </div>

            </div>
            <div class="col-lg-12">
                <div class="contact-wrap">
                    <div class="sec-title mb-0 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="sub-text style4-bg wow fadeInUp" data-wow-duration="1500ms"><?= $banners[21][0]->title ?></div>     
                        <div class="desc pb-5 wow fadeInUp" data-wow-duration="1500ms"><?= $banners[21][0]->description ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- About Section End -->



<!-- Choose Section End -->

<!-- Services Section Start -->
<!-- <div class="rs-services main-home style2 pt-80 pb-80 md-pt-60 md-pb-60">
    <div class="container">
        <div class="sec-title text-center mb-45">
            <span class="sub-text style4-bg wow fadeInUp" data-wow-duration="1500ms"><?= $banners[24][0]->title ?></span>
            <h2 class="title white-color wow fadeInUp" data-wow-duration="1500ms">
                <?= $banners[24][0]->description ?>
            </h2>
        </div>
        <div class="row">
        <?php foreach($banners[25] as $k => $banner): ?>
            <div class="col-lg-4 col-md-4 md-mb-30 wow fadeInUp" data-wow-duration="1500ms">
                <div class="services-item">
                    <div class="video-bg">
                        <video class="video-hover" muted="" loop="" src="<?= $webroot ?>video/<?= $banner->url ?>.mp4"></video>
                    </div>
                    <div class="services-icon">
                        <div class="image-part">
                            <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>">                                      
                        </div>
                    </div>
                    <div class="shape-part">
                        <img class="move-y" src="<?= $webroot ?>images/services/shape.png" alt="">
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="services-title"><?= $banner->title ?></h3>
                        </div>
                        <div class="services-desc">
                            <p>
                                <?= $banner->description ?>
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
        <?php endforeach ?>    
           
        </div>
    </div>
</div> -->
<!-- Services Section End -->

<!-- Team Section Start -->
<!-- <div class="rs-team pt-120 pb-80 md-pt-80 md-pb-60 xs-pb-54"> 
    <div class="sec-title text-center mb-30">
        <span class="sub-text style4-bg wow fadeInUp" data-wow-duration="1500ms"><?= $banners[20][0]->title ?></span>
        <h2 class="title white-color wow fadeInUp" data-wow-duration="1500ms">
            <?= $banners[20][0]->description ?>
        </h2>
    </div>               
    <div class="container wow fadeInUp" data-wow-duration="1500ms">
        <div class="container"> 
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
            <?php foreach($banners[26] as $banner): ?> 
                    <div class="team-item-wrap">
                        <div class="team-wrap">
                            <div class="image-inner">
                                <a href="<?= $banner->url ?>"><img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>"></a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4 class="person-name"><a href="<?= $banner->url ?>"><?= $banner->title ?></a></h4>
                            <span class="designation"><?= $banner->description ?></span>
                            <ul class="team-social">
                                <li><a href="<?= $banner->facebook ?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?= $banner->instagram ?>"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="<?= $banner->twitter ?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?= $banner->pinterest ?>"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
            <?php endforeach ?>
        </div>
    </div> 
</div> -->
<!-- Team Section End -->

<!-- Process Section Start -->
<!-- 
    
 -->
<!-- Process Section End -->





<!-- Choose Section Start -->
<div class="rs-why-choose bg-section style2 gray-color rs-rain-animate pt-80 pb-50 md-pt-70 md-pb-40" id="membership">
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
            <div class="col-12 mt-5 wow fadeInUp" data-wow-duration="1500ms">
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
