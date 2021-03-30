<?php
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){


//change status

$sql = "UPDATE `assignment` 
     SET 
     `deleteStatus`= 1
     where  id = '".secure($_GET['id'])."'
     "; 


     $res = mysqli_query($conn,$sql);

     if(!$res){

        $error= "Sorry, there was an error deleting assignment.";
        header('location:../my_assignment.php?id='.$_GET['moduleID'].'&error='.$error.'');

    }else{

        $error= "Assignment successful deleted";
        header('location:../my_assignment.php?id='.$_GET['moduleID'].'&error='.$error.'');
    }

//end of update

}else{

    echo "<script> alert('Error! Please Log in');
        window.location='logout.php';
        </script>";
}

?>