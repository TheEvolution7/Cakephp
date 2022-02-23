<?= $this->element('submenu') ?>

    <?php echo $this->Form->create($user) ?>
    <?php $this->Form->setTemplates([
        'inputContainer' => '{{content}}',
    ]) ?>
    
    <div class="account-row">
        <div class="account-title">Change your password</div>
        <div class="box-edit-pass __2">
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

    <div class="account-row __2">
        <div class="account-title">Recent activity</div>
        <div class="box-edit-pass __2">
            <div class="box-table-s">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>IP Address</th>
                            <th>Device</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $log): ?>
                            <tr>
                                <td data-label="Date"><?= $log->created->nice() ?></td>
                                <td data-label="IP Address"><?= $log->user_ip ?></td>
                                <td data-label="Device"><?= $log->user_agent ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="note-box">
                <p>
                    If you don't recognize any of these logins, please change your password and <a href="mailto:support@portokalle.ca">contact us.</a><br />
                    Want to get notified if there is suspicious activity on your account? <a href="user_notifications.html">Update your notification settings</a>
                </p>
            </div>
        </div>
    </div>

    <div class="account-row __2">
        <div class="account-title">Hide consults</div>
        <div class="box-edit-pass __2">
            <div class="box-table-s">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Provider</th>
                            <th>Patient</th>
                            <th>Consult details</th>
                            <th>Consult privacy</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td data-label="Date"><?= $appointment->created->nice() ?></td>
                                <td data-label="Provider"><?= isset($appointment->personal) ? $appointment->personal->full_name: '' ?></td>
                                <td data-label="Patient"><?= isset($appointment->patient) ? $appointment->patient->full_name: '' ?></td>
                                <td data-label="Consult details"><a href="#">View more</a></td>
                                <td data-label="Consult privacy"><a href="#">View more</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
