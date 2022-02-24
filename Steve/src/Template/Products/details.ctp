<?= $this->element('meta') ?>
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Product Details</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'index']) ?>">
                            Products
                        </a>
                    </li>
                    <li class="active">Product Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="ls section_padding_top_100 section_padding_bottom_75">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="product_detail_image to_animate" data-animation="fadeInUp">
                    <div class="swiper-container gallery-pro-top">
                        <div class="swiper-wrapper">
                    <?php $images = explode('|', $product->images); unset($images[count($images) - 1]) ?>
                        <?php foreach ($images as $image): ?>
                            <div class="swiper-slide">
                                <div class="entry-thumbnail2">
                                    <img src="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $image) ?>" alt="<?= $product->title ?>">
                                </div>
                            </div>
                        <?php endforeach ?>                  
                        </div>
                    </div>
                    <div class="swiper-container gallery-pro-thumbs">
                        <div class="swiper-wrapper">
                        <?php foreach ($images as $image): ?>
                            <div class="swiper-slide">
                                <div class="thumb-pro">
                                    <img src="<?= $this->Url->build('/uploads/products/' . DS . $product->id . DS . $image) ?>" alt="<?= $product->title ?>">
                                </div>
                            </div>
                        <?php endforeach ?>                                   
                        </div>
                    </div>
                </div>
                <!-- .with_background -->
                <div class="woocommerce-tabs to_animate" data-animation="fadeInUp">


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs wc-tabs" role="tablist">
                        <li class="active">
                            <a href="#details_tab" role="tab" data-toggle="tab">Details</a>
                        </li>
                        <li>
                            <a href="#additional_tab" role="tab" data-toggle="tab">Additional</a>
                        </li>
                        <!-- <li>
                            <a href="#reviews_tab" role="tab" data-toggle="tab">Reviews</a>
                        </li> -->
                        <li>
                            <a href="#custom_tab" role="tab" data-toggle="tab">Custom</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content top-color-border">
                        <div class="tab-pane fade in active" id="details_tab">
                            <?= $product->content ?>
                        </div>
                        <div class="tab-pane fade" id="additional_tab">

                            <table class="table table-striped topmargin_30">

                                <tr>
                                    <th class="grey">Product title:</th>
                                    <td><?= $product->title ?></td>
                                </tr>

                                <tr>
                                    <th class="grey">Item SKU:</th>
                                    <td><?= empty($product->sku) ? 'null' : $product->sku ?></td>
                                </tr>

                                <tr>
                                    <th class="grey">Brand:</th>
                                    <td>
                                        <a href="#"><?= empty($product->brand) ? 'null' : $product->brand->title ?></a>
                                    </td>
                                </tr>
                            <?php foreach($product->attribute_values as $attr): ?>
                                <tr>
                                    <th class="grey"><?= $attr->title ?>:</th>
                                    <td><?= $attr->color ?></td>
                                </tr>
                            <?php endforeach ?>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="reviews_tab">

                            <div class="comments-area" id="comments">
                                <ol class="comment-list">
                                    <li class="comment even thread-even depth-1 parent">
                                        <article class="comment-body media">
                                            <div class="media-left">
                                                <img class="media-object" alt="" src="<?= $webroot ?>images/team/01.jpg">
                                            </div>
                                            <div class="media-body">
                                                <span class="reply greylinks">
                                                    <a href="#respond">
                                                        <i class="fa fa-reply"></i>
                                                    </a>
                                                </span>
                                                <div class="comment-meta darklinks">
                                                    <a class="author_url" rel="external nofollow" href="#">Alan Smith</a>
                                                    <span class="comment-date">
                                                        <time datetime="2017-01-08T15:05:23+00:00" class="entry-date">December 26, 2016</time>
                                                    </span>
                                                </div>
                                                <p>First Level Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                            </div>
                                        </article>
                                        <!-- .comment-body -->

                                        <ol class="children">
                                            <li class="comment byuser odd alt depth-2 parent">
                                                <article class="comment-body media">
                                                    <div class="media-left">
                                                        <img class="media-object" alt="" src="<?= $webroot ?>images/team/02.jpg">
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="reply greylinks">
                                                            <a href="#respond">
                                                                <i class="fa fa-reply"></i>
                                                            </a>
                                                        </span>
                                                        <div class="comment-meta darklinks">
                                                            <a class="author_url" rel="external nofollow" href="#">Alan Smith</a>
                                                            <span class="comment-date">
                                                                <time datetime="2017-01-08T15:05:23+00:00" class="entry-date">December 26, 2016</time>
                                                            </span>
                                                        </div>
                                                        <p>Second Level Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                    </div>
                                                </article>
                                                <!-- .comment-body -->

                                                <ol class="children">
                                                    <li class="comment byuser even depth-3">
                                                        <article class="comment-body media">
                                                            <div class="media-left">
                                                                <img class="media-object" alt="" src="<?= $webroot ?>images/team/03.jpg">
                                                            </div>
                                                            <div class="media-body">
                                                                <span class="reply greylinks">
                                                                    <a href="#respond">
                                                                        <i class="fa fa-reply"></i>
                                                                    </a>
                                                                </span>
                                                                <div class="comment-meta darklinks">
                                                                    <a class="author_url" rel="external nofollow" href="#">Alan Smith</a>
                                                                    <span class="comment-date">
                                                                        <time datetime="2017-01-08T15:05:23+00:00" class="entry-date">December 26, 2016</time>
                                                                    </span>
                                                                </div>
                                                                <p>Third Level Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                            </div>
                                                        </article>
                                                        <!-- .comment-body -->
                                                    </li>
                                                    <!-- #comment-## -->
                                                </ol>
                                                <!-- .children -->
                                            </li>
                                            <!-- #comment-## -->
                                        </ol>
                                        <!-- .children -->
                                    </li>
                                    <!-- #comment-## -->

                                </ol>
                                <!-- .comment-list -->
                            </div>
                            <!-- #comments -->

                            <div class="comment-respond" id="respond">
                                <h3>Write Your Own Review</h3>
                                <div>
                                    <span class="grey">Your rating:</span>
                                    <p class="stars">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </p>
                                </div>

                                <form class="comment-form" id="commentform" method="post" action="index.html">
                                    <div class="row columns_margin_bottom_30">
                                        <div class="col-md-6">
                                            <p class="comment-form-author">
                                                <label for="author">Name
                                                    <span class="required">*</span>
                                                </label>
                                                <!-- <i class="rt-icon2-user-outline"></i> -->
                                                <input type="text" aria-required="true" size="30" value="" name="author" id="author" class="form-control" placeholder="Full Name">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="comment-form-email">
                                                <label for="comment_email">Email
                                                    <span class="required">*</span>
                                                </label>
                                                <!-- <i class="rt-icon2-mail2"></i> -->
                                                <input type="email" aria-required="true" size="30" value="" name="comment_email" id="comment_email" class="form-control" placeholder="Emain Address">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-chat">
                                                <label for="comment">Comment</label>
                                                <!-- <i class="rt-icon2-pencil3"></i> -->
                                                <textarea aria-required="true" rows="1" cols="45" name="comment" id="comment" class="form-control" placeholder="Your Comment"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="form-submit topmargin_30">
                                        <button type="submit" id="submit" name="submit" class="theme_button color1">Send Commnet</button>
                                        <button type="reset" id="reset" class="theme_button">Clear Form</button>
                                    </p>
                                </form>
                            </div>
                            <!-- #respond -->
                        </div>
                        <div class="tab-pane fade" id="custom_tab">
                            <p><?= $product->description ?></p>
                        </div>
                    </div>
                    <!-- eof .tab-content -->
                </div>
                <!-- .woocommerce-tabs -->
            </div>
            <!--eof .col-sm-8 (main content)-->
        </div>
    </div>
</section>