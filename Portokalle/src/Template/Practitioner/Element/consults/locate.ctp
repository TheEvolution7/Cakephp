<?php echo $this->Form->create(); ?>
<div class="form-container">
    <div class="field">
        <h3 class="field__title"><?= __('We could not automatically locate you.') ?></h3>
        <p><?= __('In order to match you with a doctor we require your location. You can manually select your location from the list below.') ?></p>
        <p><?= __('Manually select your location.') ?></p>
        <div class="field__wrap">
            <?= $this->Form->select('locate_id', $countries, ['class' => 'field1__select', 'empty' => true, 'required' => true]) ?>
        </div>
    </div>
    <?= $this->Html->link(__('Back to dashboard'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'btn btn_blue']) ?>
    <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue']) ?>
</div>
<? echo $this->Form->end();