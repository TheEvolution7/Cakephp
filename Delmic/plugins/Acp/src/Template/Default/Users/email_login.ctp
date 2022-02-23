<div class="main-panel">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0"> 
            <div class="col-lg-4 mx-auto">
                <div class="row"><?= $this->Flash->render() ?></div>
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                    <!-- <div class="brand-logo">
                        <img src="<?= $webrootAcp ?>media/logos/logo-light.png" alt="logo">
                    </div> -->
                    <h4><?= __d('acp', 'Sign in with verification code.') ?></h4>
                    <p><?= isset($_GET['confirm']) && $_GET['confirm'] == 'code' ? 'Check your email' : '' ?></p>
                    <h6 class="font-weight-light"></h6>
                    <?= $this->Form->create('Users', [
                            'class' => 'pt-3',
                            'templates' => [

                                'inputSubmit' => '<input type="{{type}}" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" {{attrs}}/>',
                                'submitContainer' => '{{content}}',
                            ],
                        ]);
                    ?>
                    <?php if(empty($requestQuery['confirm'])): ?>
                        <?= $this->Form->input('email', [
                                'templates' => [
                                    'inputContainer' => '<div class="form-group">{{content}}</div>'
                                ],
                                'label' => false, 'class' => 'form-control form-control-lg', 'placeholder' => __d('acp', 'Email'), 'required' => 'required'
                            ]);
                        ?>
                        <div class="mt-3">
                            <?= $this->Form->submit(__d('acp', 'SEND TO EMAIL')) ?>
                        </div>
                    <?php else: ?>
                        <?= $this->Form->input('login_code', [
                                'templates' => [
                                    'inputContainer' => '<div class="form-group">{{content}}</div>'
                                ],
                                'label' => false, 'class' => 'form-control form-control-lg', 'placeholder' => __d('acp', 'Enter Code'), 'required' => 'required'
                            ]);
                        ?>
                        <div class="mt-3">
                            <?= $this->Form->submit(__d('acp', 'CONFIRM')) ?>
                        </div>
                    <?php endif; ?>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>