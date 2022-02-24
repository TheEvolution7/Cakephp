<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<!--Full width header Start-->
<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header style3 modify2 header-transparent">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-part">
                            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                                <img class="normal-logo" src="<?= $this->Url->build('/uploads/banners/'.$banners[3][0]->id . DS . $banners[3][0]->image) ?>" alt="<?= $banners[3][0]->title ?>">  
                                <img class="sticky-logo" src="<?= $this->Url->build('/uploads/banners/'.$banners[3][0]->id . DS . $banners[3][0]->image) ?>" alt="<?= $banners[3][0]->title ?>">
                            </a>
                        </div>
                        <div class="mobile-menu">
                            <a href="#" class="rs-menu-toggle rs-menu-toggle-close">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 text-right">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <nav class="rs-menu pr-100 lg-pr-50 md-pr-0">
                                    <ul class="nav-menu">
                                        <li class="link link--carme <?= $this->request->getParam('action') == 'home' ? 'current-menu-item' : '' ?>"> 
                                            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><?= __('Home') ?></a>
                                            <svg class="link__graphic link__graphic--stroke link__graphic--scribble" width="100%" height="9" viewBox="0 0 101 9"><path d="M.426 1.973C4.144 1.567 17.77-.514 21.443 1.48 24.296 3.026 24.844 4.627 27.5 7c3.075 2.748 6.642-4.141 10.066-4.688 7.517-1.2 13.237 5.425 17.59 2.745C58.5 3 60.464-1.786 66 2c1.996 1.365 3.174 3.737 5.286 4.41 5.423 1.727 25.34-7.981 29.14-1.294" pathLength="1"/></svg>
                                        </li>
                                        <li class="link link--carme <?= $this->request->getParam('action') == 'learn' ? 'current-menu-item' : '' ?>">
                                            <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'learn']) ?>"><?= __('Learn') ?></a>
                                            <svg class="link__graphic link__graphic--stroke link__graphic--scribble" width="100%" height="9" viewBox="0 0 101 9"><path d="M.426 1.973C4.144 1.567 17.77-.514 21.443 1.48 24.296 3.026 24.844 4.627 27.5 7c3.075 2.748 6.642-4.141 10.066-4.688 7.517-1.2 13.237 5.425 17.59 2.745C58.5 3 60.464-1.786 66 2c1.996 1.365 3.174 3.737 5.286 4.41 5.423 1.727 25.34-7.981 29.14-1.294" pathLength="1"/></svg>
                                        </li>
                                        <li class="link link--carme <?= $this->request->getParam('action') == 'about' ? 'current-menu-item' : '' ?>">
                                            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>"><?= __('About') ?></a>
                                            <svg class="link__graphic link__graphic--stroke link__graphic--scribble" width="100%" height="9" viewBox="0 0 101 9"><path d="M.426 1.973C4.144 1.567 17.77-.514 21.443 1.48 24.296 3.026 24.844 4.627 27.5 7c3.075 2.748 6.642-4.141 10.066-4.688 7.517-1.2 13.237 5.425 17.59 2.745C58.5 3 60.464-1.786 66 2c1.996 1.365 3.174 3.737 5.286 4.41 5.423 1.727 25.34-7.981 29.14-1.294" pathLength="1"/></svg>
                                        </li>
                                        
                                    </ul> <!-- //.nav-menu -->
                                </nav>                                        
                            </div> <!-- //.main-menu -->
                            <div class="expand-btn-inner search-icon hidden-md">
                                <ul>
                                    <li class="sidebarmenu-search">
                                        <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#">
                                            <i class="flaticon-search"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="nav-expander" class="humburger nav-expander" href="#">
                                            <span class="dot1"></span>
                                            <span class="dot2"></span>
                                            <span class="dot3"></span>
                                            <span class="dot4"></span>
                                            <span class="dot5"></span>
                                            <span class="dot6"></span>
                                            <span class="dot7"></span>
                                            <span class="dot8"></span>
                                            <span class="dot9"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->                    
    </header>
    <!--Header End-->

    <!-- Canvas Menu start -->
    <nav class="right_menu_togle hidden-md">
        <div class="close-btn">
            <div class="nav-link">
                <a id="nav-close" class="humburger nav-expander" href="#">
                    <span class="dot1"></span>
                    <span class="dot2"></span>
                    <span class="dot3"></span>
                    <span class="dot4"></span>
                    <span class="dot5"></span>
                    <span class="dot6"></span>
                    <span class="dot7"></span>
                    <span class="dot8"></span>
                    <span class="dot9"></span>
                </a>
            </div>
        </div>
        <div class="canvas-logo">
            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><img src="<?= $this->Url->build('/uploads/banners/'.$banners[3][1]->id . DS . $banners[3][1]->image) ?>" alt="<?= $banners[3][1]->title ?>"></a>
        </div>
        <div class="offcanvas-text">
            <p><?= $banners[3][1]->description ?></p>
        </div>
        <div class="canvas-contact">
                <div class="address-area">
                    <!-- <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?= $banners[6][0]->title ?></h4>
                            <em><?= $banners[6][0]->description ?></em>
                        </div>
                    </div> -->
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?= $banners[3][2]->title ?></h4>
                            <em><a href="<?= $banners[3][2]->url ?>"><?= $banners[3][2]->description ?></a></em>
                        </div>
                    </div>
                    <!-- <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title"><?= $banners[6][2]->title ?></h4>
                            <em><?= $banners[6][2]->description ?></em>
                        </div>
                    </div> -->
                </div>
            <ul class="social">
            <?php foreach($banners[7] as $banner): ?>
                <li><a href="<?= $banner->url ?>" target="_blank"><?= $banner->description ?></a></li>
            <?php endforeach ?>
            </ul>
        </div>
    </nav>
    <!-- Canvas Menu end -->
</div>
<!--Full width header End-->