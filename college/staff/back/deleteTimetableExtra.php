<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";



$sql = "DELETE FROM `extralessons` where lessonID = '".$_GET['id']."'";
mysqli_query($conn,$sql);


?>