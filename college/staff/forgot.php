<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="" />
	<meta name="author" content="RedstarHospital" />
	<title>Forgot Password</title>
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
				<form action="resetStaffPassword.php" class="login100-form validate-form" method="POST">
					<span class="login100-form-logo">
						<img alt="" src="assets/img/logo-2.png">
					</span>
					<!-- <span class="login100-form-title  p-t-27">
						Forgot Your Password?
					</span> -->
					<p class="text-center txt-small-heading">
						Forgot Your Password? Let Us Help You.
					</p>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="email" placeholder="Enter Your Email Address">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Send
						</button>
					</div>
					<div class="text-center p-t-27">
						<a class="txt1" href="login.php">
							Login?
						</a>
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