<?php 
$banners = $this->getCache('banners_' . $configs['language']); 
echo $this->element('meta'); 
?>
<div class="animsition">
        <div class="wrapper boxed">

            <?= $this->element('header') ?>

            <main class="page-header-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="title-hr"></div>
                        </div>
                        <div class="col-md-8 col-lg-6">
                            <h1><?= $banners[51][0]->title ?></h1>
                        </div>
                    </div>
                </div>
            </main>
            <div class="content">
                <div class="content-entry-image-contact"></div>
                <div class="page-inner">
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="section-info">
                                        <div class="title-hr"></div>
                                        <div class="info-title">Keep in touch</div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row-contact row">
                                        <div class="col-contact col-lg-6">
                                            <h3 class="contact-title contact-top">Honolulu, <span>USA</span></h3>
                                            <p class="contact-address text-muted"><strong>2211 Ala Wai Blvd, 96815</strong></p>
                                            <p class="contact-row"><strong class="text-dark">Email:</strong> <a href="#" class="__cf_email__" data-cfemail="">info@fengari.com</a></p>
                                            <p class="contact-row"><strong class="text-dark">Skype:</strong> Fengari</p>
                                        </div>
                                        <div class="col-contact col-lg-6">
                                            <p class="contact-top"><strong class="text-muted">Call directly:</strong></p>
                                            <p class="phone-lg text-dark">(+080) 9684 32 45 789</p>
                                            <p class="text-muted"><strong class="text-dark">Work Hours</strong><br> Monday - Friday : 08h00 - 17h30<br> Saturday: 08h00 - 12h00, Sunday off work</p>
                                            <div class="text-muted"><strong class="text-dark">Follow us</strong><br>
                                                <div class="contact-social social-list">
                                                    <a href="" class="icon ion-social-twitter"></a>
                                                    <a href="" class="icon ion-social-facebook"></a>
                                                    <a href="" class="icon ion-social-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section-message section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="section-info">
                                        <div class="title-hr"></div>
                                        <div class="info-title">You need help</div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="js-form form-contact">
                                        <?= $this->Form->create($contact) ?>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="row radio-box">
                                                    <div class="form-group col-xs-4">
                                                        <div class="inp-group">
                                                            
                                                            <input class="input-gray" type="radio" name="check-radio" id="check-radio-id-1" value="Exterior">
                                                            <label for="check-radio-id-1">Exterior</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-4">
                                                        <div class="inp-group">
                                                            
                                                            <input class="input-gray" type="radio" name="check-radio" id="check-radio-id-2" value="Interior">
                                                            <label for="check-radio-id-2">Interior</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-4">
                                                        <div class="inp-group">
                                                            
                                                            <input class="input-gray" type="radio" name="check-radio" id="check-radio-id-3" value="Both">
                                                            <label for="check-radio-id-3">Both</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row radio-box">
                                                    <div class="form-group col-xs-4">
                                                        <div class="inp-group">
                                                            
                                                            <input class="input-gray" type="radio" name="check-radio-2" id="check-radio-id-4" value="Image">
                                                            <label for="check-radio-id-4">Image</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-4">
                                                        <div class="inp-group">
                                                            
                                                            <input class="input-gray" type="radio" name="check-radio-2" id="check-radio-id-5" value="Animation">
                                                            <label for="check-radio-id-5">Animation</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-4">
                                                        <div class="inp-group">
                                                            
                                                            <input class="input-gray" type="radio" name="check-radio-2" id="check-radio-id-6" value="Both">
                                                            <label for="check-radio-id-6">Both</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6 col-lg-6">
                                                <input class="input-gray" type="number" name="anim" required="" placeholder="Animation Duration (second)" aria-required="true">
                                            </div>
                                            <div class="form-group col-sm-6 col-lg-6">
                                                <input class="input-gray valid" type="number" name="cam" required="" placeholder="Number of Camerars" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-sm-6 col-lg-6">
                                                        <label for="">Custom Environment</label>
                                                        <div class="row radio-box">
                                                            <div class="form-group col-xs-4">
                                                                <div class="inp-group">
                                                                    
                                                                    <input class="input-gray" type="radio" name="ck-ra" id="ck-ra-id-1" value="yes">
                                                                    <label for="ck-ra-id-1">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-xs-4">
                                                                <div class="inp-group">
                                                                    
                                                                    <input class="input-gray" type="radio" name="ck-ra" id="ck-ra-id-2" value="no">
                                                                    <label for="ck-ra-id-2">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    <div class="form-group col-sm-6 col-lg-6">
                                                        <label for="">Estimated Due Date</label>
                                                        <input class="input-gray" type="date" name="due" required="" placeholder="" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group col-sm-6 col-lg-4">
                                                <?= $this->Form->text('name', ['class' => 'input-gray', 'required', 'placeholder' => 'Name*']) ?>
                                            </div>
                                            <div class="form-group col-sm-6 col-lg-4">
                                                <?= $this->Form->text('email', ['type' => 'email', 'class' => 'input-gray', 'required', 'placeholder' => 'Email*']) ?>
                                            </div>
                                            <div class="form-group col-sm-12 col-lg-4">
                                                <?= $this->Form->text('title', ['class' => 'input-gray', 'required', 'placeholder' => 'Subject (Optinal)']) ?>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <?= $this->Form->textarea('content', ['class' => 'input-gray', 'required', 'placeholder' => 'Message*']) ?>
                                            </div>
                                            <div class="col-sm-12"><button type="submit" class="btn-upper btn-yellow btn">Send Message</button></div>
                                        </div>
                                        <div class="success-message"><i class="fa fa-check text-primary"></i> Thank
                                            you!. Your message is successfully sent...</div>
                                        <div class="error-message">We're sorry, but something went wrong</div>
                                        <?= $this->Form->end() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <?= $this->element('footer') ?>
        </div>
    </div>