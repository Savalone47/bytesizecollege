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
    <meta name="description" content="Learning Management System"/>
    <meta name="author" content="Mazisi Msebele"/>
    <title>Vinco | Reports</title>
    <?php include 'headerLinks.php'; ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css"/>
    <!-- icons -->
    <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="../assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="../assets/css/material_style.css">
    <!-- Data Tables -->
    <!-- <link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- Theme Styles -->
    <link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css"/>
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
    <!-- start color quick setting -->

    <!-- end color quick setting -->
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

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <br>
                                        <?php
                                        $sql = "SELECT * FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by department.departmentID";
                                        $result = mysqli_query($conn, $sql);
                                        ?>
                                        <select class="form-control" id="departmentFilter">
                                            <option value="">All Branches</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?php echo $row['departmentName'] ?>"><?php echo $row['departmentName'] ?></option>
                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>
                            </div>


                            <!-- filtering per course -->
                            <div class="col-md-4 text-center showCourse" style="display: none;">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <br>
                                        <?php
                                        $sqlite = "SELECT courseCode,courseName FROM courses Group by courseCode";
                                        $resultt = mysqli_query($conn, $sqlite);
                                        ?>
                                        <select class="form-control" id="courseFilter">
                                            <option value="all">All Courses</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($resultt)) {
                                                ?>
                                                <option value="<?php echo $row['courseCode'] ?>"><?php echo $row['courseName'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- filtering per intake -->
                            <div class="col-md-4 text-center showIntake" style="display: none;">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <br>
                                        <?php
                                        $sqlite = "SELECT * FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by courses.courseIntake";
                                        $resultt = mysqli_query($conn, $sqlite);
                                        ?>
                                        <select class="form-control" id="intakeFilter">
                                            <option value="all">All Intakes</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($resultt)) {
                                                ?>
                                                <option value="<?php echo $row['courseIntake'] ?>"><?php echo $row['courseIntake'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-box">

                            <div class="card-body " id="bar-parent">
                                <table id="exportTable"
                                       class="table  table-striped table-bordered table-hover table-checkable order-column dataTable no-footer "
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Id Number</th>
                                        <th>Email</th>
                                        <th>Student Number</th>
                                        <th>Gender</th>
                                        <!-- <th>Edit</th> -->
                                    </tr>
                                    </thead>
                                    <tbody id="contentBox">


                                    </tfoot>
                                </table>
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
<!-- Common js-->
<script src="../assets/js/app.js"></script>
<script src="../assets/js/layout.js"></script>
<script src="../assets/js/theme-color.js"></script>
<!-- Material -->
<script src="../assets/plugins/material/material.min.js"></script>

</body>


<script type="text/javascript">
    $(document).ready(function () {
        fetchAll();

        function fetchAll() {
            var action = "fetchAll";
            $.ajax({
                type: "POST",
                url: 'back/filter_per_branch.php',
                data: {action: action},
                success: function (data) {
                    $('#contentBox').html(data);
                    //var pagination = [data];
                }
            });
        }
    });

    $(document).on('change', '#departmentFilter', function () {

        $('.showCourse').css('display', 'block');
        $('#courseFilter').prop('selectedIndex',0);
        $('#intakeFilter').prop('selectedIndex',0);
        server();

    });

    $(document).on('change', '#courseFilter', function () {

        $('.showIntake').css('display', 'block');
        $('#intakeFilter').prop('selectedIndex',0);
        server();

    });


    $(document).on('change', '#intakeFilter', function () {//fetch per intake

        if ($(this).val() != '') {
           server()
        } else {
            alert("Please select a valid intake");
        }

    });

    function server() {
        var department = $('#departmentFilter').val();
        var action = "intake";
        var intake = $('#intakeFilter').val();
        var course = $('#courseFilter').val();
        //alert(course);
        $.ajax({
            url: 'back/branch_filter.php',
            method: "POST",
            data: {intake: intake, department: department, course: course, action: action},
            success: function (data) {
                $("#bar-parent").html(data);
                //var pagination = [data];
            }
        });

    }
</script>
</html>
