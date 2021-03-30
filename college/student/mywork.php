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
						<div class="col-md-12">
							<div class="row">
								<?php 

								$sql = "SELECT * FROM moduleAssign inner join modules on moduleAssign.moduleID = modules.moduleID where studentID='".$_SESSION['adminID']."'";
								$query = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($query)){
								?>
								<div class="col-sm-4">
									<a data-target="#exampleModalCenter<?php echo $row['moduleID']?>" data-toggle="modal" >
									<div class="panel">
										<header class="panel-heading panel-heading-blue">
											<?php echo $row['moduleName']?> </header>
										<div class="panel-body">
											<div id="treeview1" class="">
												
											</div>
										</div>
									</div>
								</a>
								</div>

	<div class="modal fade" id="exampleModalCenter<?php echo $row['moduleID']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content" style="padding: 1rem">

      <p style="color:black;"><?php echo $row['moduleName']?></p><span data-dismiss="modal" style="font-size: 20px; color: red;font-weight: 100;position: absolute;top: 2px;right: 1rem">&times;</span>
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-6 col-md-6 col-12">
								<a href="workfiles.php?id=<?php echo $row['moduleID']?>">
								<div class="info-box bg-b-blue">
									<span class=" "><i class="material-icons">assignment</i></span>
								
										<span class="info-box-text" style="color: #fff;">Assignments</span>	
								
									<!-- /.info-box-content -->
								</div></a>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->


						
							<div class="col-xl-6 col-md-6 col-12">
								<a href="examWork.php?id=<?php echo $row['moduleID']?>">
								<div class="info-box bg-b-pink">
									<span class=" "><i class="material-icons">assignment</i></span>
									
										<span class="info-box-text" style="color: #fff;">Exams</span>	
									<!-- /.info-box-content -->
							
								<!-- /.info-box -->
							</div></a>
						</div>



							
							



						</div>
					</div>
    </div>
  </div>
</div>
							<?php }?>
							
							</div>
						</div>
					</div>		





					</div>
					</div>
					<!-- END PROFILE CONTENT -->
					</div>
					</div>
				
			
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
	
</body>



</html>