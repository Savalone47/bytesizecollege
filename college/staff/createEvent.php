<?php

session_start();
include "../action.php";
include "position.php";
if (secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Responsive Admin Template" />
        <meta name="author" content="SmartUniversity" />
        <title>Smart University | Bootstrap Responsive Admin Template</title>
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
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
        <link rel="shortcut icon" href="../assets/img/favicon.ico" />
    </head>
    <!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
	<?php include 'nav.php';?>

			<!-- start page container -->
			<div class="page-container">
				<?php include 'sidebar.php';?>
			<div class="page-content-wrapper">
				<div class="page-content">
							<div class="row">
				<div class="col-lg-12">
					<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
				GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
				egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
				tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
				ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
			

				</div>
			</div>
			<br>
					<div class="row">
						<div class="col-lg-12">
							 <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" class="form-control" placeholder="Enter ...">
                             </div>
						</div>
						<div class="col-md-12 col-sm-12">
							 <label>Description</label>
							<textarea name="formsummernote" id="formsummernote" cols="30" rows="10">
					            <h3 style="text-align: center;">
									<a href="#"	style="background-color: rgb(255, 255, 255); line-height: 1.428571429;">Welcome to TextEditor</a>
								</h3>
					        </textarea>
						</div>

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
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 &copy; Smart University Theme By
                <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">Redstar Theme</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
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
    <script src="../assets/js/pages/calendar/calendar.min.js"></script>

    <!-- Common js-->
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/layout.js"></script>
    <script src="../assets/js/theme-color.js"></script>
    <!-- Material -->
    <script src="../assets/plugins/material/material.min.js"></script>
    <!-- end js include path -->
    </body>

    </html>

    <?php
} else {
    echo "<script> alert('Please Login First!');
	window.location='logout.php';

	</script>";
}
