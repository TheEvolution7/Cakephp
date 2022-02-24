<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Founder</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">Founder</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="founder-page ls section_padding_top_150 columns_margin_0 columns_padding_0 section_padding_bottom_150">
    <div class="container">
        <div class="row box-fou">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="box-content">
                    <div class="thumb-founder to_animate" data-animation="fadeInUp">
                        <img src="<?= $this->Url->build('/uploads/banners/'.$banners[30][0]->id . DS . $banners[30][0]->image) ?>" alt="<?= $banners[30][0]->title ?>">
                    </div>
                    <br>
                        <div class=" to_animate" data-animation="fadeInUp">
                            <?= $banners[30][0]->description ?>
                        </div>
                    <p class=" to_animate" data-animation="fadeInUp">
                        <img src="<?= $this->Url->build('/uploads/banners/'.$banners[30][1]->id . DS . $banners[30][1]->image) ?>" alt="<?= $banners[30][1]->title ?>"  class="thumb-signature">
                    </p>
                    <p>
                        <div class=" to_animate" data-animation="fadeInUp">
                            <?= $banners[30][0]->title ?>
                        </div>
                        
                        <br>
                        <div class=" to_animate" data-animation="fadeInUp">
                            <span>
                            <?= $banners[30][0]->url ?>
                            </span>
                        </div>
                        
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
