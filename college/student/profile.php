<?php
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){
	

	?>
	<!DOCTYPE html>
	<html lang="en">
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta name="description" content="Online School Management System" />
		<meta name="author" content="Vinco College" />
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
			.mdl-textfield__label:after {
    background-color: transparent;
    bottom: 20px;
    content: '';
    height: 2px;
    left: 45%;
    position: absolute;
    transition-duration: .2s;
    transition-timing-function: cubic-bezier(.4,0,.2,1);
    visibility: hidden;
    width: 10px;
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
					<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
						GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
						egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
						tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
						ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>

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
												$sql = "SELECT * FROM `students` where `studentID` = ".$_SESSION['adminID']."";

												$query = mysqli_query($conn,$sql);

												$row = mysqli_fetch_assoc($query);

												$fullName  = $row['studentName'];
												$name = explode(" ", $fullName);
												$firstname = $name[0]; 
												$middleName = $name[1];

												?>
												<div class="col-lg-6 p-t-20">
													<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<input class="mdl-textfield__input" type="text" id="txtFirstName" value="<?php echo $row['studentName'];?>" readonly>
													<label class="mdl-textfield__label">First Name</label>
												</div>
											</div>
											<div class="col-lg-6 p-t-20">
												<div
												class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" id="txtLasttName" value="<?php echo $row['studentLastName'];?>" readonly>
												<label class="mdl-textfield__label">Last Name</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="email"  value="<?php echo $row['studentEmail'];?>" readonly>
											<label class="mdl-textfield__label">Email</label>
											
										</div>
									</div>
									


								

								<div class="col-lg-6 p-t-20">
									<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text"
									pattern="-?[0-9]*(\.[0-9]+)?" id="text5" value="<?php echo $row['studentPhone'];?>" readonly>
									<label class="mdl-textfield__label" for="text5">Mobile Number</label>

								</div>
							</div>
						</div>

						    <div class="row">
     
                        <div class=" form-group col-lg-4">
                          
                            <span class="text-center ml-5"><label>Passport</label></span>

                <a target="_blank" href="../../studentDocuments/<?php echo $row['passportDOC']?>"><img class="img-responsive" alt="user" src="pdf.svg" style="max-height: 2rem !important"></a>
                           
                          </div>

                             <div class=" form-group col-lg-4">
                          
                            <span class="text-center ml-5"><label>Certificates</label></span>

                <a target="_blank" href="../../studentDocuments/<?php echo $row['certificates']?>"><img class=" img-responsive" alt="user" src="pdf.svg" style="max-height: 2rem !important;"></a>
                           
                          </div>
                         


                             <div class=" form-group col-lg-4">
                          
                            <span class="text-center ml-5"><label>Proof Of Payment</label></span>

                <a target="_blank" href="../../studentDocuments/<?php echo $row['proofOfPayment']?>"><img class=" img-responsive" alt="user" src="pdf.svg" style="max-height: 2rem !important;"></a>
                           
                          </div>
   </div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card card-topline-aqua">
						<div class="card-body no-padding height-9">
							<div class="row">
								<div class="profile-userpic">
									<img src="avatar.png" class="img-responsive" alt=""> </div>
								</div>
								<div class="profile-usertitle">

									<div class="profile-usertitle-job"> Update details </div>
								</div>
								<form action="back/updatePassword.php" method="POST">
									<ul class="list-group list-group-unbordered">

										<li class="list-group-item">
											<small>New Password</small> 
											<input type="password" id="password" class="pull-right" name="password">
										</li>
										<li class="list-group-item">
											<small>Confirm Password</small>
											<input type="password" class="pull-right" id="confirm_password" name="confirmPassword">
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
            $getSQL = "SELECT * FROM students where studentID='".$_SESSION['adminID']."'";
            $getQuery = mysqli_query($conn,$getSQL);
            $getROW = mysqli_fetch_array($getQuery);

           if($getROW['activeStatus'] =='1'){?>
							<?php
							$sql = "SELECT * FROM modules inner join moduleAssign on moduleAssign.moduleID = modules.moduleID where moduleAssign.studentID = ".$_SESSION['adminID']."";

							$query = mysqli_query($conn,$sql);

							while($row = mysqli_fetch_assoc($query)){

							?>

							<div class="col-sm-4">
							<div class="panel">
							<header class="panel-heading panel-heading-blue">
							<?php echo $row['moduleName'];?></header>
							<div class="panel-body">
							<div id="treeview1" class="">

							</div>
							</div>
							</div>
							</div>

						<?php } }else{

        echo "<p style='color:red'>Your account has not been activated yet!</p>";

      } ?>
							
							
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
				echo "<script>window.location='logout.php';</script>";

			}
			?>