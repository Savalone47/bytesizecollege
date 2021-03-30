<?php
include "../action.php";

// $sql ="SELECT GETDATE(time_stamp) - 3 FROM assignment";

$sql ="SELECT * FROM assignment where id = 12";
		$query = mysqli_query($conn,$sql);
	    $row = mysqli_fetch_array($query);

print_r($date = new DateTime($row['due_date'])); 
exit();
$date->modify("-3 day");
 $date->format("Y-m-d");

print('Next Date ' . date('Y-m-d', strtotime('-1 day', strtotime($row['due_date']))));


?>