<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<div class="page-footer pl_19 pr_19 pt_18 pb_10 bgc_beige pos_r z_5" data-scroll-section>
    <div class="flex mb_8">
        <div class="w_50">
            <img class="footer-logo" src="<?= $this->Url->build('/uploads/banners/'.$banners[3][0]->id . DS . $banners[3][0]->image) ?>" alt="<?= $banners[3][0]->title ?>">
            <div class="mt_2"><?= $banners[3][0]->description ?></div>
        </div>
        <div class="w_50 flex_jsb">
            <div class="w_50">
                <div class="fz24 mb_1"><?= $banners[3][1]->title ?></div>
                <?= $banners[3][1]->description ?>
            </div>
            <div>
                <div class="fz24 mb_1"><?= $banners[3][2]->title ?></div>
                <div class="fz16"><?= $banners[3][2]->description ?> </div>
            </div>
        </div>
    </div>
    <div class="line bgc_b"></div>
    <div class="flex">
        <div class="w_50 flex_jsb flex_ac pr_6 pt_6 pb_6 bdr_b">
            <div><?= $banners[3][3]->title ?></div>
            <a class="fz36 td_uh" href="<?= $banners[3][3]->url ?>"><?= $banners[3][3]->description ?></a>
        </div>
        <div class="w_50 pl_6 flex_jsb flex_ac pt_6 pb_6">
            <div><?= $banners[3][4]->title ?></div>
            <a class="fz36 td_uh" href="<?= $banners[3][4]->url ?>"><?= $banners[3][4]->description ?></a>
        </div>
    </div>
    <div class="line bgc_b"></div>
    <div class="flex_jsb pb_8 mt_10 op_50">
        <div class="flex">
            <a class="mr_3 td_uh" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home</a>
            <a class="mr_3 td_uh" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>">About Us</a>
            <a class="mr_3 td_uh" href="<?= $this->Url->build(['controller' => 'Albums','action' => 'index']) ?>">Properties</a>
            <a class="mr_3 td_uh" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'service']) ?>">Services</a>
            <a class="mr_3 td_uh" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'team']) ?>">Team</a>
            <a class="mr_3 td_uh" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">Contacts</a>
            <a class="mr_3 td_uh" href="<?= $banners[2][2]->url ?>">Service Request</a>
        </div>
        <div class="flex">
            <div class="mr_2"><?= \Cake\Core\Configure::read('Core.setting.copyright') ?></div>
        </div>
    </div>
</div>