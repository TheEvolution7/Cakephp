<?php 
    $session = $this->getRequest()->getSession();
    echo $this->element('meta');
?>
<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content">
                <h2 class="title">Login</h2>
                <div class="bread-crumbs">
                    <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                    <span class="active">Login</span>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Contact Area ==-->
<div class="account-login-area">
    <div class="container">
    <div class="row">
        <div class="col-lg-7 m-auto">
        <div class="login-top">
            <nav class="login-form-nav">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="lastudioicon-user-1"></i>Login</button>
                <a class="nav-link nav-register" href="<?= $this->Url->build(['action' => 'register']) ?>"><i class="lastudioicon-user-2"></i>Register</a>
            </div>
            </nav>
        </div>
        <div class="login-bottom">
            <div class="login-form-content tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="login-form">
                <?= $this->Form->Create(null,['class' => 'login-form-wrapper','id' => 'login-form']) ?>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="UserName" class="form-label">Email address *</label>
                            <?= $this->Form->input('email', ['label' => false, 'class' => 'form-control','type' => 'email', 'required' => 'required']);?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                            <label for="password" class="form-label mt-15">Password *</label>
                            <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control','id' => 'password','type' => 'password','required' => 'required']);?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0 form-group-info">
                            <button class="btn btn-theme btn-black btn-border" type="submit">Log in</button>
                            <a class="btn-forgot" href="<?= $this->Url->build(['action' => 'forgotPassword']) ?>">Lost your password?</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                <?= $this->Form->end() ?>
                </div>
                <!-- Message Notification -->
                <div class="form-message"></div>
            </div>
            <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="login-form">
                <?= $this->Form->create($user,['class' => 'login-form-wrapper','id' => 'register-form']);?>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="RegFirstName" class="form-label">First Name *</label>
                                <?= $this->Form->input('first_name', ['label' => false, 'class' => 'form-control','type' => 'text', 'required' => 'required']);?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="RegLastName" class="form-label">Last Name *</label>
                                <?= $this->Form->input('last_name', ['label' => false, 'class' => 'form-control','type' => 'text', 'required' => 'required']);?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="regemail" class="form-label mt-15">Email address *</label>
                            <?= $this->Form->input('email', ['label' => false, 'class' => 'form-control','type' => 'email', 'required' => 'required']);?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                            <label for="regpassword" class="form-label mt-15">Password *</label>
                            <?= $this->Form->text('password', ['label' => false, 'class' => 'form-control','type' => 'password', 'required' => 'required']); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                            <label for="regconfirmpassword" class="form-label mt-15">Repeat Password *</label>
                            <?= $this->Form->text('confirm_password', ['label' => false, 'class' => 'form-control','type' => 'password','required' => 'required']); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0 form-group-info">
                            <button class="btn btn-theme btn-black btn-border" type="submit">Register</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                <?= $this->Form->end(); ?>
                </div>
            </div> -->
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!--== End Contact Area ==-->
</main>