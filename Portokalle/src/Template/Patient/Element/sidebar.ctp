<div class="sidebar2 js-sidebar2">
    <div class="sidebar2__top">
        <button class="sidebar2__close js-sidebar2-close">
            <svg class="icon icon-close">
                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-close"></use>
            </svg>
        </button>
        <a class="sidebar2__logo" href="#">
            <img class="sidebar2__pic sidebar2__pic_black" src="<?= $webroot ?>img/logo.svg" alt="" />
        </a>
    </div>
    <div class="sidebar2__wrapper">
        <?php
        $image = '/img/no_thumb.png';
            if (file_exists(WWW_ROOT . 'uploads/users/' . $this->AuthUser->user('id') . DS . $this->AuthUser->user('image'))) {
                $image = '/uploads/users/' . $this->AuthUser->user('id') . DS . $this->AuthUser->user('image');
            }
        ?>
        <a class="sidebar2__profile" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'account']) ?>">
            <div class="ava"><img class="ava__pic" src="<?= $this->url->build($image) ?>" alt="" /></div>
            <div class="sidebar2__details">
                <div class="sidebar2__user"><?= $this->AuthUser->user('full_name') ?></div>
                <div class="sidebar2__login"><?= $this->AuthUser->user('email') ?></div>
            </div>
        </a>
        <div class="sidebar7__category">Main</div>
        <div class="sidebar2__nav">
            <a class="sidebar2__item <?= ($this->request->getParam('controller') == 'Dashboards' && $this->request->getParam('action') == 'index') ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Dashboards']) ?>">
                <svg class="icon icon-dashboard">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dashboard"></use>
                </svg>
                <?= __('Dashboard') ?>
            </a>
            <a class="sidebar2__item <?= $this->request->getParam('controller') == 'Records' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Records']) ?>">
                <svg class="icon icon-library">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-library"></use>
                </svg>
                <?= __('Medical Recrods') ?>
            </a>
            <a class="sidebar2__item <?= $this->request->getParam('controller') == 'Patients' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'index']) ?>">
                <svg class="icon icon-profile"><use xlink:href="<?= $webroot ?>img/sprite.svg#icon-profile"></use></svg>
                <?= __('Patient Profiles') ?>
            </a>
            <a class="sidebar2__item" <?= $this->request->getParam('controller') == 'Appointments' ? 'active' : '' ?> href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'index']) ?>">
                <svg class="icon icon-bell">
                  <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-bell"></use>
                </svg>
                <?= __('Notifications') ?>
              </a>
              <!-- <a class="sidebar2__item" href="user_build-your-health.html">
                <svg class="icon icon-activity">
                  <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-activity"></use>
                </svg>
                Your history
              </a> -->
            <a href="<?= $this->Url->build(['controller' => 'appointments', 'action' => 'consults']) ?>" class="header__btn btn btn_blue __purple btn__ssm"><?= __('Get Health Care') ?></a>
        </div>
        <!-- <div class="sidebar7__category">Other </div> -->
        <div class="sidebar2__nav">
            <!-- <a class="sidebar2__item" href="user_rewards.html">
                <svg class="icon icon-star">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-star"></use>
                </svg>
                Rewards
            </a>
            <a class="sidebar2__item" href="user_credits.html">
                <svg class="icon icon-spam-1">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-spam-1"></use>
                </svg>
                Credits
            </a>
            <a class="sidebar2__item" href="user_egiftCards.html">
                <svg class="icon icon-gift">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-gift"></use>
                </svg>
                eGift Cards
            </a>
            <a class="sidebar2__item" href="user_membership.html">
                <svg class="icon icon-salary">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-salary"></use>
                </svg>
                Billings
            </a> -->
            <a class="sidebar2__item <?= ($this->request->getParam('controller') == 'Users' && $this->request->getParam('action') == 'account' ) ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'account']) ?>">
                <svg class="icon icon-settings">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-settings"></use>
                </svg>
                <?= __('Settings') ?>
            </a>
            <a class="sidebar2__item" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">
                <svg class="icon icon-logout">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-logout"></use>
                </svg>
                <?= __('Sign Out') ?>
            </a>
        </div>
    </div>
</div>