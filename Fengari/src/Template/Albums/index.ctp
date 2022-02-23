<?php echo $this->element('meta'); ?>
<div class="animsition">
    <div class="wrapper boxed">

        <?= $this->element('header') ?>
        <div class="content">
            <div class="container">
                <div class="filter-content-4">
                    <ul class="filter js-filter">
                        <li class="active"><a href="#" data-filter="*">All</a></li>
                        <?php foreach ($albumCategories as $albumCategory): ?>
                            <li><a href="#" data-filter=".<?= $albumCategory->slug ?>"><?= $albumCategory->title ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="js-isotope">
                    <?php foreach ($albums as $album): ?>
                        <?php $cat = null;
                        foreach ($album->album_categories as $cat_alb) {
                            $cat .= $cat_alb->slug . ' ';
                        }
                         ?>
                        <div class="<?= $cat ?> card-row js-isotope-item">
                            <div class="card-row-img col-md-7 col-lg-8 hidden-sm hidden-xs" style="background-image:url(<?= $this->Url->build('/uploads/albums/' . $album->id . DS . $album->image) ?>)"></div>
                            <img class="visible-sm visible-xs img-responsive" alt="" src="<?= $this->Url->build('/uploads/albums/' . $album->id . DS . $album->image) ?>">
                            <div class="card-block col-md-offset-7 col-lg-offset-8">
                                <div class="card-posted"><?= $album->created->nice() ?></div>
                                <h4 class="card-title"><?= $album->title ?></h4>
                                <div class="card-text"><?= $album->description ?></div>
                                <a href="<?= $this->Url->build(['action' => 'details', $album->slug, $album->id]) ?>" class="card-read-more">Continue</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <?= $this->element('footer') ?>
    </div>
</div>