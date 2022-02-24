<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
?>    
<!-- Header Section Start -->
<div class="header-section header-default header-shadow sticky-header section">
        <div class="header-inner">
            <div class="container position-relative">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo Start -->
                    <div class="col-xl-2 col-auto">
                        <div class="header-logo">
                            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'home']) ?>">
                                <img class="dark-logo" src="<?= $this->Url->build('/uploads/banners/'.$banners[2][0]->id .DS.$banners[2][0]->image) ?>" alt="<?= $banners[2][0]->title ?>">
                                <img class="light-logo" src="<?= $this->Url->build('/uploads/banners/'.$banners[2][1]->id .DS.$banners[2][1]->image) ?>" alt="<?= $banners[2][1]->title ?>">
                            </a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Main Menu Start -->
                    <div class="col d-none d-xl-block position-static">
                        <nav class="site-main-menu menu-hover-1">
                            <?= $this->cell('Header'); ?>
                        </nav>
                    </div>
                    <!-- Header Main Menu End -->

                    <!-- Header Right Start -->
                    <div class="col-xl-2 col-auto">
                        <div class="header-right">
                            <div class="inner">

                                <!-- Header Cart Start -->
                                <div class="header-cart">

                                    <a class="header-cart-btn" href="<?= $this->Url->build(['controller' => 'Carts', 'action' => 'index']) ?>"><span
                                            class="cart-count">
                                                <?php 
                                                $session = $this->getRequest()->getSession();
                                                $carts = $session->read('Carts');
                                                echo count($carts);
                                                 ?>
                                            </span><i class="far fa-shopping-cart"></i></a>
                                </div>
                                <!-- Header Cart End -->

                                <div class="header-login">
                                    <?php if (isset($_SESSION['Auth'])): ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'training']) ?>"><i class="far fa-book"></i></a>
                                    <?php endif ?>
                                    
                                </div>
                                
                                <!-- Header Login Start -->
                                <div class="header-login">
                                    <?php if (isset($_SESSION['Auth'])): ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'account']) ?>"><i class="far fa-user-circle"></i></a>
                                    <?php else: ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>"><i class="far fa-user-circle"></i></a>
                                    <?php endif ?>
                                    
                                </div>

                                
                                <!-- Header Login End -->

                                <!-- Header Search Start -->
                                <!-- <div class="header-search">
                                    <button class="header-search-toggle"><i class="far fa-search"></i></button>
                                    <div class="header-search-form">
                                        <form action="#">
                                            <input type="text" placeholder="Search...">
                                            <button><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div> -->
                                <!-- Header Search End -->


                                <!-- Header Mobile Menu Toggle Start -->
                                <div class="header-mobile-menu-toggle d-xl-none ml-sm-2">
                                    <button class="toggle">
                                        <i class="icon-top"></i>
                                        <i class="icon-middle"></i>
                                        <i class="icon-bottom"></i>
                                    </button>
                                </div>
                                <!-- Header Mobile Menu Toggle End -->
                            </div>
                        </div>
                    </div>
                    <!-- Header Right End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Header Section End -->