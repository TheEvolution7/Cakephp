<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<section class="page_breadcrumbs cs background_cover section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                <h2>Team</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>">
                            Home
                        </a>
                    </li>
                    <li class="active">Team</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section id="about" class="ls section_padding_top_100 section_padding_bottom_50 table_section table_section_md columns_padding_25 columns_margin_bottom_30">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-6 text-center text-md-right to_animate" data-animation="fadeInUp">
							<img src="<?= $this->Url->build('/uploads/banners/'.$banners[29][0]->id . DS . $banners[29][0]->image) ?>" alt="<?= $banners[29][0]->title ?>" />
						</div>
						<div class="col-lg-5 col-md-6 to_animate" data-animation="fadeInUp">
							<h2 class="section_header numbered-header"><?= $banners[29][0]->title ?>
							</h2>
							<p class="small-text"><?= $banners[29][0]->description ?></p>
							<hr class="divider_30_3 zebra_bg">
							<p>
								<?= $banners[29][1]->title ?>
							</p>
							<div class="inline-block topmargin_10">
								<ul class="list1 checklist grey">
									<?= $banners[29][1]->description ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>


<section class="ds background_cover page_testimonials  section_padding_top_50 section_padding_30">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 to_animate" data-animation="fadeInUp">
                <div class="owl-carousel team-section" data-responsive-lg="4" data-responsive-md="3" data-responsive-sm="2" data-nav="true" data-margin="0">
                <?php foreach($banners[34] as $banner): ?>
                    <blockquote>
                        <img src="<?= $this->Url->build('/uploads/banners/'.$banner->id . DS . $banner->image) ?>" alt="<?= $banner->title ?>" />
                        <!-- <?= $banner->description ?> -->
                        <div class="item-meta lightfont">
                            <h5 class="highlight"><?= $banner->title ?></h5>
                            <p><?= $banner->url ?></p>
                        </div>
                    </blockquote>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
