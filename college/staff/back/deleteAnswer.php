<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";



$sql = "DELETE FROM examAnswer where answerID='".$_GET['id']."'";
$query = mysqli_query($conn,$sql);
?>