<?php	$banners = $this->getCache('banners_' . $configs['language']); ?>
<div id="pwe-footer2">
	<div class="pwe-narrow-content">
		<div class="row">
			<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
				<h2>
					<a href="<?= $this->url->build(['controller' => 'Pages','action'=> 'home']) ?>"><?= $banners[12][0]->title ?></a>
				</h2>
				<div class="social"> 
					<a href="<?= $banners[13][0]->url ?>"><?= $banners[13][0]->description ?></a> 
					<a href="<?= $banners[13][4]->url ?>"><?= $banners[13][4]->description ?></a> 
					<a href="<?= $banners[13][1]->url ?>"><?= $banners[13][1]->description ?></a> 
					<a href="<?= $banners[13][5]->url ?>"><?= $banners[13][5]->description ?></a> 
				</div>
			</div>
			<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
				<h6><?= $banners[12][1]->title ?></h6>
				<?= $banners[12][1]->description ?>
			</div>
			<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
				<h6><?= $banners[12][2]->title ?></h6>
				<?= $banners[12][2]->description ?>
				<p class="copyright"><?= $banners[12][3]->description ?></p>
			</div>
		</div>
	</div>
</div>