<?php 
$arr_submenu = [
    __('Account'),
    __('Security'), 
    __('Notifications'), 
    __('Languages'), 
    __('Credits'), 
    __('Billing'), 
    __('Integrations'),  

] ?>
<div class="account-container">
    <div class="membership-container">
        <div class="courses__row">
            <ul class="courses__menu">
                <?php foreach ($arr_submenu as $menu): ?>
                    <a class="courses__link <?= $this->request->getParam('action') == strtolower($menu) ? 'active' : ''?>" href="<?= $this->Url->build(['action' => $menu]) ?>"><?= ucfirst($menu) ?></a>
                <?php endforeach ?>
            </ul>
        </div>
    </div>