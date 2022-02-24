<?php  
    echo $this->element('meta');
?>  
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $webroot ?>images/topbanner-1.jpeg" alt=""> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta">Reset</span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Password</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sign In Page -->
<div class="sign-in-section d-flex align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="form-sign-in" id="login-page">
                    <?= $this->Form->create() ?>
                            <h2 class="pwe-heading animate-box text-center">Reset Password</h2>
                            <div class="row">
                                <div class="col-md-12 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <?= $this->Form->text('password', ['type' => 'password', 'class' => 'form-control', 'required', 'placeholder' => 'Password']); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                    <div class="form-group"> 
                                        <?= $this->Form->text('password_confirm', ['type' => 'password', 'class' => 'form-control', 'required', 'placeholder' => 'Password Confirm']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-center">
                                    <button type="submit" class="btn-contact"><span>Submit</span></button>
                                </div>
                            </div>  
                        </div>  
                    <?= $this->Form->end(); ?>                     
            </div>
        </div>
    </div>
</div>
