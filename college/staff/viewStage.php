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
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>
	<style type="text/css">
		#panel-button1{
			margin-top: 3rem;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
</head>
<!-- END HEAD -->

<body
<?php


$sql ="select * from courses where coursesID = '".secure($_GET['id'])."'"; 


$result = mysqli_query($conn,$sql);
$getResult = mysqli_num_rows($result);



$row = mysqli_fetch_array($result);

?>

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
					<div class="col-lg-12">
						<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
							GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
							egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
							tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
							ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>


							<button id="panel-button1"
							class="mdl-button mdl-js-button mdl-button--fab margin-right-10 btn-pink pull-right"
							data-toggle="modal" data-target="#tab2">
							<i class="material-icons">add</i>
						</button>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">

						<!-- BEGIN PROFILE CONTENT -->
						<div class="profile-content">



							<!-- Nav tabs -->
							<div class="row">
								<div class="col-md-12">
									<div class="card ">
										<div class="card-head">
											<?php


											$sql ="select * from courses
											inner join department on department.departmentID = courses.courseDepartment
											 where coursesID = '".secure($_GET['id'])."'"; 


											$result = mysqli_query($conn,$sql);
											$getResult = mysqli_num_rows($result);



											$row = mysqli_fetch_array($result);
											$courseName = $row['courseName'];
											$departmentName = $row['departmentName'];


											if($_GET['change']=='true'){

													echo "<p style='color:green'>Teacher Updated successfuly!</p>";
											}

											?>

											<header> <?php echo $row['courseName'];?></header>







										</div>
										<div class="card-body ">

											<div class="table-scrollable">
												<table
												class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
												id="example4">
												<thead>
													<tr>

														<th> Subject </th>
														<th> subject Name </th>

														<th>Teacher</th>
														
														<th>Action</th>
														
													</tr>
												</thead>
												<tbody>
													<?php


													$sql1 ="SELECT * FROM `courses` 
													inner join modules on modules.moduleCourseID = courses.coursesID 
													inner join lectureAssigns on lectureAssigns.moduleID = modules.moduleID
													inner join management on management.managementID = lectureAssigns.lectureID
													where courses.coursesID = '".secure($_GET['id'])."'"; 


													$result1 = mysqli_query($conn,$sql1);
													$getResult = mysqli_num_rows($result1);



													while($row1 = mysqli_fetch_array($result1)){




														?>


<!-- edit module modal -->
<div class="modal slide-left" id="teacher<?php echo $row1['moduleID']?>" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
<div class="modal-dialog" role="document">
	<div class="modal-content modal-info">
		<div data-dismiss="modal"><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
		<form action="back/editTeacher.php" method="POST" enctype="multipart/form-data">


<input type="hidden" name="moduleID" value="<?php echo $row1['moduleID']?>">
			<div class="modal-body">

				<div class="card-body row">
					<div class="col-lg-12" style="text-align: center; color: #888">
						<p>Choose a Teacher</p>
					</div>


						Select Teacher

						<select class="mdl-textfield__input" name="facilitator">

							<?php 
							$sql12 = "SELECT *
							from  management";

							$query12 = mysqli_query($conn,$sql12);
							while($row12 = mysqli_fetch_array($query12)){
								?>


								<option value="<?php echo $row12['managementID'];?>"><?php echo $row12['managementName'];?></option>

							<?php } ?>

						</select>

						


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

<!-- end  modal -->



														<tr class="odd gradeX">
															<td class="patient-img">
																<img src="coll.jpg"
																alt="">
															</td>
															<td data-toggle ="modal" data-target ="#module<?php echo $row1['moduleID'];?>">

																<a href="#" data-toggle ="modal" data-target ="module"><?php echo $row1['moduleName'];?></a>
															</td>

															<td><a href="viewProfile.php?id=<?php echo $row1['managementID'];?>"><?php echo $row1['managementName'];?></a></td>
															<td>
													<?php if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2'){ ?>



																	<a onclick="return confirm('Are you sure you want to delete this?')" href="back/removeModule.php?id=<?php echo $row1['moduleID']?>" >
																		<input type="hidden" name="id" value="<?php echo $row1['moduleID']?>">
																		<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
																	</a>

																<?php }?>
							<button class="btn btn-success" data-toggle="modal" data-target ="#add<?php echo $row1['moduleID']?>" >Add student</button>

							



															</td>	








														</tr>
														<div class="modal fade show" id="module<?php echo $row1['moduleID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style=" padding-left: 15px;">

															<div class="modal-dialog modal-dialog-centered" role="document">

																<div class="modal-content" style="padding: 1rem">

																	<p style="color:black;"><?php echo $row1['courseName']?>: <?php echo $row1['moduleName'];?></p><span data-dismiss="modal" style="font-size: 20px; color: red;font-weight: 100;position: absolute;top: 2px;right: 1rem">×</span>
																	<div class="state-overview">
																		<div class="row">
																			<div class="col-xl-6 col-md-6 col-12">
																				<a href="community.php?id=<?php echo $row1['moduleID']?>">
																					<div class="info-box purple">
																						<span class=" "><i class="fa fa-comments-o"></i></span>

																						<span class="info-box-text" style="color: #fff;">Community</span>

																						<!-- /.info-box-content -->
																					</div></a>
																					<!-- /.info-box -->
																				</div>
																				<!-- /.col -->
																				<div class="col-xl-6 col-md-6 col-12">
																					<a href="chapter.php?id=<?php echo $row1['moduleID']?>">
																						<div class="info-box bg-b-green">

																							<span class=" "><i class="fa fa-book"></i></span>

																							<span class="info-box-text" style="color: #fff;">Chapters</span>

																							<!-- /.info-box-content -->
																						</div>
																					</a>
																					<!-- /.info-box -->
																				</div>
																				<!-- /.col -->
																				<div class="col-xl-6 col-md-6 col-12">
																					<a href="my_assignment.php?id=<?php echo $row1['moduleID']?>">
																						<div class="info-box bg-b-blue">
																							<span class=" "><i class="fa fa-file-text"></i></span>

																							<span class="info-box-text" style="color: #fff;">Assignments</span>	

																							<!-- /.info-box-content -->
																						</div></a>
																						<!-- /.info-box -->
																					</div>
																					<!-- /.col -->


																					<div class="col-xl-6 col-md-6 col-12">
																						<a href="resources.php?id=<?php echo $row1['moduleID']?>">
																							<div class="info-box bg-b-yellow">
																								<span class=" ">
																									<i class="fa fa-folder-open-o"></i></span>

																									<span class="info-box-text" style="color: #fff;">Resources</span>

																									<!-- /.info-box-content -->
																								</div></a>
																								<!-- /.info-box -->
																							</div>	
																							<div class="col-xl-6 col-md-6 col-12">
																								<a href="students.php?moduleID=<?php echo $row1['moduleID']?>">
																									<div class="info-box bg-b-pink">
																										<span class=" ">
																											<i class="fa fa-users"></i></span>

																											<span class="info-box-text" style="color: #fff;">Students </span>

																											<!-- /.info-box-content -->
																										</div></a>
																										<!-- /.info-box -->
																									</div>	

																									<div class="col-xl-6 col-md-6 col-12">
																								

																								     

																								   <a data-dismiss="modal" data-toggle="modal" data-target ="#teacher<?php echo $row1['moduleID']?>">
																									<div class="info-box bg-b-pink">
																										<span class=" ">
																										<i class="fa fa-users"></i></span>

																									<span class="info-box-text" style="color: #fff;">Change Teacher</span>

																													<!-- /.info-box-content -->
																												</div></a>
																												<!-- /.info-box -->
																										</div>	

			



																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
<div class="modal slide-left addStudentHere" id="add<?php echo $row1['moduleID']?>" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
<div class="modal-dialog" role="document">
<div class="modal-content modal-info">
<div data-dismiss="modal"><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
<form class="addStudent" enctype="multipart/form-data">

<input type="hidden" name="course" value="<?php echo $_GET['id']?>">

<div class="modal-body">

<div class="card-body row">
	<div class="col-lg-12" style="text-align: center; color: #888">
		<p>Add Student to <?php echo $row1['moduleName']?> </p>
	</div>




	<input type="hidden" name="moduleID"  value="<?php echo $row1['moduleID']?>">
	<div class="col-lg-12 p-t-20">



Select Student
<br/>
<br/>
<select class="mdl-textfield__input" name="student">



<?php 
$sql = "SELECT * FROM students";

$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
?>


<option value="<?php echo $row['studentID'];?>"><?php echo $row['studentName'];?></option>

<?php } ?>

</select>

<br>
<br>

</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" 
class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Save</button>
</div>

</form>

</div>
</div>
</div>

           		<?php } ?>

           	</tbody>
           </table>
       </div>
   </div>
</div>
</div>

<div class="col-lg-12 card">
<div class="card-head">
	<header>All Students</header>



</div>
<div class="row">

	<?php
	// $sql2 = "SELECT * FROM `courses` 
	// inner join modules on modules.moduleCourseID = courses.coursesID 
	// inner join moduleAssign on moduleAssign.moduleID = modules.moduleID
	// inner join students on students.studentID = moduleAssign.studentID
	// 
	

	$sql2 = "SELECT * FROM `courses` inner join assignedCourses on assignedCourses.courseID = courses.coursesID inner join modules on modules.moduleCourseID = courses.coursesID inner join moduleAssign on moduleAssign.moduleID = modules.moduleID inner join students on students.studentID = moduleAssign.studentID
	where courses.coursesID = ".secure($_GET['id'])."
	Group by students.studentID
	"; 

	$result2 = mysqli_query($conn,$sql2);
	$getResult2 = mysqli_num_rows($result2);



	while($row2 = mysqli_fetch_array($result2)){

		?>


		<div class="col-md-4">
			<div class="card card-box">
				<div class="card-body no-padding ">
					<div class="doctor-profile">
						<img src="../../student/vinco/avatar.png" class="doctor-pic"
						alt="">
						<div class="profile-usertitle">
							<div class="doctor-name"><?php echo $row2['studentName'];?></div>
						</div>
					</div>

					<div>

						<div class="profile-userbuttons">
							<a href="studentProfile.php?id=<?php echo $row2['studentID']?>" class="btn btn-circle deepPink-bgcolor btn-sm">view</a>
						</div>
					</div>
				</div>
			</div>
		</div>







		<?php 

	}

	?>

</div>
</div>
</div>

</div>

</div>
<!-- END PROFILE CONTENT -->
</div>
</div>

</div>

</div>




<!-- start footer -->
<?php include 'footer.php';?>
<!-- end footer -->
</div>
</div>




<script type="text/javascript">
$(document).ready(function(){
	$("#search").keyup(function(){
		var query = $(this).val();
		if (query != "") {
			$.ajax({
				url: 'search.php',
				method: 'POST',
				data: {query:query},
				success: function(data){

					$('#output').html(data);
					$('#output').css('display', 'block');

					$("#search").focusout(function(){
						$('#output').css('display', 'none');
					});
					$("#search").focusin(function(){
						$('#output').css('display', 'block');
					});
				}
			});
		} else {
			$('#output').css('display', 'none');
		}
	});
});
</script>




<!-- start js include path -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/popper/popper.js"></script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Common js-->
<script src="../assets/js/app.js"></script>
<script src="../assets/js/layout.js"></script>
<script src="../assets/js/theme-color.js"></script>
<!-- Material -->
<script src="../assets/plugins/material/material.min.js"></script>
<!--google map-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>
  <script src="../assets/plugins/material/material.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.min.js"></script>
    <script src="../assets/js/pages/sweet-alert/sweet-alert-data.js"></script>
</body>

<?php 
}else{

echo "<script> alert('Error! Please Log in');
window.location='logout.php';
</script>";
}
?>
<script type="text/javascript">
		$(document).ready(function(){
        $(document).on('submit', '.createSubject', function(e){
              e.preventDefault();
              
              $.ajax({
                type:"POST",
                url:"back/addModule.php",
                data:new FormData(this),
                contentType: false,
                cache: false, 
                processData:false, 
                success:function(data){
                 
                                
                $('#myModal').modal('hide');
                showDialog6('Subject successfully created.');
                   setTimeout(function () {
     
        history.go(0);
      }, 2000);
           
               
                }
              });
            });








 $(document).on('submit', '.addStudent', function(e){
              e.preventDefault();
              
              $.ajax({
                type:"POST",
                url:"back/addStudentModule.php",
                data:new FormData(this),
                contentType: false,
                cache: false, 
                processData:false, 
                success:function(data){
					$(".addStudentHere").modal('hide');
                	showDialog6('Student successfully created.');
                	setTimeout(function () {

                		history.go(0);
                	}, 2000);
           
               
                }
              });
            });

         });


	
       
      
</script>


</html>



<div class="modal fade in" id="register" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" >
<div class="modal-dialog" role="document">
	<div class="modal-content" style="margin-top:150px; width: 60vw;">
		<div class="modal-header">

			<div class="row">
				<div class="col-lg-12">
					<center><h4 class="modal-title" id="modalLabel">Add Register</h4></center>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="col-lg-1"></div>

			</div>

		</div>
		<form action="editApplicant.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="course" value="33">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Parent/Gurdian FullName</label>
								<input type="text" class="form-control" name="parentfirstname" value="<?php echo $rowlite1['parentFullName']?>" required="">
							</div>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Parent/Gurdian Email</label>
								<input type="email" class="form-control" name="parentemail" value="<?php echo $rowlite1['parent2email']?>" required="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Parent/Gurdian Phone Number</label>
								<input type="tel" class="form-control" name="parentphone" value="<?php echo $rowlite1['parent2phone']?>"  required="">
							</div>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Pupil FullName</label>
								<input type="text" class="form-control" name="pupilfirstname" value="<?php echo $rowlite['studentName']?>" required="">
							</div>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Date of Birth</label>
								<input type="date" class="form-control" name="pupildateofbirth" value="<?php echo $rowlite['studentDOB']?>" required="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Nationality</label>
								<select name="nationality" class="form-control">

									<option value="<?php echo $rowlite['studentCountry']?>" ><?php echo $rowlite['studentCountry']?></option>

								</select>
							</div>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Gender</label>
								<select id="gender" name="pupilgender" class="form-control">
									<option value="<?php echo $rowlite['gender']?>" ><?php echo $rowlite['gender']?></option>                             
								</select>  

							</div>
						</div>
					</div>



					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Is your child fluent in English?*Both speaking and understanding.</label>

								<select id="lang" name="lang" class="form-control">
									<option value="<?php echo $rowlite['studentLang']?>" ><?php echo $rowlite['studentLang']?></option>

								</select>

							</div> 
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<div class="col-sm-12">
								<label>Do you already have a child/children enrolled at Sagan Academy?*</label>

								<select id="enr" name="enr" class="form-control">
									<option value="">Please Select</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>

								</select>

							</div> 
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-sm-12">
								<label>If you have selected 'yes' please provide  the name(s) of your other child/children below</label>

								<textarea class="form-control" rows="5" name="otherNames" id="comment" placeholder="write names " required="">

									<?php echo $rowlite1['otherChild']?>
								</textarea>

							</div>


						</div>
					</div>



					<div class="col-md-12">
						<label>Please give us further information about your child's specific Special Education Needs and any other diagnosed conditions:</label>
						<textarea class="form-control" name="further"><?php echo $rowlite['studentNeeds']?></textarea> 
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">

					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>












<div class="modal slide-left" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
<div class="modal-dialog" role="document">
	<div class="modal-content modal-info">
		<div data-dismiss="modal"><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
		<form class="addStudent" enctype="multipart/form-data">

			<input type="hidden" name="course" value="<?php echo $_GET['id']?>">

			<div class="modal-body">

				<div class="card-body row">
					<div class="col-lg-12" style="text-align: center; color: #888">
						<p>Add Student</p>
					</div>

					<input type="hidden" name="moduleID"  value="<?php echo $row2['moduleID']?>">
					<div class="col-lg-12 p-t-20">


						<br>
						<br>
						Select Student
						<select class="mdl-textfield__input" name="student">

							<?php 
							$sql = "SELECT * FROM students";

							$query = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($query)){
								?>


								<option value="<?php echo $row['studentID'];?>"><?php echo $row['studentName'];?></option>

							<?php } ?>

						</select>

						<br>
						<br>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" 
				class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Save</button>
			</div>

		</form>

	</div>
</div>
</div>















<!-- create module modal -->
<div class="modal slide-left" id="tab2" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
<div class="modal-dialog" role="document">
	<div class="modal-content modal-info">
		<div data-dismiss="modal"><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
		<form class="createSubject" enctype="multipart/form-data">



			<div class="modal-body">

				<div class="card-body row">
					<div class="col-lg-12" style="text-align: center; color: #888">
						<p>Add Subject</p>
					</div>


					<input type="hidden" name="courseName" value="<?php echo $courseName;?>">
					<input type="hidden" name="departmentName" value="<?php echo $departmentName;?>">


					<div class="col-lg-12 p-t-20">
						<input type="hidden" name="courseID"  class="mdl-textfield__input" value="<?php echo $_GET['id'];?>" >

						<br>
						<br>
						Select Subject
						<select class="mdl-textfield__input" name="moduleName">

							<?php 
							$sql = "SELECT DISTINCT moduleName
							from  modules 
							";

							$query = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($query)){
								?>


								<option value="<?php echo $row['moduleName'];?>"><?php echo $row['moduleName'];?></option>

							<?php } ?>

						</select>

						<br>
						<br>
						Select Teacher

						<select class="mdl-textfield__input" name="facilitator">

							<?php 
							$sql1 = "SELECT *
							from  management";

							$query1 = mysqli_query($conn,$sql1);
							while($row1 = mysqli_fetch_array($query1)){
								?>


								<option value="<?php echo $row1['managementID'];?>"><?php echo $row1['managementName'];?></option>

							<?php } ?>

						</select>

				

					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<br>
					<textarea class="mdl-textfield__input" rows="4" name="overview" id="text7"></textarea>
					<label class="mdl-textfield__label">Subject Overview</label>
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

<!-- end exam create modal -->














