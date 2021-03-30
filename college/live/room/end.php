<?php 
header('location:index.php');
session_start();
include "../connectDB.php";





$sql = "UPDATE classRoom set status='1' where roomID='".$_SESSION['roomID']."' ";
$query = mysqli_query($conn, $sql);





?>