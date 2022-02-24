<!DOCTYPE html>
<html lang="zxx"> 
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
        <?= $this->fetch('meta') ?> 
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
        <!-- favicon -->
        <link rel="icon" href="<?= $this->Url->build('/uploads/settings/1/' . \Cake\Core\Configure::read('Core.setting.image')) ?>">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/font-awesome.min.css">
        <!-- flaticon css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>fonts/flaticon.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/animate.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/owl.carousel.css">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/slick.css">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/off-canvas.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/magnific-popup.css">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="<?= $webroot ?>css/rsmenu-main.css">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/rs-spacing.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/style.css"> <!-- This stylesheet dynamically changed from style.less -->
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="<?= $webroot ?>css/responsive.css">


	    <script type="module" src="index-plugin.js"></script>

        <link rel="stylesheet" href="<?= $webroot ?>css/edit.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
    </head>
    <body class="defult-home">
        <div class="bg-page">
            <!-- <div id="bg-banner"></div> -->
            <canvas id="particle-canvas"></canvas>
        </div>
        
        <div class="offwrap"></div>
        
        <!--Preloader area start here-->
        <div id="loader" class="loader">
            <div class="loader-container"></div>
        </div>
        <!--Preloader area End here--> 
     
		<!-- Main content Start -->
        <div class="main-content">
            <?= $this->element('header') ?>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div> 
        <!-- Main content End -->
     
        <!-- Footer Start -->
        <?= $this->element('footer') ?>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form method="get" action="<?= $this->Url->build(['controller' => 'Articles','action' => 'search']) ?>">
                            <div class="form-group">
                                <input class="form-control" name="keyword" placeholder="Search Here..." type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->
         <!-- modernizr js -->
        <script src="<?= $webroot ?>js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="<?= $webroot ?>js/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="<?= $webroot ?>js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="<?= $webroot ?>js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="<?= $webroot ?>js/jquery.nav.js"></script>
        <!-- owl.carousel js -->
        <script src="<?= $webroot ?>js/owl.carousel.min.js"></script>
        <!-- wow js -->
        <script src="<?= $webroot ?>js/wow.min.js"></script>
        <!-- Skill bar js -->
        <script src="<?= $webroot ?>js/skill.bars.jquery.js"></script>
        <script src="<?= $webroot ?>js/jquery.counterup.min.js"></script> 
         <!-- counter top js -->
        <script src="<?= $webroot ?>js/waypoints.min.js"></script>
        <!-- swiper js -->
        <script src="<?= $webroot ?>js/swiper.min.js"></script>   
        <!-- particles js -->
        <!-- <script src="<?= $webroot ?>js/particles.min.js"></script>   -->
        <!-- magnific popup js -->
        <script src="<?= $webroot ?>js/jquery.magnific-popup.min.js"></script>      
        <!-- plugins js -->
        <script src="<?= $webroot ?>js/plugins.js"></script>
        <!-- pointer js -->
        <script src="<?= $webroot ?>js/pointer.js"></script>
        <!-- contact form js -->
        <script src="<?= $webroot ?>js/contact.form.js"></script>

        <!-- <script src="<?= $webroot ?>js/particle.js"></script> -->
        <!-- main js -->
        <script src="<?= $webroot ?>js/main.js"></script>
        <script src="<?= $webroot ?>js/three.r119.min.js"></script>
    </body>
</html>