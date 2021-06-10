<?php
set_time_limit(300);

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

        sendStaffMail(getHODEmail($conn, $data['courseCode'], $data['departmentID']), $studentEmail, $name, $_POST['cellPhoneNumber']);

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

function sendStaffMail($staff_email, $student_mail, $name, $contact)
{

    $to = $staff_email . ', amantle@bytesizecollege.org';
    $subject = "Student Registration Notification";
    $txt = "Hi!
  \nPlease note that the following existing student has succesfully registered on Vinco Learning Management System: 
  \nName: " . $name . " 
 \nEmail: " . $student_mail . "
  \nContact: " . $contact . "
  \n\nRegards,
  \nBytesize College Team";
  $headers = "From: noreply@bytesizecollege.org" . "\r\n" .
  "CC: gmmwewa@bytesizecollege.org, gmmwewa@info.bw";

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


/**
 * GENERATE STUDENT NUMBER
 *
 * @param $conn
 * @param $courseCode
 * @return string
 */
function studentNumber($conn, $courseCode): string
{
    $data = getCourseLocation(
        $conn,
        htmlspecialchars($courseCode),
        htmlspecialchars($_SESSION['departmentID'])
    );

    $courses = [
        '1000' => 'COSB',
        '1001' => 'COSA',
        '1002' => 'OHSF',
        '1003' => 'ECED',
        '1004' => 'CIPS',
        '1005' => 'SECM',
        '1006' => 'CISM',
        '1008' => 'SOCW',
        '1009' => 'PUBH'
    ];

    $departments = [
        '23' => 'GB',
        '24' => 'PY',
        '25' => 'LT',
        '32' => 'ON',
        '33' => 'GB',
        '34' => 'PY',
        '35' => 'LT'
    ];

    $intakes = [
        'Jan' => '01',
        'Mar' => '03',
        'Jun' => '06',
        'Sep' => '09'
    ];

    $course = $courses["{$data['courseCode']}"];
    $branch = $departments["{$data['courseDepartment']}"];
    $intake = $intakes["{$data['courseIntake']}"];
    $year = "021";

    $reqSql = "SELECT MAX(number)+1 as number FROM students JOIN assignedcourses a on students.studentID = a.studentID JOIN courses c on a.courseID = c.coursesID WHERE c.courseCode = {$data['courseCode']} AND c.courseDepartment = {$data['courseDepartment']}";
    $req = mysqli_query($conn, $reqSql);
    $res = mysqli_fetch_assoc($req);
    $number = $res['number'] ?? 1;

    return sprintf("%s%s%s%s%03d", $course, $branch, $year, $intake, $number);
}
