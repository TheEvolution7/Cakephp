<?php  $banners = $this->getCache('banners_' . $configs['language']); ?>
<div class="clients-section clients">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme">
            <?php foreach($banners[9] as $banner): ?>
                <div class="client-logo thumb-ani">
                    <a href="index.html#"><img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>"></a>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>