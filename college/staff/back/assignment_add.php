<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){








$sql ='INSERT INTO  assignment(moduleID,assignmentNo, facilitatorID,marks,topicName, comment,dueDate) 
values("'.secure($_POST['moduleID']).'",
"'.secure($_POST['assignmentNo']).'",
 "'.secure($_SESSION['adminID']).'",
"'.secure($_POST['marks']).'",
"'.secure($_POST['chapterName']).'",
"'.secure($_POST['comment']).'",
"'.secure($_POST['date']).'"
)';
$res = mysqli_query($conn,$sql);

$last_id = $conn->insert_id;



$target_dir = "../assignment/";


$total = count($_FILES['img']['name']);

 for($i = 0; $i< $total; $i++){
 	$target_file = $target_dir .basename($_FILES["img"]["name"][$i]);
   move_uploaded_file(secure($_FILES["img"]["tmp_name"][$i]), $target_file);

   $sqlite = "INSERT INTO teacherFiles(assignmentID,lectureID,file) values('".$last_id."','".$_SESSION['adminID']."','".$_FILES['img']['name'][$i]."')";
   $querylite =mysqli_query($conn,$sqlite);
        
}












}else{

    echo "<script> alert('Error! Please Log in');
        window.location='logout.php';
        </script>";
}

?>