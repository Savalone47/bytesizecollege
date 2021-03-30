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
	<meta name="description" content="Online Management System" />
	<meta name="author" content="Online Management System" />
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>
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
						<div class="col-sm-12 col-md-12 col-xl-12">
							<div class="card-box">
								<div class="card-head">
									<header>Announcement</header>
									
								</div>
								<?php 

					$sql ="SELECT * FROM notification where id='".secure($_GET['id'])."'";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($query);

					?>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-6 col-sm-6 col-6">
											<h2><?php echo $row['title']?></h2>
										<p style="font-size:10px;">Posted on: <?php echo date('d-m-Y',strtotime($row['time_stamp']))?>
											<br/><?php echo $row['eventLocation']?>
										</p>
										<p style="font-size:10px;"> </p>

										<p><?php echo $row['notification']?></p>
											
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

<?php 
}else{

	echo "<script> alert('Error! Please Log in');
		window.location='logout.php';
		</script>";
}
?>


</html>

 <div class="modal slide-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
              
              <div class="modal-body">
               
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-6 col-md-6 col-12">
								<a href="my_assignment.php">
								<div class="info-box bg-blue">
									<span class=" "><i class="material-icons">group</i></span>
									<div class="info-box-content"> 
										<span class="info-box-text">Assignments</span>	
									</div>
									<!-- /.info-box-content -->
								</div></a>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<div class="info-box bg-orange">
									<span class=" "><i class="material-icons">person</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Discussion</span>	
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
						</div>
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<a href="resources.php">
								<div class="info-box bg-purple">
									<span class=" "><i
											class="material-icons">content_cut</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Resources</span>
									</div>
									<!-- /.info-box-content -->
								</div></a>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<a href="group.php">
								<div class="info-box bg-success">
									
									<span class=" "><i class="fa fa-comments-o"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Group Discussion</span>
										
										
									</div>
									<!-- /.info-box-content -->
								</div>
							</a>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->



						</div>
					</div>
              </div>
              <div class="modal-footer">
               
              </div>
            </div>
          </div>
        </div>