<?php
include "../../action.php";
header('Location: ' . $_SERVER['HTTP_REFERER']);
deleteLesson(secure($_POST['id']),$conn);


function deleteLesson($id,$conn){

  //get file path

  $sql5 = "SELECT learningID FROM learning WHERE learningID = '".$id."'";

  $result5 = mysqli_query($conn, $sql5);

  if (mysqli_num_rows($result5) > 0) {
  // output data of each row
    while($row5 = mysqli_fetch_assoc($result5)){

      deleteMaterial($row5['learningID'],$conn);

    }

  }



// end remove


  //delete Lesson

  $sql6 = "DELETE FROM learning
  WHERE   learningID  = '".$id."'";

  mysqli_query($conn, $sql6);

  

}

function deleteMaterial($id,$conn){



  //unlink Resources from server

    //get file path

  $sql3 = "SELECT * FROM learningMaterial
  WHERE learningID  = '".$id."'";

  $result3 = mysqli_query($conn, $sql3);

  if (mysqli_num_rows($result3) > 0) {
  // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)){


      $Path = "../../img/".$row3['eventImage'];
      if (file_exists($Path)){
        unlink($Path);   
      } 

    }
  }

  //end of unlinking 



  $sql4 = "DELETE FROM learningMaterial
  WHERE learningID  = '".$id."'";

  mysqli_query($conn, $sql4);


}

$parameters = json_encode(
                    array (
 "path"=> '/collegeDemo/'.$_POST['total'].'/'.$_POST['lesson'].''
                    )
                );
print_r($parameters);

$cheaders = array('Authorization: Bearer 7ML9oPXCTP4AAAAAAAAAAY1GuaxNq_sM9XV9VdGV6gujQHJJ8ZwzK2sqEx-GAlxF',
                  'Content-Type: application/json',
                  'data:'.$parameters.' ');

$ch = curl_init('https://api.dropboxapi.com/2/files/delete_v2');
curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$response = curl_exec($ch);



curl_close($ch);

