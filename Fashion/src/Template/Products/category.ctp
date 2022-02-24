<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
    $requestQuery = $this->request->getQuery();
?>
<main class="main-content">
<!--== Start Page Title Area ==-->
  <section class="page-title-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-title-content">
          <h2 class="title">Products</h2>
              <div class="bread-crumbs">
                  <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">Home<span class="breadcrumb-sep">></span></a>
                  <span class="active">Products</span>
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
            <!-- <div class="col-lg-3 order-1 order-lg-0">
              <div class="sidebar-area inner-right-padding shop-sidebar-area">
                <div class="widget">
                  <div class="widget-custom-menu">
                    <ul>
                      <li class="has-sub">
                        <a class="title" data-bs-toggle="collapse" href="#has-sub3" role="button" aria-expanded="false"
                          aria-controls="has-sub3">Size</a>
                        <div class="collapse show widget-size-menu" id="has-sub3">
                      
                          <div class="single-product-info" style="padding-left: 0">
                              <div class="product-action-size">
                                <ul style="margin-left: 0">
                                  <li>
                                    <input type="radio" name="attributes[size][value]" value="10" id="size-0" checked="">
                                    <label for="size-0" class="ht-tooltip" data-tippy-content="10" tabindex="0">10</label>
                                    
                                  </li>
                                  <li>
                                    <input type="radio" name="attributes[size][value]" value="12" id="size-1" checked="">
                                    <label for="size-1" class="ht-tooltip" data-tippy-content="12" tabindex="0">12</label>
                                    
                                  </li>
                                  <li>
                                    <input type="radio" name="attributes[size][value]" value="14" id="size-2" checked="">
                                    <label for="size-2" class="ht-tooltip" data-tippy-content="14" tabindex="0">14</label>
                                    
                                  </li>
                                  <li>
                                    <input type="radio" name="attributes[size][value]" value="16" id="size-3" checked="">
                                    <label for="size-3" class="ht-tooltip" data-tippy-content="16" tabindex="0">16</label>
                                    
                                  </li>
                                </ul>
                              </div>
                          </div>
                        
                            
                              <?php foreach($size as $key => $s): ?>
                                <label><input type="checkbox" value="<?= $key ?>" name="size" <?= isset($requestQuery['size']) && $requestQuery['size'] == $key ? 'checked' : null ?> onchange="this.form.submit()"><span class="fa fa-check"></span><?= $s ?></label>
                              <?php endforeach  ?>
                        </div>
                      </li>
                      <li class="has-sub">
                        <a class="title" data-bs-toggle="collapse" href="#has-sub3" role="button" aria-expanded="false"
                          aria-controls="has-sub3">Size</a>
                        <div class="collapse show widget-size-menu" id="has-sub3">
                      
                          <div class="single-product-info" style="padding-left: 0">
                              <div class="product-action-size">
                                <ul style="margin-left: 0">
                                  <li>
                                    <input type="radio" name="attributes[size][value]" value="10" id="size-0" checked="">
                                    <label for="size-0" class="ht-tooltip" data-tippy-content="10" tabindex="0">10</label>
                                    
                                  </li>
                                  <li>
                                    <input type="radio" name="attributes[size][value]" value="12" id="size-1" checked="">
                                    <label for="size-1" class="ht-tooltip" data-tippy-content="12" tabindex="0">12</label>
                                    
                                  </li>
                                  <li>
                                    <input type="radio" name="attributes[size][value]" value="14" id="size-2" checked="">
                                    <label for="size-2" class="ht-tooltip" data-tippy-content="14" tabindex="0">14</label>
                                    
                                  </li>
                                  <li>
                                    <input type="radio" name="attributes[size][value]" value="16" id="size-3" checked="">
                                    <label for="size-3" class="ht-tooltip" data-tippy-content="16" tabindex="0">16</label>
                                    
                                  </li>
                                </ul>
                              </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-lg-12">
              <div class="inner-left-padding">
                <div class="shop-toolbar-wrap">
                  <div class="shop-toolbar-left">
                    <div class="product-showing-status">
                      <p class="count-result"><?= $this->Paginator->counter(['format' => ('Showing 1-{{current}} of {{count}} products')]) ?></p>
                    </div>
                  </div>
                  <div class="shop-toolbar-right">
                    <div class="product-sorting-menu product-view-count">
                        <?= $this->Form->select('show',[12 => 'Show 12',15 => 'Show 15',30 => 'Show 30'],
                            [
                                'value' => isset($requestQuery['show']) ? $requestQuery['show'] : null,
                                'onchange' => 'this.form.submit()',
                            ]); ?>
                     
                    </div>
                    <div class="product-sorting-menu product-sorting"> 
                        <?= $this->Form->control('size', [
                                'options'       => $size,
                                'div'           => false,
                                'label'         => false,
                                'hiddenField'   => false,
                                'empty'         => 'Select Size',
                                'onchange' => 'this.form.submit()',
                                'value' => !empty($requestQuery['size']) ? $requestQuery['size'] : null,
                          ]);
                        ?>     
                    </div>
                    <div class="product-sorting-menu product-sorting">
                        <?= $this->Form->select('sort-by',['created-asc' => 'Date, old to new','created-desc' => 'Date, new to old','price-asc' => 'Price, low to high','price-desc' => 'Price, high to low'],
                            [
                                'value' => isset($requestQuery['sort-by']) ? $requestQuery['sort-by'] : null,
                                'empty' => 'Sort by Default',
                                'onchange' => 'this.form.submit()',
                            ]); ?>
                      
                    </div>
                  </div>
                </div>
                <div class="row row-gutter-60">
                <?php foreach ($products as $product): ?>
                  <div class="col-sm-6 col-md-4 col-lg-3">
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
                          <div class="product-action-size">
                            <ul>
                            <?php foreach($product->attribute_values as $att): ?>
                              <li>
                                <label for="size-1"  data-tippy-content="8" tabindex="0"><?= $att->title ?></label>
                              </li>
                            <?php endforeach ?>
                            </ul>
                          </div>
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
