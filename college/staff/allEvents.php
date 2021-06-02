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
            /*max-width: 1100px;*/
            /*margin: 40px auto;*/
            /*width: 100%;*/
            /*padding: 0 10px;*/
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
                        <a href="" class="backbtn" onclick="history.go(-1); return false;"><img alt="Back" src="data:image/png;base64,iVBORw0K
				GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
				egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
				tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
				ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>

                        <?php
                        if (secure($_SESSION['adminLevel']) == "1" || secure($_SESSION['adminLevel']) == "2" || secure(
                                $_SESSION['adminLevel']
                            ) == "5") { ?>
                            <a href="createEvent.php" id="panel-button1"
                               class="mdl-button mdl-js-button mdl-button--fab margin-right-10 btn-pink pull-right">
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
                                            <div class="col-md-offset-1 col-md-10" id='calendar'></div>
                                            <div id='script-warning'>
                                                There was a problem, please contact the administrator.
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
            <form action="back/createEvent.php" method="POST">

                <div class="modal-body">

                    <div class="card-body row">
                        <div class="col-lg-12" style="text-align: center; color: #888">
                            <p>Create Events</p>
                        </div>
                        <div class="col-lg-12 p-t-20"><br>
                            <input id="title" type="text" name="title" class="mdl-textfield__input">
                            <label class="mdl-textfield__label" style="margin-left: 1rem" for="title">Event Name</label>


                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br><input class="mdl-textfield__input" type="date" id="txtFirstName" name="date">
                                <label for="txtFirstName" class="mdl-textfield__label">Event Date</label>
                            </div>

                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br><input class="mdl-textfield__input" type="time" id="start" name="start"
                                           required="">
                                <label for="start" class="mdl-textfield__label">Event Start Time</label>
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
                                <label for="text7" class="mdl-textfield__label">Venue</label>
                            </div>

                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br>
                                <textarea class="mdl-textfield__input" rows="4" name="description"
                                          id="text8"></textarea>
                                <label for="text8" class="mdl-textfield__label">Event Description</label>
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
<script src="assets/plugins/moment/moment.min.js"></script>

<script src="assets/plugins/flatpicker/js/flatpicker.min.js"></script>

<script src="assets/plugins/fullcalendar/lib/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.7.0/main.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.7.0/main.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.7.0/main.global.min.js"></script>

<script>
    let calendarEl = document.getElementById('calendar');
    let date_picker;
    let checkbox = document.getElementById("drop-remove");
    let addEvent = document.getElementById("add-event");
    let editEvent = document.getElementById("edit-event");
    let addEventTitle = document.getElementById("addEventTitle");
    let editEventTitle = document.getElementById("editEventTitle");

    document.addEventListener('DOMContentLoaded', function () {
        addEvetClick();
        editEvetClick();
        flatpickr("#starts-at", {
            enableTime: true,
            allowInput: true,
            dateFormat: "Y-m-d H:i",
            onOpen: function (selectedDates, dateStr, instance) {
                instance.setDate(instance.input.value, false);
            },
        });
        flatpickr("#ends-at", {
            enableTime: true,
            allowInput: true,
            dateFormat: "Y-m-d H:i",
            onOpen: function (selectedDates, dateStr, instance) {
                instance.setDate(instance.input.value, false);
            },
        });

        let calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ["interaction", "dayGrid", "timeGrid"],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            initialDate: (new Date()).toISOString().split('T')[0],
            selectable: true,
            navLinks: true, // can click day/week names to navigate views
            dayMaxEvents: true, // allow "more" link when too many events
            selectMirror: true,
            editable: true,
            eventLimit: true,
            weekNumberCalculation: "ISO",
            displayEventEnd: true,
            lazyFetching: true,
            eventMouseEnter: function (info) {
                $(info.el).attr("id", info.event.id);

                $("#" + info.event.id).popover({
                    template:
                        '<div class="popover" role="tooltip"><div class="arrow"></div><h4 class="popover-header"></h4><div class="popover-body"></div></div>',
                    title: info.event.title,
                    content: info.event.extendedProps.description,
                    placement: "top",
                    html: true,
                });
                $("#" + info.event.id).popover("show");
                $(".popover .popover-header").css(
                    "color",
                    $(info.el).css("background-color")
                );
            },
            eventMouseLeave: function (info) {
                $("#" + info.event.id).popover("hide");
            },
            views: {
                dayGridMonth: {
                    eventLimit: 3,
                },
            },

            select: function (start, end) {
                addEvent.style.display = "block";
                editEvent.style.display = "none";
                addEventTitle.style.display = "block";
                editEventTitle.style.display = "none";

                clearModalForm();
                $(".modal").modal("show");
            },
            eventClick: function (info) {
                addEvent.style.display = "none";
                editEvent.style.display = "block";
                addEventTitle.style.display = "none";
                editEventTitle.style.display = "block";

                let startDate = moment(info.event.start).format("YYYY-MM-DD HH:mm:ss");
                let endDate = moment(info.event.end).format("YYYY-MM-DD HH:mm:ss");

                // console.log(info.event.extendedProps.description);
                $(".modal").modal("show");
                $(".modal").find("#id").val(info.event.id);
                $(".modal").find("#title").val(info.event.title);
                $(".modal").find("#starts-at").val(startDate);
                $(".modal").find("#ends-at").val(endDate);
                $("#categorySelect").val(info.event.classNames[0]);
                $(".modal")
                    .find("#eventDetails")
                    .val(info.event.extendedProps.description);
            },
            events: {
                url: 'back/get-events.php',
                failure: function () {
                    document.getElementById('script-warning').style.display = 'block'
                }
            },
            loading: function (bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
            }
        });

        calendar.render();

        function clearModalForm() {
            var input = document.querySelectorAll('input[type="text"]');
            var textarea = document.getElementsByTagName("textarea");
            for (i = 0; i < input.length; i++) {
                input[i].value = "";
            }
            for (j = 0; j < textarea.length; j++) {
                textarea[j].value = "";
                i;
            }
        }

        function addEvetClick() {
            $("#add-event").on("click", function (event) {
                var title = $("#title").val();
                var eventDetails = document.getElementById("eventDetails").value;
                var category = $("#categorySelect").find(":selected").val();
                var randomID = randomIDGenerate(
                    10,
                    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
                );
                calendar.addEvent({
                    id: randomID,
                    title: title,
                    start: $("#starts-at").val(),
                    end: $("#ends-at").val(),
                    className: category,
                    description: eventDetails,
                });
                // Clear modal inputs
                $(".modal").find("input").val("");
                // hide modal
                $(".modal").modal("hide");
            });
        }

        function editEvetClick() {
            $("#edit-event")
                .off("click")
                .on("click", function (event) {
                    event.preventDefault();
                    var category = $("#categorySelect").find(":selected").val();

                    var event2 = calendar.getEventById(document.getElementById("id").value);

                    var eventDetails = document.getElementById("eventDetails").value;
                    var category = $("#categorySelect").find(":selected").val();

                    event2.setExtendedProp("id", document.getElementById("id").value + "");
                    event2.setProp("title", document.getElementById("title").value + "");
                    event2.setStart(
                        moment(document.getElementById("starts-at").value).format(
                            "YYYY-MM-DD HH:mm:ss"
                        )
                    );
                    event2.setEnd(
                        moment(document.getElementById("ends-at").value).format(
                            "YYYY-MM-DD HH:mm:ss"
                        )
                    );
                    event2.setProp("classNames", category);
                    event2.setExtendedProp("description", eventDetails);
                    $(".modal").modal("hide");
                });
        }
        function randomIDGenerate(length, chars) {
            var result = "";
            for (var i = length; i > 0; --i)
                result += chars[Math.round(Math.random() * (chars.length - 1))];
            return result;
        }

    });

</script>

</html>

