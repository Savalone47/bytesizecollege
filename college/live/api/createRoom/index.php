<?php

header('Location: ' .!empty($_SERVER['HTTP_REFERER']));
header("Content-type: application/json");
session_start();

include "../../../action.php";
include '../../../../college/util/connectDB.php';
require("../config.php");
require("../error.php");


//if(isset($_SERVER['REQUEST_METHOD']) !== 'POST') {
//    $error = $ARR_ERROR["5001"];					// JSON Format issues
//    $error["desc"] = "HTTP POST Requests only";
//    echo $error = json_encode($error);
//}


$ret = CreateRoom();

//write to database

$roomName = $ret[0]['name'] ?? null;
$serviceID = $ret[0]['service_id'] ?? null;
$referrence = $ret[0]['owner_ref'] ?? null;

$roomID = $ret[0]['room_id'] ?? null;
$mode = $ret[2]['mode'] ?? null;
$duration = $ret[2]['duration']?? null;
$participants = $ret[2]['participants'] ?? null;
$auto_recording = true;
$moderators = $ret[2]['moderators'] ?? null;

if(!$roomName){
    echo "error";
    exit;
}
$random_pat_pin = "";
$random_moderator_pin="";
$studentPin="";

try {
    $random_pat_pin = random_int(100000, 999999);
} catch (Exception $e) {
    echo ("error".$e->getMessage());
}

try {
    $random_moderator_pin = random_int(100000, 999999);
} catch (Exception $e) {
    echo("error".$e->getMessage());
}
try {
    $studentPin = random_int(100000, 999999);
} catch (Exception $e) {
    echo("error".$e->getMessage());
}

function generateRandomString($length) :string {
    $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        try {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        } catch (Exception $e) {
            echo("error".$e->getMessage());
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


if(!$_POST['extra']){


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






function  CreateRoom(): array {
    $random_name ="";
    try {
        $random_name = random_int(100000, 999999);
    } catch (Exception $e) {
        echo("error ".$e->getMessage());
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
    $time1 = isset($_POST['time']) !== null;
    $time2 = isset($_POST['end']) !== null;
    $array1 = explode(':', $time1, null);
    $array2 = explode(':', $time2, null);

    $minutes1 = $array1[0] * 60.0 + $array1[1];
    $minutes2 = $array2[0] * 60.0 + $array2[1];

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
        'Authorization: Basic '. base64_encode(APP_ID . ":". APP_KEY)
    );

    /* CURL POST Request */

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, API_URL."/rooms");
    curl_setopt($curl, CURLOPT_URL, API_URL.http_build_query($headers));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $Room_Meta);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

    $response = curl_exec($curl);

    curl_close($curl);

    $obj = (array)json_decode($response, true);

    $room = (array)($obj['room'] ?? null);

    $sip = (array)($obj['sip'] ?? null);

    $settings = (array)($room['settings'] ?? null);

    return array($room,$sip, $settings);
}

exit;
