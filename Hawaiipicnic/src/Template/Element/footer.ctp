<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<div class="cta-section bg-img bg-fixed" data-overlay-dark="7" data-background="<?= $this->Url->build('/uploads/banners/' . $banners[4][0]->id . DS . $banners[4][0]->image ) ?>">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-7 mb-30">
                <div class="box-cta">
                    <span class="heading-meta"><?= $banners[4][0]->title ?></span>
                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">
                        <?= $banners[4][0]->description ?>
                    </h2>
                    <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'booking']) ?>" target="_blank"><span><?= __('Book Now') ?></span></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="pwe-footer2">
    <div class="pwe-narrow-content">
        <div class="row">
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>" class="logo-footer">
                    <img src="<?= $this->Url->build('/uploads/banners/' . $banners[4][1]->id . DS . $banners[4][1]->image ) ?>" alt="<?= $banners[4][1]->title ?>">
                </a>
                <div class="site-footer fixmenu">
                    <div class="menu-footer">
                        <ul class="social-icon">
                            <?php foreach($banners[3] as $banner): ?>
                                <li><a href="<?= $banner->url ?>" target="_blank"><?= $banner->description ?></a></li>
                            <?php endforeach ?>  
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <h6><?= $banners[4][2]->title ?></h6>
                <p><?= $banners[4][2]->description ?></p>
                <h6><?= $banners[4][3]->title ?></h6>
                <p><?= $banners[4][3]->description ?></p>
            </div>
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <h6><?= $banners[4][4]->title ?></h6>
                <p><?= $banners[4][4]->description ?></p>
                <p class="copyright"><?= $banners[4][5]->title ?></p>
            </div>
        </div>
    </div>
</div>