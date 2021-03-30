<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";





$sql = 'UPDATE modules SET moduleName="'.$_POST['moduleName'].'",
 moduleOverview="'.$_POST['overview'].'" where moduleID="'.$_POST['id'].'"';
$query = mysqli_query($conn,$sql);

$_POST['facilitator'];

$sql1 = 'UPDATE lectureAssigns SET lectureID="'.$_POST['facilitator'].'"
 WHERE moduleID= "'.$_POST['id'].'"';
 $query1 = mysqli_query($conn,$sql1);



?>