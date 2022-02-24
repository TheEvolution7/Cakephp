
<?php
    $session = $this->getRequest()->getSession();
    $carts = $session->read('Cart');
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
            <h2 class="title">Shipping Address</h2>
            <div class="bread-crumbs">
                <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                <span class="active">Shipping Address</span>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Shop Checkout Area ==-->
    <section class="shop-checkout-area shopping-address-area">
    <div class="container">
        <div class="row ">
        <div class="col-12">
            <div class="shop-billing-form">
            <form method="post">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">First name <abbr class="required" title="required">*</abbr></label>
                    <input class="form-control" id="" type="text" name="first_name" value="<?= $user['first_name'] ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">Last name <abbr class="required" title="required">*</abbr></label>
                    <input class="form-control" id="" type="text" name="last_name" value="<?= $user['last_name'] ?>" required>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">Phone <abbr class="required" title="required">*</abbr></label>
                    <input class="form-control" id="" type="text" name="phone_number" value="<?= $user['phone_number'] ?>" required>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">Email <abbr class="required" title="required">*</abbr></label>
                    <input class="form-control" id="" type="email" name="email" value="<?= $user['email'] ?>" required>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="form-group">
                    <label for="">Post Code <abbr class="required" title="required">*</abbr></label>
                    <input class="form-control" id="postcode" type="text" name="postcodes" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="postcodedetails"></div>
                </div> -->
                </div>
                <!-- <div class="form-group">
                <?php echo $this->Form->control('country_id', [
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $countries,
                        'class'   => 'form-control niceselect',
                        'label' => false,
                        'div' => false,
                        'empty' =>  __('Country / Region *'),
                        'required' => true,
                    ]); ?>
                </div>

                <div class="form-group">
                <label for="">Street address <abbr class="required" title="required">*</abbr></label>
                <input class="form-control" id="" type="text" placeholder="House number and street name" name="address" value="<?= !empty($user['address']) ? $user['address'] : ''  ?>" required>
                </div>

                <div class="form-group">
                <input class="form-control" type="text" placeholder="Apartment, suite, unit, etc. (optional)" name="address2" value="<?= !empty($user['address2']) ? $user['address2'] : '' ?>">
                </div>

                <div class="form-group">
                <label for="">Town / City <abbr class="required" title="required">*</abbr></label>
                <input class="form-control" id="" type="text" name="city" required value="<?= !empty($user['city']) ? $user['city'] : ''  ?>" required>
                </div>

                <div class="form-group">
                <label for="">State <abbr class="required" title="required">*</abbr></label>
                <select class="form-control niceselect" id="" name="state" required value="<?= !empty($user['state']) ? $user['state'] : ''  ?>">
                    <option value="London">London</option>  
                </select>
                </div> -->
                <div class="form-group mb-0 text-center" id="btn-submit">
                    <button class="btn btn-theme btn-black btn-padding btn-border mt-20" type="submit">Submit</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!--== End Shop Checkout Area ==-->
</main>

