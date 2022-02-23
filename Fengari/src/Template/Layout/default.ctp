<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
    <?= $this->fetch('meta') ?> 

    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i%7CPoppins:300,400,500,600,700"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= $webroot ?>css/canvas.css">
    <link href="<?= $webroot ?>css/style.css" rel="stylesheet" media="screen">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="loading">
    <canvas id="canvas-1"></canvas>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    
    <script src="<?= $webroot ?>js/jquery.min.js"></script>
    <script src="<?= $webroot ?>js/animsition.min.js"></script>
    <script src="<?= $webroot ?>js/bootstrap.min.js"></script>
    <script src="<?= $webroot ?>js/smoothscroll.js"></script>
    <script src="<?= $webroot ?>js/jquery.validate.min.js"></script>
    <script src="<?= $webroot ?>js/wow.min.js"></script>
    <script src="<?= $webroot ?>js/jquery.stellar.min.js"></script>
    <script src="<?= $webroot ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= $webroot ?>js/owl.carousel.min.js"></script>
    <script src="<?= $webroot ?>js/isotope.pkgd.min.js"></script>
    <script src="<?= $webroot ?>js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= $webroot ?>js/plugins.js"></script>
    <script src="<?= $webroot ?>js/sly.min.js"></script>

    <script src="<?= $webroot ?>js/rev-slider/jquery.themepunch.tools.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/jquery.themepunch.revolution.min.js"></script>

    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.actions.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.carousel.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.kenburn.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.layeranimation.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.migration.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.navigation.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.parallax.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.slideanims.min.js"></script>
    <script src="<?= $webroot ?>js/rev-slider/revolution.extension.video.min.js"></script>

    <script src="<?= $webroot ?>js/scripts.js"></script>
    <script src="<?= $webroot ?>js/rev-slider-init.js"></script>
    <!-- <script src="<?= $webroot ?>js/canvas-ani.js"></script> -->
</body>

</html>
