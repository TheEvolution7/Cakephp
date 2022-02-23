<?= $this->element('submenu') ?>

    <?php echo $this->Form->create($user) ?>
    <?php $this->Form->setTemplates([
        'inputContainer' => '{{content}}',
    ]) ?>
    
    <div class="account-row __2">
        <div class="account-title">Interface Language</div>
        <div class="box-edit-pass __2 __lang">
            <div class="profiles-form-input">
                <label for="lang">Interface Language</label>
                <select name="lang">
                    <option value="0">Albanian</option>
                    <option value="1">English</option>
                    <option value="2">French</option>
                    <option value="3">Italian</option>
                </select>
            </div>
        </div>
    </div>

    <div class="account-row __2">
        <div class="account-title">Consultation Languages</div>
        <div class="box-edit-pass __2">
            <div class="box-table-s __lang">
                <table>
                    <thead>
                        <tr>
                            <th>Language</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Language">
                                Albanian
                            </td>
                            <td data-label="Active">
                                <label class="switch">
                                    <input id="input-lang-1" class="switch__input" type="checkbox" checked />
                                    <span class="switch__in">
                                        <span class="switch__box"></span>
                                        <span class="switch__icon"></span>
                                    </span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Language">
                                English
                            </td>
                            <td data-label="Active">
                                <label class="switch">
                                    <input id="input-lang-1" class="switch__input" type="checkbox" checked />
                                    <span class="switch__in">
                                        <span class="switch__box"></span>
                                        <span class="switch__icon"></span>
                                    </span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Language">
                                French
                            </td>
                            <td data-label="Active">
                                <label class="switch">
                                    <input id="input-lang-2" class="switch__input" type="checkbox" checked />
                                    <span class="switch__in">
                                        <span class="switch__box"></span>
                                        <span class="switch__icon"></span>
                                    </span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Language">
                                Italian
                            </td>
                            <td data-label="Active">
                                <label class="switch">
                                    <input id="input-lang-2" class="switch__input" type="checkbox" checked />
                                    <span class="switch__in">
                                        <span class="switch__box"></span>
                                        <span class="switch__icon"></span>
                                    </span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="account-row __2">
        <div class="account-title">Communications Language</div>
        <div class="box-edit-pass __2 __lang">
            <div class="profiles-form-input">
                <label for="lang">Choose the language in which to receive notifications via email or sms</label>
                <select name="lang">
                    <option value="0">Albanian</option>
                    <option value="1">English</option>
                    <option value="2">French</option>
                    <option value="3">Italian</option>
                </select>
            </div>
        </div>
    </div>



    <?php echo $this->Form->end() ?>

</div>
