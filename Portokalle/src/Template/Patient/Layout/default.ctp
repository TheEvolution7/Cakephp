<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <?= $this->Html->meta(
            'viewport',
            'width=device-width, initial-scale=1.0, maximum-scale=1.0'
        ) ?>
        <title>
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->fetch('meta') ?>
        
        <link rel="stylesheet" media="all" href="<?= $webroot ?>css/app.min.css" />
        <link rel="stylesheet" media="all" href="<?= $webroot ?>css/patient.min.css" />
        <link rel="stylesheet" media="all" href="<?= $webroot ?>css/calendar.css">
        <link rel="stylesheet" href="<?= $webroot ?>css/custom.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" type="text/css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
        <script>
            var viewportmeta = document.querySelector('meta[name="viewport"]');
            if (viewportmeta) {
                if (screen.width < 375) {
                    var newScale = screen.width / 375;
                    viewportmeta.content = "width=375, minimum-scale=" + newScale + ", maximum-scale=1.0, user-scalable=no, initial-scale=" + newScale + "";
                } else {
                    viewportmeta.content = "width=device-width, maximum-scale=1.0, initial-scale=1.0";
                }
            }
        </script>

        <style>
            .patient_sidecard .__container {
              cursor: pointer;
              border-radius: 10px;
              padding: 10px;
              margin-bottom: 10px;
            }

            .patient_sidecard .__container:hover,
            .patient_sidecard .__container.active {
              background-color: lightgray;
              transition: all 150ms ease-in-out;
            }

            .patient-tab-content {
              display: none;
            }

            .patient-tab-content.active {
              display: block;
            }
          </style>
    </head>

    <body>
        <div class="out">
            <div class="page2 js-page2">
                <?= $this->element('header') ?>
                <div class="page2__wrapper">
                    <?= $this->element('sidebar') ?>
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                    
                </div>
            </div>
        </div>

        <script src="<?= $webroot ?>js/lib/jquery.min.js"></script>
        <script src="<?= $webroot ?>js/lib/anime.min.js"></script>
        <script src="<?= $webroot ?>js/lib/readmore.min.js"></script>
        <script src="<?= $webroot ?>js/lib/slick.min.js"></script>
        <script src="<?= $webroot ?>js/lib/aos.js"></script>
        <script src="<?= $webroot ?>js/app.js"></script>
        <script src="<?= $webroot ?>js/lib/common.js"></script>
        <script src="<?= $webroot ?>js/lib/charts.js"></script>
        <?= $this->fetch('script') ?>
        <script>
        $(".records-head").each(function (index) {
          $(this).click(function (event) {
            $(this).parent().toggleClass('active');
            const recordsTags = $(this).parent().children().find('.records-tags');
            recordsTags.toggleClass('active');
            recordsTags.slideToggle();
          })
        });

        var activeTab = '#patient-tab-0';
        const toggleActive = (jItem) => {
          $(jItem).toggleClass('active');
          $(jItem + '-content').toggleClass('active');
        }

        // const showTabContent = (selector)
        $('[id^=patient-tab]').each((index, elem) => {
          if (!elem.id.endsWith('content')) {
            $('#' + elem.id).click((event) => {
              toggleActive(activeTab);
              activeTab = '#' + event.currentTarget.id;
              toggleActive(activeTab);
            })
          }
        })

      </script>

      
    </body>
</html>
