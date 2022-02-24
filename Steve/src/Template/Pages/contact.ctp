<?php 
$banners = $this->getCache('banners_' . $configs['language']);
echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Contact</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">Contact</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section id="map" class="ls to_animate" data-animation="fadeInUp" data-address="sydney, australia, Liverpool street">
    <!-- marker description and marker icon goes here -->
    <div class="map_marker_description">
        <?= $banners[18][0]->description ?>
    </div>
</section>

<section class="ls section_padding_top_100 section_padding_bottom_100">
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                <h2 class="section_header to_animate" data-animation="fadeInUp"><?= $banners[18][4]->title ?>
                </h2>

                <form class=" to_animate" data-animation="fadeInUp"  method="post" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>">
                <input type="hidden" name="type" value="0">
                    <div class="row columns_margin_bottom_15">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="full-name" class="sr-only">Full Name
                                    <span class="required">*</span>
                                </label>
                                <input type="text" aria-required="true" size="30" value="" name="name" id="full-name" class="form-control" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email" class="sr-only">Your E-Mail</label>
                                <input type="text" size="30" value="" aria-required="true" name="email" id="email" class="form-control" placeholder="Your E-Mail">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone" class="sr-only">Phone Number
                                    <span class="required">*</span>
                                </label>
                                <input type="text" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Your Phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject
                                    <span class="required">*</span>
                                </label>
                                <input type="text"  size="30" value="" name="title" id="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="comment" class="sr-only">Your Message</label>
                                <textarea rows="1" cols="45" name="content" id="comment" class="form-control" placeholder="Your Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <p class="form-submit">
                        <button type="submit" id="submit" name="submit" class="theme_button color1">Send request</button>
                    </p>
                </form>
            </div>
            <div class="col-md-4 to_animate" data-animation="fadeInUp">
                <div class="with_border with_padding_small">
                    <ul class="list1 no-bullets no-top-border no-bottom-border">
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <i class="rt-icon2-shop highlight fontsize_18"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading grey"><?= $banners[18][1]->title ?></h5>
                                    <?= $banners[18][1]->description ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <i class="rt-icon2-phone5 highlight fontsize_18"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading grey"><?= $banners[18][2]->title ?></h5>
                                        <a href="<?= $banners[18][2]->url ?>"><?= $banners[18][2]->description ?></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left">
                                    <i class="rt-icon2-mail highlight fontsize_18"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading grey"><?= $banners[18][3]->title ?></h5>
                                        <a href="<?= $banners[18][3]->url ?>"><?= $banners[18][3]->description ?></a>									
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

