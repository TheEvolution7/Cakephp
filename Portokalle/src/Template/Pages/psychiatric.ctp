<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
    <div class="outer__container">
        <div class="main2 container-banner">
            <div class="box-slide-home" data-aos="animation-translate-up" data-aos-delay="300">
                <div class="banner__slide">
                    <div class="banner-item">
                        <img src="<?= $this->Url->build('/uploads/banners/' . $banners[93][0]->id . DS . $banners[93][0]->image ) ?>" alt="<?= $banners[93][0]->title ?>">
                    </div>
                </div>
            </div>
            <div class="main2__center center content-banner">
                <div class="main2__wrap" data-aos="animation-scale-top" data-aos-delay="300">
                    <h1 class="main2__title h4" data-aos="animation-scale-top"><?= $banners[93][0]->title ?></h1>
                    <div class="main2__info info" data-aos="animation-scale-top" data-aos-delay="300">
                    <?= $banners[93][0]->description ?>
                    </div>
                    <div class="main2__btns" data-aos="animation-scale-top" data-aos-delay="500">
                        <a href="<?= $banners[93][0]->url ?>" type="submit" class="main2__btn btn btn_blue">Get Started Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="advantages2 how-it-section bg-2">
            <div class="advantages2__center center">
                <h2 class="how__title h2" data-aos="animation-scale-top"><?= $banners[94][0]->title ?></h2>
            </div>
        </div>
        <div class="advantages how-it-section_bg bg-2">
            <div class="advantages__center center">
                <div class="advantages__row">
                    <div class="advantages__bg"><img class="some-icon" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[94][1]->id . DS . $banners[94][1]->image ) ?>"
                        src="<?= $this->Url->build('/uploads/banners/' . $banners[94][1]->id . DS . $banners[94][1]->image ) ?>" alt="<?= $banners[94][1]->title ?>">
                    </div>
                    <div class="advantages__wrap">
                        <h5 class="advantages__title h5" data-aos="animation-scale-top"><?= $banners[94][1]->title ?></h5>
                        <div class="advantages__info info" data-aos="animation-scale-top">
                            <?= $banners[94][1]->description ?>
                        </div>
                        <a href="<?= $banners[94][1]->url ?>" class="faq__btn btn btn_blue-light" data-aos="animation-scale-top">Get started</a>
                    </div>
                </div>
                <div class="advantages__row">
                <div class="advantages__bg">
                <div class="advantages__group">
                    <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[63][0]->id . DS . $banners[63][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[63][0]->id . DS . $banners[63][0]->image ) ?>" alt="<?= $banners[63][0]->title ?>"></div>
                    <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[63][1]->id . DS . $banners[63][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[63][1]->id . DS . $banners[63][1]->image ) ?>" alt="<?= $banners[63][1]->title ?>"></div>
                </div>
                </div>
                <div class="advantages__wrap">
                <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[63][0]->title ?></h3>
                <div class="advantages__info info" data-aos="animation-scale-top">
                    <?= $banners[63][0]->description ?>
                </div>
                <a href="<?= $banners[63][0]->url ?>" class="advantages__btn btn btn_blue" data-aos="animation-scale-top">Get started</a>
                </div>
            </div>
            <div class="advantages__row">
                <div class="advantages__bg">
                <div class="advantages__group">
                    <div class="advantages__preview"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[64][0]->id . DS . $banners[64][0]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[64][0]->id . DS . $banners[64][0]->image ) ?>" alt="<?= $banners[64][0]->title ?>"></div>
                    <div class="advantages__preview" data-aos="animation-translate-up" data-aos-offset="0"><img class="some-icon bubble-img" srcset="<?= $this->Url->build('/uploads/banners/' . $banners[64][1]->id . DS . $banners[64][1]->image ) ?>" src="<?= $this->Url->build('/uploads/banners/' . $banners[64][1]->id . DS . $banners[64][1]->image ) ?>" alt="<?= $banners[64][1]->title ?>"></div>
                </div>  
                </div>
                <div class="advantages__wrap">
                <h3 class="advantages__title h3" data-aos="animation-scale-top"><?= $banners[64][0]->title ?> </h3>
                <div class="advantages__info info" data-aos="animation-scale-top">   
                    <?= $banners[64][0]->description ?> 
                </div>
                <a href="<?= $banners[64][0]->url ?> " class="advantages__btn btn btn_blue-light" data-aos="animation-scale-top">Get started</a>
                </div>
            </div>
            </div>
        </div>
        <div class="faq bg-3">
            <div class="faq__center center">
                <div class="faq__top">
                <h2 class="faq__title h2" data-aos="animation-scale-top"><?= $banners[92][0]->title ?></h2>   
                </div>
                <div class="faq__row">
                <div class="faq__col">
                <?php foreach($banners[95] as $k => $banner): if($k%2 == 0): ?>
                    <div class="faq__item">
                    <div class="faq__head"><?= $banner->title ?></div>
                    <div class="faq__body"><?= $banner->description ?></div>
                    </div>
                <?php endif;endforeach ?> 
                </div>
                <div class="faq__col">
                <?php foreach($banners[95] as $k =>  $banner): if($k%2 != 0): ?>
                <div class="faq__item">
                <div class="faq__head"><?= $banner->title ?></div>
                    <div class="faq__body"><?= $banner->description ?></div>
                </div>
                <?php endif;endforeach ?> 
                </div>

                </div>
            </div>
        </div>

        <div class="blog blog_all">
            <div class="blog__head">
                <div class="blog__center center">
                    <h2 class="blog__title h2" data-aos="animation-scale-top"><?= $banners[92][1]->title ?></h2>
                </div>
            </div>
            <div class="blog__body">
                <div class="blog__center center">
                    <div class="blog__list">
                    <?php foreach($articles as $article): ?>
                        <a class="blog__item blog__item_article" href="#">
                            <div class="blog__preview"><img srcset="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image ) ?>"
                                    src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image ) ?>" alt="<?= $article->title ?>"></div>
                            <div class="blog__details">
                                <div class="blog__line">
                                    <div class="blog__category">Healthy</div>
                                    <div class="blog__time"><?= $article->created->format('d M Y') ?></div>
                                    <div class="blog__like">50</div>
                                </div>
                                <div class="blog__subtitle"><?= $article->title ?></div>
                                <div class="blog__text"><?= $article->description ?></div>
                                <div class="more">Read more
                                    <svg class="icon icon-arrow-right">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>   
                    </div>
                </div>
            </div>
        </div>
        <div class="banner cta-section">
        <div class="banner__center center"><a class="banner__wrap" href="<?= $banners[15][0]->url ?>" style="background-image: url('<?= $this->Url->build('/uploads/banners/' . $banners[15][0]->id . DS . $banners[15][0]->image ) ?>');">
            <div class="banner__title h4"><?= $banners[15][0]->title ?></div>
            <div class="banner__btn btn btn_blue"><?= $banners[15][0]->description ?></div></a></div>
        </div>
    </div>