<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[38][0]->id . DS . $banners[38][0]->image ) ?>" alt="<?= $banners[38][0]->title ?>"></div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[38][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[38][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking -->
<form method="post" id="myForm">
<div class="booking-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="">
                    <div class="booking-appointment">
                        <div class="accordion" id="booking-collapse">
                        <?php foreach($services as $k => $service): ?>
                            <div class="card">
                                <div class="card-header" id="heading-<?=  $k ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapse-<?=  $k ?>"
                                            aria-expanded="false" aria-controls="collapse-<?=  $k ?>">
                                            <?= $service->title .'('. $service->time.' '.$service->currency.$service->price .')' ?> 
                                            <input type="radio" name="package" id="pack-<?=  $k ?>" value="<?=  $service->id ?>" required>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse-<?=  $k ?>" class="collapse" aria-labelledby="heading-<?=  $k ?>"
                                    data-parent="#booking-collapse">
                                    <div class="card-body">
                                        <?= $service->description ?> 
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center"> <span class="heading-meta"><?= $banners[38][1]->title ?></span>
                                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[38][1]->description ?></h2>
                            </div>
                            <div class="col-12">
                                <div class="box-radio-list">
                                <?php foreach($appointments as $k => $appoint): ?>
                                    <div class="checkbox babel-ignore">
                                        <label>
                                       
                                        <input type="checkbox" class="addon-option" name="appointment"   value="<?= $appoint->id ?>" data-qa="addons-<?= $k ?>-checkbox"><span></span> 
                                                <span class="addon-name"><?= $appoint->title ?></span> <span class="addon-attributes"> 
                                                    <span class="addon-price"><?= '$'.$appoint->color. '.00' ?></span></span></label>
                                    </div>   
                                <?php endforeach ?>       
                                </div>
                            </div>
                        </div>
                        <div class="row datetime-box">
                            <div class="col-md-12 text-center"> <span class="heading-meta"><?= $banners[38][2]->title ?></span>
                                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[38][2]->description ?></h2>
                            </div>
                            <div class="col-12">
                                <input id="datetimepicker" type="text" name="date" placeholder="20/05/2021 15:00" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="btn-contact"><button type="submit"><span><?= __('Next') ?></span></button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</form>