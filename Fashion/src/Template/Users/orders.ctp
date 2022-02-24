<?php 
    $session = $this->getRequest()->getSession(); $user = $session->read('Auth.User');
    echo $this->element('meta'); 
?>
<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h2 class="title">What I wear</h2>
                        <div class="bread-crumbs">
                            <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                            <span class="active">What I wear</span>
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
                        <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'account',$user['id']]) ?>"><i class="fa fa-tachometer"></i>Account Details</a>

                        <!-- <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'wishList']) ?>"><i class="fa fa-heart"></i> What I want</a> -->

                        <a class="active" href="<?= $this->Url->build(['controller' => 'Users','action' => 'orders']) ?>"><i class="fa fa-undo"></i> What I rent</a>

                        <a href="<?= $this->Url->build(['controller'=>'Users','action' =>'logout']) ?>"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>
                <!-- My Account Tab Menu End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-9 col-12">
                    <div class="myaccount-content">
                        <h3>What I wear</h3>
                        <div class="wishlist-table-wrap return-table-wrap">
                            <div class="wishlist-table return-table table-responsive">
                                <?php if(!empty($orders)): ?>
                                    <?php foreach($orders as $order): ?>
                                    <h4>
                                        #<?= $order->id ?> / Date Order:
                                        <?= $order->created->format('M d,Y H:i') ?> / Status:
                                        <?= $order->status ?> / Total:
                                        <?= $this->getConfigure('Core')['setting']['currency'],$order->amount ?>
                                    </h4>
                                    <h4>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="pro-thumbnail">Images</th>
                                                <th class="pro-name">Product</th>
                                                <th class="pro-stock-status">Date</th>
                                                <th class="pro-price">Quantity</th>
                                                <th class="pro-price">Amount</th>
                                                <th class="pro-btn">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($order->order_details as $details): ?>
                                            <tr>
                                                <td class="pro-thumbnail">
                                                    <div class="pro-info">
                                                        <div class="pro-img">
                                                            <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$details->product->slug,$details->product->id]) ?>">
                                                                <img src="<?= $this->Url->build('/uploads/products/'.$details->product->id.'/'.$details->product->image) ?>" alt="<?= $details->product->title ?>" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="pro-name">
                                                    <span><?= $details->product->title ?></span><br />
                                                    Size :
                                                    <?= $details->attribute ?><br />
                                                    <?= $details->description ?>
                                                </td>

                                                <td class="pro-stock-status">
                                                    <?php if ($details->start): ?>
                                                        <span>Start: </span>
                                                        <?= $details->start->format('M d,Y H:i') ?>
                                                    <?php endif ?>
                                                    
                                                    <br>
                                                    <?php if ($details->end): ?>
                                                        <span>End: </span>
                                                        <?= $details->end->format('M d,Y H:i') ?>
                                                    <?php endif ?>
                                                    
                                                </td>
                                                <td class="pro-price"><?= $details->quantity ?></td>
                                                <td class="pro-price"><?= $this->getConfigure('Core')['setting']['currency'],$details->amount ?></td>
                                                <td class="pro-btn">
                                                    <?php if ($details->amount == 0): ?>
                                                        <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$details->product->slug,$details->product->id]) ?>" class="btn btn-theme btn-primary btn-padding">
                                                            Rent
                                                        </a>
                                                    <?php else: ?>
                                                        <?php if ($order->status == 'Paid'): ?>
                                                            <?php if (!$details->lost): ?>
                                                                <button type="button" class="btn btn-theme btn-primary btn-padding" data-bs-toggle="modal" data-bs-target="#action-<?= $details->id ?>">
                                                                    Lost/Damage
                                                                </button>
                                                            <?php endif ?>
                                                            
                                                            <?php if (!$details->wantToReturn): ?>
                                                                <button type="button" class="btn btn-theme btn-primary btn-padding" data-bs-toggle="modal" data-bs-target="#return-date-<?= $details->id ?>">
                                                                    Return
                                                                </button>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            You Unpaid
                                                        <?php endif ?>
                                                        
                                                    <?php endif ?>
                                                    
                                                    
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="action-<?= $details->id ?>" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="returnModalLabel" style="text-align: center;">
                                                                <span><?= $details->product->title ?></span><br />
                                                                Size :
                                                                <?= $details->attribute ?><br />
                                                                <?= $details->description ?>
                                                            </h3>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <?php if (!$details->wantToReturn): ?>
                                                            <?php if ($details->lost == 0): ?>
                                                                <?= $this->Form->create(null, ['url' => ['action' => 'action', $details->id]]) ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <textarea rows="4" cols="50" class="form-control" name="description"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-theme btn-primary btn-padding" type="submit" value="damage" name="action">Damage</button>
                                                                    <button class="btn btn-theme btn-primary btn-padding" type="submit" value="lost" name="action">Lost</button>
                                                                    <!-- <button class="btn btn-theme btn-primary btn-padding" type="submit" value="buy" name="action">Buy</button> -->
                                                                </div>
                                                                <?= $this->Form->end() ?>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if (!$details->wantToReturn): ?>
                                                <div class="modal fade" id="return-date-<?= $details->id ?>" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title" id="returnModalLabel" style="text-align: center;">
                                                                    <span>Please choose the date you want to return the product</span><br />
                                                                    <!-- Size :
                                                                    <?= $details->attribute ?><br />
                                                                    <?= $details->description ?> -->
                                                                </h3>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <?= $this->Form->create(null, ['url' => ['action' => 'wantToReturn', $details->id]]) ?>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="datetime-local" name="end" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-theme btn-primary btn-padding" type="submit">Return</button>
                                                            </div>
                                                            <?= $this->Form->end() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    </h4>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <p>You haven't placed any orders yet.</p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Account Area ==-->
</main>
