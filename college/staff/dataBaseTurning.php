<?php
session_start();
include "../action.php";

$sql = "SELECT students.`studentID`,assignedCourses.courseID FROM `students` INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment WHERE `studentNumber` like '%D%' And department.departmentID in (23,24)";

$results = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($results)){


	$modules = mysqli_query($conn,"SELECT `moduleID`,`moduleCourseID` FROM `modules` WHERE `moduleCourseID` = ".$row['courseID']);

	while($module = mysqli_fetch_array($modules)){

	$insert = "INSERT INTO `moduleAssign`( `moduleID`, `courseID`, `studentID`) 

				VALUES (".$module['moduleID'].",".$module['moduleCourseID'].",".$row['studentID'].")";

	}


}