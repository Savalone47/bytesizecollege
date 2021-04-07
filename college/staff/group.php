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
	<meta name="description" content="School Learning Management System" />
	<meta name="author" content="School Learning Management System" />
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
									<header></header>
									
								</div>
								<div class="card-body ">
									<div class="row">
									
							<div class="col-xl-3 col-md-6 col-12">
								<a href="dialog.php?id=<?php echo $_GET['id']?>">
								<div class="info-box bg-b-blue">
									<span class=" "><i class="material-icons">group</i></span>
										<span class="info-box-text" style="color: #fff;">Group Discussion</span>	
									
									<!-- /.info-box-content -->
								</div></a>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<a href="discussion.php?id=<?php echo $_GET['id']?>">
								<div class="info-box bg-b-pink">
									<span class=" "><i class="material-icons">person</i></span>
							
										<span class="info-box-text" style="color: #fff;">Teacher Discussion</span>	
									<!-- /.info-box-content -->
								
								<!-- /.info-box -->
							</div></a>
						</div>
					</div>



								<?php /* <div id="example4_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example4"></label></div></div>
									</div>
									<div class="table-scrollable">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
											id="example4">
											<thead>
												<tr>
													<th>#</th>
													<th>Topic</th>
													<th>Dialog</th>
													
													
												</tr>
											</thead>
											<tbody>
												<?php 

													$sql="SELECT * FROM topics where moduleID=''";
																	$result = mysqli_query($conn,$sql);
																	$getResult = mysqli_num_rows($result);
																	$num=1;
																	if($getResult>0){
																	while($row = mysqli_fetch_array($result)){
																		?>

												<tr class="odd">
													<td><?php echo $num++;?></td>
													<td><?php echo $row['topicName']?></td>
													<td><a href="dialog.php?topic=<?php echo secure($row['id'])?>" class="btn btn-circle btn-info btn-xs m-b-10">
													join dialog
												</a></td>
													
												</tr>
												<?php }}?>
												
											</tbody>
										</table>
									</div><?php */?>
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