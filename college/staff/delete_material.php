<?php
//header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../action.php";

if($_GET['delete']){


	$sqlite = "DELETE FROM `learningMaterial` WHERE `materialID` = '".$_GET['delete']."'";
	mysqli_query($conn,$sqlite);
}


$parameters = json_encode(
                    array (
 "path"=> "/bytesizeBW/".$_GET['total']."/".$_GET['file'].""
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

print_r($parameters);

curl_close($ch);
?>