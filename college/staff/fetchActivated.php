<?php
session_start();
include "../action.php";
$limit = 12;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;

 //pagination
$sqlmm;

if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2' ){

$sqlmm = "SELECT COUNT(studentID) FROM students 
where activeStatus = 1";
}elseif($_SESSION['adminLevel'] == '5'){

$sqlmm = "SELECT COUNT(students.studentID) FROM students
  inner join assignedCourses on assignedCourses.studentID = students.studentID
INNER join courses on courses.coursesID = assignedCourses.courseID
inner join department on department.departmentID = courses.courseDepartment

where department.hodID = ".$_SESSION['adminID']."

and  activeStatus = 1 ";
}


$rs_result = mysqli_query($conn, $sqlmm);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 

 $sql;

if($_SESSION['adminLevel'] == '1'|| $_SESSION['adminLevel'] == '2'){

 $sql = "SELECT * FROM students where activeStatus=1 order by studentID DESC limit ".$start_from.", ".$limit."";

  }elseif($_SESSION['adminLevel'] == '5'){ 

       $sql = "SELECT * FROM students
inner join assignedCourses on assignedCourses.studentID = students.studentID
INNER join courses on courses.coursesID = assignedCourses.courseID
inner join department on department.departmentID = courses.courseDepartment

where department.hodID = ".$_SESSION['adminID']."

and  activeStatus = 1 order by students.studentID DESC limit ".$start_from.", ".$limit."";

  }
    $query = mysqli_query($conn,$sql);
    while ($rowl = mysqli_fetch_array($query)){


      ?>




      <div class="col-md-4">
        <div class="card card-box">
   
 <div class="card-footer" >
  <form action="back/studentStatus.php" method="POST" enctype="multipart/form-data" class="btn-group ">
                <input type="hidden" name="id" value="<?php echo $rowl['studentID']?>">
                <input type="hidden" name="status" value="1">

  <button class="btn-group btn btn-rounded btn-warning btn-xs">de-activate &nbsp;&nbsp;
    <i class="fa fa-toggle-on" aria-hidden="true">
    
  </i>
  </button>
</form>

  <div class="btn-group btn btn-rounded btn-xs pull-right" id="delete" data-id="<?php echo $rowl['studentID'];?>">
    <i class="fa fa-trash" style="color: red"></i>
  </div>

</div>
      <div class="card-body no-padding ">
        <div class="doctor-profile">
          <img src="images/student.png" class="doctor-pic"
          alt="">
          <div class="profile-usertitle" >
            <div class="doctor-name" style="text-align: left;"><?php echo $rowl['studentName']?> </div>

          </div>
          <p style="text-align: left;"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo date('Y-M-d',strtotime($rowl['studentTimestamp']));?>
        </p>
        <div>
          <p  style="text-align: left; font-size: 12px"><i class="fa fa-phone"></i>&nbsp;&nbsp;<a
            href="tel:<?php echo $rowl['studentPhone']?>"> <?php echo $rowl['studentPhone']?></a></p>
            <p style="text-align: left; font-size: 12px"><i class="fa fa-envelope" ></i>&nbsp;&nbsp;<a
              href="mailto:<?php echo $rowl['studentEmail']?>" ><?php echo $rowl['studentEmail']?></a></p>
            </div>
            <div class="profile-userbuttons">
              <a href="studentProfile.php?id=<?php echo $rowl['studentID'];?>"
              class="btn btn-circle deepPink-bgcolor btn-sm" >
            View</a>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php }?>

