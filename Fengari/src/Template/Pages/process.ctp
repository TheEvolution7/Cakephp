<?php
    echo $this->element('meta'); 
    $banners = $this->getCache('banners_' . $configs['language']); 
?>

<div class="animsition">
    <div class="wrapper boxed">

        <div class="click-capture"></div>

        <?= $this->element('header') ?>

        <main class="page-header-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title-hr"></div>
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <h1><?= $banners[50][0]->title ?></h1>
                    </div>
                </div>
            </div>
        </main>
        <div class="content">
            <div class="content-entry-image"></div>
            <div class="page-inner">
                <section class="section about-info">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="section-info">
                                    <div class="title-hr"></div>
                                    <div class="info-title"><?= $banners[50][1]->title ?></div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="text-display-1">
                                    <?= $banners[50][1]->description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section bg-dots">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="section-info">
                                    <div class="title-hr"></div>
                                    <div class="info-title"><?= $banners[50][2]->title ?></div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row-services row">
                                    <div class="col-service col-sm-6 col-lg-4">
                                        <span class="text-dark icon-medium icon-apartment"></span>
                                        <h4><?= $banners[50][3]->title ?></h4>
                                        <p><?= $banners[50][3]->description ?></p>
                                    </div>
                                    <div class="col-service col-sm-6 col-lg-4">
                                        <span class="text-dark icon-medium icon-paint-roller"></span>
                                        <h4><?= $banners[50][4]->title ?></h4>
                                        <p><?= $banners[50][4]->description ?></p>
                                    </div>
                                    <div class="clearfix visible-sm visible-md"></div>
                                    <div class="col-service col-sm-6 col-lg-4">
                                        <span class="text-dark icon-medium icon-pencil-ruler"></span>
                                        <h4><?= $banners[50][5]->title ?></h4>
                                        <p><?= $banners[50][5]->description ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                
            </div>
        </div>

        <?= $this->element('footer') ?>
    </div>
</div>