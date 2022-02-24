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
                <li class="active"><?= $banners[70][0]->title ?></php></li>
            </ul>
            <h2><?= $banners[70][0]->description ?></php></h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Project One Start-->
<section class="project-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <ul class="project-filter style1 post-filter has-dynamic-filters-counter list-unstyled wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                    <?php foreach ($articleCategories as $category): ?>
                        <li data-filter=".<?= $category->slug ?>"><span class="filter-text"><?= $category->title ?></span></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="row filter-layout masonary-layout wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
            <?php $arr =  array_chunk($articles->toArray(), 5); ?>
            <?php foreach ($arr as $articless): ?>
                <?php foreach ($articless as $k => $article): ?>
                    <?php
                        $str = null;
                        foreach ($article->article_categories as $key => $value) {
                             $str .= $value->slug . ' ';
                         } 
                    ?>
                    <div class="col-xl-<?= $k == 1 ? 6 : 3 ?> col-lg-6 col-md-6 filter-item <?= $str ?>">
                        <!--Portfolio One Single-->
                        <div class="project-one__single">
                            <div class="project-one__img">
                                <img src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image) ?>" alt="">
                                <div class="project-one__hover project-one__hover-pl-40">
                                    <p class="project-one__tagline"><?= $article->article_categories[0]->title ?></p>
                                    <h3 class="project-one__title"><a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'projectDetails', $article->slug, $article->id]) ?>"><?= $article->title ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endforeach ?>
        </div>
    </div>
</section>