<?php 
	use Cake\I18n\Number;
?>

<?= $this->element('submenu') ?>
<!-- <div class="account-row __2">
    <div class="account-title">Credit transaction history</div>
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
                            <td data-label="Patient"><?= json_decode($appointment->stripe_status, true)['data']['object']['id']; ?></td>
                            <td data-label="Consult details"><?= json_decode($appointment->stripe_status, true)['type']; ?></td>
                            <td data-label="Consult privacy"><?= json_decode($appointment->stripe_status, true)['api_version']; ?></td>
                        </tr>
                      <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div> -->
