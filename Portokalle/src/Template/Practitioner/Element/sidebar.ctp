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
            if (file_exists(WWW_ROOT . '/uploads/users/' . $this->AuthUser->user('id') . DS . $this->AuthUser->user('image'))) {
                $image = '/uploads/users/' . $this->AuthUser->user('id') . DS . $this->AuthUser->user('image');
            }
        ?>
        <a class="sidebar2__profile" href="<?= $this->Url->build(['controller' => 'Dashboards', 'action' => 'index']) ?>">
            <div class="ava"><img class="ava__pic" src="<?php echo $this->Url->build($image); ?>" alt="" /></div>
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
            <a class="sidebar2__item <?= ($this->request->getParam('controller') == 'Appointments' && $this->request->getParam('action') == 'index') ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'index']) ?>">
              <svg class="icon icon-library">
                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-library"></use>
              </svg>
              <?= __('Drop-in') ?>
              <?php if ($countAppointment): ?>
                  <div class="sidebar__counter"><?= $countAppointment ?></div>
              <?php endif ?>
            </a>
            <a class="sidebar2__item <?= ($this->request->getParam('controller') == 'Appointments' && $this->request->getParam('action') == 'schedule') ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'schedule']) ?>">
              <svg class="icon icon-event">
              <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-event"></use>
              </svg>
              <?= __('Schedule') ?>
            </a>
            <a class="sidebar2__item <?= ($this->request->getParam('controller') == 'Patients' && $this->request->getParam('action') == 'index') ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'index']) ?>">
              <svg class="icon icon-friends">
                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-friends"></use>
              </svg>
              <?= __('Patients') ?>
              <?php if ($countPatient): ?>
                  <div class="sidebar__counter"><?= $countPatient ?></div>
              <?php endif ?>
            </a>
            <!-- <a class="sidebar2__item <?= ($this->request->getParam('controller') == 'Appointments' && $this->request->getParam('action') == 'index') ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'index']) ?>">
              <svg class="icon icon-leaderboard">
                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-leaderboard"></use>
              </svg>
              <?= __('Stats') ?>
            </a> -->
        </div>
       
        <div class="sidebar2__nav">
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