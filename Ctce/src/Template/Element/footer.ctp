<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="footer-section section">
    <div class="container">

        <!-- Footer Top Widgets Start -->
        <div class="row">

            <!-- Footer Widget Start -->
            <div class="col-xl-5 col-md-5 col-12 max-mb-50">
                <div class="footer-widget">
                    <h4 class="footer-widget-title"><?= $banners[3][0]->title ?></h4>
                    <div class="footer-widget-content">
                        <div class="content">
                            <p><?= $banners[3][0]->description ?></p>
                            <p><a href="<?= $banners[3][1]->url ?>"><i class="far fa-phone-alt me-2"></i><?= $banners[3][1]->title ?> </a></p>
                            <p><a href="<?= $banners[3][2]->url ?>"><i class="far fa-envelope me-2"></i><?= $banners[3][2]->title ?> </a></p>
                        </div>
                        <div class="footer-social-inline">
                        <?php foreach($banners[4] as $banner): ?>
                            <a href="<?= $banner->url ?>"><i class="<?= $banner->description ?>"></i></a>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="offset-xl-1 col-xl-3 col-md-4 col-sm-7 col-12 max-mb-50">
                <div class="footer-widget">
                    <h4 class="footer-widget-title">Career Central</h4>
                    <div class="footer-widget-content">
                        <ul>
                            <li>
                                <a href="#"><strong>Oklahoma Roofing Contractor License Renewal
                                        Requirements</strong></a>
                                <small>Oct 14, 2021</small>
                            </li>
                            <li>
                                <a href="#"><strong>Steps to Renew Your Utah Elevator Mechanic
                                        License</strong></a>
                                <small>Oct 08, 2021</small>
                            </li>
                            <li>
                                <a href="#"><strong>Requirements to Renew a Minnesota Elevator
                                        License</strong></a>
                                <small>Oct 08, 2021</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="offset-xl-1 col-xl-2 col-md-3 col-sm-5 col-12 max-mb-50">
                <div class="footer-widget">
                    <h4 class="footer-widget-title"> Other Links</h4>
                    <div class="footer-widget-content">
                        <ul>
                            <li><a href="#">At Your Pace Online</a></li>
                            <li><a href="#">BLog</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']) ?>">Contact</a></li>
                        <?php foreach($pages as $page): ?>
                            <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'page',$page->slug]) ?>"><?= $page->title ?></a></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

        </div>
        <!-- Footer Top Widgets End -->

        <!-- Footer Copyright Start -->
        <div class="row max-mt-20">
            <div class="col">
                <p class="copyright">&copy; <?= $banners[3][3]->title ?> <a href="<?= $banners[3][3]->url ?>"><?= $banners[3][3]->description ?></a></p>
            </div>
        </div>
        <!-- Footer Copyright End -->

    </div>
</div>


<!-- Scroll Top Start -->
<a href="#" class="scroll-top" id="scroll-top">
    <i class="arrow-top fal fa-long-arrow-up"></i>
    <i class="arrow-bottom fal fa-long-arrow-up"></i>
</a>
<!-- Scroll Top End -->
