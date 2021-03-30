<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){






$sqli = "SELECT * FROM topics where topicName='".$_POST['chapter']."' and moduleID='".$_POST['moduleID']."'";
$queryi = mysqli_query($conn,$sqli);
$num = mysqli_num_rows($queryi);





  function getNumber(){ 
          $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          $randomString = ''; 
        
          for ($i = 0; $i < 6; $i++) { 
              $index = rand(0, strlen($characters) - 1); 
              $randomString .= $characters[$index]; 
          } 
        
          return $randomString; 
      }


if($num == 0 ){


$sql = 'INSERT INTO topics(topicName,moduleID,status) values("'.$_POST['chapter'].'","'.$_POST['moduleID'].'","0")';
$query = mysqli_query($conn,$sql);



$parameters = json_encode(
                    array (
 "path"=> "/bytesizeBW/".$_POST['total']."/".$_POST['chapter']."",
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


}else{

$chapter = $_POST['chapter'].' '.getNumber();


$sql = 'INSERT INTO topics(topicName,moduleID,status) values("'.$chapter.'","'.$_POST['moduleID'].'","0")';
$query = mysqli_query($conn,$sql);

$parameters = json_encode(
                    array (
 "path"=> "/bytesizeBW/".$_POST['total']."/".$chapter."",
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

//send notification to students
$subject = "New Chapter Created!";
$messageBody = "Good Day\nNew chapter has been created!";

//sendNotification($_POST['moduleID'],$messageBody,$subject,$conn);


}