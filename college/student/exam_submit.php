<?php
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){



$target_dir = "../staff/examReply/";
$target_file = $target_dir .secure(basename($_FILES["img"]["name"]));

$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(secure($_FILES["img"]["tmp_name"])!=''){



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}else{

    if (move_uploaded_file(secure($_FILES["img"]["tmp_name"]), $target_file)){
  


$sql1 = "INSERT INTO examReply(examID,moduleID,studentID,exam,deleteStatus)
 values('".$_POST['examID']."','".$_POST['moduleID']."','".$_SESSION['adminID']."','".$_FILES['img']['name']."','0')";

$query = mysqli_query($conn,$sql1);

if($query){

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

header('Location: ' . $_SERVER['HTTP_REFERER']);

}





    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$num=4;


}



}else{

    echo "<script> alert('Error! Please Log in');
        window.location='logout.php';
        </script>";
}


?>