<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";

deleteMaterial(secure($_POST['delete']),$conn);

function deleteMaterial($id,$conn){



  //unlink Resources from server

    //get file path

  $sql3 = "SELECT * FROM learningMaterial
  WHERE materialID = '".$id."'";

  $result3 = mysqli_query($conn, $sql3);

  if (mysqli_num_rows($result3) > 0) {
  // output data of each row
    while($row = mysqli_fetch_assoc($result3)){


      $Path = "../../img/".$row3['eventImage'];
      if (file_exists($Path)){
        unlink($Path);   
      } 

    }
  }

  //end of unlinking 



  $sql = "DELETE FROM learningMaterial
  WHERE materialID  = '".$id."'";

  mysqli_query($conn, $sql);


}