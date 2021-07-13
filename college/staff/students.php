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
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>My Classes</title>
		<!-- google font -->
		<?php include 'headerLinks.php';?>
		<style>
			.doctor-profile img{
				height: 5rem;
				width: 5rem
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



			<div class="page-content-wrapper">
				<div class="page-content">
	<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
      GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
      egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
      tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
      ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
					<br><br>
						<div class="col-lg-12">
							<div class="row">
								<?php


								$sql1 = "SELECT * FROM modules WHERE moduleID='".secure($_GET['moduleID'])."' ";
										$query1 = mysqli_query($conn,$sql1);
										$row1 = mysqli_fetch_array($query1);
								$sql2 = "SELECT * FROM courses where coursesID='".$row1['moduleCourseID']."'";
								$query2 =mysqli_query($conn,$sql2);
								$row2 = mysqli_fetch_array($query2);
						?><div class="col-lg-4">
								
							</div>
							<div class="col-lg-6"><?php echo $row2['courseName']?> :  <span><?php echo $row1['moduleName'];?></span></div>
							
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
											<a href="#tab4-panel" class="mdl-tabs__tab is-active">Students</a>


										</div>
										<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
											<div class="row">
												<?php


												$sql ='SELECT s.* FROM students s, modules mo, courses c, assignedCourses a WHERE s.studentID = a.studentID AND a.courseID = c.coursesID AND mo.moduleCourseID = c.coursesID AND mo.moduleID = '.secure($_GET['moduleID']);
// var_dump($sql);die('ici 1');
// var_dump($sql);die('ici 2');


// var_dump($sql);die('ici 3');

												$result = mysqli_query($conn,$sql);
												$getResult = mysqli_num_rows($result);

												if($getResult){

													while($row = mysqli_fetch_array($result)){

														?>



														<!-- START STUDENT -->

														<div class="col-md-3">
															<div class="card card-box">
																<div class="card-body no-padding ">
											
																	<div class="doctor-profile">

																		<img src="../student/avatar.png" class="doctor-pic"
																		alt="">
																		<div class="profile-usertitle">

																		<div class="name-center"> <?php echo $row['studentName']?> </div>
																		</div>
																		
																		<div>

																		</div>
																		<div class="profile-userbuttons">
															<a href="message.php?id=<?php echo $row['studentID'];?>&moduleID=<?php echo $_GET['moduleID']?>"
																			class="btn btn-circle deepPink-bgcolor btn-sm">Message</a>





																		</div>


																	</div>
																</div>
															</div>
														</div>

														<!-- END  -->

													<?php } } ?>


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
<?php include 'footer.php';?>
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
<!-- end js include path -->
<!-- end js include path -->
<?php }else{
	 echo "<script> alert('Error! Please Log in');
    window.location='logout.php';</script>";
}?>
</body>

</html>
