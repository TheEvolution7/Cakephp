<?php 
    $session = $this->getRequest()->getSession();
    $user = $session->read('Auth.User');
    echo $this->element('meta');
    $total = 0;
?>
<main class="main-content site-wrapper-reveal">
<!--== Start Page Title Area ==-->
<section class="page-title-area">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="page-title-content">
            <h2 class="title">Cart</h2>
            <div class="bread-crumbs"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a><span class="active">Cart</span></div>
        </div>
        </div>
    </div>
    </div>
</section>

<!--== Start Cart Area Wrapper ==-->
<section class="product-area cart-page-area">
    <div class="container">
    <div class="row">
        <div class="col-lg-8">
        <?php if(empty($user)): ?>
            Please login or register as our customer to continue checkout.<a href="<?= $this->Url->build(['controller'=>'Users','action' =>'login']) ?>"><span>Click here to login</span></a>
        <?php endif ?>
        <div class="cart-table-wrap">
            <div class="cart-table table-responsive">
            <?php echo $this->Form->create('Cart',['id' => 'update']); 
                    echo $this->Form->text('updatebt', array('type' => 'hidden', 'name' => 'updatebt','value' => 1));
            ?>  
              <?php if(count($carts) > 0): ?>
                <table>
                    <thead>
                    <tr>
                        <th class="pro-remove"> </th>
                        <th class="pro-thumbnail"> </th>
                        <th class="pro-name">Product</th>
                        
                        <th class="pro-quantity">Quantity</th>
                        <th class="pro-price">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($carts as $key => $cart) : $total += $cart->price * $cart->quantity;?>
                        
                        <tr>
                            <td class="pro-remove">
                                <a href="<?= $this->Url->build(['controller'=>'Carts','action' => 'delete',$key]);?>"><i class="lastudioicon-e-remove"></i></a>
                                
                            </td>
                            <td class="pro-thumbnail">
                            <div class="pro-info">
                                <div class="pro-img">
                                <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$cart->slug,$cart->id]) ?>"><img src="<?= $this->Url->build('/uploads/products/'.$cart->id.'/'.$cart->image) ?>" alt="<?= $cart->title ?>"></a>
                                </div>
                            </div>
                            </td>
                            <td class="pro-name">
                                <span>
                                    <?= $cart->title ?>
                                    <?= $cart->price == 0?' - <b>Wishlist</b>':null ?>
                                </span><br>
                                <?php foreach($cart->attributes as $key => $attr): ?>
                                    <span>Size: <?= $attr['value'] ?></span><br>
                                <?php endforeach ?>
                                <span><?= 'Date: ' . date_format(date_create($cart->date),'m-d-Y')?> </span>
                            </td>
                            <td class="pro-quantity">
                            <div class="action-top">
                                
                                <span>x<?= $cart->quantity ?></span>
                                
                            </div>
                            <td class="pro-price"><span><?= $this->getConfigure('Core')['setting']['currency'],$cart->price ?></span></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="text-align: center;"><?= __('Empty Cart') ?></p>    
            <?php endif ?>
            </div>
        </div>
      
        </div>
        <div class="col-lg-4">
        <div class="cart-payment">
            <div class="cart-subtotal">
            <h2 class="title">Cart totals</h2>
            <table>
                <tbody>
                <tr class="amount-total">
                    <th>Total</th>
                    <td><span class="amount"><?= $this->getConfigure('Core')['setting']['currency'],$total ?> GBP</span></td>
                </tr>
                </tbody>
            </table>
            </div>
            <a class="btn-theme" href="<?= $this->Url->build(['action' => 'checkout']);?>">Proceed to Checkout</a>
        </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
    </div>
</section>
<!--== End Cart Area Wrapper ==-->

<!--== Start Category Area Wrapper ==-->
<section class="category-area product-category5-area">
    <div class="container">
    <div class="row">
        <div class="col-md-8">
        <div class="section-title">
            <h2 class="title">You may be interested in…</h2>
        </div>
        </div>
    </div>
    <div class="row">
    <?php foreach($product_featured as $product): ?>
        <div class="col-md-6 col-lg-3">
            <!-- Start Product Item -->
            <div class="product-item hover-effect effect-style1">
            <div class="product-thumb">
                <a href="<?= $this->Url->build(['controller'=>'Products','action'=> 'details',$product->slug,$product->id])?>">
                <img src="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $product->image) ?>" alt="<?= $product->title ?>">
                <span class="thumb-overlay"></span>
                <div class="effect-content"></div>
                </a>
            </div>
            <div class="product-info _2">
                <div class="content-inner">
                <h4 class="title"><a href="<?= $this->Url->build(['controller'=>'Products','action'=> 'details',$product->slug,$product->id])?>"><?= $product->title ?></a></h4>
                <div class="prices">
                    <span class="price"><?= $this->getConfigure('Core')['setting']['currency'],$product->price ?></span>
                </div>
                </div>
            </div>
            </div>
            <!-- End Product Item -->
        </div>
    <?php endforeach ?>
    </div>
    </div>
</section>
<!--== End Category Area Wrapper ==-->
</main>
