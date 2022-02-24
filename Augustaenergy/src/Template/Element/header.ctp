<header class="main-header clearfix">
    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper">
            <div class="main-menu-wrapper__left">
                <div class="main-menu-wrapper__logo">
                    <a href="<?= $this->Url->build('/') ?>">
                        <img src="<?= $webroot ?>assets/images/resources/logo-1.png" alt="">
                    </a>
                </div>
                <div class="main-menu-wrapper__main-menu">
                    <ul class="main-menu__list">
                        <li <?= $this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'home' ? 'class="current"' : null ?>><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                        <li <?= $this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'about' ? 'class="current"' : null ?>><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']) ?>">About us</a></li>
                        <li class="dropdown">
                            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'service']) ?>">Services</a>
                            <ul>
                                <li><a href="#">Service 1 </a></li>
                                <li><a href="#">Service 2 </a></li>
                                <li><a href="#">Service 3 </a></li>
                            </ul>
                        </li>
                        <li <?= $this->request->getParam('controller') == 'Articles' && $this->request->getParam('action') == 'projects' ? 'class="current"' : null ?>><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'projects']) ?>">Projects</a></li>
                        <li <?= $this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'investment' ? 'class="current"' : null ?>><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'investment']) ?>">Investment</a></li>
                        <li <?= $this->request->getParam('controller') == 'Articles' && $this->request->getParam('action') == 'articles' ? 'class="current"' : null ?>><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'articles']) ?>">Blog</a></li>
                        <li <?= $this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'contact' ? 'class="current"' : null ?>><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']) ?>">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-menu-wrapper__right">
                <div class="main-menu-wrapper__search-box pc-search">
                    <form action="">
                        <input type="search" name="" placeholder="Search">
                        <button type="submit" class="hidden"></button>
                    </form>
                    
                    <!-- <a href="#" class="main-menu-wrapper__search search-toggler icon-magnifying-glass"></a> -->
                </div>

                <div class="main-menu-wrapper__main-menu">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                </div>

            </div>
        </div>
    </nav>
</header>
