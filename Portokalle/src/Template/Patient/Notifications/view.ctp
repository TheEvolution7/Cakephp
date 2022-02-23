<?php
$details = '';
if (!empty($notification->appointment->description)) {
    foreach (unserialize($notification->appointment->description) as $key => $value) {
        if (is_array($value)) {
            $details .= implode(', ', $value) . '<br>';
        }else{
            if ($value != '') {
                $details .= ucfirst($key) . ': ' . ucfirst($value) . '<br>';
            }
        }
    } 
}

 ?>
<div class="page2__container">
    <div class="page2__row">
        <div class="page2__col w-p100">
            <div class="page6__wrapper">
                <div class="membership-container">
                    <div class="membership-row">
                        <div class="sorting1">
                            <h1 class="sorting1__title title"><?= __('My Notifications') ?></h1>
                        </div>

                        <div class="form-build">
                            <div class="content-notification">
                                <h4>Appointment <?= $notification->time ?></h4>
                                <div class="container-content">
                                    <div class="col-content">
                                        <h5><?= __('Your symptoms') ?></h5>
                                        <?= $details ?>
                                    </div>
                                    <div class="col-content">
                                        <h5><?= __('Location') ?></h5>
                                        <p class="text-status __on"><?= $notification->appointment->location ?></p>
                                    </div>
                                    <div class="col-content">
                                        <h5><?= __('Reason for appointment') ?></h5>
                                        <p>
                                            <?= $notification->appointment->comments ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="flex justify-center">
                                    <?= $this->Form->postLink(
                                        'Cancel appointments',
                                        ['controller' => 'Appointments', 'action' => 'edit', $notification->appointment->id],
                                        [
                                            'data' => ['status' => 'Cancelled'],
                                            'confirm' => 'Are you sure?',
                                            'class' => 'btn btn_blue'
                                        ])
                                    ?>
                                    <a href="<?= $this->Url->build(['controller' => 'Notifications', 'action' => 'index']) ?>" class="btn btn_blue-light">
                                        Back to notifications
                                    </a>
                                    <a href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'view', $notification->appointment->id]) ?>" class="btn btn_blue-light">
                                        View Appointment
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
