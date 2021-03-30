<?php
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])){
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Sagan Academy" />
    <meta name="author" content="Sagan Academy" />
    <?php include 'headerLinks.php';?>
<link rel="stylesheet" href="calendar/fullcalendar/fullcalendar.min.css" />

<script src="calendar/fullcalendar/lib/jquery.min.js"></script>
<script src="calendar/fullcalendar/lib/moment.min.js"></script>
<script src="calendar/fullcalendar/fullcalendar.min.js"></script>

<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: false,
        events: "calendar/fetch-event.php",
        displayEventTime: true,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            //var title = prompt('Event Title:');
            var titl = window.location ='exams.php';
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'calendar/add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: false,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'calendar/edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
           // var deleteMsg = confirm("Do you really want to delete?");
           var titl = window.location ='exams.php';
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "calendar/delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

<style>
body {
    margin-top: 50px;
    text-align: center;
    font-size: 12px;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
}

#calendar {
    width: 700px;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}


.sidemenu-container .sidemenu>li>a, .sidemenu-closed.sidemenu-container-fixed .sidemenu-container:hover .sidemenu>li>a {
    display: flex;
    position: relative;
    margin: 0;
    padding: 17px 15px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 100 !important;
}


</style>


    
</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
<?php include 'nav.php'?>
    
        <!-- start page container -->
        <div class="page-container" style="background-color:#f0f1f2;">
            <!-- start sidebar menu -->
            <?php include'sidebar.php';?>
    <div class="response"></div>

    <div class="col-md-8 col-xs-4"id='calendar' style="margin-bottom: 60px;margin-top: 60px;"></div>

</div>
</div>

    <?php include 'footer.php';?>
<!-- start js include path -->
   <!-- <script src="../assets/plugins/jquery/jquery.min.js"></script>-->
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
</body>
<?php
}else{
    echo "<script>alert('Please login');</script>";
    echo "<script>window.location='logout.php';</script>";
}?>
</html>