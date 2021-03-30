 <?php
  include "../action.php";

 
        $sql2 = "INSERT INTO moduleAssign( 
          moduleID, courseID, studentID) 
    SELECT moduleID,moduleCourseID, '".secure($_POST['studentID'])."' FROM modules where moduleID = '".secure($_POST['moduleID'])."'";
         mysqli_query($conn,$sql2);
         echo "<script>window.location= 'viewStage.php';</script>";
         


    ?>