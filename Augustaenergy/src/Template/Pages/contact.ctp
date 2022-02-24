<?php 
    echo $this->element('meta');
    $banners = $this->getCache('banners_' . $configs['language']); 
?>
<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[69][0]->id . DS . $banners[69][0]->image) ?>)">
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
                <li class="active"><?= $banners[69][0]->title ?></li>
            </ul>
            <h2><?= $banners[69][0]->description ?></h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Info Start-->
<section class="contact-info">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <!--Contact Info Single-->
                <div class="contact-info__single">
                    <div class="contact-info__icon">
                        <span class="icon-conversation"></span>
                    </div>
                    <h3 class="contact-info__title"><?= $banners[69][1]->title ?></h3>
                    <p class="contact-info__text"><?= $banners[69][1]->description ?></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                <!--Contact Info Single-->
                <div class="contact-info__single">
                    <div class="contact-info__icon">
                        <span class="icon-address"></span>
                    </div>
                    <h3 class="contact-info__title"><?= $banners[69][2]->title ?></h3>
                    <p class="contact-info__text"><?= $banners[69][2]->description ?>
                    </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                <!--Contact Info Single-->
                <div class="contact-info__single">
                    <div class="contact-info__icon">
                        <span class="icon-contact"></span>
                    </div>
                    <h3 class="contact-info__title"><?= $banners[69][3]->title ?></h3>
                    <h4>
                        <a href="mailto:contact@augusteint.com"
                            class="contact-info__mail"><?= $banners[69][3]->description ?></a>
                        <a href="tel:<?= $banners[69][3]->url ?>" class="contact-info__phone">+ <?= $banners[69][3]->url ?></a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Info End-->

<!--contact Page Start-->
<section class="contact-page contact-page-two">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline"><?= $banners[69][4]->title ?></span>
            <h2 class="section-title__title"><?= $banners[69][4]->description ?></h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-page__form">
                    <?= $this->Form->create($contact, ['class' => 'comment-one__form']) ?>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <?= $this->Form->text('name', ['required', 'placeholder' => 'Name*']) ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <?= $this->Form->text('email', ['type' => 'email', 'required', 'placeholder' => 'Email*']) ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <?= $this->Form->text('phone', ['required', 'placeholder' => 'Phone*']) ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <?= $this->Form->text('title', ['required', 'placeholder' => 'Subject*']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <?= $this->Form->textarea('content', ['required', 'placeholder' => 'Message*']) ?>
                                </div>
                                <button type="submit" class="thm-btn comment-form__btn">send a message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--contact Page End-->

<!--Google Map Start-->
<!-- <section class="google-map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
        class="google-map__one" allowfullscreen></iframe>

</section> -->

<!--Qutiiz Ready Two-->
<section class="qutiiz-ready-two">
    <div class="qutiiz-ready-two-bg-box wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
        <div class="qutiiz-ready-two-bg jarallax" data-jarallax data-speed="-0.2" data-imgPosition="50% 0%"
            style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[59][0]->id . DS . $banners[59][0]->image) ?>)"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="qutiiz-ready-two__inner wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <h2 class="qutiiz-ready-two__title"><?= $banners[59][0]->title ?></h2>
                    <a href="<?= $this->Url->build(['action' => 'about']) ?>" class="qutiiz-ready-two__btn thm-btn"><?= $banners[59][0]->description ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Qutiiz Ready End-->
