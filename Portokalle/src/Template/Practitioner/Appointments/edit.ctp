<?php 
use Cake\I18n\Time;
$description = unserialize($appointment->description);
$time = new Time(__('{0} {1}', [$appointment->date->format('Y-m-d'), $appointment->start_time])); 
$status = ['Booked', 'Cancelled', 'Declined', 'Rescheduled', 'Waiting List'];
$status = array_combine($status, $status);
?>
<div class="page2__container __page-dropin">
    <div class="detail-pt-container">
        <div class="page7__wrapper">
            <div class="page7__center">
                <div class="settings">
                    <div class="settings__col">
                        <div class="content-detail">
                            <div class="settings__parameter">
                                <div class="settings__category">Status</div>
                                <?= $appointment->status ?>
                            </div>
                            <div class="settings__parameter">
                                <div class="settings__category">Time</div>
                                <?= $time->nice() ?>
                            </div>
                            <div class="settings__parameter">
                                <div class="settings__category">Duration</div>
                                <?= $appointment->duration . ' minutes' ?>
                            </div>
                            <?php 
                            foreach ($description as $key => $value) {
                                echo '<div class="settings__parameter">';
                                if (is_array($value)) {
                                    echo '<div class="settings__category">' . ucfirst($key) . ':</div>' . implode(', ', $value);
                                }else{
                                    echo '<div class="settings__category">' . ucfirst($key) . ':</div>' . $value;
                                }
                                echo '</div>';
                                
                            }?>
                        </div>
                        <div class="content-detail">
                            <?= $this->Form->create($appointment, ['url' => ['action' => 'edit', $appointment->id]]); ?>
                                <div class="pack-col">
                                    <div class="field">
                                        <h3 class="field__title">Appointment details</h3>
                                        <div class="field__wrap">
                                            <?= $this->Form->select('status', $status, ['class' => 'field1__select', 'empty' => true, 'required' => true]) ?>
                                        </div>
                                        <h3 class="field__title" style="margin-top: 20px;">
                                            Comments
                                        </h3>
                                        <div class="field__wrap flex-auto">
                                            <?= $this->Form->textarea('comments', ['class' => 'field__textarea']) ?>
                                        </div>
                                    </div>
                                </div>
                                <?= $this->Form->button(__('Update'), ['class' => 'btn btn_blue __next']) ?>
                            <?php echo $this->Form->end(); ?>
                            <!-- <div class="btn-nav-dropin">
                                <a href="doctor_drop-in.html" class="header__btn btn btn_blue __back btn__ssm">Back to Drop-in</a>
                                <a href="doctor_past-medical-history.html" class="header__btn btn btn_blue __purple btn__ssm">View past medical history</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="settings__col __patient">
                        <div class="settings__card settings__card_profile">
                            <div class="settings__top">
                                <div class="settings__ava">
                                    <?php $image = $this->Url->build('/uploads/patients/' . $appointment->patient->id . DS . $appointment->patient->image);?>
                                    <div class="friends__ava">
                                        <?php if (!file_exists(WWW_ROOT . '/uploads/patients/' . $appointment->patient->id . DS . $appointment->patient->image)): ?>
                                            <div class="no-img">
                                                <?php 
                                                    $str = explode(' ', $appointment->patient->full_name);
                                                    $arr = '';
                                                    foreach ($str as $s) {
                                                        $arr .= substr($s, 0, 1);
                                                    }
                                                    echo $arr;
                                                ?>
                                            </div>
                                        <?php else: ?>
                                            <img class="settings__pic" src="<?= $image ?>" alt="" />
                                            
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="settings__man"><?= $appointment->patient->full_name ?></div>
                                <!-- <div class="settings__post">Marketing Administrator</div> -->
                            </div>
                            <div class="settings__parameters __profile-patient">
                                <div class="settings__parameter">
                                    <div class="settings__category">Age</div>
                                    <?= date('Y') - $appointment->patient->date_of_birth->format('Y') ?>
                                </div>
                                <div class="settings__parameter">
                                    <div class="settings__category">Sex</div>
                                    <?= ucfirst($appointment->patient->sex) ?>
                                </div>
                                <div class="settings__parameter">
                                    <div class="settings__category">Health Card</div>
                                    <?= $appointment->patient->health_card ?>
                                </div>
                                <!-- <div class="settings__parameter">
                                    <div class="settings__category">Address</div>
                                    123/ ABC/ NY
                                </div> -->
                                <div class="settings__parameter">
                                    <div class="settings__category">Phone</div>
                                    <a class="settings__value"><?= $appointment->patient->phone_number ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="btn-dropin">
        <h5>Would you like to take this patient ?</h5>
        <div class="group-btn">
            <a href="#" class="header__btn btn btn_blue __back btn__ssm">No</a>
            <a href="#" class="header__btn btn btn_blue __next btn__ssm">Yes</a>
        </div>
    </div> -->
</div>
