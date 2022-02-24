<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>FAQs</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">FAQs</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_100 columns_padding_25">
    <div class="container">
        <div class="row vertical-tabs">
            <div class="col-sm-5">
                <!-- Nav tabs -->
                <ul class="nav" role="tablist">
                    <?php foreach($banners[31] as $k => $banner): ?>    
                        <li class="<?= $k == 0 ? 'active' : null ?> to_animate" data-animation="fadeInUp">
                            <a href="#vertical-tab<?= $k ?>" role="tab" data-toggle="tab"><?= $banner->title ?></a>
                        </li>
                    <?php endforeach ?>   
                </ul>
            </div>
            <div class="col-sm-7">
                <!-- Tab panes -->
                <div class="tab-content no-border to_animate" data-animation="fadeInUp">
                    <?php foreach($banners[31] as $k => $banner): ?>
                        <div class="tab-pane fade <?= $k == 0 ? 'in active' : null ?>" id="vertical-tab<?= $k ?>">
                            <h3><?= $banner->title ?></h3>
                            <?= $banner->description ?>
                        </div>
                    <?php endforeach ?>  
                </div>
            </div>
        </div>
    </div>
</section>