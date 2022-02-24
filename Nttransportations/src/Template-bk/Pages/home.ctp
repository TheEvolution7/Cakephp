<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    echo $this->element('meta'); 
?>   
<section class="hero-slider">
    <ul class="slides">
    <?php foreach($banners[3] as $banner): ?>
        <li class="overlay">
            <div class="background-image-holder parallax-background">
                <img class="background-image" alt="<?= $banner->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banner->id . DS . $banner->image ) ?>">
            </div>
            <div class="container align-vertical">
                <div class="row">
                    <div class="col-md-6 col-sm-9">
                        <h1 class="text-white"><?= $banner->title ?></h1>
                        <?= $this->Form->create(null,['url' => ['controller' => 'Carts', 'action' => 'add']]) ?>
                        <?php echo $this->Form->text('quantity',array('type' => 'hidden','value' => 1)); ?>
                            <button type="submit" class="btn btn-primary btn-filled"><?= $banner->description ?></a>
                        <?php $this->Form->end(); ?>
                    </div>
                </div>
            </div>
            <!--end of container-->
        </li>
    <?php endforeach ?>
    </ul>
</section>

<section class="primary-features duplicatable-content wave-container">
    <div class="wave-section">
        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(21, 162, 166,0.7)" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(1, 162, 166,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(1, 162, 166,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#01a2a6" />
                </g>
            </svg>
        </div>
        <!--Waves end-->
    </div>


    <div class="container">
        <div class="row">
        <?php foreach($banners[4] as $banner): ?>
            <div class="col-md-3 col-sm-6 clearfix">
                <div class="feature feature-icon-small">
                    <?= $banner->url ?>
                    <h6 class="text-white"><?= $banner->title ?></h6>
                    <p class="text-white">
                        <?= $banner->description ?>
                    </p>
                </div>
                <!--end of feature-->
            </div>
        <?php endforeach ?>
           
        </div>
        <!--end of row-->
    </div>
    <div class="bg-bottom" style="background-image: url(<?= $webroot ?>img/accolades-ornaments-bottom.png);"></div>
    <!-- <img src="<?= $webroot ?>img/accolades-ornaments-bottom.png" alt=""> -->
    <!--end of container-->
</section>

<section class="side-image text-heavy clearfix">
    <div class="image-container col-md-5 col-sm-3 pull-left">
        <div class="background-image-holder">
            <img class="background-image" alt="<?= $banners[5][0]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[5][0]->id . DS . $banners[5][0]->image ) ?>">
        </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4 content clearfix">
                <h1><?= $banners[5][0]->title ?></h1>
                <p class="lead">
                <?= $banners[5][0]->description ?>
                </p>
                <a href="<?= $banners[5][3]->url ?>" class="btn btn-primary"><?= $banners[5][3]->title ?></a><br>
                <div class="col-sm-6 no-pad-left feature">
                    <h5><?= $banners[5][1]->title ?></h5>
                    <p><?= $banners[5][1]->description ?></p>
                </div>

                <div class="col-sm-6 no-pad-left feature">
                    <h5><?= $banners[5][2]->title ?></h5>
                    <p><?= $banners[5][2]->description ?></p>
                </div>
            </div>

        </div>
        <!--end of row-->

    </div>
</section>

<section class="side-image clearfix">

    <div class="container">
        <div class="row">
            <div class="col-md-6 content col-sm-8 clearfix">
                <h1><?= $banners[6][0]->title ?></h1>

                <div class="row">
                <?php foreach($banners[7] as $banner): ?>
                    <div class="col-md-6 col-xs-12">
                        <div class="feature feature-icon-left">
                        <a href="<?= $banner->url ?>">
                            <div class="icon-holder">
                                <i class="icon icon-map-pin"></i>
                            </div>
                            <div class="feature-text">
                                <h6><?= $banner->title ?></h6>
                            </div>
                        </a>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>

            </div>
            <!--end of row-->


        </div>
        <!--end of container-->
    </div>

    <div class="image-container col-md-5 col-sm-3 pull-right">
        <div class="background-image-holder">
            <img class="background-image" alt="<?= $banners[6][0]->title ?>" src="<?= $this->Url->build('/uploads/banners/'. $banners[6][0]->id . DS . $banners[6][0]->image) ?>">
        </div>
    </div>

</section>

<section class="pricing-1 bg-secondary-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="text-white"><?= $banners[9][0]->title ?></h1>
            </div>
            <div class="col-sm-12 text-center">
                <h5 class="text-white"><?= $banners[9][0]->description ?></h5>
            </div>
        </div>
        <!--end of row-->

        <div class="row clearfix pricing-tables">
        <?php foreach($package as $pack): ?>
            <div class="col-md-3  col-sm-6 no-pad-right">
                <div class="pricing-table <?= $pack->featured == 1  ? 'emphasis' : '' ?>">
                    <div class="price">
                        <span class="sub"><?= $pack->currency ?></span>
                        <span class="amount"><?= $pack->price ?></span>
                        <span class="sub"><?= __('/Trip') ?></span>
                    </div>
                    <div class="title">
                        <h2><?= $pack->title ?></h2>
                    </div>
                    <ul class="features">
                        <?= $pack->content ?>
                    </ul>
                    <a href="tel:<?= \Cake\Core\Configure::read('Core.setting.phone_number') ?>" type="submit" id="book-<?= $pack->id ?>" class="btn btn-primary btn-white"><?= __('Call Now') ?></a>
                </div>
            </div>
        <?php endforeach ?>


        </div>
        <!--end of row-->

    </div>
    <!--end of container-->

</section>

<section class="no-pad clearfix">
    <?php foreach($tours as $tour): ?>
        <div class="col-md-6 col-sm-12 no-pad">
            <div class="feature-box">
                <div class="background-image-holder overlay">
                    <img class="background-image" alt="<?= $tour->title ?>" src="<?= $this->Url->build('/uploads/products/' . $tour->id . DS . $tour->image ) ?>">
                </div>
                <div class="inner">
                    <span class="alt-font text-white"><?= $tour->excerpt ?></span>
                    <h1 class="text-white"><?= $tour->title ?></h1>
                    <p class="text-white">
                        <?= $tour->description ?>
                    </p>
                    <a href="<?= $this->Url->build('/tour/oahu-circle-island-tour') ?>" class="btn btn-primary btn-white"><?= __('View Detail') ?></a>
                </div>
            </div>

        </div>
    <?php endforeach ?>
</section>

<section class="no-pad-bottom projects-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
                <h1><?= $gallery->title ?></h1>
                <p class="lead">
                <?= $gallery->description ?>
                </p>
            </div>
        </div>
        <!--end of row-->

    </div>
    <!--end of container-->

    <div class="projects-wrapper clearfix">
        <!--end of container-->

        <div class="container">
            <div class="projects-container column-projects">
            <?php $images = explode('|', $gallery->images); unset($images[count($images) - 1]) ?>
            <?php foreach($images as $img): ?>
                <div class="col-md-4 col-sm-6 project development image-holder">
                    <a href="<?= $this->Url->build('/uploads/albums/' . DS . $gallery->id . DS . $img) ?>" data-lightbox="true" data-title="<?= $gallery->title ?>">
                        <div  class="background-image-holder">
                            <img class="background-image" alt="<?= $gallery->title ?>" src="<?= $this->Url->build('/uploads/albums/' . DS . $gallery->id . DS . $img) ?>">
                        </div>
                    </a> 
                </div>
                <!--end of individual project-->
            <?php endforeach ?>
            </div>
            <!--end of projects-container-->
        </div>
        <!--end of container-->
    </div>
    <!--end of projects wrapper-->
</section>
