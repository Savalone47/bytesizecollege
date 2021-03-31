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
	<meta name="description" content="Sagan Academy" />
	<meta name="author" content="Sagan Academy" />
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

		.text{ 
			white-space: nowrap;  
			overflow: hidden !important; 
			text-overflow: ellipsis !important; 
			width: 100%;
		} 
		.name-center{

		}

		#panel-button1{

			margin-top:3rem;
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
				
					<div class="row">
						<div class="col-md-12">
					
						<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
      GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
      egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
      tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
      ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
          
						</div>
						</div>
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
								<header style="font-weight: 600">Resources</header>
							</div>
							<div class="card-body ">
								
								<div class="row">
									<?php 


									$sql = "SELECT * FROM learning where learningTopic='".$_GET['id']."' and deleteStatus=0";
									$query = mysqli_query($conn,$sql);

									while($row = mysqli_fetch_array($query)){

										$sqlite = "SELECT * FROM learningMaterial where learningID='".$row['learningID']."' and deleteStatus=0 and learningMaterial.file <> ''";
										$querylite = mysqli_query($conn,$sqlite);
										while($rowlite = mysqli_fetch_array($querylite)){

										?>

										<div class="col-md-3 col-6">
											<div class="card card-box">
												<div class="card-body no-padding ">
													<div class="doctor-profile">
											

												<a href="<?php echo $row['link']?>&preview=<?php echo $rowlite['file']?>" preview>	<div class="profile-usertitle">
															<div class="doctor-name">
																<?php 
																$file = $rowlite['file'];
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

																	<img src="image.png"> 

																<?php }?>

															</div>
															<div class="name-center">
																<span class="name"><?php echo $rowlite['file']?></span><br>



																<span style="font-size: 11px;">Date: 
																	<?php echo date('d-F',strtotime($rowlite['time_stamp']));?> </span>	
																</div>
															</div></a>
															<div class="profile-userbuttons">
																
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php
										}
										}?>
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


<!-- Add material modal-->
	<div class="modal slide-left" id="tab3" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
						<div class="modal-dialog" role="document">
							<div class="modal-content modal-info">
								<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
								<div class="modal-body">
									<form action="add_material.php" method="POST" enctype="multipart/form-data">
										<div class="card-body row">
											<div class="col-lg-12" style="text-align: center; color: #888">
												<p>Add Resource</p>
											</div>
											<div class="col-lg-12 p-t-20">
												<input type="hidden" name="materials" value="true">
												<input type="hidden" name="learningID"  value="<?php echo $row['learningID']?>">
												<div
												class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<br>
												

												<p id="demo"></p>

												<script>
													function myFunction() {
														var x = document.getElementById("mySelect").value;
														document.getElementById("demo").innerHTML = "You selected: " + x;
													}
												</script>

												
												<input class="mdl-textfield__input" name="img[]" type="file" id="txtFirstName" multiple>

												<label class="mdl-textfield__label">Upload File</label>
											</div>
										</div>


									</div>
								</div>
								<div class="modal-footer">
									<button 
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Add material modal-->

</html>