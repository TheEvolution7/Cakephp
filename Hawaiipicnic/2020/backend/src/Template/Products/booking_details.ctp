<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?> 
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[28][0]->id . DS . $banners[28][0]->image) ?>" alt="<?= $banners[28][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta"><?= $banners[28][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[28][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking -->
<div class="booking-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <?= $this->Form->create($product , ['url' => ['controller' => 'Carts', 'action' => 'add'], 'id' => 'form-submit']) ?>
                    <div class="booking-appointment">
                        <div class="accordion" id="booking-collapse">
                        <?php foreach($products as $key => $p): ?>
                                <div class="card">
                                    <div class="card-header" id="heading-<?= $key+1 ?>">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link <?= $this->request->getParam('id') == $p->id ? '' : 'collapsed' ?>" type="button" onclick="window.location.href='<?= $this->Url->build(['controller' => 'Products','action' => 'bookingDetails',$p->slug,$p->id]) ?>';"
                                                data-toggle="collapse" data-target="#collapse-<?= $key+1 ?>" 
                                                aria-expanded="<?= $this->request->getParam('id') == $p->id ? 'true' : 'false' ?>" aria-controls="collapse-<?= $key+1 ?>">
                                                <?= $p->title. ' (' . $p->time .' @'.  \Cake\Core\Configure::read('Core.setting.currency').number_format($p->price, 2, '.', ',')  . ')'  ?> 
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse-<?= $key+1 ?>" class="collapse <?= $this->request->getParam('id') == $p->id ? 'show' : '' ?>" aria-labelledby="heading-<?= $key+1 ?>"
                                        data-parent="#booking-collapse">
                                        <div class="card-body">
                                            <?= $p->content ?>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center"> <span class="heading-meta">Booking</span>
                                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Add to
                                    your appointment...</h2>
                            </div>
                            <div class="col-12">
                                <div class="box-radio-list">
                                <?php foreach($product->attribute_values as $value): ?>
                                    <div class="checkbox babel-ignore"><label><input type="checkbox"
                                                class="addon-option" name="attributes[Appointment]"
                                                value="<?= $value->slug ?>" data-qa="addons-0-checkbox">
                                                <span></span> 
                                                <span
                                                class="addon-name"><?= $value->title ?>
                                            </span> <span class="addon-attributes"> <span
                                                    class="addon-price">
                                                   <?= \Cake\Core\Configure::read('Core.setting.currency').number_format($value->color, 2, '.', ',')  ?>
                                                </span></span></label></div>
                                <?php endforeach ?>      
                                </div>
                            </div>
                        </div>
                        <div class="row datetime-box">
                            <div class="col-md-12 text-center"> <span class="heading-meta">Booking</span>
                                <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Choose datetime</h2>
                            </div>
                            <div class="col-12">
                                <input id="datetimepicker" type="text" name="date" placeholder="20/05/2021 15:00">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="btn-contact"><a onclick="document.getElementById('form-submit').submit();"><span>Next</span></a></div>
                            </div>
                        </div>
                    </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
