<?php
include "../action.php";

if($_POST['action'] == "fetchAll"){

$sql;
if (isset($_POST['courseID'])) {

		

$sql = "SELECT * FROM students 
      INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
      inner JOIN courses ON courses.coursesID = assignedCourses.courseID 
      INNER JOIN department ON department.departmentID = courses.courseDepartment 

     WHERE department.departmentID= '".htmlspecialchars($_POST['departmentID'])."' group by department.departmentID ";

	}elseif (isset($_POST['val'])) {
		$sql = "SELECT * FROM students 
		INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
		INNER JOIN courses ON courses.coursesID = assignedCourses.courseID 
		INNER JOIN department ON department.departmentID = courses.courseDepartment
		 ";
	

	}else{
		$sql = "SELECT * FROM students";
	}


  $result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);
  if($queryResult > 0 ){
  	$i = "";
	  while ($row = mysqli_fetch_array($result)){?>
	  	
	  			<tr class="even">
					
					<td style="width: 20%;"><?=$row['studentName']?></td>
					<td><?=$row['studentLastName']?></td>
					<td><?=$row['identityNo']?></td>
					<td><?=$row['studentEmail']?></td>
					<td><?=$row['studentNumber']?></td>
					<td><?=$row['gender']?></td>
					<!-- <td><a href="javascript:void(0)" class="" data-toggle="tooltip"
							title="Edit">
							<i class="fa fa-check"></i></a> <a href="javascript:void(0)"
							class="text-inverse" title="Delete" data-toggle="tooltip">
							<i class="fa fa-trash"></i></a>
					</td> -->
				</tr>
	  	
	 <?php }

	}else{
		echo" <h5>There are no students in the database right now. </h5>";
}
}




if ($_POST['action']=="departmentFiltering") {

	$sql = "SELECT * FROM students 
		INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
		INNER JOIN courses ON courses.coursesID = assignedCourses.courseID 
		INNER JOIN department ON department.departmentID = courses.courseDepartment
		WHERE department.departmentName= '".htmlspecialchars($_POST['val'])."' ";

	$result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);
  if($queryResult > 0 ){
  	$i = "";
	  while ($row = mysqli_fetch_array($result)){?>
	  	
	  			<tr class="even">
					
					<td style="width: 20%;"><?=$row['studentName']?></td>
					<td><?=$row['studentLastName']?></td>
					<td><?=$row['identityNo']?></td>
					<td><?=$row['studentEmail']?></td>
					<td><?=$row['studentNumber']?></td>
					<td><?=$row['gender']?></td>
					<!-- <td><a href="javascript:void(0)" class="" data-toggle="tooltip"
							title="Edit">
							<i class="fa fa-check"></i></a> <a href="javascript:void(0)"
							class="text-inverse" title="Delete" data-toggle="tooltip">
							<i class="fa fa-trash"></i></a>
					</td> -->
				</tr>
	  	
	 <?php }

	}else{
		echo" <h5>There are no students in the database right now. </h5>";
}
}



if ($_POST['action']=="courseFiltering") {
	
		
	$sql = "SELECT * FROM students 
		INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
		INNER JOIN courses ON courses.coursesID = assignedCourses.courseID 
		INNER JOIN department ON department.departmentID = courses.courseDepartment
		WHERE courses.courseCode= '".htmlspecialchars($_POST['val'])."'";

$result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);
  if($queryResult > 0 ){
  	$i = "";
	  while ($row = mysqli_fetch_array($result)){?>
	  	
	  			<tr class="even">
					
					<td style="width: 20%;"><?=$row['studentName']?></td>
					<td><?=$row['studentLastName']?></td>
					<td><?=$row['identityNo']?></td>
					<td><?=$row['studentEmail']?></td>
					<td><?=$row['studentNumber']?></td>
					<td><?=$row['gender']?></td>
				
				</tr>
	  	
	 <?php }

	}else{
		echo" <h5>There are no students in the database right now. </h5>";
}
}


if ($_POST['action']=="intake") {//filter per intake
	
		
	$sql = "SELECT * FROM students 
		INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
		INNER JOIN courses ON courses.coursesID = assignedCourses.courseID 
		INNER JOIN department ON department.departmentID = courses.courseDepartment
		WHERE courses.courseIntake = '".htmlspecialchars($_POST['intake'])."' AND courses.courseCode= '".htmlspecialchars($_POST['courseIt'])."' ";

$result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);
  if($queryResult > 0 ){
  	$i = "";
	  while ($row = mysqli_fetch_array($result)){?>
	  	
	  			<tr class="even">
					
					<td style="width: 20%;"><?=$row['studentName']?></td>
					<td><?=$row['studentLastName']?></td>
					<td><?=$row['identityNo']?></td>
					<td><?=$row['studentEmail']?></td>
					<td><?=$row['studentNumber']?></td>
					<td><?=$row['gender']?></td>
				
				</tr>
	  	
	 <?php }

	}else{
		echo" <h5><b>No results.</b></h5>";
}
}

// intake ends





if(htmlentities($_POST["action"]=="getFiltered")){

if ($_POST['selected'] == 'perBranch') {

   $sql = "SELECT * FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by department.departmentID";
	
	 $result = mysqli_query($conn,$sql);
               
     
   
    if($country !== 'Select'){?>
    	<br>
       
        <select class='departmentFilter form-control' name='departmentName'>
            <option>Select Branch</option>
      <?php
      while($row = mysqli_fetch_array($result)){?>
            <option value="<?php echo $row['departmentName']?>"><?php echo $row['departmentName']?></option>
       <?php }?>
       </select>
    <?php }
}




if ($_POST['selected'] == 'perCourse') {
   $sql = "SELECT courseCode,courseName FROM courses Group by courseCode";
	


	 $result = mysqli_query($conn,$sql);
               
     
   
    if($country !== 'Select'){?>
    	<br>
       
        <select class='courseFilter form-control' name='courseID'>
            <option>Select Course</option>
      <?php
      while($row = mysqli_fetch_array($result)){?>
            <option value="<?php echo $row['courseCode']?>"><?php echo $row['courseName']?></option>
       <?php }?>
       </select>
    <?php }
}
               

}


if ($_POST['action'] == 'perIntake') {

   $sqlite = "SELECT * FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by courses.courseIntake";
	
	 $result = mysqli_query($conn,$sqlite);
               
     
   
    if($country !== 'Select'){?>
    	<br>
       
        <select class='intakeFilter form-control' name='courseIntake'>
            <option>Select Intake</option>
      <?php
      while($row = mysqli_fetch_array($result)){?>
            <option value="<?php echo $row['courseIntake']?>"><?php echo $row['courseIntake']?></option>
       <?php }?>
       </select>
    <?php }
}
?>


<script type="text/javascript">
	   $(document).ready(function(){//fetch per intake
           $("select.courseFilter").change(function(){
               var intakeee = $(".intakeFilter option:selected").val();
               var action = "perIntake";
              
               $.ajax({
                   type: "POST",
                   url: "fetchStudents.php",
                   data: { intakeee : intakeee, action : action } 
               }).done(function(data){
                   $("#intake").html(data);
                  // var pagination = [data];
               });
           });
         });
</script>