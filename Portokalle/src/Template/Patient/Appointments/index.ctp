<?php 
use Cake\I18n\Time;
use Cake\I18n\FrozenTime;
?>

<div class="page2__container __page-dropin">
    <div class="schedule-container">
        <?php foreach ($combined as $key => $items): ?>
            <?php
                $current = strtotime(date('M d, Y'));
                if ($current == strtotime($key)) {
                    $key = 'Today';
                }
            ?>
            <div class="applicant__title title"><?= $key ?></div><hr>
            <div class="friends__list">
            <?php foreach ($items as $appointment): ?>
                <div class="friends__item">
                    <div class="friends__bg" style="background-image: url('<?= $webroot ?>img/bg-patient.jpg');"></div>
                    <div class="friends__body">
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
                        <div class="friends__details">
                            <div class="friends__user"><?= $appointment->patient->full_name .' - #' . $appointment->id  ?>
                                <?php 
                                    $time = new Time(__('{0} {1}', [$appointment->date->format('Y-m-d'), $appointment->start_time]));
                                ?>

                                <?php if ($time): ?>
                                    <strong id="notification-<?= $appointment->id ?>"><?= '<script>countDownDate("' . $time->nice() . '", ' . $appointment->id . ');</script>' ?></strong>
                                <?php endif ?>
                            </div>
                            <div class="friends__login"><?= ucfirst($appointment->patient->sex) . ' - '. (date('Y') - $appointment->patient->date_of_birth->format('Y')) . ' year old' ?></div>
                            <div class="friends__text">
                                
                                <?= $appointment->status . ' - ' . $time->nice() . ' - ' . $appointment->duration . ' minutes' ?>
                            </div>
                            <!-- <a target="_blank" class="friends__status" href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'view', $appointment->patient->id]) ?>">Info</a> -->
                            <a href="<?= $this->Url->build(['action' => 'view', $appointment->id]) ?>" class="header__btn btn btn_blue __back btn__ssm">View Details</a>
                            <?php if (strtotime(new FrozenTime($appointment->date . ' ' . $appointment->start_time)) > strtotime(Time::now())): ?>
                            <?php else: ?>
                                <a href="javascript:;" class="header__btn btn btn_blue __purple btn__ssm">Meeting End</a>
                            <?php endif ?>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
            <br>
        <?php endforeach ?>
    </div>
</div>
