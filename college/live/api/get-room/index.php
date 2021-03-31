<?php

// Author: Subrat 
// Date: Apr 17, 2019
//
// GET api/get-room/#ROOM_ID#
// To get information of a given room
//
// URL Pattern: ROOM-ID appended at the end of URL   
// Raw Body: No
// Return: Returns Room Meta 
// 
 
require("../config.php");
require("../error.php");

header("Content-type: application/json");

if(isset($_SERVER['REQUEST_METHOD']) !== 'GET') {
	$error["5001"] = "Invalid HTTP Request";					// JSON Format issues
	return json_encode($error);
}


/* Process Query String */
$roomId		= (!empty($_GET['roomId']));
 
if ($roomId) {
	$ret = GetRoom($roomId);
	if ($ret)
	{	print $ret;
		exit;
	}	
}
else {
	$error["4004"] = "Required Key missing in JSON Body" ;					// Required JSON Key missing
	return json_encode($error);

}
 

function  GetRoom($roomId){

	/* Prepare HTTP Post Request */
	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '. base64_encode(APP_ID . ":". APP_KEY)
	);

	/* CURL POST Request */

	$ch = curl_init(API_URL."/rooms/". $roomId );
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, false);
	$response = curl_exec($ch);

	curl_close($ch);
	return $response;

}
