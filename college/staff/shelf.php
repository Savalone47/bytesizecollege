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
		<meta name="description" content="school Management System" />
		<meta name="author" content="School Management System" />
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
.text{
	font-size: 15px;
	height: 3.5em;
	overflow: hidden;
	
}
.txt{
	font-size: 13px;
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
                            "SELECT COUNT(*) As total_records FROM `modules` where moduleCourseID = 0"
                          );
                          $total_records = mysqli_fetch_array($result_count);
                          $total_records = $total_records['total_records'];
                          $total_no_of_pages = ceil($total_records / $total_records_per_page);
                          $second_last = $total_no_of_pages - 1;






					$sql = "SELECT * FROM modules where moduleCourseID = 0 order by moduleID DESC limit ".$offset.", ".$total_records_per_page."";
					$query = mysqli_query($conn,$sql);
					$number = 1;
					while ($row = mysqli_fetch_array($query)){
					

					?>

					   <!--===========shelf card starts ===============-->
       
               <div class="col-md-3">
                  <div class="card card-box">
                      <div class="card-head">

                            <header><span class=" "><i class="material-icons">assignment</i></span></header>
                            <button id="panel-button2<?php echo $row['moduleID']?>"
                            class="mdl-button mdl-js-button mdl-button--icon pull-right"
                            data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                          </button>


                          <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                          data-mdl-for="panel-button2<?php echo $row['moduleID']?>">

                          <li class="mdl-menu__item" data-toggle="modal" data-target="#modal1<?php echo $row['moduleID']?>"><i class="fa fa-pencil" style="color: green"></i>&nbsp;&nbsp; Edit
                          </li>  
                           
                          
                          <li class="mdl-menu__item">


                          	<form onclick="return confirm('Are you sure you want to delete this?')" action="back/deleteModule.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $row['moduleID']?>">
							<button class="btn btn-danger btn-xs">
								<i class="fa fa-trash-o "></i> Delete
							</button>
						</form>
                          </li>

                          </ul>
                        </div>
                    <div class="card-body no-padding ">
                      <div class="doctor-profile">
                        <img src="../assets/img/vinco.png" class="doctor-pic"
                          alt="">
                        <div class="profile-usertitle">
                          <div class="doctor-name text"><?php echo $row['moduleName']?> </div>
                         
                        </div>
                        <p class="txt">Teacher: 
  <?php

 $getSql = "SELECT * FROM lectureAssigns inner join management on lectureAssigns.lectureID = management.managementID where moduleID='".$row['moduleID']."'";
						 $getQuery = mysqli_query($conn,$getSql);
						 $getRow = mysqli_fetch_array($getQuery);
						 echo $getRow['managementName'];
						 ?>
                        </p>
                        <div>
                          <p  class="txt"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<a
                              href="#"><?php echo date('Y-M-d', strtotime($row['moduleDate']));?> </a></p>
                          
                        </div>
                        <div class="profile-userbuttons">
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
      <!--================ shelf card========-->
      <div class="modal modal fade" id="modal1<?php echo $row['moduleID']?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
             <div class="modal-body">
                 		<div class="">
<div class="row">
	<div class="col-md-12">
		<div class=" card-topline-aqua">
			<div class="card-body no-padding height-9">
				<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="card-body row">
									<div class="col-lg-10 p-t-20">
										 <form action="back/updateModule.php" method="POST" enctype="multipart/form-data">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="moduleName"value="<?php echo $row['moduleName']?>" id="txtFirstName">
											<label class="mdl-textfield__label">Subject Name</label>
										</div>
									</div>
									
									
									
									<div class="col-lg-10 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												
											<select class="mdl-textfield__input" name="facilitator">
													<?php 


											$sqlite = "SELECT * FROM management where managementLevel=4";
											$querylite = mysqli_query($conn,$sqlite);
											while($rowlite= mysqli_fetch_array($querylite)){?>


												<option value="<?php echo $rowlite['managementID']?>"><?php echo $rowlite['managementName']?></option>
											

											<?php
										}
											?>

											</select>
											<label for="list2" class="mdl-textfield__label">Teacher</label>
										</div>
									</div>
									
								
									
									
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
											<input type="hidden" name="id" value="<?php echo $row['moduleID']?>">
											<textarea class="mdl-textfield__input" name="overview" rows="4" id="education">
												<?php echo $row['moduleOverview']?>
											</textarea>
											<label class="mdl-textfield__label" for="text7">Subject Overview</label>
										</div>
									</div>
							
									
									
									<div class="col-lg-12 p-t-20 text-center">
										<button
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" data-dismiss="modal">Cancel</button>

										<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info" style="text-transform: none;">Submit</button>
										
									</div>
									</form>
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





      <?php }?>






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




 <form action="back/createModule.php" method="POST" enctype="multipart/form-data">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content card-box">
            <div class="modal-header card-head">
                <h5 class="modal-title">Create Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red !important;font-size: 20px">
                    <span aria-hidden="true" style="color: red !important;font-size: 20px">rrrt</span>
                </button>
            </div>
            <div class="modal-body p-4" id="result">
               
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="card-body row">
									<div class="col-lg-10 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" name="moduleName" type="text" id="txtFirstName">
											<label class="mdl-textfield__label">Subject Name</label>
										</div>
									</div>
									
															
									
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" data-dismiss="modal">Cancel</button>

										<button 
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info" style="text-transform: none;">Submit</button>
										
									</div>
								</div>
							</div>
						</div>
					</div>
            </div>
           
        </div>
    </div>
</div>
</form>



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


<!--Datatables-->

	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
	<script src="assets/js/pages/table/table_data.js"></script>



<!--Datatables-->
<!-- end js include path -->
<!-- end js include path -->


<?php

}else{

echo "<script> 
	window.location='index.php';

	</script>";

}


 }else{
	echo "<script> alert('Error! Please login');
	window.location='logout.php';

	</script>";
}
?>

</body>

</html>






