<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    $session = $this->getRequest()->getSession();
    $carts = $session->read('Cart');
    $user = $session->read('Auth.User');
?>    
<!--== Start Header Wrapper ==-->
<header class="header-area  <?= $this->request->getParam('action') != 'home' ? 'subpage-header' : '' ?> header-default header-style2 header-transparent sticky-header">
    <div class="container-fluid">
    <div class="row row-gutter-0 align-items-center justify-content-between">
        <div class="col-md-7 col-xl-5 col-xxl-5 d-none d-xl-flex justify-content-end">
        <div class="header-align">
            <div class="header-navigation-area d-none d-xl-block">
            <ul class="main-menu nav justify-content-center position-relative">
                <li class="d-block d-xl-none"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'work']) ?>">How it works</a></li>
                <li class="d-block d-xl-none"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'faq']) ?>">FAQs</a></li>
            <?php foreach($categories as $cat): ?>
                <li><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'category',$cat->slug,$cat->id]) ?>"><?= $cat->title ?></a></li>
            <?php endforeach ?>
            </ul>
            </div>
        </div>
        </div>
        <div class="col-4 col-xs-3 col-sm-3 col-md-3 col-xl-2 col-xxl-2 d-flex justify-content-center">
        <div class="header-logo-area">
            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
            <?php if($this->request->getParam('action') == 'home'): ?>
                <img class="logo-main" src="<?= $this->Url->build('/uploads/banners/'.$banners[2][1]->id . DS . $banners[2][1]->image) ?>" alt="<?= $banners[2][1]->title ?>" />
                <img class="logo-light" src="<?= $this->Url->build('/uploads/banners/'.$banners[2][0]->id . DS . $banners[2][0]->image) ?>" alt="<?= $banners[2][0]->title ?>" />
            <?php else: ?>
                <img class="logo-main" src="<?= $this->Url->build('/uploads/banners/'.$banners[2][0]->id . DS . $banners[2][0]->image) ?>" alt="<?= $banners[2][0]->title ?>" />
                <img class="logo-light" src="<?= $this->Url->build('/uploads/banners/'.$banners[2][0]->id . DS . $banners[2][0]->image) ?>" alt="<?= $banners[2][0]->title ?>" />
            <?php endif ?>
            </a>
        </div>
        </div>
        <div class="col-8 col-xs-9 col-sm-9 col-md-9 col-xl-5 col-xxl-5 d-flex justify-content-between">
        <div class="header-align">
            <div class="header-navigation-area d-none d-xl-block">
            <ul class="main-menu nav justify-content-center position-relative">
            <?php if(!empty($user)): ?>
                <li><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'wishList']) ?>">What I want</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'accountReturn']) ?>">What I wear</a></li>
            <?php else: ?>
                <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'work']) ?>">How it works</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'faq']) ?>">FAQS</a></li>
            <?php endif ?> 
            </ul>
            </div>
        </div>
        <div class="header-action-area">
            <div class="header-action-search">
            <button class="btn-search btn-search-menu">
                <i class="lastudioicon-zoom-1"></i>
            </button>
            </div>
            <div class="header-action-login">
            <?php if(!empty($user)): ?>
                <button class="btn-login" onclick="window.location.href='<?= $this->Url->build(['controller'=>'Users','action' =>'account',$user['id']]) ?>'">
                    <i class="lastudioicon-single-01-2"></i>
                </button> 
            <?php else: ?>
                <button class="btn-login" onclick="window.location.href='<?= $this->Url->build(['controller'=>'Users','action' =>'login']) ?>'">
                    <i class="lastudioicon-single-01-2"></i>
                </button> 
            <?php endif ?> 
            </div>
            <div class="header-action-cart">
                <button class="btn-cart cart-icon">
                  <span class="cart-count"><?= count($carts) ?></span>
                  <i class="lastudioicon-shopping-cart-2"></i>
                </button>
              </div>
            <button class="btn-menu d-xl-none">
            <i class="lastudioicon-menu-3-1"></i>
            </button>
        </div>
        </div>
    </div>
    </div>
</header>
<aside class="sidebar-cart-modal">
    <div class="sidebar-cart-inner">
        <div class="sidebar-cart-content">
            <a class="cart-close" href="javascript:void(0);"><i class="lastudioicon-e-remove"></i></a>
            <div class="sidebar-cart">
            <h4 class="sidebar-cart-title">Shopping Cart</h4>
                    <?php if(count($carts) > 0): ?>     
                    <div class="product-cart">
                        <?php foreach ($carts as $key => $cart) :$total = 0; $total = $cart->price * $cart->quantity;?>
                            <div class="product-cart-item">
                                <div class="product-img">
                                    <a href="<?= $this->Url->build(['controller'=>'Products','action'=> 'details',$cart->slug,$cart->id])?>"><img src="<?= $this->Url->build('/uploads/products/'.$cart->id.'/'.$cart->image) ?>" alt="<?= $cart->title ?>"></a>
                                </div>
                                <div class="product-info">
                                    <h4 class="title"><a href="<?= $this->Url->build(['controller'=>'Products','action'=> 'details',$cart->slug,$cart->id])?>"><?= $cart->title ?></a></h4>
                                    <span class="info"><?= $cart->quantity ?> × <?= $this->getConfigure('Core')['setting']['currency'],$cart->price ?></span>
                                </div>
                                <div class="product-delete"><a href="<?= $this->Url->build(['controller'=>'Carts','action' => 'delete',$key]);?>">×</a></div>
                            </div>
                        <?php endforeach?>    
                                <div class="cart-total">
                                    <h4>Subtotal: <span class="money"><?= $this->getConfigure('Core')['setting']['currency'],$total ?></span></h4>
                                </div>
                                <div class="cart-checkout-btn">
                                    <a class="btn-theme" href="<?= $this->Url->build(['controller'=>'Carts','action' =>'index']) ?>">View cart</a>
                                    <a class="btn-theme" href="<?= $this->Url->build(['controller'=>'Carts','action' => 'shippingAddress']);?>">Checkout</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="product-cart-item">
                            
                                <p><?= __('Empty Cart') ?></p>   
                                <div class="cart-checkout-btn">
                                    <a class="btn-theme" href="<?= $this->Url->build(['controller'=>'Products','action' =>'category','women-s-2']) ?>">Continue Rent</a>  
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
    </div>
    </aside>
<!--== End Header Wrapper ==-->