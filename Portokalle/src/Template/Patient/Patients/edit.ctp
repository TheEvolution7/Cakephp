<div class="account-container">
    <?php echo $this->Form->create($patient, ['type' => 'file']) ?>
    <?php $this->Form->setTemplates([
        'inputContainer' => '{{content}}',
    ]) ?>
    <div class="account-row">
        <div class="account-title"></div>        
        <div class="account-body">
            <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('first_name', ['required' => true]) ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('last_name', ['required' => true]) ?>
                </div>
            </div>
            <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('relationship', ['required' => true]) ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('sex', ['required' => true]) ?>
                </div>
            </div>
            <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('health_card') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('health_card_province') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('address') ?>
                </div>
            </div>
            <div class="form-group2">
                <div class="form-item">
                    <div class="medical-form__subgroup flex gap-2 date-form">
                        <div class="subgroup-item flex-1 flex flex-col">
                            <div class="profiles-form-input" style="padding: 0;">
                                <div class="medical_form_subgroup__title"><label for="month_dor">Month</label></div>
                                <?php
                                    echo $this->Form->date('date_of_birth', [
                                        'day' => false,
                                        'month' => true,
                                        'year' => false
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="subgroup-item flex-1 flex flex-col">
                            <div class="profiles-form-input" style="padding: 0;">
                                <div class="medical_form_subgroup__title"><label for="day_dor">Day</label></div>
                                <?php
                                    echo $this->Form->date('date_of_birth', [
                                        'day' => true,
                                        'month' => false,
                                        'year' => false
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="subgroup-item flex-1 flex flex-col">
                            <div class="profiles-form-input" style="padding: 0;">
                                <div class="medical_form_subgroup__title"><label for="year_dor">Year</label></div>
                                <?php
                                    echo $this->Form->date('date_of_birth', [
                                        'day' => false,
                                        'month' => false,
                                        'year' => true,
                                        'minYear' => '1900',
                                        'maxYear' => date('y')
                                    ]);
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('image', ['type' => 'file', 'required' => false, 'accept' => 'image/png, image/jpeg']) ?>
                </div>
            </div>
            <div class="form-control">
                <button type="submit" class="button button_primary"><?= __('Save') ?></button>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end() ?>
</div>
