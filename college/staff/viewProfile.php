<?php 
session_start();
include "../action.php";
include "position.php";
include '../../college/util/connectDB.php';
include '../../college/util/connectDB.php';
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
		<title>Dashboard  | Home</title>
		<?php include 'headerLinks.php';?>

		<style type="text/css">
			.doctor-profile img{
				height: 5rem;
				width: 5rem
			}
					#hiddenBtn{
    display: none;
}
.choose-btn {
    border-radius: 2px;
    margin: 10px;
    float: left;
    color: #188ae2 ;
    padding: 5px 10px;
    height: 2rem;
    text-align: center;
    cursor: pointer;
    font-family: arial, sans-serif;
    font-size: 13px;
}
.choose-btn:hover {
    background: #24c7c7;
}
.modal-full {
    min-width: 50%;
    height: 60vh;
}
.profile-userpic img{
	height: 8rem;
	width: 8rem;
}





		</style>
	</head>


	<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">



	<div class="page-wrapper">
		<?php include 'nav.php'?>

	
		<div class="page-container">
			
			<?php include'sidebar.php';?>
		
			<div class="page-content-wrapper">
				<div class="page-content">
					

					<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
						GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
						egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
						tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
						ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
						<br><br>

						
						<!-- start content -->


						<?php

						$sql ="select * from management where managementID = '".secure($_GET['id'])."'"; 


						$result = mysqli_query($conn,$sql);
						$getResult = mysqli_num_rows($result);


						$row = mysqli_fetch_array($result);

						?>


						<div class="row">
							<div class="col-md-12">
								<div class="profile-sidebar">
									<div class="card card-topline-aqua">
										<div class="card-head">

											<header><span class=" "><i class="material-icons">assignment</i></span></header>
											<button id="panel-button"
											class="mdl-button mdl-js-button mdl-button--icon pull-right"
											data-upgraded=",MaterialButton">
											<i class="material-icons">more_vert</i>
										</button>
										<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										
										<li class="mdl-menu__item" style="padding: 0px !important" data-toggle="modal" data-target ="#myModal">
											<a href="#"  style="width: 100% !important; height: 100%"><i class="material-icons">edit</i>Edit</a>

											
										</li>			

										<li class="mdl-menu__item"><a href="back/deleteStaff.php?token=<? echo bin2hex(openssl_random_pseudo_bytes(50))?>&id=<?php echo $row['managementID'];?>"><i class="material-icons">delete</i>Delete</a>
										</li>
										
									</ul>
								</div>


								<div class="card-body no-padding height-9">
									<div class="row">
										<div class="profile-userpic">
											<img src="management/<?php echo $row['managementPhoto'];?>" class="img-responsive" alt=""> </div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"><?php echo $row['managementName'];?></div>
											<div class="profile-usertitle-job"><?php echo position($row['managementLevel']);?> </div>
										</div>

									</div>

								</div>

							
									
											<div class="card">
												<div class="card-head card-topline-aqua">
													<header>Subjects</header>
												</div>

												<?php

												$sql1 ="SELECT * FROM `lectureAssigns`

												inner join modules on modules.moduleID = lectureAssigns.moduleID

												where lectureAssigns.lectureID=  '".secure($_GET['id'])."'"; 


												$result1 = mysqli_query($conn,$sql1);
														// $getResult = mysqli_num_rows($result1);


												while($raw = mysqli_fetch_array($result1)){

													?>

													<div class="card-body no-padding height-9">
														<div class="work-monitor work-progress">

															<div class="states">
																<div class="info">
																	<div class="desc pull-left"><?php echo $raw['moduleName'];?></div>

																</div>
																<div class="progress progress-xs">
																	<div class="progress-bar progress-bar-danger progress-bar-striped active"
																	role="progressbar" aria-valuenow="40" aria-valuemin="0"
																	aria-valuemax="100" style="width: 100%">
																	<span class="sr-only">50% </span>
																</div>
															</div>
														</div>

													</div>
												</div>
											<?php } ?>

										</div>
									</div>
									<!-- END BEGIN PROFILE SIDEBAR -->
				<!-- BEGIN PROFILE CONTENT -->
				<div class="profile-content">
					<div class="row">
						<div class="card">
							<div class="card-topline-aqua">
								<header></header>
							</div>
							<div class="white-box">

								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div id="biography">
											<div class="row">
												<div class="col-md-6 col-12 b-r"> <strong>First Name</strong>
													<br>
													<p class="text-muted"><?php echo $row['managementName'];?></p>
												</div>
												<div class="col-md-6 col-12 b-r"> <strong>Last Name</strong>
													<br>
													<p class="text-muted"><?php echo $row['lastName'];?></p>
												</div>
												<div class="col-md-6 col-12 b-r"> <strong>Mobile</strong>
													<br>
													<p class="text-muted"><?php echo $row['managementContact'];?></p>
												</div>
												<div class="col-md-6 col-12 b-r"> <strong>Email</strong>
													<br>
													<p class="text-muted"><?php echo $row['managementEmail'];?></p>
												</div>
												
											</div>


											<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Gender </b>
												<div class="profile-desc-item pull-right"><?php echo $row['gender'];?></div>
											</li>

											
											<li class="list-group-item">
												<b>Designation</b>
												<div class="profile-desc-item pull-right"><?php echo position($row['managementLevel']);?></div>
											</li>
										</ul>
											<hr>
											<div >
												<?php echo $row['managementBio'];?>
													
												</div>
											
											
											
										</div>
									</div>

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
			
		</div>
		




<?php include 'footer.php';?>

</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content card-box">
            <div class="modal-header card-head">
                <h5 class="modal-title">Edit Staff Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red !important;font-size: 20px">
                    <span aria-hidden="true" style="color: red !important;font-size: 20px">rrrt</span>
                </button>
            </div>
            <div class="modal-body p-4" id="result">
            	<form class="editForm" enctype="multipart/form-data">
               
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<input class="mdl-textfield__input" type="text" id="txtFirstName" value="<?php echo $row['managementName'];?>"

							 name="firstName" style="color: #222">
											<label class="mdl-textfield__label">First Name</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<input class="mdl-textfield__input" type="text" id="txtLasttName" value="<?php echo $row['lastName'];?>" name="lastName">
											<label class="mdl-textfield__label">Last Name</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<input class="mdl-textfield__input" type="email" id="txtemail" value="<?php echo $row['managementEmail'];?>" name="email">
											<label class="mdl-textfield__label">Email</label>
											<span class="mdl-textfield__error">Enter Valid Email Address!</span>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="tel" id="date" value="<?php echo $row['managementContact'];?>" name="contact">
											<label class="mdl-textfield__label">Mobile Number</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												
											<select class="mdl-textfield__input" name="gendar">
												<option value="<?php echo $row['managementName'];?>"><?php echo $row['gender'];?>  </option>
												<option>male</option>
												<option>female</option>
											</select>
											<label for="list2" class="mdl-textfield__label">Gender</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											
											<select class="mdl-textfield__input" name="title">
												<option value="<?php echo $row['title'];?>"> <?php echo $row['title'];?> </option>
												<option value="Mr">Mr</option>
												<option value="Mrs ">Mrs</option>
												<option value="Miss">Miss</option>

											</select>
											<label for="list2" class="mdl-textfield__label">Prefex</label>
											
										</div>
									</div>
								
									
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
								<textarea class="mdl-textfield__input" rows="4" id="text7" value="<?php echo $row['managementBio'];?>" name="bio"><?php echo $row['managementBio'];?></textarea>
											<label class="mdl-textfield__label" for="text7">Bio</label>
										</div>
									</div>
									
									<div class="col-lg-12 p-t-20">
										<label class="control-label col-md-12">Upload Photo
										</label></div>
										<div class="col-md-12">


										 <label for="hiddenBtn" class="choose-btn btn btn-default" id="chooseBtn"><span>upload</span><i class="fa fa-cloud-upload"></i></label>
                        <input type="file" id="hiddenBtn" name= "fileToUpload">
										</div>
									
									<input type="hidden" name="id" value="<?php echo $row['managementID'];?>">
									<div class="col-lg-12 p-t-20 text-center">
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" data-dismiss="modal">Cancel</button>

										<input type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info" style="text-transform: none;" value="Update">
										
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
            </div>
           
        </div>
    </div>
</div>



<script type="text/javascript">
	
  var hiddenBtn = document.getElementById('hiddenBtn');
var chooseBtn = document.getElementById('chooseBtn');

hiddenBtn.addEventListener('change', function() {
    if (hiddenBtn.files.length > 0) {
        chooseBtn.innerText = hiddenBtn.files[0].name;
    } else {
        chooseBtn.innerText = 'Choose';
    }
});
</script>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/popper/popper.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="assets/js/pages/sparkline/sparkline-data.js"></script>
<!-- Common js-->
<script src="assets/js/app.js"></script>
<script src="assets/js/layout.js"></script>
<script src="assets/js/theme-color.js"></script>
<!-- material -->
<script src="assets/plugins/material/material.min.js"></script>
<!--apex chart-->
<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/chart/chartjs/home-data.js"></script>
<!-- summernote -->
<script src="assets/plugins/summernote/summernote.js"></script>
<script src="assets/js/pages/summernote/summernote-data.js"></script>




  <script src="../assets/plugins/material/material.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.min.js"></script>
    <script src="../assets/js/pages/sweet-alert/sweet-alert-data.js"></script>
<script type="text/javascript">
			$(document).ready(function(){
        $(document).on('submit', '.editForm', function(e){
              e.preventDefault();
              
              $.ajax({
                type:"POST",
                url:"updateManagement.php",
                data:new FormData(this),
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData:false, // To send DOMDocument or non processed data file it is set to false
                success:function(data){
                 
                                
                $('#myModal').modal('hide');
                showDialog6('Staff successfully updated.');
                setTimeout(function () {
     
        history.go(0);
      }, 2000);
               
                }
              });
            });
         });
</script>
<?php }else{
	echo "<script> alert('Please login ');
	window.location='logout.php';

	</script>";
}?>
</body>

</html>