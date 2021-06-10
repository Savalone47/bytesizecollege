<?php
session_start();
include "../../action.php";


if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){


// remove picture



    //get file path

                $sql1 = "SELECT * FROM events WHERE id = '".secure($_GET['id'])."'";

                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
  // output data of each row
                $row1 = mysqli_fetch_assoc($result1);


                    $Path = "../events/".$row1['eventImage'];
                    if (file_exists($Path)){
                        unlink($Path);   
                    } 

                }



// end remove

$sql = "DELETE FROM events WHERE id=  ".secure($_GET['id'])."";


if(mysqli_query($conn,$sql)){



header('Location: ../allEvents.php?error=deleted succesfully');


}

} else{

header("location: ../../../index.php");

}
