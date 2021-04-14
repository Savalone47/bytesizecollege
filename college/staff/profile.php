<?php
session_start();
include "../action.php";
include "color.php";

if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){
   ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="School Management System" />
	<meta name="author" content="School Management System" />
	<title>Profile</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>
	<style type="text/css">
		.list-group-item input{
			border: none;
			font-size: 16px;
			font-family: "Helvetica","Arial",sans-serif;
			margin: 0;
			padding: 4px 0;
			border-bottom: 1px solid rgba(0,0,0,.12);
			background: 0 0;
			text-align: left;
		}
		input[type=file] {
    display: none;
}
.choose-btn {
    border-radius: 2px;
    margin: 10px;
    float: left;
    color: #188ae2 ;
    padding: 5px 10px;
    height: 2rem;
    text-align: center;
    cursor: pointer;
    font-family: arial, serif;
    font-size: 13px;
    float: right;
}
.profile-userpic img{
	height: 8rem;
	width: 8rem;
}
	</style>
</head>
<!-- END HEAD -->

<body
class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
<div class="page-wrapper">
	<?php include 'nav.php';?>

	<!-- start page container -->
	<div class="page-container">
		<?php include 'sidebar.php';?>
		<!-- start page content -->
		<div class="page-content-wrapper">
			<div class="page-content">

				<br><br>

				<div class="mdl-tabs mdl-js-tabs">
					<div class="mdl-tabs__tab-bar tab-left-side">
						<a href="#tab4-panel" class="mdl-tabs__tab is-active">Lessons</a>
						<a href="#tab5-panel" class="mdl-tabs__tab ">My Subjects</a>

					</div>
					<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
						<div class="row">
							<div class="col-sm-8">
								<div class="card-box">
									<div class="card-head">
										<header>Basic Information</header>

									</div>
									<div class="card-body row">
										<?php
										$sql = "SELECT * FROM `management` WHERE `managementID` = ".$_SESSION['adminID']."";

										$query = mysqli_query($conn,$sql);

										$row = mysqli_fetch_assoc($query);

										$fullName  = $row['managementName'];
										$name = explode(" ", $fullName);
										$firstname = $name[0]; 
										$middleName = $name[1]  ?? null;

										?>
										<div class="col-lg-6 p-t-20">
											<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtFirstName" value="<?php echo $row['managementName'];?>" readonly>
											<label class="mdl-textfield__label">First Name</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" id="txtLasttName" value="<?php echo $row['lastName'];?>" readonly>
										<label class="mdl-textfield__label">Last Name</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="email" id="txtemail" value="<?php echo $row['managementEmail'];?>" readonly>
									<label class="mdl-textfield__label">Email</label>
									<span class="mdl-textfield__error">Enter Valid Email Address!</span>
								</div>
							</div>

							<div class="col-lg-6 p-t-20">
								<div
								class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="tel"  value="<?php echo $row['managementContact'];?>" readonly>
								<label class="mdl-textfield__label">Phone Number</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">

				<div class="card card-topline-aqua">
					<div class="card-body no-padding height-9">
						<div class="row">
							<div class="profile-userpic"> 
								<img src="management/<?php echo $row['managementPhoto'];?>" class="img-responsive" alt=""> </div>


								<form action="back/image.php" method="POST" enctype="multipart/form-data">
								<div style="display: flex; justify-content: space-between; ">
									<div>
						<label for="hiddenBtn" class="choose-btn btn " id="chooseBtn"><span>Change Image</span><i class="fa fa-cloud-upload"></i></label>
                        <input type="file" id="hiddenBtn" name= "fileToUpload">
                       </div>
                        <button class="btn btn-xs btn-info" style="height: 2rem;margin-top:  10px;">submit</button>
                        </div>
                    </form>

							</div>
							<div class="profile-usertitle">

								<div class="profile-usertitle-job"> Update details </div>
							</div>
							<form action="back/editPassword.php" method="POST">
								<ul class="list-group list-group-unbordered">
											
												<li class="list-group-item">
													<small>New Password</small> 
													<input type="password" id="password" class="pull-right" name="password" required minlength="8">
												</li>
												<li class="list-group-item">
													<small>Confirm Password</small>
													<input type="password" class="pull-right" id="confirm_password" name="confirmPassword" required minlength="8">
													<span id='message'></span>
												</li>
											</ul>
											<!-- END SIDEBAR USER TITLE -->
											<!-- SIDEBAR BUTTONS -->
											<div class="profile-userbuttons">

												<button  class="btn btn-circle red btn-sm">Update</button>
											</div>
											<!-- END SIDEBAR BUTTONS -->
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="mdl-tabs__panel p-t-20" id="tab5-panel">


						<!-- BEGIN PAGE CONTENT-->
						<div class="row">
							<div class="col-md-12">
								<div class="row">

									<?php 
									$sql = "SELECT * FROM `lectureAssigns` 

									inner join modules on modules.moduleID = lectureAssigns.moduleID 

									where lectureAssigns.lectureID = ".$_SESSION['adminID']."";

									$results = mysqli_query($conn,$sql);

									$card = 1;

									while($row1 = mysqli_fetch_assoc($results)) {
									# code...
									if($card === 5){

										$card = 1;
									}

									?>

									<div class="col-sm-4">
										<div class="panel">
											<header class="panel-heading panel-heading-blue">
											<?php echo $row1['moduleName'];?></header>
											<div class="panel-body">
												<div id="treeview1" class="">

												</div>
											</div>
										</div>
									</div>

									<?php

									$card++;
								}

									?>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- END PROFILE CONTENT -->
	</div>
</div>
</div>
</div>
<!-- end page content -->

</div>
<!-- end page container -->
<!-- start footer -->
<?php include 'footer.php';?>
<!-- end footer -->
</div>
</div>
  <script type="text/javascript">
  var hiddenBtn = document.getElementById('hiddenBtn');
  var chooseBtn = document.getElementById('chooseBtn');

hiddenBtn.addEventListener('change', function() {
    if (hiddenBtn.files.length > 0) {
        chooseBtn.innerText = hiddenBtn.files[0].name;
    } else {
        chooseBtn.innerText = 'Choose';
    }
});
</script>
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

</body>

<script type="text/javascript">

	$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
	
</script>

</html>
<?php 

} else {
	echo "<script>alert('Please login first');</script>";	
	echo "<script>window.location = 'login.php';</script>";	
	exit;
}
?>