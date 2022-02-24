<?php
echo $this->element('meta');

$session = $this->getRequest()->getSession();
$total = 0;
?>
<main class="main-content">
  <!--== Start Page Title Area ==-->
  <section class="page-title-area">
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="page-title-content">
        <h2 class="title">Complete</h2>
        <div class="bread-crumbs">
            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
            <span class="active">Complete</span>
        </div>
        </div>
    </div>
    </div>
</div>
</section>
  <!--== End Page Title Area ==-->

  <!--== Start Shop Checkout Area ==-->
  <?= $this->Form->create($order) ?>
  <section class="shop-checkout-area">
    <div class="container">
   
      <div class="row ">
      
        <div class="col-lg-8 col-md-12">
          <div class="shop-billing-form">
          
                <h4 class="title">Billing details</h4>
                <div class="row">
                  <div class="col-lg-12">
                      <?php if (!empty($order->ref_code)): ?>
                        <?php $paymentData = unserialize($order->ref_code) ?>
                          <h2 class="field__title">
                            Your Payment has been Successful!
                        </h2>
                        <div class="field">
                            <h3 class="field__title">Payment Information</h3>
                            <div class="table-wrap">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>TXN ID:</td>
                                            <td><?php echo $paymentData['txn_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Paid Amount:</td>
                                            <td><?php echo $paymentData['payment_gross'].' '.$paymentData['currency_code']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status:</td>
                                            <td><?php echo $paymentData['payment_status']; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Payment Date:</td>
                                            <td><?php echo $paymentData['created']; ?></td>
                                        </tr> -->
                                        <tr>
                                            <td>Payer Name:</td>
                                            <td><?php echo $paymentData['payer_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Payer Email:</td>
                                            <td><?php echo $paymentData['payer_email']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      <?php else: ?>
                        <h2 class="field__title">
                          Your Payment has Failed
                      </h2>
                      <?php endif ?>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cf_name">First name <abbr class="required" title="required">*</abbr></label>
                      <?= $this->Form->control('first_name', ['class' => 'form-control', 'required' => true, 'label' => false, 'readonly' => true]) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cf_last_name">Last name <abbr class="required" title="required">*</abbr></label>
                      <?= $this->Form->control('last_name', ['class' => 'form-control', 'required' => true, 'label' => false, 'readonly' => true]) ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="cf_phone">Phone <abbr class="required" title="required">*</abbr></label>
                          <?= $this->Form->control('phone_number', ['class' => 'form-control', 'required' => true, 'label' => false, 'readonly' => true]) ?>
                        </div>
      
                        
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="cf_email">Email address <abbr class="required" title="required">*</abbr></label>
                          <?= $this->Form->control('email', ['class' => 'form-control', 'required' => true, 'label' => false, 'readonly' => true]) ?>
                        </div>
                  </div>
                  <!-- <div class="col-md-12">
                      <div class="form-group">
                          <label for="cf_country_region">Country / Region <abbr class="required"
                              title="required">*</abbr></label>
                            <?php echo $this->Form->control('country_id', [
                            'type' => 'select',
                            'multiple' => false,
                            'options' => $countries,
                            'class'   => 'form-control niceselect',
                            'label' => false, 'readonly' => true,
                            'div' => false,
                            'required' => true,
                            ]); ?>
                        </div>
                  </div> -->
                  <!-- <div class="col-md-6">
                      <div class="form-group">
                          <label for="cf_street_address">Street address <abbr class="required"
                              title="required">*</abbr></label>
                          <input class="form-control" id="cf_street_address" type="text" name="address"  placeholder="House number and street name" value="<?= $order['address'] ?>" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="cf_street_address">Street address 2<abbr class="required"
                              title="required">*</abbr></label>
                              <input class="form-control" type="text" placeholder="Apartment, suite, unit, etc. (optional)" name="address2" value="<?= $order['address2'] ?>">
                      </div>
                  </div> -->
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label >Address <abbr class="required" title="required">*</abbr></label>
                          <?= $this->Form->control('address', ['class' => 'form-control', 'required' => true, 'label' => false, 'readonly' => true]) ?>
                        </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label >Post Code <abbr class="required" title="required">*</abbr></label>
                          <?= $this->Form->text('postcode', [
                            'id' => 'postcode',
                            'class' => 'form-control',
                            'required',
                            'readonly' => true
                          ]) ?>
                        </div>
                  </div>
                  <!-- <?php if (!empty($splitContents)): ?>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label >District<abbr class="required" title="required">*</abbr></label>
                            <input class="form-control" type="text" name="district" value="<?= $splitContents[5] ?>" required>
                          </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label >Ward <abbr class="required" title="required">*</abbr></label>
                            <input class="form-control" type="text" name="ward" value="<?= $splitContents[6] ?>" required>
                          </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label >County <abbr class="required" title="required">*</abbr></label>
                            <input class="form-control" type="text" name="county" value="<?= $splitContents[9] ?>" required>
                          </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label >Lower Super Output Area <abbr class="required" title="required">*</abbr></label>
                            <input class="form-control" type="text" name="postcode" required value="<?= $splitContents[7] ?>">
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label >Address <abbr class="required" title="required">*</abbr></label>
                            <input class="form-control" type="text" name="address" required>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label >Post Code <abbr class="required" title="required">*</abbr></label>
                            <input class="form-control" type="text" name="postcode" required value="<?= $splitContents[0] ?>">
                          </div>
                    </div>
                  <?php endif ?> -->
                </div>

                <div class="form-group">
                  <?= $this->Form->control('description', ['class' => 'form-control', 'readonly' => true]) ?>
                </div>
             
          </div>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4 class="title">Your order</h4>
          <div class="order-review-details">
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
            <?php foreach($carts as $cart):  $total += $cart->price * $cart->quantity;?>
                <tr>
                    <td>
                      <span class="product-title"><?= $cart->title ?></span>
                      <span class="product-quantity"> × <?= $cart->quantity ?></span><br>
                        <?php foreach($cart->attributes as $key => $attr): ?>
                            <span><sup>Size: <?= $attr['value']?></sup></span><br>
                        <?php endforeach ?>
                        <span><sup><?= 'Date: ' . date_format(date_create($cart->date),'m-d-Y') ?></sup></span>
                    </td>
                    <td><?= $this->getConfigure('Core')['setting']['currency'],$cart->price ?></td>
                </tr>
            <?php endforeach ?>
              </tbody>
              <tfoot>
               
                <!-- <tr class="shipping">
                  <th class="shipping-title">Shipping</th>
                  <td class="shipping-check">
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="validationFormCheck2" name="shipping_method" value="1"
                        required checked> 
                      <label class="form-check-label" for="validationFormCheck2">Ship</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="validationFormCheck3" name="shipping_method" value="2"
                        required>
                      <label class="form-check-label" for="validationFormCheck3">Local pickup</label>
                    </div>
                  </td>
                </tr> -->
                <tr class="final-total">
                  <th>Total</th>
                  <td><span class="total-amount"><?php echo $this->getConfigure('Core')['setting']['currency'],$total; ?> GBP</span></td>
                </tr>
              </tfoot>
            </table>
            <a class="btn btn-theme btn-primary w-100" href="<?= $this->Url->build('/') ?>" >Return Home</a>
          </div>
          
        </div>
        
      </div>
      
    </div>
  </section>
  
  <!--== End Shop Checkout Area ==-->
</main>