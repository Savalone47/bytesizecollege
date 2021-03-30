<?php
session_start();
include "../../action.php";




$sqli = "UPDATE exam SET deleteStatus = 1 where id='".secure($_GET['id'])."'";
if(mysqli_query($conn,$sqli)){

	header('Location: ' . $_SERVER['HTTP_REFERER']);

	// delete previes file

    //get file path

// $sql = "SELECT * FROM exam WHERE id = '".secure($_GET['id'])."'";

// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
// 	$row = mysqli_fetch_assoc($result);


// 	$Path = "../exams/".$row['exam'];
// 	if (file_exists($Path)){
// 		unlink($Path);   
// 	} 

// }
//end delete			

} else{

	header('Location: ' . $_SERVER['HTTP_REFERER']);	
}
