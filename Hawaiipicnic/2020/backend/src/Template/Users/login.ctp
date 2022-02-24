<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?>  
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[30][0]->id . DS . $banners[30][0]->image) ?>" alt="<?= $banners[30][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta"><?= $banners[30][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[30][0]->description ?></h2>
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
                <?= $this->Form->create('Users');?>
                        <h2 class="pwe-heading animate-box text-center">Sign in</h2>
                        <div class="row">
                            <div class="col-md-12 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('email', ['label' => false, 'class' => 'form-control','type' => 'email','placeholder' => 'Email', 'required' => 'required']); ?>
                                </div>
                            </div>
                            <div class="col-md-12 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="form-group"> 
                                    <?= $this->Form->text('password', ['class' => 'form-control','type' => 'password','placeholder' => 'Password', 'required' => 'required']); ?>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-between mb-5">
                                <a href="javascript:;" class="mr-5" id="move-to-lost">Forgot your password?</a><p></p>
                                <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'register']) ?>">Create Account</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <button type="submit" class="btn-contact"><span>Login</span></button>
                            </div>
                        </div>  
                    </div>  
                <?= $this->Form->end(); ?>
                
                <div class="form-sign-in" id="lost-password-page">
                    <form action="<?= $this->Url->build(['controller' => 'Users','action' => 'forgotPassword']) ?>" method="post">
                        <h2 class="pwe-heading animate-box text-center">Lost Password</h2>
                        <div class="row">
                            <div class="col-md-12 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 d-flex flex-wrap justify-content-between">
                                <div class="btn-contact"><a href="javascript:;" id="back-login"><span>Back</span></a></div>
                                <button type="submit" class="btn-contact"><span>Submit</span></b>
                            </div>
                        </div> 
                    </form>     
                </div>                            
            </div>
        </div>
    </div>
</div>
