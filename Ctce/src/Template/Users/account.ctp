<?php
    use Cake\I18n\Number;
?>
<!-- Page Title Section Start -->
<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h1 class="title">My account</h1>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                <li class="current">My account</li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->


<!--My Account section start-->
<div class="my-account-section section section-padding-bottom">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="far fa-tachometer-alt-slow"></i>
                                Dashboard</a>

                            <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

                            <!-- <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>

                            <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                Method</a>

                            <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a> -->

                            <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

                            <a href="<?= $this->Url->build(['action' => 'logout']) ?>"><i class="fa fa-sign-out"></i> Logout</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->

                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>

                                    <div class="welcome mb-20">
                                        <p>Hello, <strong><?= $user->full_name ?></strong></p>
                                    </div>

                                    <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                                        recent orders, manage your shipping and billing addresses and edit your
                                        password and account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($user->orders as $key => $order): ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td>
                                                            <?php 
                                                            foreach ($order->order_details as $details) {
                                                                echo $details->product->title;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $order->created->nice() ?></td>
                                                        <td><?= $order->status ?></td>
                                                        <td><?= $this->Number->currency($order->amount, 'USD'); ?></td>
                                                        <!-- <td><a href="#" class="ht-btn black-btn">View</a></td> -->
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Downloads</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Date</th>
                                                    <th>Expire</th>
                                                    <th>Download</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>Mostarizing Oil</td>
                                                    <td>Aug 22, 2018</td>
                                                    <td>Yes</td>
                                                    <td><a href="#" class="ht-btn black-btn">Download File</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Katopeno Altuni</td>
                                                    <td>Sep 12, 2018</td>
                                                    <td>Never</td>
                                                    <td><a href="#" class="ht-btn black-btn">Download File</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Payment Method</h3>

                                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>

                                    <address>
                                        <p><strong>Alex Tuntuni</strong></p>
                                        <p>1355 Market St, Suite 900 <br>
                                        San Francisco, CA 94103</p>
                                        <p>Mobile: (123) 456-7890</p>
                                    </address>

                                    <a href="#" class="ht-btn black-btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>Edit Address</a>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>

                                    <div class="account-details-form">
                                        <?= $this->Form->create($user) ?>
                                            <div class="row">
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <?= $this->Form->text('first_name', ['placeholder' => 'First Name']) ?>
                                                    <?= $this->Form->error('first_name') ?>
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <?= $this->Form->text('last_name', ['placeholder' => 'Last Name']) ?>
                                                    <?= $this->Form->error('last_name') ?>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <?= $this->Form->text('email', ['placeholder' => 'Email', 'type' => 'email']) ?>
                                                    <?= $this->Form->error('email') ?>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-hover-secondary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <?= $this->Form->create($user) ?>
                                        <?= $this->Form->hidden('type', ['value' => 'setting']) ?>
                                            <div class="row">
                                                <div class="col-12 mb-30">
                                                    <h4>Password change</h4>
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <?= $this->Form->text('password', ['placeholder' => 'New Password', 'type' => 'password', 'value' => false]) ?>
                                                    <?= $this->Form->error('password') ?>
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <?= $this->Form->text('password_confirm', ['placeholder' => 'New Password (confirm)', 'type' => 'password', 'value' => false]) ?>
                                                    <?= $this->Form->error('password_confirm') ?>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-hover-secondary">Change</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>

            </div>

        </div>
    </div>
</div>