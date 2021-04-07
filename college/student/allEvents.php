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
			<title>All Event</title>
			<!-- google font -->
			<?php include 'headerLinks.php';?>
			<style type="text/css">
				.doctor-profile img{
					height: 5rem;
					width: 5rem
				}
				#panel-button1{
					margin-top: 3rem;
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
			

				
				</div>
			</div>
			<br>
			


			



			<div class="row">
				<div class="col-sm-12">
					<div style="    background: #fff;
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
								<a href="#tab4-panel" class="mdl-tabs__tab is-active">All Events</a>


							</div>
							<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
								<div class="row">
									<?php
									 if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                            $page_no = $_GET['page_no'];
                          } else {
                            $page_no = 1;
                          }


                          $total_records_per_page = 6;
                          $offset = ($page_no-1) * $total_records_per_page;
                          $previous_page = $page_no - 1;
                          $next_page = $page_no + 1;
                          $adjacents = "2";



                          $result_count = mysqli_query(
                            $conn,
                            "SELECT COUNT(*) As total_records FROM `events`"
                          );
                          $total_records = mysqli_fetch_array($result_count);
                          $total_records = $total_records['total_records'];
                          $total_no_of_pages = ceil($total_records / $total_records_per_page);
                          $second_last = $total_no_of_pages - 1;






									$sql ="select * from events order by eventID DESC limit ".$offset.", ".$total_records_per_page." "; 


									$result = mysqli_query($conn,$sql);
									$getResult = mysqli_num_rows($result);

									if($getResult){

										while($row = mysqli_fetch_array($result)){

											?>



											<!-- event STUDENT -->

											<div class="col-md-4">
				 								<div class="card card-box">
				 										
													
											<div class="card-body no-padding ">
												<div class="doctor-profile">
													<!-- CONTROLS -->
											

											<!-- END -->
													<img src="../staff/events/<?php echo $row['eventImage'];?>" class="doctor-pic"
													alt="">
													<div class="profile-usertitle">
														<div class="doctor-name" style="height: 3.5em; overflow: hidden;"><?php echo $row['eventTitle'];?></div>
														
													</div>
													<p><?php echo $row['eventLocation'];?></p>
													<div>
											<p><i class="fa fa-calendar"></i></i>&nbsp;&nbsp;<?php echo $row['eventDate'] ?></p>
													</div>
													<div>
														<p><i class="fa fa-clock-o"></i>
															
															<?php echo date('H:i',strtotime($row['eventstatTime'])) ." &nbsp;to &nbsp; ". 
															date('H:i',strtotime($row['eventendTime']))?></p>

															<button class="btn btn-info" data-toggle="modal" data-target="#view<?php echo $row['eventID'];?>" >View</button>
														</div>

													</div>
												</div>
											</div>
										</div>
		

<!-- Start View Event -->

<div class="modal slide-left" id="view<?php echo $row['eventID'];?>" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
	<div class="modal-dialog" role="document">
		<br>
		<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
		<div class="modal-content modal-info">
				
				<div class="modal-body">

					<div class="card-body row">
						<div class="col-lg-12" style="text-align: center; color: #888">
							<p>View Event</p>
						</div>
						<div class="doctor-profile">
													<!-- CONTROLS -->
											

											<!-- END -->
						<img src="../staff/events/<?php echo $row['eventImage'];?>" class="doctor-pic"
													alt="">
						<div class="profile-usertitle">
						<div class="doctor-name" style="height: 3.5em; overflow: hidden;"><?php echo $row['eventTitle'];?></div>
														
						</div>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>
							<input class="mdl-textfield__input" type="date" id="txtFirstName" readonly value="<?php echo $row['eventDate'];?>">
							<label class="mdl-textfield__label">Event Date</label>
						</div>

						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br><input class="mdl-textfield__input" type="time" id="txtFirstName" readonly value="<?php echo $row['eventstatTime'];?>">
						<label class="mdl-textfield__label">Event Start Time</label>
					</div>

					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<br><input class="mdl-textfield__input" type="time" id="txtFirstName" readonly value="<?php echo $row['eventendTime'];?>">
					<label class="mdl-textfield__label">Event End Time</label>
				</div>

				<div
				class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
				<br>
				<textarea class="mdl-textfield__input" readonly  rows="4" id="text7"><?php echo $row['eventLocation'];?></textarea>
				<label class="mdl-textfield__label">Venue</label>
			</div>

			<div
			class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
			<br>
			<textarea class="mdl-textfield__input" rows="4"  readonly id="text7"><?php echo $row['eventDescription'];?></textarea>
			<label class="mdl-textfield__label">Event Description</label>
		</div>


		
</div>


</div>
</div>

</div>
</div>
</div>





<!-- End of View -->

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
<!-- end js include path -->


<?php



}else{
	echo "<script> alert('Please Login First!');
	window.location='logout.php';

	</script>";
}
?>

</body>



</html>

