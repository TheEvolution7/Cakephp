<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

	<?php foreach ($users as $user): ?>
		<div class="kt-portlet">
			<div class="kt-portlet__body">
				<div class="kt-widget kt-widget--user-profile-3">
					<div class="kt-widget__top">
						<div class="kt-widget__media kt-hidden-">
							<?php
                                $imagePath = 'img/no_thumb.png';
                                if (!empty($user->image)) {
                                    $imagePath = 'uploads' . DS . 'users' . DS . $user->id . DS . $user->image;
                                }
                            ?>
                            <img src="<?php echo $this->Url->build(DS . $imagePath) ?>">
						</div>
						<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
							JM
						</div>
						<div class="kt-widget__content">
							<div class="kt-widget__head">
								<a href="<?= $this->Url->build(['action' => 'editDoctor', $user->id]) ?>" class="kt-widget__username">
									<?= $user->full_name ?>
									<!-- <i class="flaticon2-correct kt-font-success"></i> -->
								</a>
								<div class="kt-widget__action">
									<button type="button" onclick="window.location.href='<?= $this->Url->build(['action' => 'editDoctor', $user->id]) ?>'" class="btn btn-label-success btn-sm btn-upper">view</button>&nbsp;
									<!-- <button type="button" class="btn btn-sm btn-upper btn-label-danger">disable</button> -->
								</div>
							</div>
							<div class="kt-widget__subhead">
								<a href="#"><i class="flaticon2-new-email"></i><?= $user->email ?></a>
								<!-- <a href="#"><i class="flaticon2-calendar-3"></i>PR Manager </a> -->
								<a href="#"><i class="flaticon2-placeholder"></i><?= $user->address ?></a>
							</div>
							<div class="kt-widget__info">
								<!-- <div class="kt-widget__desc">
									<?= $user->profile ?>
								</div> -->
								<!-- <div class="kt-widget__progress">
									<div class="kt-widget__text">
										Progress
									</div>
									<div class="progress" style="height: 5px;width: 100%;">
										<div class="progress-bar kt-bg-success" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="kt-widget__stats">
										78%
									</div>
								</div> -->
							</div>
						</div>
					</div>
					<!-- <div class="kt-widget__bottom">
						<div class="kt-widget__item">
							<div class="kt-widget__icon">
								<i class="flaticon-piggy-bank"></i>
							</div>
							<div class="kt-widget__details">
								<span class="kt-widget__title">Earnings</span>
								<span class="kt-widget__value"><span>$</span>249,500</span>
							</div>
						</div>
						<div class="kt-widget__item">
							<div class="kt-widget__icon">
								<i class="flaticon-confetti"></i>
							</div>
							<div class="kt-widget__details">
								<span class="kt-widget__title">Expenses</span>
								<span class="kt-widget__value"><span>$</span>164,700</span>
							</div>
						</div>
						<div class="kt-widget__item">
							<div class="kt-widget__icon">
								<i class="flaticon-pie-chart"></i>
							</div>
							<div class="kt-widget__details">
								<span class="kt-widget__title">Net</span>
								<span class="kt-widget__value"><span>$</span>782,300</span>
							</div>
						</div>
						<div class="kt-widget__item">
							<div class="kt-widget__icon">
								<i class="flaticon-file-2"></i>
							</div>
							<div class="kt-widget__details">
								<span class="kt-widget__title">73 Tasks</span>
								<a href="#" class="kt-widget__value kt-font-brand">View</a>
							</div>
						</div>
						<div class="kt-widget__item">
							<div class="kt-widget__icon">
								<i class="flaticon-chat-1"></i>
							</div>
							<div class="kt-widget__details">
								<span class="kt-widget__title">648 Comments</span>
								<a href="#" class="kt-widget__value kt-font-brand">View</a>
							</div>
						</div>
						<div class="kt-widget__item">
							<div class="kt-widget__icon">
								<i class="flaticon-network"></i>
							</div>
							<div class="kt-widget__details">
								<div class="kt-section__content kt-section__content--solid">
									<div class="kt-badge kt-badge__pics">
										<a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="John Myer">
											<img src="./assets/media/users/100_7.jpg" alt="image">
										</a>
										<a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Alison Brandy">
											<img src="./assets/media/users/100_3.jpg" alt="image">
										</a>
										<a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Selina Cranson">
											<img src="./assets/media/users/100_2.jpg" alt="image">
										</a>
										<a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Luke Walls">
											<img src="./assets/media/users/100_13.jpg" alt="image">
										</a>
										<a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Micheal York">
											<img src="./assets/media/users/100_4.jpg" alt="image">
										</a>
										<a href="#" class="kt-badge__pic kt-badge__pic--last kt-font-brand">
											+7
										</a>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	<?php endforeach ?>

	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-12">

			<!--begin:: Components/Pagination/Default-->
			<div class="kt-portlet">
				<div class="kt-portlet__body">

					<!--begin: Pagination-->
					<?= $this->Element('Acp.pagination') ?>

					<!--end: Pagination-->
				</div>
			</div>

			<!--end:: Components/Pagination/Default-->
		</div>
	</div>

	<!--End::Section-->
</div>