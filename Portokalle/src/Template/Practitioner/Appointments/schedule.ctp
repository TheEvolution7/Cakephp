<link rel="stylesheet" href="<?= $webroot ?>vendor/fullcalendar-5/main.min.css">

<div class="page2__container">
    <div class="schedule-container">
        <div class="box-status-calendar">
            <div class="not-available">
                <span></span>
                Not Available
            </div>
            <div class="available">
                <span></span>
                Available
            </div>
            <div class="new-available">
                <span></span>
                New Available
            </div>
        </div>
        <div class="calendar" id="calendar"></div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },

            nowIndicator: true,

            views: {
                dayGridMonth: { buttonText: 'month' },
                timeGridWeek: { buttonText: 'week' },
                timeGridDay: { buttonText: 'day' }
            },
            defaultView: 'timeGridDay',
            initialDate: new Date(),
            events: <?= json_encode($dateCalendar) ?>
        });

        calendar.render();
    });
</script>

<script src="<?= $webroot ?>vendor/fullcalendar-5/main.min.js"></script>