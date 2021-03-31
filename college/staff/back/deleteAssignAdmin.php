<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";
deleteAssign(secure($_GET['id']),$conn);


function deleteAssign($id,$conn){

  //get file path

  $sql5 = "SELECT * FROM assignment WHERE id = '".$id."'";

  $result5 = mysqli_query($conn, $sql5);

  if (mysqli_num_rows($result5) > 0) {
  // output data of each row
    while($row5 = mysqli_fetch_assoc($result5)){

      deleteAssignFile($row5['id'],$conn);

    }

  }



// end remove


  //delete Lesson

  $sql6 = "DELETE FROM assignment
  WHERE   id  = '".$id."'";

  mysqli_query($conn, $sql6);

  

}

function deleteAssignFile($id,$conn){



  //unlink Resources from server

    //get file path

  $sql3 = "SELECT * FROM assignmentFiles
  WHERE  assignmentID = '".$id."'";

  $result3 = mysqli_query($conn, $sql3);

  if (mysqli_num_rows($result3) > 0) {
  // output data of each row
    while($row = mysqli_fetch_assoc($result3)){


      $Path = "../assignment/".$row3['file'];
      if (file_exists($Path)){
        unlink($Path);   
      } 

    }
  }

  //end of unlinking 



  $sql = "DELETE FROM assignmentFiles
  WHERE  assignmentID = '".$id."'";

  mysqli_query($conn, $sql);


}
