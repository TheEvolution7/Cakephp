<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    echo $this->element('meta'); 
?>   
<header class="page-header">
        <div class="background-image-holder parallax-background">
            <img class="background-image" alt="<?= $banners[12][0]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[12][0]->id . DS . $banners[12][0]->image ) ?>">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span class="text-white alt-font"><?= $banners[12][0]->description ?></span>
                    <h1 class="text-white"><?= $banners[12][0]->title ?></h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </header>

    <section class="contact-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
                    <h1><?= $banners[12][1]->title ?></h1>
                    <p class="lead">
                        <?= $banners[12][1]->description ?>
                    </p>
                </div>
            </div>
            <!--end of row-->

            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="form-wrapper clearfix">
                        <form class="form-contact" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>" method="post">
                            <div class="inputs-wrapper">
                                <input class="form-name" type="text" placeholder="<?= __('Your Name') ?>" name="name" required>
                                <input class="form-email" type="text" name="email" placeholder="<?= __('Your Email Address') ?>" required>
                                <input class="form-email" type="phone" name="phone" placeholder="<?= __('Your Phone Number') ?>" required>
                                <textarea class="form-message" name="content" placeholder="<?= __('Your Message') ?>"></textarea>
                            </div>
                            <input type="submit" class="send-form" value="<?= __('Send Message') ?>">
                        </form>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>