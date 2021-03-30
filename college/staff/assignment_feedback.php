<?php
header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=false'); 
session_start();
include "../action.php";

print_r($_FILES);



$target_path = "assignReply/";  
$target_path = $target_path.basename( $_FILES['img']['name']);   
  
move_uploaded_file($_FILES['img']['tmp_name'], $target_path); 
  

$sql = "INSERT INTO assignmentFeedback(studentID,adminID,moduleID,feedback,assignmentID,total,comment)
values(
'".$_POST['studentID']."',
'".$_SESSION['adminID']."',
'".$_POST['moduleID']."',
'".basename($_FILES["img"]["name"])."',
'".$_POST['assignmentID']."',
'".$_POST['marks']."',
'".$_POST['comment']."')";


mysqli_query($conn,$sql);




?>