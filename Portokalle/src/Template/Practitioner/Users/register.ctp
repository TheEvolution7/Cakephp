<!-- outer-->
<div class="outer not-top-banner">
    <!-- header-->
    <!-- container-->
    <div class="outer__container outer__container_flex">
        <div class="login login_row">
            <div class="login__row">
                <div class="login__col" style="background-image: url('<?= $webroot ?>img/content/login-pic-1.png');">
                    <div class="login__col" style="background-image: url('<?= $webroot ?>img/content/login-pic-1.png');">
                        <a class="login__back" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Pages', 'action' => 'home']) ?>">
                            <svg class="icon icon-arrow-left">
                                <use xlink:href="#icon-arrow-left"></use>
                            </svg>
                            Back to Home
                        </a>
                    </div>
                </div>
                <?php echo $this->Form->create($user, ['class' => 'login__col']);?>
                    <div class="login__form">
                        <h4 class="login__title h4">Create your account</h4>
                        <div class="login__info">Made with love for designers & developers.</div>
                        <div class="login__fieldset">
                            <div class="field field_icon">
                                <div class="field__label">First name</div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->text('first_name', [
                                        'class' => 'field__input',
                                        'required' => true,
                                    ]); 
                                    echo $this->Form->error('first_name');
                                    ?>
                                </div>
                            </div>
                            <div class="field field_icon">
                                <div class="field__label">Last name</div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->text('last_name', [
                                        'class' => 'field__input',
                                        'required' => true,
                                    ]); 
                                    echo $this->Form->error('last_name');
                                    ?>
                                </div>
                            </div>
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
                                <?= $this->Form->error('email') ?>
                            </div>
                            <div class="field field_icon input-pass">
                                <div class="field__label">Password<a class="field__action show-pass" href="javascript:;">Show password</a></div>
                                <div class="field__wrap">
                                    <?php echo $this->Form->password('password', [
                                        'class' => 'field__input',
                                        'required' => true
                                    ]); ?>
                                    <div class="field__icon"><img src="<?= $webroot ?>img/icons/lock.svg" alt="" /></div>
                                </div>
                                <?= $this->Form->error('password') ?>
                            </div>
                            
                            <div class="field field_icon input-pass">
                                <div class="field__label">Password (Confirmation)<a class="field__action show-pass" href="javascript:;">Show password</a></div>
                                <div class="field__wrap">
                                    <?php echo $this->Form->password('password_confirm', [
                                        'class' => 'field__input',
                                        'required' => true
                                    ]); ?>
                                    <div class="field__icon"><img src="<?= $webroot ?>img/icons/lock.svg" alt="" /></div>
                                </div>
                                <?= $this->Form->error('password_confirm') ?>
                            </div>
                            
                        </div>
                        <label class="checkbox">
                          <input class="checkbox__input" type="checkbox" required><span class="checkbox__in"><span class="checkbox__tick"></span><span class="checkbox__text">I agree to the Terms & Conditions</span></span>
                        </label>
                        <?php echo $this->Form->button(__('Create my account'), ['class' => 'login__btn btn btn_blue btn_wide']);?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <!-- footer-->
</div>
<!-- scripts-->