<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";

if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){

 



    $target_dir = "../management/";
    $target_file = $target_dir .basename(secure($_FILES["img"]["name"]));
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



    if (secure($_FILES["img"]["size"]) > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    if (move_uploaded_file(secure($_FILES["img"]["tmp_name"]), $target_file)) {
        echo "The file ".basename(secure( $_FILES["img"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$num=3;

echo $_POST['usertype'];
$code = generateRandomString(6);

$sql ='INSERT INTO management(
managementName,
lastName, 
title, 
managementEmail, 
managementContact, 
managementPhoto, 
managementLevel, 
gender,
managementBio,
address,
managementPassword
) 
values(
"'.secure($_POST['firstname']).'",
"'.secure($_POST['lastname']).'",
"'.secure($_POST['title']).'",
"'.secure($_POST['email']).'",
"'.secure($_POST['phone']).'",
"'.basename(secure($_FILES["img"]["name"])).'",
"'.secure($_POST['usertype']).'",
"'.secure($_POST['gender']).'",
"'.secure($_POST['bio']).'",
"'.secure($_POST['address']).'",
"'.md5($code).'"
)';





if(!mysqli_query($conn,$sql)){

   echo "Sorry, there was an error creating  your file.";
}else{

   $to = secure($_POST['email']);
   $subject = "Account Registration";
   $txt = "Hi ".secure($_POST['firstname'])."! 
   \nYou have been registered with Vinco Learning Management System. Here are your login credentials. 
   \nusername: ".secure($_POST['email'])."
   \npassword: ".$code."";
   $headers = "From: <registration@vinco.com>";

   if(mail($to,$subject,$txt,$headers)){
    echo "Staff created successfully";
   }


}         

}else{

    echo "<script> alert('Error! Please Log in');
    window.location='logout.php';
    </script>";
}



function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>