<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../action.php";

if (basename($_FILES["fileToUpload"]["name"])) {

$target_dir = "management/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}




$sql = 'UPDATE management SET 
managementName = "'.$_POST['firstName'].'",
lastName = "'.$_POST['lastName'].'",
title = "'.$_POST['title'].'",
managementEmail = "'.$_POST['email'].'",
managementContact = "'.$_POST['contact'].'",
managementPhoto = "'.basename($_FILES["fileToUpload"]["name"]).'",
managementBio = "'.pg_escape_string($_POST['bio']).'",
gender = "'.$_POST['gendar'].'"
 WHERE managementID = "'.$_POST['id'].'"';

if(!mysqli_query($conn, $sql)){
      echo mysqli_error($conn);
    }else{
      echo "updated successfully";
    }
}else{
	$sql = 'UPDATE management SET 
managementName = "'.$_POST['firstName'].'",
lastName = "'.$_POST['lastName'].'",
title = "'.$_POST['title'].'",
managementEmail = "'.$_POST['email'].'",
managementContact = "'.$_POST['contact'].'",
managementBio = "'.pg_escape_string($_POST['bio']).'",
gender = "'.$_POST['gendar'].'"
 WHERE managementID = "'.$_POST['id'].'"';

if(!mysqli_query($conn, $sql)){
      echo mysqli_error($conn);
    }else{
      echo "updated successfully";

    }
}


?>