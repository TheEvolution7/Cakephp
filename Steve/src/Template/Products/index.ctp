<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Products</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">Products</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="product ls section_padding_top_100 section_padding_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate animated fadeInUp" data-animation="fadeInUp">
                <h2 class="section_header" style="padding-bottom: 20px"> <?= $banners[38][0]->title ?></h2>
                <p class="small-text" style="text-transform: unset">
                   <?= $banners[38][0]->description ?>
                </p>
                <hr class="divider_30_3 zebra_bg">
            </div>
        <?php foreach($products as $product): ?>
            <div class="col-md-4 to_animate" data-animation="fadeInUp">
                <div class="item-media">
                    <div class="thumb-pro">
                        <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'details',$product->slug,$product->id]) ?>">
                            <img src="<?= $this->Url->build('/uploads/products/'.$product->id . DS . $product->image) ?>" alt="<?= $product->title ?>">
                        </a>
                    </div>
                </div>
                <h3>
                    <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'details',$product->slug,$product->id]) ?>"><?= $product->title ?></a>
                </h3>
            </div>
        <?php endforeach ?>
        </div>
        <div class="row topmargin_40">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <ul class="pagination">
                    <?php if ($this->Paginator->numbers()): ?>
                        <?php
                            $this->Paginator->templates([
                                'nextDisabled' => '<li><a disabled="disabled">{{text}}</a></li>',
                                'nextActive' => '<li><a href="{{url}}">{{text}}</a></li>',
                                'prevActive' => '<li><a href="{{url}}">{{text}}</a></li>',
                                'prevDisabled' => '<li><a disabled="disabled">{{text}}</a></li>',
                                'number' => '<li><a href="{{url}}">{{text}}</a></li>',
                                'current' => '<li class="active"><a href="">{{text}}</a></li>',
                            ]);
                        ?>
                        <?= $this->Paginator->prev('<span class="sr-only">Prev</span><i class="fa  fa-angle-left"></i>',  ['escape' => false ]) ?>
                                <?= $this->Paginator->numbers([
                                    'modulus' => 2,
                                    'first' => 1,
                                    'last' => 1
                            ]) ?>
                        <?= $this->Paginator->next('<span class="sr-only">Next</span><i class="fa fa-angle-right"></i>', ['escape' => false ]) ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
