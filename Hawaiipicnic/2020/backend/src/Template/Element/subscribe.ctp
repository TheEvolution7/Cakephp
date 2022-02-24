<?php  $banners = $this->getCache('banners_' . $configs['language']); ?>
<div class="cta-section bg-img bg-fixed" data-overlay-dark="7" data-background="<?= $webroot ?>images/banner.jpg">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-7 mb-30">
                <div class="box-cta">
                    <span class="heading-meta"><?= $banners[10][0]->title ?></span>
                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">
                        <?= $banners[10][0]->description ?>
                    </h2>
                    <div class="btn-cta thumb-ani"><a href="<?= $this->url->build(['controller' => 'Products','action'=> 'booking']) ?>" target="_blank"><span>Book Now</span></a></div>
                </div>
                
            </div>
        </div>
    </div>
</div>