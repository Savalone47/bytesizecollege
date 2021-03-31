<?php
session_start();
// Author: Subrat 
// Date: Apr 17, 2019
//
// POST api/create-token
// To create a Token for a given room, name, role
//
// Parameter: None 
// Raw Body: Yes
// Return: Returns Token 
// 


$_SESSION['URL'] = $_SERVER['HTTP_REFERER'];
require("../config.php");
require("../error.php");


if(isset($_SERVER['REQUEST_METHOD']) !== 'POST') {
	$error["5001"] = "Invalid HTTP Request"	;			// JSON Format issues
	return json_encode($error);
}

include "../../../action.php";

//check details 

$ErrorMessage = "";
$role = "";
$roomID ="";
$name ="";
$class="";

  $meetingID = secure_input($_POST['meetingID']);
  $roomPin = secure_input($_POST['roomPin']);
  $name = secure_input($_POST['nameText']);

  

$now = time();
$ten_minutes = $now + (10 * 60);
$startDate = date('H:i', $now);
$endDate = date('H:i', $ten_minutes);

$currentTime = strtotime("".date('Y-m-d')." ".$endDate."");
 
//The amount of hours that you want to add.
$hoursToAdd = -2;
 
//Convert the hours into seconds.
$secondsToAdd = $hoursToAdd * (60 * 60);
 
//Add the seconds onto the current Unix timestamp.
$newTime = $currentTime + $secondsToAdd;

$test =  date("Y-m-d H:i", $newTime);
        
          //AND startTime =<".$endDate." 
  $sql = "SELECT * FROM classRoom WHERE roomOTP = '".$meetingID."' AND roomPin= '".$roomPin."' OR studentPin='".$roomPin."' AND scheduledDate > '".$test."' ";
                $result = mysqli_query($conn, $sql);
                if(!$result){

                  echo mysqli_error($conn);
                }

                $queryResult = mysqli_num_rows($result);
                if($queryResult > 0 ){

                  while ($row = mysqli_fetch_array($result)){
                  	$class = $row['roomName'];
                    
                      if($row['roomPin'] === $roomPin){
                             $role = "moderator";
                             $roomID = $row['roomID'];


                      }else if($row['studentPin'] === $roomPin){

                      	$role = "participant";
                      	$roomID = $row['roomID'];
                       
                        
                      }else{

                      	$ErrorMessage = 'invalid pin ';
                      }
                  }
                }else{
                  $ErrorMessage = 'meeting is not available';
                }
       
  



function secure_input($data): string{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = strip_tags($data);
  return $data;
}



//end

/* RAW Body Parsing  */
$data = file_get_contents("php://input");
$data1 = array("name"=> $name ,"role"=>$role,"roomId"=> $roomID,"user_ref" => $name);
$data = json_encode($data1);

if (!$data) {
	echo "<script>window.location.href ='../../index.php?error=false';</script>";
	$error["4001"] = "Required parameter missing";		// JAW JSON Body missing
	return json_encode($error);
}

$data = json_decode($data, true);
$json_error = json_last_error();

if ($json_error) {
	echo "<script>window.location.href ='../../index.php?error=false';</script>";
   $error["4003"] = "JSON Body Error";					// JSON Format issues
	return $error = json_encode($error);
}

 
if ($data->name && $data->role && $data->roomId) {
	$ret = CreateToken($data);
	if ($ret) {
		$result = json_decode($ret,true);
	
	echo "<script>window.location.href ='../../room/index.php?token=".$result['token']."&roomId=".$data->roomId."&role=".$data->role."&user_ref=".$data->user_ref."&room=".$class."';</script>'";
	}	
}else{	
header('location:../../index.php'); 	
	echo "<script>window.location.href ='../../index.php?error=false';</script>";
	$error["4004"] = "Required Key missing in JSON Body : name, role or roomId";					// Required JSON Key missing
	return json_encode($error);

}
 

function  CreateToken($data): string{
	/* Create Token Payload */
    $Token = Array(
		"name"			=> $data->name,
		"role"			=> $data->role,
		"user_ref"		=> $data->user_ref
		);
	 

	$Token_Payload = json_encode($Token);

	
	/* Prepare HTTP Post Request */
	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '. base64_encode(APP_ID . ":". APP_KEY)
	);

	/* CURL POST Request */

	$ch = curl_init(API_URL."/rooms/". $data->roomId . "/tokens");
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $Token_Payload);
	$response = curl_exec($ch);

	curl_close($ch);
	return $response;
}
