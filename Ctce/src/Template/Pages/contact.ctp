<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 

<!-- Page Title Section Start -->
<div class="page-title-section section section-padding-top-0">
    <div class="page-breadcrumb position-static">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'home']) ?>">Home</a></li>
                <li class="current">Contact us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->

<!-- Contact Form Section Start -->
<div class="contact-form-section section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="contact-title">
                    <h2 class="title"><?= $banners[14][0]->title ?> <a href="<?= $banners[14][0]->url ?>"><?= $banners[14][0]->description ?></a></h2>
                    <p class="mt-3"><?= $banners[14][1]->title ?></p>
                </div>
                <div class="contact-form">
                    <form action="" method="post">
                        <div class="row max-mb-n30">
                            <div class="col-md-6 col-12 max-mb-30">
                                <input type="text" placeholder="Your Name *" name="name" required>
                            </div>
                            <div class="col-md-6 col-12 max-mb-30">
                                <input type="email" placeholder="Email *" name="email" required>
                            </div>
                            <div class="col-12 max-mb-30">
                                <select name="title" id="">
                                    <option value="choose"><?= __('Please Select an Option') ?></option>
                                <?php foreach($banners[15] as $banner): ?>
                                    <option value="<?= $banner->title ?>"><?= $banner->title ?></option>
                                <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-12 max-mb-30">
                                <input type="text" placeholder="Phone Number *" name="phone">
                            </div>
                            <div class="col-12 max-mb-30">
                                <textarea name="content" placeholder="What would you like to know?"></textarea>
                            </div>
                            <div class="col-12 text-center max-mb-30">
                                <button class="btn btn-primary btn-hover-secondary btn-width-180 btn-height-60" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Form Section End -->
