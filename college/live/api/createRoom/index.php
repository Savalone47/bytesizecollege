<?php

// var_dump($_SERVER['HTTP_REFERER']);
//var_dump($_POST);die;
//header("Content-type: application/json");
session_start();

include "../../../action.php";
include '../../../../college/util/connectDB.php';
require("../config.php");
require("../error.php");


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $error = $ARR_ERROR["5001"];                    // JSON Format issues
    $error["desc"] = "HTTP POST Requests only";
    echo $error = json_encode($error);
}

$sql = "SELECT moduleName FROM modules WHERE moduleID = " . (int)$_POST['moduleID'];
$query = mysqli_query($conn, $sql);

$module_name = "";

while ($module = mysqli_fetch_assoc($query)) {
    $module_name = $module['moduleName'];
}


try {
    $ret = CreateRoom($module_name);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

//write to database

$roomName = $ret['room']['name'] ?? null;
$serviceID = $ret['room']['service_id'] ?? null;
$reference = $ret['room']['owner_ref'] ?? null;

$roomID = $ret['room']['room_id'] ?? null;
$mode = $ret['room']['settings']['mode'] ?? null;
$duration = $ret['room']['settings']['duration'] ?? null;
$participants = $ret['room']['settings']['participants'] ?? null;
$auto_recording = $ret['room']['settings']['auto_recording'] ?? null;
$moderators = $ret['room']['settings']['moderators'] ?? null;

if (!$roomName) {
    echo "error";
    exit;
}
$random_pat_pin = "";
$random_moderator_pin = "";
$studentPin = "";

try {
    $random_pat_pin = random_int(100000, 999999);
    $random_moderator_pin = random_int(100000, 999999);
    $studentPin = random_int(100000, 999999);
} catch (Exception $e) {
    echo "error: " . $e->getMessage();
}

function generateRandomString($length): string
{
    $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        try {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        } catch (Exception $e) {
            echo("error" . $e->getMessage());
        }
    }
    return $randomString;
}

$roomOTP = generateRandomString(6);

$date = $_POST['date'] . " " . $_POST['time'];

$sql = "INSERT INTO classRoom(roomID, roomName, roomPin, roomOTP, studentPin, scheduledDate,status, startTime, endTime, userID) 
 value(
       '{$roomID}',
       '{$roomName}',
       '{$random_moderator_pin}',
       '{$roomOTP}',
       '{$studentPin}',
       '{$date}',
       '0',
      '{$_POST['time']}',
      '{$_POST['end']}',
      '{$_SESSION['adminID']}'
      )";

$query = mysqli_query($conn, $sql);

if ($_POST['extra'] != true) {
    $sql5 = "UPDATE lessons SET roomID='$roomOTP', roomPin='$studentPin', adminPin='$random_moderator_pin' where lessonID='{$_POST['lessonID']}'";
    $query5 = mysqli_query($conn, $sql5);
    var_dump($query5);
} else {
    $calcTime = date('H:i', strtotime('+' . $duration . ' minutes', strtotime($_POST['time'])));
    $weekDay = date('l', strtotime($_POST['date']));
    $desc = $ret['room']['settings']['description'];


    $sql = "INSERT INTO extralessons(subjectID,lessonStart,lessonDate,lessonEnd,grade,tutorID,roomID,roomPin,adminPin, lessonTime, weekDay, lessonDescription, lessonName, price, ref) 
values( 
       {$_POST['moduleID']},
       '{$_POST['time']}',
       '{$_POST['date']}',
       '{$_POST['end']}',
       {$_POST['id']},
       {$_SESSION['adminID']},
       '{$roomOTP}',
       '{$studentPin}',
       '{$random_moderator_pin}',
       '{$calcTime}',
       '{$weekDay}',
       '{$desc}',
       '{$roomName}',
       0,
       '{$reference}'
       )";
    $query = mysqli_query($conn, $sql);
}

/**
 * @throws Exception
 */
function CreateRoom($room_name = "Sample Room"): array
{
    $random_name = "";
    try {
        $random_name = random_int(100000, 999999);
    } catch (Exception $e) {
        echo("error " . $e->getMessage());
    }
    //schduled time
    $dateold = isset($_POST['date']);
    $time = isset($_POST['time']);

    $currentTime = strtotime($dateold . " " . $time);

    //The amount of hours that you want to add.
    $hoursToAdd = -2;

    //Convert the hours into seconds.
    $secondsToAdd = $hoursToAdd * (60 * 60);

    //Add the seconds onto the current Unix timestamp.
    $newTime = $currentTime + $secondsToAdd;


    $date = $_POST['date'] . " " . $_POST['time'] . ":00";


    //duration

    // Calculating duration of the online session
    $time1 = new DateTime($_POST['date'] . " " . $_POST['time']);
    $time2 = new DateTime($_POST['date'] . " " . $_POST['end']);


    $diff = ($time1->diff($time2)->h * 60) + $time1->diff($time2)->i;

    /* Create Room Meta */

    $Room = array(
        "name" => "$room_name: $random_name",
        "owner_ref" => $random_name,
        "settings" => array(
            "description" => "lesson $room_name of $date for $diff secondes",
            "quality" => "SD",
            "mode" => "Group",
            "participants" => "40",
            "duration" => $diff,
            "scheduled" => true,
            "scheduled_time" => $date,
            "auto_recording" => false,
            "active_talker" => true,
            "wait_moderator" => false,
            "adhoc" => false,
            "canvas" => true
        ),
        "sip" => array(
            "enabled" => false
        )
    );

    $Room_Meta = json_encode($Room);

    /* Prepare HTTP Post Request */
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode(APP_ID . ":" . APP_KEY)
    );
    /* CURL POST Request */

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, API_URL . "/rooms");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
//    curl_setopt($curl, CURLOPT_URL, API_URL . http_build_query($headers));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $Room_Meta);

    $response = curl_exec($curl);
//    $rep = curl_getinfo($curl);

    curl_close($curl);

    return (array)json_decode($response, true);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
