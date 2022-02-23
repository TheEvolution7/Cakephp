<?php 
use Cake\I18n\Time;
use Cake\Core\Configure;

echo $this->Form->create(); ?>

<!-- <link rel="stylesheet" href="https://www.jqueryscript.net/demo/powerful-calendar/style.css" />
<link rel="stylesheet" href="https://www.jqueryscript.net/demo/powerful-calendar/theme.css" /> -->

<div class="page2__container">
    <div id="time"><?php echo 'Selected: ' . Time::parse($this->request->getQuery('date'))->format('M d, Y') ?></div>
    <div class="schedule-container">
        <div class="box-choose-datetime">
            <div class="container">
                <div class="calendar-container"></div>
            </div>
            
        </div>
        
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<!-- <script src="https://www.jqueryscript.net/demo/powerful-calendar/calendar.js"></script> -->
<script src="<?=$webroot ?>js/calendar.min.js"></script>
<script src="https://unpkg.com/babel-polyfill@6.2.0/dist/polyfill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>





<!-- <link rel="stylesheet" href="<?= $webroot ?>vendor/fullcalendar-5/main.min.css">

<div class="page2__container">
    <div id="time"><?php echo 'Selected: ' . Time::parse($this->request->getQuery('date'))->format('M d, Y') ?></div>
    <div class="schedule-container">
        <div class="calendar" id="calendar"></div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
            header: {
                left: 'prev,next today',
                center: 'title'
            },
            aspectRatio: 1.8,
            initialView: 'dayGridMonth',
            initialDate: new Date(),
            selectable: true,
            businessHours: {
              daysOfWeek: false,
            },
            selectConstraint: {
              daysOfWeek: false,
            },
            select: function(info) {
                location.replace("<?= $this->Url->build(DS . $this->request->url) ?>?date=" + info.startStr)
            }
        });

        calendar.render();
    });
</script> -->

<!-- <script src="<?= $webroot ?>vendor/fullcalendar-5/main.min.js"></script> -->
<div id="list-slot">

    <div class="flex justify-center btn-step">
        <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
    </div>            
</div>



<script>
    $(function(){
      var calendar = $('.calendar-container').calendar({
          date: new Date(),
          showThreeMonthsInARow:true,
          min: moment().add(-1,'days'),
          onClickDate:function (date) {
            //location.replace("<?= $this->Url->build(DS . $this->request->url) ?>?date=" + formatDate(date));

            $(document).ready(function(){
                $.ajax({
                    type: 'GET',
                    url: '<?= $this->Url->build(['action' => 'listSlot', '_ext' => 'json']) ?>',
                    data: {date : formatDate(date)},
                    dataType: "html"
                }).done(function(msg) {
                    $('#list-slot').empty();
                    $('#list-slot').html(msg);
                });
                $('.calendar-container').updateCalendarOptions({
                    date: date
                });
            });

            }
        });
    });

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }
</script>

<script>
    $('.speciality-container .radio').on('click', function() {
        var data = $(this).val();
        $('#time').text( '<?php echo 'Selected: ' . Time::parse($this->request->getQuery('date'))->format('M d, Y') ?> at '+ data);
    })
</script>
<!-- <div class="form-container">
    <div class="medical_form_group flex">
        <div class="medical-form__subgroup flex gap-2 date-form">
            <div class="subgroup-item flex-1 flex flex-col">
                <div class="profiles-form-input" style="padding: 0;">
                    <div class="medical_form_subgroup__title"><label for="month_dor">Month</label></div>
                    <?php
                        echo $this->Form->date('date', [
                            'day' => false,
                            'month' => true,
                            'year' => false,
                            'value' => new dateTime()
                        ]);
                    ?>
                </div>
            </div>
            <div class="subgroup-item flex-1 flex flex-col">
                <div class="profiles-form-input" style="padding: 0;">
                    <div class="medical_form_subgroup__title"><label for="day_dor">Day</label></div>
                    <?php
                        echo $this->Form->date('date', [
                            'day' => true,
                            'month' => false,
                            'year' => false,
                            'value' => new dateTime()
                        ]);
                    ?>
                </div>
            </div>
            <div class="subgroup-item flex-1 flex flex-col">
                <div class="profiles-form-input" style="padding: 0;">
                    <div class="medical_form_subgroup__title"><label for="year_dor">Year</label></div>
                    <?php
                        echo $this->Form->date('date', [
                            'day' => false,
                            'month' => false,
                            'year' => true,
                            'value' => new dateTime(),
                            'minYear' => new dateTime()
                        ]);
                    ?>
                </div>
            </div>
            <div class="subgroup-item flex-1 flex flex-col">
                <div class="profiles-form-input" style="padding: 0;">
                    <div class="medical_form_subgroup__title"><label for="year_dor">Hour</label></div>
                    <?php
                        echo $this->Form->time('date', [
                            'hour' => true,
                            'minute' => false,
                            'value' => new dateTime(),
                        ]);
                    ?>
                </div>
            </div>
            <div class="subgroup-item flex-1 flex flex-col">
                <div class="profiles-form-input" style="padding: 0;">
                    <div class="medical_form_subgroup__title"><label for="year_dor">Minute</label></div>
                    <?php
                        echo $this->Form->time('date', [
                            'interval' => 15,
                            'hour' => false,
                            'minute' => true,
                            'meridian' => false,
                            'value' => new dateTime()
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center btn-step">
        <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
        <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
    </div>
</div>
<? echo $this->Form->end();
