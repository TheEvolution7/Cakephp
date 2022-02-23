<?php echo $this->element('meta'); ?>

<div class="animsition">
    <div class="wrapper boxed">

        <?= $this->element('header') ?>
        <div class="content">
            <div class="projects">
                <div class="container">
                    <div class="filter-content-3">
                        <ul class="filter js-filter">
                            <li class="active"><a href="#" data-filter="*">All</a></li>
                            <?php foreach ($articleCategories as $articleCategory): ?>
                                <li><a href="#" data-filter=".<?= $articleCategory->slug ?>"><?= $articleCategory->title ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <!-- <div class="grid-items js-isotope js-grid-items"> -->
                        <?php foreach ($articles as $article): ?>
                            <?php $cat = null;
                            foreach ($article->article_categories as $cat_alb) {
                                $cat .= $cat_alb->slug . ' ';
                            }
                             ?>

                            <div class="grid-item plants js-isotope-item js-grid-item">
                                <div class="news-item">
                                    <img alt="" src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image) ?>" />
                                    <div class="news-hover">
                                        <div class="hover-border"><div></div></div>
                                        <div class="content">
                                            <div class="time"><?= $article->created->nice() ?></div>
                                            <h3 class="news-title"><?= $article->title ?></h3>
                                            <p class="news-description"><?= $article->description ?></p>
                                        </div>
                                        <a class="read-more" href="<?= $this->Url->build(['action' => 'details', $article->slug, $article->id]) ?>">Continue</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        
                    <!-- </div> -->
                </div>
            </div>
        </div>

        <?= $this->element('footer') ?>
    </div>
</div>