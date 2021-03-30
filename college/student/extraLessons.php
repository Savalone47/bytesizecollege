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
		

		.table thead th {
			vertical-align: bottom;
			border-bottom: none;

		}


		tr td{
			height: 8rem;
		}

		.accent-pink-gradient {

			background: linear-gradient(135deg, #8E44AD, #6777ef);
			-webkit-transition: .2s ease box-shadow, .2s ease transform;
			transition: .2s ease box-shadow, .2s ease transform;
			color: #fff;
		}
	
.width{
	width: 16.6%; 
	max-width: 16.6%;
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
					<div class="col-lg-6">	<a href="" class="backbtn" onclick="history.go(-1); return false;" style="margin-top: 0rem"><img src="data:image/png;base64,iVBORw0K
						GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
						egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
						tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
						ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a></div>

						
						

									<div class="col-sm-12 col-md-12 col-xl-12">



										<div class="card-box">

											<div class="card-head">
												
												
										
										<header><span>

											   <?php
											   $sqlR = "SELECT * FROM courses where coursesID='".$_GET['id']."'";
											   $queryR = mysqli_query($conn,$sqlR);
											   $rowR = mysqli_fetch_array($queryR);
											   echo $rowR['courseName'] 

												?></span>&nbsp;&nbsp;Time Table</header>

											
											</div>
											<div class="card-body ">

												<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
												id="example4">
												<thead class="accent-pink-gradient">
													<tr >

														<th class="width">Time</th>
														<th class="width">Monday</th>
														<th class="width">Tuesday  </th>
														<th class="width">Wednesday </th>
														<th class="width">Thursday </th>
														<th class="width">Friday </th>
														<th class="width">Sartaday</th>
														<th class="width">Sunday </th>
													</tr>
												</thead>


												<tbody id="viewExtraLessons">


													

                                               </tbody>
</table>
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
<script type="text/javascript">
	 $.ajax({
        url: "viewExtraLessons.php",
        type: "POST",
        cache: false,
        
        success: function(data){
          //alert(data);
          $('#viewExtraLessons').html(data); 
        }
      });
</script>

<div class="modal slide-left" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="Warning Modal" >
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
			<div class="modal-body">
				<form action="../../live/api/createRoom/index.php"method="POST">
					<div class="card-body row">
						<div class="col-lg-12" style="text-align: center; color: #888">
							<p>Create extra Lesson</p>
						</div>
						<div class="col-lg-12 p-t-20">
							<input type="hidden" name="extra" value="true">
							<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
							<select class="mdl-textfield__input" name="moduleID" required>

								<?php
								$sql2 = "SELECT * FROM assignedCourses where studentID='".$_SESSION['adminID']."'";
								$query2 = mysqli_query($conn,$sql2);
								$row2 = mysqli_fetch_array($query2);


								$sqlite = "SELECT * FROM moduleAssign inner join modules on moduleAssign.moduleID = modules.moduleID
								where moduleAssign.studentID = '".$_SESSION['adminID']."' and moduleCourseID='".$row2['courseID']."'";
								$querylite = mysqli_query($conn,$sqlite);

								while($rowlite = mysqli_fetch_array($querylite)){
									?>

									<option value="<?php echo $rowlite['moduleID']; ?>"><?php echo $rowlite['moduleName'].''.$rowlite['courseName']; ?></option>
								<?php }?>


							</select>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>


							<input type="date" name="date" class="form-control">
							<label class="mdl-textfield__label"> Date</label>
						</div>

						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br><input class="mdl-textfield__input" type="time" name="time" id="txtFirstName">
						<label class="mdl-textfield__label">Start Time</label>
					</div>


					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<br>
					<input class="mdl-textfield__input" type="time" name="end" id="txtFirstName">
					<label class="mdl-textfield__label">End Time</label>
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




















<div class="modal slide-left" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Warning Modal" >
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
			<div class="modal-body">
				<form action="add_timetable.php"method="POST">
					<div class="card-body row">
						<div class="col-lg-12" style="text-align: center; color: #888">
							<p>Create Lesson</p>
						</div>
						<div class="col-lg-12 p-t-20">
							<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
							<select class="mdl-textfield__input" name="moduleID">

								<?php


								$sqlite = "SELECT * FROM moduleAssign inner join modules on moduleAssign.moduleID = modules.moduleID
								where moduleAssign.studentID = '".$_SESSION['adminID']."' and moduleCourseID='".$row2['courseID']."'";
								$querylite = mysqli_query($conn,$sqlite);

								while($rowlite = mysqli_fetch_array($querylite)){
									?>

									<option value="<?php echo $rowlite['moduleID']; ?>"><?php echo $rowlite['moduleName'].''.$rowlite['courseName']; ?></option>
								<?php }?>


							</select>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>

							<input type="hidden" name="create" value="true">
							<select class="form-control" name="day">
								<option>Monday</option>
								<option>Tuesday</option>
								<option>Wednesday</option>
								<option>Thursday</option>
								<option>Friday</option>

							</select>
							<label class="mdl-textfield__label"> Day</label>
						</div>

						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br><input class="mdl-textfield__input" type="time" name="time" id="txtFirstName">
						<label class="mdl-textfield__label">Start Time</label>
					</div>


					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<br>
					<select class="form-control" name="duration">
						<option value="30">30 min</option>
						<option value="45">45 min</option>
						<option value="1"> 1:30 hours </option>


					</select>
					<label class="mdl-textfield__label">Duration</label>
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


</html>