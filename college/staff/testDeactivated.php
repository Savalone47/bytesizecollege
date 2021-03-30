<?php 
session_start();
include "../action.php";
$limit = 9;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  

$start_from = ($page-1) * $limit; 
$sqlme = "SELECT COUNT(studentID) FROM students
     where students.activeStatus=0 order by students.studentID DESC ";  
$rs_result = mysqli_query($conn, $sqlme);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 



            $sql = "SELECT * FROM students where activeStatus=0 order by studentID DESC LIMIT $start_from, $limit";
            $query = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($query)){


              ?>
              <div class="col-md-4">
                <div class="card card-box">
                  <div class="card-head">

                    <header><span class=" "><i class="material-icons">assignment</i></span></header>
                    <button id="panel-button<?php echo $row['studentID']?>"
                      class="mdl-button mdl-js-button mdl-button--icon pull-right"
                      data-upgraded=",MaterialButton">
                      <i class="material-icons">more_vert</i>
                    </button>


                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                    data-mdl-for="panel-button<?php echo $row['studentID']?>">

                    <li class="mdl-menu__item " >
                      <form action="back/studentStatus.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['studentID']?>">
                        <input type="hidden" name="status" value="0">
                        <i class="fa fa-check-square-o" style="color: green"></i>&nbsp;&nbsp; 
                        <button class="btn btn-xs">Approve</button>

                      </form>
                    </li>  
                    <li class="mdl-menu__item" data-toggle="modal" data-target="#edit">


                     <form action="back/studentStatus.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $row['studentID']?>">
                      <input type="hidden" name="status" value="1">
                      <i class="fa fa fa-times-rectangle" style="color: crimson;"></i> &nbsp;&nbsp;
                      <button class="btn btn-success btn-xs" >
                       Decline

                     </button>
                   </form>
                 </li>        

                 <li class="mdl-menu__item">
                  <form onclick="return confirm('Are you sure you want to delete this student?')" action="back/deleteStudent.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['studentID']?>">
                    <i class="fa fa-trash-o "></i>&nbsp;&nbsp;
                    <button class="btn btn-danger btn-xs" >
                      Delete
                    </button>
                  </form>
                </li>

              </ul>
            </div>
            <div class="card-body no-padding ">
              <div class="doctor-profile">
                <img src="images/student.png" class="doctor-pic"
                alt="">
                <div class="profile-usertitle">
                  <div class="doctor-name" style="text-align: left !important;"><?php echo $row['studentName']?> </div>

                </div>
                <p style="text-align: left !important; font-size: 12px">
                  <i class="fa fa-calendar"></i>&nbsp;&nbsp;
                  <?php echo date('Y-M-d',strtotime($row['studentTimestamp']));?>
                </p>
                <div style="text-align: left !important;">
                  <p style="font-size: 12px"><i class="fa fa-envelope"></i>&nbsp;&nbsp;
                    <a href="mailto:<?php echo $row['personalEmail']?>" target="_blank"> <?php echo $row['studentEmail']?></a></p>
                    <p><i class="fa fa-phone"></i>&nbsp;&nbsp;
                      <a
                      href="tel:<?php echo $row['studentPhone']?>"><?php echo $row['studentPhone']?></a></p>
                    </div>
                    <div class="profile-userbuttons">
                    

                       <a href="studentProfile.php?id=<?php echo $row['studentID'];?>"
                      class="btn btn-circle deepPink-bgcolor btn-sm" >
                    View Course</a>
                  </div>
                </div>
              </div>
            </div>
          </div>



<!----==================================view and edit Applicant starts================================================-->


  

        <?php 






        $sqlite = "SELECT * FROM students where studentID='".$row['studentID']."' ";
        $querylite =mysqli_query($conn,$sqlite);
        $rowlite = mysqli_fetch_array($querylite);

        ?>

          <div class="modal fade in" id="registration<?php echo $row['studentID'];?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="margin-top:150px; width: 60vw;">
                <div class="modal-header">

                  <div class="row">
                    <div class="col-lg-12">
                      <center><h4 class="modal-title" id="modalLabel">Edit Applicant</h4></center>
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



<!--=========================================view edit Applicant ends ===========================================================-->

<?php }?>