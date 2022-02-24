<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
    $users = $this->Session->read('Auth.User');
?>         
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[32][0]->id . DS . $banners[32][0]->image) ?>" alt="<?= $banners[32][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta"><?= $banners[32][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $user->full_name ?></h2></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User -->
<div class="user-section">
    <div class="container-fluid">
        <div class="table-user">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">Table</span>
                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">information</h2>
                </div>
                <div class="col-md-12">
                
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">First Name</th>
                                <td><?= $user->first_name ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td><?= $user->last_name ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td><?= $user->email ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td><?= $user->address ?></td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td><?= $user->city ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Country</th>
                                <td><?= $user->country ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td><?= $user->phone_number ?></td>
                            </tr>
                        </tbody>
                        
                    </table>
                    <div class="button-user d-flex">
                        <div class="row">
                            <div class="col-auto">
                                <button class="btn-contact" data-toggle="modal" data-target="#edit-modal"><span>Edit Infomation</span></button>
                            </div>
                            <div class="col-auto">
                                <button class="btn-contact mr-auto" data-toggle="modal" data-target="#editpass-modal"><span>Edit Password</span></button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <?= $this->Form->create($user,['url' => ['controller' => 'Users','action' => 'edit'],'class' => 'js-check-form']) ?>
                        <div class="modal-header">
                        <h2 class="modal-title" id="EditModalLongTitle">Edit Information</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>First Name <span>*</span></label>
                                            <?= $this->Form->text('first_name'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>Last name <span>*</span></label>
                                            <?= $this->Form->text('last_name'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>Address <span>*</span></label>
                                            <?= $this->Form->text('address'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>City</label>
                                            <?= $this->Form->text('city'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>Country</label>
                                            <?= $this->Form->text('country'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>Phone <span>*</span></label>
                                            <?= $this->Form->text('phone_number'); ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-contact"><span>Save changes</span></button>
                        </div>
                    <?= $this->Form->end(); ?>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editpass-modal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <?= $this->Form->create($user,['class' => 'check-pass']) ?>
                        <?= $this->Form->text('type', ['type' => 'hidden', 'value' => 'changePassword']) ?>
                        <div class="modal-header">
                        <h2 class="modal-title" id="EditModalLongTitle">Edit Password</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>Password<span>*</span></label>
                                            <?= $this->Form->text('current_password', ['type' => 'password', 'required']); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>New Password <span>*</span></label>
                                            <?= $this->Form->text('password', ['type' => 'password', 'required','class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-30">
                                            <label>Confirm Password<span>*</span></label>
                                            <?= $this->Form->text('password_confirm', ['type' => 'password', 'required','class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-contact"><span>Save changes</span></button>
                        </div>
                    <?= $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="order">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">Table</span>
                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">oder</h2>
                </div>
                <div class="col-12">
                    <table class="table table-mobile">
                        <thead>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <!-- <th></th> -->
                        </thead>
                        <tbody>
                            <?php
                                $status = [
                                    1 => __('Pending',true),
                                    2 => __('Shipping',true),
                                    3 => __('Finish',true),
                                    4 => __('Pending',true),
                                    ];
                                    
                            ?>
                        <?php foreach ($user->orders as $key => $order):
                            $total = $order->amount + $order->amount_attr;     
                        ?>
                            <tr>
                                <td data-label="Order">#<?= $order->id ?></td>
                                <td data-label="Date"><?= $order->created->format('d/m/Y') ?></td>
                                <td data-label="Status"><?= $status[$order->status] ?></td>
                                <td data-label="Total"><?= number_format(!empty($total) ? $total : 0) . ' ' .\Cake\Core\Configure::read('Core.setting.currency') ?></td>
                                <!-- <td data-label=""><a href="#">View</a></td> -->
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    
</div>