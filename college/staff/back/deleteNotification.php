<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";



$sql = "DELETE FROM notification where id='".base64_decode(urldecode($_GET['id']))."'";
$query = mysqli_query($conn,$sql);





?>