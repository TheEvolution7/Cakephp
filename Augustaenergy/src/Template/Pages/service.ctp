<?php 
    echo $this->element('meta');
    $banners = $this->getCache('banners_' . $configs['language']); 
?>
<!--Page Header Start-->
<section class="page-header">
	<div class="page-header-bg" style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[65][0]->id . DS . $banners[65][0]->image) ?>)">
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
				<li class="active"><?= $banners[65][0]->title ?></li>
			</ul>
			<h2><?= $banners[65][0]->description ?></h2>
		</div>
	</div>
</section>
<!--Page Header End-->

<!--Service Details Start-->
<section class="service-details">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 col-lg-5">
				<div class="service-details__sidebar">
					<div class="service-details__sidebar-service wow fadeIn" data-wow-delay="100ms"
						data-wow-duration="2500ms">
						<ul class="nav nav-tabs flex-column service-details__sidebar-service-list list-unstyled" id="myTab"
							role="tablist">
							<li class="nav-item current" role="presentation">
								<button class="nav-link active" id="oid-gas-tab" data-bs-toggle="tab" data-bs-target="#oid-gas"
									type="button" role="tab" aria-controls="oid-gas" aria-selected="true"><?= $banners[66][0]->title ?><span
										class="icon-right-arrow"></span></button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="energy-tab" data-bs-toggle="tab" data-bs-target="#energy" type="button"
									role="tab" aria-controls="energy" aria-selected="false"><?= $banners[66][1]->title ?><span
										class="icon-right-arrow"></span></button>
							</li>
						</ul>
					</div>
					<div class="service-details__need-help wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
						<div class="service-details__need-help-bg"
							style="background-image: url(<?= $this->Url->build('/uploads/banners/' . $banners[65][1]->id . DS . $banners[65][1]->image) ?>)">
						</div>
						<div class="service-details__need-help-icon">
							<span class="icon-chatting"></span>
						</div>
						<h2 class="service-details__need-help-title"><?= $banners[65][1]->title ?></h2>
						<div class="service-details__need-help-contact">
							<?= $banners[65][1]->description ?>
						</div>
					</div>
					<div class="service-details__download wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
						<a href="#" class="service-details__download-btn">Download our broucher</a>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-7">
				<div class="tab-content">
					<div class="tab-pane active" id="oid-gas" role="tabpanel" aria-labelledby="oid-gas-tab">
						<div class="service-details__right">
							<div class="service-details__img wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
								<img src="<?= $this->Url->build('/uploads/banners/' . $banners[67][0]->id . DS . $banners[67][0]->image) ?>" alt="">
							</div>
							<div class="service-details__content">
								<h2 class="service-details__title wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
									<?= $banners[67][0]->title ?></h2>
								<?= $banners[67][0]->description ?>
								<h2 class="service-details__title wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
									<?= $banners[67][1]->title ?>
								</h2>
								<?= $banners[67][1]->description ?>
								<div class="service-details__img wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
									<img src="<?= $this->Url->build('/uploads/banners/' . $banners[67][1]->id . DS . $banners[67][1]->image) ?>" alt="">
								</div>
								<?= $banners[67][2]->description ?>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="energy" role="tabpanel" aria-labelledby="energy-tab">
						<div class="service-details__right">
							<div class="service-details__img">
								<img src="<?= $this->Url->build('/uploads/banners/' . $banners[67][3]->id . DS . $banners[67][3]->image) ?>" alt="">
							</div>
							<div class="service-details__content">
								<h2 class="service-details__title wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
									<?= $banners[67][3]->title ?></h2>
								<?= $banners[67][3]->description ?>
								<h2 class="service-details__title wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
									<?= $banners[67][4]->title ?>
								</h2>
								<?= $banners[67][4]->description ?>
								<!-- <div class="service-details__img wow fadeIn" data-wow-delay="100ms" data-wow-duration="2500ms">
									<img src="<?= $this->Url->build('/uploads/banners/' . $banners[67][4]->id . DS . $banners[67][4]->image) ?>" alt="">
								</div> -->
								<?= $banners[67][5]->description ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
