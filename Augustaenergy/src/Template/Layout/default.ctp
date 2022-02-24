<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
    <?= $this->fetch('meta') ?> 
    <!-- favicons Icons -->

    <meta name="description" content="" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/qutiiz-icons/style.css">
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/vendors/timepicker/timePicker.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="<?= $webroot ?>assets/css/qutiiz.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/css/qutiiz-responsive.css" />
    <link rel="stylesheet" href="<?= $webroot ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?= $webroot ?>assets/css/custom.min.css">
</head>

<body>
    <div class="preloader">
        <img class="preloader__image" width="400" src="<?= $webroot ?>assets/images/loader.png" alt="" />
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <?= $this->element('header') ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <!--Main Slider Start-->
        

        <!--Site Footer Start-->
        <?= $this->element('footer') ?>
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="<?= $webroot ?>assets/images/resources/logo-1.png" width="155"
                        alt="" /></a>
            </div>
            <div class="main-menu-wrapper__search-box">
                <form action="">
                    <input type="search" name="" placeholder="Search">
                    <button type="submit" class="hidden"></button>
                </form>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:contact@augusteint.com">contact@augusteint.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+971566359328">+971566359328</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="<?= $webroot ?>assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/odometer/odometer.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/swiper/swiper.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/wow/wow.js"></script>
    <script src="<?= $webroot ?>assets/vendors/isotope/isotope.js"></script>
    <script src="<?= $webroot ?>assets/vendors/countdown/countdown.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/vegas/vegas.min.js"></script>
    <script src="<?= $webroot ?>assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="<?= $webroot ?>assets/vendors/timepicker/timePicker.js"></script>




    <!-- template js -->
    <script src="<?= $webroot ?>assets/js/qutiiz.js"></script>
</body>

</html>
