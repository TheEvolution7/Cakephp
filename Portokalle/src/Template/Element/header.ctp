<!-- header-->
<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    $core = $this->getConfigure('Core');
?> 

<header class="header js-header">
    <div class="header__center center">
    <a class="header__logo" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
        <img class="header__pic some-icon" src="<?= $this->Url->build('/uploads/banners/' . $banners[14][0]->id . DS . $banners[14][0]->image ) ?>" alt="<?=  $banners[14][0]->title ?>">
    </a>
    <div class="header__wrapper js-header-wrapper">
        <button class="header__close js-header-close">
        <svg class="icon icon-close">
            <use xlink:href="#icon-close"></use>
        </svg>
        </button>
        <div class="header__control">
        <div class="header__nav header__nav_right">
            <div class="header__item js-header-item">
            <div class="header__head js-header-head"><?= __('Features') ?></div>
            <div class="header__body menu-col-1 js-header-body">
                <div class="header__inner">
                <div class="header__menu">
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'howItWork']) ?>"><?= __('How it works') ?></a>
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'features']) ?>"><?= __('Online prescriptions') ?></a>
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'features']) ?>"><?= __('Sick notes') ?></a>
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'features']) ?>"><?= __('Lab work') ?></a>
                </div>
                </div>
            </div>
            </div>
            <div class="header__item js-header-item">
            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'ourDoctor']) ?>" class="header__head __not-child">
                <?= __('Our doctors') ?>
            </a>
            </div>
            <div class="header__item js-header-item">
            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'pricing']) ?>" class="header__head __not-child">
                <?= __('Pricing') ?>
            </a>
            </div>
            <div class="header__item js-header-item">
            <div class="header__head js-header-head"><?= __('Specialities') ?></div>
            <div class="header__body js-header-body">
                <div class="header__inner">
                <div class="header__menu">
                    <?= $this->cell('Header'); ?>
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'specialities']) ?>"><?= __('See all') ?></a>
                </div>
                </div>
            </div>
            </div>
            <div class="header__item js-header-item">
            <div class="header__head js-header-head"><?= __('Work with us') ?></div>
            <div class="header__body menu-col-1 js-header-body">
                <div class="header__inner">
                <div class="header__menu">
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'howItWork']) ?>">Learn more</a>
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">Employers</a>
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">Insurers</a>
                    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">Hospital</a>
                </div>
                </div>
            </div>
            </div>
            
        </div>
        <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'login']) ?>" class="header__btn btn btn_blue-light btn_sm"><?= __('Sign in') ?></a>
        <a href="<?= $this->Url->build(['prefix' => 'patient', 'controller' => 'Users', 'action' => 'register']) ?>" class="header__btn btn btn_blue btn_sm"><?= __('Register') ?></a>
        <div class="header__item js-header-item">
            <div class="header__head js-header-head">
                <?php foreach ($this->getConfigure('Core')['languages'] as $lang):?>
                <?php if ($lang->id==$configs['language']):?>
                    <?= $lang->title ?>
                <?php endif; ?>
                <?php endforeach ?>
            </div>
            <div class="header__body menu-col-1 js-header-body">
                <div class="header__inner">
                <div class="header__menu">
                    <?php foreach ($this->getConfigure('Core')['languages'] as $lang):?>
                    <?php if ($lang->id!=$configs['language']):?>
                        <a class="header__link" href="<?=$this->Url->build(array_merge(['lang'=>($core['setting']['language_site'] !=$lang->id) ? $lang->id :false], $this->getRequest()->getParam('pass'), $this->getRequest()->getQuery())); ?>" class=""><?= $lang->title ?></a>
                    <?php endif; ?>
                    <?php endforeach ?>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <button class="header__burger js-header-burger"><span></span></button>
    </div>
    <div class="header__bg js-header-bg"></div>
</header>