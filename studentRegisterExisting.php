<?php
include 'college/action.php';
require_once('college/util/connectDB.php');


$studentEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
//echo checkEmail($conn,$studentEmail);
//$data = getCourseLocation($conn,$_POST['code'],$_POST['departmentID']);


if (checkEmail($conn, $studentEmail) == "1") {
    echo '202';
    exit;

}

//INSERT TO STUDENTS TABLE

$sql = 'INSERT INTO `students`
  ( 
  `studentName`,
   studentLastName,
  `studentEmail`,
  `gender`,
  `studentDOB`, 
  `studentPhone`,
  studentNumber,
  `activeStatus`
  ) 

VALUES (
        "' . htmlspecialchars($_POST["firstName"]) . '",
        "' . htmlspecialchars($_POST["lastName"]) . '",
        "' . $studentEmail . '",
        "' . htmlspecialchars($_POST["gender"]) . '",
        "' . htmlspecialchars($_POST['dateOfBirth']) . '",
        "' . htmlspecialchars($_POST['cellPhoneNumber']) . '",
        "' . htmlspecialchars($_POST['studentNumber']) . '",
        "0"
        )';


$last_id = "";

if (mysqli_query($conn, $sql) === TRUE) {


    $last_id = mysqli_insert_id($conn);

    $sql1 = 'INSERT INTO `parentInfo`(
                            `studentID`,
                            `kinName`
                            )  

              VALUES 
             (
             "' . $last_id . '",
             "Byte Size"
             )';


    if (mysqli_query($conn, $sql1) === TRUE) {

        $data = getCourseLocation($conn, htmlspecialchars($_POST['code']), htmlspecialchars($_POST['departmentID']));  //get course details

        //assign student
        assignModules($conn, $data['coursesID'], $last_id);

        //send email to student
        $name = htmlspecialchars($_POST["firstName"]) . " " . htmlspecialchars($_POST["lastName"]);

        sendStudentMail($studentEmail, $data['courseName'], $name);

        //send email to HOD CC "College Owner"

        sendStaffMail(getHODEmail($conn, $data['courseCode'], $data['departmentID']), $data['courseName'], $name, $data['departmentName']);

        echo '200';

    } else {
        echo '201';
    }

} else {
    echo '404';
}

$conn->close();


function checkEmail($conn, $email)
{
    $result = mysqli_query($conn, "SELECT studentEmail FROM students where studentEmail ='" . $email . "'");

    if (mysqli_num_rows($result) >= 1) {
        return '1';
    }
    return '0';
}

function sendStudentMail($email, $coursename, $name)
{

    $to = $email;
    $subject = "Existing Student Registration Notification";
    $txt = "Hello! " . $name . "
  \nYour registration on Bytesize College was successful for " . $coursename . ". 
  \nYour account will be activated within 48 hours to allow the allocation of your student/participant number.
  \n\nRegards,
  \nBytesize College Team";
    $headers = "From: noreply@bytesizecollege.org";

    mail($to, $subject, $txt, $headers);

}

function sendStaffMail($email, $coursename, $name, $location)
{

    $to = $email;
    $subject = "Student Registration Notification";
    $txt = "Hi!
  \nPlease note that the following existing student has succesfully registered on Vinco Learning Management System: 
  \nName: " . $name . " 
 \nCourse: " . $coursename . "
  \nLocation: " . $location . "
  \n\nRegards,
  \nBytesize College Team";
    $headers = "From: noreply@bytesizecollege.org" . "\r\n" . "CC: gmmwewa@info.bw";

    mail($to, $subject, $txt, $headers);

}

function getHODEmail($conn, $code, $departmentID)
{
    $sql = "SELECT managementEmail FROM `department` 
          Inner join management on management.managementID = department.hodID 
          Inner join courses on courses.courseDepartment = department.departmentID 
          WHERE courses.courseCode =" . $code . "
          and department.departmentID = " . $departmentID;

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    return $row['managementEmail'];

}


function getCourseLocation($conn, $code, $departmentID)
{
    $sql = "SELECT courses.*, department.*
          FROM `department` 
          Inner join courses on courses.courseDepartment = department.departmentID 
          where courses.courseCode = '" . $code . "' and departmentID = '" . $departmentID . "'";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_array($result);

}


function assignModules($conn, $coursesID, $studentID)
{
    mysqli_query($conn, "INSERT INTO assignedCourses(courseID,studentID) values('" . $coursesID . "','" . $studentID . "')");

    $get = mysqli_query($conn, "SELECT *  FROM modules where moduleCourseID='" . $coursesID . "'");
    $test = mysqli_num_rows($get);

    while ($row2 = mysqli_fetch_array($get)) {

        $sql2 = "INSERT INTO moduleAssign(moduleID,courseID,studentID) 
        values('" . $row2['moduleID'] . "','" . $row2['moduleCourseID'] . "','" . $studentID . "')";
        mysqli_query($conn, $sql2);

    }
}


//GENERATE STUDENT NUMBER
function studentNumber($conn, $courseCode, $courseIntake, $courseDelivery, $courseDepartment)
{

    $studentNumber = "";

    $sql = "SELECT `coursesID`,`courseCode`,`courseDepartment`,`courseDelivery`,`courseIntake` FROM `courses`

                WHERE `courseCode` = " . $courseCode . " 
                and `courseIntake` = '" . $courseIntake . "' 
                and `courseDelivery` = '" . $courseDelivery . "' 
                and `courseDepartment` = " . $courseDepartment . "";


    $results = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($results);

    //get Campus

    if ($row['courseDepartment'] == 23) {

        $studentNumber = "GB";

    } elseif ($row['courseDepartment'] == 24) {

        $studentNumber = "LT";

    } elseif ($row['courseDepartment'] == 25) {

        $studentNumber = "PY";

    }

    //end campus

    switch ($row['courseCode']) {
        case '1000':

            $studentNumber .= "COB";

            break;
        case '1001':

            $studentNumber .= "COA";

            break;
        case '1002':

            $studentNumber .= "OHS";

            break;
        case '1003':

            $studentNumber .= "ECE";

            break;

        case '1004':

            $studentNumber .= "PS";

            break;
        case '1005':

            $studentNumber .= "SM";

            break;
        case '1006':

            $studentNumber .= "CIS";

            break;
        case '1008':

            $studentNumber .= "SW";

            break;
        case '1009':

            $studentNumber .= "PH";

            break;

        default:

            $studentNumber .= "NA";

            break;
    }


    if ($row['courseDelivery'] == "Fulltime") {

        $studentNumber .= "F";

    } elseif ($row['courseDelivery'] == "Parttime") {

        $studentNumber .= "P";

    } elseif ($row['courseDelivery'] == "Distance") {

        $studentNumber .= "D";

    }


    if ($row['courseIntake'] == "Jun") {

        $studentNumber .= "06";

    } elseif ($row['courseIntake'] == "Sep") {

        $studentNumber .= "09";

    }


    $getNumber = mysqli_query($conn, "SELECT * FROM `assignedCourses` WHERE `courseID` =  " . $row['coursesID']);

    $number = mysqli_num_rows($getNumber);

    $studentNumber .= $number;


    return $studentNumber;

}

?>
