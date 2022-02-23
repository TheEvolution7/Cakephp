<?php 
    use Cake\I18n\Time;
    use Cake\I18n\Number;
    $session = $this->getRequest()->getSession();
    $consults = $session->read('Consults');
    if (isset($consults['slot']['date'])) {
        $time = new Time(__('{date} {time}', $consults['slot']));
    }
    echo $this->Form->create();
?>

<?php if ($session->read('Consults.speciality.type_booking') == 'book_appointment'): ?>
<div class="form-container">
    <div class="box-checkout">
        <div class="pack-col">
            <h3 class="field__title">Select payment option</h3>
            <div class="package-container __confirm">
                <div class="col-pack">
                    <input type="radio" id="package-1" class="hidden" name="payment" value="one_time" required />
                    <label for="package-1" class="history__card">
                        <div class="history__logo __1">
                            <img class="history__pic" src="<?= $webroot?>img/ic-pay-3.svg" alt="" />
                            <div class="check-box-custom"></div>
                        </div>
                        <div class="history__title">One time payment of <?php echo $this->Number->currency($service->price, 'USD'); ?></div>
                    </label>
                </div>
                <!-- <div class="col-pack">
                    <input type="radio" id="package-2" class="hidden" name="payment" value="CA$79" required disabled />
                    <label for="package-2" class="history__card">
                        <div class="history__logo __1">
                            <img class="history__pic" src="<?= $webroot?>img/ic-pay-1.svg" alt="" />
                            <div class="check-box-custom"></div>
                        </div>
                        <div class="history__title">
                            Personal membership
                        </div>
                        <div class="history__line">
                            <div class="history__time"><?php echo $this->Number->currency('29,92', 'USD'); ?></div>
                            <div class="history__status">/ month</div>
                        </div>
                    </label>
                </div>
                <div class="col-pack">
                    <input type="radio" id="package-3" class="hidden" name="payment" value="CA$99" required disabled/>
                    <label for="package-3" class="history__card">
                        <div class="history__logo __1">
                            <img class="history__pic" src="<?= $webroot?>img/ic-pay-2.svg" alt="" />
                            <div class="check-box-custom"></div>
                        </div>
                        <div class="history__title">Family membership</div>
                        <div class="history__line">
                            <div class="history__time"><?php echo $this->Number->currency('48.25', 'USD'); ?></div>
                            <div class="history__status">/ month</div>
                        </div>
                    </label>
                </div> -->
            </div>
        </div>

        <div class="total-col">
            <div class="field">
                <h3 class="field__title">Confirmation of Details</h3>
                <!-- <div class="field__label">Who is this visit for ?</div> -->
                <div class="table-wrap">
                    <table>
                        <tbody>
                            <tr>
                                <th>Service</th>
                                <td><?= $specialities->title ?><br/>
                                    <?= $service->title ?></td>
                            </tr>
                            <tr>
                                <th>Provider</th>
                                <td><?= $session->read('Consults.findPractitioner.full_name') ?></td>
                            </tr>
                            <tr>
                                <th>When</th>
                                <td><?= $time->nice() ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-center btn-step">
    <?= $this->Html->link(__('Previous'), $param, ['class' => 'btn btn_blue __back']) ?>
    <?= $this->Form->button(__('Confirm Appointment'), ['class' => 'btn btn_blue __next']) ?>
</div>
<?php endif ?>

<?php if ($session->read('Consults.speciality.type_booking') == 'as_soon_as_possible'): ?>
<div class="form-container">
    <div class="box-checkout">
        <div class="pack-col">
            <div class="field">
                <h3 class="field__title">Choose package?</h3>
                <!-- <div class="field__label">Who is this visit for ?</div> -->
                <div class="package-container __confirm">
                    <?php foreach ($services as $key => $service): ?>
                        <div class="col-pack">
                            <input type="radio" id="package-<?= $key ?>" class="hidden" name="service_id" value="<?= $service->id ?>" />
                            <label for="package-<?= $key ?>" class="history__card">
                                <div class="history__logo">
                                    <img class="history__pic" src="<?= $this->Url->build('/uploads/services/' . $service->id . '/' . $service->image) ?>" alt="" />
                                    <div class="check-box-custom"></div>
                                </div>
                                <div class="history__title"><?= $service->title ?></div>
                                <div class="history__details">
                                    <span class="history__company"><?= $service->description ?></span>
                                </div>
                                <div class="history__line">
                                    <div class="history__time"><?php echo $this->Number->currency($service->price, 'USD'); ?></div>
                                    <div class="history__status">/Visit</div>
                                </div>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="total-col">
            <h3 class="field__title">Select payment option</h3>
            <div class="item-total">
                <h4>1. One time payment of <span id="price-choose"></span></h4>
                <?= $this->Form->submit(
                    'Select this option',
                    ['class' => 'btn-op', 'data' => 'one_time'])
                ?>
            </div>
            <!-- <div class="item-total">
                        <h4>2. Buy discount package</h4>
                        <a href="user_step-pay-2.html" class="btn-op">View discount options</a>
                      </div> -->
            <!-- <div class="item-total">
                <h4>2. Subscribe for year-round care</h4>
                <a href="user_step-pay-3.html" class="btn-op">View discount options</a>
            </div> -->
        </div>
    </div>
</div>
<div class="flex justify-center btn-step">
    <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
</div>
<?php endif ?>
<?php echo $this->Form->end() ?>
