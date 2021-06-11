<?php

session_start();
include "../action.php";
include "position.php";
if (!(secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail']))){
    header("location: ");
}
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <?php
    include 'headerLinks.php'; ?>
    <!-- icons -->
    <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="assets1/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- full calendar -->
    <link href='assets1/assets/plugins/fullcalendar/packages/core/main.min.css' rel='stylesheet' />
    <link href='assets1/assets/plugins/fullcalendar/packages/daygrid/main.min.css' rel='stylesheet' />
    <link href='assets1/assets/plugins/fullcalendar/packages/timegrid/main.min.css' rel='stylesheet' />
    <link href='assets1/assets/css/pages/fullcalendar.css' rel='stylesheet' />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="assets1/assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="assets1/assets/css/material_style.css">
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="assets1/assets/plugins/flatpicker/css/flatpickr.min.css" />
    <!-- Theme Styles -->
    <link href="assets1/assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="assets1/assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="assets1/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets1/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets1/assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
</head>
<!-- END HEAD -->

<body
        class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
<div class="page-wrapper">
    <?php
    include 'nav.php'; ?>
    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <?php
        include 'sidebar.php'; ?>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Events</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                   href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Events</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-head">
                                <header>Calendar</header>
                            </div>
                            <div class="card-body">
                                <div class="panel-body">
                                    <div id="calendar" class="has-toolbar"> </div>
                                    <div id='loading'>
                                        <div class="mdl-spinner mdl-js-spinner is-active"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addEventTitle">Add Event</h5>
                                <h5 class="modal-title" id="editEventTitle">Edit Event</h5>
                                <div id="spinner" class="mdl-spinner mdl-js-spinner is-active" style="display: none;"></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="" id="eventForm">
                                    <input type="hidden" id="id" name="id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Title"
                                                           name="title" id="title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <label for="categorySelect">Category</label>
                                            <select class="form-select" id="categorySelect" name="categorySelect">
                                                <option id="work" value="fc-event-success">Work</option>
                                                <option id="personal" value="fc-event-warning">Personal</option>
                                                <option id="important" value="fc-event-primary">Important</option>
                                                <option id="travel" value="fc-event-danger">Travel</option>
                                                <option id="friends" value="fc-event-info">Friends</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="starts-at">Start Date</label>
                                                <input type="text" class="form-control datetimepicker"
                                                       placeholder="Start Date" name="starts_at" id="starts-at">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="ends-at">End Date</label>
                                                <input type="text" class="form-control datetimepicker"
                                                       placeholder="End Date" name="ends_at" id="ends-at">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="eventDetails">Event Details</label>
                                                <textarea name="eventDetails" id="eventDetails"
                                                          placeholder="Enter Details" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-whitesmoke pr-0">
                                        <button type="button" class="btn btn-round btn-primary" id="add-event">Add
                                            Event</button>
                                        <button type="button" class="btn btn-round btn-primary" id="edit-event">Edit
                                            Event</button>
                                        <button type="button" id="close" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <?php
    include 'footer.php'; ?>
    <!-- end footer -->
</div>
<!-- start js include path -->
<script src="assets1/assets/plugins/jquery/jquery.min.js"></script>
<script src="assets1/assets/plugins/popper/popper.js"></script>
<script src="assets1/assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="assets1/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="assets1/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- bootstrap -->
<script src="assets1/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets1/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="assets1/assets/plugins/moment/moment.min.js"></script>

<script src="assets1/assets/plugins/flatpicker/js/flatpicker.min.js"></script>
<!-- calendar -->
<script src='assets1/assets/plugins/fullcalendar/packages/core/main.min.js'></script>
<script src='assets1/assets/plugins/fullcalendar/packages/interaction/main.min.js'></script>
<script src='assets1/assets/plugins/fullcalendar/packages/daygrid/main.min.js'></script>
<script src='assets1/assets/plugins/fullcalendar/packages/timegrid/main.min.js'></script>

<!-- Common js-->
<script src="assets1/assets/js/app.js"></script>
<script src="assets1/assets/js/layout.js"></script>
<script src="assets1/assets/js/theme-color.js"></script>
<!-- Material -->
<script src="assets1/assets/plugins/material/material.min.js"></script>
<!-- end js include path -->
<script >
    let calendar;
    // var Draggable = FullCalendarInteraction.Draggable;
    let date_picker;

    // var containerEl = document.getElementById("external-events");
    // var checkbox = document.getElementById("drop-remove");
    var addEvent = document.getElementById("add-event");
    var editEvent = document.getElementById("edit-event");
    var addEventTitle = document.getElementById("addEventTitle");
    var editEventTitle = document.getElementById("editEventTitle");

    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();

    $(document).ready(function () {
        initCalendar();
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
    });

    function initCalendar() {
        var calendarEl = $("#calendar").get(0);
        calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ["interaction", "dayGrid", "timeGrid"],
            header: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay",
            },
            // editable: true,
            // droppable: true,
            navLinks: true,
            eventLimit: true,
            weekNumberCalculation: "ISO",
            displayEventEnd: true,
            lazyFetching: true,
            selectable: true,
            eventMouseEnter: function (info) {
                $(info.el).attr("id", info.event.id);

                $("#" + info.event.id).popover({
                    template:
                        '<div class="popover" role="tooltip"><div class="arrow"></div><h4 class="popover-header"></h4><div class="popover-body"></div></div>',
                    title: info.event.title,
                    content: info.event.extendedProps.details,
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

            events: {
                url: 'back/get-events.php',
                failure: function () {
                    document.getElementById('script-warning').style.display = 'block'
                }
            },
            loading: function (bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
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
                    .val(info.event.extendedProps.details);
            },
        });

        calendar.render();
    }

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
            $("#spinner").show();
            let title = $("#title").val();
            let eventDetails = document.getElementById("eventDetails").value;
            let category = $("#categorySelect").find(":selected").val();
            let randomID = randomIDGenerate(
                10,
                "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
            );
            let eventForm = $("#eventForm").serializeArray();
            console.log(eventForm);
            calendar.addEvent({
                id: randomID,
                title: title,
                start: $("#starts-at").val(),
                end: $("#ends-at").val(),
                className: category,
                description: eventDetails,
            });
            $.ajax({
                type: "POST",
                url: "back/createEvent.php",
                data: eventForm,
                success: function (data) {
                    $("#spinner").fadeOut(500);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    $("#spinner").hide();
                }
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

</script>
</body>


</html>
