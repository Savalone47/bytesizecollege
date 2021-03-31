<?php
//header('Location: ' . $_SERVER['HTTP_REFERER']);

session_start();

include "../../../action.php";
require("../config.php");
require("../error.php");

header("Content-type: application/json");

if(isset($_SERVER['REQUEST_METHOD']) !== 'POST') {
    // JSON Format issues
    $error["5001"] = "Invalid HTTP Request";
	return json_encode($error);
}



$ret = CreateRoom();


//write to database


 $roomName = $ret[0]['name'];
 $serviceID = $ret[0]['service_id'];
 $referrence = $ret[0]['owner_ref'];

 $roomID = $ret[0]['room_id'];
 $mode = $ret[2]['mode'];
 $duration = $ret[2]['duration'];
 $participants = $ret[2]['participants'];
 $auto_recording = true;
 $moderators = $ret[2]['moderators'];

 if(!$roomName){
     echo "error";
     exit;
 }


try {
    $random_pat_pin = random_int(100000, 999999);
} catch (Exception $e) {
    print "Exception randomize number ".$e->getMessage();
}

try {
    $random_moderator_pin = random_int(100000, 999999);
} catch (Exception $e) {
    print "Exception randomize number ".$e->getMessage();
}
try {
    $studentPin = random_int(100000, 999999);
} catch (Exception $e) {
    print "Exception randomize number ".$e->getMessage();
}

function generateRandomString($length):string {
    $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        try {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        } catch (Exception $e) {
            print "Exception to randomize".$e->getMessage();
        }
    }
    return $randomString;
}

$roomOTP = generateRandomString(6);


 $sql = "INSERT INTO classRoom(roomID, roomName, roomPin, roomOTP, studentPin, scheduledDate,status) 
 value('".$roomID."', 
 'Virtual meetings', 
 '".$random_moderator_pin."',
 '".$roomOTP."',
 '".$studentPin."',
'".$_POST['date']." ".$_POST['time']."',
'0')";
 $query = mysqli_query($conn, $sql);
 
    

if(!empty($_POST['extra'])){
$sql5 = "UPDATE lessons SET roomID='".$roomOTP."', roomPin='".$studentPin."', adminPin='".$random_moderator_pin."'
where lessonID='".$_POST['lessonID']."'";
$query5 = mysqli_query($conn,$sql5);

  }else{

$calcTime = date('H:i',strtotime('+'.$_POST['duration'].' minutes',strtotime($_POST['time'])));


$sql = "INSERT INTO extralessons(subjectID,lessonStart,lessonDate,lessonEnd,grade,tutorID,roomID,roomPin,adminPin) 
values(
'".$_POST['moduleID']."',
'".$_POST['time']."',
'".$_POST['date']."',
'".$_POST['end']."',
'".$_POST['id']."',
'".$_SESSION['adminID']."',
'".$roomOTP."',
'".$studentPin."',
'".$random_moderator_pin."')";
$query = mysqli_query($conn,$sql);
}



function  CreateRoom( $roomId): array{

    $random_name=0;
    try {
        $random_name = random_int(100000, 999999);
    } catch (Exception $e) {
        print "Exception randomize number ".$e->getMessage();
    }

    //schduled time
     $dateold = isset($_POST['date']);
     $time = isset($_POST['time']);

    $currentTime = strtotime("".$dateold." ".$time."");
   
  //The amount of hours that you want to add.
  $hoursToAdd = -2;
   
  //Convert the hours into seconds.
  $secondsToAdd = $hoursToAdd * (60 * 60);
   
  //Add the seconds onto the current Unix timestamp.
  $newTime = $currentTime + $secondsToAdd;

   

  $date =  date("Y-m-d H:i:s", $newTime);


  //duration

  // Calculating duration of the online session
    $time1 = $_POST['time'];
    $time2 = $_POST['end'];
    $array1 = explode(':', $time1);
    $array2 = explode(':', $time2);

    $minutes1 = ($array1[0] * 60.0 + $array1[1]);
    $minutes2 = ($array2[0] * 60.0 + $array2[1]);

    $diff = $minutes2 - $minutes1;



	/* Create Room Meta */
    $Room = Array(
    "name"			=> "Sample Room: ". $random_name,
    "owner_ref"		=> $random_name,
    "settings"		=> Array(
				"description"	=> "",
				"quality"		=> "SD",
				"mode"			=> "Group",
				"participants"	=> "40",
				"duration"		=> "".$diff,
				"scheduled"   => true,
        "scheduled_time" => "".$date,
				"auto_recording"=> true,
				"active_talker"	=> true,
				"wait_moderator"=> false,
				"adhoc"			=> false,
				"canvas"		=> true
				),
   				 "sip"		=> Array(
				"enabled"		=> false
				)
	   
     );

   

	$Room_Meta = json_encode($Room);

	
	/* Prepare HTTP Post Request */

	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '. base64_encode("600d219703939e25c262c292" . ":". "adeZaeebeAa6eMutehauuhy5uvaYaLe9uJes")
	);


	/* CURL POST Request */

	$ch = curl_init("https://api.enablex.io/v1"."/rooms". $roomId);

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $Room_Meta);
	$response = curl_exec($ch);

	curl_close($ch);


    $obj = (array)json_decode($response, true);

    $room = (array)$obj['room'];

    $sip = (array)$obj['sip'];

    $settings = (array)$room['settings'];

    $event = array($room,$sip, $settings);

    return  [$event];

}
