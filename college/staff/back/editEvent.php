<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";


$sql = "";

if($_FILES["img"]["name"]){

  $sql7 = "SELECT * FROM events WHERE id = '".$_POST['eventID']."'";

  $result7 = mysqli_query($conn, $sql7);

  if (mysqli_num_rows($result7) > 0) {
  // output data of each row
    while($row7 = mysqli_fetch_assoc($result7)){


      $Path = "../events/".$row7['eventImage'];
      if (file_exists($Path)){
        unlink($Path);   
      } 

    }
  }

  //end of unlinking

$target_dir = "../events/";
$target_file = $target_dir . basename(secure($_FILES["img"]["name"]));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



if (secure($_FILES["img"]["size"]) > 500000000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file(secure($_FILES["img"]["tmp_name"]), $target_file)) {
 

 $sql = "UPDATE events SET 
title= '".$_POST['eventName']."',
`eventDate`= '".$_POST['date']."',
`eventstatTime`= '".$_POST['eventstatTime']."',
`eventendTime`= '".$_POST['endtime']."',
`eventLocation`= '".$_POST['eventLocation']."',
`eventDescription`= '".pg_escape_string($_POST['eventDescription'])."',
`eventImage`= '".basename(secure($_FILES["img"]["name"]))."' 
 

WHERE `eventID` = '".$_POST['eventID']."'";

       // echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
    }
}

} else{

  $sql = "UPDATE events SET 
title= '".$_POST['eventName']."',
`eventDate`= '".$_POST['date']."',
`eventstatTime`= '".$_POST['eventstatTime']."' ,
`eventendTime`= '".$_POST['endtime']."',
`eventLocation`= '".$_POST['eventLocation']."' ,
`eventDescription`= '".pg_escape_string($_POST['eventDescription'])."'
 

WHERE `eventID` = '".$_POST['eventID']."'";



}

mysqli_query($conn,$sql);

               	 

?>
