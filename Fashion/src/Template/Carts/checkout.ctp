<?php
echo $this->element('meta'); $session = $this->getRequest()->getSession(); $carts = $session->read('Cart'); $total = 0; ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />

<main class="main-content">

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

    <div id="checkout">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content">
                            <h2 class="title">Checkout</h2>
                            <div class="bread-crumbs">
                                <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                                <span class="active">Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Shop Checkout Area ==-->
        <?= $this->Form->create($user) ?>
        <section class="shop-checkout-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <?php if(empty($user)): ?>
                        Please login or register as our customer to continue checkout. <a id="btn-login" href="<?= $this->Url->build(['controller'=>'Users','action' =>'login', '?' => ['redirect' => $this->Url->build(['controller' => 'Carts', 'action' => 'checkout'], true)]]) ?>"><span>Click here</span></a>
                        <?php else: ?>
                          Hello <?= $user->full_name ?>
                          <div class="shop-billing-form">
                            <h4 class="title">Billing details</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="postcodedetails" style="text-align: center;"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cf_name">First name <abbr class="required" title="required">*</abbr></label>
                                        <?= $this->Form->control('first_name', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cf_last_name">Last name <abbr class="required" title="required">*</abbr></label>
                                        <?= $this->Form->control('last_name', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cf_phone">Phone</label>
                                        <?= $this->Form->control('phone_number', ['class' => 'form-control', 'label' => false]) ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cf_email">Email address <abbr class="required" title="required">*</abbr></label>
                                        <?= $this->Form->control('email', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Address <abbr class="required" title="required">*</abbr></label>
                                        <?= $this->Form->control('address', ['class' => 'form-control', 'required' => true, 'label' => false]) ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Post Code <abbr class="required" title="required">*</abbr></label>
                                        <?= $this->Form->text('postcode', [ 'id' => 'postcode', 'class' => 'form-control', 'required', 'readonly']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cf_order_notes">Order notes (optional)</label>
                                <textarea class="form-control" name="description" id="cf_order_notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                        <?php endif ?>
                        
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
                                            <span class="product-quantity">
                                                ×
                                                <?= $cart->quantity ?>
                                            </span>
                                            <br />
                                            <?php foreach($cart->attributes as $key => $attr): ?>
                                            <span>
                                                <sup>
                                                    Size:
                                                    <?= $attr['value']?>
                                                </sup>
                                            </span>
                                            <br />
                                            <?php endforeach ?>
                                        </td>
                                        <td><?= $this->getConfigure('Core')['setting']['currency'],$cart->price ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr class="shipping">
                                        <th class="shipping-title">Shipping date</th>
                                        <td class="shipping-check">
                                            <span>
                                                <sup><?= $carts[0]->date ?></sup>
                                            </span>
                                            
                                        </td>
                                    </tr>
                                    <tr class="final-total">
                                        <th>Total</th>
                                        <td>
                                            <span class="total-amount"><?php echo $this->getConfigure('Core')['setting']['currency'],$total; ?> GBP</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="shop-payment-method">
                                <div id="accordion">
                                    <!-- <div class="card">
                                        <div class="card-header" id="cash_on_delivery">
                                            <label for="payment-1">
                                                <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemThree" aria-controls="itemThree" aria-expanded="true">
                                                    <input type="radio" class="d-none" name="pay_method" value="1" id="payment-1" checked />
                                                    Cash on delivery
                                                </h5>
                                            </label>
                                        </div>
                                        <div id="itemThree" class="collapse show" aria-labelledby="cash_on_delivery" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <p>Pay with cash upon delivery.</p>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="card">
                  <div class="card-header" id="Pay_Pal">
                    <label for="payment-2">
                    <h5 class="title" data-bs-toggle="collapse" data-bs-target="#item4" aria-controls="item4"
                      aria-expanded="true">
                      <input type="radio" class="d-none" name="pay_method" value="paypal" id="payment-2" checked>
                      PayPal
                      <img src="<?= $webroot ?>assets/img/icons/paypal.png" alt=""> <a href="#/">What
                        is PayPal?</a></h5>
                    </label>
                    
                  </div>
                  <div id="item4" class="collapse" aria-labelledby="Pay_Pal" data-bs-parent="#accordion">
                    <div class="card-body">
                      <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                    </div>
                  </div>
                </div>
                                </div>
                            </div>
                        </div>
                        <p class="shop-checkout-info">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                        <div id="btn-submit">
                            <?php if ($user): ?>
                                <button class="btn btn-theme btn-primary w-100" type="submit">Submit</button>
                            <?php else: ?>
                                <a class="btn btn-theme btn-primary w-100">Submit</a>
                            <?php endif ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?= $this->Form->end() ?>
    </div>

    <div id="saveEmail">
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
</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {

    $("#saveEmail").hide();
    $("#checkout").hide();

    $("#btn-check-postcode").click(function () {
      $.post(
          "<?= $this->Url->build(['action' => 'postcode']) ?>",
          {
              postcode: $("#input-check-postcode").val(),
          },
          function (data, status) {
              d = JSON.parse(data);
              $("#check-postcode").hide();
              if (d.status == 1) {
                  $("#checkout").show();
                  $("#postcode").val($("#input-check-postcode").val());

                  // $("#btn-submit").show();
                  // $("#btn-submit").html('<button class="btn btn-theme btn-primary w-100" type="submit">Submit</button>');
              } else {
                  $("#saveEmail").show();
                  $("#postcodeEmail").val($("#input-check-postcode").val());
                  
              }
          }
      );
    });

    // $("#btn-login").click(function () {
    //     Swal.fire({
    //         title: "Do you need our services inside London?",
    //         showCancelButton: true,
    //         confirmButtonText: "Yes",
    //         cancelButtonText: `No`,
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             window.location.href = "<?= $this->Url->build(['controller'=>'Users','action' =>'login', '?' => ['redirect' => $this->Url->build(['controller' => 'Carts', 'action' => 'checkout'], true)]]) ?>";
    //         } else if (result.isDismissed) {
    //             $("#postcodedetails").html("");
    //             $("#btn-submit").hide();
    //             $.post(
    //                 "<?= $this->Url->build(['action' => 'postcode']) ?>",
    //                 {
    //                     postcode: $("#postcode").val(),
    //                 },
    //                 function (data, status) {
    //                     d = JSON.parse(data);
    //                     $("#postcodedetails").html(d.data);
    //                     if (d.status == 1) {
    //                         $("#btn-submit").show();
    //                         $("#btn-submit").html('<button class="btn btn-theme btn-primary w-100" type="submit">Submit</button>');
    //                     } else {
    //                         $("#checkout").hide();
    //                         $("#saveEmail").show();
    //                         $("#postcodeEmail").val($("#postcode").val());
    //                     }
    //                 }
    //             );
    //         }
    //     });
    // });

    if ($("#input-check-postcode").val() != "") {
        $("#postcodedetails").html("");
        $("#btn-submit").hide();
        $("#check-postcode").hide();
        $.post(
            "<?= $this->Url->build(['action' => 'postcode']) ?>",
            {
                postcode: $("#postcode").val(),
            },
            function (data, status) {
                d = JSON.parse(data);
                $("#postcodedetails").html(d.data);

                $("#btn-email").click(function () {
                    $("#checkout").hide();
                    $("#saveEmail").show();
                    $("#postcodeEmail").val($("#postcode").val());
                });
                if (d.status == 1) {
                    $("#btn-submit").show();
                    $("#checkout").show();
                    $("#btn-submit").html('<button class="btn btn-theme btn-primary w-100" type="submit">Submit</button>');
                } else {
                    //$('#checkout').hide();
                    //$('#saveEmail').show();
                    //$('#postcodeEmail').val($('#postcode').val());
                }
            }
        );
    }

    // $("#postcode").change(function () {
    //     $("#postcodedetails").html("");
    //     $("#btn-submit").hide();
    //     $.post(
    //         "<?= $this->Url->build(['action' => 'postcode']) ?>",
    //         {
    //             postcode: $("#postcode").val(),
    //         },
    //         function (data, status) {
    //             d = JSON.parse(data);
    //             $("#postcodedetails").html(d.data);
    //             if (d.status == 1) {
    //                 $("#btn-submit").show();
    //                 $("#btn-submit").html('<button class="btn btn-theme btn-primary w-100" type="submit">Submit</button>');
    //             } else {
    //                 $("#checkout").hide();
    //                 $("#saveEmail").show();
    //                 $("#postcodeEmail").val($("#postcode").val());
    //             }
    //         }
    //     );
    // });
});

</script>