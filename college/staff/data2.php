<?php 

include "../action.php";


//delete all assigned modules

//mysqli_query($conn,"DELETE FROM moduleAssign WHERE 1");

//get courses modules

//$sql = mysqli_query($conn,"SELECT courseID,studentID FROM `assignedCourses`");


while($row = mysqli_fetch_array($sql)){

//$result = mysqli_query($conn,"SELECT `moduleID` FROM `modules` WHERE `moduleCourseID` = ".$row['courseID']." 
	and moduleCourseID != 0");

while($row2 = mysqli_fetch_array($result)){
//insert new Assgned modules
mysqli_query($conn,"INSERT INTO moduleAssign( moduleID, courseID, studentID) 
					VALUES (".$row2['moduleID'].",".$row['courseID'].",".$row['studentID'].")");


}

}



echo "Done";
