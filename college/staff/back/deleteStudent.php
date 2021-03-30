<?php 
//header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";


// $sql = "DELETE FROM students where studentID='".$_POST['id']."'";
// $query = mysqli_query($conn,$sql);

if ($_POST['action'] == 'deleteStudent') {
  $sql = "DELETE FROM students where studentID ='".$_POST['id']."'";

   if(mysqli_query($conn,$sql)){
   	echo 200;
   }else{
   	echo 202;
   }
}


?>
