<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $webroot ?>images/topbanner-1.jpeg" alt=""> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta"><?= __('Booking') ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= __('Completed') ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking -->

<div class="booking-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                    <h5 style="text-align: center;"><?= __('Thank You') ?></h5>
                    <div class="card-body" style="text-align: center;"><?= __('Booking Successfully.We will contact you as soon as possible') ?></div>
            </div>
        </div>
    </div>
</div>
