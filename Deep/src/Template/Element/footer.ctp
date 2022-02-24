<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<!-- Footer Start -->
<footer id="rs-footer" class="rs-footer">
    
    <div class="footer-top">
        <div class="bg">
            <img src="<?= $webroot ?>images/bg/footer-bg.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                    <div class="footer-logo mb-30">
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><img src="<?= $this->Url->build('/uploads/banners/'.$banners[4][0]->id . DS . $banners[4][0]->image) ?>" alt="<?= $banners[4][0]->title ?>"></a>
                    </div>
                        <div class="textwidget pb-30"><p><?= $banners[4][0]->description ?></p>
                        </div>
                        <ul class="footer-social md-mb-30">  
                            <?php foreach($banners[7] as $banner): ?>
                                <li><a href="<?= $banner->url ?>" target="_blank"><span><?= $banner->description ?></span></a></li>
                            <?php endforeach ?>                                         
                        </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 pl-45 md-pl-15 md-mb-30">
                    <h3 class="widget-title"><?= __('Pages') ?></h3>
                    <ul class="site-map">
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>"><?= __('About Us') ?></a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'learn']) ?>"><?= __('Learn More') ?></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 md-mb-30">
                    <h3 class="widget-title"><?= $banners[4][1]->title ?></h3>
                    <ul class="address-widget">
                        <!-- <li>
                            <i class="flaticon-location"></i>
                            <div class="desc"><?= $banners[8][0]->title ?></div>
                        </li> -->
                        <!-- <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="<?= $banners[8][1]->url ?>"><?= $banners[8][1]->title ?></a>
                            </div>
                        </li> -->
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="<?= $banners[4][2]->url ?>"><?= $banners[4][2]->title ?></a>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-clock-1"></i>
                            <div class="desc">
                                <?= $banners[4][3]->title ?> 
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- <div class="col-lg-3 col-md-12 col-sm-12">
                    <h3 class="widget-title"><?= $banners[4][1]->title ?></h3>
                    <p class="widget-desc"><?= $banners[4][1]->description ?></p>
                    <form method="post" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'newsletter']) ?>"> 
                    <p>
                        <input type="email" name="email" placeholder="Your email address" required>
                        <em class="paper-plane"><input type="submit" value="Sign up"></em>
                        <i class="flaticon-send"></i>
                    </p>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">                    
            <div class="row y-middle">
                <div class="col-lg-12">
                    <div class="copyright text-center">
                        <p>&copy;<?= \Cake\Core\Configure::read('Core.setting.copyright') ?></p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->