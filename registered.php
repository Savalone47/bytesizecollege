<?php 
include 'util/nav.php';
include 'college/action.php';
?>
<section class="course-details" style="padding-top: 1rem">
            <div class="container">
                <div class="row">
                  <div class="col-lg-2"></div>
                    <div class="col-lg-8">

                        <!-- Form STARTING -->
                        <form method="post" action="studentRegister.php" class="submitForm"  role="form" >
                    <div class="modal-body" style="padding: 1rem 2rem;">
                      <center><h2 class="modal-title" id="modalLabel" style="font-weight: 700;">Current Students Registration </h2></center><br>
                     <center> <p> Please register below if you are a current student to create <br>
                     a Student Account on the Vinco Learning Management system.</p></center><br>
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
                          <label >Your Personal Email</label>
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
                          <input type="text" class="form-control" name="cellPhoneNumber" required>
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label>Student Number</label>
                          <input type="text" class="form-control" name="studentNumber" required>
                        </div>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label>Campus</label>
                          <select class="form-control" name="departmentID" required>
                            <?php
                                $sql = "SELECT `departmentID`, `departmentName` FROM `department` ";
                                $results = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($results)):?>
                                    <option value="<?=$row['departmentID'];?>"><?=$row['departmentName'];?></option>
                                <?php endwhile; ?>
                          </select>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                        <div class="col-sm-12">
                          <label>Current Course Name</label>
                          <select class="form-control" name="code" required>
                            <?php
                                $sql22 = "SELECT DISTINCT courseCode,`courseName` FROM `courses` WHERE 1";
                                $results22 = mysqli_query($conn, $sql22);
                                while($row22 = mysqli_fetch_array($results22)):?>
                                    <option value="<?=$row22['courseCode'];?>"><?=$row22['courseName'];?></option>
                                <?php endwhile; ?>
                          </select>
                                                
                        </div>
                        </div>
                      </div>

                        <div class="col-md-12">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <p>Intake</p>
                            <div class="col-sm-12">
                              
                              <label class="checkbox-inline">
                                <input type="radio" name="intake" value="Jun" required>June
                              </label>&nbsp;&nbsp;
                              <label class="checkbox-inline">
                                <input type="radio" name="intake" value="Sep">September
                              </label>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <p>Course Delivery</p>
                            <label class="checkbox-inline">
                              <input type="radio" name="delivery" value="Fulltime" required>Fulltime
                            </label>&nbsp;&nbsp;
                            <label class="checkbox-inline">
                              <input type="radio" name="delivery" value="Parttime">Parttime
                            </label>&nbsp;&nbsp;
                            <label class="checkbox-inline">
                              <input type="radio" name="delivery" value="Distance">Distance
                            </label>&nbsp;&nbsp;
                          </div>
                          <div class="col-sm-12">
                          </div>
                        </div>
                      </div>
                    </div>
                         </div>
                    <div class="modal-footer">
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">submit</button>
                      </div>
                      </div>
                    </div>
                    </div>

                    <!-- Form ENDING -->
                    </form>

                    </div>
                    </div>
                </div>
        </section>
     <?include"util/footer.php"?>
</body>
</html>
