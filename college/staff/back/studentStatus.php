<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";


function generateRandomString($length = 8): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;

}


if ($_POST['status'] == 1) {
    $sql = "UPDATE students SET activeStatus = 0 where studentID = '{$_POST['id']}'";
    $query = mysqli_query($conn, $sql);
}

if ($_POST['status'] == 0) {

    $password = generateRandomString();
    $hashed = md5($password);

    $sql = "UPDATE `students` SET `activeStatus` = 1, `studentPassword` = '$hashed' WHERE `studentID` ='{$_POST['id']}'";
    $query = mysqli_query($conn, $sql);

    sendVincoDetails($_POST['email'], $password);
}


function sendVincoDetails($schoolEmail, $password)
{

    $to = $schoolEmail;
    $subject = "Vinco Login Details";
    $txt = "Hello ";
    $txt .= "\nCongratulations on your account activation.";

    $txt .= "\n\nProceed to login into your Bytesize College Learning Portal : www.bytesizecollege.org";
    $txt .= "\nYour password is : " . $password;
    $txt .= "\nAll communication with the school will be sent to this email : " . $schoolEmail;

    $txt .= "\n\nRegards,";
    $txt .= "\nVinco (LMS) Team";

    $headers = "From: noreply@bytesizecollege.org";
    mail($to, $subject, $txt, $headers);

}
