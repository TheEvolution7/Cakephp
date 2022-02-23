<div class="header2 js-header2">
    <button class="header2__burger js-header2-burger">
        <svg class="icon icon-burger">
            <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-burger"></use>
        </svg>
    </button>
    <a class="header2__logo" href="<?= $this->Url->build(['controller' => 'Dashboards', 'action' => 'index']) ?>"><img class="header2__pic header2__pic_black" src="<?= $webroot ?>/img/logo.svg" alt="" /></a>
    <div class="header2__search">
        <!-- <button class="header2__open">
            <svg class="icon icon-search">
                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-search"></use>
            </svg>
        </button>
        <input class="header2__input" type="text" placeholder="Search" /> -->
    </div>
    <!-- <div class="header2__group">
        <a class="header2__link header2__link_bell active" href="notifications.html">
            <svg class="icon icon-bell">
                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-bell"></use>
            </svg>
        </a>
    </div> -->
    <?php
        $image = '/img/no_thumb.png';
        if (file_exists(WWW_ROOT . 'uploads/users/' . $this->AuthUser->user('id') . DS . $this->AuthUser->user('image'))) {
            $image = '/uploads/users/' . $this->AuthUser->user('id') . DS . $this->AuthUser->user('image');
        }
    ?>
    <a class="header2__profile" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'account']) ?>"><img class="header2__pic" src="<?= $this->Url->build($image)?>"/></a>
    <div class="header2__bg js-header2-bg"></div>
</div>