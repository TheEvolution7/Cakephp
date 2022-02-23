<link href="<?= $webrootAcp ?>css/pages/invoices/invoice-2.css" rel="stylesheet" type="text/css" />

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet">
		<div class="kt-portlet__body kt-portlet__body--fit">
			<div class="kt-invoice-2">
				<div class="kt-invoice__head">
					<div class="kt-invoice__container">
						<div class="kt-invoice__brand">
							<h1 class="kt-invoice__title">Medical Request</h1>
							<div href="#" class="kt-invoice__logo">
								<span class="kt-invoice__desc">
									<span>Created: <?= $medical_request->created ?></span>
									<span>Modified: <?= $medical_request->modified ?></span>
								</span>
							</div>
						</div>
						<div class="kt-invoice__items">
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle">Symptoms</span>
								<span class="kt-invoice__text"><?= $medical_request->symptoms ?></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle">Description</span>
								<span class="kt-invoice__text"><?= $medical_request->description ?></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle">Sick Notes</span>
								<span class="kt-invoice__text">
									<?= $medical_request->sick_notes ?>
								</span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle">Prescriptions</span>
								<span class="kt-invoice__text">
									<?= $medical_request->prescriptions ?>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-invoice__body">
					<div class="kt-invoice__container">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>