<?php
session_start();
include "../action.php";


?>
<!DOCTYPE html>
<html>
<style type="text/css">
	.fa-eye{
  position: absolute;
  right: 1rem;
  top: 60%;
}
#display{
  position: absolute;
  right: 1rem;
  top: 50%;
  color: #000;
}
</style>
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
	<link rel="stylesheet" href="assets/plugins/iconic/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
				<form class="login100-form validate-form">
				
					<span class="login100-form-logo">
						<img alt="" src="../assets/img/logo-2.png">
					</span>
					 <p><?php if((isset($_GET['reset']) === "true") && secure($_GET['reset'])){
                            echo "<div class='alert alert-success'>Password successfully changed!</div>";
                        }elseif(isset($_GET['register']) && secure($_GET['register'])) {
                            echo "<div class='alert alert-success'>You have successfully registered on the system, please check your email for login credentials!</div>";
                        }?></p>
                        
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" id="currentPass">
					<i onclick="show('currentPass')" title="Show password" class="fa fa-eye-slash" id="display"></i>
					</div>
					<p class="text-center text-danger" id="spinner"></p>
				    <noscript style="color: red;">Javascript not enabled in your browser</noscript>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1 float-left" href="../../index.php" style="text-decoration: underline;">
                            Home
                        </a>
						<a class="txt1" href="forgot.php">
							Forgot Password?
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
	<script type="text/javascript">
		  $(document).on('submit', '.login100-form', function(e){
      e.preventDefault();
      $("#spinner").text("Loading ...");
      $.ajax({
        type:"POST",
        url:"back/validateLogin.php",
        data:new FormData(this),
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData:false, // To send DOMDocument or non processed data file it is set to false               
        success:function(data){
        if(data == 200){
         
         window.location.href='index.php';
        }else if(data== 201){
            $("#spinner").text("Incorrect login credentials");
            setTimeout(function(){
   window.location.reload(1);
}, 3000);

        }

        
        }
      });
    });

function show(a) {
  var x=document.getElementById(a);
  var c=x.nextElementSibling
  if (x.getAttribute('type') == "password") {
  c.removeAttribute("class");
  c.setAttribute("class","fa fa-eye");
  x.removeAttribute("type");
    x.setAttribute("type","text");
  } else {
  x.removeAttribute("type");
    x.setAttribute('type','password');
 c.removeAttribute("class");
  c.setAttribute("class","fa fa-eye-slash");
  }
}
	</script>
</body>


</html>