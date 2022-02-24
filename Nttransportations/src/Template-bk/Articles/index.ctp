<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    echo $this->element('meta'); 
?>   
<header class="page-header">
    <div class="background-image-holder parallax-background">
        <img class="background-image" alt="<?= $banners[13][0]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[13][0]->id . DS . $banners[13][0]->image ) ?>">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-white"><?= $banners[13][0]->title ?></h1>
                <p class="text-white lead"><?= $banners[13][0]->title ?></p>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</header>
<section class="blog-list-3 bg-white">
    <?php foreach($articles as $article): ?>
        <div class="blog-snippet-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-bottom: 25px">
                        <h1><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'details',$article->slug]) ?>"><?= $article->title ?></a></h1>
                        <p class="lead">
                            <?= substr($article->content,0,500) ?>
                        </p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="image-gallery">
                            <?php $images = explode('|', $article->images); unset($images[count($images) - 1]) ?>
                            <?php foreach($images as $img): ?>
                                <div class="col-sm-4">
                                    <div class="image-holder" data-scroll-reveal="enter bottom and move 30px">
                                            <div class="background-image-holder">
                                                <img class="background-image lightbox-image" alt="<?= $article->title ?>" src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $img) ?>">
                                            </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            </div>
                            <div class="col-xs-12">
                                <div style="display: flex;flex-wrap: wrap; justify-content: space-between">
                                    <h2 style="margin-bottom: 15px"><?= $article->description ?></h2>
                                    <a style="margin-bottom: 15px" href="<?= $article->url ?>" class="btn btn-primary btn-filled"><?= __('Call Us') ?></a>
                                </div>
                            </div>
                        </div>
                        <!--end of row-->
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
    <?php endforeach ?>
    <div class="blog-snippet-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-bottom: 25px">
                    <h1><a href="<?= $banners[13][1]->url ?>"><?= $banners[13][1]->title ?></a></h1>
                    <p class="lead">
                        <?= $banners[13][1]->description ?>
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </div>
</section>
