<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include '../action.php';








$sql ="INSERT INTO cart(moduleID,userID) values('".secure($_GET['id'])."','".$_SESSION['userID1']."')";
$query = mysqli_query($conn,$sql);









?>