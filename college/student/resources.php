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
	<meta name="description" content="Online School Management System" />
	<meta name="author" content="Vinco College" />
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
			font-size: 12px;
			overflow-wrap: break-word;
  word-wrap: break-word;
  hyphens: auto;
 display: block;
  display: -webkit-box;
  max-width: 100%;
  margin: 0 auto;
  font-size: 14px;
  line-height: 130%;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  
  font-weight: 100;
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
								<header style="font-weight: 600">
										<?php
										$sqlite = "SELECT * FROM modules where moduleID='".$_GET['id']."'";
										$querylite = mysqli_query($conn,$sqlite);
										$rowlite = mysqli_fetch_array($querylite);
										echo $rowlite['moduleName'];
										?>
								Resources</header>
							</div>
							<div class="card-body row ">
											
									
											<?php 

										$sql = "SELECT * FROM topics where moduleID='".$_GET['id']."'";
										$query = mysqli_query($conn,$sql);
										$num = mysqli_num_rows($query);
										$count =1;
										if($num >0){
										while($row = mysqli_fetch_array($query)){

											${'category'.$count} = $row['id'];


											?>
							<div class="col-lg-3 col-md-6  col-8">
							<a href="view_resources.php?id=<?php echo $row['id']?>">
								<span style="font-size: 10px;position: absolute;
								top: .7rem; text-transform: none;"></span>
								<img src="folder.svg" style="height: 3rem;"> <span style="font-size: 10px; font-style: italic;color: #919aa3!important; font-weight: 200 "><?php echo date('d-F',strtotime($row['time_stamp']))?></span>
								<br>
								<span class="text"> <?php echo $row['topicName']?></span>

								</a>


								</div>

												<?php 	

												$count++;

											}}else{

												echo "<p style='color:red;'>No resources available!</p>";

											}?>


											<div class="col-lg-3 col-md-6  col-8">
											<a href="communityResource.php?id=<?php echo $_GET['id']?>">
												<span style="font-size: 10px;position: absolute;
												top: .7rem; text-transform: none;"></span>
												<img src="folder.svg" style="height: 3rem;"> <span style="font-size: 10px; font-style: italic;color: #919aa3!important; font-weight: 200 "></span>
												<br>
												<span style="font-size: 12px"> Community Resources</span>

												</a>


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