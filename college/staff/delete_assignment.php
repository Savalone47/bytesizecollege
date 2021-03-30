<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){


//change status

$sql = "UPDATE `teacherFiles` 
     SET 
     `deleteStatus`= 1 where  fileID='".secure($_POST['delete'])."'  "; 


     $res = mysqli_query($conn,$sql);


//end of update

}else{

    echo "<script> alert('Error! Please Log in');
        window.location='logout.php';
        </script>";
}

?>