<?php $banners = $this->getCache('banners_' . $configs['language']); ?>    
<header class="page-header">
    <div class="background-image-holder parallax-background">
        <img class="background-image" alt="<?= $banners[18][0]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[18][0]->id . DS . $banners[18][0]->image ) ?>">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <span class="text-white alt-font"><?= $banners[18][0]->description ?></span>
                <h1 class="text-white"><?= $banners[18][0]->title ?></h1>
                
            </div>
        </div><!--end of row-->
    </div><!--end of container-->
</header>
<section class="step-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-booking">
                    <h2><?= $banners[18][1]->title ?></h2>
                    <p><?= $banners[18][1]->description ?></p>
                </div>
            </div>
            <div class="col-12">
                <ul class="steps">
                    <li class="<?= $this->request->getParam('action') == 'booking' ? 'active' : '' ?>">
                        <a href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span><?= __('Step 1') ?></span>
                        </a>
                    </li>
                    <li class="<?= $this->request->getParam('controller') == 'Carts' && $this->request->getParam('action') == 'bookingLeiGreeting' ? 'active' : '' ?>">
                        <a href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span><?= __('Step 2') ?></span>
                        </a>
                    </li>
                    <li class="<?= $this->request->getParam('controller') == 'Carts' && $this->request->getParam('action') == 'pickup' ? 'active' : '' ?>"> 
                        <a href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span><?= __('Step 3') ?></span>
                        </a>
                    </li>
                    <li class="<?= $this->request->getParam('controller') == 'Carts' && $this->request->getParam('action') == 'information' || $this->request->getParam('controller') == 'Carts' && $this->request->getParam('action') == 'stripe' ? 'active' : '' ?>">
                        <a href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span><?= __('Step 4') ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
