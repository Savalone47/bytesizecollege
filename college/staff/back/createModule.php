<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){



$sql = 'INSERT INTO 
modules(
moduleName
) 
values(
"'.secure($_POST['moduleName']).'"
)';   

$res= mysqli_query($conn,$sql);



}else{

    echo "<script> alert('Error! Please Log in');
        window.location='logout.php';
        </script>";
}

?>