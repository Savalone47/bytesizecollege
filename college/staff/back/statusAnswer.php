<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){
   


//if no image 
if($_GET['stat'] == 1){
$sql = 'UPDATE examAnswer 
SET activeStatus = "0"
where  answerID = "'.secure($_GET['id']).'"'; 


 $res = mysqli_query($conn,$sql);
}elseif($_GET['stat']==0){

$sql = 'UPDATE examAnswer 
SET activeStatus = "1"
where  answerID = "'.secure($_GET['id']).'"'; 
 $res = mysqli_query($conn,$sql);
}
  




// end of Update


}else{

 echo "<script> alert('Error! Please Log in');
    window.location='logout.php';
    </script>";
}

?>