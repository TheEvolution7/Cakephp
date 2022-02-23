<?= $this->element('submenu') ?>

    <?php echo $this->Form->create($user) ?>
    <?php $this->Form->setTemplates([
        'inputContainer' => '{{content}}',
    ]) ?>
    
    <div class="account-row __2">
    <div class="account-title">Notification settings</div>
    <div class="box-edit-pass __choose-brower" style="margin-bottom: 20px;">
        <h4>Browser notifications</h4>
        <p>Please enable browser notifications to get notified of events, i.e. new consultation message</p>
        <a href="#" class="header__btn btn btn_blue __purple btn__ssm">Enable browser notifications</a>
    </div>
    <div class="box-edit-pass __2">
        <div class="box-table-s __2">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Email</th>
                        <th>SMS</th>
                        <th>Push</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="">
                            <div class="content-noti">
                                <h4>Consultation updates</h4>
                                <p>Get notified of events that happen during a consultatio</p>
                            </div>
                        </td>
                        <td data-label="Email">
                            <label class="switch">
                                <input id="input-noti-1-1" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                        <td data-label="SMS">
                            <label class="switch">
                                <input id="input-noti-1-2" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                        <td data-label="Push">
                            <label class="switch">
                                <input id="input-noti-1-3" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="">
                            <div class="content-noti">
                                <h4>New messages on consultations</h4>
                                <p>Get notified of new consultation messages when you're offline</p>
                            </div>
                        </td>
                        <td data-label="Email">
                            <label class="switch">
                                <input id="input-noti-2-1" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                        <td data-label="SMS">
                            <label class="switch">
                                <input id="input-noti-2-2" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                        <td data-label="Push">
                            <label class="switch">
                                <input id="input-noti-2-3" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="">
                            <div class="content-noti">
                                <h4>Security alerts</h4>
                                <p>Get notified if there is any suspicious activity on your account</p>
                            </div>
                        </td>
                        <td data-label="Email">
                            <label class="switch">
                                <input id="input-noti-3-1" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                        <td data-label="SMS">
                            <label class="switch">
                                <input id="input-noti-3-2" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                        <td data-label="Push">
                            <label class="switch">
                                <input id="input-noti-3-3" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="">
                            <div class="content-noti">
                                <h4>Referral alerts</h4>
                                <p>Get notified when a friend registers with your Maple referral link</p>
                            </div>
                        </td>
                        <td data-label="Email">
                            <label class="switch">
                                <input id="input-noti-4-1" class="switch__input" type="checkbox" />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                        <td data-label="SMS">
                            <label class="switch">
                                <input id="input-noti-4-2" class="switch__input" type="checkbox" checked />
                                <span class="switch__in">
                                    <span class="switch__box"></span>
                                    <span class="switch__icon"></span>
                                </span>
                            </label>
                        </td>
                        <td data-label="Push">
                            <label class="switch">
                                <input id="input-noti-4-3" class="switch__input" type="checkbox" />
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


    <?php echo $this->Form->end() ?>

</div>
