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
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- full calendar -->
    <link href='../assets/plugins/fullcalendar/packages/core/main.min.css' rel='stylesheet' />
    <link href='../assets/plugins/fullcalendar/packages/daygrid/main.min.css' rel='stylesheet' />
    <link href='../assets/plugins/fullcalendar/packages/timegrid/main.min.css' rel='stylesheet' />
    <link href='../assets/css/pages/fullcalendar.css' rel='stylesheet' />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="../assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="../assets/css/material_style.css">
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="../assets/plugins/flatpicker/css/flatpickr.min.css" />
    <!-- Theme Styles -->
    <link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" />
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
                    <div class="col-md-3 col-sm-12">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Draggable Event</header>
                            </div>
                            <div class="card-body">
                                <div id='external-events'>
                                    <div class="fc-event fc-event-success" data-class="fc-event-success">Work</div>
                                    <div class="fc-event fc-event-warning" data-class="fc-event-warning">Personal
                                    </div>
                                    <div class="fc-event fc-event-primary" data-class="fc-event-primary">Important
                                    </div>
                                    <div class="fc-event fc-event-danger" data-class="fc-event-danger">Travel</div>
                                    <div class="fc-event fc-event-info" data-class="fc-event-info">Friends</div>
                                    <br>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id='drop-remove'>
                                        <label class="custom-control-label" for="drop-remove">Remove after
                                            drop</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="card">
                            <div class="card-head">
                                <header>Calendar</header>
                            </div>
                            <div class="card-body">
                                <div class="panel-body">
                                    <div id="calendar" class="has-toolbar"> </div>
<!--                                    <div id='script-warning'>-->
<!--                                        There was a problem, please contact the administrator.-->
<!--                                    </div>-->

                                    <div id='loading'>loading...</div>
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="">
                                    <input type="hidden" id="id" name="id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Title"
                                                           name="title" id="title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <label>Category</label>
                                            <select class="form-select" id="categorySelect">
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
                                                <label>Start Date</label>
                                                <input type="text" class="form-control datetimepicker"
                                                       placeholder="Start Date" name="starts_at" id="starts-at">
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="text" class="form-control datetimepicker"
                                                       placeholder="End Date" name="ends_at" id="ends-at">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Event Details</label>
                                                <textarea id="eventDetails" name="eventDetails"
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
        <!-- start chat sidebar -->
        <div class="chat-sidebar-container" data-close-on-body-click="false">
            <div class="chat-sidebar">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#quick_sidebar_tab_1" class="nav-link active tab-icon" data-bs-toggle="tab"> <i
                                    class="material-icons">chat</i>Chat
                            <span class="badge badge-danger">4</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#quick_sidebar_tab_3" class="nav-link tab-icon" data-bs-toggle="tab"> <i
                                    class="material-icons">settings</i>
                            Settings
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- Start User Chat -->
                    <div class="tab-pane active chat-sidebar-chat in active show" role="tabpanel"
                         id="quick_sidebar_tab_1">
                        <div class="chat-sidebar-list">
                            <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd"
                                 data-wrapper-class="chat-sidebar-list">
                                <div class="chat-header">
                                    <h5 class="list-heading">Online</h5>
                                </div>
                                <ul class="media-list list-items">
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof3.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">John Deo</h5>
                                            <div class="media-heading-sub">Spine Surgeon</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">5</span>
                                        </div> <img class="media-object" src="../assets/img/prof/prof1.jpg"
                                                    width="35" height="35" alt="...">
                                        <i class="busy dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Rajesh</h5>
                                            <div class="media-heading-sub">Director</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof5.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="away dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jacob Ryan</h5>
                                            <div class="media-heading-sub">Ortho Surgeon</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">8</span>
                                        </div> <img class="media-object" src="../assets/img/prof/prof4.jpg"
                                                    width="35" height="35" alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Kehn Anderson</h5>
                                            <div class="media-heading-sub">CEO</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof2.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="busy dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Sarah Smith</h5>
                                            <div class="media-heading-sub">Anaesthetics</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof7.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Vlad Cardella</h5>
                                            <div class="media-heading-sub">Cardiologist</div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="chat-header">
                                    <h5 class="list-heading">Offline</h5>
                                </div>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">4</span>
                                        </div> <img class="media-object" src="../assets/img/prof/prof6.jpg"
                                                    width="35" height="35" alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jennifer Maklen</h5>
                                            <div class="media-heading-sub">Nurse</div>
                                            <div class="media-heading-small">Last seen 01:20 AM</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof8.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Lina Smith</h5>
                                            <div class="media-heading-sub">Ortho Surgeon</div>
                                            <div class="media-heading-small">Last seen 11:14 PM</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">9</span>
                                        </div> <img class="media-object" src="../assets/img/prof/prof9.jpg"
                                                    width="35" height="35" alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jeff Adam</h5>
                                            <div class="media-heading-sub">Compounder</div>
                                            <div class="media-heading-small">Last seen 3:31 PM</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof10.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Anjelina Cardella</h5>
                                            <div class="media-heading-sub">Physiotherapist</div>
                                            <div class="media-heading-small">Last seen 7:45 PM</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End User Chat -->
                    <!-- Start Setting Panel -->
                    <div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
                        <div class="chat-sidebar-settings-list slimscroll-style">
                            <div class="chat-header">
                                <h5 class="list-heading">Layout Settings</h5>
                            </div>
                            <div class="chatpane inner-content ">
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Sidebar Position</div>
                                        <div class="setting-set">
                                            <select
                                                    class="sidebar-pos-option form-control input-inline input-sm input-small ">
                                                <option value="left" selected="selected">Left</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Header</div>
                                        <div class="setting-set">
                                            <select
                                                    class="page-header-option form-control input-inline input-sm input-small ">
                                                <option value="fixed" selected="selected">Fixed</option>
                                                <option value="default">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Footer</div>
                                        <div class="setting-set">
                                            <select
                                                    class="page-footer-option form-control input-inline input-sm input-small ">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-header">
                                    <h5 class="list-heading">Account Settings</h5>
                                </div>
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Notifications</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-1">
                                                    <input type="checkbox" id="switch-1" class="mdl-switch__input"
                                                           checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Show Online</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-7">
                                                    <input type="checkbox" id="switch-7" class="mdl-switch__input"
                                                           checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Status</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-2">
                                                    <input type="checkbox" id="switch-2" class="mdl-switch__input"
                                                           checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">2 Steps Verification</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-3">
                                                    <input type="checkbox" id="switch-3" class="mdl-switch__input"
                                                           checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-header">
                                    <h5 class="list-heading">General Settings</h5>
                                </div>
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Location</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-4">
                                                    <input type="checkbox" id="switch-4" class="mdl-switch__input"
                                                           checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Save Histry</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-5">
                                                    <input type="checkbox" id="switch-5" class="mdl-switch__input"
                                                           checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Auto Updates</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-6">
                                                    <input type="checkbox" id="switch-6" class="mdl-switch__input"
                                                           checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <?php
    include 'footer.php'; ?>
    <!-- end footer -->
</div>
<!-- start js include path -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/popper/popper.js"></script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>

<script src="../assets/plugins/flatpicker/js/flatpicker.min.js"></script>
<!-- calendar -->
<script src='../assets/plugins/fullcalendar/packages/core/main.min.js'></script>
<script src='../assets/plugins/fullcalendar/packages/interaction/main.min.js'></script>
<script src='../assets/plugins/fullcalendar/packages/daygrid/main.min.js'></script>
<script src='../assets/plugins/fullcalendar/packages/timegrid/main.min.js'></script>

<!-- Common js-->
<script src="../assets/js/app.js"></script>
<script src="../assets/js/layout.js"></script>
<script src="../assets/js/theme-color.js"></script>
<!-- Material -->
<script src="../assets/plugins/material/material.min.js"></script>
<!-- end js include path -->
<script >
    let calendar;
    var Draggable = FullCalendarInteraction.Draggable;
    let date_picker;

    var containerEl = document.getElementById("external-events");
    var checkbox = document.getElementById("drop-remove");
    var addEvent = document.getElementById("add-event");
    var editEvent = document.getElementById("edit-event");
    var addEventTitle = document.getElementById("addEventTitle");
    var editEventTitle = document.getElementById("editEventTitle");

    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();

    (this.$eventModal = $("#event-modal")),
        new Draggable(containerEl, {
            itemSelector: ".fc-event",
            eventData: function (eventEl) {
                return {
                    title: eventEl.innerText,
                    stick: true,
                    className: eventEl.dataset.class,
                };
            },
        });

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
            editable: true,
            droppable: true,
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
            drop: function (info) {
                if (checkbox.checked) {
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
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
                    .val(info.event.extendedProps.description);
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

    /*function events() {
        return [
            {
                id: "event1",
                title: "All Day Event",
                start: new Date(year, month, 1, 0, 0),
                end: new Date(year, month, 1, 23, 59),
                className: "fc-event-success",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see.",
            },
            {
                id: "event2",
                title: "Break",
                start: new Date(year, month, day + 28, 16, 0),
                end: new Date(year, month, day + 29, 20, 0),
                allDay: false,
                className: "fc-event-primary",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see. ",
            },
            {
                id: "event3",
                title: "Shopping",
                start: new Date(year, month, day + 4, 12, 0),
                end: new Date(year, month, day + 4, 20, 0),
                allDay: false,
                className: "fc-event-warning",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see. ",
            },
            {
                id: "event4",
                title: "Meeting",
                start: new Date(year, month, day + 14, 10, 30),
                end: new Date(year, month, day + 16, 20, 0),
                allDay: false,
                className: "fc-event-success",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see.",
            },
            {
                id: "event5",
                title: "Lunch",
                start: new Date(year, month, day, 11, 0),
                end: new Date(year, month, day, 14, 0),
                allDay: false,
                className: "fc-event-primary",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see.",
            },
            {
                id: "event6",
                title: "Office Party",
                start: new Date(year, month, day + 2, 12, 30),
                end: new Date(year, month, day + 2, 14, 30),
                allDay: false,
                className: "fc-event-success",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see.",
            },
            {
                id: "event7",
                title: "Birthday Party",
                start: new Date(year, month, day + 17, 19, 0),
                end: new Date(year, month, day + 17, 19, 30),
                allDay: false,
                className: "fc-event-warning",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see.",
            },
            {
                id: "event8",
                title: "Go to Delhi",
                start: new Date(year, month, day + -5, 10, 0),
                end: new Date(year, month, day + -4, 10, 30),
                allDay: false,
                className: "fc-event-danger",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see.",
            },
            {
                id: "event9",
                title: "Get To Gather",
                start: new Date(year, month, day + 6, 10, 0),
                end: new Date(year, month, day + 7, 10, 30),
                allDay: false,
                className: "fc-event-info",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see.",
            },
            {
                id: "event10",
                title: "Collage Party",
                start: new Date(year, month, day + 20, 10, 0),
                end: new Date(year, month, day + 20, 10, 30),
                allDay: false,
                className: "fc-event-info",
                description:
                    "Her extensive perceived may any sincerity extremity. Indeed add rather may pretty see.",
            },
        ];
    }*/

</script>
</body>


</html>
