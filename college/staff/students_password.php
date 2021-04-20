<?php

$mysqli = new mysqli("localhost", "root", "", "bytesxayep_db1");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql = "SELECT studentID, studentName, studentLastName, studentPassword, gender, studentEmail FROM students as s WHERE studentPassword is NULL OR studentPassword = ''";
$result = $mysqli->query($sql);// Fetch all
;
while ($student = $result->fetch_assoc()) {
    $generated_password = generatePassword($student['studentID'], $mysqli);
    if ($generated_password !== '') {
        sendStudentMail($student['studentEmail'], $student['studentName'], $generated_password);
    } else {
        echo "<em style='color: palevioletred;'>{$student['studentName']}</em>";
    }
}

// Free result set
$result->free_result();

$mysqli->close();


function sendStudentMail($email, $name, $password)
{

    $to = $email;
    $subject = "Student Registration";
    $txt = "Hi $name!
  \nYour registration at Bytesize College Vinco LMS was successful.
  \nYour student account on Vinco Learning Management System (LMS) will be activated after we have proceed and on the commencement of your course.
  \nYour credentials are : 
  
  \nUsername : $email
  \nPassword : $password 

\n\nRegards,
\nByte Size College
\nTel: +267 3903324 / +267 3907072
\nFax: +267 3950048
\nMobile: +267 71557489 / +267 74166435
\nWebsite: https://bytesizecollege.org/
\nMotto “A College with a Difference”";


    $headers = "From: noreply@bytesizecollege.org";

    mail($to, $subject, $txt, $headers);

}

function generatePassword(string $id, mysqli $mysqli): string
{

    $password = rand(100000000, 999999999);
    $hashed_password = md5($password);

    $sql = "UPDATE students SET studentPassword = '{$hashed_password}' WHERE studentID = {$id}";

    if ($mysqli->query($sql)) {
        return $password;
    } else {
        return '';
    }
}

echo "<h1 style='color: green'>Done...</h1>";
