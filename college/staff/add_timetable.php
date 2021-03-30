<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../action.php";



$time = date('H:i',strtotime('+'.$_POST['duration'].' minutes',strtotime($_POST['time'])));


$sql = 'INSERT INTO lessons(subjectID,lessonStart,weekDay,lessonEnd,grade,lecturerRoomID) 
values("'.$_POST['moduleID'].'","'.$_POST['time'].'","'.$_POST['day'].'","'.$time.'","'.$_POST['id'].'","'.$_POST['room'].'")';
$query = mysqli_query($conn,$sql);

if($query){



}






?>