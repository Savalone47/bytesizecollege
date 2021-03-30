<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";




$sql = "UPDATE lectureAssigns
 SET lectureID = '".secure($_POST['facilitator'])."' where moduleID = '".$_POST['moduleID']."'";
$result = mysqli_query($conn,$sql);

if($result){




	echo "<script> alert('Teacher updated successfuly!')</script>";


}else{



	echo "<script> alert('Error! teacher could not be updated')</script>";




}



?>