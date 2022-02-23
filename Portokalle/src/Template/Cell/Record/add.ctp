<div class="medical_new">
    <div class="js-activity-group medical_new__container">
        <div class="js-activity-head __title __title_button flex justify-between item-center">
            <span><?= __('Create new medical record for {0}', $_SESSION['Auth']['User']['full_name']) ?></span>
            <svg class="icon icon-arrow-down">
                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-down"></use>
            </svg>
        </div>
        <div class="medical_form__container">
            <?= $this->Form->create($record, ['url' => ['action' => 'add']]) ?>
            <?= $this->Form->hidden('patient_id', ['value' => $id]) ?>
            <div class="js-activity-tags grid grid-col-2 sm:grid-col-1" style="display: none">
                <div class="medical_form_group flex flex-col">
                    <div class="medical_form_group__title">
                        <?= $this->Form->label('record_category_id', null,['class' => 'field-label']) ?>
                    </div>
                    <?= $this->Form->select('record_category_id', $recordCategories, ['class' => 'field__input', 'empty' => true]) ?>
                </div>

                <div class="medical_form_group">
                    <div class="medical_form_group__title"><?= $this->Form->label('title') ?></div>
                    <?= $this->Form->text('title', ['class' => 'field__input']) ?>
                </div>
                <div class="medical_form_group flex">
                    <div class="medical_form_group__title"><?= $this->Form->label('date_of_record') ?></div>
                    <div class="medical-form__subgroup flex gap-2 date-form">
                        <div class="subgroup-item flex-1 flex flex-col">
                            <div class="medical_form_subgroup__title"><?= $this->Form->label('date_of_record.month') ?></div>
                            <?= $this->Form->date('date_of_record', [
                                'month' => [
                                    'class' => 'field__input'
                                ], 
                                'monthNames' => true,
                                'day' => false, 
                                'year' => false
                            ]) ?>
                        </div>
                        <div class="subgroup-item flex-1 flex flex-col">
                            <div class="medical_form_subgroup__title"><?= $this->Form->label('date_of_record.date') ?></div>
                            <?= $this->Form->date('date_of_record', [
                                'day' => [
                                    'class' => 'field__input'
                                ],
                                'month' => false, 
                                'year' => false
                            ]) ?>
                        </div>
                        <div class="subgroup-item flex-1 flex flex-col">
                            <div class="medical_form_subgroup__title"><?= $this->Form->label('date_of_record.year') ?></div>
                            <?= $this->Form->date('date_of_record', [
                                'year' => [
                                    'class' => 'field__input'
                                ],
                                'month' => false, 
                                'day' => false
                            ]) ?>
                        </div>
                    </div>
                </div>

                <div class="medical_form_group">
                    <div class="medical_form_group__title"><?= $this->Form->label('description') ?></div>
                    <?= $this->Form->textarea('description', ['class' => 'form__group__fullwidth field__textarea']) ?>
                </div>

                <div class="group-controls flex-row flex justify-start item-center">
                    <?= $this->Form->button('Submit', ['class' => 'button button_primary']) ?>
                </div>
            </div>
            
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
