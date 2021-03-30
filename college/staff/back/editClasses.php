<?php
session_start();


//header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){


//end course picture




$sql = "UPDATE `courses` SET 
`courseName`='".secure($_POST['courseName'])."',
`courseType`='".secure($_POST['courseType'])."',
`courseDepartment`= '".secure($_POST['department'])."',
`courseManager`= '".secure($_POST['courseManager'])."',
`courseCode`= '".secure($_POST['courseCode'])."',
`courseDuration`= '".secure($_POST['duration'])."',
`courseTimeline`= '".secure($_POST['timeline'])."',
`courseOverview`= '".secure($_POST['overview'])."'

WHERE `coursesID` = '".secure($_POST['id'])."' ";

mysqli_query($conn,$sql);

echo mysqli_error($conn);


exit;


$parameters = json_encode(
                    array (

  "from_path" => "/bytesizeBW/".$_POST['departmentName']."/".$_POST['previousName']."",
    "to_path" => "/bytesizeBW/".$_POST['departmentName']."/".$_POST['courseName']."",
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

    echo "<script> alert('Error! Please Log in');
      window.location='logout.php';
      </script>";
}
?>