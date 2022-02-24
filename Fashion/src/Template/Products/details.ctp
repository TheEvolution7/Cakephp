<?php 
use Cake\Core\Configure;
    echo  $this->element('meta');   
    $session = $this->getRequest()->getSession();
    $user = $session->read('Auth.User');
?>
<main class="main-content site-wrapper-reveal">
<!--== Start Page Title Area ==-->

<section class="page-title-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-title-content">
          <h2 class="title">Products</h2>
            <div class="bread-crumbs">
              <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
              <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'category',$product->product_categories[0]->slug,$product->product_categories[0]->id]) ?>"><?= $product->product_categories[0]->title ?><span class="breadcrumb-sep"></span>></a>
              <span class="active"><?= $product->title ?></span>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
      <!--== End Page Title Area ==-->

      <!--== Start Shop Area ==-->
      <?php  
          echo $this->Form->create('Cart', ['url' => '/carts/add_to_cart/'.$product->id]);
          echo $this->Form->text('product_id', ['type' => 'hidden', 'value' => $product->id]);
      ?> 
      <section class="product-area shop-single-product">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="single-product-slider">
                <div class="product-dec-slider-right">
                  <div class="single-product-thumb">
                    <div class="single-product-thumb-slider">
                      <?php $images = explode('|', $product->images); unset($images[count($images) - 1]) ?>
                          <?php foreach ($images as $image): ?>
                            <div class="zoom zoom-hover">
                              <div class="thumb-item">
                                <a class="lightbox-image" data-fancybox="gallery" href="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $image) ?>">
                                  <img src="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $image) ?>" alt="<?= $product->title ?>">
                                </a>
                              </div>
                            </div>
                      <?php endforeach ?>
                    </div>
                    <div class="product-gallery-actions">
                      <a class="lightbox-image" data-fancybox="gallery" href="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $product->image) ?>">
                        <i class="lastudioicon-full-screen"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="product-dec-slider-left">
                  <div class="single-product-nav">
                    <div class="single-product-nav-slider">
                    <?php $images = explode('|', $product->images); unset($images[count($images) - 1]) ?>
                      <?php foreach ($images as $image): ?>
                        <div class="nav-item">
                          <div class="thumb-nav-img">
                            <img src="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $image) ?>" alt="<?= $product->title ?>">
                          </div>
                        </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="single-product-info">
                <h4 class="title"><?= $product->title ?></h4>
                <div class="product-rating">
                  <div class="ratting-icons">
                    <i class="lastudioicon-star-rate-1"></i>
                    <i class="lastudioicon-star-rate-1"></i>
                    <i class="lastudioicon-star-rate-1"></i>
                    <i class="lastudioicon-star-rate-1"></i>
                    <i class="lastudioicon-star-rate-1"></i>
                  </div>
                  <div class="review">
                    <a href="#/">(1 customer review)</a>
                    <p><span></span><?= $sumOfAmount ?> in stock</p>
                  </div>
                </div>
                <div class="prices">
                  <span class="price"><?= $this->getConfigure('Core')['setting']['currency'],$product->price ?>/1 week</span>
                </div>
                <p class="product-desc"><?= $product->description ?></p>
                <div class="product-action-size">
                  <span class="title">Size </span>
                  <ul>
                  <?php foreach($product->attribute_values as $k => $attr): ?>
                    <?php 
                    // if (isset($attr->attribute_values_amount->amount) 
                    // && $attr->attribute_values_amount->amount > 0 && 
                    // ((!empty($ordersByAttrbute) 
                    // && isset($ordersByAttrbute[$attr->attribute_values_amount->attribute_value_id])
                    // && $ordersByAttrbute[$attr->attribute_values_amount->attribute_value_id] < $attr->attribute_values_amount->amount) || !isset($ordersByAttrbute[$attr->attribute_values_amount->attribute_value_id]))
                    // ) 
                    ?>
                    <?php if (isset($attr->attribute_values_amount->amount) && $attr->attribute_values_amount->amount > 0): ?>
                      <li>
                        <input type="radio" name="attributes[size][value]" value="<?= $attr->title ?>" id="size-<?= $k ?>" <?= $k == 0 ? 'checked' :  null ?>>
                        <label for="size-<?= $k ?>" class="ht-tooltip" data-tippy-content="<?= $attr->title ?>"><?= $attr->title ?></label>
                        
                      </li>
                    <?php else: ?>
                      <?php if (isset($_SESSION['Auth']['User'])): ?>
                        <li>
                          <input type="radio" name="attributes[size][value]" value="<?= $attr->id ?>" id="size-<?= $k ?>" <?= $k == 0 ? 'checked' :  null ?>>
                          <label for="size-<?= $k ?>" class="ht-tooltip" data-tippy-content="<?= __('This variant empty, it add to wishlist') ?>"><?= $attr->title ?></label>
                          
                        </li>
                      <?php else: ?>
                        <li>
                          <input type="radio" name="attributes[size][value]" value="<?= $attr->id ?>" id="size-<?= $k ?>" disabled>
                          <label for="size-<?= $k ?>" class="ht-tooltip" data-tippy-content="Out of stock" style="background-color: gray;"><?= $attr->title ?></label>
                          
                        </li>
                      <?php endif ?>
                    <?php endif ?>
                    
                  <?php endforeach ?>
                  </ul>
                </div>
                <?php if ($sumOfAmount > 0): ?>
                  <div class="product-action-date">
                    <span class="title">Date for Rent </span>
                    <?= $this->Form->text('date',['type' => 'date','class' => 'form-control','required', 'min' => date('Y-m-d')]); ?>
                  </div>
                  <div class="quick-product-action">
                    <div class="action-top">
                      <!-- <div class="pro-qty-area">
                        <div class="pro-qty">
                          <input type="text" id="quantity1" title="Quantity" value="1" />
                        </div>
                      </div> -->
                      <button class="btn-theme btn-primary btn-border" type="submit">Rent it</button>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="quick-product-action">
                    <div class="action-top">
                      <!-- <div class="pro-qty-area">
                        <div class="pro-qty">
                          <input type="text" id="quantity1" title="Quantity" value="1" />
                        </div>
                      </div> -->
                      <a class="btn-theme btn-primary btn-border">Out of stock</a>
                    </div>
                  </div>
                <?php endif ?>
                
                
                <?= $this->Form->end(); ?>
                  <?php if(!empty($user) &&  empty($listWishlist) || ((!empty($listWishlist) && !array_search($product->id, $listWishlist)))): ?>
                    <?= $this->Form->postLink(__('Add to wishlist'),['controller' => 'Products','action' => 'wishList'], ['data' => ['id' => $product->id],'style' =>'color: #663398;'])?>
                  <?php endif ?>     
                  <?php if (!empty($user) && !empty($listWishlist) && array_search($product->id, $listWishlist)): ?>
                      <?= $this->Form->postLink(__('Remove wishlist'),['controller' => 'Products','action' => 'removeWishList',array_search($product->id, $listWishlist)])?>
                  <?php endif ?>    
                <div class="product-ratting">
                  <div class="product-sku">
                    <strong>SKU:</strong> <span><?= $product->sku ?></span>
                  </div>
                </div>
                <div class="product-categorys">
                  <div class="product-category">
                    <strong>Category:</strong> <span><?= $product->product_categories[0]->title ?></span>
                  </div>
                </div>

                <!-- <table class="table">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Sku</th>
                      <th>Content</th>
                      <th>Variant</th>
                      <th>Rental Price</th>
                      <th>Buy Price</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($items as $item): ?>
                      <tr>
                        <td style="width: 50px;"><?= $this->Html->image('/uploads/items/' . $item->id . DS . $item->image) ?></td>
                        <td><?= $item->sku ?></td>
                        <td><?= $item->content ?></td>
                        <td>
                          <?php foreach ($item->attribute_values as $value): ?>
                            <?= $value->attribute->title . ': ' . $value->title ?>
                          <?php endforeach ?>
                        </td>
                        <td>
                          <?php if ($item->discount): ?>
                            <del><?= $this->getConfigure('Core')['setting']['currency'],$item->discount ?></del>
                          <?php endif ?>
                          <?= $this->getConfigure('Core')['setting']['currency'],$item->price ?>/1 week
                        </td>
                        <td>
                          <?php if ($item->discount): ?>
                            <del><?= $this->getConfigure('Core')['setting']['currency'],$item->discount ?></del>
                          <?php endif ?>
                          <?= $this->getConfigure('Core')['setting']['currency'],$item->price ?>
                        </td>
                        <td>
                          <div class="btn-group">
                            <?= $this->Form->postButton(
                              'Rental',
                              ['action' => 'rental', $item->id],
                              ['class' => 'btn-theme btn-primary btn-border']);
                          ?>
                          <?= $this->Form->postButton(
                              'Buy',
                              ['action' => 'buy', $item->id],
                              ['class' => 'btn-theme btn-primary btn-border']);
                          ?>
                          </div>
                          
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table> -->
                
                
                <div class="product-social-info">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $this->Url->build('/product/' . $product->slug,$product->id, true); ?>"><span class="lastudioicon-b-facebook"></span></a>
                  <a href="http://www.twitter.com/share?url=<?php echo $this->Url->build('/product/' . $product->slug,$product->id, true); ?>"><span class="lastudioicon-b-twitter"></span></a>
                  <a href="https://www.instagram.com/sharer.php?u=<?php echo $this->Url->build('/product/' . $product->slug,$product->id, true); ?>"><span class="lastudioicon-b-instagram"></span></a>
                  <a href="http://pinterest.com/pin/create/button/?url=<?php echo $this->Url->build('/product/' . $product->slug,$product->id, true); ?>"><span class="lastudioicon-b-pinterest"></span></a>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Shop Area ==-->
    
    
      <!--== Start Shop Tab Area ==-->
      <section class="product-area product-description-review-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="product-description-review">
                <ul class="nav nav-tabs product-description-tab-menu" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="product-desc-tab" data-bs-toggle="tab"
                      data-bs-target="#productDesc" type="button" role="tab" aria-controls="productDesc"
                      aria-selected="true">Description</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="product-review-tab" data-bs-toggle="tab"
                      data-bs-target="#productReview" type="button" role="tab" aria-controls="productReview"
                      aria-selected="false">Reviews (1)</button>
                  </li>
                </ul>
                <div class="tab-content product-description-tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="productDesc" role="tabpanel"
                    aria-labelledby="product-desc-tab">
                    <div class="product-desc">
                      <div class="product-desc-row">
                        <div class="product-thumb">
                          <img src="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $product->image) ?>">
                        </div>
                        <div class="product-content">
                          <?= $product->content ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="productReview" role="tabpanel" aria-labelledby="product-review-tab">
                    <div class="product-review">
                      <div class="product-review-comments">
                        <h4 class="title">1 review for <span>Product Simple</span></h4>
                        <div class="comment-item">
                          <div class="thumb">
                            <img src="<?= $webroot ?>assets/img/icons/s1.jpg" alt="">
                          </div>
                          <div class="content">
                            <div class="rating">
                              <span class="lastudioicon-star-rate-1"></span>
                              <span class="lastudioicon-star-rate-1"></span>
                              <span class="lastudioicon-star-rate-1"></span>
                              <span class="lastudioicon-star-rate-1"></span>
                              <span class="lastudioicon-star-rate-1"></span>
                            </div>
                            <h5 class="meta"><span>Agnes Wilson </span> – December 24, 2020</h5>
                            <span class="review">There are no reviews yet.</span>
                          </div>
                        </div>
                      </div>
                      <div class="product-review-form">
                        <h3 class="title">Add a review</h3>
                        <div class="rating">
                          <span class="rating-title">Your rating *</span>
                          <span class="lastudioicon-star-rate-2"></span>
                          <span class="lastudioicon-star-rate-2"></span>
                          <span class="lastudioicon-star-rate-2"></span>
                          <span class="lastudioicon-star-rate-2"></span>
                          <span class="lastudioicon-star-rate-2"></span>
                        </div>
                        <form action="#" method="post">
                          <div class="review-form-content">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="reviewFormTextarea">Your review *</label>
                                  <textarea class="form-control" id="reviewFormTextarea" name="comment" rows="7"
                                    required></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <button class="btn btn-theme btn-primary btn-border" type="submit">Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Shop Tab Area ==-->

      <!--== Start Products Area Wrapper ==-->
      <section class="product-area related-products-area">
        <div class="parallax-container js-text-parallax">
          <div class="fx-wrap" data-x="200">
            <h3 class="fx-target">Related</h3>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-12 m-auto">
              <div class="section-title text-center">
                <h2 class="title">Related Products</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="swiper-container product4-slider-container">
                <div class="swiper-wrapper">
                <?php foreach($related_product as $product): ?>
                  <div class="swiper-slide">
                    <!-- Start Product Item -->
                    <div class="product-item hover-effect effect-style1">
                      <div class="product-thumb">
                        <a href="shop-single-product.html">
                          <img src="<?= $webroot ?>assets/img/shop/pro-9.jpg" alt="">
                          <span class="thumb-overlay"></span>
                          <div class="effect-content"></div>
                        </a>
                      </div>
                      <div class="product-info _2">
                        <div class="content-inner">
                          <h4 class="title"><a href="shop-single-product.html"><?= $product->title ?></a></h4>
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
            </div>
          </div>
        </div>
      </section>
      <!--== End Products Area Wrapper ==-->
      </main>