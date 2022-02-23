<?php 
use Cake\I18n\Time;
?>
<div class="membership-container">
    <div class="membership-row">
        <div class="form-build">
            <div class="form-container">
                <div class="field">
                    <h3 class="field__title"><?= __('Your Appointment') ?></h3>
                    <div class="table-wrap">
                        <table>
                            <tbody>
                                <tr>
                                    <td><?= __('Status') ?></td>
                                    <td><?= $appointment->status ?></td>
                                </tr>
                                <tr>
                                    <td><?= __('Practitioner') ?></td>
                                    <?php $fn = $appointment->practitioner->personal?>
                                    <td>
                                        <b><?= __('{0} {1} {2}', [$fn->title, $fn->forename, $fn->surname]) ?></b>
                                        <p><?= __('Type: Online') ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= __('Patient') ?></td>
                                    <td>
                                        <b><?= $appointment->patient->full_name ?></b>
                                        <p><?= __('Payment: No Payment') ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= __('Appointment') ?></td>
                                    <?php 
                                    $time = new Time(__('{0} {1}', [$appointment->date->format('Y-m-d'), $appointment->start_time]));
                                     ?>
                                    <td><?= $time->nice();  ?>
                                        <p><?= date_default_timezone_get() ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?= $this->Html->link(__('Ok'), ['controller' => 'Users'], ['class' => 'btn btn btn-a primary-green size-m']) ?>
                <?= $this->Html->link(__('Change Appointment'), ['action' => 'change'], ['class' => 'btn btn_blue']) ?>
                <?= $this->Html->link(__('Cancel Appointment'), ['action' => 'cancel', $appointment->id], ['class' => 'btn btn_blue-light']) ?>
            </div>
        </div>
    </div>
</div>