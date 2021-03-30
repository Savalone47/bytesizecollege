<?php
header('Content-Type: application/json');
include '../action.php';
	$sql = "SELECT department.departmentName as name, count(*) as students FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by department.departmentID";

	$result = $conn->query($sql);
	$data = array();
	

	if ($result->num_rows > 0) {
		
		foreach ($result as $row) {
			$data[] = $row;
		}
		
	echo json_encode($data);



	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>