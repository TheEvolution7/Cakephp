<?php echo $this->element('meta'); ?>
<div class="animsition">
    <div class="wrapper boxed">
        <?= $this->element('header') ?>
        <main class="page-header-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                        <div class="title-info"><?= $article->article_categories[0]->title ?></div>
                        <h1 class="display-1"><?= $article->title ?></h1>
                    </div>
                </div>
            </div>
        </main>
        <div class="page-content">
            <div class="primary">
                <div class="container">
                    <article class="post">
                        <div class="row">
                            <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                                <div class="posted-on">
                                    <a class="url fn n" href="#"></a>
                                    <?= $article->created->nice() ?>
                                </div>
                            </div>
                        </div>
                        <div class="entry-content">
                            <div class="row">
                                <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                                    <?= $article->content ?>
                                </div>
                            </div>
                            
                        </div>
                        <!-- <div class="entry-footer">
                            <div class="row">
                                <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                                    <div class="tags-links">
                                        <span>Tags:</span>
                                        <a href="">Inspiration</a>,
                                        <a href="">Workspace</a>,
                                        <a href="">Minimal</a>,
                                        <a href="">Decoation</a>
                                    </div>
                                    <div class="post-share">
                                        <span>Share:</span>
                                        <a href="" class="icon ion-social-facebook"></a>
                                        <a href="" class="icon ion-social-twitter"></a>
                                        <a href="" class="icon ion-social-pinterest"></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </article>
                    <!-- <section class="related-posts">
                        <div class="row">
                            <div class="col-xs-12">
                                <h6 class="related-post-title">Related Posts</h6>
                            </div>
                        </div>
                        <div class="news-carousel owl-carousel">
                            <div class="news-item">
                                <img alt="" src="images/news/1-370x370.jpg">
                                <div class="news-hover">
                                    <div class="hover-border">
                                        <div></div>
                                    </div>
                                    <div class="content">
                                        <div class="time">Dec 15th, 2016</div>
                                        <h3 class="news-title">Discover Architecture Of Bario</h3>
                                        <p class="news-description">Lorem ipsum dolor sit amet, consect etur
                                            adipiscing elit. Mauris vel auctorol est. Integer nunc ipsum...</p>
                                    </div>
                                    <a class="read-more" href="#">Continue</a>
                                </div>
                            </div>
                            <div class="news-item">
                                <img alt="" src="images/news/2-370x370.jpg">
                                <div class="news-hover">
                                    <div class="hover-border">
                                        <div></div>
                                    </div>
                                    <div class="content">
                                        <div class="time">Dec 15th, 2016</div>
                                        <h3 class="news-title">Discover Architecture Of Bario</h3>
                                        <p class="news-description">Lorem ipsum dolor sit amet, consect etur
                                            adipiscing elit. Mauris vel auctorol est. Integer nunc ipsum...</p>
                                    </div>
                                    <a class="read-more" href="#">Continue</a>
                                </div>
                            </div>
                            <div class="news-item">
                                <img alt="" src="images/news/3-370x370.jpg">
                                <div class="news-hover">
                                    <div class="hover-border">
                                        <div></div>
                                    </div>
                                    <div class="content">
                                        <div class="time">Dec 15th, 2016</div>
                                        <h3 class="news-title">Discover Architecture Of Bario</h3>
                                        <p class="news-description">Lorem ipsum dolor sit amet, consect etur
                                            adipiscing elit. Mauris vel auctorol est. Integer nunc ipsum...</p>
                                    </div>
                                    <a class="read-more" href="#">Continue</a>
                                </div>
                            </div>
                        </div>
                    </section> -->
                </div>
            </div>
        </div>

        <?= $this->element('footer') ?>
    </div>
</div>


