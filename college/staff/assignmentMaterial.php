<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){

$total = count($_FILES['img']['name']);


    for($i = 0; $i < $total; $i++){

$target_dir = "assignment/";
$target_file = $target_dir .basename(secure($_FILES["img"]["name"][$i]));
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  move_uploaded_file($_FILES["img"]["tmp_name"][$i], $target_file);

   $sqlite = "INSERT INTO teacherFiles(assignmentID,lectureID,file)
   values('".$_POST['id']."','".$_SESSION['adminID']."','".$_FILES['img']['name'][$i]."')";
   $querylite =mysqli_query($conn,$sqlite);
        
}














}else{

    echo "<script> alert('Error! Please Log in');
        window.location='logout.php';
        </script>";
}


?>