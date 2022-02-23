<!-- outer-->
<div class="outer not-top-banner">
    <!-- header-->
    <!-- container-->
    <div class="outer__container outer__container_flex">
        <div class="login login_row">
            <div class="login__row">
                <div class="login__col" style="background-image: url('<?= $webroot ?>img/content/login-pic-2.png');">
                    <a class="login__back" href="<?= $this->Url->build('/') ?>">
                        <svg class="icon icon-arrow-left">
                            <use xlink:href="#icon-arrow-left"></use>
                        </svg>
                        Back to Home
                    </a>
                </div>
                <?php echo $this->Form->create($user, ['class' => 'login__col']);?>
                    <div class="login__form">
                        <h4 class="login__title h4"><?= __('Reset your Password') ?></h4>
                        <div class="login__info"><?= __('Use the form below to reset your password !') ?></div>
                        <div class="login__fieldset">
                            <div class="field field_icon input-pass">
                                <div class="field__label">Password<a class="field__action show-pass" href="javascript:;">Show password</a></div>
                                <div class="field__wrap">
                                    <?php echo $this->Form->password('password', [
                                        'class' => 'field__input',
                                        'required' => true,
                                        'value' => false,
                                    ]); ?>
                                    <div class="field__icon"><img src="<?= $webroot ?>img/icons/lock.svg" alt="" /></div>
                                </div>
                                <?php echo $this->Form->error('password') ?>
                            </div>
                            <div class="field field_icon input-pass">
                                <div class="field__label">Password (Confirmation)<a class="field__action show-pass" href="javascript:;">Show password</a></div>
                                <div class="field__wrap">
                                    <?php echo $this->Form->password('password_confirm', [
                                        'class' => 'field__input',
                                        'required' => true,
                                        'value' => false,
                                    ]); ?>
                                    <div class="field__icon"><img src="<?= $webroot ?>img/icons/lock.svg" alt="" /></div>
                                </div>
                                <?php echo $this->Form->error('password_confirm') ?>
                            </div>
                        </div>
                        <?php echo $this->Form->button(__('Reset'), ['class' => 'login__btn btn btn_blue btn_wide']);?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <!-- footer-->
</div>
<!-- scripts-->