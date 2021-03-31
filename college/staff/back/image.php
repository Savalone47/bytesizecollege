<?php
session_start();
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";
$target_dir = "../management/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

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
}else{
    $sql = "SELECT * FROM management WHERE managementID = '".$_SESSION['id']."'";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
 
                $row = mysqli_fetch_assoc($result);


                    $Path = "../management/".$row['managementPhoto'];
                    if (file_exists($Path)){
                        unlink($Path);   
                    } 

                }
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


    $sql = "UPDATE `management` SET `managementPhoto`= '".basename($_FILES["fileToUpload"]["name"])."' WHERE `managementID` = ".$_SESSION['adminID']." "; 
   if(!mysqli_query($conn, $sql)){
           echo("Error description: " . $conn -> error);
        }


   
