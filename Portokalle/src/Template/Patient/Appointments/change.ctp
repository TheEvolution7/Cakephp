<?php 
use Cake\I18n\Time;
?>
<div class="membership-container">
    <div class="membership-row">
        <div class="form-build">
            <div class="form-container">
                <div class="field">
                    <h3 class="field__title"><?= __('Pick a time') ?></h3>
                    <?php echo $this->Form->create(); ?>
                    <div class="form-container">
                        <div class="medical_form_group flex">
                            <div class="medical-form__subgroup flex gap-2 date-form">
                                <div class="subgroup-item flex-1 flex flex-col">
                                    <div class="profiles-form-input" style="padding: 0;">
                                        <div class="medical_form_subgroup__title"><label for="month_dor">Month</label></div>
                                        <?php
                                            echo $this->Form->date('date', [
                                                'day' => false,
                                                'month' => true,
                                                'year' => false,
                                                'value' => new dateTime()
                                            ]);
                                        ?>
                                    </div>
                                </div>
                                <div class="subgroup-item flex-1 flex flex-col">
                                    <div class="profiles-form-input" style="padding: 0;">
                                        <div class="medical_form_subgroup__title"><label for="day_dor">Day</label></div>
                                        <?php
                                            echo $this->Form->date('date', [
                                                'day' => true,
                                                'month' => false,
                                                'year' => false,
                                                'value' => new dateTime()
                                            ]);
                                        ?>
                                    </div>
                                </div>
                                <div class="subgroup-item flex-1 flex flex-col">
                                    <div class="profiles-form-input" style="padding: 0;">
                                        <div class="medical_form_subgroup__title"><label for="year_dor">Year</label></div>
                                        <?php
                                            echo $this->Form->date('date', [
                                                'day' => false,
                                                'month' => false,
                                                'year' => true,
                                                'value' => new dateTime()
                                            ]);
                                        ?>
                                    </div>
                                </div>
                                <div class="subgroup-item flex-1 flex flex-col">
                                    <div class="profiles-form-input" style="padding: 0;">
                                        <div class="medical_form_subgroup__title"><label for="year_dor">Hour</label></div>
                                        <?php
                                            echo $this->Form->time('date', [
                                                'hour' => true,
                                                'minute' => false,
                                                'value' => new dateTime()
                                            ]);
                                        ?>
                                    </div>
                                </div>
                                <div class="subgroup-item flex-1 flex flex-col">
                                    <div class="profiles-form-input" style="padding: 0;">
                                        <div class="medical_form_subgroup__title"><label for="year_dor">Minute</label></div>
                                        <?php
                                            echo $this->Form->time('date', [
                                                'interval' => 15,
                                                'hour' => false,
                                                'minute' => true,
                                                'meridian' => false,
                                                'value' => new dateTime()
                                            ]);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= $this->Html->link(__('Back'), ['action' => 'booking'], ['class' => 'btn btn_blue']) ?>
                        <?= $this->Form->button(__('Change'), ['class' => 'btn btn_blue']) ?>
                    </div>
                    <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</div>