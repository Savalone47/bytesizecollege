<?php
include "../action.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="LMS"/>
    <meta name="author" content="LMS"/>
    <title>Vinco | Staff</title>
    <?php include "headerLinks.php"; ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css"/>
    <!-- icons -->
    <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="../assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="../assets/css/material_style.css">
    <!-- inbox style -->
    <link href="../assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme Styles -->
    <link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico"/>
</head>
<!-- END HEAD -->

<body
        class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
<div class="page-wrapper">
    <!-- start header -->
    <?php include 'nav.php' ?>
    <!-- end header -->

    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->

        <?php include 'sidebar.php'; ?>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Reports</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                   href="index.php">Home</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Reports</li>
                        </ol>
                    </div>
                </div>
                <!-- start widget -->
                <div class="state-overview">
                    <div class="row">

                        <div class="col-xl-4 col-md-6 col-12">
                            <a href="allStudents_printable.php">
                                <div class="info-box bg-b-green" style="color: #fff;">
                                    <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">All Students</span>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM students");
                                        $num = mysqli_num_rows($sql);

                                        ?>
                                        <span class="info-box-number"><?= $num; ?> students</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?= $num * 100 / 500 ?>%"></div>
                                        </div>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>
                        </div>

                        <!-- /.col -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <a href="student_per_course.php">
                                <div class="info-box bg-b-yellow" style="color: #fff;">
                                    <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
                                    <div class="info-box-content">
                                        <?php
                                        if ($sql_course = mysqli_query($conn, "SELECT courseCode,courseName FROM courses Group by courseCode")) {
                                            $course = mysqli_num_rows($sql_course);
                                        } else {
                                            $course = 0;
                                        }
                                        ?>
                                        <span class="info-box-text"> Students Per Course</span>
                                        <span class="info-box-number"><?= $course; ?> courses dispensed</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?= $course * 100 / 50 ?>%"></div>
                                        </div>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>
                            <!-- /.info-box -->
                        </div>

                        <div class="col-xl-4 col-md-6 col-12">
                            <a href="students_per_branch.php">
                                <div class="info-box bg-b-blue" style="color: #fff;">
                                    <span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text" >Students Per Branch</span>
                                        <?php
                                        $sql_branch = mysqli_query($conn,"SELECT * FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by department.departmentID");

                                        $branch= mysqli_num_rows($sql_branch);

                                        ?>
                                        <span class="info-box-number"><?=$branch;?> branches</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?=$num/100;?>%"></div>
                                        </div>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>
                        </div>

                        <!-- /.col -->

                        <div class="col-xl-4 col-md-6 col-12">
                            <a href="staff_login_report.php">
                                <div class="info-box bg-b-" style="background-color: #8E44AD !important; color: #fff;">
                                    <span class="info-box-icon push-bottom"><i
                                                class="material-icons">content_cut</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Staff Login</span>
                                        <?php
                                        $sql_branch = mysqli_query($conn, "SELECT * FROM userlog WHERE userType = 'staff'");

                                        $staff = mysqli_num_rows($sql_branch);

                                        ?>
                                        <span class="info-box-number"><?= $staff; ?> in total</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?= $num / 100; ?>%"></div>
                                        </div>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>
                        </div>


                        <div class="col-xl-4 col-md-6 col-12">
                            <a href="student_login_report.php">
                                <div class="info-box bg-b-" style="background-color: #e91e63 !important; color: #fff;">
                                    <span class="info-box-icon push-bottom"><i
                                                class="material-icons">content_cut</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Student Login</span>
                                        <?php
                                        $sql_branch = mysqli_query($conn, "SELECT * FROM userlog WHERE userType = 'STUDENT'");

                                        $student = mysqli_num_rows($sql_branch);

                                        ?>
                                        <span class="info-box-number"><?= $student; ?> in total</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?= $num / 100; ?>%"></div>
                                        </div>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <!-- end page container -->
    <!-- start footer -->
    <?php include "footer.php"; ?>
    <!-- end footer -->
</div>
<!-- start js include path -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/popper/popper.js"></script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="../assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="../assets/js/pages/sparkline/sparkline-data.js"></script>
<!-- Common js-->
<script src="../assets/js/app.js"></script>
<script src="../assets/js/layout.js"></script>
<script src="../assets/js/theme-color.js"></script>
<!-- material -->
<script src="../assets/plugins/material/material.min.js"></script>
<!--apex chart-->
<script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="../assets/js/pages/chart/chartjs/home-data.js"></script>
<!-- summernote -->
<script src="../assets/plugins/summernote/summernote.js"></script>
<script src="../assets/js/pages/summernote/summernote-data.js"></script>
<!-- end js include path -->
</body>


</html>
