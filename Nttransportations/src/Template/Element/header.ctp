<?php $banners = $this->getCache('banners_' . $configs['language']); ?>    
<div class="nav-container">
    <nav class="top-bar <?= $this->request->getParam('action') == 'home' ? '' : 'overlay-bar' ?>">
        <div class="container">
            <div class="row utility-menu">
                <div class="col-sm-12">
                    <div class="utility-inner clearfix">
                        <span class="alt-font"><i class="icon icon_pin"></i> <?= \Cake\Core\Configure::read('Core.setting.address') ?></span>
                        <span class="alt-font"><i class="icon icon_mail"></i> <?= \Cake\Core\Configure::read('Core.setting.email') ?></span>
                        <div class="pull-right">
                        <?php foreach ($this->getConfigure('Core')['languages'] as $lang) : ?>
                            <a href="<?= $this->Url->build(array_merge(['lang' => ($this->getConfigure('Core.setting.language_site') != $lang->id) ? $lang->id : false], $this->getRequest()->getParam('pass'), $this->getRequest()->getQuery())); ?>" class="language"><img alt="English" src="<?= $this->Url->build('/uploads/languages/'.$lang->id . DS .$lang->image) ?>"></a>
                        <?php endforeach  ?>  
                        </div>
                    </div>
                </div>
            </div>
            <!--end of row-->
            <div class="row nav-menu">
                <div class="col-md-5 columns left-menu">
                    <ul class="menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><?= __('Home') ?></a>
                        </li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>"><?= __('About Us') ?></a>
                        </li>
                        <li class="has-dropdown"><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'services']) ?>"><?= __('Shuttle Services') ?></a>
                            <ul class="subnav">
                                <?php foreach($services_menu as $service): ?>
                                    <li><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'servicesDetails',$service->slug]) ?>"><?= $service->title ?></a></li>
                                <?php endforeach ?>  
                            </ul>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-sm-3 col-md-2 columns">
                    <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                        <img class="logo logo-light" src="<?= $this->Url->build('/uploads/settings/1/' . \Cake\Core\Configure::read('Core.setting.image')) ?>" alt="<?= \Cake\Core\Configure::read('Core.setting.site_title') ?>">
                        <img class="logo logo-dark"  src="<?= $this->Url->build('/uploads/settings/1/' . \Cake\Core\Configure::read('Core.setting.image')) ?>" alt="<?= \Cake\Core\Configure::read('Core.setting.site_title') ?>">
                    </a>
                </div>
                <div class="col-sm-9 col-md-5 columns right-menu">
                    <ul class="menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'index']) ?>"><?= __('Point of Interest') ?></a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'details',$circle_tour->slug]) ?>"><?= __('Island Circle Tour') ?></a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>"><?= __('Contact') ?></a></li>
                    </ul>

                    <ul class="social-icons text-right">
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
            <div class="mobile-toggle">
                <i class="icon icon_menu"></i>
            </div>
        </div>
        <div class="menu-mobile">
                <div class="container">
                <ul class="menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><?= __('Home') ?></a>
                        </li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>"><?= __('About Us') ?></a>
                        </li>
                        <li class="has-dropdown"><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'services']) ?>"><?= __('Shuttle Services') ?></a>
                            <ul class="subnav">
                                <?php foreach($services_menu as $service): ?>
                                    <li><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'servicesDetails',$service->slug]) ?>"><?= $service->title ?></a></li>
                                <?php endforeach ?>  
                            </ul>
                        </li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'index']) ?>"><?= __('Point of Interest') ?></a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'details',$circle_tour->slug]) ?>"><?= __('Island Circle Tour') ?></a>

                        </li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>"><?= __('Contact') ?></a>
                        </li>
                    </ul>

                    <ul class="social-icons text-right">
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
        <!--end of container-->
    </nav>
</div>
