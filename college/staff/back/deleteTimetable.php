<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";



$sql = "DELETE FROM lessons where lessonID = '".$_GET['id']."'";
mysqli_query($conn,$sql);

echo mysqli_error($conn);


?>