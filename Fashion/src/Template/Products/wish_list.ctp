<?php 
    $session = $this->getRequest()->getSession();
    $user = $session->read('Auth.User');
    echo $this->element('meta');
?>
<main class="main-content">
      <!--== Start Page Title Area ==-->
      <section class="page-title-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="page-title-content">
                <h2 class="title">What I want</h2>
                <div class="bread-crumbs">
                  <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                  <span class="active">What I want</span>
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
                <a  href="<?= $this->Url->build(['controller' => 'Users','action' => 'account',$user['id']]) ?>"><i class="fa fa-tachometer"></i>Account Details</a>

                <a class="active" href="<?= $this->Url->build(['controller' => 'Products','action' => 'wishList']) ?>"><i class="fa fa-heart"></i> What I want</a>

                <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'accountReturn']) ?>"><i class="fa fa-undo"></i> What I wear</a>

                <a href="<?= $this->Url->build(['controller'=>'Users','action' =>'logout']) ?>"><i class="fa fa-sign-out"></i> Logout</a>
              </div>
            </div>
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12">
              <div class="myaccount-content">
                <h3>What I want</h3>
                <div class="wishlist-table-wrap">
                  <div class="wishlist-table table-responsive">
                    <table>
                      <thead>
                        <tr>
                          <th class="pro-thumbnail">Images </th>
                          <th class="pro-name">Product</th>
                          <th class="pro-price">Size</th>
                          <th class="pro-price">Date</th>
                          <th class="pro-size">Price</th>
                          <th class="pro-remove"></th>
                          <th class="pro-remove"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($products as $key => $product): ?>
                        <tr>
                          <?php  
                              echo $this->Form->create('Cart', ['url' => '/carts/add_to_cart/'.$product->id]);
                              echo $this->Form->text('product_id', ['type' => 'hidden', 'value' => $product->id]);
                          ?> 
                          <td class="pro-thumbnail">
                            <div class="pro-info">
                              <div class="pro-img">
                                <a href="<?= $this->Url->build(['controller'=>'Products','action'=>'details',$product->slug,$product->id]) ?>">
                                  <img src="<?= $this->Url->build('/uploads/products/'.$product->id.'/'.$product->image) ?>" alt="<?= $product->title ?>">
                                </a>
                              </div>
                            </div>
                          </td>
                          <td class="pro-name"><span><?= $product->title ?></span></td>
                          <td class="pro-size"><select name="attributes[size][value]" id="size">
                          <?php foreach($product->attribute_values as $k => $attr): ?>
                              <option value="<?= $attr->title ?>">Size <?= $attr->title ?></option>
                            <?php endforeach ?>
                            </select>
                          </td>
                          <td class="pro-size"><input type="date" class="form-control" name="date" required></td>
                          <td class="pro-price"><?= $this->getConfigure('Core')['setting']['currency'],$product->price ?><br> </td>
                          <td><button type="submit" class="btn btn-theme btn-primary btn-padding"> Rent </button> </td>
                            <?= $this->Form->end(); ?>
                          <td class="pro-remove"><?= $this->Form->postLink('Remove',['controller' => 'Products','action' => 'removeWishList',array_search($product->id, $list)],['class'=> 'btn btn-theme btn-primary btn-padding'])?></td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Account Area ==-->
    </main>