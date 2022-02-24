<!-- Page Title Section Start -->
<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h1 class="title">Login</h1>
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


<!--Login Register section start-->
<div class="login-register-section section section-padding-bottom">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <div class="col-xl-3 col-lg-3"></div>
                    <div class="col-xl-6 col-lg-6">
                        <!-- Login Form Start -->
                        <div class="login-form-wrapper">
                            <h3 class="title">Login</h3>
                            <?= $this->Form->create($user, ['class' => 'login-form']) ?>
                                <div class="single-input mb-30">
                                    <label for="username">Email</label>
                                    <?= $this->Form->text('email', ['placeholder' => 'Email', 'type' => 'email', 'required']) ?>
                                </div>
                                <div class="single-input mb-30">
                                    <label for="password">Password</label>
                                    <?= $this->Form->text('password', ['placeholder' => 'Password', 'type' => 'password', 'required']) ?>
                                </div>
                                <div class="single-input mb-30">
                                    <div class="row">
                                        <div class="col-sm-6 lost-your-password-wrap">
                                            <p>
                                                <a href="<?= $this->url->build(['action' => 'forgotPassword']) ?>" class="lost-your-password">Lost your password?</a>
                                            </p>
                                        </div>
                                        <div class="col-sm-6 remember-me-wrap">
                                            <p>
                                                <a href="<?= $this->url->build(['action' => 'register']) ?>" class="lost-your-password">Register Account?</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input">
                                    <button class="btn btn-primary btn-hover-secondary btn-width-100">Log In</button>
                                </div>
                            </form>
                        </div>
                        <!-- Login Form End -->
                    </div>
                    <div class="col-xl-3 col-lg-3"></div>
                </div>

            </div>

        </div>
    </div>
</div>