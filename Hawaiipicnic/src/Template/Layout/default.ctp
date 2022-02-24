<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->request->getParam('action') == 'home' ?  \Cake\Core\Configure::read('Core.setting.site_title') :  $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title')?></title>
    <?= $this->fetch('meta') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= $webroot ?>css/animate.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="<?= $webroot ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/fontawesome-pro-5.14.0/css/all.min.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/flexslider.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/jquery.datetimepicker.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/nice-select.css">
    <link rel="stylesheet" href="<?= $webroot ?>css/style.css">
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
    <div id="pwe-page"> <a href="index.html#" class="js-pwe-nav-toggle pwe-nav-toggle"><i></i></a>
    <?= $this->element('header') ?>
    <div id="pwe-main">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('footer') ?>
    </div>
     <!-- jQuery -->
    <script src="<?= $webroot ?>js/jquery.min.js"></script>
    <script src="<?= $webroot ?>js/modernizr-2.6.2.min.js"></script>
    <script src="<?= $webroot ?>js/jquery.easing.1.3.js"></script>
    <script src="<?= $webroot ?>js/bootstrap.min.js"></script>
    <script src="<?= $webroot ?>js/jquery.waypoints.min.js"></script>
    <script src="<?= $webroot ?>js/jquery.flexslider-min.js"></script>
    <script src="<?= $webroot ?>js/sticky-kit.min.js"></script>
    <script src="<?= $webroot ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= $webroot ?>js/owl.carousel.min.js"></script>
    <script src="<?= $webroot ?>js/anime.min.js"></script>
    <script src="<?= $webroot ?>js/moment.js"></script>
    <script src="<?= $webroot ?>js/jquery.datetimepicker.min.js"></script>
    <script src="<?= $webroot ?>js/jquery.fancybox.min.js"></script>
    <script src="<?= $webroot ?>js/jquery.nice-select.min.js"></script>
    <script src="<?= $webroot ?>js/main.js"></script>
    <script>
        (function ($) {
            $.fn.uncheckableRadio = function () {
                var $root = this;
                $root.each(function () {
                    var $radio = $(this);
                    if ($radio.prop('checked')) {
                        $radio.data('checked', true);
                    } else {
                        $radio.data('checked', false);
                    }

                    $radio.click(function () {
                        var $this = $(this);
                        if ($this.data('checked')) {
                            $this.prop('checked', false);
                            $this.data('checked', false);
                            $this.trigger('change');
                        } else {
                            $this.data('checked', true);
                            $this.closest('form').find('[name="' + $this.prop('name') + '"]')
                                .not($this).data('checked', false);
                        }
                    });
                });
                return $root;
            };
        }(jQuery));

        $('.booking-appointment input[type=radio]').uncheckableRadio();
        // jQuery.datetimepicker.setLocale('en');
       
        jQuery('#datetimepicker').datetimepicker({
            // formatDate:'d/m/Y',
            format:'d/m/Y H:i',
            minDate: moment().format('DD/MM/YYYY'),
            allowTimes:[
                '14:00', '15:00','16:00', '17:00', '18:00','19:00','20:00'
            ]
        });
    </script>
    </div>
</body>
</html>