<?php 
session_start();
include "../action.php";
include "position.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){
	if(secure($_SESSION['adminLevel']) == "1" || secure($_SESSION['adminLevel']) == "2" ){
		
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
					font-family: arial;
					font-size: 13px;
				}
				.choose-btn:hover {
					background: #24c7c7;
				}
				.modal-full {
					min-width: 50%;
					
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
						<div class="row">
							<div class="col-lg-12">
								<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
									GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
									egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
									tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
									ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
									<a href="#myModal" id="exam66" class="btn-xs mdl-js-button mdl-button--fab margin-right-10 btn-pink pull-right" data-toggle="modal" data-upgraded=",MaterialButton" style="margin-top: 3rem">
										<i class="material-icons">add</i>
									</a>
								</div>
								
							</div>
							<br>


							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-full" role="document">
									<div class="modal-content card-box">
										<div class="modal-header card-head">
											<h5 class="modal-title">Create Staff</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red !important;font-size: 20px">
												<span aria-hidden="true" style="color: red !important;font-size: 20px">rrrt</span>
											</button>
										</div>
										<div class="modal-body p-4" id="result">
											
											<div class="row">
												<div class="col-sm-12">
													<form class="submitForm "  enctype="multipart/form-data">
														<div class="row">
															<div class="card-body row">
																<div class="col-lg-6 p-t-20">
																	<div
																	class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																	<input class="mdl-textfield__input" type="text" id="txtFirstName" name="firstname">
																	<label class="mdl-textfield__label">First Name</label>
																</div>
															</div>
															<div class="col-lg-6 p-t-20">
																<div
																class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																<input class="mdl-textfield__input" type="text" id="txtLasttName" name="lastname">
																<label class="mdl-textfield__label">Last Name</label>
															</div>
														</div>
														<div class="col-lg-6 p-t-20">
															<div
															class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
															
															<select class="mdl-textfield__input" name="usertype">
																<option value="">Select Role</option>
							
				<?php if(secure($_SESSION['adminLevel']) == "1"){ ?>	
																<option value="2">Principal</option>
				<?php } ?>
				<?php if(secure($_SESSION['adminLevel']) == "1" || secure($_SESSION['adminLevel']) == "2" ){ ?>	
																<option value="5">Head of Department</option>
																<option value="3">Course Manager</option>
																<option value="4">Facilitator/Instructor</option>
										<?php } ?>						

															</select>
															<label for="list2" class="mdl-textfield__label">UserType</label>
														</div>
													</div>
													<div class="col-lg-6 p-t-20">
														<div
														class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
														
														<select class="mdl-textfield__input" name="gender">
															<option value=""></option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
														<label for="list2" class="mdl-textfield__label">Gender</label>
													</div>
												</div>

												<div class="col-lg-6 p-t-20">
													<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
													
													<select class="mdl-textfield__input" name="title">
														<option>Select Title...</option>
														<option value="Mr">Mr</option>
														<option value="Miss">Miss</option>
														<option value="Mrs">Mrs</option>
														

													</select>
													<label for="list2" class="mdl-textfield__label">Prefex</label>
													
												</div>
											</div>
											<div class="col-lg-6 p-t-20">
												<div
												class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="email" id="txtemail" name="email">
												<label class="mdl-textfield__label">Email</label>
												<span class="mdl-textfield__error">Enter Valid Email Address!</span>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="tel" id="date" name="phone">
											<label class="mdl-textfield__label">Mobile Number</label>
										</div>
									</div>							
									
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
											<textarea class="mdl-textfield__input" rows="4" id="text7" name="address"></textarea>
											<label class="mdl-textfield__label" for="text7">Address</label>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
											<textarea class="mdl-textfield__input" rows="4" id="education" name="bio"></textarea>
											<label class="mdl-textfield__label" for="text7">Education</label>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<label class="control-label col-md-12">Upload Photo
										</label></div>
										<div class="col-md-12">


											<label for="hiddenBtn" class="choose-btn btn btn-default" id="chooseBtn"><span>upload</span><i class="fa fa-cloud-upload"></i></label>
											<input type="file" id="hiddenBtn" name="img"accept="image/*">
										</div>
										
										
										<div class="col-lg-12 p-t-20 text-center">
											<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" data-dismiss="modal">Cancel</button>

											<button type="submit" 
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info" style="text-transform: none;">Submit</button>
											
										</div>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div style="
			background: #fff;
			min-height: 50px;
			box-shadow: none;
			position: relative;
			margin-bottom: 20px;
			transition: .5s;
			border: 1px solid #f2f2f2;
			border-radius: 0;">

			<div class="card-body ">
				<div class="mdl-tabs mdl-js-tabs">
					<div class="mdl-tabs__tab-bar tab-left-side">
						<a href="#tab4-panel" class="mdl-tabs__tab is-active">All Staff</a>


					</div>
					<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
						<div class="row">
							<?php


                          if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                            $page_no = $_GET['page_no'];
                          } else {
                            $page_no = 1;
                          }


                          $total_records_per_page = 8;
                          $offset = ($page_no-1) * $total_records_per_page;
                          $previous_page = $page_no - 1;
                          $next_page = $page_no + 1;
                          $adjacents = "2";



                          $result_count = mysqli_query(
                            $conn,
                            "SELECT COUNT(*) As total_records FROM `management`"
                          );
                          $total_records = mysqli_fetch_array($result_count);
                          $total_records = $total_records['total_records'];
                          $total_no_of_pages = ceil($total_records / $total_records_per_page);
                          $second_last = $total_no_of_pages - 1;


							$sql ="select * from management LIMIT ".$offset.", ".$total_records_per_page.""; 


							$result = mysqli_query($conn,$sql);
							$getResult = mysqli_num_rows($result);

							if($getResult){

								while($row = mysqli_fetch_array($result)){

									?>



									<!-- START STAFF-->

									<div class="col-md-3">
										<a href="viewProfile.php?id=<?php echo $row['managementID'];?>">
											<div class="card card-box">
												<div class="card-body no-padding ">
													<div class="doctor-profile">
														<?php if($row['managementPhoto'] != ""){?>
														<img src="management/<?php echo $row['managementPhoto']?>" class="doctor-pic"
														alt="">
													<?php }else{ ?>

														<img src="../assets/img/vinco.png" class="doctor-pic"
														alt="">

												<?php } ?>
														<div class="profile-usertitle">

															<div class="name-center"> <?php echo $row['managementName']?> </div>
														</div>
														
														<div>

														</div>
														
													</div>
												</div>
											</div>
										</a>
									</div>

									<!-- END  -->

								<?php }} ?>

								<div class="col-lg-12">
					
<ul class="pagination">
                        <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                        <li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } ?>>
                          <a  class="page-link" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                        </li>

                        <?php 
                        if ($total_no_of_pages <= 10){     
                          for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                            if ($counter == $page_no) {
                             echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                           }else{
                             echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                           }
                         }
                       }
                       elseif($total_no_of_pages > 10){

                        if($page_no <= 4) {     
                         for ($counter = 1; $counter < 8; $counter++){     
                          if ($counter == $page_no) {
                           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                         }else{
                           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                         }
                       }
                       echo "<li class='page-item'><a class='page-link'>...</a></li>";
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                     }

                     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
                      echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                      echo "<li class='page-item'><a class='page-link'>...</a></li>";
                      for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
                       if ($counter == $page_no) {
                         echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                       }else{
                         echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                       }                  
                     }
                     echo "<li class='page-item'><a class='page-link'>...</a></li>";
                     echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                     echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                   }

                   else {
                    echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                    echo "<li class='page-item'><a class='page-link'>...</a></li>";

                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                      if ($counter == $page_no) {
                       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                     }else{
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                     }                   
                   }
                 }
               }
               ?>

               <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
                <a class='page-link'<?php

if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
              </li>
              <?php if($page_no < $total_no_of_pages){
                echo "<li class='page-item' ><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
              } ?>
            </ul>
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
<!-- start js include path -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
  <script src="../assets/plugins/material/material.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.min.js"></script>
    <script src="../assets/js/pages/sweet-alert/sweet-alert-data.js"></script>
<!-- end js include path -->
<script type="text/javascript">
		$(document).ready(function(){
        $(document).on('submit', '.submitForm', function(e){
              e.preventDefault();
              
              $.ajax({
                type:"POST",
                url:"back/createStaff.php",
                data:new FormData(this),
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData:false, // To send DOMDocument or non processed data file it is set to false
                success:function(data){
                 
                                
                $('#myModal').modal('hide');
                showDialog6('Staff successfully created.');
                //window.location.reload();
               
                }
              });
            });
         });

</script>


<?php

}else{

	echo "<script> 
	window.location='index.php';

	</script>";

}


}else{
	echo "<script> alert('Erreur! Error!! Please login');
	window.location='logout.php';

	</script>";
}
?>

</body>

</html>






