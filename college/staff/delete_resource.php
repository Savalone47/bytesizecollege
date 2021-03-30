<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../action.php";

$sql = "UPDATE moduleMaterial SET deleteStatus='1' where moduleID='".$_GET['id']."'";
$query = mysqli_query($conn,$sql);


?>