<div class="click-capture"></div>

<div class="menu">
    <span class="close-menu icon-cross2 right-boxed"></span>
    <div class="menu-lang right-boxed">
        <a href="" class="active">CALL US: (+080) 9684 32 45 789</a>
    </div>
    <ul class="menu-list right-boxed">
        <li <?= $this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'home' ? 'class="active"' : null ?>>
            <a href="<?= $this->Url->build('/') ?>">Home</a>
        </li>
        <li <?= $this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'process' ? 'class="active"' : null ?>>
            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'process']) ?>">Process</a>
        </li>
        <li <?= $this->request->getParam('controller') == 'Albums' && $this->request->getParam('action') == 'index' ? 'class="active"' : null ?>>
            <a href="<?= $this->Url->build(['controller' => 'Albums', 'action' => 'index']) ?>">Project</a>
        </li>
        
        <li <?= $this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'contact' ? 'class="active"' : null ?>><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']) ?>">Contact</a></li>
    </ul>
    <div class="menu-footer right-boxed">
        <div class="social-list">
            <a href="" class="icon ion-social-twitter"></a>
            <a href="" class="icon ion-social-facebook"></a>
            <a href="" class="icon ion-social-linkedin"></a>
        </div>
        <div class="copy">© Fengari 2021. All Rights Reseverd</div>
    </div>
</div>

<header class="navbar boxed js-navbar">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse"
        aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="brand" href="<?= $this->Url->build('/') ?>">
        <img src="<?= $webroot ?>images/logo.png">
    </a>
    <div class="social-list hidden-xs">
        <a href="" class="icon ion-social-twitter"></a>
        <a href="" class="icon ion-social-facebook"></a>
        <a href="" class="icon ion-social-linkedin"></a>
    </div>
    <div class="navbar-spacer hidden-sm hidden-xs"></div>
    <address class="navbar-address hidden-sm hidden-xs">call us: <span class="text-dark">(+080) 9684 32 45
            789</span></address>
</header>