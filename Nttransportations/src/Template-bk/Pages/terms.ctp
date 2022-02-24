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
                <h1 class="text-white"><?= $banners[22][0]->title ?></h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</header>

<section class="article-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="article-body">
                    <p class="lead">
                        <?= $banners[22][0]->title ?>
                    </p>
                    <?= $banners[22][0]->content ?>
                </div>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>