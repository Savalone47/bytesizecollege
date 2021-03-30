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
	<meta name="description" content="Learning Management System" />
	<meta name="author" content="Learning Management System" />
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>

</head>
<!-- END HEAD -->
<style type="text/css">
	
	button.chatbox-open {
      position: fixed;
      bottom: 0;
      right: 0;
      border-radius: 50px;
      height: 52px;
      font-size: 12px;
      color: #fff;
      background-color: #0360a5;
      background-position: center center;
      background-repeat: no-repeat;
      box-shadow: 12px 15px 20px 0 rgba(46, 61, 73, 0.15);
      border: 0;

      cursor: pointer;
      margin: 16px;
    }


    .doctor-name img{
    	height: 2rem !important
    }

    .text{ 
            white-space: nowrap;  
            overflow: hidden !important; 
            text-overflow: ellipsis !important; 
            width: 100%;
        }

        .txt{
        	height: 3em;
        	display: block;
  display: -webkit-box;
  max-width: 100%;
  margin: 0 auto;
  font-size: 14px;
  line-height: 130%;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;




        }
</style>
<body
class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
<div class="page-wrapper">
	<?php include 'nav.php';?>

	<!-- start page container -->
	<div class="page-container">
		<?php include 'sidebar.php';?>
		

		
		<div class="page-content-wrapper">
			<div class="page-content">
				<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
			GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
			egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
			tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
			ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>

				<br><br>

         <?php

        $sqlite ="SELECT * FROM modules where moduleID='".$_GET['id']."'";
                $queryy = mysqli_query($conn,$sqlite);
                $numm = mysqli_fetch_array($queryy);
      ?>
          
                <div class="page-title" style="text-align: center;padding: 0 !important; margin: 0 !important;"><?php echo $numm['moduleName'];?>  </div>

				<div class="row">
					<div class="col-sm-12">
						<div style="	   
						    min-height: 50px;
						    box-shadow: none;
						    position: relative;
						    margin-bottom: 20px;
						    transition: .5s;
						    border: 1px solid #f2f2f2;
						    border-radius: 0;">

							<div class="card-body " style="background-color: transparent !important;">
								<div class="mdl-tabs mdl-js-tabs" style="background-color: transparent !important;">
									<div class="mdl-tabs__tab-bar tab-left-side" style="background-color: transparent !important;">
										<a href="#tab4-panel" class="mdl-tabs__tab is-active">Lessons</a>
										
										
									
									</div>
									<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel" style="background-color: transparent !important;">
										<div class="row">

											<?php 
												if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                            $page_no = $_GET['page_no'];
                          } else {
                            $page_no = 1;
                          }


                          $total_records_per_page = 9;
                          $offset = ($page_no-1) * $total_records_per_page;
                          $previous_page = $page_no - 1;
                          $next_page = $page_no + 1;
                          $adjacents = "2";



                          $result_count = mysqli_query(
                            $conn,
                            "SELECT COUNT(*) As total_records FROM `learning` where moduleID='".$_GET['id']."' and learningTopic='".$_GET['chapter']."' and deleteStatus = 0");
                          $total_records = mysqli_fetch_array($result_count);
                          $total_records = $total_records['total_records'];
                          $total_no_of_pages = ceil($total_records / $total_records_per_page);
                          $second_last = $total_no_of_pages - 1;


						$sql = "SELECT * FROM learning where moduleID='".$_GET['id']."' and learningTopic='".$_GET['chapter']."' and deleteStatus=0 limit ".$offset.", ".$total_records_per_page."";
											$query = mysqli_query($conn,$sql);
											while($row = mysqli_fetch_array($query)){

											?>
											<div class="col-md-3">
												<a href="view_material.php?id=<?php echo $row['learningID']?>">
												<div class="card card-topline-aqua">
													<div class="card-body no-padding ">
														<div class="card-head"></div>
														<div class="doctor-profile">
															
															<div class="profile-usertitle">
																<div class="doctor-name txt" style="text-align: left; font-size: 14px"><?php echo $row['learningName']?> </div>
																<div class="name-center" style="text-align: left;font-size: 12px"> Date:
																 <span style="float: right;font-size: 10px"><?php echo date('d-F-Y',strtotime($row['time_stamp'])); ?> </span> </div>
															</div>
														
															
															<div class="profile-userbuttons">
																
																<a href="view_material.php?module=<?php echo $_GET['id']?>&id=<?php echo $row['learningID']?>"
																	class="btn btn-circle blue-bgcolor btn-outline btn-xs">Material</a>

																	
															</div>
														</div>
													</div>
												</div>
											</a>
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
							
						</div>
					</div>
				</div>
			</div>
		</div>

<a href="discussion.php?id=<?php echo $_GET['chapter']?>&moduleID=<?php echo $_GET['id']?>">
<button class="chatbox-open">
  <i class="fa fa-comment fa-2x" aria-hidden="true"></i>
  discussion
</button>
</a>

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

<?php 
}else{

	echo "<script> alert('Error! Please Log in');
	window.location='logout.php';
	</script>";
}
?>

</html>