<?php 
session_start();
include "../action.php";
include "position.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){
	if(secure($_SESSION['adminLevel']) == "1" || secure($_SESSION['adminLevel']) == "2" || secure($_SESSION['adminLevel']) == "5"){
		
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
				#panel-button1{
					margin-top: 3rem;
					margin-bottom: 1rem;
				}

				.label{
					box-shadow: none;
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
		
<? 
$sqll = "SELECT * FROM department WHERE departmentID = ".secure($_GET['id'])."";
$res = mysqli_query($conn,$sqll);
$roll = mysqli_fetch_array($res);
?>
	
			<button id="panel-button1"
			class="mdl-button mdl-js-button mdl-button--fab margin-right-10 btn-info pull-right"
			data-toggle="modal" data-target="#tab2">
			<i class="material-icons">add</i>
		</button>
			</div>
			
		</div>

		<div class="row">
			<div class="col-sm-12">
				<center><h3><? echo $roll['departmentName']?></h3></center>
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
							<a href="#tab4-panel" class="mdl-tabs__tab is-active">All Classes</a>


						</div>
						<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
							<div class="row">
								<?php
								 if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                            $page_no = $_GET['page_no'];
                          } else {
                            $page_no = 1;
                          }


                          $total_records_per_page = 12;
                          $offset = ($page_no-1) * $total_records_per_page;
                          $previous_page = $page_no - 1;
                          $next_page = $page_no + 1;
                          $adjacents = "2";



                          $result_count = mysqli_query(
                            $conn,
                            "SELECT COUNT(*) As total_records FROM `courses` 
                            inner join department on department.departmentID = courses.courseDepartment
                            
							where courses.courseDepartment  = '".$_GET['id']."'"
                          );
                          $total_records = mysqli_fetch_array($result_count);
                          $total_records = $total_records['total_records'];
                          $total_no_of_pages = ceil($total_records / $total_records_per_page);
                          $second_last = $total_no_of_pages - 1;



								$sql ="SELECT * FROM courses 
								inner join department on department.departmentID = courses.courseDepartment 
							
								where courses.courseDepartment  = '".$_GET['id']."' 
								order by courses.coursesID ASC 
								LIMIT ".$offset.", ".$total_records_per_page.""; 


								$result = mysqli_query($conn,$sql);
								$getResult = mysqli_num_rows($result);

								if($getResult){

									while($row = mysqli_fetch_array($result)){ ?>




						<div class="col-lg-4">
							<div class="card card-box">

							<div class="card-head">
							
								<button id="panel-button<?php echo $row['coursesID'];?>"
									class="mdl-button mdl-js-button mdl-button--icon float-right"
									data-upgraded=",MaterialButton">
									<i class="material-icons">more_vert</i>
								</button>
								
								<?php if($row['courseDelivery'] == "Fulltime"): ?><p class="label  label-menu label-success float-left">Fulltime</p><?php endif;?>
								<?php if($row['courseDelivery'] == "Parttime"): ?><span class="label label-rouded label-menu label-danger float-left">Parttime</span><?php endif;?>
								<?php if($row['courseDelivery'] == "Distance"): ?><span class="label label-rouded label-menu label-warning  float-left">Distance</span><?php endif;?>
								<!-- 
								 -->
								<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
								data-mdl-for="panel-button<?php echo $row['coursesID'];?>">
								
<?php if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2'){ ?>
								<li class="mdl-menu__item" data-toggle="modal" data-target="#tab<?php echo $row['coursesID'];?>"><i class="material-icons">edit</i>Edit
								</li>		
<?php } ?>

								<li class="mdl-menu__item">
	<a onclick="return confirm('Are you you sure you want to delete this?')" href="back/deleteUtil.php?id=<?php echo $row['coursesID'];?>&department=<?php echo $row['departmentName']; ?>&class=<?php echo $row['courseName']?>"><i class="material-icons">delete</i>Delete</a>
								</li>

							</ul>
						</div>

						<!-- end control -->
						<a href="viewStage.php?id=<?php echo $row['coursesID'];?>">
							<div class="">



								<div class="card-body no-padding ">
									<div class="doctor-profile">
										<img src="../img/<?=strtolower($row['courseDelivery'])?>.jpg" class="doctor-pic"
										alt="">
										<div class="profile-usertitle">

											<div class="name-center"><?php echo $row['courseName']?> </div>
										</div>

										<div>

										</div>

									</div>
								</div>
							</div>
						</a>
						<div class="card-footer">

							<?php if($row['courseIntake'] == "Jan"): ?><span class="label label-rouded label-menu label-warning float-left">Jan</span><?php endif; ?>

							<?php if($row['courseIntake'] == "Mar"): ?><span class="label  label-menu label-danger  float-left">Mar</span> <?php endif; ?>

							<?php if($row['courseIntake'] == "Jun"): ?><span class="label label-rouded label-menu label-info float-left">June</span><?php endif; ?>
							
					<?php if($row['courseIntake'] == "Sep"): ?><span class="label  label-menu label-danger  float-left">Sep</span> <?php endif; ?>
						</div>
					</div>
					</div>

					<!-- END  -->

					<!-- Edit class modal -->
					<div class="modal slide-left editModal"  id="tab<?php echo $row['coursesID'];?>" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
						<div class="modal-dialog" role="document">
							<div class="modal-content modal-info">
								<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
								<form class="editForm" enctype="multipart/form-data">
									
									<div class="modal-body">
										<!-- start -->

										<div class="modal-body">

					<div class="card-body row">
						<div class="col-lg-12" style="text-align: center; color: #888">
							<p>Edit Course</p>
						</div>
						<input type="hidden" name="id"   value="<?php echo $row['coursesID'];?>">
						<div class="col-lg-12 p-t-20">
					  <label>Course Name</label>
					    <input type="text" name="courseName"  class="mdl-textfield__input" value="<?php echo $row['courseName'];?>" >


						<input type="hidden" name="previousName"  class="mdl-textfield__input" value="<?php echo $row['courseName'];?>" >
							
							<br>
							<br>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>
							<select class="mdl-textfield__input" name="courseType" >
							<option value="<?php echo $row['courseType'];?>"><?php echo $row['courseType'];?></option>
							<option value="Certified">Certified</option>
							<option value="Short Course">Short Course</option>

							

							</select>

							<label class="mdl-textfield__label">Course Type</label>
						</div>

						<input type="hidden" name="departmentName" value="<?php echo $row['departmentName'];?>">

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>
							<select class="mdl-textfield__input" name="department" required>
							<option value="<?php echo $row['courseDepartment'];?>"><?php echo $row['departmentName'];?></option>
							<?php
							$sql1 = "select * from department"; 

							$result1 = mysqli_query($conn, $sql1);

							while($row1 = mysqli_fetch_array($result1)){ ?> 

								<option value="<?php echo $row1['departmentID'];?>"><?php echo $row1['departmentName'];?></option>

								<?php
							}

							?>

							</select>

							<label class="mdl-textfield__label">Department</label>
						</div>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br><input class="mdl-textfield__input" type="number" id="txtFirstName" name="courseCode" value="<?php echo $row['courseCode'];?>">
							<label class="mdl-textfield__label">Course Reference</label>
						</div>

					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br>
			<input class="mdl-textfield__input" type="number" id="txtFirstName" name="duration" value="<?php echo $row['courseDuration'];?>">
						<label class="mdl-textfield__label">Course Duration</label>
					</div>

					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br>
						<select class="mdl-textfield__input" name="timeline" required>
							<option value="<?php echo $row['courseTimeline'];?>"><?php echo $row['courseTimeline'];?></option>
							<option value="day">Day(s)</option>
							<option value="week">Week(s)</option>
							<option value="months">Month(s)</option>
							<option value="year">Year(s)</option>
							</select>
						<label class="mdl-textfield__label">Course Timeline</label>
					</div>

					



						<div
				class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
				<br><textarea class="mdl-textfield__input" rows="4" name="overview"><?=$row['courseOverview'];?></textarea>
				<label class="mdl-textfield__label">Course description</label>
				</div>




	</div>


</div>
</div>


										<!-- end -->

				
		</div>
		<div class="modal-footer">
			<button 
			class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info">Update Class</button>
		</div>

	</form>

</div>
</div>
</div>

						<!-- end edit class modal -->

					<?php }} ?>

					<div class="col-lg-12">
					
<ul class="pagination">
                        <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                        <li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } ?>>
                          <a  class="page-link" <?php if($page_no > 1){ echo "href='?id=".$_GET['id']."&page_no=$previous_page'"; } ?>>Previous</a>
                        </li>

                        <?php 
                        if ($total_no_of_pages <= 10){     
                          for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                            if ($counter == $page_no) {
                             echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                           }else{
                             echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=$counter'>$counter</a></li>";
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
                       echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=$second_last'>$second_last</a></li>";
                       echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                     }

                     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
                      echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=1'>1</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=2'>2</a></li>";
                      echo "<li class='page-item'><a class='page-link'>...</a></li>";
                      for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
                       if ($counter == $page_no) {
                         echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                       }else{
                         echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                       }                  
                     }
                     echo "<li class='page-item'><a class='page-link'>...</a></li>";
                     echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=$second_last'>$second_last</a></li>";
                     echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                   }

                   else {
                    echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=1'>1</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=2'>2</a></li>";
                    echo "<li class='page-item'><a class='page-link'>...</a></li>";

                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                      if ($counter == $page_no) {
                       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                     }else{
                       echo "<li class='page-item'><a class='page-link' href='?id=".$_GET['id']."&page_no=$counter'>$counter</a></li>";
                     }                   
                   }
                 }
               }
               ?>

               <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
                <a class='page-link'<?php

if($page_no < $total_no_of_pages) { echo "href='?id=".$_GET['id']."&page_no=$next_page'"; } ?>>Next</a>
              </li>
              <?php if($page_no < $total_no_of_pages){
                echo "<li class='page-item' ><a class='page-link' href='?id=".$_GET['id']."&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
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
<script src="../assets/plugins/material/material.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.min.js"></script>
    <script src="../assets/js/pages/sweet-alert/sweet-alert-data.js"></script>

<script type="text/javascript">
		$(document).ready(function(){
        $(document).on('submit', '.createClass', function(e){
              e.preventDefault();
              
              $.ajax({
                type:"POST",
                url:"back/createClass.php",
                data:new FormData(this),
                contentType: false,
                cache: false, 
                processData:false, 
                success:function(data){
                 $('#tab2').modal('hide');
                showDialog6('Class successfully created.');
                   setTimeout(function () {
     
        history.go(0);
      }, 2000);
           
               
                }
              });
            });





         $(document).on('submit', '.editForm', function(e){
              e.preventDefault();
              
              $.ajax({
                type:"POST",
                url:"back/editClasses.php",
                data:new FormData(this),
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData:false, // To send DOMDocument or non processed data file it is set to false
                success:function(data){

                	$('.editModal').modal('hide');
                	showDialog6('Class successfully updated.');
                	setTimeout(function () {

                		history.go(0);
                	}, 2000);

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
	echo "<script> alert('Error! Please log in');
	window.location='logout.php';

	</script>";
}
?>

</body>

</html>
<?php 

$sqlite = "SELECT * FROM department where departmentID='".$_GET['id']."'";
$querylite = mysqli_query($conn,$sqlite);
$rowlite = mysqli_fetch_array($querylite);

?>
<!-- create class modal -->
<div class="modal slide-left" id="tab2" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
			<form class="createClass" enctype="multipart/form-data">
				<input type="hidden" name="departmentName" value="<?php echo $rowlite['departmentName'];?>">
				<div class="modal-body">

					<div class="card-body row">
						<div class="col-lg-12" style="text-align: center; color: #888">
							<p>Add Course</p>
						</div>
						<div class="col-lg-12 p-t-20">
							<br>
							
							<input type="text" name="courseName"  class="mdl-textfield__input" >
							<label class="mdl-textfield__label" style="margin-left: 1rem">Course Name</label>
							

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>
							<select class="mdl-textfield__input" name="courseType" >

							<option value="Career">Career</option>
							<option value="Short Course">Short Course</option>

							</select>

							<label class="mdl-textfield__label">Course Type</label>
						</div>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>
							<select class="mdl-textfield__input" name="department" required>
							
							<?php
							$sql1 = "select * from department where departmentID = ".$_GET['id']; 

							$result1 = mysqli_query($conn, $sql1);

							$row1 = mysqli_fetch_array($result1) ?> 

								<option value="<?php echo $row1['departmentID'];?>"><?php echo $row1['departmentName'];?></option>

								<?php
							

							?>

							</select>

							<label class="mdl-textfield__label">Department</label>
						</div>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br><input class="mdl-textfield__input" type="number" id="txtFirstName" name="courseCode">
							<label class="mdl-textfield__label">Course Reference</label>
						</div>

						

						
					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br>
						<input class="mdl-textfield__input" type="number" id="txtFirstName" name="duration" required>
						<label class="mdl-textfield__label">Course Duration</label>
					</div>

					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br>
						<select class="mdl-textfield__input" name="timeline" required>
							<option value="">Select Course Timeline</option>
							<option value="day">Day(s)</option>
							<option value="week">Week(s)</option>
							<option value="months">Month(s)</option>
							<option value="year">Year(s)</option>
							</select>
						<label class="mdl-textfield__label">Course Timeline</label>
					</div>

					

					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br>
						<select class="mdl-textfield__input" name="intake" required>
							
							<option value="Jan">January</option>
							<option value="Mar">March</option>
							<option value="Jun">June</option>
							<option value="Sep">September</option>
							</select>
						<label class="mdl-textfield__label">Course Intake</label>
					</div>

				<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br>
						<select class="mdl-textfield__input" name="delivery" required>
							
							<option value="Fulltime">Fulltime</option>
							<option value="Parttime">Parttime</option>
							<option value="Distance">Distance</option>
							
							</select>
						<label class="mdl-textfield__label">Course Delivery</label>
					</div>


			<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br>

						<textarea class="form-control" name="courseOverview" rows="3"></textarea>
						
						<label class="mdl-textfield__label">Course Description</label>
					</div>
				



	</div>


</div>
</div>
<div class="modal-footer">
	<button type="submit" 
	class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info">Create Course</button>
</div>

</form>

</div>
</div>
</div>

<!-- end  create class modal -->

