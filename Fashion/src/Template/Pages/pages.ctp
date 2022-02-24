<main class="main-content">
<section class="page-title-area">
  <div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="page-title-content">
        <h2 class="title"><?= $page->title ?></h2>
            <div class="bread-crumbs">
              <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
              <span class="active"><?= $page->title ?></span>
            </div>
        </div>
    </div>
    </div>
  </div>
</section>
<section class="faq-area">
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10 col-12">
        <div class="rte">
          <?= $page->description ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</main>