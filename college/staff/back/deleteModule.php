<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";





$sql = "DELETE FROM modules where moduleID='".$_POST['id']."'";
$query = mysqli_query($conn,$sql);
?>