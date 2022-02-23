<!DOCTYPE html>
<html class="desktop " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->fetch('meta') ?> 
    <link rel="icon" href="<?= $this->Url->build('/uploads/settings/1/' . \Cake\Core\Configure::read('Core.setting.image')) ?>">
    <link rel="preload" href="<?= $webroot ?>DPM/f/dax-m.woff2" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= $webroot ?>DPM/f/dax-r.woff2" as="font" type="font/woff2" crossorigin />
    <link rel="stylesheet" href="<?= $webroot ?>DPM/s/index.css" type="text/css" media="all">
    <!--    using in flats-->
    <script src="<?= $webroot ?>DPM/j/jquery-3.4.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
    <body data-barba="wrapper" class="home-page">
        <div class="rotate-device">
            <div class="rotate-device-inner">
                <br />Please rotate the device. <br />
                This is necessary for the site to be displayed correctly. </div>
        </div>
        <?= $this->element('header') ?>
        <div class="page-scroll-container" data-scroll-container>
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
        </div>
        <div class="pos_f w_100 h_100 aa_0 o_h page-transition-overlay" style="z-index: -1;"></div>
        <div id="cursor" class="no_pe">
            <div id="cursor-content" class="flex_c flex_ac flex_jc"></div>
        </div>
        <div id="cursor2" class="no_pe">
            <div class="cursor2-bg"></div>
            <div class="cursor2-c3">
                <div class="cursor-content2 flex_c flex_ac flex_jc"></div>
            </div>
            <div class="cursor2-c2">
                <div class="cursor-content2 flex_c flex_ac flex_jc"></div>
            </div>
            <div class="cursor2-c1">
                <div class="cursor-content2 flex_c flex_ac flex_jc"></div>
            </div>
        </div>
        <div class="modal flex_jc flex_ac" data-modal="modal_fbSuccess">
            <div class="modal__screen"></div>
            <div class="modal__content flex_jc flex_ac bgc_w flex_c pt_10 pb_10 pl_6 pr_6">
                <div class="lh_150 fz24">YOUR MESSAGE SUCCESSFULLY SENT!</div>
                <div class="mt_4">We will contact you soon.</div>
                <div class="modal__closer js-modal-close"></div>
            </div>
        </div>

        <div class="modal" data-modal="modal_feedback" id="modal_feedback">
            <div class="modal__screen"></div>
            <div class="modal__content h_100 flex_jc flex_ac">

                <form class="form form_fb pl_10 pr_10 pt_10 pb_10 bgc_w w_75 pos_r" method="post" action=""
                    data-response="modal_fbSuccess">
                    <input type="hidden" name="fb__project" id="fb__project" value="" />
                    <div class="fz40 lh_120">Leave the coordinates, and we will contact you</div>
                    <div class="flex_jsb mt_4">
                        <div class="form__field pos_r w_33 pr_2">
                            <label for="fb__name" class="fz14 c_g">Name</label>
                            <input class="form__input fb__name w_100 ff_dax" type="text" name="fb__name" id="fb__name"
                                required />
                            <div class="form__warning"><span>Name is required</span></div>
                        </div>
                        <div class="form__group flex w_70">
                            <div class="form__field pos_r w_50 pr_2">
                                <label for="fb__tel" class="fz14 c_g">Phone</label>
                                <input class="form__input fb__tel w_100 ff_dax" type="tel" name="fb__tel" id="fb__tel"
                                    minlength="11" maxlength="22" required />
                                <div class="form__warning"><span>Phone is required</span></div>
                            </div>
                            <div class="form__field pos_r w_50">
                                <label for="fb__tel" class="fz14 c_g">Email (optional)</label>
                                <input class="form__input fb__tel w_100 ff_dax" type="email" name="fb__email"
                                    id="fb__email" />
                                <div class="form__warning"><span>Email is required</span></div>
                            </div>
                        </div>
                    </div>
                    <textarea class="form__textarea mt_4 fb__message w_100 fz16 ff_dax" name="fb__message" id="fb__message"
                        placeholder="MESSAGE (OPTIONAL)"></textarea>
                    <div class="mt_4 flex_je">
                        <div class="form__submit form__submit_disabled bt-round-next is-inview">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w_100 h_100 bgc_b" viewBox="0 0 80 80">
                                <circle r="39" cx="40" cy="40" stroke="#000" stroke-width="2" fill="none"></circle>
                                <circle r="37" cx="40" cy="40" stroke="#000" stroke-width="2.5" fill="none"></circle>
                            </svg>
                            <i></i>
                        </div>
                    </div>
                    <div class="modal__closer js-modal-close"></div>
                </form>
            </div>

        </div>
        <div style="width:0;height:0;overflow:hidden">
            <svg xmlns="http://www.w3.org/2000/svg">
                <symbol id="ico-phone" viewBox="0 0 35 34">
                    <path
                        d="M6.8 10.3c-1.9 4.5-1.9 9 .3 13.5.2-.1.4-.3.7-.4.3-.1.6-.2.8-.4.2-.1.4 0 .5.2 1.8 2.4 3.6 4.8 5.4 7.1.2.2.2.4 0 .6-1.8 2.5-5.1 3-7.5 1.1-.8-.6-1.4-1.4-2-2.1-1.4-1.7-2.5-3.5-3.3-5.5C.4 21.3 0 18 .3 14.7c.4-3.7 1.6-7 3.8-10 .6-.8 1.2-1.6 1.9-2.3C7.7.6 10.3.2 12.5 1.5c.6.4 1.1.9 1.6 1.5.1.1.1.2 0 .3-.8 1.2-1.7 2.4-2.5 3.6-.9 1.3-1.8 2.5-2.7 3.8-.2.3-.3.4-.6.3-.5-.3-1-.5-1.5-.7" />
                    <circle cx="19" cy="17" r="2" />
                    <circle cx="26" cy="17" r="2" />
                    <circle cx="33" cy="17" r="2" />
                </symbol>
                <symbol id="ico-insta" viewBox="0 0 18 18">
                    <path
                        d="M10 0c1.6 0 1.9 0 2.7.1 1 0 1.6.2 2.2.4.6.2 1.1.5 1.6 1s.8 1 1 1.6c.2.6.4 1.2.4 2.2.1.9.1 1.3.1 3.7s0 2.8-.1 3.7c0 1-.2 1.6-.4 2.2-.2.6-.5 1.1-1 1.6s-1 .8-1.6 1c-.6.2-1.2.4-2.2.4-1 0-1.3.1-3.7.1s-2.8 0-3.7-.1c-1 0-1.6-.2-2.2-.4-.6-.2-1.1-.5-1.6-1s-.8-1-1-1.6c-.2-.6-.4-1.2-.4-2.2C0 11.9 0 11.6 0 10V8c0-1.6 0-1.9.1-2.7 0-1 .2-1.6.4-2.2.2-.6.5-1.1 1-1.6s1-.8 1.6-1C3.7.3 4.3.1 5.3.1 6.1 0 6.4 0 8 0h2zm-.2 1.6H8.2c-1.7 0-2 0-2.9.1-.8 0-1.3.2-1.6.3-.4.1-.7.3-1 .7s-.6.6-.7 1c-.1.3-.3.8-.3 1.7 0 .9-.1 1.2-.1 3.1v1.1c0 1.9 0 2.2.1 3.1 0 .9.2 1.4.3 1.7.2.4.4.7.7 1 .3.3.6.5 1 .7.3.1.8.3 1.7.3.9 0 1.2.1 3.1.1h1.1c1.9 0 2.2 0 3.1-.1.9 0 1.4-.2 1.7-.3.4-.2.7-.4 1-.7.3-.3.5-.6.7-1 .1-.3.3-.8.3-1.7 0-.8 0-1.2.1-2.9V8.2c0-1.7 0-2-.1-2.9 0-.9-.2-1.4-.3-1.7-.2-.4-.4-.7-.7-1-.3-.3-.6-.5-1-.7-.3-.1-.8-.3-1.7-.3H9.8zM9 4c2.8 0 5 2.2 5 5s-2.2 5-5 5-5-2.2-5-5 2.2-5 5-5zm0 1.8C7.2 5.8 5.8 7.2 5.8 9c0 1.8 1.5 3.2 3.2 3.2s3.2-1.5 3.2-3.2c0-1.8-1.4-3.2-3.2-3.2zM14 4c.6 0 1 .4 1 1s-.4 1-1 1-1-.4-1-1 .4-1 1-1z" />
                </symbol>
                <symbol id="ico-email" viewBox="0 0 493.5 323.1">
                    <path
                        d="M444.6 0H48.9C22 0 0 22 0 48.9v225.2c0 27 22 48.9 48.9 48.9h395.6c27 0 48.9-22 48.9-48.9V48.9C493.5 22 471.5 0 444.6 0zm16.3 48.9v225.2c0 2.6-.7 4.9-1.8 7.1L343.7 165.9 460.8 48.8l.1.1zM32.6 274.1V48.9v-.2l117.1 117.1L34.4 281.2c-1-2.2-1.8-4.5-1.8-7.1zm219.2-62.4c-2.7 2.7-7.4 2.7-10.1 0L62.7 32.6h368.2L251.8 211.7zm-79-22.8l45.8 45.8c7.5 7.5 17.5 11.6 28.1 11.6 10.6 0 20.6-4.1 28.1-11.6l45.8-45.8 101.5 101.5H71.3l101.5-101.5z" />
                </symbol>
                <symbol id="ico-fb" viewBox="0 0 9 18">
                    <path d="M1.9 18h4V9h2.7L9 5.8H5.9V4c0-.7.5-.9.9-.9H9V0H6C2.7 0 1.9 2.3 1.9 3.8v2.1H0V9h1.9v9z" />
                </symbol>
                <symbol id="arrow" viewBox="0 0 28 17">
                    <path fill="none" stroke-width="1.5" stroke-linecap="square"
                        d="M1.5 8.5h24M19.5 1.5l7 7M19.5 15.5L26 9" />
                </symbol>
            </svg> </div>

        <div class="preloader">
            <div class="preloader-line">
                <div></div>
            </div>
            <div class="preloader-line">
                <div></div>
            </div>
            <div class="preloader-line">
                <div></div>
            </div>
            <div class="preloader-logo">
                <!-- Generator: Adobe Illustrator 24.0.0, SVG Export Plug-In  -->
                <svg class="line-ic" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="367.6px" height="82.7px"
                    viewBox="0 0 367.6 82.7" style="enable-background:new 0 0 367.6 82.7;" xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill: #CBAE75;
                        }

                        .st1 {
                            fill: #FFFFFF;
                        }

                        .st2 {
                            fill: url(#SVGID_1_);
                        }

                        .st3 {
                            fill: url(#SVGID_2_);
                        }
                    </style>
                    <defs>
                    </defs>
                    <g id="Layer_2_2_">
                        <g id="Layer_7_1_">
                            <g class="text-ic">
                                <path class="st0" d="M100.3,72.7c0.6,0,1.2,0.1,1.7,0.2c0.4,0.1,0.8,0.4,1.2,0.7c0.3,0.3,0.5,0.6,0.7,1c0.3,0.8,0.3,1.8,0,2.6
                    c-0.2,0.4-0.4,0.7-0.7,1c-0.3,0.3-0.8,0.5-1.2,0.7c-0.6,0.2-1.1,0.3-1.7,0.2H99v3.5h-1.9v-9.9L100.3,72.7L100.3,72.7z M100.3,77.7
                    c0.3,0,0.6,0,0.9-0.1c0.2-0.1,0.4-0.2,0.6-0.4c0.2-0.2,0.3-0.4,0.4-0.6s0.1-0.5,0.1-0.8c0-0.2,0-0.5-0.1-0.7s-0.2-0.4-0.4-0.6
                    c-0.2-0.2-0.4-0.3-0.6-0.3c-0.3-0.1-0.6-0.1-0.9-0.1H99v3.6H100.3z" />
                                <path class="st0" d="M118.8,82.6h-1.7c-0.3,0-0.5-0.1-0.7-0.4l-2.1-3.2c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1-0.1-0.3-0.1-0.4-0.1H113
                    v3.9h-1.9v-9.9h3c0.6,0,1.2,0.1,1.7,0.2c0.4,0.1,0.8,0.3,1.2,0.6c0.3,0.2,0.5,0.6,0.7,0.9c0.2,0.4,0.3,0.7,0.3,1.1
                    c0,0.3,0,0.7-0.2,1c-0.1,0.3-0.2,0.6-0.4,0.8c-0.2,0.2-0.4,0.5-0.7,0.6c-0.3,0.2-0.6,0.3-0.9,0.4c0.1,0.1,0.2,0.1,0.3,0.2
                    c0.1,0.1,0.2,0.2,0.3,0.3L118.8,82.6z M114.1,77.4c0.3,0,0.6,0,0.9-0.1c0.2-0.1,0.5-0.2,0.6-0.4c0.2-0.2,0.3-0.3,0.4-0.6
                    c0.1-0.2,0.1-0.5,0.1-0.7c0-0.4-0.2-0.9-0.5-1.2c-0.4-0.3-1-0.4-1.5-0.4H113v3.3L114.1,77.4z" />
                                <path class="st0" d="M134.7,77.6c0,0.7-0.1,1.4-0.4,2c-0.5,1.2-1.4,2.2-2.6,2.7c-0.7,0.3-1.4,0.4-2.1,0.4c-0.7,0-1.4-0.1-2-0.4
                    c-0.6-0.2-1.1-0.6-1.6-1.1c-0.4-0.5-0.8-1-1-1.6c-0.5-1.3-0.5-2.7,0-4c0.2-0.6,0.6-1.1,1-1.6s1-0.8,1.5-1.1c0.6-0.3,1.3-0.4,2-0.4
                    c0.5,0,1,0.1,1.4,0.2s0.8,0.3,1.2,0.5s0.7,0.5,1,0.8c0.6,0.6,1,1.4,1.2,2.2C134.7,76.7,134.7,77.1,134.7,77.6z M132.9,77.6
                    c0-0.5-0.1-1-0.2-1.5c-0.1-0.4-0.3-0.8-0.6-1.1c-0.3-0.3-0.6-0.5-1-0.7s-0.9-0.2-1.3-0.2c-0.4,0-0.9,0.1-1.3,0.2
                    c-0.4,0.2-0.7,0.4-1,0.7c-0.3,0.3-0.5,0.7-0.6,1.1c-0.2,0.5-0.2,1-0.2,1.5s0.1,1,0.2,1.5c0.1,0.4,0.3,0.8,0.6,1.1
                    c0.3,0.3,0.6,0.5,1,0.7s0.9,0.2,1.3,0.2c0.4,0,0.9-0.1,1.3-0.2c0.4-0.2,0.7-0.4,1-0.7c0.3-0.3,0.5-0.7,0.6-1.1
                    C132.8,78.6,132.9,78.1,132.9,77.6z" />
                                <path class="st0" d="M145.1,72.7c0.6,0,1.2,0.1,1.7,0.2c0.4,0.1,0.9,0.4,1.2,0.7c0.3,0.3,0.6,0.6,0.7,1c0.3,0.8,0.3,1.8,0,2.6
                    c-0.2,0.4-0.4,0.7-0.7,1c-0.4,0.3-0.8,0.5-1.2,0.7c-0.5,0.2-1.1,0.3-1.7,0.2h-1.4v3.5h-1.8v-9.9L145.1,72.7L145.1,72.7z
                        M145.1,77.7c0.3,0,0.6,0,0.9-0.1c0.2-0.1,0.4-0.2,0.6-0.4c0.2-0.2,0.3-0.4,0.4-0.6c0.1-0.2,0.1-0.5,0.1-0.8c0-0.2,0-0.5-0.1-0.7
                    s-0.2-0.4-0.4-0.6s-0.4-0.3-0.6-0.3c-0.3-0.1-0.6-0.1-0.9-0.1h-1.4v3.6H145.1z" />
                                <path class="st0"
                                    d="M157.7,74.1v2.8h3.5v1.4h-3.5v2.8h4.4v1.5h-6.3v-10h6.3v1.5C162.1,74.1,157.7,74.1,157.7,74.1z" />
                                <path class="st0" d="M177,82.6h-1.7c-0.3,0-0.5-0.1-0.7-0.4l-2.1-3.2c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1-0.1-0.3-0.1-0.4-0.1H171v3.9
                    h-1.9v-9.9h3c0.6,0,1.2,0.1,1.8,0.2c0.4,0.1,0.8,0.3,1.2,0.6c0.3,0.2,0.5,0.6,0.7,0.9c0.2,0.4,0.2,0.8,0.2,1.2c0,0.3,0,0.7-0.1,1
                    s-0.2,0.6-0.4,0.8c-0.2,0.2-0.4,0.5-0.7,0.6c-0.3,0.2-0.6,0.3-0.9,0.4c0.1,0.1,0.2,0.1,0.3,0.2s0.2,0.2,0.3,0.3L177,82.6z
                        M172.2,77.4c0.3,0,0.6,0,0.9-0.1c0.2-0.1,0.5-0.2,0.6-0.4c0.2-0.2,0.3-0.3,0.4-0.6c0.1-0.2,0.1-0.5,0.1-0.7
                    c0-0.4-0.2-0.9-0.5-1.2c-0.4-0.3-1-0.4-1.5-0.4H171v3.3L172.2,77.4z" />
                                <path class="st0" d="M190.2,74.2h-3v8.4h-1.8v-8.4h-3v-1.5h7.8V74.2z" />
                                <path class="st0" d="M201.3,78.7v3.8h-1.8v-3.8l-3.6-6.1h1.6c0.1,0,0.3,0,0.4,0.1c0.1,0.1,0.2,0.2,0.2,0.3l1.8,3.3
                    c0.1,0.2,0.2,0.4,0.3,0.6s0.1,0.3,0.2,0.5c0.1-0.2,0.1-0.3,0.2-0.5l0.3-0.6l1.8-3.3c0.1-0.1,0.1-0.2,0.2-0.3
                    c0.1-0.1,0.2-0.1,0.4-0.1h1.6L201.3,78.7z" />
                                <path class="st0"
                                    d="M230.4,72.7v9.9h-1.6v-6.4c0-0.3,0-0.5,0-0.8l-3,5.6c-0.1,0.3-0.4,0.4-0.7,0.4h-0.3c-0.3,0-0.5-0.2-0.6-0.4
                    l-3-5.7v0.4c0,0.1,0,0.3,0,0.4v6.4h-1.6v-9.9h1.6h0.2l0.1,0.1c0,0,0.1,0.1,0.1,0.2l3,5.5c0.1,0.2,0.1,0.3,0.2,0.5s0.1,0.3,0.2,0.5
                    c0.1-0.2,0.1-0.3,0.2-0.5s0.1-0.3,0.2-0.4l2.9-5.5c0-0.1,0.1-0.1,0.1-0.2l0.1-0.1h0.2H230.4L230.4,72.7z" />
                                <path class="st0" d="M246.6,82.6h-1.4c-0.1,0-0.3,0-0.4-0.1c-0.1-0.1-0.2-0.2-0.2-0.3l-0.8-2h-4.1l-0.7,2c0,0.1-0.1,0.2-0.2,0.3
                    c-0.1,0.1-0.2,0.1-0.4,0.1H237l3.9-9.9h1.9L246.6,82.6z M243.3,78.8l-1.2-3.3c-0.1-0.2-0.1-0.3-0.2-0.5c-0.1-0.2-0.1-0.4-0.2-0.7
                    c-0.1,0.2-0.1,0.4-0.2,0.7s-0.1,0.4-0.2,0.5l-1.2,3.3H243.3z" />
                                <path class="st0" d="M261.5,72.7v9.9h-0.9c-0.1,0-0.3,0-0.4-0.1s-0.2-0.1-0.3-0.2l-5.2-6.6c0,0.3,0,0.6,0,0.8v6.1h-1.6v-9.9h1.2
                    h0.1l0.1,0.1l0.1,0.2l5.2,6.7c0-0.2,0-0.3,0-0.5s0-0.3,0-0.4v-6L261.5,72.7z" />
                                <path class="st0" d="M277.7,82.6h-1.4c-0.1,0-0.3,0-0.4-0.1s-0.2-0.2-0.2-0.3l-0.7-2h-4.1l-0.7,2c0,0.1-0.1,0.2-0.2,0.3
                    c-0.1,0.1-0.2,0.1-0.4,0.1H268l3.9-9.9h1.9L277.7,82.6z M274.4,78.8l-1.2-3.3c-0.1-0.2-0.1-0.3-0.2-0.5s-0.1-0.4-0.2-0.7
                    c-0.1,0.2-0.1,0.4-0.2,0.7c-0.1,0.2-0.1,0.4-0.2,0.5l-1.2,3.3H274.4z" />
                                <path class="st0" d="M292.1,77.6v4c-0.5,0.4-1,0.6-1.6,0.8c-0.6,0.2-1.2,0.3-1.8,0.3c-0.8,0-1.5-0.1-2.2-0.4
                    c-0.6-0.2-1.2-0.6-1.7-1.1s-0.8-1-1.1-1.6c-0.2-0.6-0.4-1.3-0.4-2s0.1-1.4,0.4-2c0.2-0.6,0.6-1.1,1-1.6c0.5-0.4,1-0.8,1.6-1
                    c0.7-0.3,1.4-0.4,2.1-0.4c0.4,0,0.7,0,1.1,0.1c0.3,0.1,0.7,0.2,1,0.3c0.3,0.1,0.6,0.2,0.8,0.4c0.2,0.2,0.5,0.3,0.7,0.5l-0.5,0.8
                    c-0.1,0.1-0.2,0.2-0.3,0.2c-0.2,0-0.3,0-0.4-0.1l-0.5-0.3c-0.2-0.1-0.3-0.2-0.5-0.2c-0.2-0.1-0.4-0.1-0.6-0.2
                    c-0.3,0-0.5-0.1-0.8-0.1c-0.5,0-0.9,0.1-1.3,0.2c-0.4,0.2-0.7,0.4-1,0.7c-0.3,0.3-0.5,0.7-0.6,1.1c-0.2,0.5-0.2,1-0.2,1.4
                    c0,0.5,0.1,1,0.2,1.5c0.1,0.4,0.4,0.8,0.7,1.1c0.3,0.3,0.7,0.6,1.1,0.7c0.4,0.2,0.9,0.2,1.4,0.2c0.3,0,0.7,0,1-0.1
                    s0.6-0.2,0.8-0.3v-1.8h-1.2c-0.1,0-0.2,0-0.3-0.1c-0.1-0.1-0.1-0.2-0.1-0.2v-1L292.1,77.6z" />
                                <path class="st0"
                                    d="M301.2,74.1v2.8h3.5v1.4h-3.5v2.8h4.4v1.5h-6.3v-10h6.3v1.5C305.6,74.1,301.2,74.1,301.2,74.1z" />
                                <path class="st0"
                                    d="M323.5,72.7v9.9h-1.6v-6.4c0-0.3,0-0.5,0-0.8l-3,5.6c-0.1,0.3-0.4,0.4-0.7,0.4H318c-0.3,0-0.5-0.2-0.6-0.4
                    l-3-5.7v0.4c0,0.1,0,0.3,0,0.4v6.4h-1.6v-9.9h1.6h0.2l0.1,0.1c0,0,0.1,0.1,0.1,0.2l3,5.5c0.1,0.2,0.1,0.3,0.2,0.5s0.1,0.3,0.2,0.5
                    c0.1-0.2,0.1-0.3,0.2-0.5s0.1-0.3,0.2-0.4l2.9-5.5c0-0.1,0.1-0.1,0.1-0.2l0.1-0.1h0.2H323.5L323.5,72.7z" />
                                <path class="st0"
                                    d="M333,74.1v2.8h3.5v1.4H333v2.8h4.4v1.5h-6.2v-10h6.2v1.5C337.4,74.1,333,74.1,333,74.1z" />
                                <path class="st0" d="M352.9,72.7v9.9H352c-0.1,0-0.2,0-0.4-0.1c-0.1-0.1-0.2-0.1-0.3-0.2l-5.2-6.6c0,0.3,0,0.6,0,0.8v6.1h-1.6
                    v-9.9h1.2h0.1l0.1,0.1c0.1,0,0.1,0.1,0.1,0.2l5.2,6.7c0-0.2,0-0.3,0-0.5s0-0.3,0-0.4v-6L352.9,72.7z" />
                                <path class="st0" d="M367.6,74.2h-3v8.4h-1.9v-8.4h-3v-1.5h7.8L367.6,74.2z" />
                            </g>
                            <g class="big-text-ic">
                                <path class="st1" d="M143.4,27.3c0.1,3.8-0.6,7.5-1.9,11c-1.2,3.2-3,6-5.4,8.5c-2.4,2.4-5.2,4.2-8.4,5.5
                    c-3.4,1.3-7.1,1.9-10.8,1.9H97V0.5h20c3.7,0,7.4,0.6,10.8,1.9c3.1,1.2,6,3.1,8.3,5.5c2.4,2.4,4.2,5.3,5.4,8.5
                    C142.9,19.9,143.5,23.6,143.4,27.3z M136,27.3c0-3-0.4-6-1.4-8.8c-0.8-2.4-2.1-4.7-3.8-6.6c-1.7-1.8-3.7-3.2-6-4.1
                    c-2.5-1-5.2-1.5-7.8-1.4h-12.8v41.9H117c2.7,0,5.4-0.4,7.9-1.4c2.3-0.9,4.3-2.3,6-4.1c1.7-1.9,3-4.1,3.8-6.6
                    C135.6,33.3,136.1,30.3,136,27.3L136,27.3z" />
                                <path class="st1" d="M187,48.2v5.9h-33.1V0.5H187v5.9h-25.8v17.8H182v5.7h-20.9v18.3H187z" />
                                <path class="st1" d="M227.5,48v6.1h-30.4V0.5h7.2V48H227.5z" />
                                <path class="st1" d="M291.3,0.5v53.6H285V14.7c0-0.5,0-1.1,0.1-1.7c0-0.6,0.1-1.2,0.1-1.8l-18.4,33.5c-0.4,1-1.5,1.7-2.6,1.7h-1
                    c-1.1,0-2.2-0.6-2.6-1.7L241.8,11c0.1,1.2,0.2,2.4,0.2,3.7v39.4h-6.4V0.5h5.4c0.5,0,1,0,1.5,0.2c0.4,0.2,0.8,0.6,1,1l18.5,33
                    c0.3,0.6,0.6,1.2,0.9,1.9s0.5,1.3,0.8,2c0.2-0.7,0.5-1.3,0.8-2c0.3-0.6,0.6-1.3,0.9-1.9l18.2-33c0.2-0.4,0.6-0.8,1-1
                    c0.5-0.1,1-0.2,1.5-0.2C286.1,0.5,291.3,0.5,291.3,0.5z" />
                                <path class="st1" d="M312.3,54.1H305V0.5h7.3V54.1z" />
                                <path class="st1" d="M363.6,43.1c0.4,0,0.8,0.2,1,0.5l2.9,3.1c-2.2,2.5-4.9,4.6-8,6c-3.6,1.5-7.5,2.2-11.4,2.1
                    c-3.6,0.1-7.2-0.6-10.5-2c-3.1-1.3-5.8-3.2-8-5.6c-2.3-2.5-4-5.5-5.2-8.7c-1.3-3.6-1.9-7.3-1.8-11.1c0-3.8,0.6-7.6,1.9-11.1
                    c1.2-3.2,3-6.2,5.4-8.7c2.3-2.4,5.1-4.4,8.3-5.6c3.4-1.4,7-2,10.7-2c3.4-0.1,6.9,0.6,10.1,1.8c2.9,1.2,5.5,2.9,7.7,5l-2.4,3.3
                    c-0.1,0.2-0.3,0.5-0.6,0.6c-0.3,0.2-0.6,0.3-1,0.2c-0.6-0.1-1.2-0.3-1.6-0.7c-0.8-0.6-1.7-1.1-2.5-1.6c-1.2-0.7-2.5-1.2-3.9-1.7
                    c-1.9-0.5-3.8-0.8-5.8-0.7c-2.6,0-5.2,0.5-7.6,1.4c-2.3,0.9-4.3,2.4-5.9,4.2c-1.7,1.9-3,4.2-3.9,6.7c-1,2.9-1.4,5.9-1.4,8.9
                    s0.4,6.1,1.4,8.9c0.9,2.5,2.2,4.7,3.9,6.7c1.6,1.8,3.6,3.2,5.9,4.1c2.3,1,4.8,1.4,7.3,1.4c1.4,0,2.9-0.1,4.3-0.3
                    c1.2-0.2,2.4-0.5,3.5-0.9s2.1-0.9,3-1.5c1-0.6,1.9-1.4,2.8-2.2C362.7,43.3,363.2,43.1,363.6,43.1z" />
                            </g>

                            <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-29.573" y1="979.0925"
                                x2="74.797" y2="1083.4524" gradientTransform="matrix(1 0 0 1 0 -996)">
                                <stop offset="0" style="stop-color:#FFDEB6" />
                                <stop offset="0.5" style="stop-color:#CBAE75" />
                                <stop offset="1" style="stop-color:#7C6547" />
                            </linearGradient>
                            <g class="ic-img">
                                <path class="st2"
                                    d="M66.3,8.9H12.1L0,15.6V7.2l12.1-6.8h26.5C49.9,0.5,59.4,3.3,66.3,8.9z M75.9,22.1c-0.6-1.7-1.4-3.3-2.3-4.8
                    H12.1L0,24v8.4l12.1-6.8h65C76.8,24.4,76.4,23.2,75.9,22.1L75.9,22.1z M78.5,34.1H12.1L0,40.8v8.4l12.1-6.8h66.3
                    c0.2-1.7,0.3-3.3,0.2-5C78.6,36.2,78.6,35.1,78.5,34.1L78.5,34.1z M12.1,50.8L0,57.5v8.4l12.1-6.8h60.8c1-1.5,1.8-3.1,2.5-4.8
                    c0.5-1.2,0.9-2.4,1.3-3.6L12.1,50.8z M12.1,67.6L0,74.3v8.4l12.1-6.8h24.8c11.6,0,21.3-2.9,28.4-8.4L12.1,67.6z" />
                            </g>

                        </g>
                    </g>
                </svg>
            </div>
        </div>

        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div> <button class="pswp__button pswp__button--close"
                            title="Close (Esc)"></button> <button class="pswp__button pswp__button--share"
                            title="Share"></button> <button class="pswp__button pswp__button--fs"
                            title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom"
                            title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div> <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>

        <noscript id="deferred-styles">
            <link href='<?= $webroot ?>DPM/s/v.css' rel='stylesheet' type='text/css'>
            <link href='<?= $webroot ?>DPM/s/s.css' rel='stylesheet' type='text/css'>
        </noscript>
        <script>
            var loadDeferredStyles = function () {
                var addStylesNode = document.getElementById("deferred-styles"),
                    replacement = document.createElement("div");
                replacement.innerHTML = addStylesNode.textContent;
                addStylesNode.parentNode.insertBefore(replacement, addStylesNode.nextSibling);
                //        document.body.appendChild(replacement);
                addStylesNode.parentElement.removeChild(addStylesNode)
            };
            var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
            if (raf) raf(function () {
                window.setTimeout(loadDeferredStyles, 0);
            });
            else window.addEventListener('load', loadDeferredStyles);
        </script>


        <script>
            var host = '';
            var langId = 'en',
                langPrefix = langId !== 'en' ? '' : '/' + langId;
        </script>

        <script nomodule crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CIntersectionObserver"></script>

        <script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>
        <script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>
        <script src="<?= $webroot ?>js/anime.min.js"></script>
        <script async src="<?= $webroot ?>DPM/j/v.js"></script>
        <script async src="<?= $webroot ?>DPM/j/vendors.js"></script>
        <script async src="<?= $webroot ?>DPM/j/main.js"></script>
    </body>

</html>