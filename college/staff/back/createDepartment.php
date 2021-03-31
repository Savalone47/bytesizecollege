<?php
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){

$sql = "INSERT INTO `department`(                       
                        `departmentName`, 
                        `hodID`
                        ) 
                        VALUES (
                        '".$_POST['departmentName']."',
                       '".$_POST['hodManager']."'
                    )";

mysqli_query($conn,$sql);

header('Location: ' . $_SERVER['HTTP_REFERER']);


$parameters = json_encode(
                    array (
 "path"=> "/bytesizeBW/".$_POST['departmentName']."",
 "autorename" => false
                    )
                );


$cheaders = array('Authorization: Bearer 7ML9oPXCTP4AAAAAAAAAAY1GuaxNq_sM9XV9VdGV6gujQHJJ8ZwzK2sqEx-GAlxF',
                  'Content-Type: application/json',
                  'data:'.$parameters.' ');

$ch = curl_init('https://api.dropboxapi.com/2/files/create_folder_v2');
curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$response = curl_exec($ch);



curl_close($ch);


}


?>