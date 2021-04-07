<?php
session_start();
include "../../action.php";
include "deleteUtil.php";

if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){

deleteClass(secure($_GET['id']));

//header('Location: ' . $_SERVER['HTTP_REFERER']);

			

// not logged in
}else{

    echo "<script> alert('Error! Please Log in');
      window.location='logout.php';
      </script>";
}
?>
