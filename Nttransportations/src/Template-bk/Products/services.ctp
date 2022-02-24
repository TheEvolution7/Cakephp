<?php 
    $banners = $this->getCache('banners_' . $configs['language']); 
    echo $this->element('meta'); 
?> 
<header class="page-header">
        <div class="background-image-holder parallax-background">
            <img class="background-image" alt="<?= $banners[14][0]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[14][0]->id . DS . $banners[14][0]->image ) ?>">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span class="text-white alt-font"><?= $banners[14][0]->url ?></span>
                    <h1 class="text-white"><?= $banners[14][0]->title ?></h1>
                    <p class="lead text-white"><?= $banners[14][0]->description ?></p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </header>
    <style>
        .content-p {
            display: flex;
            flex-direction: column;
            flex: 1 0 auto;
        }
         .space {
            flex: 1 0 auto;
        }
        @media (min-width: 768px) {
            .img-service .content .content-p h3 {
                min-height: 70px
            }
        }
        
    </style>
    <section class="duplicatable-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><?= $banners[14][1]->title ?></h1>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
            <?php foreach($banners[15] as $banner): ?>
                <div class="col-sm-6">
                    <div class="feature feature-icon-large">
                        <div class="pull-left">
                            <?= $banner->url ?>
                        </div>
                        <div class="pull-right">
                            <h5><?= $banner->title ?></h5>
                            <p>
                                <?= $banner->description ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
            <!--end of row-->
        </div>

    </section>

    <section class="inline-image-right">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 align-vertical no-align-mobile">
                    <h1><?= $banners[14][2]->title ?></h1>
                    <h6><?= $banners[14][2]->description ?></h6>
                    <p class="lead">
                        <?= $banners[14][2]->content ?>
                    </p>
                </div>

                <div class="col-sm-6 text-center">
                    <img class="product-image" alt="<?= $banners[14][2]->title ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[14][2]->id . DS . $banners[14][2]->image ) ?>">
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section class="pricing-1 bg-secondary-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1 class="text-white"><?= $banners[14][3]->title ?></h1>
                </div>
            </div>
            <!--end of row-->

            <div class="column-projects column-flex">
            <?php foreach($products as $product): ?>
                <div class="col-md-4 col-sm-6 image-holder img-service">
                    <div class="background-image-holder item-service">
                        <img class="background-image" alt="<?= $product->title ?>" src="<?= $this->Url->build('/uploads/products/' . $product->id . DS . $product->image ) ?>">
                    </div>
                    <div class="hover-state-content">
                        <div class="content">
                            <div class="content-p">
                                <h3 class="text-white"><?= $product->title ?></h3>
                                <p class="text-white"><?= $product->description ?></p>
                                <div class="space"></div>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between">
                                <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'servicesDetails',$product->slug,$product->id]) ?>" class="btn btn-primary btn-white"><?= __('View Detail') ?></a>
                                <form method="post" action="<?= $this->Url->build(['controller' => 'Carts', 'action' => 'add']) ?>">
                                    <?php echo $this->Form->text('destination',array('type' => 'hidden','value' => $product->id )); ?>
                                    <?php echo $this->Form->text('quantity',array('type' => 'hidden','value' => 1)); ?>
                                    <button type="submit" class="btn btn-primary btn-filled" id="<?= $product->id ?>"><?= __('Book Now') ?></button>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
            <!--end of row-->

        </div>
        <!--end of container-->

    </section>
