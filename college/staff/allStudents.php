<?php
session_start();
include "../action.php";

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="Ngoma Digitech"/>
    <meta name="author" content="Bytesize College"/>
    <title>Dashboard | All Students</title>
    <?php include 'headerLinks.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style type="text/css">
        .customtab.nav-tabs .nav-link.active, .customtab.nav-tabs .nav-link.active:focus {
            border-bottom: 0px solid #36c6d3;
            background-color: rgb(102, 115, 252) !important;
            box-shadow: none;
            color: #fff;
            border-radius: 5px;
        }

        .customtab.nav-tabs .nav-link.active, .customtab.nav-tabs .nav-link.active:focus {
            border-bottom: 0px solid #36c6d3;
            background-color: #36c6d3 !important;
            box-shadow: none;
            color: #fff;
            border-radius: 5px;
        }

        .fill {
            border: none;
            outline: none;
            border-bottom: 1px dashed #555555;
        }

        .doctor-name {
            font-size: 16px;
        }


    </style>
    <style type="text/css">


        @media only screen and (max-width: 600px) {
            #register_btn {
                position: absolute;
                top: -4rem;
                right: 140%;
                display: flex;

            }
        }

        .card-footer {
            border-top: none;
            border-bottom: 1px dotted #e5e5e5;
            background-color: #fff
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
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
        GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
        egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
        tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
        ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mt-5 pull-right btn-sm" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    Import Students
                </button>


                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Import Current Students CSV</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="outer-scontainer p-3">
                                    <div class="row">

                                        <form class="form-horizontal sendForm" enctype="multipart/form-data">

                                            <input type="file" name="file" id="file" accept=".csv">
                                            <input type="hidden" name="import" value="1">
                                            <button type="submit" class="btn-submit btn btn-primary">Import</button>
                                            <br/>


                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="btn-group" style="position: absolute;right:20%; top: 5rem ">

                    <?php
                    $sqlite = "SELECT * FROM `courses` ";
                    $querylite = mysqli_query($conn, $sqlite);


                    ?>

                    <div id="register_btn">
                        <button type="button" class="d-none btn btn-default btn-xs dropdown-toggle"
                                data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-plus"></i>Register Student
                        </button>
                        <button type="button" class="d-none btn btn-default btn-xs dropdown-toggle m-r-20"
                                data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <?php

                            while ($rowlite = mysqli_fetch_array($querylite)) {

                                ?>
                                <li><a href="#" data-toggle="modal"
                                       data-target="#register"><?php echo $rowlite['courseName']; ?></a>
                                </li>

                                <?php
                            }

                            $sqlite2 = "SELECT * FROM `courses` ";
                            $querylite2 = mysqli_query($conn, $sqlite2);

                            while ($rowlite2 = mysqli_fetch_array($querylite2)) {

                                ?>


                                <li><a href="register_Alevel.php"><?php echo $rowlite2['courseName']; ?></a>
                                </li>
                                <?php

                            }


                            ?>


                        </ul>
                    </div>
                </div>
                <br><br>
                <ul class="nav customtab nav-tabs" role="tablist">
                    <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">New applicants
                        </a></li>
                    <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Enrolled Students</a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active fontawesome-demo" id="tab1">
                        <div class="d-none row">
                            <div class=" col-md-3"></div>
                            <div class="form-group col-md-6">

                                <input type="password" class="form-control" id="search" placeholder="Search">
                            </div>
                        </div>
                        <div class="row">


                            <?php

                            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                $page_no = $_GET['page_no'];
                            } else {
                                $page_no = 1;
                            }


                            $total_records_per_page = 12;
                            $offset = ($page_no - 1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2";

                            $result_count;

                            if ($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2') {

                                $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `students` where activeStatus=0 order by studentID DESC ");


                            } elseif ($_SESSION['adminLevel'] == '5') {


                                $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `students` 
  inner join assignedCourses on assignedCourses.studentID = students.studentID
INNER join courses on courses.coursesID = assignedCourses.courseID
inner join department on department.departmentID = courses.courseDepartment

where department.hodID = " . $_SESSION['adminID'] . "
and activeStatus=0 ");

                            }


                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1;

                            $sql;

                            if ($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2') {

                                $sql = "SELECT * FROM students where activeStatus=0 order by studentID DESC limit " . $offset . ", " . $total_records_per_page . "";

                            } elseif ($_SESSION['adminLevel'] == '5') {

                                $sql = "SELECT * FROM students
inner join assignedCourses on assignedCourses.studentID = students.studentID
INNER join courses on courses.coursesID = assignedCourses.courseID
inner join department on department.departmentID = courses.courseDepartment

where department.hodID = " . $_SESSION['adminID'] . "

and  activeStatus = 0 order by students.studentID DESC limit " . $offset . ", " . $total_records_per_page . "";

                            }
                            $query = mysqli_query($conn, $sql);


                            while ($row = mysqli_fetch_array($query)) {


                                ?>
                                <div class="col-md-4">
                                    <div class="card card-box">

                                        <!-- start -->

                                        <div class="card-footer">
                                            <form action="back/studentStatus.php" method="POST" class="btn-group ">
                                                <input type="hidden" name="id" value="<?php echo $row['studentID'] ?>">
                                                <input type="hidden" name="status" value="0">
                                                <input type="hidden" name="email"
                                                       value="<?php echo $row['studentEmail'] ?>">
                                                <button class="btn-group btn btn-rounded btn-success btn-xs">activate
                                                    &nbsp;&nbsp;

                                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            <div class="btn-group btn btn-rounded btn-xs pull-right" id="delete"
                                                 data-id="<?php echo $row['studentID']; ?>">
                                                <i class="fa fa-trash" style="color: red"></i>
                                            </div>
                                        </div>
                                        <!-- end -->
                                        <div class="card-body no-padding ">
                                            <div class="doctor-profile">
                                                <img src="images/student.jpg" class="doctor-pic"
                                                     alt="">
                                                <div class="profile-usertitle">
                                                    <div class="doctor-name"
                                                         style="text-align: left !important;"><?php echo $row['studentName'] ?> </div>

                                                </div>
                                                <p style="text-align: left !important; font-size: 12px">
                                                    <i class="fa fa-calendar"></i>&nbsp;&nbsp;
                                                    <?php echo date('Y-M-d', strtotime($row['studentTimestamp'])); ?>
                                                </p>
                                                <div style="text-align: left !important;">
                                                    <p style="font-size: 12px"><i class="fa fa-envelope"></i>&nbsp;&nbsp;
                                                        <a href="mailto:<?php echo $row['studentEmail'] ?>"
                                                           target="_blank"> <?php echo $row['studentEmail'] ?></a></p>
                                                    <p><i class="fa fa-phone"></i>&nbsp;&nbsp;
                                                        <a
                                                                href="tel:<?php echo $row['studentPhone'] ?>"><?php echo $row['studentPhone'] ?></a>
                                                    </p>
                                                </div>
                                                <div class="profile-userbuttons">


                                                    <a href="studentProfile.php?id=<?php echo $row['studentID']; ?>"
                                                       class="btn btn-circle deepPink-bgcolor btn-sm">
                                                        View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!----==================================view and edit Applicant starts================================================-->


                                <?php


                                $sqlite = "SELECT * FROM students where studentID='" . $row['studentID'] . "' ";
                                $querylite = mysqli_query($conn, $sqlite);
                                $rowlite = mysqli_fetch_array($querylite);

                                ?>

                                <div class="modal fade in" id="registration<?php echo $row['studentID']; ?>"
                                     tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="margin-top:150px; width: 60vw;">
                                            <div class="modal-header">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <center><h4 class="modal-title" id="modalLabel">Edit
                                                                Applicant</h4></center>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-1"></div>

                                                </div>

                                            </div>
                                            <form action="editApplicant.php" method="POST"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" name="course" value="33">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Parent/Gurdian FullName</label>
                                                                    <input type="text" class="form-control"
                                                                           name="parentfirstname"
                                                                           value="<?php echo $rowlite1['parentFullName'] ?>"
                                                                           required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Parent/Gurdian Email</label>
                                                                    <input type="email" class="form-control"
                                                                           name="parentemail"
                                                                           value="<?php echo $rowlite1['parent2email'] ?>"
                                                                           required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Parent/Gurdian Phone Number</label>
                                                                    <input type="tel" class="form-control"
                                                                           name="parentphone"
                                                                           value="<?php echo $rowlite1['parent2phone'] ?>"
                                                                           required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Pupil FullName</label>
                                                                    <input type="text" class="form-control"
                                                                           name="pupilfirstname"
                                                                           value="<?php echo $rowlite['studentName'] ?>"
                                                                           required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Date of Birth</label>
                                                                    <input type="date" class="form-control"
                                                                           name="pupildateofbirth"
                                                                           value="<?php echo $rowlite['studentDOB'] ?>"
                                                                           required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Nationality</label>
                                                                    <select name="nationality" class="form-control">

                                                                        <option value="<?php echo $rowlite['studentCountry'] ?>"><?php echo $rowlite['studentCountry'] ?></option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Gender</label>
                                                                    <select id="gender" name="pupilgender"
                                                                            class="form-control">
                                                                        <option value="<?php echo $rowlite['gender'] ?>"><?php echo $rowlite['gender'] ?></option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Is your child fluent in English?*Both
                                                                        speaking and understanding.</label>

                                                                    <select id="lang" name="lang" class="form-control">
                                                                        <option value="<?php echo $rowlite['studentLang'] ?>"><?php echo $rowlite['studentLang'] ?></option>

                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>Do you already have a child/children enrolled
                                                                        at Sagan Academy?*</label>

                                                                    <select id="enr" name="enr" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>

                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label>If you have selected 'yes' please provide the
                                                                        name(s) of your other child/children
                                                                        below</label>

                                                                    <textarea class="form-control" rows="5"
                                                                              name="otherNames" id="comment"
                                                                              placeholder="write names " required="">
                              
                              <?php echo $rowlite1['otherChild'] ?>
                            </textarea>

                                                                </div>


                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <label>Please give us further information about your child's
                                                                specific Special Education Needs and any other diagnosed
                                                                conditions:</label>
                                                            <textarea class="form-control"
                                                                      name="further"><?php echo $rowlite['studentNeeds'] ?></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!--=========================================view edit Applicant ends ===========================================================-->

                            <?php } ?>


                            <div class="col-lg-12">

                                <ul class="pagination">
                                    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                                    <li <?php if ($page_no <= 1) {
                                        echo "class='page-item disabled'";
                                    } ?>>
                                        <a class="page-link" <?php if ($page_no > 1) {
                                            echo "href='?page_no=$previous_page'";
                                        } ?>>Previous</a>
                                    </li>

                                    <?php
                                    if ($total_no_of_pages <= 10) {
                                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                                            if ($counter == $page_no) {
                                                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                            } else {
                                                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                            }
                                        }
                                    } elseif ($total_no_of_pages > 10) {

                                        if ($page_no <= 4) {
                                            for ($counter = 1; $counter < 8; $counter++) {
                                                if ($counter == $page_no) {
                                                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                                } else {
                                                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                                }
                                            }
                                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                        } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                                if ($counter == $page_no) {
                                                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                                } else {
                                                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                                }
                                            }
                                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                        } else {
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                                            echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                                            echo "<li class='page-item'><a class='page-link'>...</a></li>";

                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                if ($counter == $page_no) {
                                                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                                                } else {
                                                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                    <li <?php if ($page_no >= $total_no_of_pages) {
                                        echo "class='page-item disabled'";
                                    } ?>>
                                        <a class='page-link'<?php

                                        if ($page_no < $total_no_of_pages) {
                                            echo "href='?page_no=$next_page'";
                                        } ?>>Next</a>
                                    </li>
                                    <?php if ($page_no < $total_no_of_pages) {
                                        echo "<li class='page-item' ><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                                    } ?>
                                </ul>
                            </div>
                        </div>


                    </div>


                    <div class="tab-pane  fontawesome-demo" id="tab2">
                        <!--===========enrolled students starts ===============-->
                        <div class="row" id="fetchActive">


                        </div>
                        <ul class="pagination">
                            <?php
                            $limit = 12;

                            $sqlmm;

                            if ($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2') {

                                $sqlmm = "SELECT COUNT(studentID) FROM students 
where activeStatus = 1";
                            } elseif ($_SESSION['adminLevel'] == '5') {

                                $sqlmm = "SELECT COUNT(students.studentID) FROM students
  inner join assignedCourses on assignedCourses.studentID = students.studentID
INNER join courses on courses.coursesID = assignedCourses.courseID
inner join department on department.departmentID = courses.courseDepartment

where department.hodID = " . $_SESSION['adminID'] . "

and  activeStatus = 1 ";
                            }

                            $rs_result = mysqli_query($conn, $sqlmm);
                            $row = mysqli_fetch_row($rs_result);
                            $total_records = $row[0];
                            $total_pages = ceil($total_records / $limit);

                            if (!empty($total_pages)) {
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == 1) {
                                        ?>
                                        <li class="pageitem active" id="<?php echo $i; ?>"><a href="JavaScript:Void(0);"
                                                                                              data-id="<?php echo $i; ?>"
                                                                                              class="page-link"><?php echo $i; ?></a>
                                        </li>

                                        <?php
                                    } else {
                                        ?>
                                        <li class="pageitem" id="<?php echo $i; ?>"><a href="JavaScript:Void(0);"
                                                                                       class="page-link"
                                                                                       data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>

                        </ul>

                    </div>


                </div>
            </div>


        </div>
    </div>
    <!-- end page content -->


    <!-- start footer -->
    <?php include 'footer.php'; ?>
    <!-- end footer -->
</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/popper/popper.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Common js-->
<script src="assets/js/app.js"></script>
<script src="assets/js/layout.js"></script>
<script src="assets/js/theme-color.js"></script>
<!-- Material -->
<script src="assets/plugins/material/material.min.js"></script>
<!-- Data Table -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables/export/jszip.min.js"></script>
<script src="assets/plugins/datatables/export/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/export/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/export/buttons.print.min.js"></script>
<script src="assets/js/pages/table/table_data.js"></script>
<script type="text/javascript">
    $(document).on('submit', '.sendForm', function (e) {
        e.preventDefault();

        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {

            return false;
        } else {

            $.ajax({
                type: "POST",
                url: "back/importCurrentStudents.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data == 200) {
                        alert("Students Uploaded Successfuly");

                    } else if (data == 202) {

                        alert("error uploading students");

                    }
                    location.reload();
                }
            });
        }
    });
</script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#search').keyup(function () {
            var search = $(this).val();
            var searchText = $("#searchBar").val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });


        $("#fetchActive").load("fetchActivated.php?page=1");
        $(".page-link").click(function () {
            var id = $(this).attr("data-id");
            var select_id = $(this).parent().attr("id");
            $.ajax({
                url: "fetchActivated.php",
                type: "GET",
                data: {
                    page: id
                },
                cache: false,
                success: function (dataResult) {
                    $("#fetchActive").html(dataResult);
                    $(".pageitem").removeClass("active");
                    $("#" + select_id).addClass("active");

                }
            });
        });
    });

    $(document).on('click', '#delete', function () {
        var id = $(this).data("id");

        var action = "deleteStudent";
        $("#spinner").fadeIn(500);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete the student!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "back/deleteStudent.php",
                    data: {action: action, id: id},
                    success: function (data) {

                        $("#spinner").fadeOut(500);
                        if (data = 200) {
                            // alert("Student successfuly deleted");
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            window.location.reload(true);
                        } else {
                            Swal.fire(
                                'Error!',
                                'Error in deleting student',
                                'error'
                            )
                            // alert("Error in deleting student");
                        }
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'The student is safe :)',
                    'error'
                )
            }
        })


    })


    var move = "250px";

    // Sidebar function
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


</script>
<script type="text/javascript">

    function myFunction() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName('li');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

</script>

</body>


<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br/>
            </div>
            <form action="../applicationForm1.php" role="form" method="POST">
                <div class="modal-body" style="padding: 1rem 2rem;">
                    <center><h4 class="modal-title" id="modalLabel">Student Details</h4></center>
                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Full First Names</label>
                                    <input type="text" class="form-control" name="firstName" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Preffered First Name</label>
                                    <input type="text" class="form-control" name="prefferedFirstName" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Gender</label>
                                    <input type="text" class="form-control" name="gender" placeholder="Gender" required>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" name="dateOfBirth"
                                           placeholder="Date of Birth" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Home language</label>
                                    <input type="text" class="form-control" name="homeLanguage" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>ID Number</label>

                                    <input type="text" class="form-control" name="idNumber" required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Grade or Class Registering for </label>

                                    <select class="form-control" name="course">
                                        <?php
                                        $sql = "SELECT * FROM courses where courseName  like 'Check%'";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                            <option value="<?php echo $row['coursesID'] ?>"><?php echo $row['courseName'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>1. Reasons for Leaving previous educational system/institution/place of
                                        learning</label>

                                    <textarea class="form-control" name="reasonsForleaving"></textarea>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>3. Health/emotional/behavioural/scholastic concerns (If any):</label>

                                    <textarea class="form-control" name="health"></textarea>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>4. Recent (no older than two years) educational psychologist evaluation
                                        (Please tick)</label>
                                    Yes <input type="checkbox" name="evaluation[]" value="Yes">
                                    <span style="margin-left: 5rem;">No <input type="checkbox" name="evaluation[]"
                                                                               value="No"></span>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>5. Person responsible for the account/fees:</label>
                                    <input type="tel" class="form-control" name="personResponsible" required>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <h4>Parent/Gaurdian Details</h4>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">

                                    <label>Parent/Gaurdian Name</label>
                                    <input type="text" class="form-control" name="fatherName" id="location" required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control" name="fatherOccupation" id="surburb"
                                           placeholder="Occupation" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Postal Address</label>
                                    <input type="text" class="form-control" name="fatherPostal" id="location" required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Residential Address</label>
                                    <input type="text" class="form-control" name="fatherAddress" id="surburb" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Telephone: Home</label>
                                    <input type="text" class="form-control" name="fatherTelephone" id="location"
                                           required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Work</label>
                                    <input type="text" class="form-control" name="fatherWork" id="surburb" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Cell</label>
                                    <input type="text" class="form-control" name="fatherCell" id="location" required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="fatherEmail" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <h4>Parent/Gaurdian Details</h4>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">

                                    <label>Parent/Gaurdian Name</label>
                                    <input type="text" class="form-control" name="motherName" id="location" required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control" name="motherOccupation" id="surburb"
                                           placeholder="Occupation" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Postal Address</label>
                                    <input type="text" class="form-control" name="motherPostal" id="location" required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Residential Address</label>
                                    <input type="text" class="form-control" name="motherAddress" id="surburb" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Telephone: Home</label>
                                    <input type="text" class="form-control" name="motherTelephone" id="location"
                                           required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Work</label>
                                    <input type="text" class="form-control" name="motherWork" id="surburb" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Cell</label>
                                    <input type="text" class="form-control" name="motherCell" id="location" required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="motherEmail" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <h4>Doctor Details</h4>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="doctorName" id="location" required>
                                </div>
                                <div class="col-sm-12">
                                    <label>Telephone</label>
                                    <input type="text" class="form-control" name="doctorTelephone">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Alternate emergency contact number</label>
                            <input type="number" class="form-control" name="doctorAlternateNumber" required>
                        </div>


                        <div class="col-sm-12">
                            <p style="margin-top: 1rem;"><b>INDEMNITY – I as parent/guardian, indemnify Sagan Centre,
                                    its staff, parents, Principal and agents against any loss, damage or injury
                                    including all eventualities and risk associated with all activities undertaken
                                    whilst being enrolled at Sagan Centre, during or after school hours, including
                                    transport arranged to and from outings and any activities undertaken on such
                                    outings</b></p>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Accept(Tick to accept)</label>
                                    <input type="checkbox" name="indemnityConsent[]" value="I Agree" required>
                                </div>

                            </div>
                        </div>


                        <div class="col-sm-12">
                            <h3>Terms and Conditions</h3>
                            <ul style="list-style: decimal; font-size: 13px; margin-bottom: .8rem;">
                                <li><b>Application fees:</b> A non-refundable <b>application fee</b> of R700.00 must
                                    accompany this registration for all applications.
                                </li>
                                <li><b>Registration fees</b></li>
                                <ul class="inner" style="list-style: lower-alpha; font-size: 11px; margin-left: 2rem;">
                                    <p style="font-size: 12px;"><b>Take note of options:</b></p>
                                    <li style="margin-bottom: .4rem;"><b>Registration fee full time students</b> –
                                        Checkpoint Secondary 1/IGCSE and AS/ A level: non-refundable fee of R7 650.00 is
                                        payable on new registrations only
                                    </li>
                                    <li style="margin-bottom: .4rem;"><b>Registration fees for per subject fees
                                            IGCSE/AS/A Levels registrations only:</b> A non-refundable fee of R3 500 is
                                        payable on new registrations only
                                    </li>

                                    <li style="margin-bottom: .4rem;"><b>Separate invoices</b> will be issued for the
                                        application and registration fees (one invoice); and for school fees (one
                                        invoice and customer statements).
                                    </li>

                                    <li style="margin-bottom: .4rem;"><b>Termly Tutorials and Exam workshops</b> –
                                        limited to 15 students per level.
                                        No registration fee payable, however, termly tutorial fees are payable in
                                        advance per term/workshop on registration to secure a place. *No attendance
                                        permitted unless the weekly or monthly fee is paid at
                                        least 24 hours in advance of a week; or at least 3 days before a given month for
                                        the following month.
                                    </li>
                                </ul>


                                <li style="margin-top: 1rem;">Monthly tuition fees are payable on the final working day
                                    of each month, <b>in advance</b>, by EFT, from 1 January, of a given year up to and
                                    including <b>11 months</b>, for <b>AS/A Level And IGCSE</b>, thereafter.
                                </li>

                                <li><b>A full term’s notice (being three months is strictly required), in writing, or
                                        the equivalent fee, as invoiced, in lieu thereof is required prior to withdrawal
                                        of a learner.</b></li>
                                <li>Tuition fees will be reviewed annually. A term’s notice will be given of any fee
                                    increase.
                                </li>

                                <li>Where any account is more than 10 days in arrears the learner will be suspended from
                                    the Sagan Centre and the access to the premises refused until outstanding fees are
                                    paid.
                                </li>
                                <li>Any arrears account of 21 days or more is handed over to Schroder and Associates
                                    (debt collection agency certified to list with TransUnion) for collection. Any
                                    interest accrued and further associated costs will be for the accountholder.
                                </li>
                                <li>Transfer cards will not be issued to school leavers in respect of whom monies due to
                                    the school are outstanding
                                </li>
                                <li style="margin-bottom: 2rem">External exam fees (for IGCSE/AS/A level) are a separate
                                    and not related to monthly tuition fees and will be invoiced for as separate
                                </li>

                            </ul>
                        </div>

                        <p>I, (full name and surname) <span class="input"> <input type="text" class="fill"
                                                                                  name="fullName"></span>, with ID
                            number/passport number <span class="input"> <input type="text" class="fill"
                                                                               name="signerIDNumber" required></span>
                            hereby, accept the above terms and conditions as set out above.</p>
                        <!--  <p>Date: <span class="input"> <input type="date" class="fill" name="agreeDate" required></span></p>-->
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Register</button>
                        </div>
                    </div>
                    <center><p style="font-size: 10px;">Director: Bronwyn Ansell B. A (Comm. Science) B. Tech (Post
                            School Ed.)</p>
                        <p style="font-size: 10px;">Dean of Studies: Lydon Smit B.A (Pre-medical Sciences) B.Sc.
                            (Biological Sciences)</p></center>
                </div>
            </form>
        </div>
    </div>
</div>


</html>
