<!-- outer-->
<div class="outer not-top-banner">
    <!-- header-->
    <!-- container-->
    <div class="outer__container outer__container_flex">
        <div class="login login_row">
            <div class="login__row">
                <div class="login__col" style="background-image: url('<?= $webroot ?>img/content/login-pic-1.png');">
                    <a class="login__back" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Pages', 'action' => 'home']) ?>">
                        <svg class="icon icon-arrow-left">
                            <use xlink:href="#icon-arrow-left"></use>
                        </svg>
                        Back to Home
                    </a>
                </div>
                <?php echo $this->Form->create(null, ['class' => 'login__col']);?>
                    <div class="login__form">
                        <h4 class="login__title h4">Sign In to Portokalle</h4>
                        <div class="login__info">Login to manage your account.</div>
                        <div class="login__fieldset">
                            <div class="field field_icon">
                                <div class="field__label">Email Adress</div>
                                <div class="field__wrap">
                                    <?php echo $this->Form->text('email', ['type' => 'email', 'class' => 'field__input']); ?>
                                    <div class="field__icon"><img src="<?= $webroot ?>img/icons/mail-at.svg" alt="" /></div>
                                </div>
                            </div>
                            <div class="field field_icon input-pass">
                                <div class="field__label">Password<a class="field__action show-pass" href="javascript:;">Show password</a></div>
                                <div class="field__wrap">
                                    <?php echo $this->Form->password('password', ['class' => 'field__input']); ?>
                                    <div class="field__icon"><img src="<?= $webroot ?>img/icons/lock.svg" alt="" /></div>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->button(__('Sign In'), ['class' => 'login__btn btn btn_blue btn_wide']);?>
                        <div class="login__foot">
                            <?= $this->Html->link(__('Do not have an account? Sign Up'), ['action' => 'register'], ['class' => 'login__link']) ?>
                            <?= $this->Html->link(__('Forgot Password?'), ['action' => 'forgotPassword'], ['class' => 'login__link']) ?>
                        </div>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <!-- footer-->
</div>
<!-- scripts-->