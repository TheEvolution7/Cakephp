<?php 
    echo $this->element('meta');
    $banners = $this->getCache('banners_' . $configs['language']); 
?>

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[71][0]->id . DS . $banners[71][0]->image) ?>)">
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
                <li class="active"><?= $banners[71][0]->title ?></php></li>
            </ul>
            <h2><?= $banners[71][0]->description ?></php></h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<section class="blog-one blog-one__blog-page">
    <div class="container">
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <!--Blog One Start-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image) ?>">
                            <a href="#">
                                <span class="blog-one__plus"></span>
                            </a>
                            <!-- <div class="blog-one__date">
                                <p>25 <br> AUG</p>
                            </div> -->
                        </div>
                        <div class="blog-one__content">
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'details', $article->slug, $article->id]) ?>"><i class="far fa-folder-open"></i> <?= $article->article_categories[0]->title ?></a></li>
                                </li>
                            </ul>
                            <h3 class="blog-one__title">
                                <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'articleDetails', $article->slug, $article->id]) ?>"><?= $article->title ?></a>
                            </h3>
                            <div class="blog-one__person">
                                <div class="blog-one__person-img">
                                    <!-- <img src="<?= $webroot ?>assets/images/blog/blog-one-person-img-1.jpg" alt=""> -->
                                </div>
                                <div class="blog-one__person-content">
                                    <p><?= $article->created->nice() ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
