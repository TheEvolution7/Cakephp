<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
    <?= $this->fetch('meta') ?> 

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="<?= $this->Url->build('/uploads/settings/1/' . \Cake\Core\Configure::read('Core.setting.image')) ?>" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    

    <!--== Bootstrap CSS ==-->
    <link href="<?= $webroot ?>assets/bootstrap.min.css" rel="stylesheet" />
    <!--== Font-awesome Icons CSS ==-->
    <link href="<?= $webroot ?>assets/font-awesome.min.css" rel="stylesheet" />
    <!--== Icofont Min Icons CSS ==-->
    <link href="<?= $webroot ?>assets/icofont.min.css" rel="stylesheet" />
    <!--== lastudioIcons CSS ==-->
    <link href="<?= $webroot ?>assets/lastudioIcons.css" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="<?= $webroot ?>assets/animate.css" rel="stylesheet" />
    <!--== Aos CSS ==-->
    <link href="<?= $webroot ?>assets/aos.css" rel="stylesheet" />
    <!--== FancyBox CSS ==-->
    <link href="<?= $webroot ?>assets/jquery.fancybox.min.css" rel="stylesheet" />
    <!--== Slicknav CSS ==-->
    <link href="<?= $webroot ?>assets/slicknav.css" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="<?= $webroot ?>assets/swiper.min.css" rel="stylesheet" />
    <!--== Slick CSS ==-->
    <link href="<?= $webroot ?>assets/slick.css" rel="stylesheet" />
    <!--== Main Style CSS ==-->
    <link href="<?= $webroot ?>assets/style.css" rel="stylesheet" />
    <!--== Custom Style CSS ==-->
    <link href="<?= $webroot ?>assets/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/css/edit.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
<body>
        <!--wrapper start-->
    <div class="wrapper home-default-wrapper">
    <?php if($this->request->getParam('action') == 'home'): ?>
        <!--== Start Preloader Content ==-->
        <div class="preloader">
            <div class="el-loading">
            <img src="<?= $webroot ?>assets/img/el-loading/7.svg" alt="" class="el-1">
            <img src="<?= $webroot ?>assets/img/el-loading/2.svg" alt="" class="el-2">
            <img src="<?= $webroot ?>assets/img/el-loading/4.svg" alt="" class="el-4">
            <img src="<?= $webroot ?>assets/img/el-loading/6.svg" alt="" class="el-5">
            </div>
            <svg class="logo-svg" xmlns="http://www.w3.org/2000/svg" version="1.0" width="592.000000pt" height="592.000000pt"
            viewBox="0 0 592.000000 592.000000" preserveAspectRatio="xMidYMid meet">
            <g class="icon-logo" transform="translate(0.000000,592.000000) scale(0.100000,-0.100000)" fill="currentColor"
            stroke="none">
            <path
            d="M950 5696 c-369 -83 -632 -340 -728 -714 -16 -62 -17 -200 -17 -2012 l0 -1945 23 -85 c89 -337 345 -593 682 -682 l85 -23 1945 0 c1812 0 1950 1 2012 17 382 99 649 378 718 753 8 43 10 622 8 2005 l-3 1945 -23 75 c-96 316 -336 556 -652 652 l-75 23 -1960 2 c-1518 1 -1972 -2 -2015 -11z m4001 -103 c310 -88 524 -302 612 -612 l22 -76 3 -1860 c2 -1253 -1 -1892 -8 -1958 -33 -311 -232 -581 -508 -693 -158 -64 12 -59 -2132 -59 l-1945 0 -78 23 c-287 83 -506 301 -589 588 l-23 79 0 1945 c0 1827 1 1949 18 2009 42 155 99 258 201 368 131 141 323 240 509 262 39 5 920 8 1957 7 l1885 -1 76 -22z" />
            <path
            d="M1615 4371 c-117 -94 -147 -130 -126 -155 6 -7 26 -16 44 -19 18 -3 228 2 467 10 239 9 626 16 858 17 l424 1 18 -22 c23 -29 31 -29 58 0 12 12 64 54 116 92 53 39 96 76 96 83 0 10 -187 12 -919 10 -506 -2 -923 1 -927 5 -5 4 -3 17 4 27 14 22 16 40 5 40 -5 0 -58 -40 -118 -89z" />
            <path
            d="M2699 4112 c-206 -104 -324 -188 -493 -352 -181 -176 -304 -358 -357 -530 -33 -104 -33 -250 0 -332 45 -115 143 -218 267 -281 114 -57 251 -84 495 -95 l145 -7 -25 -84 c-29 -99 -10 -82 -381 -330 -255 -170 -447 -288 -605 -372 -143 -75 -265 -159 -265 -180 0 -13 83 -38 163 -49 114 -15 324 -12 404 5 254 54 479 202 630 416 65 92 144 260 184 390 l34 112 86 57 85 58 28 -122 c152 -661 426 -976 807 -927 106 14 239 56 345 109 100 50 133 76 117 92 -8 9 -26 6 -75 -13 -149 -59 -334 -68 -474 -23 -174 56 -296 177 -409 404 -72 146 -148 392 -169 548 l-7 50 58 39 c32 21 200 111 373 200 173 89 357 187 409 219 192 117 331 240 331 293 0 24 -2 25 -49 21 -97 -9 -310 -135 -629 -372 -197 -146 -333 -236 -422 -281 -89 -45 -205 -83 -267 -88 l-51 -4 45 126 c79 222 119 333 168 464 27 70 45 130 42 133 -3 4 -56 -15 -117 -42 l-110 -49 -75 -104 c-81 -113 -91 -137 -49 -121 14 6 33 14 43 20 16 8 11 -13 -25 -128 -25 -75 -56 -175 -70 -221 l-26 -84 -116 7 c-204 12 -336 42 -446 99 -156 82 -224 223 -197 412 49 349 336 698 749 910 50 26 92 54 92 61 0 29 -60 12 -191 -54z m-59 -1986 c-60 -186 -119 -297 -199 -377 -107 -107 -220 -146 -394 -137 -94 5 -220 34 -215 49 3 10 842 598 846 594 2 -1 -15 -60 -38 -129z" />
            </g>
            </svg>
        </div>
    <?php endif ?>
    
        <!--== End Preloader Content ==-->
        <?= $this->element('header') ?>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('footer') ?>

    <!--== Scroll Top Button ==-->
    <div class="scroll-to-top"><span class="icofont-arrow-up"></span></div>

    <!--== Start Product Quick View ==-->
    <aside class="product-quick-view-modal">
      <div class="product-quick-view-inner">
        <div class="product-quick-view-content">
          <button type="button" class="btn-close">
            <span class="close-icon"><i class="lastudioicon-e-remove"></i></span>
          </button>
          <div class="row row-gutter-0">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="thumb">
                <img src="<?= $webroot ?>assets/img/shop/quick-view1.jpg" alt="">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="single-product-info">
                <h4 class="title">Product Simple</h4>
                <div class="product-rating">
                  <div class="review">
                    <p><span></span>99 in stock</p>
                  </div>
                </div>
                <div class="prices">
                  <span class="price">£49.90</span>
                </div>
                <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fringilla quis ipsum
                  enim viverra. Enim in morbi tincidunt ante luctus tincidunt integer. Sed adipiscing vehicula.</p>
                <div class="quick-product-action">
                  <div class="action-top">
                    <div class="pro-qty-area">
                      <div class="pro-qty">
                        <input type="text" id="quantity" title="Quantity" value="1">
                        <a href="#" class="inc qty-btn">+</a><a href="#" class="dec qty-btn">-</a></div>
                    </div>
                    <a class="btn-theme btn-primary" href="shop-cart.html">Add to cart</a>
                  </div>
                  <div class="action-bottom">
                    <a class="btn-wishlist" href="shop-wishlist.html"><i class="labtn-icon labtn-icon-wishlist"></i>Add
                      to wishlist</a>
                    <a class="btn-compare" href="shop-compare.html"><i class="labtn-icon labtn-icon-compare"></i>Add to
                      compare</a>
                  </div>
                </div>
                <div class="product-ratting">
                  <div class="product-sku">
                    SKU: <span>REF. LA-276</span>
                  </div>
                </div>
                <div class="product-categorys">
                  <div class="product-category">
                    Category: <span>Uncategorized</span>
                  </div>
                </div>
                <div class="widget">
                  <h3 class="title">Tags:</h3>
                  <div class="widget-tags">
                    <ul>
                      <li><a href="shop.html">Blazer,</a></li>
                      <li><a href="shop.html">Fashion,</a></li>
                      <li><a href="shop.html">wordpress,</a></li>
                    </ul>
                  </div>
                </div>
                <div class="product-social-info">
                  <a href="#"><span class="lastudioicon-b-facebook"></span></a>
                  <a href="#"><span class="lastudioicon-b-twitter"></span></a>
                  <a href="#"><span class="lastudioicon-b-linkedin"></span></a>
                  <a href="#"><span class="lastudioicon-b-pinterest"></span></a>
                </div>
                <div class="product-nextprev">
                  <a href="#">
                    <i class="lastudioicon-arrow-left"></i>
                  </a>
                  <a href="#">
                    <i class="lastudioicon-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="canvas-overlay"></div>
    </aside>
    <!--== End Product Quick View ==-->
  
    <!--== Start Aside Search Menu ==-->
    <div class="search-box-wrapper">
      <div class="search-box-content-inner">
        <div class="search-box-form-wrap">
          <div class="search-note">
            <p>Start typing and press Enter to search</p>
          </div>
          <form action="<?= $this->Url->build(['controller' => 'Products','action' => 'search']) ?>" method="get">
            <div class="search-form position-relative">
              <label for="search-input" class="sr-only">Search</label>
              <input type="search" class="form-control" placeholder="Search" name="keyword" id="search-input">
              <button class="search-button"><i class="lastudioicon-zoom-1"></i></button>
            </div>
          </form>
        </div>
      </div>
      <!--== End Aside Search Menu ==-->
      <a href="javascript:;" class="search-close"><i class="lastudioicon-e-remove"></i></a>
    </div>
    <!--== End Aside Search Menu ==-->


    <!--== Start Side Menu ==-->
    <aside class="off-canvas-wrapper">
      <div class="off-canvas-inner">
        <div class="off-canvas-overlay d-none"></div>
        <!-- Start Off Canvas Content Wrapper -->
        <div class="off-canvas-content">
          <!-- Off Canvas Header -->
          <div class="off-canvas-header">
            <div class="close-action">
              <button class="btn-close"><i class="icofont-close-line"></i></button>
            </div>
          </div>

          <div class="off-canvas-item">
            <!-- Start Mobile Menu Wrapper -->
            <div class="res-mobile-menu">
              <!-- Note Content Auto Generate By Jquery From Main Menu -->
            </div>
            <!-- End Mobile Menu Wrapper -->
          </div>
          <!-- Off Canvas Footer -->
          <div class="off-canvas-footer"></div>
        </div>
        <!-- End Off Canvas Content Wrapper -->
      </div>
    </aside>
    <!--== End Side Menu ==-->
</div>
<!--=======================Javascript============================-->
  
  <div class="alert text-center cookiealert" role="alert">
    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website. <a href="https://cookiesandyou.com/" target="_blank">Learn more</a>

    <button type="button" class="btn btn-primary btn-sm acceptcookies">
        I agree
    </button>
</div>

<script>
  window.addEventListener("cookieAlertAccept", function() {
    alert("cookies accepted")
})
</script>
  <!--=== Modernizr Min Js ===-->
  <script src="<?= $webroot ?>assets/modernizr.js"></script>
  <!--=== jQuery Min Js ===-->
  <script src="<?= $webroot ?>assets/jquery-main.js"></script>
  <!--=== jQuery Migration Min Js ===-->
  <script src="<?= $webroot ?>assets/jquery-migrate.js"></script>
  <!--=== Popper Min Js ===-->
  <script src="<?= $webroot ?>assets/popper.min.js"></script>
  <!--=== Bootstrap Min Js ===-->
  <script src="<?= $webroot ?>assets/bootstrap.min.js"></script>
  <!--=== jquery Appear Js ===-->
  <script src="<?= $webroot ?>assets/jquery.appear.js"></script>
  <!--=== jquery Swiper Min Js ===-->
  <script src="<?= $webroot ?>assets/swiper.min.js"></script>
  <!--=== jquery Fancybox Min Js ===-->
  <script src="<?= $webroot ?>assets/fancybox.min.js"></script>
  <!--=== jquery Aos Min Js ===-->
  <script src="<?= $webroot ?>assets/aos.min.js"></script>
  <!--=== jquery Slicknav Js ===-->
  <script src="<?= $webroot ?>assets/jquery.slicknav.js"></script>
  <!--=== jquery Countdown Js ===-->
  <script src="<?= $webroot ?>assets/jquery.countdown.min.js"></script>
  <!--=== jquery Tippy Js ===-->
  <script src="<?= $webroot ?>assets/tippy.all.min.js"></script>
  <!--=== Isotope Min Js ===-->
  <script src="<?= $webroot ?>assets/isotope.pkgd.min.js"></script>
  <!--=== jquery Vivus Js ===-->
  <script src="<?= $webroot ?>assets/vivus.js"></script>
  <!--=== Parallax Min Js ===-->
  <script src="<?= $webroot ?>assets/parallax.min.js"></script>
  <!--=== Slick  Min Js ===-->
  <script src="<?= $webroot ?>assets/slick.min.js"></script>
  <!--=== jquery Wow Min Js ===-->
  <script src="<?= $webroot ?>assets/wow.min.js"></script>
  <!--=== jquery Zoom Min Js ===-->
  <script src="<?= $webroot ?>assets/jquery-zoom.min.js"></script>
  <!--=== Anime Js ===-->
  <script src="<?= $webroot ?>assets/anime.min.js"></script>
  <!--=== CDN Js ===-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/jquery.ScrollMagic.min.js"></script>

  <!--=== Custom Js ===-->
  <script src="<?= $webroot ?>assets/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

</body>

</html>