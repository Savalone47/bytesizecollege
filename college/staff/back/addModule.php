<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){



$sql = 'INSERT INTO 
modules(
moduleName,
moduleType,
moduleOverview,
moduleCredit,
moduleDuration,
moduleCourseID,
modulePeriod,
modulePrerequisites,
moduleEligible,
modulePrice,
moduleCode
) 
values(
"'.secure($_POST['moduleName']).'",
"'.secure($_POST['moduleType']).'",
"'.secure($_POST['overview']).'",
"'.secure($_POST['moduleCredits']).'",
"'.secure($duration).'",
"'.secure($_POST['courseID']).'",
"'.secure($_POST['period']).'",
"'.secure($_POST['perequisites']).'",
"'.secure($_POST['eligible']).'",
"'.secure($_POST['price']).'", 
"'.secure($_POST['moduleCode']).'"
)';   

$res= mysqli_query($conn,$sql);

$last_id = $conn->insert_id;


if($res){


    $sql = "INSERT INTO lectureAssigns(lectureID,moduleID) values('".secure($_POST['facilitator'])."','".$last_id."')";
     $result = mysqli_query($conn,$sql);



     $sqlite = "SELECT * FROM assignedCourses where courseID ='".$_POST['courseID']."'";
     $querylite = mysqli_query($conn,$sqlite);
     while($rowlite = mysqli_fetch_array($querylite)){


      $sqlite1 ="INSERT INTO moduleAssign(moduleID,courseID,studentID) values('".$last_id."','".$_POST['courseID']."','".$rowlite['studentID']."')";
      $querylite2 = mysqli_query($conn,$sqlite1);



     }


$total = $_POST['departmentName']."/".$_POST['courseName'];

$parameters = json_encode(
                    array (
 "path"=> "/bytesizeBW/".$total."/".$_POST['moduleName']."",
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

}else{

    echo "<script> alert('Error! Please Log in');
        window.location='logout.php';
        </script>";
}

?>