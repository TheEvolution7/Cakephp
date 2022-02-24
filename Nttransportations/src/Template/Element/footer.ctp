<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<div class="footer-container">
    <footer class="details">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img class="logo" src="<?= $this->Url->build('/uploads/settings/1/' . \Cake\Core\Configure::read('Core.setting.image')) ?>" alt="<?= \Cake\Core\Configure::read('Core.setting.site_title') ?>">
                    <p><?= \Cake\Core\Configure::read('Core.setting.site_description') ?></p>
                </div>

                <div class="col-sm-4">
                    <h1><?= __('Contact') ?></h1>
                    <p>
                        <a href="mailto:<?= \Cake\Core\Configure::read('Core.setting.email') ?>"><?= \Cake\Core\Configure::read('Core.setting.email') ?></a><br>
                        <a href="tel:<?= \Cake\Core\Configure::read('Core.setting.phone_number') ?>"><?= \Cake\Core\Configure::read('Core.setting.phone_number') ?></a><br>
                        <br>
                        <?= \Cake\Core\Configure::read('Core.setting.address') ?>
                    </p>
                </div>

                <div class="col-sm-4">
                    <h1><?= __('Social Profiles') ?></h1>
                    <ul class="social-icons">
                        <li>
                            <a href="<?= \Cake\Core\Configure::read('Core.setting.facebook_url') ?>">
                                <i class="icon social_facebook"></i>
                            </a>
                        </li>

                        <li>
                            <a href="<?= \Cake\Core\Configure::read('Core.setting.instagram_url') ?>">
                                <i class="icon social_instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end of row-->

            <div class="row">
                <div class="col-sm-12">
                    <span class="sub"><?= \Cake\Core\Configure::read('Core.setting.copyright') ?></span>
                </div>
            </div>

        </div>
        <!--end of container-->
    </footer>
</div>
