<?php 
    echo $this->element('meta');
    $banners = $this->getCache('banners_' . $configs['language']); 
?>

<!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[70][0]->id . DS . $banners[70][0]->image) ?>)">
        </div>
        <div class="page-header-border"></div>
        <div class="page-header-border page-header-border-two"></div>
        <div class="page-header-border page-header-border-three"></div>
        <div class="page-header-border page-header-border-four"></div>
        <div class="page-header-border page-header-border-five"></div>
        <div class="page-header-border page-header-border-six"></div>

        <div class="page-header-shape-1"></div>
        <div class="page-header-shape-2"></div>
        <div class="page-header-shape-3"></div>

        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                    <li><a href="<?= $this->Url->build(['action' => 'projects']) ?>">Projects</a></li>
                    <li class="active"><?= $article->title ?></li>
                </ul>
                <h2><?= $article->title ?></h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Project Details Start-->
    <section class="project-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__img wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <img src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="project-details__content">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="project-details__content-left">
                            <h3 class="project-details__content-title wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms"><?= $article->title ?></h3>
                            <?= $article->content ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="project-details__content-right">
                            <div class="project-details__details-box">
                                <div class="project-details__details-info wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                                    <!-- <div class="project-details__details-info-single">
                                        <h5 class="project-details__details-info-client">Clients:</h5>
                                        <p class="project-details__details-info-name">Jessica Brown</p>
                                    </div> -->
                                    <div class="project-details__details-info-single">
                                        <h5 class="project-details__details-info-client">Category:</h5>
                                        <p class="project-details__details-info-name"><?= $article->article_categories[0]->title ?>
                                        </p>
                                    </div>
                                    <div class="project-details__details-info-single">
                                        <h5 class="project-details__details-info-client">Date:</h5>
                                        <p class="project-details__details-info-name"><?= $article->created->nice() ?></p>
                                    </div>
                                </div>
                                <div class="project-details__details-social-list wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__pagination-box wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <ul class="project-details__pagination list-unstyled">
                            <li class="next">
                                <p class="project-details__pagination-sub-title">Previous project</p>
                                <a href="#" aria-label="Previous">
                                    <span class="project-details__pagination-title">Repellendus aut</span>
                                    <i class="icon-right-arrow"></i>
                                </a>
                            </li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="previous">
                                <p class="project-details__pagination-sub-title">next project</p>
                                <a href="#" aria-label="Next">
                                    <span class="project-details__pagination-title">Autem molestiae</span>
                                    <i class="icon-right-arrow"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!--Project Details End-->

    <!--Similar Work Start-->
    <section class="similar-work">
        
    </section>
    <!--Similar Work End-->