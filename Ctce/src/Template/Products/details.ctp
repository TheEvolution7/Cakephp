<?php 
    use Cake\I18n\Number;
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<!-- Page Title Section Start -->
<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h1 class="title"><?= $product->title ?></h1>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' =>'home']) ?>">Home</a></li>
                <li class="current"><?= $product->title ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->

<!-- Course Details Section Start -->
<div class="section">
    <div class="container">
        <div class="row max-mb-n50">

            <div class="col-lg-8 col-12 order-lg-1 max-mb-50">
                <!-- Course Details Wrapper Start -->
                <div class="course-details-wrapper">
                    <div class="course-nav-tab">
                        <ul class="nav">
                            <li><a class="active" data-bs-toggle="tab" href="#overview">Overview</a></li>
                            <!-- <li><a data-bs-toggle="tab" href="#curriculum">Curriculum</a></li> -->
                            <li><a data-bs-toggle="tab" href="#instructor">Instructor</a></li>
                            <!-- <li><a data-bs-toggle="tab" href="#reviews">Reviews</a></li> -->
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade show active">
                            <div class="course-overview">
                                <h3 class="title">Course Description</h3>
                                <?= $product->content ?>

                            </div>
                        </div>

                        <div id="curriculum" class="tab-pane fade">
                            <div class="course-curriculum">
                                <ul class="curriculum-sections">
                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">

                                                <h5 class="title">Specialty CSL CE Course</h5>
                                                <p class="section-desc">Massachusetts Building Code, 9th Edition [4 Activities]</p>

                                            </div>
                                        </div>
                                        <ul class="section-content">

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">01. 9th Edition of the Massachusetts State Building Code</span>
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">02. Transition of the Residential Code from the 8th to the 9th Edition; Chapters 1 and 3</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">03. Transition of the Residential Code from the 8th to the 9th Edition, Chapters 4-10</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">04. Residential Code, 8th to 9th Edition, Chapters 11-43 & Transition of the Commercial Code from the 8th to the 9th Edition</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">

                                                <h5 class="title">Specialty CSL CE Course</h5>
                                                <p class="section-desc">OSHA [7 Activities]</p>

                                            </div>
                                        </div>
                                        <ul class="section-content">

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">01. Introduction (Video)</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">02. OSHA  Overview</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">03. Job-Site Safety</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">04. General Safety Practices</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">05. Construction-Specific Safety Practices</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">06. Construction-Specific Safety Practices, Continued</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">07. Focus Four</span>
                                                    
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>

                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">

                                                <h5 class="title">Specialty CSL CE Course</h5>
                                                <p class="section-desc">2018 Energy Code [4 Activities]</p>

                                            </div>
                                        </div>
                                        <ul class="section-content">

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">01. The 2018 Energy Code of Massachusetts </span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">02. Massachusetts Adoption of the 2018 International Energy Efficiency Code (IECC)</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">03. Commercial Energy Efficiency Amendments</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">04. End of the Class</span>
                                                    
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">

                                                <h5 class="title">Specialty CSL CE Course</h5>
                                                <p class="section-desc">Masonry [8 Activities]</p>

                                            </div>
                                        </div>
                                        <ul class="section-content">

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">01. Common Terms for Masonry </span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">02. Laying Brick and Block</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">03. Basic Operations for Brick and Block</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">04. Introduction to Brick Walls</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">05. Types of Brick Walls</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">06. Cleaning Brick</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">07. Concrete Block</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">08. Types of Concrete Masonry Walls</span>
                                                    
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">

                                                <h5 class="title">Course Completion</h5>

                                            </div>
                                        </div>
                                        <ul class="section-content">

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">BBRS Questionnaire</span>
                                                    
                                                </a>
                                            </li>

                                            <li class="course-item">
                                                <a class="section-item-link lesson" href="JavaScript:Void(0);">
                                                    <span class="item-name">Certificate of Completion</span>
                                                    
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="instructor" class="tab-pane fade">
                            <div class="course-instructor">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-image">
                                            <div class="thumb-img">
                                                <img src="<?= $this->Url->build('/uploads/users/' . $product->user->id . DS . $product->user->image) ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="profile-info">
                                            <h5><a href="profile.html"><?= $product->user->full_name ?></a></h5>
                                            <!-- <div class="author-career">/Advanced Educator</div> -->
                                            <p class="author-bio"><?= $product->user->description ?></p>

                                            <ul class="author-social-networks">
                                                <li class="item">
                                                    <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-twitter social-link-icon"></i> </a>
                                                </li>
                                                <li class="item">
                                                    <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-facebook-f social-link-icon"></i> </a>
                                                </li>
                                                <li class="item">
                                                    <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-instagram social-link-icon"></i> </a>
                                                </li>
                                                <li class="item">
                                                    <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-pinterest social-link-icon"></i> </a>
                                                </li>
                                                <li class="item">
                                                    <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-youtube social-link-icon"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="reviews" class="tab-pane fade">
                            <div class="course-reviews">
                                <div class="course-rating">
                                    <h3 class="title">Reviews</h3>
                                    <div class="course-rating-content">
                                        <div class="average-rating">
                                            <p class="rating-title secondary-color">Average Rating</p>
                                            <div class="rating-box">
                                                <div class="average-value primary-color">
                                                    4.7
                                                </div>
                                                <div class="review-star">
                                                    <div class="tm-star-rating">
                                                        <span class="fas fa-star"></span>
                                                        <span class="fas fa-star"></span>
                                                        <span class="fas fa-star"></span>
                                                        <span class="fas fa-star"></span>
                                                        <span class="fas fa-star-half-alt"></span>
                                                    </div>
                                                </div>
                                                <div class="review-amount">
                                                    (263 reviews)
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detailed-rating">
                                            <p class="rating-title secondary-color">Detailed Rating</p>
                                            <div class="rating-box">
                                                <div class="rating-rated-item">
                                                    <div class="rating-point">
                                                        <div class="tm-star-rating">
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div class="single-progress-bar">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-count">1</div>
                                                </div>

                                                <div class="rating-rated-item">
                                                    <div class="rating-point">
                                                        <div class="tm-star-rating">
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div class="single-progress-bar">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-count">1</div>
                                                </div>

                                                <div class="rating-rated-item">
                                                    <div class="rating-point">
                                                        <div class="tm-star-rating">
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div class="single-progress-bar">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-count">0</div>
                                                </div>

                                                <div class="rating-rated-item">
                                                    <div class="rating-point">
                                                        <div class="tm-star-rating">
                                                            <span class="fas fa-star"></span>
                                                            <span class="fas fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div class="single-progress-bar">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-count">0</div>
                                                </div>

                                                <div class="rating-rated-item">
                                                    <div class="rating-point">
                                                        <div class="tm-star-rating">
                                                            <span class="fas fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div class="single-progress-bar">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rating-count">0</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-reviews-area">
                                    <ul class="course-reviews-list">
                                        <li class="review">
                                            <div class="review-container">
                                                <div class="review-author">
                                                    <img src="<?= $webroot ?>assets/images/new/user-3.jpg" alt="author">
                                                </div>
                                                <div class="review-content">
                                                    <h4 class="title">ednawatson</h4>
                                                    <div class="review-stars-rated" title="5 out of 5 stars">
                                                        <div class="review-stars empty"></div>
                                                    </div>
                                                    <h5 class="review-title">Cover all my needs </h5>
                                                    <div class="review-text">
                                                        The course identify things we want to change and then figure out the things that need to be done to create the desired outcome. The course helped me in clearly define problems and generate a wider variety of quality solutions. Support more structures analysis of options leading to better decisions.
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="review">
                                            <div class="review-container">
                                                <div class="review-author">
                                                    <img src="<?= $webroot ?>assets/images/new/user-4.jpg" alt="author">
                                                </div>
                                                <div class="review-content">
                                                    <h4 class="title">Owen Christ</h4>
                                                    <div class="review-stars-rated" title="5 out of 5 stars">
                                                        <div class="review-stars empty"></div>
                                                    </div>
                                                    <h5 class="review-title">Engaging & Fun</h5>
                                                    <div class="review-text">
                                                        This is the third course I attend from you, and I absolutely loved all of them. Especially this one on leadership. Your method of explaining the concepts, fun, engaging and with real-world examples, is excellent. This course will help me a lot in my job, my career, and life in general, and I thank you for that. Thank you for improving the lives of many people with engaging and in-depth courses.
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Details Wrapper End -->
            </div>

            <div class="col-lg-4 col-12 order-lg-2 max-mb-50" id="sticky-sidebar">
                <div class="sidebar-widget-wrapper pr-0">
                    <div class="sidebar-widget">
                        <div class="sidebar-widget-content">
                            <div class="sidebar-entry-course-info">
                                <div class="course-price">
                                    <span class="meta-label">
                                        <i class="meta-icon far fa-money-bill-wave"></i>
                                        Price	
                                    </span>
                                    <span class="meta-value">
                                        <span class="price"><?= $this->Number->currency($product->price, 'USD'); ?></span>
                                    </span>
                                </div>
                                <div class="course-meta">
                                    <div class="course-instructor">
                                        <span class="meta-label">
                                            <i class="far fa-chalkboard-teacher"></i>
                                            Instructor				
                                        </span>
                                        <span class="meta-value"><?= $product->user->full_name ?></span>
                                    </div>
                                    <div class="course-duration">
                                        <span class="meta-label">
                                            <i class="far fa-clock"></i>
                                            Duration				
                                        </span>
                                        <span class="meta-value">6 Hour Course</span>
                                    </div>
                                </div>
                                <div class="lp-course-buttons">
                                    <?= $this->Form->postLink(
                                        'Add to cart',
                                        ['controller' => 'Carts', 'action' => 'addToCart', $product->id],
                                        ['class' => 'btn btn-primary btn-hover-secondary btn-width-100'])
                                    ?>
                                </div>
                                <!-- <div class="lp-course-buttons mt-2">
                                    <button class="btn btn-outline-primary btn-width-100">(877) 724-6150</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Course Details Section End -->

<!-- Related Courses Section Start -->
<div class="related-courses-section section section-padding">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title text-center mb-35" data-aos="fade-up">
            <h3 class="title">Related Courses​</h3>
        </div>
        <!-- Section Title End -->

        <!-- Courses Wrapper Start -->
        <div class="courses-slider swiper-container" data-aos="fade-up">

            <div class="swiper-wrapper">
            <?php foreach($product_related as $pro): ?>
                <!-- Course Start -->
                <div class="swiper-slide mb-30">
                    <div class="course-3 box-shadow">
                        <div class="thumbnail">
                            <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$pro->slug,$pro->id]) ?>" class="image"><img src="<?= $this->Url->build('/uploads/products/'.$pro->id . DS .$pro->image ) ?>" alt="<?= $pro->title ?>"></a>
                        </div>
                        <div class="info">
                            <span class="price"><?= $this->Number->currency($pro->price, 'USD'); ?></span>
                            <h3 class="title"><a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$pro->id]) ?>"><?= $pro->title ?></a></h3>
                            <!-- <div class="d-flex justify-content-between align-items-center">
                                <span class="star-rating">
                                    <span class="rating-active">ratings</span>
                                </span>
                                <span>263 Reviews</span>
                            </div> -->
                            <p class="meta"><?= $pro->description ?>
                            </p>
                            <div class="group-btn">
                                <?= $this->Form->postLink(
                                    'Add to cart',
                                    ['controller' => 'Carts', 'action' => 'addToCart', $pro->id],
                                    ['class' => 'btn btn-primary btn-hover-secondary'])
                                ?>
                                <a href="<?= $this->Url->build(['controller' => 'Products', 'action' =>'details', $pro->id]) ?>" class="btn btn-outline-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course End -->
            <?php endforeach ?>
            </div>
            <div class="swiper-pagination"></div>

        </div>
        <!-- Courses Wrapper End -->
    </div>
</div>
<!-- Related Courses Section End -->