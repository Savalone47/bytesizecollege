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
    <meta name="author" content="Ngoma Digitech"/>
    <title>Vinco | Reports</title>
    <?php
    include 'headerLinks.php'; ?>
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
    <!-- Theme Styles -->
    <link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css"/>

    <!-- Data Tables -->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="assets/dataTables.checkboxes.css">
</head>
<!-- END HEAD -->

<body
        class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
<div class="page-wrapper">
    <!-- start header -->
    <?php
    include 'nav.php' ?>
    <!-- end header -->
    <!-- start color quick setting -->

    <!-- end color quick setting -->
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

                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <?php
                                        $sql = "SELECT * FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by department.departmentID";
                                        $result = mysqli_query($conn, $sql);
                                        ?>
                                        <select class="form-control" id="departmentFilter">
                                            <option value="all">All Branches</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?php
                                                echo $row['departmentName'] ?>"><?php
                                                    echo $row['departmentName'] ?></option>
                                                <?php
                                            } ?>

                                        </select>

                                    </div>
                                </div>
                            </div>


                            <!-- filtering per course -->
                            <div class="col-md-4 text-center showCourse">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <?php
                                        $sqlite = "SELECT courseCode,courseName FROM courses Group by courseCode";
                                        $resultt = mysqli_query($conn, $sqlite);
                                        ?>
                                        <select class="form-control" id="courseFilter">
                                            <option value="all">All Courses</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($resultt)) {
                                                ?>
                                                <option value="<?php
                                                echo $row['courseCode'] ?>"><?php
                                                    echo $row['courseName'] ?></option>
                                                <?php
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- filtering per intake -->
                            <div class="col-md-2 text-center showIntake">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <?php
                                        $sqlite = "SELECT * FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by courses.courseIntake";
                                        $resultt = mysqli_query($conn, $sqlite);
                                        ?>
                                        <select class="form-control" id="intakeFilter">
                                            <option value="all">All Intakes</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($resultt)) {
                                                ?>
                                                <option value="<?php
                                                echo $row['courseIntake'] ?>"><?php
                                                    echo $row['courseIntake'] ?></option>
                                                <?php
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <select class="form-control" id="year">
                                            <option value="all">All years</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
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
                                        <th></th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Student Number</th>
                                        <th>Gender</th>
                                        <!-- <th>Edit</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Student Number</th>
                                        <th>Gender</th>
                                        <!-- <th>Edit</th> -->
                                    </tr>
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
    <?php
    include "footer.php"; ?>
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
<!-- Data Table -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables/export/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/export/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/export/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="assets/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {

        const exportTable = $("#exportTable").DataTable({
            dom: 'Blfrtip',
            lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
            iDisplayLength: 25,
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        rows: function (idx, data, node) {
                            let dt = new $.fn.dataTable.Api('#enrolledstudents_table');
                            let selected = dt.rows({selected: true}).indexes().toArray();

                            return selected.length === 0 || $.inArray(idx, selected) !== -1;
                        },
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        rows: function (idx, data, node) {
                            let dt = new $.fn.dataTable.Api('#enrolledstudents_table');
                            let selected = dt.rows({selected: true}).indexes().toArray();

                            return selected.length === 0 || $.inArray(idx, selected) !== -1;
                        },
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    autoPrint: false,
                    text: 'Print',
                    exportOptions: {
                        rows: function (idx, data, node) {
                            let dt = new $.fn.dataTable.Api('#enrolledstudents_table');
                            let selected = dt.rows({selected: true}).indexes().toArray();

                            return selected.length === 0 || $.inArray(idx, selected) !== -1;
                        },
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    text: 'Columns',
                    columns: ':not(.noVis)'
                }
            ],
            processing: true,
            serverSide: true,
            select: 'multi',
            order: [[1, 'asc']],
            ajax: 'back/filtered_by_intake.php',
            columnDefs: [
                {
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    },
                    data: null,
                    defaultContent: '',
                    orderable: false,
                    className: 'novis'
                },
                {data: "studentName"},
                {data: "studentLastName"},
                {data: "studentEmail"},
                {data: "gender"},
                {data: "studentNumber"},
                {data: "studentTimestamp"},
            ]
        });

        let department = 'all' ,course = 'all', intake = 'all', year = 'all';
        $(document).on('change', '#departmentFilter', function () {
            // $('#courseFilter').prop('selectedIndex', 0);
            // $('#intakeFilter').prop('selectedIndex', 0);
            if ($(this).val() !== '') {
                department = $(this).val();
                exportTable.ajax.url('back/filtered_by_intake.php?department=' + department + '&course=' + course + '&intake=' + intake + '&year=' + year).load();
            } else {
                alert("Please select a valid intake");
            }
        });

        $(document).on('change', '#courseFilter', function () {
            // $('#intakeFilter').prop('selectedIndex', 0);
            if ($(this).val() !== '') {
                course = $(this).val();
                exportTable.ajax.url('back/filtered_by_intake.php?department=' + department + '&course=' + course + '&intake=' + intake + '&year=' + year).load();
            } else {
                alert("Please select a valid course");
            }
        });

        $(document).on('change', '#intakeFilter', function () {
            if ($(this).val() !== '') {
                intake = $(this).val();
                exportTable.ajax.url('back/filtered_by_intake.php?department=' + department + '&course=' + course + '&intake=' + intake + '&year=' + year).load();
            } else {
                alert("Please select a valid intake");
            }
        });

        $(document).on('change', '#year', function () {
            if ($(this).val() !== '') {
                year = $(this).val();
                exportTable.ajax.url('back/filtered_by_intake.php?department=' + department + '&course=' + course + '&intake=' + intake + '&year=' + year).load();
            } else {
                alert("Please select a valid year");
            }
        });
    });
</script>
</body>
</html>
