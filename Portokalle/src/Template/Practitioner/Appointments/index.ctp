<?php 
use Cake\I18n\Time;
use Cake\I18n\FrozenTime;
?>
<script>

function countDownDate(date, id){
    // Set the date we're counting down to
    var countDownDate = new Date(date).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
        
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
      $out = " - ";
      $out += days > 0 ? days + "d " : "";
      $out += hours > 0 ? hours + "h ": "";
      $out += minutes > 0 ? minutes + "m ": "";
      $out += seconds > 0 ? seconds + "s ": "";
      // Output the result in an element with id="demo"
      document.getElementById("notification-" + id).innerHTML = $out;
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("notification-" + id).innerHTML = "- Expired";
      }
    }, 0);
}

</script>
<div class="page2__container __page-dropin">
    <div class="schedule-container">
        <?php foreach ($combined as $key => $items): ?>
            <?php
                $current = strtotime(date("Y-m-d"));
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
                                <?php echo !$appointment->practitioner_read ? ' - New' : null ?>
                                <?php 
                                    $time = new Time(__('{0} {1}', [$appointment->date->format('Y-m-d'), $appointment->start_time]));
                                ?>

                                <!-- <?php if ($time): ?>
                                    <strong id="notification-<?= $appointment->id ?>"><?= '<script>countDownDate("' . $time->nice() . '", ' . $appointment->id . ');</script>' ?></strong>
                                <?php endif ?> -->
                            </div>
                            <div class="friends__login"><?= ucfirst($appointment->patient->sex) . ' - '. (date('Y') - $appointment->patient->date_of_birth->format('Y')) . ' year old' ?></div>
                            <div class="friends__text">
                                
                                <?= $appointment->status . ' - ' . $time->nice() . ' - ' . $appointment->duration . ' minutes' ?>
                            </div>
                            <a target="_blank" class="friends__status" href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'view', $appointment->patient->id]) ?>">Info</a>
                            <a href="<?= $this->Url->build(['action' => 'view', $appointment->id]) ?>" class="header__btn btn btn_blue __back btn__ssm">View symptoms</a>
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
