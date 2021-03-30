<?php
session_start();
include "../action.php";

$results = mysqli_query($conn,"Select studentID FROM students");

while($row = mysqli_fetch_array($results)){

	$password = rand_string(6);

	$update = 'UPDATE `students` SET `studentPassword`= "'.md5($password).'", 
				`activeStatus`= 1 
				WHERE `studentID`= '.$row['studentID'];

	mysqli_query($conn,$update);

	$insert = 'INSERT INTO `users`( `studentID`, `password`) VALUES ("'.$row['studentID'].'","'.$password.'")';

	mysqli_query($conn,$insert);


}