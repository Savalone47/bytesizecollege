<?php
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){

$sql = "UPDATE `department` SET 
						`departmentName`= '".$_POST['departmentName']."',
						`hodID`= '".$_POST['hodManager']."' 
					WHERE departmentID = '".$_POST['id']."' ";

mysqli_query($conn,$sql);

header('Location: ' . $_SERVER['HTTP_REFERER']);



$parameters = json_encode(
                    array (

  "from_path" => "/bytesizeBW/".$_POST['previousName']."",
    "to_path" => "/bytesizeBW/".$_POST['departmentName']."",
    "allow_shared_folder" => false,
    "autorename" => false,
    "allow_ownership_transfer" => false 
                    )
                );


$cheaders = array('Authorization: Bearer 7ML9oPXCTP4AAAAAAAAAAY1GuaxNq_sM9XV9VdGV6gujQHJJ8ZwzK2sqEx-GAlxF',
                  'Content-Type: application/json',
                  'data: 
    "from_path": "/bytesizeBW/'.$_POST['previousName'].'",
    "to_path": "/bytesizeBW/'.$_POST['courseName'].'",
    "allow_shared_folder": false,
    "autorename": false,
    "allow_ownership_transfer": false ');

$ch = curl_init('https://api.dropboxapi.com/2/files/move_v2');
curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$response = curl_exec($ch);



curl_close($ch);

}


?>