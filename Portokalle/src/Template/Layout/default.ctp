<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?= $this->fetch('title') . ' | ' .  \Cake\Core\Configure::read('Core.setting.site_title') ?></title>
  <?= $this->fetch('meta') ?> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    
  <link rel="stylesheet" media="all" href="<?= $webroot ?>css/app.min.css">
  <link rel="stylesheet" media="all" href="<?= $webroot ?>css/custom.min.css">
  <script>
    var viewportmeta = document.querySelector('meta[name="viewport"]');
    if (viewportmeta) {
      if (screen.width < 375) {
        var newScale = screen.width / 375;
        viewportmeta.content = 'width=375, minimum-scale=' + newScale +
          ', maximum-scale=1.0, user-scalable=no, initial-scale=' + newScale + '';
      } else {
        viewportmeta.content = 'width=device-width, maximum-scale=1.0, initial-scale=1.0';
      }
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="home-page">
     <!-- loading -->
  <div class="loading-container">
    <div class="loading-logo">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      width="1253.3px" height="373.2px" viewBox="0 0 1253.3 373.2" style="enable-background:new 0 0 1253.3 373.2;"
      xml:space="preserve">
      <style type="text/css">
      .st0{fill:#441f4b;}
      .st1{fill:#e76650;}
      .st2{clip-path:url(#SVGID_2_);fill:url(#SVGID_3_);}
      .st3{clip-path:url(#SVGID_5_);fill:url(#SVGID_6_);}
      .st4{clip-path:url(#SVGID_8_);fill:url(#SVGID_9_);}
      .st5{clip-path:url(#SVGID_11_);fill:url(#SVGID_12_);}
      </style>
      <defs>
      </defs>
      <g class="text-loading">
        <g class="p-chart">
          <path class="st0" d="M104.5,210.9c9.4,5.3,16.8,12.7,22.2,22.3c5.4,9.6,8.1,20.7,8.1,33.5c0,12.7-2.7,23.9-8.1,33.5
          c-5.4,9.6-12.8,17-22.2,22.3c-9.4,5.3-19.9,7.9-31.4,7.9c-15.8,0-28.2-5-37.3-15v57.7H0V204.8h34.3v14.3
          c8.9-10.7,21.9-16.1,38.9-16.1C84.6,203,95.1,205.6,104.5,210.9 M89.6,291.6c5.9-6.2,8.9-14.5,8.9-25c0-10.4-3-18.7-8.9-25
          c-5.9-6.2-13.5-9.3-22.7-9.3c-9.2,0-16.8,3.1-22.7,9.3c-5.9,6.2-8.9,14.5-8.9,25c0,10.4,3,18.7,8.9,25c5.9,6.2,13.5,9.3,22.7,9.3
          C76.1,300.9,83.7,297.8,89.6,291.6"/>
        </g>
        <g>
          <g class="o-chart">
            <path class="st1" d="M194,320.5c-13.4-7.2-23.9-17.1-31.5-29.8c-7.6-12.6-11.4-26.9-11.4-42.7c0-15.8,3.8-30,11.4-42.7
            c7.6-12.7,18.1-22.6,31.5-29.8c13.4-7.2,28.5-10.8,45.2-10.8c16.7,0,31.7,3.6,45.1,10.8c13.3,7.2,23.8,17.1,31.5,29.8
            c7.7,12.7,11.5,26.9,11.5,42.7c0,15.8-3.8,30-11.5,42.7c-7.7,12.7-18.2,22.6-31.5,29.8c-13.3,7.2-28.4,10.8-45.1,10.8
            C222.5,331.3,207.4,327.7,194,320.5 M265,293c7.7-4.4,13.7-10.5,18.1-18.3s6.6-16.7,6.6-26.7c0-10-2.2-18.9-6.6-26.7
            c-4.4-7.8-10.4-13.9-18.1-18.3c-7.7-4.4-16.3-6.6-25.8-6.6c-9.5,0-18.1,2.2-25.8,6.6c-7.7,4.4-13.7,10.5-18.1,18.3
            c-4.4,7.8-6.6,16.7-6.6,26.7c0,10,2.2,18.9,6.6,26.7s10.4,13.9,18.1,18.3c7.7,4.4,16.3,6.6,25.8,6.6
            C248.7,299.6,257.3,297.4,265,293"/>
          </g>
          
          <g class="leaf-loading">
          <defs>
            <path id="SVGID_1_" d="M216.7,153.9c0.4-21.2-4.8-39.9-15.6-56.2c16.9,13.6,24,32.3,21.5,56.3c22.9-44.6,2-73.5-62.6-86.6
              C178.7,91.1,143.4,143.9,216.7,153.9"/>
          </defs>
          <clipPath id="SVGID_2_">
            <use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
          </clipPath>
          
            <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-75.0391" y1="705.9382" x2="-74.243" y2="705.9382" gradientTransform="matrix(43.0958 -25.5985 25.5985 43.0958 -14662.4805 -32223.2344)">
            <stop  offset="0" style="stop-color:#d4ebe5"/>
            <stop  offset="1" style="stop-color:#d4ebe5"/>
          </linearGradient>
          <polygon class="st2" points="169.2,198.3 276.1,134.8 210.8,24.7 103.8,88.2 		"/>
          <defs>
            <path id="SVGID_4_" d="M325.8,64.2c-65.7,0-94.1,29.7-85.3,89.1c7.3-32.9,25.3-54.5,53.8-64.9c-21.7,16.7-37.1,39.1-46,67.4
              c10.3,2,19.3,2.9,27.3,2.9h0.1c70.1,0,54.8-71.4,86.7-92c-13.1-1.7-25.2-2.5-36.2-2.5H325.8z"/>
          </defs>
          <clipPath id="SVGID_5_">
            <use xlink:href="#SVGID_4_"  style="overflow:visible;"/>
          </clipPath>
          
            <linearGradient id="SVGID_6_" gradientUnits="userSpaceOnUse" x1="-71.697" y1="705.6496" x2="-70.697" y2="705.6496" gradientTransform="matrix(-32.11 -38.49 38.49 -32.11 -29151.2246 20027.5605)">
            <stop  offset="0" style="stop-color:#d4ebe5"/>
            <stop  offset="1" style="stop-color:#d4ebe5"/>
          </linearGradient>
          <polygon class="st3" points="408.8,120 308.7,0 185.2,103 285.3,223 		"/>
          </g>
        </g>
        <g class="ani-text-chart">
        <path class="st0" d="M404.5,207.6c7.3-3.1,15.7-4.6,25.2-4.6v33.1c-4-0.3-6.7-0.5-8-0.5c-10.3,0-18.3,2.9-24.2,8.6
        c-5.8,5.8-8.7,14.4-8.7,25.9v58.4h-35.9V204.8h34.3v16.3C391.4,215.2,397.2,210.6,404.5,207.6"/>
        <path class="st0" d="M535.2,322.6c-3.5,2.6-7.9,4.6-13,5.9c-5.1,1.3-10.5,2-16.2,2c-14.7,0-26.1-3.8-34.2-11.3
        c-8-7.5-12.1-18.6-12.1-33.1v-50.8h-19.1v-27.6h19.1v-30.1h35.9v30.1h30.8v27.6h-30.8v50.4c0,5.2,1.3,9.2,4,12.1
        c2.7,2.8,6.5,4.3,11.4,4.3c5.7,0,10.5-1.5,14.5-4.6L535.2,322.6z"/>
        <path class="st0" d="M575.4,322.2c-10.3-5.4-18.4-13-24.3-22.7c-5.8-9.7-8.7-20.6-8.7-32.9c0-12.3,2.9-23.2,8.7-32.9
        c5.8-9.7,13.9-17.2,24.3-22.7c10.4-5.4,22-8.2,35.1-8.2c13,0,24.7,2.7,35,8.2c10.3,5.4,18.3,13,24.2,22.7
        c5.8,9.7,8.7,20.6,8.7,32.9c0,12.3-2.9,23.2-8.7,32.9c-5.8,9.7-13.9,17.2-24.2,22.7c-10.3,5.4-21.9,8.2-35,8.2
        C597.4,330.4,585.7,327.7,575.4,322.2 M633.1,291.6c5.9-6.2,8.9-14.5,8.9-25c0-10.4-3-18.7-8.9-25c-5.9-6.2-13.5-9.3-22.7-9.3
        c-9.2,0-16.8,3.1-22.8,9.3c-6,6.2-9,14.5-9,25c0,10.4,3,18.7,9,25c6,6.2,13.6,9.3,22.8,9.3C619.6,300.9,627.2,297.8,633.1,291.6"/>
        <polygon class="st0" points="755.4,280 738.1,297 738.1,328.5 702.2,328.5 702.2,157.9 738.1,157.9 738.1,254.5 790.5,204.8 
        833.3,204.8 781.8,257.2 837.9,328.5 794.5,328.5 	"/>
        <path class="st0" d="M945.8,216.6c10.3,9.1,15.4,22.9,15.4,41.3v70.6h-33.6v-15.4c-6.7,11.5-19.3,17.3-37.7,17.3
        c-9.5,0-17.8-1.6-24.7-4.8c-7-3.2-12.3-7.7-16-13.3c-3.7-5.7-5.5-12.1-5.5-19.3c0-11.5,4.3-20.5,13-27.1c8.7-6.6,22-9.9,40.1-9.9
        h28.5c0-7.8-2.4-13.8-7.1-18.1c-4.8-4.2-11.9-6.3-21.4-6.3c-6.6,0-13.1,1-19.4,3.1c-6.4,2.1-11.8,4.9-16.2,8.4l-12.9-25.1
        c6.7-4.8,14.8-8.4,24.3-11c9.4-2.6,19.1-3.9,29.1-3.9C920.8,203,935.5,207.5,945.8,216.6 M915.2,302c4.8-2.8,8.1-7,10.1-12.5v-12.7
        h-24.6c-14.7,0-22.1,4.8-22.1,14.5c0,4.6,1.8,8.2,5.4,10.9c3.6,2.7,8.5,4,14.8,4C905,306.2,910.5,304.8,915.2,302"/>
        <rect x="993.6" y="157.9" class="st0" width="35.9" height="170.7"/>
        <rect x="1062.9" y="157.9" class="st0" width="35.9" height="170.7"/>
        <path class="st0" d="M1252.6,276.8H1159c1.7,7.7,5.7,13.7,12,18.2c6.3,4.5,14.1,6.7,23.5,6.7c6.4,0,12.2-1,17.1-2.9
        c5-1.9,9.6-4.9,13.9-9.1l19.1,20.7c-11.7,13.3-28.7,20-51.1,20c-14,0-26.3-2.7-37-8.2c-10.7-5.4-19-13-24.8-22.7
        c-5.8-9.7-8.7-20.6-8.7-32.9c0-12.1,2.9-23,8.6-32.8c5.8-9.7,13.6-17.3,23.7-22.8c10-5.4,21.3-8.2,33.7-8.2
        c12.1,0,23.1,2.6,32.9,7.8c9.8,5.2,17.5,12.7,23.1,22.4c5.6,9.7,8.4,21,8.4,33.9C1253.3,267.6,1253.1,270.8,1252.6,276.8
          M1168.7,237c-5.5,4.6-8.9,10.9-10.1,18.9h61c-1.2-7.8-4.6-14.1-10.1-18.7c-5.5-4.7-12.3-7-20.2-7
        C1181,230.1,1174.2,232.4,1168.7,237"/>
        </g>
      </g>
      </svg>
    </div>
  </div>
  <?php 
    $banners = $this->getCache('banners_' . $configs['language']);
  ?> 
   <!-- loading -->
    <div class="outer">
        <?= $this->element('header') ?>
        <div class="top-banner">
           <?= $banners[16][0]->title ?>
            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'howItWork']) ?>"><?= $banners[16][0]->description ?></a>   
        </div>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('footer') ?>
    </div>
 <!-- scripts-->
  <script src="<?= $webroot ?>js/lib/jquery.min.js"></script>
  <!-- <script src="js/home/lottie.js"></script> -->
  <script src="<?= $webroot ?>js/lib/jquery.mask.min.js"></script>
  <script src="<?= $webroot ?>js/lib/readmore.min.js"></script>
  <script src="<?= $webroot ?>js/lib/anime.min.js"></script>
  <script src="<?= $webroot ?>js/lib/slick.min.js"></script>
  <script src="<?= $webroot ?>js/lib/aos.js"></script>
  <script src="<?= $webroot ?>js/app.js"></script>
  <script src="<?= $webroot ?>js/lib/common.js"></script>


  <script>
      $('#box-bc').fadeOut();
      $('#box-qc').fadeOut();
      $('.box-licensure input[type="checkbox"]').on('change', function(){
          console.log('aaa')
          
          if ($('input#input-bc').is(':checked')) {
            console.log('aaa')
              setTimeout(() => {
                  $('#box-bc').fadeIn();
              }, 300);
              
          }
          else {
            $('#box-bc').fadeOut();
          }
          if ($('input#input-qc').is(':checked')) {
              
              setTimeout(() => {
                  $('#box-qc').fadeIn();
              }, 300);
              
          }
          else {
            $('#box-qc').fadeOut();
          }

          
      })  
    </script>
  <!-- <script>
    var animation;
    if (bodymovin.loadAnimation) {
        animation = bodymovin.loadAnimation({
            container: document.getElementById('bm14806'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: "js/home.json",
            assetsPath: "img/home/banner/ani/"
        });
        console.log('ae 1');
        animation.pause();
    } else {
        console.log('ae 0');
    }
    jQuery('#bm14806').hover(function() {
        animation.pause();
    }).mouseleave(function() {
        animation.play();
    }).on('keypress', function(e) {
        if (e.which == 13 || e.which == 32) {
            e.preventDefault();
            if (animation.isPaused) {
                animation.play();
            } else {
                animation.pause();
            }
        }
    });
    jQuery('#pause').click(function(e) {
        e.preventDefault();
        animation.pause();
    });
    jQuery('#play').click(function(e) {
        e.preventDefault();
        animation.play();
    });
  </script> -->
  <!-- svg sprite-->
  <div style="display: none"><svg width="0" height="0">
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" id="icon-arrow-right">
        <path
          d="M2.281 11.747h14.345l-6.273 6.276a1.24 1.24 0 0 0 0 1.793 1.24 1.24 0 0 0 1.793 0l8.323-8.325c.513-.587.513-1.462 0-2.049l-8.325-8.325a1.24 1.24 0 0 0-1.793 0h0a1.24 1.24 0 0 0 0 1.793l6.275 6.275H2.281A1.21 1.21 0 0 0 1 10.466a1.21 1.21 0 0 0 1.281 1.281z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" id="icon-arrow-left">
        <path
          d="M19.571 9.185H5.226l6.273-6.276a1.24 1.24 0 0 0 0-1.793 1.24 1.24 0 0 0-1.793 0L1.383 9.441c-.513.587-.513 1.462 0 2.049l8.325 8.325a1.24 1.24 0 0 0 1.793 0h0a1.24 1.24 0 0 0 0-1.793l-6.275-6.275h14.345a1.21 1.21 0 0 0 1.281-1.281 1.21 1.21 0 0 0-1.281-1.281z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28" id="icon-dribbble">
        <path
          d="M14 28C6.268 28 0 21.732 0 14S6.268 0 14 0s14 6.268 14 14c-.011 7.728-6.273 13.99-14 14h0zm11.807-12.084c-2.417-.703-4.957-.877-7.448-.511a51.72 51.72 0 0 1 2.324 8.526c2.741-1.851 4.596-4.751 5.127-8.015h-.003zm-7.134 9.109c-.563-3.096-1.419-6.131-2.555-9.065l-.077.023c-6.755 2.351-9.17 7.029-9.38 7.467 3.416 2.667 8.011 3.271 12 1.577l.012-.002zm-13.557-3.01c2.253-3.656 5.68-6.439 9.721-7.893.157-.052.315-.1.472-.14-.3-.682-.63-1.361-.971-2.03-3.996 1.143-8.134 1.716-12.29 1.7v.364a11.92 11.92 0 0 0 3.073 8l-.005-.001zM2.292 11.568a44.4 44.4 0 0 0 11.057-1.456C11.996 7.73 10.517 5.423 8.916 3.2a11.99 11.99 0 0 0-6.622 8.365l-.002.003zM11.2 2.394c1.637 2.234 3.126 4.572 4.459 7a13.49 13.49 0 0 0 6.269-4.319A11.93 11.93 0 0 0 11.2 2.39v.004zm12.057 4.063c-1.78 2.123-4.081 3.747-6.678 4.713.28.572.548 1.149.793 1.734.093.21.175.42.257.618a28 28 0 0 1 8.33.385c-.017-2.717-.969-5.345-2.695-7.443l-.007-.007z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 20" id="icon-youtube">
        <path
          d="M28.406 3.052c-.162-.587-.472-1.122-.9-1.554A3.5 3.5 0 0 0 25.968.59c-2.182-.591-10.963-.591-10.963-.591S6.249-.016 4.045.591a3.5 3.5 0 0 0-1.538.908c-.428.432-.738.967-.9 1.554a37.21 37.21 0 0 0-.609 6.844 37.21 37.21 0 0 0 .611 6.816c.162.587.472 1.122.9 1.555a3.5 3.5 0 0 0 1.538.908c2.179.592 10.963.592 10.963.592s8.757 0 10.963-.592a3.5 3.5 0 0 0 1.538-.908c.428-.432.738-.968.9-1.554a37.22 37.22 0 0 0 .583-6.818c.015-2.294-.181-4.585-.588-6.844h0zM12.205 14.129v-8.48l7.308 4.247-7.308 4.233z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 28" id="icon-facebook">
        <path
          d="M9.087 27.994V15.225h4.128l.618-4.977H9.087V7.071c0-1.441.385-2.423 2.375-2.423H14V.2a32.77 32.77 0 0 0-3.7-.2C6.641 0 4.136 2.319 4.136 6.578v3.67H0v4.977h4.138v12.77l4.949-.001z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 24" id="icon-twitter">
        <path
          d="M27.946 3.331c-1.05.461-2.162.764-3.3.9 1.197-.719 2.094-1.848 2.524-3.177-1.131.659-2.364 1.125-3.648 1.381A5.74 5.74 0 0 0 13.6 6.357c0 .442.05.882.148 1.312-4.616-.221-8.919-2.396-11.835-5.981-.515.875-.783 1.872-.777 2.887a5.74 5.74 0 0 0 2.553 4.78 5.72 5.72 0 0 1-2.6-.719v.071c-.002 2.733 1.922 5.088 4.6 5.632-.842.227-1.724.261-2.581.1a5.76 5.76 0 0 0 5.371 3.986c-2.031 1.593-4.538 2.458-7.119 2.456-.454-.001-.908-.027-1.36-.079a16.33 16.33 0 0 0 8.816 2.573c10.563 0 16.332-8.745 16.332-16.317 0-.244 0-.49-.017-.735A11.59 11.59 0 0 0 28 3.354l-.054-.023z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-google-play">
        <path
          d="M12 10.286v4.115h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.135-.067-7.452-3.438-7.452-7.574S7.865 4.494 12 4.427c1.776-.037 3.495.627 4.785 1.849l3.254-3.138C17.867 1.09 14.985-.035 12 .001c-6.627 0-12 5.373-12 12s5.373 12 12 12c6.926 0 11.52-4.869 11.52-11.726-.002-.667-.065-1.333-.189-1.989H12z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 27" id="icon-app-store">
        <path
          d="M18.173 14.546a5.88 5.88 0 0 0 3.587 5.376 14.5 14.5 0 0 1-1.849 3.779c-1.114 1.619-2.27 3.232-4.091 3.265-1.789.033-2.365-1.055-4.411-1.055s-2.684 1.018-4.378 1.088c-1.758.066-3.1-1.75-4.219-3.363-2.295-3.3-4.049-9.322-1.694-13.388 1.13-2.005 3.23-3.269 5.53-3.33 1.725-.033 3.352 1.155 4.41 1.155s3.034-1.428 5.116-1.218c1.951.068 3.759 1.043 4.888 2.636-1.77 1.075-2.861 2.986-2.888 5.056l-.001-.001zM14.81 4.672A5.83 5.83 0 0 0 16.2.429a6 6 0 0 0-3.937 2.014 5.54 5.54 0 0 0-1.418 4.11c1.542.023 3.007-.672 3.965-1.881z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon-github">
        <path
          d="M12 .003A12 12 0 0 0 .156 10.078 12 12 0 0 0 8.2 23.385c.6.113.82-.258.82-.577l-.015-2.04c-3.338.724-4.042-1.61-4.042-1.61a3.18 3.18 0 0 0-1.33-1.755c-1.087-.744.084-.729.084-.729.771.106 1.449.562 1.838 1.236.328.599.882 1.041 1.539 1.229s1.361.105 1.956-.229a2.56 2.56 0 0 1 .76-1.6c-2.665-.3-5.466-1.332-5.466-5.93a4.63 4.63 0 0 1 1.235-3.227c-.375-1.033-.338-2.17.105-3.176 0 0 1.005-.322 3.3 1.23 1.964-.54 4.036-.54 6 0 2.28-1.552 3.285-1.23 3.285-1.23.436 1.006.479 2.14.12 3.176a4.65 4.65 0 0 1 1.23 3.22c0 4.61-2.805 5.625-5.475 5.92.576.59.871 1.398.81 2.22l-.015 3.286c0 .315.21.69.825.57 5.589-1.845 9.012-7.476 8.076-13.287S17.886-.001 12 .003">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" id="icon-linkedin">
        <path
          d="M21.3 21.3h-3.7v-5.8c0-1.383-.028-3.164-1.929-3.164-1.93 0-2.225 1.505-2.225 3.061v5.9h-3.7V9.375H13.3V11h.048a3.9 3.9 0 0 1 3.51-1.927c3.751 0 4.445 2.469 4.445 5.682L21.3 21.3zM5.559 7.743a2.15 2.15 0 0 1-.001-4.3 2.15 2.15 0 0 1 1.522 3.67 2.15 2.15 0 0 1-1.521.63h0zM7.416 21.3H3.7V9.375h3.716V21.3zM23.151 0H1.845C.839-.012.013.794 0 1.8v21.4A1.82 1.82 0 0 0 1.845 25h21.3A1.83 1.83 0 0 0 25 23.2V1.8A1.83 1.83 0 0 0 23.148 0h.003z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" id="icon-instagram">
        <path
          d="M12.5 0L7.347.075C6.31.096 5.284.293 4.312.656A6.12 6.12 0 0 0 2.1 2.1 6.1 6.1 0 0 0 .656 4.312a9.19 9.19 0 0 0-.581 3.035L0 12.5l.075 5.153c.022 1.037.218 2.063.581 3.034A6.13 6.13 0 0 0 2.1 22.9c.624.636 1.38 1.129 2.215 1.442.972.363 1.997.559 3.034.581L12.5 25l5.153-.075a9.25 9.25 0 0 0 3.034-.581 6.39 6.39 0 0 0 3.656-3.656 9.22 9.22 0 0 0 .581-3.034L25 12.5l-.075-5.153c-.022-1.037-.219-2.062-.581-3.034-.315-.834-.808-1.589-1.444-2.213A6.09 6.09 0 0 0 20.688.656a9.2 9.2 0 0 0-3.035-.581L12.5 0zm0 2.25l5.052.074c.792.009 1.577.156 2.32.432 1.092.418 1.955 1.28 2.373 2.372a6.9 6.9 0 0 1 .43 2.32l.073 5.052-.077 5.052c-.015.793-.163 1.577-.439 2.32a3.97 3.97 0 0 1-.936 1.44 3.9 3.9 0 0 1-1.438.933 6.95 6.95 0 0 1-2.328.43l-5.061.073c-3.343 0-3.735-.016-5.061-.077a7.09 7.09 0 0 1-2.329-.439 3.87 3.87 0 0 1-1.437-.932 3.8 3.8 0 0 1-.942-1.442c-.275-.746-.423-1.533-.437-2.328L2.2 12.484l.064-5.064c.014-.794.161-1.581.436-2.326.196-.547.517-1.039.938-1.439a3.7 3.7 0 0 1 1.44-.935 6.92 6.92 0 0 1 2.314-.439l5.061-.062.047.031zm0 3.831A6.42 6.42 0 0 0 6.081 12.5a6.42 6.42 0 0 0 6.419 6.419A6.42 6.42 0 0 0 17.039 7.96a6.42 6.42 0 0 0-4.539-1.879h.001zm0 10.585c-1.685 0-3.205-1.015-3.85-2.573s-.288-3.35.904-4.541 2.984-1.548 4.541-.903 2.572 2.165 2.572 3.851c0 1.104-.438 2.164-1.22 2.946s-1.841 1.221-2.947 1.221l-.001-.001zm8.173-10.838a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 26" id="icon-play">
        <path
          d="M2.388 25.683l13.296-11.6c.214-.187.336-.458.336-.742s-.122-.555-.336-.742L2.384.929C2.092.678 1.681.619 1.33.779s-.576.509-.577.894V24.94c0 .387.226.738.578.898s.765.099 1.056-.155h0z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 20" id="icon-arrow-prev">
        <path
          d="M10.905 19.061a1.5 1.5 0 0 1-2.121 0L.938 11.217a1.5 1.5 0 0 1 0-2.121L8.783 1.25a1.5 1.5 0 0 1 2.121 2.121L4.12 10.156l6.784 6.783a1.5 1.5 0 0 1 0 2.121z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 20" id="icon-arrow-next">
        <path
          d="M.939 1.25a1.5 1.5 0 0 1 2.121 0l7.845 7.844a1.5 1.5 0 0 1 0 2.121l-7.845 7.845a1.5 1.5 0 0 1-2.121-2.121l6.784-6.784L.939 3.372a1.5 1.5 0 0 1 0-2.121z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="icon-close">
        <path
          d="M15.061 3.061A1.5 1.5 0 1 0 12.939.939L8 5.879 3.061.939A1.5 1.5 0 0 0 .939 3.061L5.879 8 .939 12.939a1.5 1.5 0 1 0 2.121 2.121L8 10.121l4.939 4.939a1.5 1.5 0 1 0 2.121-2.121L10.121 8l4.939-4.939z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 15" id="icon-check">
        <path
          d="M21.077.456a1.5 1.5 0 0 1-.033 2.121l-12.375 12a1.5 1.5 0 0 1-2.088 0L.956 9.122a1.5 1.5 0 0 1 2.089-2.154l4.581 4.442L18.956.423a1.5 1.5 0 0 1 2.121.033z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 43" id="icon-producthunt">
        <path
          d="M24.378 15.05h-6.1v6.45h6.1c1.781 0 3.225-1.444 3.225-3.225s-1.444-3.225-3.225-3.225h0zM21.504 0C9.63 0 .004 9.626.004 21.5S9.63 43 21.504 43s21.5-9.626 21.5-21.5S33.378 0 21.504 0h0zm2.874 25.8h-6.1v6.45h-4.3v-21.5h10.4c2.689-.001 5.174 1.433 6.519 3.762s1.345 5.198 0 7.527-3.83 3.763-6.519 3.762h0z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 41 42" id="icon-google">
        <path
          d="M20.678 18v7.2h11.726c-.474 3.089-3.542 9.055-11.725 9.055C13.484 34.124 7.752 28.195 7.865 21A13.06 13.06 0 0 1 20.678 7.745c3.069-.06 6.036 1.104 8.244 3.236l5.606-5.491A19.67 19.67 0 0 0 20.678 0 20.82 20.82 0 0 0 .005 21a20.82 20.82 0 0 0 20.673 21c11.933 0 19.847-8.521 19.847-20.521A19.43 19.43 0 0 0 40.199 18H20.678z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 23" id="icon-light">
        <path
          d="M11.438.563a1.5 1.5 0 0 0-1.5 1.5V3.75a1.5 1.5 0 0 0 1.5 1.5h.125a1.5 1.5 0 0 0 1.5-1.5V2.063a1.5 1.5 0 0 0-1.5-1.5h-.125zm4.248 6.719a1.5 1.5 0 0 1 0-2.121l1.193-1.193a1.5 1.5 0 0 1 2.121 0l.088.088a1.5 1.5 0 0 1 0 2.121L17.895 7.37a1.5 1.5 0 0 1-2.121 0l-.088-.088zm2.064 4.156a1.5 1.5 0 0 1 1.5-1.5h1.688a1.5 1.5 0 0 1 1.5 1.5v.125a1.5 1.5 0 0 1-1.5 1.5H19.25a1.5 1.5 0 0 1-1.5-1.5v-.125zm-2.064 6.458a1.5 1.5 0 0 1 0-2.121l.088-.088a1.5 1.5 0 0 1 2.121 0l1.193 1.193a1.5 1.5 0 0 1 0 2.121l-.088.088a1.5 1.5 0 0 1-2.121 0l-1.193-1.193zM.563 11.438a1.5 1.5 0 0 1 1.5-1.5H3.75a1.5 1.5 0 0 1 1.5 1.5v.125a1.5 1.5 0 0 1-1.5 1.5H2.063a1.5 1.5 0 0 1-1.5-1.5v-.125zm9.375 7.813a1.5 1.5 0 0 1 1.5-1.5h.125a1.5 1.5 0 0 1 1.5 1.5v1.688a1.5 1.5 0 0 1-1.5 1.5h-.125a1.5 1.5 0 0 1-1.5-1.5V19.25zM3.967 4.055a1.5 1.5 0 0 0 0 2.121L5.16 7.37a1.5 1.5 0 0 0 2.121 0l.088-.088a1.5 1.5 0 0 0 0-2.121L6.177 3.967a1.5 1.5 0 0 0-2.121 0l-.088.088zm0 12.824a1.5 1.5 0 0 0 0 2.121l.088.088a1.5 1.5 0 0 0 2.121 0l1.193-1.193a1.5 1.5 0 0 0 0-2.121l-.088-.088a1.5 1.5 0 0 0-2.121 0l-1.193 1.193zM8.375 11.5c0 1.726 1.399 3.125 3.125 3.125s3.125-1.399 3.125-3.125-1.399-3.125-3.125-3.125S8.375 9.774 8.375 11.5z">
        </path>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 23" id="icon-dark">
        <path
          d="M11.596.5H11.5C5.425.5.5 5.425.5 11.5s4.925 11 11 11c4.072 0 7.627-2.212 9.529-5.5-6.031-.052-10.904-4.957-10.904-11A10.95 10.95 0 0 1 11.596.5z">
        </path>
      </symbol>
    </svg>
  </div>
</body>

</html>