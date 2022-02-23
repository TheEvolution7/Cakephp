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
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Payments
				</h3>
			</div>
		</div>
		<div class="kt-portlet__body">
			<div class="kt-section">
				<div class="kt-section__content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Description</th>
								<th>Customer</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody style="text-align: center;">
							<?php foreach ($orders as $order): ?>
								<tr>
									<th scope="row"><?= $order->id ?></th>
									<td><?= number_format($order->amount) ?></td>
									<td><?= $status[$order->status] ?></td></td>
									<td><?= $order->description ?></td>
									<td><?= $order->email ?></td>
									<td><?= $order->created ?></td>
									<td><a href="<?= $this->Url->build(['action' => 'paymentDetails', $order->id]) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-eye"></i>Details</a></td>
								</tr>
							<?php endforeach ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!--end::Form-->
	</div>
</div>