<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){



	$sql13 = "SELECT * FROM modules WHERE moduleCourseID = '".secure($_GET['id'])."'";

	$result13 = mysqli_query($conn,$sql13);


	if (mysqli_num_rows($result13) > 0) {
  // output data of each row
		while($row13 = mysqli_fetch_array($result13)){

			deleteChapter($row13['moduleID'],$conn);
		
						

		}

	}





// // end remove

$remove = "DELETE FROM courses WHERE coursesID= '".secure($_GET['id'])."'";

 mysqli_query($conn, $remove);

	

}

//delete Chapter

function deleteChapter($id,$conn){

//delete Topic
deleteTopic($id,$conn);

// delete Lessons
  deleteLesson($id,$conn);

//delete Material
  deleteModuleMaterial($id,$conn);

//delete Group

  deleteDiscusion($id,$conn);

//delete exam 
  deleteExam($id,$conn);

//delete assignment 

  deleteAssignment($id,$conn);


  $sql8 = "DELETE FROM modules
  WHERE   moduleID  = '".$id."'";

  mysqli_query($conn, $sql8);



}

function deleteLesson($id,$conn){

  //get file path

  $sql5 = "SELECT learningID FROM learning WHERE moduleID = '".$id."'";

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
  WHERE   moduleID  = '".$id."'";

  mysqli_query($conn, $sql6);

  

}

function deleteTopic($id,$conn){


  //delete Lesson

  $sql = "DELETE FROM topics WHERE moduleID  = '".$id."'";

  mysqli_query($conn, $sql);

  

}




function deleteModuleMaterial($moduleID,$conn){



  // delete Chapter resouces 



  $sql7 = "SELECT * FROM moduleMaterial WHERE moduleName = '".$moduleID."'";

  $result7 = mysqli_query($conn, $sql7);

  if (mysqli_num_rows($result7) > 0) {
  // output data of each row
    while($row7 = mysqli_fetch_assoc($result7)){


      $Path = "../../img/".$row7['moduleFile'];
      if (file_exists($Path)){
        unlink($Path);   
      } 

    }
  }

  //end of unlinking 

  $sql8 = "DELETE FROM moduleMaterial WHERE moduleName = '".$moduleID."'";

  mysqli_query($conn, $sql8);



}

function deleteDiscusion($moduleID,$conn){


    // delete Chapter resouces 



  $sql9 = "SELECT * FROM groupDiscuss WHERE moduleID = '".$moduleID."'";

  $result9 = mysqli_query($conn, $sql9);

  if (mysqli_num_rows($result9) > 0) {
  // output data of each row
    while($row9 = mysqli_fetch_assoc($result9)){


      $Path = "../../img/".$row9['discussion'];
      if (file_exists($Path)){
        unlink($Path);   
      } 

    }
  }

  //end of unlinking 

  $sql10 = "DELETE FROM groupDiscuss WHERE moduleID = '".$moduleID."'";

  mysqli_query($conn, $sql10);




}

function deleteExam($moduleID, $conn){

    // delete Chapter resouces 



  $sql13 = "SELECT * FROM exam WHERE moduleID = '".$moduleID."'";

  $result13 = mysqli_query($conn, $sql13);

  if (mysqli_num_rows($result13) > 0) {
  // output data of each row
    while($row13 = mysqli_fetch_assoc($result13)){


      $Path = "../exams/".$row13['exam'];
      if (file_exists($Path)){
        unlink($Path);   
      } 

    }
  }

  //end of unlinking 

  $sql14 = "DELETE FROM exam WHERE moduleID = '".$moduleID."'";

  mysqli_query($conn, $sql14);




}


function deleteAssignment($moduleID,$conn){



  // delete Chapter resouces 



  $sql11 = "SELECT * FROM assignment WHERE moduleID = '".$moduleID."'";

  $result11 = mysqli_query($conn, $sql11);

  if (mysqli_num_rows($result11) > 0) {
  // output data of each row
    while($row11 = mysqli_fetch_assoc($result11)){


      $Path = "../assignment/".$row11['assignment'];
      if (file_exists($Path)){
        unlink($Path);   
      } 

    }
  }

  //end of unlinking 

  $sql12 = "DELETE FROM assignment WHERE moduleID = '".$moduleID."'";

  mysqli_query($conn, $sql12);




}



function deleteMaterial($id,$conn){



  

  $sql4 = "DELETE FROM learningMaterial
  WHERE learningID  = '".$id."'";

  mysqli_query($conn, $sql4);


}



$parameters = json_encode(
                    array (
 "path"=> "/college/".$_GET['department']."/".$_GET['class'].""
                    )
                );


$cheaders = array('Authorization: Bearer 7ML9oPXCTP4AAAAAAAAAAY1GuaxNq_sM9XV9VdGV6gujQHJJ8ZwzK2sqEx-GAlxF',
                  'Content-Type: application/json',
                  'data:'.$parameters.' ');

$ch = curl_init('https://api.dropboxapi.com/2/files/delete_v2');
curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$response = curl_exec($ch);



curl_close($ch);