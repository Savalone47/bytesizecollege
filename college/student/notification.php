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
					<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
			GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
			egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
			tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
			ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
					<br><br>

				
				

			
				<!-- start new student list -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card  card-box">
								<div class="card-head">
									<header>Notifications</header>
									
									<br/>
									
								</div>
								<div class="card-body ">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30">
												<thead>
													<tr>
														<th>No</th>
														<th>Notification</th>
														<th>Posted By</th>
														<th>Date posted</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>

													<?php 

													$sql ="SELECT * FROM notification";
													$query = mysqli_query($conn,$sql);
													$num=1;
													while($row = mysqli_fetch_array($query)){
													?>
													<tr>
														<td><?php echo $num++; ?></td>
														<td><?php echo $row['notification']; ?></td>
														<td>
														<?php 
														$sql1="SELECT * FROM management where managementID='".$row['adminID']."'";
															$get = mysqli_query($conn,$sql1);
															$row2 = mysqli_fetch_array($get);
															echo $row2['managementName'];

														 ?></td>
														<td><?php echo $row['time_stamp']?></td>
														
														
															<td><a href="view_notification.php?id=<?php echo $row['id']?>"
														class="btn btn-success btn-xs" >
														<i class="fa fa-eye"></i>
														</a>

														<?php if(secure($_SESSION['adminLevel']) ==1 || secure($_SESSION['adminLevel'])==1){?>
															<a href="edit_course.php?id=<?php echo $row['coursesID']?>"
																				class="btn btn-primary btn-xs">
																				<i class="fa fa-pencil"></i>
																			</a>
														<button class="btn btn-danger btn-xs">
														<i class="fa fa-trash-o "></i>
														</button>
														<?php }?>
													

														</td>
													</tr>
												<?php }?>
							
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end new student list -->
		
	
			
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
          	<i class="fa fa-times" data-dismiss="modal" style="float: right;color: red"></i>
            <div class="modal-content modal-info">

              
              <div class="modal-body">
               
					<div class="col-md-12 col-sm-12">
							<div style="background: #fff;
							    min-height: 50px;
							    box-shadow: none;
							    position: relative;
							    margin-bottom: 20px;
							    transition: .5s;
							    border: 1px solid #f2f2f2;
							    border-radius: 0;">
								
								
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
              <div class="modal-footer">
               
              </div>
            </div>
          </div>
        </div>