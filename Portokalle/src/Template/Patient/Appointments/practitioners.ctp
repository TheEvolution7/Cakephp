<div class="profiles-container">
    <div class="profiles-row">
        <div class="profiles-header flex justify-between">
            <div class="profiles-title"><?= __('Recent Practitioner') ?></div>
        </div>
        <div class="profiles-body patient-list">
            <?php foreach ($practitioners as $practitioner): ?>
                <?php if (!empty($practitioner->personal)): ?>
                    <a href="<?= $this->Url->build(['action' => 'edit', $practitioner->id]) ?>" class="profile-wrapper">
                        <div class="profile-image">
                            <?= $this->Html->image('/uploads/personals/' . $practitioner->personal->id . DS . $practitioner->personal->photo) ?>
                        </div>
                        <div class="profile-name"><?= $practitioner->personal->title . ' ' . $practitioner->personal->forename . ' ' . $practitioner->personal->surname  ?></div>
                        <div class="profile-age-gender"><?= ucfirst($practitioner->personal->gender) ?></div>
                        <div class="profile-relationship"><?= $practitioner->personal->description ?></div>
                    </a>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
    <div class="account-row">
        <div class="account-title">Change your password</div>
            <form action="">
                <div class="box-edit-pass">
                    <div class="entry__fieldset">
                        <div class="field1 field1_icon js-field">
                            <div class="field1__label">Password</div>
                            <div class="field1__wrap field1__pass">
                                <input class="field1__input js-field-input" type="password" name="password" required="" />
                                <button class="field1__view js-field-view active" type="button">
                                    <svg class="icon icon-eye">
                                        <use xlink:href="img/sprite.svg#icon-eye"></use>
                                    </svg>
                                    <span class="field1__line"></span>
                                </button>
                            </div>
                        </div>
                        <div class="field1 field1_icon js-field">
                            <div class="field1__label">New Password</div>
                            <div class="field1__wrap field1__pass">
                                <input class="field1__input js-field-input" type="password" name="password" required="" />
                                <button class="field1__view js-field-view active" type="button">
                                    <svg class="icon icon-eye">
                                        <use xlink:href="img/sprite.svg#icon-eye"></use>
                                    </svg>
                                    <span class="field1__line"></span>
                                </button>
                            </div>
                        </div>
                        <div class="field1 field1_icon js-field">
                            <div class="field1__label">Confirm Password</div>
                            <div class="field1__wrap field1__pass">
                                <input class="field1__input js-field-input" type="password" name="password-confirm" required="" />
                                <button class="field1__view js-field-view active" type="button">
                                    <svg class="icon icon-eye">
                                        <use xlink:href="img/sprite.svg#icon-eye"></use>
                                    </svg>
                                    <span class="field1__line"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="button button_primary" type="button">Change password</button>
                </div>
            </form>
        </div>
    </div>

</div>
