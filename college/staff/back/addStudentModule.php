<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";




$sql2 = "INSERT INTO moduleAssign(moduleID,studentID) 
values('".$_POST['moduleID']."','".$_POST['student']."')";
$insert = mysqli_query($conn,$sql2);




 

      



 
?>