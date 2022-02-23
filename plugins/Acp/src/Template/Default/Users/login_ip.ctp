<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?= $webrootAcp ?>media/bg/bg-2.jpg);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="<?= $webrootAcp ?>media/logos/logo-5.png">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title"><?= __d('acp','Send Email') ?></h3>
                        </div>
                        <?= $this->Form->create('Users', [
                                    'class' => 'kt-form',
                                    'templates' => [

                                        'inputSubmit' => '<input type="{{type}}" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" {{attrs}}/>',
                                        'submitContainer' => '{{content}}',
                                    ],
                                ]);
                            ?>
                                <?= $this->Form->input('email', [
                                        'templates' => [
                                            'inputContainer' => '<div class="input-group">{{content}}</div>'
                                        ],
                                        'label' => false, 'class' => 'form-control', 'placeholder' => __d('acp', 'Email'), 'required' => 'required'
                                    ]);
                                ?>
                            <div class="row kt-login__extra">
                                <!-- <div class="col">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="remember"> Remember me
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col kt-align-right">
                                    <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
                                </div> -->
                            </div>
                            <div class="kt-login__actions">
                                <button class="btn btn-brand btn-pill kt-login__btn-primary"><?= __d('acp','Send Email') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>