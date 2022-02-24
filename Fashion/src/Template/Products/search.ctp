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
          <h2 class="title">Search Products</h2>
              <div class="bread-crumbs">
                  <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                  <span class="active">Search Products</span>
                  <br>
                  <?= __('Search results for') ?> <span class="active">"<?= $_GET['keyword'] ?>"</span> <br> Results : <span class="active"><?= count($products) ?></span>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!--== End Page Title Area ==-->
    <form method="get">
      <!--== Start Product Area Wrapper ==-->
      <section class="product-area product-shop-inner-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="inner-left-padding">
                <div class="row row-gutter-60">
                <?php foreach ($products as $product): ?>
                  <div class="col-sm-6 col-md-4">
                    
                    <!-- Start Product Item -->
                    <div class="product-item hover-effect effect-style1">
                      <div class="product-thumb">
                        <a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$product->slug,$product->id]) ?>">
                          <img src="<?= $this->Url->build('/uploads/products/'.$product->id.'/'.$product->image) ?>" alt="<?= $product->title ?>">
                          <span class="thumb-overlay"></span>
                          <div class="effect-content"></div>
                        </a>
                      </div>
                      <div class="product-info _2">
                        <div class="content-inner">
                          <h4 class="title"><a href="<?= $this->Url->build(['controller' => 'Products','action' =>'details',$product->slug,$product->id]) ?>"><?= $product->title ?></a></h4>
                          <div class="prices">
                            <span class="price"><?= $this->getConfigure('Core')['setting']['currency'],$product->price ?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Product Item -->
                  </div>
                <?php endforeach ?>
                </div>
                <div class="pagination-area">
                  <nav>
                    <ul class="page-numbers"> 
                        <?php if ($this->Paginator->numbers()): ?>
                          <?php
                              $this->Paginator->templates([
                                  'nextDisabled' => '<li><a  class="page-number next" disabled="disabled">{{text}}</a></li>',
                                  'nextActive' => '<li><a  class="page-number next" href="{{url}}">{{text}}</a></li>',
                                  'number' => '<li><a class="page-number" href="{{url}}">{{text}}</a></li>',
                                  'current' => '<li><a class="page-number active" href="">{{text}}</a></li>',
                              ]);
                          ?>
                        
                                  <?= $this->Paginator->numbers([
                                      'modulus' => 2,
                                      'first' => 1,
                                      'last' => 1
                              ]) ?>
                          <?= $this->Paginator->next('<i class="icofont-long-arrow-right"></i>', ['escape' => false ]) ?>
                        <?php endif; ?>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
    
      <!--== End Product Area Wrapper ==-->
      </main>