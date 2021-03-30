<?php
session_start();
include "../action.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

  <link href='calendar/lib/fullcalendar.min.css' rel='stylesheet'/>
  <link href='calendar/lib/fullcalendar.print.css' rel='stylesheet' media='print'/>
  <script src='calendar/lib/jquery.min.js'></script>
  <script src='calendar/lib/moment.min.js'></script>
  <script src='calendar/lib/jquery-ui.custom.min.js'></script>
  <script src='calendar/lib/fullcalendar.min.js'></script>
  <?php include 'headerLinks.php';?>
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
    .sidemenu-container .sidemenu>li>a {
   text-align: left !important;
}

  </style>
</head>

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">



  <div class="page-wrapper" >
    <?php include 'nav.php'?>
<div class="page-container">
      <!-- start sidebar menu -->
      <?php include'sidebar.php';?>
      <!-- start page content -->
      <div class="page-content-wrapper">
        <div class="page-content">



<div id='calendar' style="margin-top: 55px !important"></div>
</div>
</div>
</div>
<?php include 'footer.php';?>
</div>

<!-- start js include path -->

<script src="assets/plugins/popper/popper.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="assets/js/pages/sparkline/sparkline-data.js"></script>
<!-- Common js-->
<script src="assets/js/app.js"></script>
<script src="assets/js/layout.js"></script>
<script src="assets/js/theme-color.js"></script>
<!-- material -->
<script src="assets/plugins/material/material.min.js"></script>
<!--apex chart-->
<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/chart/chartjs/home-data.js"></script>
<!-- summernote -->
<script src="assets/plugins/summernote/summernote.js"></script>
<script src="assets/js/pages/summernote/summernote-data.js"></script>
<!-- end js include path -->
<script type="text/javascript">
      $(document).ready(function() {
     
          $(".exams").addClass("active");
          });
  </script>
</body>
</html>
