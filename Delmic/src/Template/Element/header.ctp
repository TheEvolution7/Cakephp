<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<div class="page-header o_h">
    <div class="page-header-line-logo"></div>
    <div class="page-header-line-phone"></div>
    <div class="page-header-line-h"></div>
    <div class="page-header-bg"></div>
    <div class="flex_jsb flex_ac h_100 pl_19 fz14">
        <div class="flex_ac">
            <a class="page-header-logo white_" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                <img src="<?= $this->Url->build('/uploads/banners/'.$banners[2][0]->id . DS . $banners[2][0]->image) ?>" alt="<?= $banners[2][0]->title ?>" class="logo-b">
                <img src="<?= $this->Url->build('/uploads/banners/'.$banners[2][1]->id . DS . $banners[2][1]->image) ?>" alt="<?= $banners[2][1]->title ?>" class="logo-w">
            </a>
            <div class="page-header-path">
                <i><i></i></i>
                <div><span id="page-header-path-content"></span></div>
            </div>
        </div>
        <div class="flex_ac pr_10">
            <a href="<?= $banners[2][2]->url ?>" class="page-header-projects d_n mr_6 td_u"><?= $banners[2][2]->title ?></a>
            <a class="page-header-apartments d_n bt-transparent cu_p mr_6 td_u js-jump" href="#ap_list">Apartments list</a>
            <a href="<?= $banners[2][3]->url ?>" class="mr_4 cu_p lh_0" target="_blank">
                <svg class="sz_20 no_pe">
                    <use xlink:href="#ico-fb"></use>
                </svg>
            </a>
            <a href="<?= $banners[2][4]->url ?>" class="mr_10 cu_p lh_0">
                <svg class="sz_22 no_pe">
                    <use xlink:href="#ico-email"></use>
                </svg>
            </a>
            <a href="<?= $banners[2][5]->url ?>" class="flex_ac cu_p">
                <svg class="sz_26 mr_2 no_pe">
                    <use xlink:href="#ico-phone"></use>
                </svg>
                <span>Contacts</span>
            </a>
        </div>
    </div>
</div>
<div class="page-header-burger"><i></i><i></i></div>
<div class="page-menu pos_f w_100 h_100">
    <div class="preloader-line">
        <div></div>
    </div>
    <div class="preloader-line">
        <div></div>
    </div>
    <div class="preloader-line">
        <div></div>
    </div>
    <div class="page-menu-left h_100 w_100 pos_a">
        <div class="pos_r w_50 h_100 flex_ac pl_19 pr_10 pb_16 fz40">

            <ul class="page-menu-items w_100 ta_r">
                <li class="page-menu-item root-item root-item-selected i1"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"
                        class="c_w menu-split root-item-selected">Home Page</a><i></i></li>
                <li class="page-menu-item root-item  i2"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>"
                        class="c_w menu-split root-item">About US</a><i></i></li>
                <li class="page-menu-item root-item  i3"><a href="<?= $this->Url->build(['controller' => 'Albums','action' => 'index']) ?>"
                        class="c_w menu-split root-item">Properties</a><i></i></li>
                <li class="page-menu-item root-item  i4"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'service']) ?>"
                        class="c_w menu-split root-item">Services</a><i></i></li>
                <li class="page-menu-item root-item  i5"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'team']) ?>"
                        class="c_w menu-split root-item">Team</a><i></i></li>
                <li class="page-menu-item root-item  i6"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>"
                        class="c_w menu-split root-item">Contacts US</a><i></i></li>
            </ul>
            <div class="page-menu-contacts pos_a pos_rb mr_10 mb_10 c_w flex_ac fz16 o_h">
                <span class="mr_4">185 Asylum St, 37th Floor, Hartford, CT 06063 </span>
                <!-- <span class="mr_4"><?= $banners[2][4]->title ?></span>
                <a class="fz24 c_w mr_8 td_uh" href="<?= $banners[2][4]->url ?>"><?= $banners[2][4]->description ?></a>
                <span class="mr_4"><?= $banners[2][5]->title ?></span>
                <a class="fz24 c_w td_uh mr_6" href="<?= $banners[2][5]->url ?>"><?= $banners[2][5]->description ?></a> -->
                <a class="c_w td_u" href="<?= $banners[2][2]->url ?>"><?= $banners[2][2]->title ?></a>
            </div>
        </div>
    </div>
    <div class="page-menu-right h_100 w_50 pos_a o_h" style="left: 50%;">
        <div class="h_100 bgs_cov page-menu-img" style="background-image: url(<?= $this->Url->build('/uploads/banners/'.$banners[2][6]->id . DS . $banners[2][6]->image) ?>);">

        </div>
    </div>
</div>