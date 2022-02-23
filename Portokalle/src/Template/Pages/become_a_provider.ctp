<?= $this->Form->create($personal) ?>
<div class="page__wrapper">
    <div class="entry entry_bg">
        <div class="entry__wrap">
            <div class="entry__title"><?= __('Tell us more about yourself') ?></div>
            <form class="entry__form">
                <div class="entry__fieldset">
                    <div class="field1 js-field">
                        <div class="field1__label"><?= __('Full name') ?>*</div>
                        <div class="field1__wrap">
                            <?= $this->Form->text('full_name', ['class' => 'field1__input js-field-input', 'required' => true]) ?>
                        </div>
                    </div>
                    <div class="field1 js-field">
                        <div class="field1__label"><?= __('Email address') ?>*</div>
                        <div class="field1__wrap">
                            <?= $this->Form->text('email', ['class' => 'field1__input js-field-input', 'required' => true, 'type' => 'email']) ?>
                        </div>
                    </div>
                    <div class="field1 js-field">
                        <div class="field1__label"><?= __('Phone number') ?>*</div>
                        <div class="field1__wrap">
                            <?= $this->Form->text('phone_number', ['class' => 'field1__input js-field-input', 'required' => true]) ?>
                        </div>
                    </div>
                    <div class="field1 js-field">
                        <div class="field1__label"><?= __('Speciality') ?>*</div>
                        <div class="field1__wrap">
                            <?= $this->Form->text('speciality', ['class' => 'field1__input js-field-input', 'required' => true]) ?>
                        </div>
                    </div>
                    
                    <div class="field1 js-field">
                        <div class="field1__label"><?= __('How did you hear about us?') ?>*</div>
                        <div class="field1__wrap">
                            <?= $this->Form->text('about_us', ['class' => 'field1__input js-field-input', 'required' => true]) ?>
                        </div>
                    </div>
                    <div class="field1 js-field">
                        <div class="field1__label"><?= __('Physician College Online Listing (optional)') ?></div>
                        <div class="field1__wrap"><?= $this->Form->text('col_onl', ['class' => 'field1__input js-field-input']) ?></div>
                        
                        
                    </div>
                    <label class="checkbox">
                      <input class="checkbox__input" type="checkbox" required><span class="checkbox__in"><span class="checkbox__tick"></span><span class="checkbox__text"><?= __('I agree to the') . ' ' . $this->Html->link( __('Terms & Conditions'), ['action' => 'termAndConditions'], ['target' => '_blank']) ?></span></span>
                    </label>
                    <div class="entry__text">
                            <?= __('Provide a link to your online listing with the physician college you are associated with to confirm your license and registration.') ?>
                        </div>
                </div>
                <div class="entry__btns">
                    <button class="entry__btn btn btn btn_big btn_blue" type="submit"><?= __('Send request') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
