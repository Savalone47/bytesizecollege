<?php
session_start();
include "../../action.php";

$sql ="SELECT * FROM classRoom where roomID= '".$_SESSION['roomID']."' ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
   
if($row['status'] == 1){


   echo "<script>window.location = '../index.php';</script>";

}

?>