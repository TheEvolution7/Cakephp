<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

		<!--Begin:: App Aside Mobile Toggle-->
		<button class="kt-app__aside-close" id="kt_user_profile_aside_close">
			<i class="la la-close"></i>
		</button>

		<!--End:: App Aside Mobile Toggle-->

		<!--Begin:: App Aside-->
		<div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

			<!--begin:: Widgets/Applications/User/Profile1-->
			<div class="kt-portlet kt-portlet--height-fluid-">
				<div class="kt-portlet__head  kt-portlet__head--noborder">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						</h3>
					</div>
				</div>
				<div class="kt-portlet__body kt-portlet__body--fit-y">

					<!--begin::Widget -->
					<div class="kt-widget kt-widget--user-profile-1">
						<div class="kt-widget__head">
							
						</div>
						<div class="kt-widget__body">
							<div class="kt-widget__items">
								<a href="<?= $this->Url->build(['controller' => 'Records', 'action' => 'index', '?' => ['user_id' => $user->id]]) ?>" class="kt-widget__item" target="_blank">
									<span class="kt-widget__section">
										<span class="kt-widget__icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon id="Bound" points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3" />
												</g>
											</svg> </span>
										<span class="kt-widget__desc">
											Medical Records
										</span>
									</span>
								</a>
								<a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'index', '?' => ['user_id' => $user->id]]) ?>" class="kt-widget__item " target="_blank">
									<span class="kt-widget__section">
										<span class="kt-widget__icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
													<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg> </span>
										<span class="kt-widget__desc">
											Patient Profiles
										</span>
									</span>
								</a>
								 <!-- <a href="demo1/custom/apps/user/profile-1/account-information.html" class="kt-widget__item ">
									<span class="kt-widget__section">
										<span class="kt-widget__icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect id="bound" x="0" y="0" width="24" height="24" />
													<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
													<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000" />
												</g>
											</svg> </span>
										<span class="kt-widget__desc">
											Account Information
										</span>
										</spandiv>
								</a>
								<a href="demo1/custom/apps/user/profile-1/change-password.html" class="kt-widget__item ">
									<span class="kt-widget__section">
										<span class="kt-widget__icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect id="bound" x="0" y="0" width="24" height="24" />
													<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3" />
													<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3" />
													<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3" />
												</g>
											</svg> </span>
										<span class="kt-widget__desc">
											Change Passwort
										</span>
									</span>
									<span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder">5</span>
								</a> -->
								<a href="<?= $this->Url->build(['action' => 'payments', '?' => ['user_id' => $user->id]]) ?>" class="kt-widget__item ">
									<span class="kt-widget__section">
										<span class="kt-widget__icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect id="bound" x="0" y="0" width="24" height="24" />
													<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
													<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" id="Combined-Shape" fill="#000000" />
												</g>
											</svg> </span>
										<span class="kt-widget__desc">
											Payment
										</span>
									</span>
								</a>
								<a href="<?= $this->Url->build(['action' => 'credit_cards', $user->id]) ?>" class="kt-widget__item">
									<span class="kt-widget__section">
										<span class="kt-widget__icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect id="bound" x="0" y="0" width="24" height="24" />
													<rect id="Rectangle-7-Copy" fill="#000000" x="2" y="5" width="19" height="4" rx="1" />
													<rect id="Rectangle-7-Copy-4" fill="#000000" opacity="0.3" x="2" y="11" width="19" height="10" rx="1" />
												</g>
											</svg> </span>
										<span class="kt-widget__desc">
											Credit Cards
										</span>
									</span>
								</a>
								<a href="<?= $this->Url->build(['action' => 'statements', $user->id]) ?>" class="kt-widget__item">
									<span class="kt-widget__section">
										<span class="kt-widget__icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect id="bound" x="0" y="0" width="24" height="24" />
													<rect id="Rectangle-20" fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
													<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
												</g>
											</svg> </span>
										<span class="kt-widget__desc">
											Statements
										</span>
									</span>
								</a>
							</div>
						</div>
					</div>

					<!--end::Widget -->
				</div>
			</div>

			<!--end:: Widgets/Applications/User/Profile1-->
		</div>

		<!--End:: App Aside-->
		<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
			<div class="kt-portlet kt-portlet--tabs">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-toolbar">
						<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#kt_apps_user_edit_tab_1" role="tab">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Bound" points="0 0 24 0 24 24 0 24" />
											<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero" />
											<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3" />
										</g>
									</svg> Profile
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_2" role="tab">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg> Account
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_3" role="tab">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect id="bound" x="0" y="0" width="24" height="24" />
											<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3" />
											<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3" />
											<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3" />
										</g>
									</svg> Change Password
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_4" role="tab">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect id="bound" x="0" y="0" width="24" height="24" />
											<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
											<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" id="Combined-Shape" fill="#000000" />
										</g>
									</svg> Settings
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_5" role="tab">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect id="bound" x="0" y="0" width="24" height="24"></rect>
											<rect id="Combined-Shape" fill="#000000" opacity="0.3" x="2" y="3" width="20" height="18" rx="2"></rect>
											<path d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z" id="Path-108" fill="#000000" fill-rule="nonzero"></path>
											<circle id="Oval" fill="#000000" opacity="0.3" cx="19" cy="6" r="1"></circle>
										</g>
									</svg> Pharmacys
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="kt-portlet__body">
					<?= $this->Form->create($user, [
					    'type' => 'file'])
					?>
						<div class="tab-content">
							<div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
								<div class="kt-form kt-form--label-right">
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Customer Info:</h3>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
													<div class="col-lg-9 col-xl-6">
														<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
															<?php

							                                    $imagePath = 'img/no_thumb.png';
							                                    if (!empty($user->image)) {
							                                        
							                                        $imagePath = 'uploads' . DS . 'users' . DS . $user->id . DS . $user->image;
							                                    }
							                                ?>
															<div class="kt-avatar__holder" style="background-image: url(<?= $this->Url->build(DS . $imagePath) ?>);"></div>
															<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
																<i class="fa fa-pen"></i>
																<?= $this->Form->file('image', [
								                                    'type'      => 'file',
								                                    'accept'    => 'image/*']);
								                                ?>
															</label>
															<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('first_name') ?></label>
													<div class="col-lg-9 col-xl-6">
														<?= $this->Form->text('first_name', ['class' => 'form-control']); ?>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('last_name') ?></label>
													<div class="col-lg-9 col-xl-6">
														<?= $this->Form->text('last_name', ['class' => 'form-control']); ?>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('phone_number') ?></label>
													<div class="col-lg-9 col-xl-6">
														<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
															<?= $this->Form->text('phone_number', ['class' => 'form-control']); ?>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('fax') ?></label>
													<div class="col-lg-9 col-xl-6">
														<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-fax"></i></span></div>
															<?= $this->Form->text('fax', ['class' => 'form-control']); ?>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('email') ?></label>
													<div class="col-lg-9 col-xl-6">
														<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
															<?= $this->Form->text('email', ['class' => 'form-control']); ?>
														</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('address') ?></label>
													<div class="col-lg-9 col-xl-6">
														<div class="input-group">
															<?= $this->Form->text('address', ['class' => 'form-control']); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="kt_apps_user_edit_tab_2" role="tabpanel">
								<div class="kt-form kt-form--label-right">
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Account:</h3>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('username') ?></label>
													<div class="col-lg-9 col-xl-6">
														<div class="input-group">
															<?= $this->Form->text('username', ['class' => 'form-control']); ?>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('email') ?></label>
													<div class="col-lg-9 col-xl-6">
														<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
															<?= $this->Form->text('email', ['class' => 'form-control']); ?>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Language</label>
													<div class="col-lg-9 col-xl-6">
														<select class="form-control">
															<option>Select Language...</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Time Zone</label>
													<div class="col-lg-9 col-xl-6">
														<select class="form-control">
														</select>
													</div>
												</div>
												<!-- <div class="form-group form-group-last row">
													<label class="col-xl-3 col-lg-3 col-form-label">Communication</label>
													<div class="col-lg-9 col-xl-6">
														<div class="kt-checkbox-inline">
															<label class="kt-checkbox">
																<input type="checkbox" checked=""> Email
																<span></span>
															</label>
															<label class="kt-checkbox">
																<input type="checkbox" checked=""> SMS
																<span></span>
															</label>
															<label class="kt-checkbox">
																<input type="checkbox"> Phone
																<span></span>
															</label>
														</div>
													</div>
												</div> -->
											</div>
										</div>
										<!-- <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Security:</h3>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Login verification</label>
													<div class="col-lg-9 col-xl-6">
														<button type="button" class="btn btn-label-brand btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">Setup login verification</button>
														<span class="form-text text-muted">
															After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised.
															<a href="#" class="kt-link">Learn more</a>.
														</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Password reset verification</label>
													<div class="col-lg-9 col-xl-6">
														<div class="kt-checkbox-single">
															<label class="kt-checkbox">
																<input type="checkbox"> Require personal information to reset your password.
																<span></span>
															</label>
														</div>
														<span class="form-text text-muted">
															For extra security, this requires you to confirm your email or phone number when you reset your password.
															<a href="#" class="kt-link">Learn more</a>.
														</span>
													</div>
												</div>
												<div class="form-group row kt-margin-t-10 kt-margin-b-10">
													<label class="col-xl-3 col-lg-3 col-form-label"></label>
													<div class="col-lg-9 col-xl-6">
														<button type="button" class="btn btn-label-danger btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">Deactivate your account ?</button>
													</div>
												</div>
											</div>
										</div> -->
									</div>
								</div>
							</div>
							<div class="tab-pane" id="kt_apps_user_edit_tab_3" role="tabpanel">
								<div class="kt-form kt-form--label-right">
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
													<div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
													<div class="alert-text">Configure user passwords to expire periodically. <br>Users will need warning that their passwords are going to expire, or they might inadvertently get locked out of the system!</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true"><i class="la la-close"></i></span>
														</button>
													</div>
												</div>
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Change Or Recover Your Password:</h3>
													</div>
												</div>
												<!-- <div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
													<div class="col-lg-9 col-xl-6">
														<input type="password" class="form-control" value="" placeholder="Current password">
														<a href="#" class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">Forgot password ?</a>
													</div>
												</div> -->
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
													<div class="col-lg-9 col-xl-6">
														<?= $this->Form->text('password', ['type' => 'password','class' => 'form-control']); ?>
													</div>
												</div>
												<div class="form-group form-group-last row">
													<label class="col-xl-3 col-lg-3 col-form-label">Verify Password</label>
													<div class="col-lg-9 col-xl-6">
														<?= $this->Form->text('confirm_password', ['value' => $user->password, 'type' => 'password','class' => 'form-control']); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="kt_apps_user_edit_tab_4" role="tabpanel">
								<!-- <div class="kt-form kt-form--label-right">
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Setup Email Notification:</h3>
													</div>
												</div>
												<div class="form-group form-group-sm row">
													<label class="col-xl-3 col-lg-3 col-form-label">Email Notification</label>
													<div class="col-lg-9 col-xl-6">
														<span class="kt-switch">
															<label>
																<input type="checkbox" checked="checked" name="email_notification_1">
																<span></span>
															</label>
														</span>
													</div>
												</div>
												<div class="form-group form-group-last row">
													<label class="col-xl-3 col-lg-3 col-form-label">Send Copy To Personal Email</label>
													<div class="col-lg-9 col-xl-6">
														<span class="kt-switch">
															<label>
																<input type="checkbox" name="email_notification_2">
																<span></span>
															</label>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Activity Related Emails:</h3>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">When To Email</label>
													<div class="col-lg-9 col-xl-6">
														<div class="kt-checkbox-list">
															<label class="kt-checkbox">
																<input type="checkbox"> You have new notifications.
																<span></span>
															</label>
															<label class="kt-checkbox">
																<input type="checkbox"> You're sent a direct message
																<span></span>
															</label>
															<label class="kt-checkbox">
																<input type="checkbox" checked="checked"> Someone adds you as a connection
																<span></span>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group form-group-last row">
													<label class="col-xl-3 col-lg-3 col-form-label">When To Escalate Emails</label>
													<div class="col-lg-9 col-xl-6">
														<div class="kt-checkbox-list">
															<label class="kt-checkbox kt-checkbox--brand">
																<input type="checkbox"> Upon new order.
																<span></span>
															</label>
															<label class="kt-checkbox kt-checkbox--brand">
																<input type="checkbox"> New membership approval
																<span></span>
															</label>
															<label class="kt-checkbox kt-checkbox--brand">
																<input type="checkbox" checked="checked"> Member registration
																<span></span>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Updates From Keenthemes:</h3>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Email You With</label>
													<div class="col-lg-9 col-xl-6">
														<div class="kt-checkbox-list">
															<label class="kt-checkbox">
																<input type="checkbox"> News about Metronic product and feature updates
																<span></span>
															</label>
															<label class="kt-checkbox">
																<input type="checkbox"> Tips on getting more out of Keen
																<span></span>
															</label>
															<label class="kt-checkbox">
																<input type="checkbox" checked="checked"> Things you missed since you last logged into Keen
																<span></span>
															</label>
															<label class="kt-checkbox">
																<input type="checkbox" checked="checked"> News about Metronic on partner products and other services
																<span></span>
															</label>
															<label class="kt-checkbox">
																<input type="checkbox" checked="checked"> Tips on Metronic business products
																<span></span>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> -->
							</div>
							<div class="tab-pane" id="kt_apps_user_edit_tab_5" role="tabpanel">
								<div class="kt-section__content">
									<table class="table table-dark">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Latitude</th>
												<th>Longitude</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($user->pharmacys as $key => $pharmacy): ?>
												<tr class="text-center">
													<th scope="row"><?= $key + 1 ?></th>
													<td><?= $pharmacy->name ?></td>
													<td><?= $pharmacy->latitude ?></td>
													<td><?= $pharmacy->longitude ?></td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
						<div class="kt-form__actions">
							<div class="row">
								<div class="col-xl-3"></div>
								<div class="col-lg-9 col-xl-6">
									<button type="submit" class="btn btn-label-brand btn-bold">Save changes</button>
									<a href="#" class="btn btn-clean btn-bold">Cancel</a>
								</div>
							</div>
						</div>
					<?= $this->Form->end() ?>
				</div>
			</div>
		</div>
		<!--Begin:: App Content-->
		

		<!--End:: App Content-->
	</div>
	
</div>
