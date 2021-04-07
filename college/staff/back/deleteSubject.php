<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";



$sql = "DELETE FROM modules where moduleID='".$_GET['id']."'";
$query = mysqli_query($conn,$sql);

$sqlite =  "DELETE * FROM moduleAssign where moduleID='".$_GET['id']."'";
$query = mysqli_query($conn,$sqlite);
?>