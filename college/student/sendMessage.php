<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../action.php";


 if($_POST['text'] !=""){

$sql2='INSERT INTO discussion(studentID,discussion2,facilitatorID,moduleID) 
values("'.secure($_SESSION['adminID']).'",
"'.secure($_POST['text']).'",
"'.secure($_POST['id']).'",
"'.secure($_POST['moduleID']).'")';


$query = mysqli_query($conn,$sql2); 


}

?>