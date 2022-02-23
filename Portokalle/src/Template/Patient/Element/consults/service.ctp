<?php 
use Cake\I18n\Number;
echo $this->Form->create(); ?>
<div class="form-container">
    <div class="box-checkout flex justify-center">
        <div class="pack-col">
            <div class="field">
                <h3 class="field__title">Select a service</h3>
                <div class="package-container __pay-2">
                    <?php foreach ($services as $key => $service): ?>
                        <div class="col-pack">
                            <input type="radio" id="service-<?= $key ?>" class="hidden"
                                name="service_id" value="<?= $service->id ?>" required>
                            <label for="service-<?= $key ?>" class="history__card">
                                <div class="">
                                   
                                    <div class="check-box-custom"></div>
                                </div>
                                <div class="history__title">
                                    <?= $service->title ?>
                                </div>
                                <div class="history__details">
                                    <span class="history__company"><?= $service->description ?></span>
                                </div>
                                <div class="history__line">
                                    <div class="history__time"><?php echo $this->Number->currency($service->price, 'USD'); ?></div>
                                    <div class="history__status"></div>
                                </div>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="flex justify-center btn-step">
                <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
                <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end();