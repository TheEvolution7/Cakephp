<?php 
    $session = $this->getRequest()->getSession();
    echo $this->element('meta');
?>
<main class="main-content">
    <div id="checkout" style="display: none;">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content">
                <h2 class="title">Register</h2>
                <div class="bread-crumbs">
                    <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                    <span class="active">Register</span>
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
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="lastudioicon-user-1"></i>Register</button>
            </div>
            </nav>
        </div>
        <div class="login-bottom">
            <div class="login-form-content tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="login-form">
                <?= $this->Form->create($user,['class' => 'login-form-wrapper','id' => 'register-form']);?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="RegFirstName" class="form-label">First Name *</label>
                                        <?= $this->Form->control('first_name', ['label' => false, 'class' => 'form-control','type' => 'text', 'required' => 'required']);?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="RegLastName" class="form-label">Last Name *</label>
                                        <?= $this->Form->control('last_name', ['label' => false, 'class' => 'form-control','type' => 'text', 'required' => 'required']);?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="regemail" class="form-label mt-15">Email address *</label>
                                    <?= $this->Form->control('email', ['label' => false, 'class' => 'form-control','type' => 'email', 'required' => 'required']);?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                    <label for="regpassword" class="form-label mt-15">Password *</label>
                                    <?= $this->Form->control('password', ['label' => false, 'class' => 'form-control','type' => 'password', 'required' => 'required']); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                    <label for="regconfirmpassword" class="form-label mt-15">Repeat Password *</label>
                                    <?= $this->Form->control('password_confirm', ['label' => false, 'class' => 'form-control','type' => 'password','required' => 'required']); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                    <label for="regconfirmpassword" class="form-label mt-15">Postcode *</label>
                                    <?= $this->Form->control('postcode', ['id' => 'postcode', 'label' => false, 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Example: EC1A 1AA']); ?>
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
                <!-- Message Notification -->
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<div id="check-postcode">
    <section class="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h2 class="title">Check Postcode</h2>
                        <div class="bread-crumbs">
                            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                            <span class="active">Check Postcode</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="shop-billing-form">
                        <h4 class="title" style="text-align: center;">Enter Your Postcode</h4>
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <?= $this->Form->create($user) ?>
                                <div class="form-group">
                                    <?= $this->Form->control('postcode', ['class' => 'form-control', 'required' => true, 'label' => false, 'id' => 'input-check-postcode', 'value' => isset($user->postcode) ? $user->postcode : null, 'placeholder' => 'Example: EC1A 1AA']) ?>
                                </div>
                                <br />
                                <a class="btn btn-theme btn-primary w-100" href="javascript:;" id="btn-check-postcode">Submit</a>
                                <?= $this->Form->end() ?>
                                <div id="res"></div>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="saveEmail" style="display: none;">
    <section class="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h2 class="title">Subscribe</h2>
                        <div class="bread-crumbs">
                            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                            <span class="active">Subscribe</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="shop-billing-form">
                        <h4 class="title" style="text-align: center;">Email Subscribe</h4>
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <?= $this->Form->create($user) ?>
                                <div class="form-group">
                                    <p style="color: red;">Sorry we haven't provided services in your area yet, please subscribe to our email list and we will inform you when it's available.</p>
                                    <?= $this->Form->control('email', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                                    <?= $this->Form->control('postcode', ['type' => 'hidden', 'id' => 'postcodeEmail']) ?>
                                </div>
                                <br />
                                <button class="btn btn-theme btn-primary w-100" type="submit">Submit</button>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--== End Contact Area ==-->
</main>

<script>
    $(document).ready(function () {
        $("#btn-check-postcode").click(function () {
          $.post(
              "<?= $this->Url->build(['controller' => 'Carts', 'action' => 'postcode']) ?>",
              {
                  postcode: $("#input-check-postcode").val(),
              },
              function (data, status) {
                  d = JSON.parse(data);
                  
                  if (d.status == 1) {
                      $("#check-postcode").hide();
                      $("#checkout").show();
                      $("#postcode").val($("#input-check-postcode").val());
                  } else {
                      $("#res").html("Sorry we haven't provided services in your area yet");
                      
                      $("#postcodeEmail").val($("#input-check-postcode").val());
                      
                  }
              }
          );
        });
    });
</script>