<?php
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){
   



    $sql = 'UPDATE topics SET topicName= "'.$_POST['chapter'].'" WHERE id = "'.$_POST['chapterID'].'"'; 


    if(mysqli_query($conn,$sql)){




        $error= "Successful edited chapter.";
        header('location:../chapter.php?id='.$_POST['moduleID'].'&error='.$error.'');

    }else{

        $error= "Error in editing chapter ";
        header('location:../chapter.php?id='.$_POST['moduleID'].'&error='.$error.'');
    }




$parameters = json_encode(
                    array (

  "from_path" => "/college/".$_POST['total']."/".$_POST['previousName']."",
    "to_path" => "/college/".$_POST['total']."/".$_POST['chapter']."",
    "allow_shared_folder" => false,
    "autorename" => false,
    "allow_ownership_transfer" => false 
                    )
                );


$cheaders = array('Authorization: Bearer 7ML9oPXCTP4AAAAAAAAAAY1GuaxNq_sM9XV9VdGV6gujQHJJ8ZwzK2sqEx-GAlxF',
                  'Content-Type: application/json',
                  'data:'.$parameters.'');

$ch = curl_init('https://api.dropboxapi.com/2/files/move_v2');
curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$response = curl_exec($ch);



curl_close($ch);





}else{

//if user not logged in

    header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');

}

?>