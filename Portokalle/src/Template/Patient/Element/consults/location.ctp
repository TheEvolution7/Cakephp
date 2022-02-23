<?php 
use Cake\I18n\Time;

echo $this->Form->create(); 
?>
<div class="form-container">
    <div class="field">
        <h3 class="field__title"><?= __('Select your location') ?></h3>
        <p><?= __('Where will you be at the time of your appointment?') ?></p>
        <div class="field__wrap">
            <?= $this->Form->select('timezone', Time::listTimezones(), ['class' => 'field1__select', 'required' => true, 'default' => 'UTC']) ?>
        </div>
    </div>
    <div class="flex justify-center btn-step">
        <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
        <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
    </div>
</div>
<? echo $this->Form->end();