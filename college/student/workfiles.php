<?php 
session_start();
include "../action.php";


?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Online Management System" />
	<meta name="author" content="Online Management System" />
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>
	<style type="text/css">
		.doctor-name img{
			height: 2rem;
		}
		.name-center{
			font-size: 12px;
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
				<div class="row">
					<div class="col-sm-12">
						<div style="background: #fff;
    min-height: 50px;
    box-shadow: none;
    position: relative;
    margin-bottom: 20px;
    transition: .5s;
    border: 1px solid #f2f2f2;
    border-radius: 0;">
							<div class="card-head">
								<header style="font-weight: 600">My work</header>
							</div>
							<div class="card-body ">
								
								<div class="row">
										<?php 

			$sql = "SELECT * FROM assignmentReply inner join assignmentFiles on assignmentReply.assignmentID = assignmentFiles.assignmentID where moduleID='".$_GET['id']."' and assignmentReply.studentID='".$_SESSION['adminID']."'";
								$query = mysqli_query($conn,$sql);
								$num = mysqli_num_rows($query);

								if($num > 0){
								while($row = mysqli_fetch_array($query)){

								?>
										<div class="col-md-3 col-6">
											<div class="card card-box">
												<div class="card-body no-padding ">
													<div class="doctor-profile">

														<a href="../img/<?php echo $row['file']?>" preview>	<div class="profile-usertitle">
															<div class="doctor-name">
																<?php 
																$file = $row['file'];
																$imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
																if($imageFileType == 'pdf'){ ?>
																	<img src="pdf.svg"> 
																<?php }elseif($imageFileType == 'mp4'){?>
																	<img src="mp4.svg"> 
																<?php }elseif($imageFileType == 'doc' || $imageFileType == 'docx' ){?>

																	<img src="word.svg"> 

																<?php }elseif($imageFileType == 'mp3'){?>

																	<img src="volume.svg"> 

													<?php }elseif($imageFileType == 'jpeg' || $imageFileType == 'jpg' || $imageFileType == 'png'){?>

															<img src="../img/<?php echo $row['file']?>"> 
																
																<?php }?>

															</div>
															<div class="name-center">
																<?php echo $row['file']?><br>
																<span style="font-size: 11px;">Date: 
																	<?php echo date('d-F',strtotime($row['time_stamp']));?> </span>	
																</div>
															</div></a>
															<div class="profile-userbuttons">

															</div>
														</div>
													</div>
												</div>
											</div>

							<?php }}else{

								echo "<p style='color:red;'>No files available!</p>";

							}?>
								</div>

							</div>
										

											<div class="mdl-tabs__panel p-t-20 fade" id="tab5-panel">
												<div class="row">
													<div class="col-md-3 col-6">
														<div class="card card-box">
															<div class="card-body no-padding ">
																<div class="doctor-profile">

																	<div class="profile-usertitle">
																		<div class="doctor-name">
																			<img src="pdf.svg"> </div>
																			<div class="name-center">
																				lesson Name<br>
																				<span style="font-size: 11px;">Date: 12 Jun </span>	
																			</div>
																		</div>
																		<div class="profile-userbuttons">

																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-3 col-6">
															<div class="card card-box">
																<div class="card-body no-padding ">
																	<div class="doctor-profile">

																		<div class="profile-usertitle">
																			<div class="doctor-name">
																				<img src="mp4.svg"> </div>
																				<div class="name-center">
																					lesson Name<br>
																					<span style="font-size: 11px;">Date: 12 Jun </span>	
																				</div>
																			</div>
																			<div class="profile-userbuttons">

																			</div>
																		</div>
																	</div>
																</div>
															</div>

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
<!--google map-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>
<!-- end js include path -->
</body>



</html>