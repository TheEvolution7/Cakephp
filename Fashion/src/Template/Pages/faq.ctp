<?php  
$banners = $this->getCache('banners_' . $configs['language']);
echo $this->element('meta');
?>
<main class="main-content">
    <!--== Start Page Title Area ==-->

<section class="page-title-area">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="page-title-content">
            <h2 class="title">Frequently Asked Questions</h2>
                <div class="bread-crumbs">
                    <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                    <span class="active">FAQs</span>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
    <!--== End Page Title Area ==-->

<!--== Start Divider Area ==-->
<section class="faq-area">
    <div class="container">
    <div class="row row-gutter-90">
        <div class="col-md-6">
        <div class="section-title">
            <h2 class="title">Shopping Information</h2>
        </div>
        <div class="accordian-content">
            <div class="accordion" id="accordionExample">
        <?php foreach($shoping as $k => $shop): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?= $k ?>">
                <button class="accordion-button <?= $k == 0 ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $k ?>" aria-expanded="<?= $k == 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $k ?>"><?= $shop->title ?></button>
                </h2>
                <div id="collapse<?= $k ?>" class="accordion-collapse collapse <?= $k == 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $k ?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?= $shop->description ?>
                </div>
                </div>
            </div>
        <?php endforeach ?>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="section-title mt-sm-50">
            <h2 class="title">Payment Information</h2>
        </div>
        <div class="accordian-content">
            <div class="accordion" id="accordionExample2">
            <?php foreach($payment as $k => $pay): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?= $k ?>">
                <button class="accordion-button <?= $k == 0 ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $k ?>" aria-expanded="<?= $k == 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $k ?>"><?= $pay->title ?></button>
                </h2>
                <div id="collapse<?= $k ?>" class="accordion-collapse collapse <?= $k == 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $k ?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?= $pay->description ?>
                </div>
                </div>
            </div>
        <?php endforeach ?>
           
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!--== End Divider Area ==-->
</main>