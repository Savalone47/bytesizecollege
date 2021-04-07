<?php
header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=false'); 
session_start();
include "../action.php";




$target_dir = 'exams/';
$target_file = $target_dir .basename($_FILES["img"]["name"]);
move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

$sql = 'INSERT INTO examFeedback(studentID,courseManager,moduleID,feedback,examID,marks,feedback2)
values(
"'.$_POST['studentID'].'",
"'.$_SESSION['adminID'].'",
"'.$_POST['moduleID'].'",
"'.$_FILES['img']['name'].'",
"'.$_POST['examID'].'",
"'.$_POST['marks'].'",
"'.$_POST['comment'].'")';


$query = mysqli_query($conn,$sql);




?>