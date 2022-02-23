<?php 
use Cake\I18n\Time;
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
      
      $out = "";
      $out += days > 0 ? days + "d " : "";
      $out += hours > 0 ? hours + "h ": "";
      $out += minutes > 0 ? minutes + "m ": "";
      $out += seconds > 0 ? seconds + "s ": "";
      // Output the result in an element with id="demo"
      document.getElementById("notification-" + id).innerHTML = $out;
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("notification-" + id).innerHTML = "EXPIRED";
      }
    }, 1000);
}

</script>
<div class="page2__container">
    <div class="notifications">
      <div class="sorting1">
        <div class="sorting1__row">
          <h1 class="sorting1__title title"><?= __('Notifications') ?></h1>
        </div>
      </div>
      <div class="notifications__list">
        
        <?php if(!empty($notifications)): ?>
            <?php foreach($notifications as $notification):?>
                <a href="<?= $notification->link ?>" class="notifications__item">
                    <div class="ava"><img class="ava__pic" src="<?= $notification->photo ?>"></div>
                      <div class="notifications__details">
                        <div class="notifications__text">
                            <strong><?= $notification->text ?></strong>
                            <?php 
                                if (unserialize($notification->appointment->data_save)['slot']['date']) {
                                    $time = new Time(__('{0} {1}', [$notification->appointment->date->format('Y-m-d'), $notification->appointment->start_time]));
                                }               
                            ?>
                            <?php if ($time): ?>
                                <strong id="notification-<?= $notification->id ?>"><?= '<script>countDownDate("' . $time->nice() . '", ' . $notification->id . ');</script>' ?></strong>
                            <?php endif ?>
                            

                            <?php if (!$notification->is_read): ?>
                                <strong class="new">
                                    <span></span>
                                    - <?= __('New') ?>
                                </strong>
                            <?php endif; ?>

                        </div>
                        <div class="notifications__time"><?= $notification->time ?></div>

                      </div>
                      <div style="text-align: left;">
                        <?php  
                        echo $notification->created->timeAgoInWords([
                            'accuracy' => ['hour' => 'hour', 'day' => 'day', 'month' => 'month'],
                            'end' => '+1 year',
                            'format' => 'MMM d, YYY',
                        ]);
                        ?>
                        </div>
                </a>
            <?php endforeach;?>

            <div class="pagination-centered">
                <ul class="pagination">
                    <?php if ($this->Paginator->hasPrev()): ?>
                        <?= $this->Paginator->prev('«'); ?>
                    <?php endif; ?>
                    <?= $this->Paginator->numbers(['modulus' => 5]); ?>
                    <?php if ($this->Paginator->hasNext()): ?>
                        <?= $this->Paginator->next('»'); ?>
                    <?php endif; ?>
                </ul>
            </div>
        <?php else: ?>
            <h5>
                <?= __("You don't have any notification yet."); ?>
            </h5>
        <?php endif; ?>
        
      </div>
    </div>
</div>

