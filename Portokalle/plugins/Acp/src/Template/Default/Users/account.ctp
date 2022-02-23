<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

	<!--Begin::Section-->
	<div class="row">
		<?php foreach ($users as $user): ?>
			<div class="col-xl-3">
				<div class="kt-portlet kt-portlet--height-fluid">
					<div class="kt-portlet__head kt-portlet__head--noborder">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
							</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<a href="#" class="btn btn-icon" data-toggle="dropdown">
								<i class="flaticon-more-1 kt-font-brand"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-line-chart"></i>
											<span class="kt-nav__link-text">Reports</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-send"></i>
											<span class="kt-nav__link-text">Messages</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
											<span class="kt-nav__link-text">Charts</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-avatar"></i>
											<span class="kt-nav__link-text">Members</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-settings"></i>
											<span class="kt-nav__link-text">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">

						<!--begin::Widget -->
						<div class="kt-widget kt-widget--user-profile-2">
							<div class="kt-widget__head">
								<div class="kt-widget__media">
									<?php
		                                $imagePath = 'img/no_thumb.png';
		                                if (!empty($user->image)) {
		                                    $imagePath = 'uploads' . DS . 'users' . DS . $user->id . DS . $user->image;
		                                }
		                            ?>
									<img class="kt-widget__img kt-hidden-" src="<?php echo $this->Url->build(DS . $imagePath) ?>">
									<!-- <div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
										ChS
									</div> -->
								</div>
								<div class="kt-widget__info">
									<a href="#" class="kt-widget__username">
										<?= $user->full_name ?>
									</a>
									<!-- <span class="kt-widget__desc">
										Head of Development
									</span> -->
								</div>
							</div>
							<div class="kt-widget__body">
								<div class="kt-widget__section">
									<!-- I distinguish three <a href="#" class="kt-font-brand kt-link kt-font-transform-u kt-font-bold">#xrs-54pq</a> objectsves First
									esetablished and nice coocked rice -->
								</div>
								<div class="kt-widget__item">
									<div class="kt-widget__contact">
										<span class="kt-widget__label">Email:</span>
										<a href="#" class="kt-widget__data"><?= $user->email ?></a>
									</div>
									<div class="kt-widget__contact">
										<span class="kt-widget__label">Phone:</span>
										<a href="#" class="kt-widget__data"><?= $user->phone_number ?></a>
									</div>
									<div class="kt-widget__contact">
										<span class="kt-widget__label">Location:</span>
										<span class="kt-widget__data"><?= $user->address ?></span>
									</div>
								</div>
							</div>
							<div class="kt-widget__footer">
								<button type="button" onclick="window.location.href='<?= $this->Url->build(['action' => 'editAccount', $user->id]) ?>'" class="btn btn-label-warning btn-lg btn-upper">view</button>
							</div>
						</div>

						<!--end::Widget -->
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>

	<!--End::Section-->

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