<?php
session_start();
include "../../action.php";


if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){






$sql = "UPDATE topics SET deleteStatus=1 WHERE  id= ".secure($_POST['id'])."";


if(mysqli_query($conn,$sql)){



header("location: ../chapter.php?id=".$_GET['moduleID']."&message=Succesfuly deleted Chapter!");

} else{

	header("location: ../chapter.php?id=".$_GET['moduleID']."&message=Error in deleting Chapter!");

}

$parameters = json_encode(
                    array (
 "path"=> "/collegeDemo/".$_POST['total']."/".$_POST['chapter']."";
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





} else{

header("location: ../../../index.php");

}