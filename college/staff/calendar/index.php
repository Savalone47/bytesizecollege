<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

  <link href='./lib/fullcalendar.min.css' rel='stylesheet'/>
  <link href='./lib/fullcalendar.print.css' rel='stylesheet' media='print'/>
  <script src='./lib/jquery.min.js'></script>
  <script src='./lib/moment.min.js'></script>
  <script src='./lib/jquery-ui.custom.min.js'></script>
  <script src='./lib/fullcalendar.min.js'></script>
  <script>

    $(document).ready(function () {
      function fmt(date) {
        return date.format("YYYY-MM-DD HH:mm");

      }

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },

        events: "events.php",

        // Convert the allDay from string to boolean
        eventRender: function (event, element, view) {
          if (event.allDay === 'true') {
            event.allDay = false;
          } else {
            event.allDay = false;
          }
        },
       

      });

    });

  </script>
  <style>

    body {
      margin-top: 40px;
      text-align: center;
      font-size: 14px;
      font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;

    }

    #calendar {
      width: 900px;
      margin: 0 auto;
    }

  </style>
</head>
<?php 
include "../nav.php";
?>
<body>
<div id='calendar'></div>
</body>
</html>
