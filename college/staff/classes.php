<?php
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail']) ){


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
	<style type="text/css">
	.modal{
		margin-top: 2rem
	}	
	.doctor-profile,.name-center , .doctor-name{
		text-align: left !important;
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
		

		
		<div class="page-content-wrapper">
			<div class="page-content">

				<br><br>

				<div class="row">
					<div class="col-sm-12">
						<div class="card-box">

							<div class="card-body ">
								<div class="mdl-tabs mdl-js-tabs">
									<div class="row">
										<div class="col-md-8"></div>
										<div class="col-md-4">
											<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info pull-right" style="text-transform: none;" data-toggle="modal" data-target="#tab3" >Create Exam</button>
										</div>
									</div>
									<div class="mdl-tabs__tab-bar tab-left-side">
										<a href="#tab4-panel" class="mdl-tabs__tab is-active">Exams</a>
										
								
									</div>
									<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
										<div class="row">
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										
										<li class="mdl-menu__item" data-toggle="modal" data-target="#tab2"><i class="material-icons">edit</i>Edit
										</li>
										<li class="mdl-menu__item"><i class="material-icons">delete</i>Delete
										</li>
										
										
									</ul>

														<div class="doctor-profile">
															
																<div class="profile-usertitle">
																<div class="doctor-name">Exam Name </div>
																<div class="doctor-name" style="font-size: 12px">Exam Class</div>
																<div class="name-center" style="font-size: 10px">Exam Date: 12 Jun  </div>
															</div>
														
															
															<div class="profile-userbuttons">
															
																<a href="examReply.php"
																	class="btn btn-circle deepPink-bgcolor btn-sm">View</a>

																	
															</div>
														</div>
													</div>
												</div>
											</div>
										
										
										</div>			
											
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
<!-- end js include path -->
</body>
<div class="modal slide-left" id="tab2" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
								<div class="modal-dialog" role="document">
									<div class="modal-content modal-info">
										<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
										<div class="modal-body">
											
								<div class="card-body row">
									<div class="col-lg-12" style="text-align: center; color: #888">
										<p>Create Exams</p>
									</div>
									<div class="col-lg-12 p-t-20">
										<input type="text" name=""  class="mdl-textfield__input" placeholder="">
										<label class="mdl-textfield__label" style="margin-left: 1rem"> Exam Name</label>
										<br>
										<br>
										<select class="mdl-textfield__input">

											<option>English Check Point Stage 5</option>
											<option> Maths Check Point Stage 9 </option>
											
											
										</select>
										
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<br><input class="mdl-textfield__input" type="number" id="txtFirstName">
											<label class="mdl-textfield__label">Exam Marks</label>
										</div>

										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<br><input class="mdl-textfield__input" type="date" id="txtFirstName">
											<label class="mdl-textfield__label">Exam Date</label>
										</div>

										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<br><input class="mdl-textfield__input" type="file" id="txtFirstName">
											<label class="mdl-textfield__label">Upload Document</label>
										</div>
									</div>
									
								
								</div>
								</div>
								<div class="modal-footer">
							<button type="button"
								class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Save</button>
							</div>
							
							</div>
							</div>
							</div>

								<div class="modal slide-left" id="tab3" tabindex="-1" role="dialog" aria-labelledby="Warning Modal" >
								<div class="modal-dialog" role="document">
									<div class="modal-content modal-info">
										<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
										<div class="modal-body">
											
								<div class="card-body row">
									<div class="col-lg-12" style="text-align: center; color: #888">
										<p>Create Exam</p>
									</div>
									<div class="col-lg-12 p-t-20">
										<input type="text" name=""  class="mdl-textfield__input" placeholder="">
										<label class="mdl-textfield__label" style="margin-left: 1rem"> Exam Name</label>
										<br>
										<br>
										<select class="mdl-textfield__input">

											<option>English Check Point Stage 5</option>
											<option> Maths Check Point Stage 9 </option>
											
											
										</select>
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<br><input class="mdl-textfield__input" type="number" id="txtFirstName">
											<label class="mdl-textfield__label">Exam Marks</label>
										</div>
										
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<br><input class="mdl-textfield__input" type="date" id="txtFirstName">
											<label class="mdl-textfield__label">Exam Date</label>
										</div>
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<br><input class="mdl-textfield__input" type="file" id="txtFirstName">
											<label class="mdl-textfield__label">Upload Document</label>
										</div>
									</div>
									
								
								</div>
								</div>
								<div class="modal-footer">
							<button type="button"
								class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Save</button>
							</div>
						
							</div>
							</div>
							</div>

<?php 
}else{

	echo "<script> alert('Error! Please Log in');
	window.location='logout.php';
	</script>";
}
?>

</html>