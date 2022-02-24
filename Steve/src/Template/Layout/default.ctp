<!DOCTYPE html>
    <html class="no-js">
        <head>
            <meta charset="utf-8">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
            <?= $this->fetch('meta') ?> 
            <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
            <link rel="stylesheet" href="<?= $webroot ?>css/bootstrap.min.css">
            <link rel="stylesheet" href="<?= $webroot ?>css/animations.css">
            <link rel="stylesheet" href="<?= $webroot ?>css/swiper.min.css">
            <link rel="stylesheet" href="<?= $webroot ?>css/fonts.css">
            <link rel="stylesheet" href="<?= $webroot ?>css/main.css" id="color-switcher-link">
            <link rel="stylesheet" href="<?= $webroot ?>css/style.css">
            <script src="<?= $webroot ?>js/vendor/modernizr-2.6.2.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        </head>
        <body>
            <div class="preloader">
                <div class="preloader_image"></div>
            </div>
            <!-- search modal -->
            <div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="rt-icon2-cross2"></i>
                    </span>
                </button>
                <div class="widget widget_search">
                    <form method="get" class="searchform search-form form-inline" action="index.html">
                        <div class="form-group">
                            <input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
                        </div>
                        <button type="submit" class="theme_button">Search</button>
                    </form>
                </div>
            </div>

            <!-- Unyson messages modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
                <div class="fw-messages-wrap ls with_padding">
                </div>
            </div>
            <!-- eof .modal -->

            <div id="canvas">
                <div id="box_wrapper">
                    <?= $this->element('header') ?>
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                    <?= $this->element('footer') ?>
                </div>
            </div>
            
            <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script src="<?= $webroot ?>js/compressed.js"></script>
            <script src="<?= $webroot ?>js/swiper.min.js"></script>
            <script src="<?= $webroot ?>js/main.js"></script>
            <script src="<?= $webroot ?>js/vendor/jquery-jvectormap-2.0.3.min.js"></script>
            <script src="<?= $webroot ?>js/vendor/jquery-jvectormap-world-merc.js"></script>
            
        </body>
    </html>