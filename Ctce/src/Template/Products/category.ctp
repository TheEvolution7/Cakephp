<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<!-- Page Title Section Start -->
<div class="page-title-section section" data-bg-color="#f5f7fa">
    <div class="page-title">
        <div class="container">
            <h1 class="title"><?= $category->title ?></h1>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' =>'home']) ?>">Home</a></li>
                <li><?= $cat_parent->title  ?></li>
                <li class="current"><?= $category->title ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->

<!-- Course Section Start -->
<div class="section section-padding-bottom" data-bg-color="#f5f7fa">
    <div class="container">

        <!-- Courses Wrapper Start -->
        <div class="row row-cols-lg-2 row-cols-1 max-mb-n30">
        <?php foreach($products as $product): ?>
            <!-- Course Start -->
            <div class="col max-mb-30" data-aos="fade-up">
                <div class="course-3">
                    <div class="thumbnail">
                        <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$product->slug,$product->id]) ?>" class="image"><img src="<?= $this->Url->build('/uploads/products/'.$product->id . DS .$product->image ) ?>"
                                alt="<?= $product->title ?>"></a>
                    </div>
                    <div class="info">
                        <span class="price"><?= !empty($product->price) ? $product->currency.$product->price : '$0' ?><span>.00</span></span>
                        <h3 class="title"><a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$product->slug,$product->id]) ?>"><?= $product->title ?></a></h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="star-rating">
                                <span class="rating-active">ratings</span>
                            </span>
                            <span>263 Reviews</span>
                        </div>
                        <p class="meta"><?= $product->description ?></p>
                        <div class="group-btn">
                            <a href="#" class="btn btn-primary btn-hover-secondary">Add to Cart</a>
                            <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$product->slug,$product->id]) ?>" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course End -->
        <?php endforeach ?>
            

        </div>
        <!-- Courses Wrapper End -->

    </div>
</div>
<!-- Course Section End -->

<!-- CTA Section Start -->
<div class="cta-section section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="title">Master jQuery in a Short Period of Time</h2>
                    <div class="group-btn mb-3">
                        <a href="#" class="btn btn-primary btn-hover-secondary btn-width-180">Choose Your
                            Course</a>
                        <a href="#" class="btn btn-outline-primary btn-width-180">View Requirements</a>
                    </div>
                    <a class="link link-lg mb-3" href="#"><mark>Don't Like It? Get Your Money Back</mark></a>
                    <p>
                        Complete your continuing education to renew your MA CSL today. All of our courses can be
                        completed At Your Pace Online to help you meet the state's requirements to maintain your
                        license. Once you finish your class, we'll give you an official certificate of
                        completion to save for your records.
                    </p>

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

<!-- Course-3 Video Section Start -->
<div class="course-3-video-section section position-relative section-padding-top section-padding-bottom-160"
    data-bg-color="#f5f7fa">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Course-3 Me Video Wrapper Start -->
                <div class="course-3-video-wrapper course-3-one-video">

                    <!-- Course-3 Me Video Start -->
                    <a href="#" class="course-3-video video-popup" data-aos="fade-up">
                        <img class="image" src="<?= $webroot ?>assets/images/new/video.png" alt="">
                        <img class="icon" src="<?= $webroot ?>assets/images/icons/icon-youtube-play.png" alt="">
                    </a>
                    <!-- Course-3 Me Video End -->

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
                <!-- Course-3 Me Video Wrapper End -->
            </div>
            <div class="col-lg-6">
                <div class="course-3-content pl-60 pl-md-20 pl-sm-0 pl-xs-0 mt-sm-50 mt-xs-50">
                    <div class="course-slider swiper-container" data-aos="fade-up">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide brand">
                                <h2 class="title">Continuing Education Requirements to Renew a MA Construction
                                    Supervisor
                                    License</h2>
                                <p>If you’re a construction supervisor licensee in the state of Massachusetts,
                                    during
                                    each two-year renewal cycle you know that you need a certain number of
                                    continuing
                                    education hours.</p>
                                <p>A lot changed throughout 2020, due largely to the pandemic. Now, a lot of
                                    CSLs might
                                    be wondering where, exactly, their CE requirements stand. Here are the most
                                    current continuing education requirements for licensed Massachusetts
                                    construction
                                    supervisors.</p>
                            </div>

                            <div class="swiper-slide brand">
                                <h4>Hours required by license type</h4>
                                <p>Fortunately, you don’t need a huge number of CE hours during each renewal
                                    cycle, even
                                    if you have an unrestricted license. Here are the current requirements:</p>
                                <h5>Construction supervisor:</h5>
                                <ul>
                                    <li>12 hours</li>
                                </ul>
                                <h5>Construction supervisor restricted to one and two-family dwellings:</h5>
                                <ul>
                                    <li>10 hours</li>
                                </ul>
                                <h5>Speciality construction supervisor (e.g., licensed in masonry or
                                    insulation):</h5>
                                <ul>
                                    <li>6 hours</li>
                                </ul>

                                <p>Beyond that, your hours need to cover specific topics. Per Section R5.4.2,
                                    you need:
                                </p>
                                <ul>
                                    <li>4 hours of code review for unrestricted and restricted CS licenses, 2
                                        hours of
                                        code review for specialty CSLs</li>
                                    <li>1 hour on workplace safety</li>
                                    <li>1 hour on business practices and workers’ compensation</li>
                                    <li>1 hour on energy (unless you have a demolition specialty license)</li>
                                </ul>
                            </div>

                            <div class="swiper-slide brand">
                                <p>If it’s your <em>first renewal cycle</em>, you also need one hour on lead
                                    safe practices.
                                </p>
                                <p>If you have any remaining hours left over, you can take them in any approved
                                    elective.
                                    The best way to make sure your elective hours will count toward your renewal
                                    is to find
                                    a CE provider that’s approved by the state.</p>
                                <p>Do those requirements look familiar? If so, it’s because they haven’t
                                    changed. While the
                                    Massachusetts Board of Building Regulations Standards adjusted how licensees
                                    could get
                                    their hours during the pandemic, they didn’t change the total number of
                                    hours required.
                                </p>
                            </div>

                            <div class="swiper-slide brand">
                                <h4>In-person vs. online requirements</h4>
                                <p>Clearly, some things did shift for licensees as they renewed throughout 2020
                                    and 2021.
                                    Specifically, the state expanded their online CE hours approval.</p>
                                <p>For a while you could take all of your required Massachusetts CSL CE online.
                                    That’s
                                    because the COVID-induced state of emergency expired on June 15, 2021, but
                                    the state
                                    extended a 90-day grace period allowing licensees to complete their CE
                                    digitally through
                                    mid-September of 2021.</p>
                                <p>However, that extension date has passed and now there’s a cap on how many
                                    hours you can
                                    take online. Currently, licensees max out at six hours of online CE. So if
                                    you’re a
                                    specialty CSL, you’re good and can still knock out your CE digitally. But if
                                    you have a
                                    restricted CSL license, you’ll need to take four hours in-person. And if you
                                    have an
                                    unrestricted license, you’ll need to get half of your hours in a classroom.
                                </p>
                                <p>Still, though, taking what CE you can online can make meeting your renewal
                                    requirement a
                                    little easier and more convenient for you.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Course-3 Video Section End -->

<!-- Teacher Quote Section Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Teacher Quote Wrapper Start -->
        <div class="teacher-quote-wrapper" data-aos="fade-up">
            <!-- Teacher Quote Start -->
            <div class="teacher-quote">
                <div class="image"><img src="<?= $webroot ?>assets/images/new/b1.png" alt=""></div>
                <div class="content">
                    <div class="section-title">
                        <h2 class="title">Massachusetts State <span>Approval Letters</span></h2>
                    </div>
                    <ul>
                        <li>
                            Lorem ipsum dolor sit amet. <a href="#">(View PDF)</a>
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet. <a href="#">(View PDF)</a>
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet. <a href="#">(View PDF)</a>
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet. <a href="#">(View PDF)</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Teacher Quote End -->
        </div>
        <!-- Teacher Quote Wrapper End -->

    </div>
</div>
<!-- Teacher Quote Section End -->