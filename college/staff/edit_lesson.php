<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../action.php";

if($_POST['lessonName']){


	$sqlite = 'UPDATE learning set learningName = "'.$_POST['lessonName'].'",  comment="'.$_POST['comment'].'" WHERE learningID = "'.$_POST['learningID'].'"';
	mysqli_query($conn,$sqlite);


$parameters = json_encode(
                    array (

  "from_path" => "/bytesizeBW/".$_POST['total']."/".$_POST['previousName']."",
    "to_path" => "/bytesizeBW/".$_POST['total']."/".$_POST['lessonName']."",
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

}


?>