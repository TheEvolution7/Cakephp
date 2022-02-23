<link href="<?= $webrootAcp ?>css/pages/invoices/invoice-2.css" rel="stylesheet" type="text/css" />

<?php 
$status = [
  1 => '<label class="badge badge-info">Pending</label>',
  2 => '<label class="badge badge-warning">Shipping</label>',
  3 => '<label class="badge badge-success">Finish</label>',
  4 => '<label class="badge badge-danger">Pending</label>',
];

 ?>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet">
		<div class="kt-portlet__body kt-portlet__body--fit">
			<div class="kt-invoice-2">
				<div class="kt-invoice__head">
					<div class="kt-invoice__container">
						<div class="kt-invoice__brand">
							<h1 class="kt-invoice__title">PAYMENT</h1>
							<div href="#" class="kt-invoice__logo">
								<span class="kt-invoice__desc">
									<span><b><?= $this->getConfigure('Core')['setting']['currency'] . number_format($order->amount) ?></b> <?= $status[$order->status] ?></span>
									<span></span>
								</span>
							</div>
						</div>
						<div class="kt-invoice__items">
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle">DATE</span>
								<span class="kt-invoice__text"><?= $order->created ?></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle">CUSTOMER</span>
								<span class="kt-invoice__text"><?= $order->email ?></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle">PAYMENT METHOD</span>
								<span class="kt-invoice__text">
									<svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg BrandIcon-svg BrandIcon--size--20-svg" height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h32v32H0z" fill="#00579f"></path><g fill="#fff" fill-rule="nonzero"><path d="M13.823 19.876H11.8l1.265-7.736h2.023zm7.334-7.546a5.036 5.036 0 0 0-1.814-.33c-1.998 0-3.405 1.053-3.414 2.56-.016 1.11 1.007 1.728 1.773 2.098.783.379 1.05.626 1.05.963-.009.518-.633.757-1.216.757-.808 0-1.24-.123-1.898-.411l-.267-.124-.283 1.737c.475.213 1.349.403 2.257.411 2.123 0 3.505-1.037 3.521-2.641.008-.881-.532-1.556-1.698-2.107-.708-.354-1.141-.593-1.141-.955.008-.33.366-.667 1.165-.667a3.471 3.471 0 0 1 1.507.297l.183.082zm2.69 4.806l.807-2.165c-.008.017.167-.452.266-.74l.142.666s.383 1.852.466 2.239h-1.682zm2.497-4.996h-1.565c-.483 0-.85.14-1.058.642l-3.005 7.094h2.123l.425-1.16h2.597c.059.271.242 1.16.242 1.16h1.873zm-16.234 0l-1.982 5.275-.216-1.07c-.366-1.234-1.515-2.575-2.797-3.242l1.815 6.765h2.14l3.18-7.728z"></path><path d="M6.289 12.14H3.033L3 12.297c2.54.641 4.221 2.189 4.912 4.049l-.708-3.556c-.116-.494-.474-.633-.915-.65z"></path></g></g></svg>
									•••• 4242
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-invoice__body">
					<div class="kt-invoice__container">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>DESCRIPTION</th>
										<th>STATUS</th>
										<th>AMOUNT</th>
									</tr>
								</thead>
								<tbody>
									<tr style="text-align: center;">
										<td><?= $order->description ?></td>
										<td><?= $status[$order->status] ?></td>
										<td class="kt-font-danger kt-font-lg"><?= $this->getConfigure('Core')['setting']['currency'] . number_format($order->amount) ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>