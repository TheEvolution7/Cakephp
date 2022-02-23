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
                <?php echo $this->Form->create(null, ['class' => 'login__col']);?>
                    <div class="login__form">
                        <h4 class="login__title h4"><?= __('You have forgot your password ?') ?></h4>
                        <div class="login__info"><?= __('Use the form below to recover your password ! An E-mail will be send to you.') ?></div>
                        <div class="login__fieldset">
                            <div class="field field_icon">
                                <div class="field__label">Email Adress</div>
                                <div class="field__wrap">
                                    <?php echo $this->Form->text('email', [
                                        'type' => 'email', 
                                        'class' => 'field__input',
                                        'required' => true,
                                    ]); ?>
                                    <div class="field__icon"><img src="<?= $webroot ?>img/icons/mail-at.svg" alt="" /></div>
                                </div>
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