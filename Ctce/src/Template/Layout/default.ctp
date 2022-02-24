<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
    <?= $this->fetch('meta') ?> 
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= $webroot ?>assets/images/favicon.png">

    <!-- CSS ============================================ -->

    <link rel="stylesheet" href="<?= $webroot ?>assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?= $webroot ?>assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?= $webroot ?>assets/css/style.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
    <div id="page">
        <?= $this->element('header') ?>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('footer') ?>
    </div>
    <?= $this->element('header_mobile') ?>
    <script src="<?= $webroot ?>assets/js/vendor/vendor.min.js"></script>
    <script src="<?= $webroot ?>assets/js/plugins/plugins.min.js"></script>

    <!-- Main Activation JS -->
    <script src="<?= $webroot ?>assets/js/main.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
</body>

</html>