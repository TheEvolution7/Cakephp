<?php echo $this->element('meta'); ?>
<div class="animsition">
    <div class="wrapper boxed">
        <?= $this->element('header') ?>
        <div class="content">
            <div class="projects">
                <div class="grid-items js-isotope js-grid-items">
                    <?php foreach ($album->album_images as $image): ?>
                    <div class="grid-item building js-isotope-item js-grid-item">
                        <div class="project-item">
                            <img alt="" class="img-responsive" src="<?= $this->Url->build('/uploads/albums/' . $image->album_id . DS . $image->image) ?>">
                            <a href="javascript:;" class="project-hover-2">
                            <i class="icon-plus"></i>
                            <div class="project-hover-content">
                            <h3 class="project-title"><?= $image->title ?></h3>
                            </div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <?= $this->element('footer') ?>
    </div>
</div>