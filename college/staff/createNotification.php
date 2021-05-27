<?php

session_start();
include "../action.php";
include "position.php";
if (secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <title>Bytesize College | Notifications</title>
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"
              type="text/css"/>
        <!-- icons -->
        <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css"/>
        <!-- bootstrap -->
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../assets/plugins/flatpicker/css/flatpickr.min.css"/>
        <link href="../assets/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"
              type="text/css"/>
        <link href="../assets/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet"
              type="text/css"/>
        <!-- Material Design Lite CSS -->
        <link rel="stylesheet" href="../assets/plugins/material/material.min.css">
        <link rel="stylesheet" href="../assets/css/material_style.css">
        <!-- Theme Styles -->
        <link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components"
              type="text/css"/>
        <link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/summernote/summernote.css" rel="stylesheet">
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
				ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e"
                                                                                                    aria-hidden="true">Back</a>


                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <form action="addNotification.php" method="post">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" type="text" name="title" class="form-control" placeholder="Notification's title..." required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label for="formsummernote">Description</label>
                                <textarea name="formsummernote" id="formsummernote" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <button id="createNotification" class="btn btn-info" type="submit">create notification</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end page content -->

        </div>
        <!-- end page container -->
        <?php
        include 'footer.php' ?>
    </div>
    <!-- start js include path -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/popper/popper.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>
    <!-- Common js-->
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/layout.js"></script>
    <script src="../assets/js/theme-color.js"></script>
    <!-- Material -->
    <script src="../assets/plugins/material/material.min.js"></script>
    <!-- summernote -->
    <script src="../assets/plugins/summernote/summernote.js"></script>
    <script src="../assets/js/pages/summernote/summernote-data.js"></script>
    <script>
        $(document).ready(function () {
            $("form").submit(function (e) {
                e.preventDefault();
                let postData = $(this).serializeArray();
                let formUrl = $(this).attr("action");

                $.ajax({
                    url: formUrl,
                    type: "POST",
                    data: postData,
                    dataType: "json",
                    success: function (data, textStatus, jqXHR) {
                        Swal.fire(
                            'Good job!',
                            'Notification added successfully!',
                            'success'
                        );
                        $("#formsummernote").summernote('reset');
                        $("#title").val("");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!, please try again later...',
                            // footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                });
            });
        });
    </script>
    <!-- end js include path -->
    </body>


    </html>

    <?php
} else {
    echo "<script> alert('Please Login First!');
	window.location='logout.php';

	</script>";
}
?>
