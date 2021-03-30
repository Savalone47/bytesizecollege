<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";



$sql = 'UPDATE notification SET title="'.$_POST['title'].'", notification="'.$_POST['comment'].'" where id ="'.$_POST['id'].'"';
$query = mysqli_query($conn,$sql);





?>