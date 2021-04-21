<?php
session_start();
include "../action.php";
include "color.php";
if (secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])){

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
    <title>Dashboard | Home</title>
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css"/>
    <!-- icons -->
    <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="assets/css/material_style.css">
    <!-- inbox style -->
    <link href="assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme Styles -->
    <link href="assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/theme/light/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css"/>


    <!-- icons -->
    <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="assets/css/material_style.css">
    <!-- Data Tables -->
    <link href="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme Styles -->
    <link href="assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link href="assets/css/theme/light/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css"/>

    <style type="text/css">

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

                    </div>
                </div>


                <!-- start widget -->
                <div class="state-overview">
                    <div class="row">

                        <?php
                        //courseManager
                        $getSql = "";


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


                        $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM lectureAssigns
					inner join modules on modules.moduleID = lectureAssigns.moduleID 

					inner join courses on courses.coursesID =  modules.moduleCourseID 

					WHERE lectureAssigns.lectureID = '" . secure($_SESSION['adminID']) . "'");
                        $total_records = mysqli_fetch_array($result_count);
                        $total_records = $total_records['total_records'];
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $second_last = $total_no_of_pages - 1;


                        $getSql = "SELECT * FROM  lectureAssigns
					inner join modules on modules.moduleID = lectureAssigns.moduleID 

					inner join courses on courses.coursesID =  modules.moduleCourseID 

					WHERE lectureAssigns.lectureID = '" . secure($_SESSION['adminID']) . "' LIMIT " . $offset . ", " . $total_records_per_page . "";


                        $card = 1;

                        $getData = mysqli_query($conn, $getSql);
                        while ($checkRow = mysqli_fetch_array($getData)) {

                            if ($card == 5) {

                                $card = 1;
                            }

                            ?>

                            <!---subject start-->
                            <div class="col-xl-4 col-md-6 col-12" data-toggle="modal"
                                 data-target="#slide-left<?php echo $checkRow['moduleID']; ?>">
                                <div class="info-box <?php echo color($card++); ?>">
                                    <span class="info-box-icon "><i class="material-icons">group</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?php echo $checkRow['moduleName']; ?></span>
                                        <span class="info-box-number"><?php echo $checkRow['courseName']; ?></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">
											<?php echo $checkRow['courseCode']; ?>
										</span>
                                    </div>
                                </div>
                            </div>
                            <!---subject end-->


                            <!-- Button trigger modal -->


                            <!-- Modal -->
                            <div class="modal fade" id="slide-left<?php echo $checkRow['moduleID']; ?>" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                <center><span
                                                            style="color:#444; text-align: center;"><?php echo $row['moduleName'] ?? null; ?></span>
                                                </center>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="state-overview">
                                                <div class="row">

                                                    <div class="col-xl-6 col-md-6 col-12">
                                                        <a href="community.php?id=<?php echo $checkRow['moduleID'] ?>">
                                                            <div class="info-box purple">
                                                                <span class=" "><i class="fa fa-comments-o"></i></span>

                                                                <span class="info-box-text" style="color: #fff;">Community</span>

                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                        <!-- /.info-box -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-xl-6 col-md-6 col-12">
                                                        <a href="chapter.php?id=<?php echo $checkRow['moduleID'] ?>">
                                                            <div class="info-box bg-b-green">

                                                                <span class=" "><i class="fa fa-book"></i></span>

                                                                <span class="info-box-text" style="color: #fff;">Chapters</span>

                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                        <!-- /.info-box -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-xl-6 col-md-6 col-12">
                                                        <a href="my_assignment.php?id=<?php echo $checkRow['moduleID'] ?>">
                                                            <div class="info-box bg-b-blue">
                                                                <span class=" "><i class="fa fa-file-text"></i></span>

                                                                <span class="info-box-text" style="color: #fff;">Assignments</span>

                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                        <!-- /.info-box -->
                                                    </div>
                                                    <!-- /.col -->


                                                    <div class="col-xl-6 col-md-6 col-12">
                                                        <a href="resources.php?id=<?php echo $checkRow['moduleID'] ?>">
                                                            <div class="info-box bg-b-yellow">
								<span class=" ">
									<i class="fa fa-folder-open-o"></i></span>

                                                                <span class="info-box-text" style="color: #fff;">Resources</span>

                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                        <!-- /.info-box -->
                                                    </div>


                                                    <div class="col-xl-6 col-md-6 col-12">
                                                        <a href="students.php?moduleID=<?php echo $checkRow['moduleID'] ?>">
                                                            <div class="info-box bg-danger">

                                                                <span class=" "><i class="fa fa-users"></i></span>

                                                                <span class="info-box-text" style="color: #fff;">My Students</span>


                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                        <!-- /.info-box -->
                                                    </div>
                                                    <!-- /.col -->


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- end of modal -->
                            <?php
                            $card++;
                        } ?>


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


<ul class="pagination" style="float: right !important;">
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; }
    ?>

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
<script type="text/javascript">
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
                // 	close_callback && close_callback();
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
<!-- end js include path -->
<?php } else {
    echo "<script> alert('Please Login First');
	window.location='logout.php';

	</script>";
} ?>
</body>

</html>


