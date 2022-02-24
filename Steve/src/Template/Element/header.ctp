<?php $banners = $this->getCache('banners_' . $configs['language']); ?>    
<section class="page_toplogo text-xs-center table_section ls">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center text-sm-left">
                <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>" class="logo top_logo">
                    <img src="<?= $this->Url->build('/uploads/settings/1/' . \Cake\Core\Configure::read('Core.setting.image')) ?>" alt="<?= \Cake\Core\Configure::read('Core.setting.site_title') ?>">
                </a>
            </div>
            <div class="col-sm-8 text-sm-right">
                <div class="media small-teaser">

                    <div class="media-left">
                        <div class="teaser_icon highlight fontsize_18">
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4>
                            Phone:
                        </h4>
                        <p>
                            <?= \Cake\Core\Configure::read('Core.setting.phone_number') ?>
                        </p>
                    </div>
                </div>

                <div class="media small-teaser">

                    <div class="media-left">
                        <div class="teaser_icon highlight fontsize_18">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4>
                            Email:
                        </h4>
                        <p>
                            <?= \Cake\Core\Configure::read('Core.setting.email') ?>
                        </p>
                    </div>
                </div>
                <div class="inline-block">
                    <a href="<?= \Cake\Core\Configure::read('Core.setting.twitter_url') ?>" class="social-icon border-icon color-icon rounded-icon soc-twitter"></a>
                    <a href="<?= \Cake\Core\Configure::read('Core.setting.facebook_url') ?>" class="social-icon border-icon color-icon rounded-icon soc-facebook"></a>
                    <a href="<?= \Cake\Core\Configure::read('Core.setting.google_plus_url') ?>" class="social-icon border-icon color-icon rounded-icon soc-google"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<header class="page_header header_darkgrey bordered_items">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-left text-md-center">
                <div class="logo_wrapper">

                    <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>" class="logo">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banners[4][0]->id . DS . $banners[4][0]->image ) ?>" alt="<?= $banners[4][0]->title ?>">
                        
                    </a>

                </div>
                <!-- header toggler -->
                <span class="toggle_menu">
                    <span></span>
                </span>
                <!-- main nav start -->
                <nav class="mainmenu_wrapper">
                    <ul class="mainmenu nav sf-menu">
                        <li class="<?= $this->request->getParam('action') == 'home' ? 'active' : '' ?>">
                            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home</a>
                        </li>
                        <li class="<?= $this->request->getParam('action') == 'about' ? 'active' : '' ?>">
                            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>">About Us</a>  
                        </li>									
                        <li class="<?= $this->request->getParam('action') == 'services' || $this->request->getParam('action') == 'serviceDetails' ? 'active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'services']) ?>">Services</a></li>
                        <li class="<?= $this->request->getParam('controller') == 'Products' &&  $this->request->getParam('action') == 'index' || $this->request->getParam('controller') == 'Products' &&  $this->request->getParam('action') == 'details' ? 'active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'index']) ?>">Products</a></li>
                        <li class="<?= $this->request->getParam('action') == 'projects' || $this->request->getParam('action') == 'projectDetails' ? 'active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Albums','action' => 'projects']) ?>">Projects</a></li>
                        <li class="<?= $this->request->getParam('action') == 'news' || $this->request->getParam('action') == 'newDetails' ? 'active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'news']) ?>">News</a></li>
                        <li class="<?= $this->request->getParam('action') == 'contact' ? 'active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">Contact</a></li>
                    </ul>
                </nav>
                <!-- eof main nav -->
            </div>
        </div>
    </div>
</header>
