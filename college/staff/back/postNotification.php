<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";



$sql = 'INSERT INTO notification(title,notification) 
values("'.$_POST['title'].'","'.$_POST['comment'].'")';
$query = mysqli_query($conn,$sql);





?>