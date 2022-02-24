<?php  
$banners = $this->getCache('banners_' . $configs['language']);
?> 
<footer class="footer-area footer-style7">
    <div class="footer-main">
    <div class="container">
        <div class="row">
        <div class="col-md-5 col-lg-5">
            <div class="widget-item widget-column1">
            <h4>Subscribe to receive More News</h4>
            <div class="newsletter-content-wrap">
                <form class="newsletter-form" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'newsletter']) ?>" method="post">
                <input class="form-control" type="text" id="email" placeholder="Email" required>
                <button class="btn btn-theme btn-black" type="submit">Sign Up</button>
                </form>
            </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-4">
            <div class="widget-item widget-column2">
            <h4>Policy</h4>
            <nav class="widget-menu-wrap menu-col-2">
                <ul class="nav-menu nav">
                <?php foreach($pages as $slug => $page): ?>
                    <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'pages',$slug]) ?>"><?= $page ?></a></li>
                <?php endforeach ?>    
                </ul>
            </nav>
            </div>
        </div>
        <div class="col-md-3 col-lg-3">
            <div class="widget-item widget-column3">
            <h4>Help</h4>
            <nav class="widget-menu-wrap">
                <ul class="nav-menu nav">
                <ul class="nav-menu nav ">
                    <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'work']) ?>">How it works</a></li>
                    <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'faq']) ?>">FAQ</a></li>
                </ul>
                </ul>
            </nav>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="footer-bottom">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="widget-item">
            <div class="widget-social-icons">
            <?php foreach($banners[3] as $banner): ?>
                <a href="<?= $banner->url ?>"><?= $banner->description ?></a>
            <?php endforeach ?>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</footer>
