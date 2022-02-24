<?php 
    echo $this->element('meta');
    $banners = $this->getCache('banners_' . $configs['language']); 
?>

<!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[70][0]->id . DS . $banners[70][0]->image) ?>)">
        </div>
        <div class="page-header-border"></div>
        <div class="page-header-border page-header-border-two"></div>
        <div class="page-header-border page-header-border-three"></div>
        <div class="page-header-border page-header-border-four"></div>
        <div class="page-header-border page-header-border-five"></div>
        <div class="page-header-border page-header-border-six"></div>

        <div class="page-header-shape-1"></div>
        <div class="page-header-shape-2"></div>
        <div class="page-header-shape-3"></div>

        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                    <li><a href="<?= $this->Url->build(['action' => 'projects']) ?>">Projects</a></li>
                    <li class="active"><?= $article->title ?></li>
                </ul>
                <h2><?= $article->title ?></h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <img src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image) ?>" alt="">
                            <div class="blog-details__date-box">
                                <p><?= $article->created->format('d') . '<br>' .  $article->created->format('M')?></p>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                                <li><a href=""><i class="far fa-folder-open"></i><?= $article->article_categories[0]->title ?></a></li>
                            </ul>
                            <h3 class="blog-details__title wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms"><?= $article->title ?></h3>
                            <?= $article->content ?>
                        </div>
                        <div class="blog-details__bottom">
                            <!-- <p class="blog-details__tags">
                                <span>Tags</span>
                                <a href="#">Marketing</a>
                                <a href="#">performance</a>
                            </p> -->
                            <div class="blog-details__social-list wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                                <p class="me-4">Share: </p>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <!-- <div class="comment-one">
                            <h3 class="comment-one__title">2 Comments</h3>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="assets/images/blog/comment-1-1.jpg" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin Martin</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic
                                        typesetting unchanged. It was popularised in the sheets containing lorem
                                        ipsum is simply free text.</p>
                                    <a href="" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="assets/images/blog/comment-1-2.jpg" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>sarah albert</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic
                                        typesetting unchanged. It was popularised in the sheets containing lorem
                                        ipsum is simply free text.</p>
                                    <a href="" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h3 class="comment-form__title">Leave a Comment</h3>
                            <form action="assets/inc/sendemail.php" class="comment-one__form contact-form-validated"
                                novalidate="novalidate">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Your name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email address" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <textarea name="message" placeholder="Write a message"></textarea>
                                        </div>
                                        <button type="submit" class="thm-btn comment-form__btn">submit
                                            comment</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">

                        <div class="sidebar__single sidebar__post wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <h3 class="sidebar__title">Latest Posts</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                <?php foreach ($articles as $art): ?>
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="<?= $this->Url->build('/uploads/articles/' . $art->id . DS . $art->image) ?>" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <!-- <span class="sidebar__post-content-meta"><i
                                                        class="far fa-comments"></i>02 Comments</span> -->
                                                <a href="<?= $this->Url->build(['action' => 'articleDetails', $art->slug, $art->id]) ?>"><?= $art->title ?></a>
                                            </h3>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <!-- <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">Tags</h3>
                            <div class="sidebar__tags-list">
                                <a href="#">Marketing</a>
                                <a href="#">performance</a>
                                <a href="#">digital</a>
                                <a href="#">Engagement</a>
                                <a href="#">businesses</a>
                            </div>
                        </div> -->
                        <!-- <div class="sidebar__single sidebar__comments">
                            <h3 class="sidebar__title">comments</h3>
                            <ul class="sidebar__comments-list list-unstyled">
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A Wordpress Commenter <br> on Launch New Mobile App</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>John Doe on Template:</p>
                                        <h5>Comments</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A Wordpress Commenter <br> on Launch New Mobile App</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>John Doe on Template:</p>
                                        <h5>Comments</h5>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>