<?php 
session_start();
include '../action.php';

            if(secure($_POST['otp'])){
                
            $sql = "SELECT * FROM students WHERE otp ='".secure($_POST['otp'])."'";
            $query = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            if($num==1){

                
                    $sql1 ="UPDATE students SET studentPassword = '".secure(md5($_POST['password']))."' WHERE otp= '".secure($_POST['otp'])."' ";
                    $query = mysqli_query($conn,$sql1);
                    if($query){

                    $sql2 ="UPDATE students SET otp = '0' WHERE otp = ".secure($_POST['otp'])."";
                    $query2 = mysqli_query($conn,$sql2);

                        echo "<script>window.location='login.php?reset=true';</script>";

                    }else{
                         $error = "<div class='alert alert-danger'>Incorrect OTP Code!</div>";


                    }

            }else{

      $error = "<div class='alert alert-danger'>Incorrect OTP Code!</div>";



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
    <title>Sagan || OTP</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <!-- icons -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/plugins/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="assets/css/pages/extra_pages.css">
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
                <form class="login100-form validate-form" method="POST" enctype="multipart/form-data" >
                
                    <span class="login100-form-logo">
                        <img alt="" src="assets/img/logo-2.png">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        <p><?php echo $error;?></p>
                       <p style="font-size: 13px;color: green;">An OTP code has been sent to your email, please type the OTP code below.</p>
                    </span>
                   
                    <div class="wrap-input100 validate-input" data-validate="Enter OTP">
                        <input class="input100" type="text" name="otp" placeholder="Enter OTP">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter New Password">
                        <input class="input100" type="password" name="password" placeholder="Enter New Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                  
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Send
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
 
    <!-- start js include path -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pages/extra-pages/pages.js"></script>
    <!-- end js include path -->
</body>

</html>