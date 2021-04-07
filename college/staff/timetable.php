<?php 
session_start();
include "../action.php";
include "../../college/util/connectDB.php";

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>

	<style type="text/css">
		

		.table thead th {
			vertical-align: bottom;
			border-bottom: none;

		}


		

		.accent-pink-gradient {

			background: linear-gradient(135deg, #8E44AD, #6777ef);
			-webkit-transition: .2s ease box-shadow, .2s ease transform;
			transition: .2s ease box-shadow, .2s ease transform;
			color: #fff;
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
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-10">
									<a href="" class="backbtn" onclick="history.go(-1); return false;" style="margin-top: 0rem"><img src="data:image/png;base64,iVBORw0K
										GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
										egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
										tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
										ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>  </div>

										<div class="col-lg-2">
											<div style="width: 85%; overflow: hidden;">	<?php if(isset($_SESSION['adminLevel']) ==='1' || isset($_SESSION['adminLevel'] ) ==='2' || isset($_SESSION['adminLevel']) === '5' ){?>
												<button type="button" class="btn-xs mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default pull-right "   data-toggle="modal" data-target="#myModal" style="text-transform: none;font-size: 14px;">Add Lessons<i class="material-icons" style="color: #36C6D3">add</i><span class="mdl-button__ripple-container"></button>
												<?php }else{?>

													<button type="button" class="btn-xs mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default pull-right "   data-toggle="modal" data-target="#myModal1" style="text-transform: none;font-size: 14px;">Add extra Lessons<i class="material-icons" style="color: #36C6D3">add</i><span class="mdl-button__ripple-container"></button>
														<?php }?></div>
													</div>
												</div>



											</div>

						<?php if(isset($_GET['classID'])):?>
							<input type="hidden" id="classID" value="<?=$_GET['classID'];?>">

							<?php else:?>
						<input type="hidden" id="classID" value="0">

						<?php endif;?>
											<div class="col-sm-12 col-md-12 col-xl-12">



												<div class="card-box">

													<div class="card-head">

														<div class="pull-right">

															<a href="extra_lessons.php">
																<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default pull-right "   style="text-transform: none;font-size: 14px; background-color: transparent !important; border: none;box-shadow: none;text-decoration: underline;color: #888888;">View extra Lessons<span class="mdl-button__ripple-container"></button>
																</a>



															</div>
															<header>
																<select class="form-control" id="change" onchange="change()">
																<option value="0">Select Class</option>
																<?php
						if(isset($_SESSION['adminLevel']) === '4' ){


							$sql8 = "SELECT DISTINCT coursesID,courseName  FROM courses 

									Inner join modules on modules.moduleCourseID = courses.coursesID

									Inner join lectureAssigns on lectureAssigns.moduleID = modules.moduleID

									where lectureAssigns.lectureID = '".$_SESSION['adminID']."'";
							$query8 = mysqli_query($conn,$sql8);
							while ($row8 = mysqli_fetch_array($query8)){ ?>


			<option value="<?php echo $row8['coursesID']?>"><?php echo $row8['courseName']?></option>

		<?php }

	} //endif for teacher

	if(isset($_SESSION['adminLevel']) == '1' || isset($_SESSION['adminLevel'] ) == '2' ){
		$sql7 = "SELECT DISTINCT coursesID,courseName,departmentName  FROM courses 
		Inner join department on department.departmentID = courses.courseDepartment
		order by departmentID DESC ";
		$query7 = mysqli_query($conn,$sql7);
		while($row7 = mysqli_fetch_array($query7)){
			?>

			<option value="<?php echo $row7['coursesID']?>"><?php echo $row7['courseName'] ." (".$row7['departmentName'].")"?></option>


		<?php }


	} //endif for admin and president


	if(isset($_SESSION['adminLevel']) === '5'){
		$sql7 = "SELECT DISTINCT coursesID,courseName FROM courses

inner join department on department.departmentID = courses.courseDepartment

where department.hodID = '".$_SESSION['adminID']."'";
		$query7 = mysqli_query($conn,$sql7);
		while($row7 = mysqli_fetch_array($query7)){
			?>

			<option value="<?php echo $row7['coursesID']?>"><?php echo $row7['courseName']?></option>


		<?php }


	} //endif for admin and president ?>

															</select></header><span style="text-align: center">Time Table</span>




														</div>
				<!-- start time table -->
				<div class="tablecard">
									  <table class="table table-bordered red-border text-center">
				                        <thead  class="accent-pink-gradient">
				                            <tr>
				                                <th>Time</th>
				                                <th>Monday </th>
				                                <th>Tuesday</th>
				                                <th>Wednesday</th>
				                                <th>Thursday</th>
				                                <th>Friday</th>
				                                <th>Saturday</th>
				                                <th>Sunday</th>
				                            </tr>
				                        </thead>

				                        <tbody id="tablePrimary">
				                           
				                           
				                        </tbody>
				                    </table>
													
							       </div>

				<!-- end time table -->

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


	<script type="text/javascript">
      $(document).ready(function() {
     
          $(".timetable").addClass("active");
          });
  </script>
</body>
<script type="text/javascript">
	function change(){

		let course = document.getElementById('change').value;

		if(course){

		window.location = '?classID='+ course;

		}
	}

	
		let action= "fetchTimeTable";
	 	 $.ajax({
				url: "viewTimetableprimary.php",
			 	type: "POST",
			 	cache: false,
			 	data: {
			 		action: action, classID: $('#classID').val()
			 	},
			 	success: function(data){
			 		//alert(data);
			 		$('#tablePrimary').html(data); 
			 	}
			 });


function showTimetable(str){
  if (str === "") {
    document.getElementById("tablePrimary").innerHTML = "";
  } else {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        document.getElementById("tablePrimary").innerHTML = this.responseText;
        window.location.reload();
      }
    };
    xmlhttp.open("POST","viewTimetableprimary.php?classID="+str,true);
    xmlhttp.send();
  }
}

// end file

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
							<select class="mdl-textfield__input" name="moduleID">

								<?php


								$sqlite = "SELECT * FROM lectureAssigns inner join modules on lectureAssigns.moduleID = modules.moduleID
								where lectureAssigns.lectureID = '".$_SESSION['adminID']."' and moduleCourseID='".$_GET['id']."'";
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
							<label class="mdl-textfield__label">Date</label>
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
							<input type="hidden" name="id" value="<?php echo isset($_GET['classID'])?>">
							<select class="mdl-textfield__input" name="moduleID">

								<?php


								$sqlite = "SELECT * FROM modules where moduleCourseID='".$_GET['classID']."'";
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
								<option>Saturday</option>
								<option>Sunday</option>

							</select>
							<label class="mdl-textfield__label"> Day</label>
						</div>
						<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>

							<input type="hidden" name="create" value="true">
							<select class="form-control" name="room">
							<?php 
							$rooms = mysqli_query($conn,
							"SELECT DISTINCT ID,name,departmentName FROM lecturerRoom

							inner join department on department.departmentID =  lecturerRoom.departmentID

							WHERE department.hodID =  '".$_SESSION['adminID']."'");

							while($room = mysqli_fetch_array($rooms)){

							?>
								<option value="<?=$room['ID'];?>"><?=$room['name'];?></option>
								
							<?php
							}
							?>
							</select>
							<label class="mdl-textfield__label"> Room</label>
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
						<option value="90"> 1:30 hours </option>
						<option value="360"> 6 hours </option>


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
</div>


</html>