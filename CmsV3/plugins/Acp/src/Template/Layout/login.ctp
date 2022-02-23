<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- begin::Head -->
<!-- Mirrored from keenthemes.com/metronic/preview/demo1/custom/pages/user/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2019 04:16:15 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title>Administrator | Login</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--end::Fonts -->
    <!--begin::Page Custom Styles(used by this page) -->
    <link href="<?= $webrootAcp ?>css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles -->
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="<?= $webrootAcp ?>css/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= $webrootAcp ?>css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <link href="<?= $webrootAcp ?>css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= $webrootAcp ?>css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= $webrootAcp ?>css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= $webrootAcp ?>css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $webrootAcp ?>old/vendors/iconfonts/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= $webroot ?>packages/toast/jquery.toast.min.css">
    <script src="<?= $webrootAcp ?>vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        .toast .toast-title{
            color:#fff;
        }
    </style>
    <!--end::Layout Skins -->
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Page -->
    
    <?= $this->fetch('content') ?>
    
    <!-- end:: Page -->
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
    </script>

    <!-- end::Global Config -->
    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="<?= $webrootAcp ?>js/plugins.bundle.js" type="text/javascript"></script>
    <script src="<?= $webrootAcp ?>js/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
    <!--begin::Page Scripts(used by this page) -->
    <script src="<?= $webrootAcp ?>js/pages/login/login-general.js" type="text/javascript"></script>
    <script src="<?= $webroot ?>packages/toast/jquery.toast.min.js"></script>
    <!--end::Page Scripts -->
    <?= $this->Flash->render() ?>
</body>
<!-- end::Body -->
<!-- Mirrored from keenthemes.com/metronic/preview/demo1/custom/pages/user/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2019 04:16:29 GMT -->

</html>