<?php 
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>New Detail</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'news']) ?>">News</a>
                    </li>
                    <li class="active">New Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="ls section_padding_top_150 section_padding_bottom_150">
    <div class="container">
        <div class="row">

            <div class="col-sm-7 col-md-8 col-lg-8 to_animate" data-animation="fadeInUp">

                <article class="single-post vertical-item content-padding with_border ">
                    <div class="entry-thumbnail item-media">
                        <img src="<?= $this->Url->build('/uploads/articles/'.$new->id. DS . $new->image) ?>" alt="<?= $new->title ?>">
                    </div>
                    <div class="item-content top-zebra-border">

                        <header class="entry-header content-justify">
                            <h3 class="entry-title">
                                <a href="blog-single-right.html" rel="bookmark"><?= $new->title ?></a>
                            </h3>
                            <a href="#" class="entry-author">by <?= $new->user->full_name ?></a>
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <?= $new->content ?>
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .item-content -->

                </article>
        

            </div>


            <aside class="col-sm-5 col-md-4 col-lg-4">
                <!-- <div class="widget widget_mailchimp">
                    <h3 class="widget-title text-center">
                        <strong>Newsletter</strong>
                    </h3>
                    <hr class="divider_30_3 zebra_bg">
                    <form action="<?= $this->Url->build(['controller' => 'Pages','action' => 'newsletter']) ?>" method="post">
                        <div class="form-group">
                            <input name="email" type="email" class="mailchimp_email form-control" placeholder="Enter your email" required>
                        </div>
                        <button type="submit" class="theme_button">Send</button>
                        <div class="response"></div>
                    </form>
                    <p class="topmargin_10">Subscribe to our Newsletter right now to be updated. We promice not to spam!</p>
                </div> -->
                <div class="widget widget_recent_posts">

                    <h3 class="widget-title text-center to_animate" data-animation="fadeInUp">Recent
                        <strong>Posts</strong>
                    </h3>
                    <hr class="divider_30_3 zebra_bg">
                    <ul class="media-list">
                    <?php foreach($recent_post as $post): ?>
                        <li class=" to_animate" data-animation="fadeInUp">
                            <h4>
                                <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'newDetails',$post->slug,$post->id]) ?>"><?= $post->title ?></a>
                            </h4>
                            <p><?= $post->description ?></p>
                            <div class="content-justify">
                                <div class="entry-date small-text">
                                    <time class="entry-date" datetime="2021-07-13T08:50:40+00:00">
                                        <?= $post->created->format('M d,Y') ?>
                                    </time>
                                </div>
                                <a href="#" class="entry-author">by <?= $new->user->full_name ?></a>
                            </div>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </aside>
            <!-- eof aside sidebar -->
        </div>
    </div>
</section>