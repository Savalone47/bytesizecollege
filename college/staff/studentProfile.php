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
   <meta name="description" content="School Management System" />
   <meta name="author" content="School Management System,Mazisi Msebele" />
   <title>Profile</title>
   <!-- google font -->
   <?php include 'headerLinks.php';?>
   <style type="text/css">
    .list-group-item input{
     border: none;


     font-size: 16px;
     font-family: "Helvetica","Arial",sans-serif;
     margin: 0;
     padding: 4px 0;
     border-bottom: 1px solid rgba(0,0,0,.12);
     background: 0 0;
     text-align: left;
   }
   .form-control{
     border: none;
     border-radius: 0px;
     border-bottom:  1px dashed rgba(0,0,0,.125);
   }
   .text-center{
    text-align: center !important;
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

				<br><br>

				<div class="mdl-tabs mdl-js-tabs">
					<div class="mdl-tabs__tab-bar tab-left-side">
						<a href="#tab4-panel" class="mdl-tabs__tab is-active" style="text-align: left !important;  ">Student Details</a>
						

					</div>
					<div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">


						<div class="row">
							<div class="col-lg-8">
								<div class="card-box">
									<div class="card-head card-topline-aqua">
										<header>
                      <button class="btn btn-info" data-toggle="modal" data-target="#tab<?php echo $_GET['id'];?>">Edit</button>

                      
                    </header>

									</div>
									<div class="card-body row">
                    <div class="row">
                      <?php 
                      $sql ="SELECT * FROM students 
                     WHERE studentID = '".secure($_GET['id'])."'"; 


                      $result = mysqli_query($conn,$sql);
                      $getResult = mysqli_num_rows($result);
                      $row = mysqli_fetch_array($result);
                           

                           $sqlite = mysqli_query($conn,"SELECT * FROM courses INNER JOIN department ON department.departmentID = courses.courseDepartment INNER JOIN assignedCourses ON courses.coursesID = assignedCourses.courseID WHERE assignedCourses.studentID = ".$_GET['id']."");

                           $roll = mysqli_fetch_array($sqlite);
                          
                      ?>

                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label> First Name</label>
                            <input type="text" class="form-control" name="parentfirstname" placeholder="First Name" required="" value="<?php echo $row['studentName'];?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label> Last Name</label>
                            <input type="text" class="form-control" name="parentlastName" placeholder="Last Name" required="" value="<?php echo $row['studentLastName'];?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label> Email</label>
                            <input type="email" class="form-control" name="parentemail" value="<?php echo $row['studentEmail'];?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label> Phone Number</label>
                            <input type="tel" class="form-control" name="parentphone" required="" value="<?php echo $row['studentPhone'];?>" readonly>
                          </div>
                        </div>
                      </div>
                    

                    <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Branch</label>
                            <input type="text" class="form-control" name="pupildateofbirth" required="" value="<?php echo $roll['departmentName'];?>" readonly>

                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Intake</label>
                            <input type="text" class="form-control" name="pupildateofbirth" required="" value="<?php echo $roll['courseIntake'];?>" readonly>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Date of Birth</label>
                            <?php
                              if (!empty($row['studentDOB'])) {?>
                                <input type="date" class="form-control" name="pupildateofbirth" placeholder="09-09-1999" required="" value="<?php echo $row['studentDOB'];?>" readonly>
                             <?php }else{ ?>
                              <input type="text" class="form-control" value="Did not provide" readonly>
                             <?php }

                            ?>
                            
                          </div>
                        </div>
                      </div>

                        <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Nationality</label>
                            <input type="text" class="form-control" name="pupildateofbirth" placeholder="09-09-1999" required="" value="<?php echo $row['studentCountry'];?>" readonly>
                          </div>
                        </div>
                      </div>



                      <div class="d-none col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Gender</label>
                            <input type="text" class="form-control" name="pupildateofbirth" placeholder="09-09-1999" required="" value="<?php echo $row['gender'];?>" readonly>

                          </div>
                        </div>
                      </div>


 <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Student Address</label>
                            <input type="text" class="form-control" name="pupildateofbirth" required="" value="<?php echo $row['studentAddress'];?>" readonly>

                          </div>
                        </div>
                      </div>

        <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Home Number</label>
                            <?php
                              if (empty($row['studentHomeNo'])) {?>
                                 <input type="text" class="form-control" name="pupildateofbirth" required="" value="Not Provided" readonly>
                             <?php }else{ ?>
                               <input type="text" class="form-control" name="pupildateofbirth" required="" value="<?php echo $row['studentHomeNo']?>" readonly>
                             <?php }
                            ?>
                           

                          </div>
                        </div>
                      </div>


        <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Student Number</label>
                            <input type="text" class="form-control" name="pupildateofbirth" required="" value="<?php echo $row['studentNumber'];?>" readonly>

                          </div>
                        </div>
                      </div>
                                      
 <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Passport Number</label>
                            <input type="text" class="form-control" name="pupildateofbirth" required="" value="<?php echo $row['passport'];?>" readonly>

                          </div>
                        </div>
                      </div>
           <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Disability</label>
                            <?php
                              if (empty($row['disability'])) {?>
                                 <input type="text" class="form-control" name="pupildateofbirth" required="" value="None" readonly>
                             <?php }else{ ?>
                               <input type="text" class="form-control" name="pupildateofbirth" required="" value="Yes" readonly>
                             <?php }
                            ?>
                           

                          </div>
                        </div>
                      </div>
                                    
         

         <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Passport Doc</label>
                            <?php
                              if (!empty($row['passportDOC'])) {?>
                                
                                <a target="_blank" href="../../studentDocuments/<?php echo $row['passportDOC']?>"><img class="img-responsive" alt="user" src="pdf.svg" style="max-height: 2rem !important"></a>

                              <?php }else{ ?>
                                <input type="text" class="form-control" name="pupildateofbirth" value="Not Provided" readonly>

                              <?php }
                            ?>
                            

                          </div>
                        </div>
                      </div>       


    <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Certificate(s)</label>
                            <?php
                              if (!empty($row['certificates'])) {?>

                            <a target="_blank" href="../../studentDocuments/<?php echo $row['certificates']?>"><img class=" img-responsive" alt="user" src="pdf.svg" style="max-height: 2rem !important;"></a>

                               <?php }else{ ?>
                                <input type="text" class="form-control" name="pupildateofbirth" value="Not Provided" readonly>

                              <?php }
                            ?>

                          </div>
                        </div>
                      </div> 

                       <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Proof Of Payment</label>
                            <?php
                              if (!empty($row['proofOfPayment'])) {?>

                            <a target="_blank" href="../../studentDocuments/<?php echo $row['proofOfPayment']?>"><img class=" img-responsive" alt="user" src="pdf.svg" style="max-height: 2rem !important;"></a>

                                <?php }else{ ?>
                                <input type="text" class="form-control" name="pupildateofbirth" value="Not Provided" readonly>

                              <?php }
                            ?>

                          </div>
                        </div>
                      </div>

                    </div>

  
                         


                  </div>
              
                </div>
              </div>
              <div class="col-lg-4">

                <div class="card card-topline-aqua">
                 <div class="card-body no-padding height-9">
                  <div class="row">
                   <div class="profile-userpic"> 
                    <img src="images/student.jpg" class="img-responsive" style="height: 8rem;width: 8rem" alt="">


                  </div>
                </div>
                <div class="profile-usertitle">

                  <div class="profile-usertitle-job"> Update details </div>
                </div>
                <form action="back/editPassword.php" method="POST">
                  <ul class="list-group list-group-unbordered">

                    <li class="list-group-item">
                     <small>New Password</small> 
                     <input type="password" id="password" class="pull-right" name="password" required minlength="8">
                   </li>
                   <li class="list-group-item">
                     <small>Confirm Password</small>
                     <input type="password" class="pull-right" id="confirm_password" name="confirmPassword" required minlength="8">
                     <span id='message'></span>
                   </li>
                 </ul>
                 <!-- END SIDEBAR USER TITLE -->
                 <!-- SIDEBAR BUTTONS -->
                 <div class="profile-userbuttons">

                  <button  class="btn btn-circle red btn-sm">Update</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
              </form>

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

</body>

<script type="text/javascript">

	$('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() === $('#confirm_password').val()) {
      $('#message').html('Matching').css('color', 'green');
    } else 
    $('#message').html('Not Matching').css('color', 'red');
  });
	
</script>



</html>
<?php 

} else {

	echo "<script>alert('Please log out');</script>";
  echo "<script>window.location='logout.php';</script>";

}
?>

<!-- Edit Student modal -->
  <form action="back/editStudent.php" method="POST">
<div class="modal slide-left" id="tab<?php echo $_GET['id'];?>" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-info">
      <div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
      <form action="back/editDepartment.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

          <div class="card-body row">
            <div class="col-lg-12" style="text-align: center; color: #888">
              <p>Edit Student</p>
            </div>

            <!-- start body -->
          <input type="hidden"  name="studentID"   value="<?php echo secure($_GET['id']);?>" >

            <div class="card-body row">
                    <div class="row">
                      <?php 
                      $sql ="SELECT * FROM students 
                     WHERE studentID = '".secure($_GET['id'])."'"; 


                      $result = mysqli_query($conn,$sql);
                      $getResult = mysqli_num_rows($result);
                      $row = mysqli_fetch_array($result);
                           
                          
                      ?>

                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label> First Name</label>
                            <input type="text" class="form-control" name="name" placeholder="First Name" required="" value="<?php echo $row['studentName'];?>" >
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label> Last Name</label>
                            <input type="text" class="form-control" name="lastName"   value="<?php echo $row['studentLastName'];?>" >
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label> Email</label>
                            <input type="email" class="form-control"  readonly value="<?php echo $row['studentEmail'];?>" >
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label> Phone Number</label>
                            <input type="tel" class="form-control" name="phone" required="" value="<?php echo $row['studentPhone'];?>" >
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="dateofbirth" placeholder="09-09-1999" required="" value="<?php echo $row['studentDOB'];?>" >
                          </div>
                        </div>
                      </div>

                        <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Country</label>
                             <select class="form-control" name="country">
                              <option value="<?php echo $row['studentCountry'];?>"><?php echo $row['studentCountry'];?></option>
                              <?php include "../countryList.php"; ?>
                            </select>
                          </div>
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Gender</label>

                            <select class="form-control" name="gender">
                              <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>

                          </div>
                        </div>
                      </div>

                          
                    </div>


                  </div>

               

            <!-- end body -->




          </div>
        </div>
        <div class="modal-footer">
          <button 
          class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-info">Update Student Details</button>
        </div>


    </div>
  </div>
</div>
</form>
