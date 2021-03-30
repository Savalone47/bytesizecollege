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
	<meta name="description" content="School Management System" />
	<meta name="author" content="School Management System" />
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
		.modal-content{
		  box-shadow: 0 0 5px rgba(0, 0, 0, .5);
		  border-radius: 0;
		}

		/* Removing the border radius on btns just in modal */
		.modal-content .btn{
		  border-radius: 0;
		}

		/* Adjusting  the close button */
		.close{
		  font-size: 30px;
		  font-weight: 300;
		}

		.modal-header .close{
		  margin-top: -10px;
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



								<br>

           				
						</div>

						
	<div class="col-lg-12">
							<div class="row">
								<?php


								$sql1 = "SELECT * FROM modules WHERE moduleID='".secure($_GET['id'])."' ";
										$query1 = mysqli_query($conn,$sql1);
										$row1 = mysqli_fetch_array($query1);
								$sql2 = "SELECT * FROM courses where coursesID='".$row1['moduleCourseID']."'";
								$query2 =mysqli_query($conn,$sql2);
								$row2 = mysqli_fetch_array($query2);
						?><div class="col-lg-4">
								
							</div>
							<div class="col-lg-6"><?php echo $row2['courseName']?>&nbsp;&nbsp;&nbsp;<span><?php echo $row1['moduleName'];?></span></div>
							
							</div>
						</div>
						</div>



					<br><br>

					<div class="row">
							<div class="modal slide-left" id="tab" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-info">
							<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
							<form  action="back/createChapter.php" method="POST" >
								<div class="modal-body">

									<div class="card-body row">
										<div class="col-lg-12" style="text-align: center; color: #888">
											<p>Create Chapter</p>
										</div>
										<input class="mdl-textfield__input"  type="hidden" name="moduleID" value="<?php echo $_GET['id'];?>" > 
										<div class="col-lg-12 p-t-20">
											<div

											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<input class="mdl-textfield__input" name="chapter" type="text" id="txtFirstName" required>
											<label class="mdl-textfield__label">Chapter name</label>
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer">
								<button 
								class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>


						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header style="font-weight: 600; ">Resources</header>
									
  								
								</div>

  
									<div class="card-body row ">
											
										<?php 
										$sql = "SELECT * FROM topics where moduleID='".secure($_GET['id'])."' and deleteStatus = 0";
										$query = mysqli_query($conn,$sql);
										while($row = mysqli_fetch_array($query)){
										?>
											<div class="col-lg-3 col-md-6  col-8">
											<a href="view_resources.php?id=<?php echo $row['id']?>">
												<span style="font-size: 10px;position: absolute;
												top: .7rem; text-transform: none;"></span>
												<img src="folder.svg" style="height: 3rem;"> <span style="font-size: 10px; font-style: italic;color: #919aa3!important; font-weight: 200 "><?php echo date('d-F',strtotime($row['time_stamp']))?></span>
												<br>
												<span style="font-size: 12px"> <?php echo $row['topicName']?></span>

												</a>


												</div>
											<?php }?>

												
												

									
									
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

	<script type="text/javascript">
		$( document ).ready(function() {
  //Calls the modal when button is clicked
  $('#jsModal').on('click', function(){
    $('#myModal').modal()
  });
  // Calls when modal hides
  $('#myModal').on('hidden.bs.modal', function (e) {
    alert('The modal closed')
  })
});
	</script>
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
  <!--  This is the modal content --> 
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