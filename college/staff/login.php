<?php
session_start();
include "../action.php";
if(
        isset($_SESSION['adminID']) && isset($_SESSION['adminName'])
        && isset($_SESSION['adminEmail']))
{

 echo "<script> window.location= 'index.php';</script>";
}else if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $conn->real_escape_string(secure($_POST['username']));
    $password = $conn->real_escape_string(secure($_POST['pass']));
    $pass = md5($password);

    $uip = $_SERVER['REMOTE_ADDR'];

    $sql = "SELECT * FROM management WHERE managementPassword='" . $pass . "' AND managementEmail='" . $username . "' ";
    $result = mysqli_query($conn, $sql);
    $getRows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($getRows == 1) {

        $_SESSION['adminID'] = $row['managementID'];
        $_SESSION['adminName'] = $row['managementName'];
        $_SESSION['adminEmail'] = $row['managementEmail'];
        $_SESSION['adminLevel'] = $row['managementLevel'];
        $_SESSION['managementPhoto'] = $row['managementPhoto'];

        //track login
        mysqli_query($conn, "insert into userlog(userID,userType,userIP) values('" . $row['managementID'] . "','staff','$uip')");

        //end tracking
        echo "<script>window.location='index.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Vinco login" />
    <meta name="author" content="login " />
    <title>Vinco || login</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <!-- icons -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets1/plugins/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
    <link href="assets1/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="assets1/css/pages/extra_pages.css">
    <!-- favicon -->
    <?php include 'headerLinks.php';?>
    <style type="text/css">
        .page-background {
    background-image: url(login.jpg);
}
    </style>
</head>

<body>
    <div class="limiter">
        <div class="container-login100 page-background">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="login.php">
                
                    <span class="login100-form-logo">
                        <img alt="" src="assets1/img/logo-2.png">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                                      <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    
                </form>
                <div class="text-center p-t-30">
                         <a href="../../index.php" class="txt1 pull-left">Home</a>
                        <a class="txt1" href="forgot.php">
                            Forgot Password?
                        </a>
                </div>
            </div>
        </div>
    </div>
    <!-- start js include path -->
    <script src="assets1/plugins/jquery/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="assets1/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets1/js/pages/extra-pages/pages.js"></script>
    <!-- end js include path -->
</body>

</html>