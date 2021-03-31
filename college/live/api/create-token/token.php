<?php
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
 
require("../config.php");
require("../error.php");

header("Content-type: application/json");

if(isset($_SERVER['REQUEST_METHOD']) !== 'POST') {
    $error["5001"] = "Invalid HTTP Request";				// JSON Format issues
    return json_encode($error);
}

/* RAW Body Parsing  */
$data = file_get_contents("php://input");
$data1 = array('name' =>"Anathi", 'role' => "participant", 'roomId' => "5ec6739bfc116d9939674152", 'user_ref'=> "Anathi");
$data = json_encode($data1);

if (!$data) {
	$error["4001"] = "Required parameter missing";		// JAW JSON Body missing
    return json_encode($error);

}

$data = json_decode($data, true);
$json_error = json_last_error();

if ($json_error) {
    $error["4003"] ="JSON Body Error";					// JSON Format issues
	return json_encode($error);
}

 
if ($data->name && $data->role && $data->roomId) {
	$ret = CreateToken($data);
	if ($ret) {	print $ret;
		exit;
	}	
}
else {
	$error["4004"] = "Required Key missing in JSON Body name, role or roomId";				// Required JSON Key missing
	return $error = json_encode($error);

}
 

function  CreateToken($data){

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