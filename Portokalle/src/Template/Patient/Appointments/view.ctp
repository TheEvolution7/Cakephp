<?php 
    use Cake\I18n\Time;
    use Cake\I18n\Number;

    $consults = unserialize($appointment->data_save);
    $time = new Time(__('{date} {time}', $consults['slot']));
?>
<div class="page2__container">
    <div class="page2__row">
        <div class="page2__col">
            <div class="page6__wrapper">
                <div class="membership-container">
                    <div class="membership-row">
                        <div class="form-build">
                            <div class="form-container">
                                <div class="form-container __review-step">
                                    <h2 class="field__title">
                                        Consult details
                                    </h2>
                                    <div class="row-cancel box-sumary">
                                        <div class="col-box-7">
                                            <div class="field">
                                                <h3 class="field__title">Appointment details</h3>
                                                <div class="table-wrap">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>Service</td>
                                                                <td><?= $services->title ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Provider</td>
                                                                <td><?= $consults['findPractitioner']['full_name'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>When</td>
                                                                <td><?= $time->nice() . ' - ' . $services->duration . ' minutes' ?></td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>Location (at time of appointment)</td>
                                                                <td><?= $consults['location']['timezone'] ?></td>
                                                            </tr> -->
                                                            <tr>
                                                                <td>Price</td>
                                                                <td><?php echo $this->Number->currency($services->price, 'USD'); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Appointment Status</td>
                                                                <td><?php echo $appointment->status; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Payment status</td>
                                                                <td>
                                                                    <?= $appointment->order->status ?>
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>Payment status</td>
                                                                <td>
                                                                    <?php 
                                                                    if (!empty($appointment->stripe_status)) {
                                                                        echo ucfirst(json_decode($appointment->stripe_status, true)['data']['object']['charges']['data'][0]['status']);
                                                                    } else {

                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php 
                                                if ($appointment->meetingId) {
                                                    if ($appointment->end_meeting) {
                                                        echo $this->Html->link(__('Past Meeting Details'), ['action' => 'pastMeetingDetails', $appointment->uuid], [
                                                            'class' => 'btn btn btn_blue-light'
                                                        ]);
                                                    }else{
                                                        echo $this->Html->link(__('View Meeting'), ['action' => 'meeting', $appointment->uuid], [
                                                            'class' => 'btn btn btn_blue-light'
                                                        ]);
                                                    }
                                                }
                                                ?>
                                                <?= $this->Form->postLink(
                                                    'Cancel appointments',
                                                    ['controller' => 'Appointments', 'action' => 'edit', $appointment->id],
                                                    [
                                                        'data' => ['status' => 'Cancelled'],
                                                        'confirm' => 'Are you sure?',
                                                        'class' => 'btn btn_blue'
                                                    ])
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-box-5">
                                            <div class="field">
                                                <h3 class="field__title">Your details</h3>
                                                <div class="table-wrap">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>Patient</td>
                                                                <td><?= $patients->full_name ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tell us more</td>
                                                                <td><?= $consults['details']['description'] ?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-center btn-step">
    <?= $this->Html->link(__('Back'), ['controller' => 'Appointments', 'action' => 'index'], ['class' => 'btn btn_blue __back']) ?>
</div>


