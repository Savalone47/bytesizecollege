<?php

session_start();
include "../action.php";
include "position.php";
if (secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])){
if (secure($_SESSION['adminLevel']) == "1" || secure($_SESSION['adminLevel']) == "2" || secure(
    $_SESSION['adminLevel']
) == "5"){
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="School Learning Management System"/>
    <meta name="author" content="School Learning Management System"/>
    <title>My Classes</title>
    <!-- google font -->
    <?php
    include 'headerLinks.php'; ?>
    <style>
        .doctor-profile img {
            height: 5rem;
            width: 5rem
        }

        #panel-button {
            margin-top: 3rem;
            margin-bottom: 1rem;
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
			ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>

                        <?php
                        if ($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2') { ?>
                            <button id="panel-button"
                                    class="mdl-button mdl-js-button mdl-button--fab margin-right-10 btn-info pull-right"
                                    data-toggle="modal" data-target="#tab">
                                <i class="material-icons">add</i>
                            </button>

                        <?php
                        } ?>

                    </div>

                </div>

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
                                        <?php
                                        if ($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2') { ?>
                                            <a href="#tab4-panel" class="mdl-tabs__tab is-active">All Departments</a>
                                        <?php
                                        } else { ?>

                                            <a href="#tab4-panel" class="mdl-tabs__tab is-active">My Departments</a>

                                        <?php
                                        } ?>

                                    </div>
                                    <div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
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


                                            if (secure($_SESSION['adminLevel']) == "5") {
                                                $result_count = mysqli_query(
                                                    $conn,
                                                    "SELECT COUNT(*) As total_records FROM `department` where hodID = '" . $_SESSION['adminID'] . "'"
                                                );
                                            } else {
                                                $result_count = mysqli_query(
                                                    $conn,
                                                    "SELECT COUNT(*) As total_records FROM `department`"
                                                );
                                            }

                                            $total_records = mysqli_fetch_array($result_count);
                                            $total_records = $total_records['total_records'];
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $second_last = $total_no_of_pages - 1;

                                            if (secure($_SESSION['adminLevel']) == "5") {
                                                $sql = "select * from department  
								inner join management on management.managementID = department.hodID
								where hodID = {$_SESSION['adminID']} limit $offset, $total_records_per_page";
                                            } else {
                                                $sql = "select * from department
							inner join management on management.managementID = department.hodID 
							 limit $offset, $total_records_per_page";
//                                                var_dump($sql);die;
                                            }

                                            $result = mysqli_query($conn, $sql);
                                            $getResult = mysqli_num_rows($result);

                                            if ($getResult) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>


                                                    <!-- START STUDENT -->

                                                    <div class="col-md-3">
                                                        <!-- start control -->
                                                        <div class="card card-box">

                                                            <?php
                                                            if ($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2') { ?>
                                                                <div class="card-head">


                                                                    <button id="panel-button<?php
                                                                    echo $row['departmentID']; ?>"
                                                                            class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                                                            data-upgraded=",MaterialButton">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </button>
                                                                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                                                        data-mdl-for="panel-button<?php
                                                                        echo $row['departmentID']; ?>">

                                                                        <li class="mdl-menu__item" data-toggle="modal"
                                                                            data-target="#tab<?php
                                                                            echo $row['departmentID']; ?>"><i
                                                                                    class="material-icons">edit</i>Edit
                                                                        </li>

                                                                        <li class="mdl-menu__item">
                                                                            <a onclick="return confirm('Are you you sure you want to delete this?')"
                                                                               href="back/deleteDepartment.php?id=<?php
                                                                               echo $row['departmentID']; ?>&department=<?php
                                                                               echo $row['departmentName'] ?>"><i
                                                                                        class="material-icons">delete</i>Delete</a>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                            <?php
                                                            } ?>

                                                            <!-- end control -->
                                                            <a href="allClasses.php?id=<?php
                                                            echo $row['departmentID']; ?>">
                                                                <div class="">


                                                                    <div class="card-body no-padding ">
                                                                        <div class="doctor-profile">
                                                                            <?php
                                                                            if ($row['departmentID'] == 23) { ?>
                                                                                <img src="../../assets/images/Gaborone.jpg"
                                                                                     class="doctor-pic" alt="">
                                                                            <?php
                                                                            } elseif ($row['departmentID'] == 24) { ?>
                                                                                <img src="../../assets/images/Palapye.jpg"
                                                                                     class="doctor-pic" alt="">
                                                                            <?php
                                                                            } elseif ($row['departmentID'] == 25) { ?>
                                                                                <img src="../../assets/images/Letlhakane.jpg"
                                                                                     class="doctor-pic" alt="">
                                                                            <?php
                                                                            } elseif ($row['departmentID'] == 32) { ?>
                                                                                <img src="../../assets/images/Online School.jpg"
                                                                                     class="doctor-pic" alt="">
                                                                            <?php
                                                                            } elseif ($row['departmentID'] == 33) { ?>
                                                                                <img src="../../assets/images/Gaborone.jpg"
                                                                                     class="doctor-pic" alt="">
                                                                            <?php
                                                                            } elseif ($row['departmentID'] == 34) { ?>
                                                                                <img src="../../assets/images/Palapye.jpg"
                                                                                     class="doctor-pic" alt="">
                                                                            <?php
                                                                            } elseif ($row['departmentID'] == 35) { ?>
                                                                                <img src="../../assets/images/Letlhakane.jpg"
                                                                                     class="doctor-pic" alt="">
                                                                            <?php
                                                                            } ?>

                                                                            <div class="profile-usertitle">

                                                                                <div class="name-center"><?php
                                                                                    echo $row['departmentName'] ?> </div>
                                                                            </div>

                                                                            <div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <!-- END  -->

                                                    <!-- Edit class modal -->
                                                    <div class="modal slide-left editModal" id="tab<?php
                                                    echo $row['departmentID']; ?>" tabindex="-1" role="dialog"
                                                         aria-labelledby="Warning Modal">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content modal-info">
                                                                <div><i class="fa fa-times"
                                                                        style="color: red; float: right;"
                                                                        data-dismiss="modal"></i></div>
                                                                <form class="editForm" enctype="multipart/form-data">

                                                                    <div class="modal-body">

                                                                        <div class="card-body row">
                                                                            <div class="col-lg-12"
                                                                                 style="text-align: center; color: #888">
                                                                                <p>Edit Department</p>
                                                                            </div>
                                                                            <div class="col-lg-12 p-t-20">
                                                                                <input type="hidden" name="id"
                                                                                       value="<?php
                                                                                       echo $row['departmentID']; ?>">
                                                                                <input type="text" name="departmentName"
                                                                                       class="mdl-textfield__input"
                                                                                       value="<?php
                                                                                       echo $row['departmentName'] ?>">
                                                                                <!-- <label class="mdl-textfield__label" style="margin-left: 1rem">Department Name</label> -->
                                                                                <br>
                                                                                <br>
                                                                                <input type="hidden" name="previousName"
                                                                                       value="<?php
                                                                                       echo $row['departmentName'] ?>">


                                                                                <div
                                                                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                                    <br>
                                                                                    <select class="mdl-textfield__input"
                                                                                            name="hodManager">
                                                                                        <option value="<?php
                                                                                        echo $row['hodID'] ?? '' ?>"><?php
                                                                                            echo $row['managementName'] ?? '' . " " . $row['lastName'] ?? ''; ?></option>
                                                                                        <?php
                                                                                        $sql1 = "select * from management where managementLevel = '5' ";

                                                                                        $result1 = mysqli_query(
                                                                                            $conn,
                                                                                            $sql1
                                                                                        );

                                                                                        while ($row1 = mysqli_fetch_array(
                                                                                            $result1
                                                                                        )) { ?>

                                                                                            <option value="<?php
                                                                                            echo $row1['managementID'] ?? ''; ?>"><?php
                                                                                                echo $row1['managementName'] ?? '' . " " . $row1['lastName'] ?? ''; ?></option>

                                                                                            <?php
                                                                                        }

                                                                                        ?>

                                                                                    </select>


                                                                                    <label class="mdl-textfield__label">Head
                                                                                        of Department</label>
                                                                                </div>


                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info">
                                                                            Update Department
                                                                        </button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- end edit class modal -->

                                                <?php
                                                }
                                            } ?>

                                            <div class="col-lg-12">

                                                <ul class="pagination">
                                                    <?php
                                                    // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; }
                                                    ?>

                                                    <li <?php
                                                    if ($page_no <= 1) {
                                                        echo "class='page-item disabled'";
                                                    } ?>>
                                                        <a class="page-link" <?php
                                                        if ($page_no > 1) {
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

                                                    <li <?php
                                                    if ($page_no >= $total_no_of_pages) {
                                                        echo "class='page-item disabled'";
                                                    } ?>>
                                                        <a class='page-link'<?php

                                                        if ($page_no < $total_no_of_pages) {
                                                            echo "href='?page_no=$next_page'";
                                                        } ?>>Next</a>
                                                    </li>
                                                    <?php
                                                    if ($page_no < $total_no_of_pages) {
                                                        echo "<li class='page-item' ><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                                                    } ?>
                                                </ul>
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
        <!-- end page content -->


    </div>
</div>
<!-- END PROFILE CONTENT -->

<!-- end page content -->


<!-- end page container -->
<!-- start footer -->
<?php
include 'footer.php'; ?>
<!-- end footer -->

<!-- start js include path -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/popper/popper.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Common js-->
<script src="assets/js/app.js"></script>
<script src="assets/js/layout.js"></script>
<script src="assets/js/theme-color.js"></script>
<!-- Material -->
<script src="assets/plugins/material/material.min.js"></script>
<!--google map-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>
<script src="../assets/plugins/material/material.min.js"></script>
<script src="../assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>
<script src="../assets/plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="../assets/js/pages/sweet-alert/sweet-alert-data.js"></script>


<?php
} else {
    echo "<script> 
	window.location='index.php';

	</script>";
}
} else {
    echo "<script> alert('Erreur! Veuillez vous Connectez!');
	window.location='logout.php';

	</script>";
}
?>

</body>

</html>

<!-- create class modal -->
<div class="modal slide-left" id="tab" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal"></i></div>
            <form class="createDepartment" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="card-body row">
                        <div class="col-lg-12" style="text-align: center; color: #888">
                            <p>Add Department</p>
                        </div>
                        <div class="col-lg-12 p-t-20"><br>

                            <input type="text" name="departmentName" class="mdl-textfield__input" required>
                            <label class="mdl-textfield__label" style="margin-left: 1rem">Department Name</label>


                            <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <br>
                                <select class="mdl-textfield__input" name="hodManager" required>
                                    <option value="">Select Head of Department</option>
                                    <?php
                                    $sql = "select * from management where managementLevel = '5' ";

                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_array($result)) { ?>

                                        <option value="<?php
                                        echo $row['managementID'] ?? ''; ?>"><?php
                                            echo $row['managementName'] ?? '' . " " . $row['lastName'] ?? ''; ?></option>

                                        <?php
                                    }

                                    ?>

                                </select>

                                <label class="mdl-textfield__label">Head of Department</label>
                            </div>


                            <div class="modal-footer">
                                <button
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info">
                                    Create Department
                                </button>
                            </div>

            </form>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('submit', '.createDepartment', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "back/createDepartment.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#tab").modal('hide');

                    showDialog6('Department successfully created.');
                    setTimeout(function () {

                        history.go(0);
                    }, 2000);


                }
            });
        });


        $(document).on('submit', '.editForm', function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "back/editDepartment.php",
                data: new FormData(this),
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function (data) {


                    $('.editModal').modal('hide');
                    showDialog6('Department successfully updated.');
                    setTimeout(function () {

                        history.go(0);
                    }, 2000);

                }
            });
        });
    });


</script>

<!-- end  create class modal -->

