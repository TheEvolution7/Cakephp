<div class="account-container">
    <?php echo $this->Form->create($user) ?>
    <?php $this->Form->setTemplates([
        'inputContainer' => '{{content}}',
    ]) ?>
    <div class="account-row">
        <div class="account-title"><?= __('Your information') ?></div>        
        <div class="account-body">
            <div class="form-avatar">
                <div class="avatar" style="max-width: 100px;">
                    <?= $this->Html->image('/uploads/users/' . $user->id . DS . $user->image) ?>
                    <div class="avatar-control">
                        <button class="button-simple-icon"><i class="fas fa-image"></i></button>
                        <button class="button-simple-icon"><i class="fas fa-camera"></i></button>
                    </div>
                </div>
                <div class="username">
                    <?= $user->full_name ?>
                </div>
            </div>
            <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('first_name') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('last_name') ?>
                </div>
            </div>
            <div class="form-item">
                <?= $this->Form->control('email') ?>
            </div>
            <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('phone_number') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('address') ?>
                </div>
            </div>
            <div class="form-control">
                <button type="submit" class="button button_primary"><?= __('Save') ?></button>
            </div>
        </div>
    </div>

    <div class="account-row">
        <div class="account-title"><?= __('Change your password') ?></div>
        <div class="box-edit-pass">
            <div class="entry__fieldset">
                <div class="field1 field1_icon js-field">
                    <div class="field1__label"><?= __('Password') ?></div>
                    <div class="field1__wrap field1__pass">
                        <?= $this->Form->password('password', ['class' => 'field1__input js-field-input', 'required' => true, 'value' => false]) ?>
                        <button class="field1__view js-field-view active" type="button">
                            <svg class="icon icon-eye">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-eye"></use>
                            </svg>
                            <span class="field1__line"></span>
                        </button>
                    </div>
                </div>
                <div class="field1 field1_icon js-field">
                    <div class="field1__label"><?= __('Confirm Password') ?></div>
                    <div class="field1__wrap field1__pass">
                        <?= $this->Form->input(
                            'password_confirm',
                            [
                                'type' => 'password',
                                'label' => false,
                                'class' => 'field1__input js-field-input',
                                'placeholder' => __("Password (Confirmation)"),
                                'required' => true,
                                'value' => '',
                                'error' => false
                            ]
                        ) ?>
                        <button class="field1__view js-field-view active" type="button">
                            <svg class="icon icon-eye">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-eye"></use>
                            </svg>
                            <span class="field1__line"></span>
                        </button>
                    </div>
                </div>
            </div>

            <button type="submit" class="button button_primary" type="button"><?= __('Change password') ?></button>
        </div>
    </div>
    <?php echo $this->Form->end() ?>
</div>
