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
                <h2 class="title">My Account</h2>
                <div class="bread-crumbs">
                  <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                  <span class="active">My Account</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Page Title Area ==-->

      <!--== Start Account Area ==-->
      <div class="account-area">
        <div class="container">
          <div class="row">
            <!-- My Account Tab Menu Start -->
            <div class="col-lg-3 col-12">
              <div class="myaccount-tab-menu nav">
                <a class="active" href="#"><i class="fa fa-tachometer"></i>Account Details</a>

                <!-- <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'wishList']) ?>"><i class="fa fa-heart"></i> What I want</a> -->

                <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'orders']) ?>"><i class="fa fa-undo"></i> What I rent</a>

                <a href="<?= $this->Url->build(['controller'=>'Users','action' =>'logout']) ?>"><i class="fa fa-sign-out"></i> Logout</a>
              </div>
            </div>
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12">
              <div class="myaccount-content">
                <h3>Account Details</h3>

                <div class="account-details-form">
                  <?= $this->Form->create($user) ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="cf_name">First name *</label>
                          <?= $this->Form->control('first_name', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="cf_last_name">Last name <abbr class="required" title="required">*</abbr></label>
                          <?= $this->Form->control('last_name', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="cf_phone">Phone *</label>
                          <?= $this->Form->control('phone_number', ['class' => 'form-control', 'label' => false]) ?>
                        </div>
    
                        
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="cf_email">Email address *</label>
                          <?= $this->Form->control('email', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="cf_zip">Post code *</label>
                          <?= $this->Form->control('postcode', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="cf_street_address">Street address <abbr class="required" title="required">*</abbr></label>
                              <?= $this->Form->control('address', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group mt-30">
                          <button type="submit" class="btn btn-theme btn-primary btn-padding">Save</button>
                        </div>
                      </div>
                    </div>
                  <?= $this->Form->end() ?>
                </div>
              </div>
            </div>
            <!-- My Account Tab Content End -->
          </div>
        </div>
      </div>
      <!--== End Account Area ==-->
    </main>