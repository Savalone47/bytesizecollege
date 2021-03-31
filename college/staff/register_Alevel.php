<?php
session_start();
include "../action.php";

if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){



  if($_SESSION['userID1']){


}else{

    function randomSession() { 
          $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          $randomString = ''; 
        
          for ($i = 0; $i < 6; $i++) { 
              $index = rand(0, strlen($characters) - 1); 
              $randomString .= $characters[$index]; 
          } 
        
          return $randomString; 
      }

      $_SESSION['userID1'] = randomSession();





}

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Vinco Learning Management System" />
	<meta name="author" content="Vinco Learning Management System" />
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>

	<style type="text/css">
		/* panel layout mechanics */

    @media only screen and (max-width: 768px) {
 .panel-wrap {
   width: 95vw !important;
 }
 .triger{
  top: 1rem !important;
}
}
.panel-wrap {
  position: fixed;
  top: 0;
  bottom: 0;
  right: -100vw;
  width: 30vw;
  
  transition: .8s ease-out;
  z-index: 9999;
}
.panel {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: #fff;
  color: #888;
  overflow: auto;
  padding: 1em;
}




.triger{
  top: 5rem;
	 cursor: pointer;
   font-size: 11px;
   text-align: center;
   margin-right: 16px;
   height: 27px;
   line-height: 27px;
   min-width: 54px;
   outline: 0;
   padding: 0 8px;
 
   -moz-border-radius: 2px;
   -webkit-border-radius: 2px;
   border-radius: 2px;
   display: inline-block;
   color: #666;
   border: 1px solid #dcdcdc;
   border: 1px solid rgba(0,0,0,0.1);
   background-color: #f5f5f5;
   background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
   background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
   background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
   background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
   background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
}


/* demo display */
*,*:before, *:after {box-sizing: border-box;}

body {
  font-family: sans-serif;
  font-size: 18px;
}
h3 {
  margin: 0;
}
p {
  line-height: 1.4;
  margin: 2em 0 0 0;
}
[type="checkbox"] {
  font-size: 1em;
}
.closing{

   cursor: pointer;
   font-size: 11px;
   text-align: center;
   margin-right: 16px;
   height: 27px;
   line-height: 27px;
   min-width: 54px;
   outline: 0;
   padding: 0 8px;
   -moz-border-radius: 2px;
   -webkit-border-radius: 2px;
   border-radius: 2px;
   display: inline-block;
   color: crimson;
   border-color: crimson !important;
   border-radius: 50px;
   background-color: transparent;


}
#toggle{
    height:200px;
    width:0px;
    background:#FF4136;
}
#toggle,.toggle{
    height:200px;
    width:0px;
    max-width:100%;
    background:red;
    transition: width 750ms ease-in-out;
}

.two.hot{
  width:100%;
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
					<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
			GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
			egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
			tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
			ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>



						<button class="triger" id="triger" style="position: absolute;right: 1rem; ">View Selected Subjects</button>

					<div class="panel-wrap" id="panel">
					  <div class="panel">
					  	 <label  class="closing" id="close"><i class="fa fa-close" style="font-size: 25px; font-weight: 100"></i> </label>

                  <h5>Selected Subjects</h5>

              <?php


    $sql = "SELECT * FROM cart 
    inner join modules on modules.moduleID = cart.moduleID
    inner join courses on courses.coursesID = modules.moduleCourseID 
    WHERE userID = '".$_SESSION['userID1']."'";
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query)){

      ?>

					  <p><?php echo $row['moduleName'];?>: (<?php echo $row['courseName'];?>)<a class="pull-right" style="color: red;" href="removeCart.php?id=<?php echo $row['cartID'];?>">x</a></p>
					  <?php } ?> 
					  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
			<button type="button" class="btn btn-info btn-sm m-b-10 register" style="position: absolute;bottom: 2px;"  data-toggle="modal" data-target="#register">Register</button>
					  </div>
					</div>
					
			
					<br><br>

					




					<script type="text/javascript">						
    						$(document).ready( function(){
                $('#triger').click( function() {
                    // var toggleWidth = $("#toggle").width() == 800 ? "0px" : "30vw";
                    // $('#panel').animate({ width: toggleWidth });

                      $('#panel').css('left','auto').css('right','0px');
                });
               
            });
            					$(document).ready( function(){
                $('#close').click( function() {
                  $('#panel').css('left','auto').css('right','-100vw');
                });
               
            });
        	
					</script>
				

					<div class="row">
            <?php 


    $sql = "SELECT * FROM modules inner join courses on courses.coursesID = modules.moduleCourseID WHERE courseName not like 'Check%'";
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query)){

      ?>

						<div class="col-lg-3 col-md-6 col-12 col-sm-6">
							<div class="blogThumb" >
								<div class="thumb-center" style="height: 6rem; overflow: hidden;"><img class="img-responsive" alt="user" src="subject.png" style="height: 9rem; margin-top: -1rem"></div>
								<div class="white-box">
									
									<h4 class="m-t-20 m-b-20"><?php echo $row['moduleName'];?></h4>
									<div class="text-muted"><span class="m-r-10"><?php echo $row['courseName'];?></span>
										
									</div>
                <?php

            $sql2 = "SELECT * FROM cart WHERE userID = '".$_SESSION['userID1']."' AND moduleID = ".$row['moduleID']."";
                  $query2 = mysqli_query($conn,$sql2);
                  $_row = mysqli_fetch_array($query2);

                  if ($_row['userID'] == $_SESSION['userID1']) {
                        echo '<button class="btn btn-danger btn-xs" >Selected</button>';
                  }else{
                     echo '<a href="book.php?id='.$row["moduleID"].'"><button class="btn btn-success btn-xs" >Select Module</button></a>';
                  }
									?>
								

								</div>
							</div>
						</div>

          <?php 

           }



            ?>

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
			<?php 

       $_SESSION['userID'] = $_SESSION['userID1'];

      include 'footer.php';?>
			<!-- end footer -->
		</div>
	</div>
	<script type="text/javascript">




function myFunction() {
  document.getElementById("panel-wrap").width = "500px";
}
	</script>






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

<?php 
}else{

	echo "<script> alert('Error! Please Log in');
		window.location='logout.php';
		</script>";
}
?>


</html>

 <div class="modal slide-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
          <div class="modal-dialog" role="document">
          	<i class="fa fa-times" data-dismiss="modal" style="float: right;color: red"></i>
            <div class="modal-content modal-info">

              
              <div class="modal-body">
               
					<div class="col-md-12 col-sm-12">
							<div style="background: #fff;
							    min-height: 50px;
							    box-shadow: none;
							    position: relative;
							    margin-bottom: 20px;
							    transition: .5s;
							    border: 1px solid #f2f2f2;
							    border-radius: 0;">
								
								
									<div class="row">
										<div class="col-md-6 col-sm-6 col-6">
											<h2><?php echo $row['title']?></h2>
										<p style="font-size:10px;">Posted on: <?php echo date('d-m-Y',strtotime($row['time_stamp']))?>
											<br/><?php echo $row['eventLocation']?>
										</p>
										<p style="font-size:10px;"> </p>

										<p><?php echo $row['notification']?></p>
											
										</div>
										
									</div>
									
								</div>
							
							
						</div>
              </div>
              <div class="modal-footer">
               
              </div>
            </div>
          </div>
        </div>






<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                  <div class="modal-content" >
                    <div class="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: red;position: relative;z-index: 9999">&times;x</span>
                    </button>
                  </div>
                    <form action="../moduleSelect.php" role="form" method ="POST">
                    <div class="modal-body" style="padding: 1rem 2rem;">
                      <center><h4 class="modal-title" id="modalLabel" style="font-weight: 700;">Student Details</h4></center><br>
                    <div class="row" >

                      
                      <div class="col-md-6">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label >First Name</label>
                          <input type="text" class="form-control" name="firstName" required>
                        </div>
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label >Last Name</label>
                          <input type="text" class="form-control" name="lastName"  required>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label >Email</label>
                          <input type="text" class="form-control" name="email" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label >Gender</label>
                          <select class="form-control" name="gender" required>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Choose Not To Say</option>
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label>Date of Birth</label>
                          <input type="date" class="form-control" name="dateOfBirth" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label>Phone Number</label>
                          <input type="text" class="form-control" name="phoneNumber" required>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-12">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label>ID Number</label>
                          <input type="text" class="form-control" name="idNumber" required>
                                                
                        </div>
                        </div>
                      </div>
    
                    
                    </div>

                     <div class="row">

                      <div class="col-md-12">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label>Country</label>
                          <select class="form-control" name="country" required>
                            <? include "../countryList.php";?>
                          </select>
                                                
                        </div>
                        </div>
                      </div>

                        <div class="col-md-12">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label>City</label>
                          <input type="text" class="form-control" name="city" required>
                                                
                        </div>
                        </div>
                      </div>
    
                    
                    </div>
                         </div>
<div class="modal-footer">
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">Register</button>
                      </div>
                      </div>
    
                    </div>
                    </div>
                    
                    </form>
                  </div>
                </div>
              </div>

