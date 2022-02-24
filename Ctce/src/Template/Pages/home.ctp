<?php 
    use Cake\I18n\Number;
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<!-- Slider/Intro Section Start -->
 <div class="intro2-section section">

<div class="container">
    <div class="row row-cols-lg-2 row-cols-1 max-mb-n30">

        <!-- Intro One Content Start -->
        <div class="col align-self-center max-mb-30" data-aos="fade-up">
            <div class="intro2-content text-center text-md-start">
                <span class="sub-title"><?= $banners[6][0]->title ?></span>
                <h2 class="title"><?= $banners[6][1]->title ?></h2>
                <div class="desc">
                    <p><?= $banners[6][1]->description ?></p>
                </div>
                <a href="<?= $banners[6][2]->url ?>" class="btn btn-primary btn-hover-secondary text-capitalize"></i><?= $banners[6][2]->title ?></a>
                <a class="link link-lg" href="<?= $banners[6][0]->title ?>"> <?= $banners[6][3]->url ?> <mark><?= $banners[6][3]->description ?> <i
                            class="far fa-long-arrow-right"></i></mark></a>
            </div>
        </div>
        <!-- Intro One Content End -->

        <!-- Intro One Course Start -->
        <div class="col max-mb-30" data-aos="fade-up">
            <div class="contact-image intro2-image">
                <img src="<?= $this->Url->build('/uploads/banners/'.$banners[6][1]->id .DS.$banners[6][1]->image) ?>" alt="<?= $banners[6][1]->title ?>">

                <!-- Animation Shape Start -->
                <div class="shape shape-1 scene">
                    <span data-depth="3">
                        <img src="<?= $webroot ?>assets/images/shape-animation/about-shape-1.png" alt="">
                    </span>
                </div>
                <div class="shape shape-2 scene">
                    <span data-depth="-3"><img src="<?= $webroot ?>assets/images/shape-animation/about-shape-1.png"
                            alt=""></span>
                </div>
                <div class="shape shape-3 scene">
                    <span data-depth="4">shape 3</span>
                </div>
                <div class="shape shape-4 scene">
                    <span data-depth="4"><img src="<?= $webroot ?>assets/images/shape-animation/shape-1.png" alt=""></span>
                </div>
                <div class="shape shape-5 scene">
                    <span data-depth="4"><img src="<?= $webroot ?>assets/images/shape-animation/nwesletter-shape-2.png"
                            alt=""></span>
                </div>
                <!-- Animation Shape End -->
            </div>
        </div>
        <!-- Intro One Course End -->

    </div>
</div>

</div>
<!-- Slider/Intro Section End -->

<!-- Brand Section Start -->
<div class="brand-section section section-padding">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="brand-wrapper">
                <div class="brand-list">
                    <div class="brand-carousel swiper-container" data-aos="fade-up">
                        <div class="swiper-wrapper">
                        <?php foreach($banners[7] as $banner): ?>
                            <div class="swiper-slide brand">
                                <a href="<?= $banner->url ?>">
                                    <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id .DS.$banner->image) ?>" alt="<?= $banner->title ?>">
                                </a>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Brand Section End -->

<!-- Course Section Start -->
<div class="section section-padding" data-bg-color="#f5f7fa">
<div class="container">

    <!-- Section Title Start -->
    <div class="section-title text-center" data-aos="fade-up">
        <span class="sub-title"><?= $banners[8][0]->title ?></span>
        <h2 class="title"><?= $banners[8][0]->description ?></h2>
    </div>
    <!-- Section Title End -->

    <!-- Courses Wrapper Start -->
    <div class="row row-cols-lg-2 row-cols-1 max-mb-n30">
        <?php foreach ($products as $product): ?>
            <div class="col max-mb-30" data-aos="fade-up">
                <div class="course-3">
                    <div class="thumbnail">
                        <a href="#" class="image"><img src="<?= $this->Url->build('/uploads/products/' . $product->id . DS . $product->image) ?>"
                                alt="<?= $product->title ?>"></a>
                    </div>
                    <div class="info">
                        <span class="price"><?= $this->Number->currency($product->price, 'USD'); ?></span>
                        <h3 class="title"><a href="#"><?= $product->title ?></a></h3>
                        <!-- <div class="d-flex justify-content-between align-items-center">
                            <span class="star-rating">
                                <span class="rating-active">ratings</span>
                            </span>
                            <span>263 Reviews</span>
                        </div> -->
                        <ul class="meta">
                            <?= $product->description ?>
                        </ul>
                        <div class="group-btn d-flex flex-wrap justify-content-center">
                            <?= $this->Form->postLink(
                                'Add to cart',
                                ['controller' => 'Carts', 'action' => 'addToCart', $product->id],
                                ['class' => 'btn btn-primary btn-hover-secondary mb-1 mb-xs-0 me-sm-2'])
                            ?>
                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'details', $product->id]) ?>" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!-- Courses Wrapper End -->

    <div class="row max-mt-50">
        <div class="col text-center">
            <a href="#" class="btn btn-primary btn-hover-secondary"> View all courses <i
                    class="far fa-long-arrow-right ms-3"></i></a>
        </div>
    </div>

</div>
</div>
<!-- Course Section End -->

<!-- Learners Section Start -->
<div class="learners-section section section-padding">
<div class="container">
    <!-- Section Title Start -->
    <div class="section-title text-center" data-aos="fade-up">
        <span class="sub-title">Lorem ipsum dolor sit amet.</span>
        <h2 class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, animi!</h2>
    </div>
    <!-- Section Title End -->

    <!-- Feature Wrapper Start -->
    <div class="row row-30 row-cols-xl-4 row-cols-sm-2 row-cols-1 max-mb-n30">
    <?php foreach($banners[10] as $banner): ?>
        <!-- Feature Start (Icon Box) -->
        <div class="col d-flex max-mb-30" data-aos="fade-up">
            <a href="<?= $banner->url ?>" class="icon-box icon-box-left text-left">
                <div class="icon">
                    <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id .DS.$banner->image) ?>" alt="<?= $banner->title ?>">
                </div>
                <div class="content">
                    <h3 class="title"><?= $banner->title ?></h3>
                    <div class="desc">
                        <p><?= $banner->description ?></p>
                    </div>
                </div>
            </a>
        </div>
        <!-- Feature Start (Icon Box) -->
    <?php endforeach ?>
        

    </div>
    <!-- Feature Wrapper End -->
</div>
</div>
<!-- Learners Section End -->

<!-- About Video Section Start -->
<div class="about-video-section section position-relative section-padding-top section-padding-bottom-160">

<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-7">
            <!-- About Me Video Wrapper Start -->
            <div class="about-me-video-wrapper about-us-one-video">

                <!-- About Me Video Start -->
                <a href="<?= $banners[11][2]->url ?>" class="about-me-video video-popup" data-aos="fade-up">
                    <img class="image" src="<?= $this->Url->build('/uploads/banners/'.$banners[11][0]->id .DS.$banners[11][0]->image) ?>" alt="<?= $banners[11][0]->title ?>">
                    <img class="icon" src="<?= $webroot ?>assets/images/icons/icon-youtube-play.png" alt="">
                </a>
                <!-- About Me Video End -->

                <!-- Animation Shape Start -->
                <div class="shape shape-1 scene">
                    <span data-depth="3">
                        <img src="<?= $webroot ?>assets/images/shape-animation/shape-2.svg" alt="" class="svgInject">
                    </span>
                </div>
                <div class="shape shape-2 scene">
                    <span data-depth="-3"><img src="<?= $webroot ?>assets/images/shape-animation/shape-3.png"
                            alt=""></span>
                </div>
                <div class="shape shape-3 scene">
                    <span data-depth="4">shape 3</span>
                </div>
                <div class="shape shape-4 scene">
                    <span data-depth="4"><img src="<?= $webroot ?>assets/images/shape-animation/shape-1.png" alt=""></span>
                </div>
                <!-- Animation Shape End -->

            </div>
            <!-- About Me Video Wrapper End -->
        </div>

        <div class="col-lg-4">
            <div class="about-content max-width-100 pl-60 pl-md-20 pl-sm-0 pl-xs-0 mt-sm-50 mt-xs-50">
                <span class="sub-title"><?= $banners[11][0]->title ?></span>
                <h2 class="title"><?= $banners[11][1]->title ?></h2>
                <p><?= $banners[11][1]->description ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Section Bottom Shape Start -->
<div class="section-bottom-shape-two">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" height="315">
        <path class="elementor-shape-fill" d="M 50 0 S75 0 100 100 L100 0"></path>
    </svg>
</div>
<!-- Section Bottom Shape End -->

</div>
<!-- About Video Section End -->

<!-- CTA Section Start -->
<div class="cta-section section section-padding" data-bg-color="#f8f8f8">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="cta-content text-center">
                <span class="sub-title"><?= $banners[12][0]->title ?></span>
                <h2 class="title"><?= $banners[12][0]->description ?></h2>
                <a href="<?= $banners[12][1]->url ?>" class="btn btn-primary btn-hover-secondary btn-width-300"><?= $banners[12][1]->title ?></a>

                <!-- Animation Shape Start -->
                <div class="shape shape-1 scene">
                    <span data-depth="4">shape 1</span>
                </div>
                <div class="shape shape-2 scene">
                    <span data-depth="4"><img src="<?= $webroot ?>assets/images/shape-animation/cta-shape-01.png"
                            alt=""></span>
                </div>
                <div class="shape shape-3 scene">
                    <span data-depth="4"><img src="<?= $webroot ?>assets/images/shape-animation/nwesletter-shape-2.png"
                            alt=""></span>
                </div>
                <!-- Animation Shape End -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- CTA Section End -->

<!-- Newsletter Section Start -->
<div class="newsletter-section section section-padding position-relative">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="newsletter-content">
                <h2 class="title"><?= $banners[13][0]->title ?></h2>
                <p><?= $banners[13][0]->description ?></p>
                <div class="newsletter-form">
                    <form action="<?= $this->Url->build(['controller' => 'Pages','action' => 'newsletter']) ?>" method="post">
                        <input type="email" placeholder="Your E-mail" name="email" required>
                        <button class="btn btn-primary btn-hover-secondary" type="submit"><?= __('Subscribe') ?></button>
                    </form>
                </div>

                <!-- Animation Shape Start -->
                <div class="shape shape-1 scene">
                    <span data-depth="4">shape 3</span>
                </div>
                <div class="shape shape-2 scene">
                    <span data-depth="4"><img src="<?= $webroot ?>assets/images/shape-animation/nwesletter-shape-1.png"
                            alt=""></span>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- Newsletter Section End -->