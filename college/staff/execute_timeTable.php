<?php
session_start();
include "../action.php";


$sql = "SELECT * FROM lessons";
$query =mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($query)){


$url = 'https://bytesizecollege.org/college/live/api/createRoom/index.php';

 $year = "".date('Y')."";
 $week = date('Y-m-d', strtotime(''.$row['weekDay'].' 0 week'));



  $fields = array(
  'lessonID' => urlencode($row['lessonID']),
  'name' => urlencode($row['lessonName']),
  'date' => urlencode($week),
  'time' => urlencode($row['lessonStart']),
  'end' => urlencode($row['lessonEnd']));



//url-ify the data for the POST
foreach($fields as $key => $value){ 
  $fields_string .= $key.'='.$value.'&';
   }

rtrim($fields_string, '&');



//open connection
$ch = curl_init();



//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);




//execute post
$result = curl_exec($ch);



//close connection
curl_close($ch);
}