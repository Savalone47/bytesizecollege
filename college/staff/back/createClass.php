<?php
session_start();

include "../../action.php";



if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){

$sqli = "SELECT * FROM courses where courseDepartment =  '".secure($_POST['department'])."' and  courseName ='".secure($_POST['courseName'])."'";
$queryi = mysqli_query($conn,$sqli);
$num = mysqli_num_rows($queryi);

if($num == 0 ){

  $sql ="INSERT INTO `courses`(`courseName`, 
                      `courseType`, 
                      `courseDepartment`,  
                      `courseCode`, 
                      `courseDuration`,
                      `courseTimeline`,
                      `courseIntake`,
                      `courseDelivery`,
                      `courseOverview`
                      )

VALUES ('".secure($_POST['courseName'])."',
        '".secure($_POST['courseType'])."',
        '".secure($_POST['department'])."',
        '".secure($_POST['courseCode'])."',
        '".secure($_POST['duration'])."',
        '".secure($_POST['timeline'])."',
        '".secure($_POST['intake'])."',
        '".secure($_POST['delivery'])."',
        '".pg_escape_string(secure($_POST['courseOverview']))."' 
       )";




mysqli_query($conn,$sql);

header('Location: ' . $_SERVER['HTTP_REFERER']);


$parameters = json_encode(
                    array (
 "path"=> "/bytesizeBW/".secure($_POST['departmentName'])."/".secure($_POST['courseName'])."",
 "autorename" => true
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

    $course = secure($_POST['courseName']).' '.getNumber();

     $sql ="INSERT INTO `courses`(`courseName`, 
                      `courseType`, 
                      `courseDepartment`, 
                      `courseManager`, 
                      `courseCode`, 
                      `courseDuration`,
                      `courseTimeline`,
                      `courseIntake`,
                      `courseDelivery`)

VALUES ('".$course."',
        '".secure($_POST['courseType'])."',
        '".secure($_POST['department'])."',
        '".secure($_POST['courseManager'])."',
        '".secure($_POST['courseCode'])."',
        '".secure($_POST['duration'])."',
        '".secure($_POST['timeline'])."',
        '".secure($_POST['intake'])."',
        '".secure($_POST['delivery'])."'
       )";




mysqli_query($conn,$sql);

header('Location: ' . $_SERVER['HTTP_REFERER']);


$parameters = json_encode(
                    array (
 "path"=> "/bytesizeBW/".secure($_POST['departmentName'])."/".$course."",
 "autorename" => true
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

}






function getNumber(){ 
          $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          $randomString = ''; 
        
          for ($i = 0; $i < 6; $i++) { 
              $index = rand(0, strlen($characters) - 1); 
              $randomString .= $characters[$index]; 
          } 
        
          return $randomString; 
}






?>