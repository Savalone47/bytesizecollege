<?php
session_start();
include "../action.php";
if (secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])){

$sql2 = "SELECT * FROM students where studentID='" . secure($_GET['id']) . "'";
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($query2);


?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="Sagan Academy"/>
    <meta name="author" content="Sagan Academy"/>
    <title><?php echo $row2['studentName'] ?> Report</title>
    <?php include 'headerLinks.php'; ?>

    <style type="text/css">
        .notif-right {
            cursor: pointer;
            position: fixed;
            right: 0;
            z-index: 9999999;
            top: 60px;
            margin-bottom: 22px;
            margin-right: 15px;
            max-width: 300px;
            transition: all .3s ease-in-out;
        }


        .modal {

        }

        .modal-primary {
            margin-top: 100px;
            border: 2px solid #7266ba;
        }

        .modal-primary .modal-header {
            color: #fff;
            background-color: #7266ba;
            box-shadow: inset 0px -5px 10px #4d4292;
            border-bottom: none;
        }

        .modal-primary .modal-header button {
            color: #fff;
            text-shadow: none;
            transition: all .3s ease-in-out;
        }

        .modal-primary .modal-header button:hover {
            color: #4d4292;
            text-shadow: none;
        }

        .modal-primary .modal-body span {
            color: #7266ba;
        }

        .modal-primary .modal-footer {
            border-top: none;
        }

        .modal-info {
            margin-top: 100px;
            border: 2px solid #23b7e5;
        }

        .modal-info .modal-header {
            color: #fff;
            background-color: #23b7e5;
            box-shadow: inset 0px -5px 10px #1485a8;
            border-bottom: none;
        }

        .modal-info .modal-header button {
            color: #fff;
            text-shadow: none;
            transition: all .3s ease-in-out;
        }

        .modal-info .modal-header button:hover {
            color: #1485a8;
            text-shadow: none;
        }

        .modal-info .modal-body span {
            color: #23b7e5;
        }

        .modal-info .modal-footer {
            border-top: none;
        }

        .modal-success {
            margin-top: 100px;
            border: 2px solid #2baab1;
        }

        .modal-success .modal-header {
            color: #fff;
            background-color: #2baab1;
            box-shadow: inset 0px -5px 10px #1c6f73;
            border-bottom: none;
        }

        .modal-success .modal-header button {
            color: #fff;
            text-shadow: none;
            transition: all .3s ease-in-out;
        }

        .modal-success .modal-header button:hover {
            color: #1c6f73;
            text-shadow: none;
        }

        .modal-success .modal-body span {
            color: #2baab1;
        }

        .modal-success .modal-footer {
            border-top: none;
        }

        .modal-warning {
            margin-top: 100px;
            border: 2px solid #edbc6c;
        }

        .modal-warning .modal-header {
            color: #fff;
            background-color: #edbc6c;
            box-shadow: inset 0px -5px 10px #e59d28;
            border-bottom: none;
        }

        .modal-warning .modal-header button {
            color: #fff;
            text-shadow: none;
            transition: all .3s ease-in-out;
        }

        .modal-warning .modal-header button:hover {
            color: #e59d28;
            text-shadow: none;
        }

        .modal-warning .modal-body span {
            color: #edbc6c;
        }

        .modal-warning .modal-footer {
            border-top: none;
        }

        .modal-danger {
            margin-top: 100px;
            border: 2px solid #e36159;
        }

        .modal-danger .modal-header {
            color: #fff;
            background-color: #e36159;
            box-shadow: inset 0px -5px 10px #cd2c23;
            border-bottom: none;
        }

        .modal-danger .modal-header button {
            color: #fff;
            text-shadow: none;
            transition: all .3s ease-in-out;
        }

        .modal-danger .modal-header button:hover {
            color: #cd2c23;
            text-shadow: none;
        }

        .modal-danger .modal-body span {
            color: #e36159;
        }

        .modal-danger .modal-footer {
            border-top: none;
        }


        .modal {
            transition: all 0.5s ease-in-out !important;
            transition: transform 0.5s ease-out !important;
        }

        @keyframes bumpy {
            0% {
                transform-style: preserve-3d;
                transform: perspective(10%) rotateY(-65deg) rotateX(-45deg) translateZ(-200px) scale(0);
                opacity: 0;
            }
            50% {
                transform: rotateY(10deg) rotateX(90deg) translateZ(10px) scale(0.5);
                opacity: 0.8;
            }
            100% {
                transform: rotateY(0deg) rotateX(0deg) translateZ(0px) scale(1);
                opacity: 1;
            }
        }

        @keyframes slide-left {
            0% {
                transform: translateX(200%) scale(0);
                opacity: 0;
            }
            100% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
        }

        @keyframes slide-right {
            0% {
                transform: translateX(-200%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
                transition: all 0.5s 0.1s;
            }
        }

        @keyframes wheel-left {
            0% {
                transform: translateX(-200%) scale(0) rotate(0deg);
                opacity: 0;
            }
            100% {
                transform: translateX(0) scale(1) rotate(360deg);
                opacity: 1;
                transition: all 1s 1s;
            }
        }

        @keyframes wheel-right {
            0% {
                transform: translateX(200%) scale(0) rotate(0deg);
                opacity: 0;
            }
            100% {
                transform: translateX(0) scale(1) rotate(360deg);
                opacity: 1;
                transition: all 1s 1s;
            }
        }

        .slide-left {
            overflow: hidden;
            animation: .75s slide-left both;
        }


        @keyframes pop {
            0% {
                opacity: 0;
                transform: scale(0);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media only screen and (max-width: 600px) {
            svg {

                display: none !important;

            }

        }

        .info-box-number {
            font-size: 12px;
        }

        .info-box-text {
            font-weight: 600;
        }

        .back {
            display: none !important
        }

        .close {
            color: red
        }

    </style>
</head>
<!-- END HEAD -->

<body
        class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">


<div class="page-wrapper">
    <?php include 'nav.php' ?>

    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <?php include 'sidebar.php'; ?>
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">
                            </div>
                        </div>
                        <a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
        GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
        egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
        tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
        ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <div class="card card-box">


                            <div class="card-head">


                                <header></header>


                            </div>
                            <div class="card-body" id="bar-parent">


                                <table id="exportTable" class="display ">
                                    <thead>
                                    <tr>


                                        <th>Module Name</th>
                                        <th>Assignment</th>
                                        <th>Exam</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php


                                    $sql = "SELECT * FROM modules inner join moduleAssign on modules.moduleID = moduleAssign.moduleID where moduleAssign.studentID='" . $_GET['id'] . "' ";


                                    $results = mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($results);

                                    if ($num > 0) {
                                        while ($row = mysqli_fetch_array($results)) {


                                            if ($row['moduleName'] == 'Mathematics Test Lesson' || $row['moduleName'] == 'Reading Lesson' || $row['moduleName'] == 'Homework Lesson' || $row['moduleName'] == 'English Test Lesson' || $row['moduleName'] == 'Science Test Lesson') {


                                            } else {
                                                ?>


                                                <tr>
                                                    <td><?php echo $row['moduleName']; ?></td>
                                                    <td>

                                                        <?php


                                                        $sqlite = "SELECT * FROM assignmentFeedback inner join assignment on assignmentFeedback.assignmentID = assignment.id  where assignmentFeedback.studentID ='" . secure($_GET['id']) . "' and assignment.moduleID ='" . $row['moduleID'] . "'";
                                                        $querylite = mysqli_query($conn, $sqlite);

                                                        while ($rowlite = mysqli_fetch_array($querylite)) {

                                                            $percentage = $rowlite['total'] / $rowlite['marks'] * 100;

                                                            ?>

                                                            <span><?php echo $rowlite['assignmentNo'] ?> : <?php echo round($percentage); ?>%</span>
                                                            <br/>

                                                        <?php } ?>


                                                    </td>

                                                    <td>

                                                        <?php

                                                        $sqlite = "SELECT examFeedback.marks as total, exam.marks as marks, exam.paper as examName  FROM examFeedback inner join exam on examFeedback.examID = exam.id where 
                  examFeedback.studentID='" . secure($_GET['id']) . "' and examFeedback.moduleID='" . $row['moduleID'] . "'";
                                                        $querylite = mysqli_query($conn, $sqlite);

                                                        while ($rowlite = mysqli_fetch_array($querylite)) {
                                                            $percentage1 = $rowlite['total'] / $rowlite['marks'] * 100;


                                                            ?>
                                                            <span> <?php echo $rowlite['examName'] ?> : <?php echo round($percentage1); ?>%</span>
                                                            <br/>


                                                        <?php } ?>


                                                    </td>


                                                </tr>
                                                <?php
                                            }

                                        }

                                    }


                                    ?>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- end widget -->
                <!-- /.col -->
            </div>
        </div>
        <!-- end widget -->
    </div>
    <!-- Chart end -->
    <!-- Activity feed start -->
</div>
</div>
</div>
<!-- end page content -->


<!-- start footer -->
<?php include 'footer.php'; ?>
<!-- end footer -->
</div>
<!-- start js include path -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
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

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables/export/jszip.min.js"></script>
<script src="../assets/plugins/datatables/export/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/export/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/export/buttons.print.min.js"></script>
<script src="assets/js/pages/table/table_data.js"></script>
<script type="text/javascript">
    var move = "250px";

    // Sidebar function
    $( document ).ready(function() {
        function openNav() {
            $('.sidebar').addClass('active').css({"box-shadow": "inset -5px -3px 10px #000"});
            $(this).addClass('active');
            $('.boomy').removeClass('hidden');
            $('.boom').addClass('hidden');
            $('.tipText-right').addClass('hidden');
            $(".sidebar").children().css({"opacity": 1, "transition": "all .3s ease-in-out"});
            // setTimeout(function() {
            // $('.profile').delay(300)removeClass('hidden');
            $('.profile').fadeIn(400, function () {
                $(this).removeClass('hidden');
            });
            //   }, 300);


            if ($(window).width() < 512) {
                $("#main").animate({"margin-left": "60px"}, 10);
                // $(".boom").animate({"margin-left": move},500);
            } else {
                $("#main").animate({"margin-left": move}, 10);
            }

        }

        function closeNav() {
            $('.sidebar').removeClass('active').css({"box-shadow": "none"});
            $(this).removeClass('active');
            $('.boom').removeClass('hidden');
            $('.boomy').addClass('hidden');
            $(this).attr("onClick", "openNav();");
            $('.tipText-right').removeClass('hidden');
            $(".sidebar").children().closest('span').css({"opacity": 0, "transition": "all .3s ease-in-out"});
            $('.profile').fadeOut(300, function () {
                $(this).addClass('hidden');
            });
            //prevent increase of margin when clicked multiple times
            if ($(window).width() < 512) {
                if ($("main").css("margin-left") === "60px")
                    $("#main").animate({"margin-left": "-=" + move}, 10);
                else
                    $("#main").animate({"margin-left": 0}, 10);
            } else {
                if ($("main").css("margin-left") === 0)
                    $("#main").animate({"margin-left": "-=" + move}, 10);
                else
                    $("#main").animate({"margin-left": "60px"}, 10);
            }

// $(".boom").animate({"margin-left": "-=" + move}, 500);
        }


        function Notify(text, style, container) {

            var time = '5000';
            console.log(container);
            var $container = $('#' + container + '');
            console.log($container);
            var icon = '<i class="fa fa-info-circle "></i>';

            if (style == 'primary') {
                icon = '<i class="fa fa-bookmark "></i>';
            }

            if (style == 'info') {
                icon = '<i class="fa fa-info-circle "></i>';
            }

            if (style == 'success') {
                icon = '<i class="fa fa-check-circle "></i>';
            }

            if (style == 'warning') {
                icon = '<i class="fa fa-exclamation-circle "></i>';
            }

            if (style == 'danger') {
                icon = '<i class="fa fa-exclamation-triangle "></i>';
            }

            if (style == 'default') {
                icon = '<i class="fa fa-user "></i>';
            }

            if (style == 'undefined') {
                style = 'warning';

            }

            var html = $('<div class="alert alert-' + style + '  hide">' + icon + " " + text + '</div>');


            console.log(html);

            $('<a>', {
                text: '×',
                class: 'button close',
                style: 'padding-left: 10px;',
                href: 'javascript:void(0)',
                click: function (e) {
                    e.preventDefault();
                    //  close_callback && close_callback();
                    remove_notice();
                }
            }).prependTo(html);

            $container.prepend(html);
            html.removeClass('hide').hide().fadeIn('slow');

            function remove_notice() {
                html.stop().fadeOut('fast');
            }

            var timer = setInterval(remove_notice, time);

            $(html).hover(function () {
                clearInterval(timer);
            }, function () {
                timer = setInterval(remove_notice, time);
            });

            $(html).on('click', function () {
                clearInterval(timer);
                // callback && callback();
                remove_notice();
            });


        }


        $('.primary').on('click', function () {
            Notify("Welcome Back!", 'primary', 'notifications');
        });
        $('.info').on('click', function () {
            Notify("You have new e-mail!", 'info', 'notification2');
        });
        $('.success').on('click', function () {
            Notify("The data has been saved!", 'success', 'notification3');
        });
        $('.warning').on('click', function () {
            Notify("Memory Almost Full! ", 'warning', 'notification4');
        });
        $('.danger').on('click', function () {
            Notify("Oh no! There's a virus!", 'danger', 'notification5');
        });
        $('.default').on('click', function () {
            Notify("I have no idea, too", 'default', 'notification7');
        });

    }
</script>



<?php } else {
    echo "<script> alert(Please Login First!');
  window.location='logout.php';

  </script>";
} ?>
</body>

</html>