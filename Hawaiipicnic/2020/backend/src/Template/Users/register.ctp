<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
?>  
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[29][0]->id . DS . $banners[29][0]->image) ?>" alt="<?= $banners[29][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta"><?= $banners[29][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[29][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq -->
<div class="sign-in-section d-flex align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="booking-input">
                    <h2 class="pwe-heading animate-box text-center">Sign up</h2>
                    <?= $this->Form->create(null,['id' => 'formvalidation','class' => 'js-check-form']);?>
                        <div class="row">
                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('first_name', ['label' => false, 'class' => 'form-control','placeholder' => 'First Name *', 'required' => 'required']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('last_name', ['label' => false, 'class' => 'form-control','placeholder' => 'Last Name *', 'required' => 'required']); ?>
                                </div>
                            </div>
                            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                <?= $this->Form->text('email', ['label' => false, 'class' => 'form-control','placeholder' => 'Email *', 'required' => 'required']); ?>
                                </div>
                            </div>
                            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('password', ['label' => false, 'class' => 'form-control','id' => 'password','type' => 'password','placeholder' => 'Password *', 'required' => 'required']); ?>
                                </div>
                            </div>
                            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('password_confirm', ['label' => false, 'class' => 'form-control','type' => 'password','placeholder' => 'Password Confirm *', 'required' => 'required']); ?>
                                </div>
                            </div>
                            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('address', ['label' => false, 'class' => 'form-control','placeholder' => 'Address']); ?> 
                                </div>
                            </div>
                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('city', ['label' => false, 'class' => 'form-control','placeholder' => 'City']); ?> 
                                </div>
                            </div>
                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('country', ['label' => false, 'class' => 'form-control','placeholder' => 'Country']); ?> 
                                </div>
                            </div>
                            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                <div class="form-group">
                                    <?= $this->Form->text('phone_number', ['label' => false, 'class' => 'form-control','placeholder' => 'Phone *','required' => 'required']); ?> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <button type="submit" class="btn-contact"><span>Create</span></button>
                            </div>
                        </div>  
                <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>