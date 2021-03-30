<?php
include "../../action.php";

if ($_POST['action'] == 'timeFilter') {

  if ($_POST['intake']=='all') {
 
$sql = "SELECT * FROM students 
    INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
    INNER JOIN courses ON courses.coursesID = assignedCourses.courseID 
    INNER JOIN department ON department.departmentID = courses.courseDepartment
    ";

}else{
  $sql = "SELECT * FROM students 
    INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
    INNER JOIN courses ON courses.coursesID = assignedCourses.courseID 
    INNER JOIN department ON department.departmentID = courses.courseDepartment
    WHERE courses.courseIntake = '".$_POST['intake']."' 
    AND department.departmentName ='".$_POST['department']."'
    AND courses.courseCode = '".$_POST['course']."'";

}
$result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);
  if($queryResult > 0 ){
    while ($row = mysqli_fetch_array($result)){?>
      
          <tr class="gradeX odd">
          
          <td style="width: 20%;"><?=$row['studentName']?></td>
          <td><?=$row['studentLastName']?></td>
          <td><?=$row['identityNo']?></td>
          <td><?=$row['studentEmail']?></td>
          <td><?=$row['studentNumber']?></td>
          <td><?=$row['gender']?></td>
        
        </tr>
  
    
      
   <?php }

  }else{
    echo" <h5>There are no intakes. </h5>";
}
exit();
}




?>
                      
                      
                    </tfoot>
                  </table>

 <script type="text/javascript">
  alert('loaded');
  
</script>









 