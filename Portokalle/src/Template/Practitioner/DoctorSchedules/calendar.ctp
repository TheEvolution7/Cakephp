<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js"></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
        <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var calendarEl = document.getElementById("calendar");

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    themeSystem: 'bootstrap',
                    expandRows: true,
                    //contentHeight: "auto",
                    nowIndicator: true,
                    initialView: "dayGridMonth",
                    initialDate: new Date(),
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,dayGridWeek",
                    },
                    events: <?= $data ?>,
                    selectable: true,
                    dayMaxEvents: true
                });

                calendar.render();
            });
        </script>
    </head>
    <body>
        <div id="calendar"></div>
    </body>
</html>
