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
	<meta name="description" content="Learning Management System" />
	<meta name="author" content="Learning Management System" />
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
		.txt{
        	height: 2.5em;
        	display: block;
  display: -webkit-box;
  max-width: 100%;
  margin: 0 auto;
  font-size: 14px;
  line-height: 130%;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
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
				<header style="font-weight: 600"></header>
			</div>
			<div class="card-body ">
				
				<div class="row">
					<?php 




					$sql = "SELECT * FROM community where discussion <>''  and moduleID='".$_GET['id']."'";


					$query = mysqli_query($conn,$sql);
					$numRow = mysqli_num_rows($query);
					if($numRow > 0){
					while($row = mysqli_fetch_array($query)){

						?>
						<div class="col-md-3 col-6">
							<div class="card card-box">
								<div class="card-body no-padding ">
									<div class="doctor-profile">

										
											<div class="doctor-name">
												<?php 
												$file = $row['discussion'];
												$imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
												if($imageFileType == 'pdf'){ ?>
													<img src="pdf.svg"> 
										<a href="../chats/<?php echo $row['discussion']?>" preview>	<div class="profile-usertitle">
												<?php }elseif($imageFileType == 'mp4'){?>
													<img src="mp4.svg"> 
										<a href="../chats/<?php echo $row['discussion']?>" preview>	<div class="profile-usertitle">
												<?php }elseif($imageFileType == 'doc' || $imageFileType == 'docx' ){?>
										<a href="../staff/previewCommunity.php?preview=<?php echo $row['discussion']?>" >	<div class="profile-usertitle">
													
													<img src="word.svg"> 
										<div class="profile-usertitle">
												<?php }elseif($imageFileType == 'mp3'){?>

													<img src="volume.svg"> 
										<a href="../chats/<?php echo $row['discussion']?>" preview>	<div class="profile-usertitle">
									<?php }elseif($imageFileType == 'jpeg' || $imageFileType == 'jpg' || $imageFileType == 'png'){?>

											<a href="../chats/<?php echo $row['discussion']?>" preview>	<div class="profile-usertitle">
												
												<?php }?>

											</div>
											<div class="name-center">
												<p class="txt">
													<?php echo $row['discussion']?>
												</p>


												<br>
												<span style="font-size: 11px;  color: #888;">Date: 
													<?php echo date('d-F',strtotime($row['time_stamp']));?> </span>	
												</div>
											</div></a>
											<div class="profile-userbuttons">

											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}}else{

							echo "<p style='color:red;'>No available resources!</p>";
						}
						?>
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