<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
    <div class="main5">
        <div class="main5__center center">
        <div class="main5__row">
            <div class="main5__col">
            <div class="main5__wrap">
                <h1 class="main5__title h2" data-aos="animation-scale-top"><?= $banners[72][0]->title ?></h1>
                <div class="main5__info info" data-aos="animation-scale-top">
                
                <p><?= $banners[72][0]->description ?></p>
                <p><?= $banners[72][0]->content ?> <span style="text-decoration: underline;"><a href="<?= $banners[72][0]->url ?>">Click here</a></span>.</p>

                </div>
                <a class="more" data-aos="animation-scale-top" href="#box-career">See job openings
                <svg class="icon icon-arrow-right">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg></a>
            </div>
            </div>
            <div class="main5__col" data-aos="animation-scale-top">
            <div class="main5__preview">
                <img srcset="<?= $this->Url->build('/uploads/banners/' . $banners[72][0]->id . DS . $banners[72][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[72][0]->id . DS . $banners[72][0]->image ) ?>" alt="<?= $banners[72][0]->title ?>">
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="quality2 bg">
        <div class="quality2__center center">
        <h2 class="quality2__title h2" data-aos="animation-scale-top"><?= $banners[72][1]->title ?></h2>
        <div class="quality2__info info" data-aos="animation-scale-top"><?= $banners[72][1]->description ?></div>
        <div class="quality2__list">
        <?php foreach($banners[73] as $banner): ?>
            <a href="#modal-1" class="quality3__item __item-4 modal-doctor">
                <div class="detail">
                <div class="quality2__icon bg-<?= $banner->url ?>-light"><img class="some-icon" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>" alt="<?= $banner->title ?>"></div>
                
                    <div class="quality2__category"><?= $banner->title ?></div>
                <div class="quality2__text"><?= $banner->description ?></div>
                
                </div>
                <div class="btn-view-all">See examples</div>
            </a>
            <div id="modal-1" class="mfp-hide white-popup-block">
                <div class="box-content modal-contact">
                    <a class="popup-modal-dismiss" href="javascript:;">
                    <svg class="icon icon-close">
                        <use xlink:href="#icon-close"></use>
                    </svg>
                    </a>
                    <?= $banner->content ?>
                </div>
            </div>
        <?php endforeach ?>
        </div>
        </div>
    </div>
    <div class="vacancies bg-2" id="box-career">
        <div class="vacancies__center center">
        <h2 class="vacancies__title h2" data-aos="animation-scale-top"><?= $banners[72][2]->title ?></h2>
        <div class="vacancies__list">
            <div class="vacancies__row vacancies__row_head">
            <div class="vacancies__col">Department</div>
            <div class="vacancies__col">Title</div>
            <div class="vacancies__col">Location</div>
            </div>
        <?php foreach($careers as $career): ?>
            <a class="vacancies__row" href="<?= $this->Url->build(['controller' => 'Articles','action' => 'careerDetails',$career->slug,$career->id ]) ?>">
                <div class="vacancies__col"><?= $career->excerpt ?></div>
                <div class="vacancies__col"><?= $career->title ?></div>
                <div class="vacancies__col"><?= $career->description ?></div>
            </a>
       <?php endforeach ?>
        </div>
        </div>
    </div>
</div>