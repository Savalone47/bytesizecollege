<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']); 
session_start();
include "../action.php";



 if($_FILES['img']["tmp_name"]){
$target_dir = "../chats/";
$target_file = $target_dir .basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.</p>";
// if everything is ok, try to upload file
} else {

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}





  }

 if($_FILES['img']['name'] !="" ||  $_POST['text'] !=""){

$sql2="INSERT INTO community(facilitatorID,discussion,discussion2,moduleID) 
values('".secure($_SESSION['adminID'])."',
'".basename(secure($_FILES["img"]["name"]))."',
'".secure($_POST['text'])."',
'".secure($_POST['id'])."')";


$query = mysqli_query($conn,$sql2);

}


?>