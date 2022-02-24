<?php
    use Cake\I18n\Number;
    use Cake\Collection\Collection;
    $session = $this->getRequest()->getSession();
    $carts = $session->read('Carts');

    $collection = new Collection($carts);
    $sumOfPrices =  $collection->sumOf('price');
    $discount = 0;
?>

<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h1 class="title">Course Checkout</h1>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                <li class="current">Course Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->

<!--Checkout section start-->
<div class="checkout-section section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Form Start-->
                <?= $this->Form->create(null, ['class' => 'checkout-form']) ?>
                    <div class="row row-40">
                        <div class="col-lg-7">
                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-10">
                                <h4 class="checkout-title">Billing Address</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Full Name*</label>
                                        <?= $this->Form->text('full_name', ['required']) ?>
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Email Address*</label>
                                        <?= $this->Form->text('email', ['type' => 'email', 'required']) ?>
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Phone no*</label>
                                        <?= $this->Form->text('phone', ['required']) ?>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Company Name</label>
                                        <?= $this->Form->text('company', ['required']) ?>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Address*</label>
                                        <?= $this->Form->text('address', ['required']) ?>
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Country*</label>
                                        <?= $this->Form->text('country', ['required']) ?>
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Town/City*</label>
                                        <?= $this->Form->text('city', ['required']) ?>
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>State*</label>
                                        <?= $this->Form->text('state', ['required']) ?>
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Zip Code*</label>
                                        <?= $this->Form->text('zip_code', ['required']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="row">
                                <!-- Cart Total -->
                                <div class="col-12 max-mb-60">
                                    <h4 class="checkout-title">Cart Total</h4>

                                    <div class="checkout-cart-total">
                                        <h4>Product <span>Total</span></h4>

                                        <ul>
                                            <?php foreach ($carts as $key => $cart): ?>
                                                <li><?= $cart->title ?><span><?= $this->Number->currency($cart->price, 'USD'); ?></span></li>
                                            <?php endforeach ?>
                                        </ul>

                                        <p>Sub Total <span><?= $this->Number->currency($sumOfPrices, 'USD'); ?></span></p>
                                        <p>Shipping Fee <span><?= $this->Number->currency($discount, 'USD'); ?></span></p>

                                        <h4>Grand Total <span><?= $this->Number->currency($sumOfPrices - $discount, 'USD'); ?></span></h4>
                                    </div>
                                </div>

                                <!-- Payment Method -->
                                <div class="col-12">
                                    <h4 class="checkout-title">Payment Method</h4>

                                    <div class="checkout-payment-method">
                                        <!-- <div class="single-method">
                                            <input type="radio" id="payment_check" name="payment-method" value="check" />
                                            <label for="payment_check">Check Payment</label>
                                            <p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>

                                        <div class="single-method">
                                            <input type="radio" id="payment_bank" name="payment-method" value="bank" />
                                            <label for="payment_bank">Direct Bank Transfer</label>
                                            <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>

                                        <div class="single-method">
                                            <input type="radio" id="payment_cash" name="payment-method" value="cash" />
                                            <label for="payment_cash">Cash on Delivery</label>
                                            <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>

                                        <div class="single-method">
                                            <input type="radio" id="payment_paypal" name="payment-method" value="paypal" />
                                            <label for="payment_paypal">Paypal</label>
                                            <p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>

                                        <div class="single-method">
                                            <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer" />
                                            <label for="payment_payoneer">Payoneer</label>
                                            <p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div> -->

                                        <div class="single-method">
                                            <input type="checkbox" id="accept_terms" required />
                                            <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-hover-secondary btn-width-100 mt-40">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
