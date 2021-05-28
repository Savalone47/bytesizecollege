<?php

session_start();
include "../action.php";
include "position.php";
if (secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])){
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="Online Management System"/>
    <meta name="author" content="Online Management System"/>
    <title>All Event</title>
    <!-- google font -->
    <?php
    include 'headerLinks.php'; ?>
    <link rel="stylesheet" href="assets/plugins/fullcalendar/lib/main.min.css">
    <style>
        #script-warning {
            display: none;
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            color: red;
        }

        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 10px;
        }

    </style>
</head>
<!-- END HEAD -->

<body
        class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
<div class="page-wrapper">
    <?php
    include 'nav.php'; ?>

    <!-- start page container -->
    <div class="page-container">
        <?php
        include 'sidebar.php'; ?>


        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="row">
                    <div class="col-lg-12">
                        <a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
				GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
				egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
				tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
				ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e"
                                                                                                aria-hidden="true">Back</a>

                        <?php
                        if (secure($_SESSION['adminLevel']) == "1" || secure($_SESSION['adminLevel']) == "2" || secure(
                                $_SESSION['adminLevel']
                            ) == "5") { ?>
                            <a href="createEvent.php" id="panel-button1"
                               class="mdl-button mdl-js-button mdl-button--fab margin-right-10 btn-pink pull-right"
                            >
                                <i class="material-icons">add</i>
                            </a>

                            <?php
                        } ?>
                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col-sm-12">
                        <div style="    background: #fff;
					min-height: 50px;
					box-shadow: none;
					position: relative;
					margin-bottom: 20px;
					transition: .5s;
					border: 1px solid #f2f2f2;
					border-radius: 0;">

                            <div class="card-body ">
                                <div class="mdl-tabs mdl-js-tabs">
                                    <div class="mdl-tabs__tab-bar tab-left-side">
                                        <a href="#tab4-panel" class="mdl-tabs__tab is-active">All Events</a>


                                    </div>
                                    <div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
                                        <div class="row">
                                            <div id='calendar'></div>
                                            <div id='script-warning'>
                                                <code>There was a problem,</code> please contact the administrator.
                                            </div>

                                            <div id='loading'>loading...</div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- end page content -->


    </div>
</div>

<!-- end page container -->
<!-- start footer -->
<?php
include 'footer.php'; ?>

<!-- start js include path -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/popper/popper.js"></script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Common js-->
<script src="../assets/js/app.js"></script>
<script src="../assets/js/layout.js"></script>
<script src="../assets/js/theme-color.js"></script>
<!-- Material -->
<script src="../assets/plugins/material/material.min.js"></script>
<!--google map-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>
<!-- end js include path -->
<!-- end js include path -->


<?php
} else {
    echo "<script> alert('Please Login First!');
	window.location='logout.php';

	</script>";
}
?>

</body>

<!-- create exam modal -->
<div class="modal slide-left" id="tab2" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
    <div class="modal-dialog" role="document">
        <br>
        <div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal"></i></div>
        <div class="modal-content modal-info">
            <form action="back/createEvent.php" method="POST" >

                <div class="modal-body">

                    <div class="card-body row">
                        <div class="col-lg-12" style="text-align: center; color: #888">
                            <p>Create Events</p>
                        </div>
                        <div class="col-lg-12 p-t-20"><br>
                            <input type="text" name="title" class="mdl-textfield__input">
                            <label class="mdl-textfield__label" style="margin-left: 1rem">Event Name</label>


                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br><input class="mdl-textfield__input" type="date" id="txtFirstName" name="date">
                                <label class="mdl-textfield__label">Event Date</label>
                            </div>

                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br><input class="mdl-textfield__input" type="time" id="txtFirstName" name="start"
                                           required="">
                                <label class="mdl-textfield__label">Event Start Time</label>
                            </div>

                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br><input class="mdl-textfield__input" type="time" id="txtFirstName" name="end"
                                           required="">
                                <label class="mdl-textfield__label">Event End Time</label>
                            </div>

                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br>
                                <textarea class="mdl-textfield__input" name="address" rows="4" id="text7"></textarea>
                                <label class="mdl-textfield__label">Venue</label>
                            </div>

                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br>
                                <textarea class="mdl-textfield__input" rows="4" name="description"
                                          id="text7"></textarea>
                                <label class="mdl-textfield__label">Event Description</label>
                            </div>


                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br><input class="mdl-textfield__input" type="file" name="img">
                                <label class="mdl-textfield__label">Upload Poster</label>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info">
                        Create
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- end exam create modal -->
<script src="assets/plugins/fullcalendar/lib/main.min.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            initialDate: '2020-09-12',
            editable: true,
            navLinks: true, // can click day/week names to navigate views
            dayMaxEvents: true, // allow "more" link when too many events
            events: {
                url: 'back/get-events.php',
                failure: function() {
                    document.getElementById('script-warning').style.display = 'block'
                }
            },
            loading: function(bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
            }
        });

        calendar.render();
    });

</script>

</html>

