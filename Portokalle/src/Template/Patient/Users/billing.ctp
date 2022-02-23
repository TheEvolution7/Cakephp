<?php 
    use Cake\I18n\Number;
?>

<?= $this->element('submenu') ?>
<div class="account-row __2">
    <div class="account-title">Billing history</div>
    <div class="box-edit-pass __2">
        <div class="box-table-s">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Created</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order->id ?></td>
                            <td><?= $order->created->nice() ?></td>
                            <td><?= $this->Number->currency($order->amount, 'USD') ?></td>
                            <td><?= $order->status ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <div class="account-row __2">
    <div class="account-title">Billing history</div>
    <div class="box-edit-pass __2">
        <div class="box-table-s">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Source</th>
                        <th>Type</th>
                        <th>Expiry</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                      <?php if (!empty($appointment->stripe_status)): ?>
                        <tr>
                            <td data-label="Date"><?= date( "Y-m-d H:m:s", json_decode($appointment->stripe_status, true)['created']); ?></td>
                            <td data-label="Provider"><?= $this->Number->currency(json_decode($appointment->stripe_status, true)['data']['object']['amount']/100, 'USD'); ?></td>
                            <td data-label="Patient">
                                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg" height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g fill="none" fill-rule="evenodd"><path fill="#F6F9FC" fill-rule="nonzero" d="M1 12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8z"></path><path fill="#E6EBF1" fill-rule="nonzero" d="M1 12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8zm-1 0V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2z"></path><path fill="#1A1F71" d="M0 5V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0zm5 2h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z"></path><path fill="#F7B600" d="M0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"></path></g></svg>
                                •••• <?= json_decode($appointment->stripe_status, true)['data']['object']['charges']['data'][0]['payment_method_details']['card']['last4']; ?></td>
                            <td data-label="Consult details"><?= ucfirst(json_decode($appointment->stripe_status, true)['data']['object']['charges']['data'][0]['payment_method_details']['card']['brand']) .' ' . json_decode($appointment->stripe_status, true)['data']['object']['charges']['data'][0]['payment_method_details']['card']['funding'] . ' ' . 'card' ; ?></td>
                            <td data-label="Consult privacy"><?= json_decode($appointment->stripe_status, true)['data']['object']['charges']['data'][0]['payment_method_details']['card']['exp_month'] . '/' . json_decode($appointment->stripe_status, true)['data']['object']['charges']['data'][0]['payment_method_details']['card']['exp_year'] ?></td>
                        </tr>
                      <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div> -->
