<?php
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])){

 echo "<script> window.location= 'index.php';</script>";
}else{

$username = $conn->real_escape_string(secure($_POST['username']));
$password = $conn->real_escape_string(secure($_POST['pass']));
$pass = md5($password);



$sql ="SELECT * FROM management WHERE managementPassword='".$pass."' AND managementEmail='".$username."' ";
$result =mysqli_query($conn,$sql);
$getRows=mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
echo $row['studentName'];

if($getRows ==1){
     
    $_SESSION['adminID'] = $row['managementID'];
    $_SESSION['adminName'] = $row['managementName'];
    $_SESSION['adminEmail'] = $row['managementEmail'];
    $_SESSION['adminLevel'] = $row['managementLevel'];
    echo"<script>window.location.href='index.php'</script>";
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
	<link rel="stylesheet" href="../assets/plugins/iconic/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="../assets/css/pages/extra_pages.css">
	<!-- favicon -->
	<?php include 'headerLinks.php';?>
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" enctype="multipart/form-data" >
				
					<span class="login100-form-logo">
						<img alt="" src="../assets/img/logo-2.png">
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
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1" href="forgot.php">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	 <?php }?> 
	<!-- start js include path -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/js/pages/extra-pages/pages.js"></script>
	<!-- end js include path -->
</body>

</html>