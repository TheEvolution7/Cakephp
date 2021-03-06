<!DOCTYPE html>

<html lang="en">

    <!-- begin::Head -->
    <head>

        <!--begin::Base Path (base relative path for assets of this page) -->
        <base href="../../../../">

        <!--end::Base Path -->
        <meta charset="utf-8" />
        <title>Administrator | <?= ucfirst($this->request->getParam('action')).' '.$this->request->getParam('controller') ?></title>
        <meta name="description" content="Datatable HTML table">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
                },
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script> -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <!--end::Fonts -->

        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="<?= $webrootAcp ?>vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

        <!--end::Page Vendors Styles -->

        <!--begin:: Global Mandatory Vendors -->
        <link href="<?= $webrootAcp ?>vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <link href="<?= $webrootAcp ?>vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />


        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="<?= $webrootAcp ?>css/style.bundle.css" rel="stylesheet" type="text/css" />

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="<?= $webrootAcp ?>css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?= $webrootAcp ?>css/skins/aside/dark.css" rel="stylesheet" type="text/css" />

        <!--end::Layout Skins -->
        <link rel="shortcut icon" href="<?= $webrootAcp ?>media/logos/favicon.ico" />

        <!--begin::Customs -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= $webrootAcp ?>css/ta.css">
        <!--end::Customs -->
        <link rel="stylesheet" href="<?= $webrootAcp ?>css/tagify.css">
        <style>
            body {
                font-family: 'Open Sans', sans-serif;
            }
        </style>

    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

        <!-- begin:: Page -->

        <!-- begin:: Header Mobile -->
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
            <div class="kt-header-mobile__logo">
                <a style="color:#fff;font-size: 20px;font-weight: 700" href="<?= $this->Url->build(['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']) ?>">
                                <!-- <img alt="Logo" src="<?= $webrootAcp ?>media/logos/logo-light.png" /> -->
                                Administrator 
                            </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
            </div>
        </div>

        <!-- end:: Header Mobile -->
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

                <!-- begin:: Aside -->
                <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
                <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                    <!-- begin:: Aside -->
                    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                        <div class="kt-aside__brand-logo">
                            <a style="color:#fff;font-size: 20px;font-weight: 700" href="<?= $this->Url->build(['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']) ?>">
                                <!-- <img alt="Logo" src="<?= $webrootAcp ?>media/logos/logo-light.png" /> -->
                                Administrator 
                            </a>
                        </div>
                        <div class="kt-aside__brand-tools">
                            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                                        </g>
                                    </svg></span>
                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                        </g>
                                    </svg></span>
                            </button>

                            <!--
            <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
            -->
                        </div>
                    </div>

                    <!-- end:: Aside -->

                    <!-- begin:: Aside Menu -->
                    <?= $this->element('aside_menu') ?>

                    <!-- end:: Aside Menu -->
                </div>

                <!-- end:: Aside -->
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                    <!-- begin:: Header -->
                    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                        <!-- begin:: Header Menu -->
                        <?= $this->element('header_menu') ?>

                        <!-- end:: Header Menu -->

                        <!-- begin:: Header Topbar -->
                        <?= $this->element('header_topbar') ?>

                        <!-- end:: Header Topbar -->
                    </div>

                    <!-- end:: Header -->
                    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                        <!-- begin:: Subheader -->
                        <?= $this->element('sub_header') ?>

                        <!-- end:: Subheader -->

                        <!-- begin:: Content -->
                        

                        <?= $this->fetch('content') ?>

                        <!-- end:: Content -->
                    </div>

                    <!-- begin:: Footer -->
                    <?= $this->element('footer') ?>

                    <!-- end:: Footer -->
                </div>
            </div>
        </div>

        <!-- end:: Page -->

        <!-- begin::Quick Panel -->
        
        <?= $this->element('quick_panel') ?>

        <!-- end::Quick Panel -->

        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>

        <!-- end::Scrolltop -->

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
                        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                    }
                }
            };
        </script>

        <!-- end::Global Config -->

        <?= $this->element('js') ?>

        <!--begin:: Global Mandatory Vendors -->
        <script src="<?= $webrootAcp ?>vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <script src="<?= $webrootAcp ?>vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/raphael/raphael.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/morris.js/morris.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>


        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="<?= $webrootAcp ?>js/scripts.bundle.js" type="text/javascript"></script>

        <!--end::Global Theme Bundle -->

        <!--begin::Page Vendors(used by this page) -->
        <script src="<?= $webrootAcp ?>vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

        <script src="<?= $webrootAcp ?>vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
        <script src="<?= $webrootAcp ?>js/tagify.js"></script>
        <!-- <script src="<?= $webrootAcp ?>js/ta.js"></script> -->
        
        <?= $this->Flash->render() ?>

        
        
        <script src="<?= $webroot ?>custom/js/main.js"></script>
        <script src="<?= $webroot ?>custom/js/vu.js"></script>
        <?= $this->fetch('sidebar') ?>
        <!--end::Page Vendors -->
        
        <script>
            $('.datepicker').datepicker({
                format: "yyyy-mm-dd"
            });
            $('.timepicker').timepicker({
                maxHours: 24,
                showMeridian: false
            });
        </script>

        <script>
            $(document).ready(function(){
                $(".btn-add-price").click(function(){
                    var count = parseInt($('#div-add-price').attr('data-count')) + 1;
                    var html = '<div id="div-' + count +'"><hr><a href="javascript:;" class="btn-remove-price red"><i class="fas fa-times"></i></a><div class="form-group row"> <label class="col-form-label col-md-3 col-sm-3 col-12" for="prices-0-title">Title</label> <div class="col-sm-9"><input type="text" name="prices[' + count + '][title]" class="form-control" id="prices-0-title"></div> </div> <div class="form-group row"> <label class="col-form-label col-md-3 col-sm-3 col-12" for="prices-0-description">Description</label> <div class="col-md-9"><textarea type="" name="prices[' + count + '][description]" class="form-control" id="prices-0-description" rows="5"></textarea></div> </div> <div class="form-group row"> <label class="col-form-label col-md-3 col-sm-3 col-12" for="prices-0-price">Price</label> <div class="col-sm-9"><input type="number" value="0" name="prices[' + count + '][price]" class="form-control" id="prices-0-price"></div> </div> <div class="form-group row"> <label class="col-form-label col-md-3 col-sm-3 col-12" for="prices-0-sale">Sale</label> <div class="col-sm-9"><input value= "0" type="number" name="prices[' + count + '][sale]" class="form-control" id="prices-0-sale"></div> </div> </div>';
                    $('#div-add-price').append(html);
                    $('#div-add-price').attr('data-count', count );
                });

                $(document).on("click", "a.btn-remove-price" , function() {
                    $(this).parent().remove();
                });
            });
        </script>

<?= $this->fetch('scriptJs') ?>   
<?= $this->fetch('calendar') ?>     
        
    </body>
    <!-- end::Body -->
</html>

