<?php
session_start();
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){



if($title = secure($_POST['title'])){


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
        // echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
    } else {
        // echo "Sorry, there was an error uploading your file.";
    }
}

	$sql="INSERT INTO events(eventTitle,eventDate,eventstatTime,eventendTime,eventLocation,eventDescription,eventType,eventImage)
	values('".pg_escape_string($_POST['title'])."','".secure($_POST['date'])."','".secure($_POST['start'])."','".secure($_POST['end'])."','".pg_escape_string($_POST['address'])."','".pg_escape_string($_POST['description'])."',
	'".secure($_POST['type'])."','".basename(secure($_FILES["img"]["name"]))."')";

	if(mysqli_query($conn,$sql)){

		echo "<script>window.location='../allEvents.php'</script>";
	}
}

}

?>