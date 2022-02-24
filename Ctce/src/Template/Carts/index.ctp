<?php
    use Cake\I18n\Number;
    use Cake\Collection\Collection;
    $session = $this->getRequest()->getSession();
    $carts = $session->read('Carts');

    if (!empty($carts)) {
        $collection = new Collection($carts);
        $sumOfPrices =  $collection->sumOf('price');
        $discount = 0;
    }
?>
<!-- Page Title Section Start -->
<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h1 class="title">Cart</h1>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                <li class="current">Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->
<?php if (empty($carts)): ?>
    <div class="section section-padding-bottom">
        <div class="container">
            <div class="cart-empty-content">
                <span class="icon"><i class="fal fa-shopping-cart"></i></span>
                <h3 class="title">Your cart is currently empty.</h3>
                <p>You may check out all the available products and buy some in the shop.</p>
                <a href="<?= $this->Url->build('/') ?>" class="btn btn-primary btn-hover-secondary">Return to shop</a>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="cart-section section section-padding-bottom">
        <div class="container faq-wrapper">
            <div class="row">

                <div class="col-12">
                    <!-- Cart Table -->
                    <div class="cart-table table-responsive max-mb-30">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carts as $key => $cart): ?>
                                    <tr>
                                        <td class="pro-title"><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'details', $cart->id]) ?>"><?= $cart->title ?></a></td>
                                        <td class="pro-price"><span><?= $this->Number->currency($cart->price, 'USD'); ?></span></td>
                                        <td class="pro-remove"><a href="<?= $this->Url->build(['action' => 'remove', $key]) ?>"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row max-mb-n30">

                        <div class="col-lg-6 col-12 max-mb-30"> 
                            <!-- Discount Coupon -->
                            <div class="discount-coupon">
                                <h4>Discount Coupon Code</h4>
                                <form action="#">
                                    <div class="row max-mb-n30">
                                        <div class="col-md-6 col-12 max-mb-30">
                                            <input type="text" placeholder="Coupon Code">
                                        </div>
                                        <div class="col-md-6 col-12 max-mb-30">
                                            <button class="btn btn-primary btn-hover-secondary">Apply Code</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Cart Summary -->
                        <div class="col-lg-6 col-12 max-mb-30 d-flex">
                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4>Cart Summary</h4>
                                    <p>Sub Total <span><?= $this->Number->currency($sumOfPrices, 'USD'); ?></span></p>
                                    <p>Discount Coupon <span><?= $this->Number->currency($discount, 'USD'); ?></span></p>
                                    <h2>Grand Total <span><?= $this->Number->currency($sumOfPrices - $discount, 'USD'); ?></span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    <button onclick="window.location.href='<?= $this->Url->build(['action' => 'checkout'])?>'" class="btn btn-primary btn-hover-secondary">Checkout</button>
                                    <!-- <button class="btn btn-primary btn-hover-secondary">Update Cart</button> -->
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
<?php endif ?>
