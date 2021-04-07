<?php
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){


    if($_POST['password'] == $_POST['confirmPassword']){

    	$password = md5($_POST['password']);


    $sql = 'UPDATE management SET managementPassword= "'.$password.'" WHERE managementID = "'.$_SESSION['adminID'].'"'; 


    if(mysqli_query($conn,$sql)){


       $error= "Successful Updated password.";
        header('location:../profile.php?&error='.$error.'');

    }else{

        $error= "Error in Updating password ";
       header('location:../profile.php?error='.$error.'');
    }

}else{

$error = "Passwords do not match";
header('location:../profile.php?error='.$error.'');
exit;


}

}else{

header('location:../login.php');
exit;

}