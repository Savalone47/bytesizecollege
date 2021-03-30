<?php
session_start();
include "../../action.php";


if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){

$sql = "UPDATE `learning` SET `deleteStatus`=  1 WHERE `learningID`= ".secure($_GET['id'])."";


if(mysqli_query($conn,$sql)){



header("location: ../lesson.php?id=".$_GET['moduleID']."&chapter=".$_GET['chapter']."&message=Succesfuly deleted lesson!");

} else{

header("location: ../lesson.php?id=".$_GET['moduleID']."&chapter=".$_GET['chapter']."&message=Error in deleting lesson!");

}

} else{

header("location: ../../../index.php");

}