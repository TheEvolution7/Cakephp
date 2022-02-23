<div class="outer not-top-banner">
    <!-- header-->
    <!-- container-->
    <div class="outer__container outer__container_flex">
        <div class="login login_row">
            <div class="login__row">
                <div class="login__col" style="background-image: url('<?= $webroot ?>img/content/login-pic-2.png');">
                    <a class="login__back" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Pages', 'action' => 'home']) ?>">
                        <svg class="icon icon-arrow-left">
                            <use xlink:href="#icon-arrow-left"></use>
                        </svg>
                        Back to Home
                    </a>
                </div>
                <?php echo $this->Form->create($user, ['class' => 'login__col']);?>
                    <div class="login__form">
                        <h4 class="login__title h4">Create your free account to see a doctor any time, 24/7.</h4>
                        <div class="login__info"></div>
                        <h4 class="login__title h4">Account info</h4>
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
                                <div class="field__label">Email</div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->text('email', [
                                        'type' => 'email', 
                                        'class' => 'field__input',
                                        'required' => true,
                                    ]); 
                                    echo $this->Form->error('email');
                                    ?>
                                </div>
                            </div>
                            <div class="field field_icon input-pass">
                                <div class="field__label">Password<a class="field__action show-pass" href="javascript:;">Show password</a></div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->password('password', [
                                        'class' => 'field__input',
                                        'required' => true
                                    ]); 
                                    echo $this->Form->error('password');
                                    ?>
                                </div>
                            </div>
                            <div class="field field_icon input-pass">
                                <div class="field__label">Password (Confirmation)<a class="field__action show-pass" href="javascript:;">Show password</a></div>
                                <div class="field__wrap">
                                    <?php echo $this->Form->password('password_confirm', [
                                        'class' => 'field__input',
                                        'required' => true
                                    ]); ?>
                                </div>
                                <?= $this->Form->error('password_confirm') ?>
                            </div>
                            <hr>
                            <h4 class="login__title h4">Profile</h4>
                            <div class="field field_icon">
                                <div class="field__label">Date of birth (DD/MM/YYYY)</div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->text('patients.0.date_of_birth', [
                                        'class' => 'field__input',
                                        'type' => 'date'
                                    ]); 
                                    echo $this->Form->error('patients.0.date_of_birth');
                                    ?>
                                </div>
                            </div>
                            <div class="field field_icon">
                                <div class="field__label">Sex</div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->select('patients.0.sex', ['female' => 'Female', 'male' => 'Male'],[
                                        'class' => 'field__input',
                                    ]); 
                                    echo $this->Form->error('patients.0.sex');
                                    ?>
                                </div>
                            </div>
                            <div class="field field_icon">
                                <div class="field__label">Residence</div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->select('patients.0.residence', [
                                        'Berat',  
                                        'Dibër',   
                                        'Durrës',  
                                        'Elbasan', 
                                        'Fier',    
                                        'Gjirokastër', 
                                        'Korçë',   
                                        'Kukës',   
                                        'Lezhë',   
                                        'Shkodër', 
                                        'Tirana',  
                                        'Vlorë',
                                    ], 
                                    [
                                        'class' => 'field__input',
                                    ]); 
                                    echo $this->Form->error('patients.0.residence');
                                    ?>
                                </div>
                            </div>
                            <div class="field field_icon">
                                <div class="field__label">Address</div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->text('address', [
                                        'class' => 'field__input',
                                        'required' => true,
                                    ]); 
                                    echo $this->Form->error('address');
                                    ?>
                                </div>
                            </div>
                            <div class="field field_icon">
                                <div class="field__label">Phone number</div>
                                <div class="field__wrap">
                                    <?php 
                                    echo $this->Form->text('patients.0.phone_number', [
                                        'class' => 'field__input',
                                    ]); 
                                    echo $this->Form->error('patients.0.phone_number');
                                    ?>
                                </div>
                            </div>

                        </div>
                        <label class="checkbox">
                          <input class="checkbox__input" type="checkbox" required><span class="checkbox__in"><span class="checkbox__tick"></span><span class="checkbox__text">I agree to the Terms & Conditions</span></span>
                        </label>
                        <?php echo $this->Form->button(__('Create your account'), ['class' => 'login__btn btn btn_blue btn_wide']);?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <!-- footer-->
</div>
<!-- scripts