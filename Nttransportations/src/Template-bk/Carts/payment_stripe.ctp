<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    echo $this->element('meta'); 
?>   
<header class="title">
    <div class="background-image-holder parallax-background">
        <img class="background-image" alt="<?= $banners[22][0]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[22][0]->id . DS . $banners[22][0]->image ) ?>">
    </div>

    <div class="container align-bottom">
        <div class="row">
            <div class="col-xs-12">
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</header>
<section class="blog-list-3 bg-white">
        <div class="blog-snippet-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-bottom: 25px">
                    <h1><a href="#"><em><?= __('Thanks you!') ?></em></a></h1>
                    <p class="lead"><?= __('We will send your confirmation and pick-up instruction to your email') ?></p>
                    <div class="group-btn">
                        <a href="<?= $this->Url->build('/') ?>"  class="btn btn-primary"><?= __('Back Home') ?></a>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </div>
    </em></em>
</section>