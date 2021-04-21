<?php
session_start();
include 'college/action.php';
include 'college/util/connectDB.php';

if (isset($conn)) {
    $studentNumber = studentNumber($conn, $_POST['code'], $_POST['intake'], $_POST['delivery'], $_SESSION['departmentID']);
}

$signature = "I do bind myself in payment for Tuition and examination fees at this institution. I also agree that I have read and understood the contents of the above policies. I further do bind myself to pay the said fees by the said deadlines. I therefore agree that I will comply with the information contained in this application form. By Signing this document, I further commit myself to pay all the full amount of school fees even if I miss classes or withdraw from school before finishing the course and failure to do so will result in legal action and I
  will be liable for all legal costs";
managementName;

//$coursesID = base64_decode(urldecode($_POST['coursesID']));
$studentEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
//echo checkEmail($conn,$studentEmail);

if (checkEmail($conn, $studentEmail) === "1") {
    $result = mysqli_query($conn, "SELECT studentEmail FROM students where studentEmail ='" . $studentEmail . "'");
    if (mysqli_num_rows($result) >= 1) {
        return '1';
    }
    exit;
}

if ($_FILES['passport']['tmp_name']) {
    $target_path = "studentDocuments/";
    $target_path .= basename($_FILES['passport']['name']);
    $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));

    if ($_FILES["passport"]["size"] > 300000) {
        echo 1;
    }

    if ($imageFileType !== "pdf") {
        echo 2;
    }

    if (move_uploaded_file($_FILES['passport']['tmp_name'], $target_path)) {
        //echo "File uploaded successfully!";
    } else {
        // echo "Sorry, file not uploaded, please try again!";
    }
}

if ($_FILES['proofOfPayment']['tmp_name']) {
    $target_path = "studentDocuments/";
    $target_path .= basename($_FILES['proofOfPayment']['name']);
    $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));

    if ($_FILES["proofOfPayment"]["size"] > 300000) {
        echo 1;
    }

    if ($imageFileType !== "pdf") {
        echo 2;
    }

    if (move_uploaded_file($_FILES['proofOfPayment']['tmp_name'], $target_path)) {
        // echo "File uploaded successfully!";
    } else {
        //echo "Sorry, file not uploaded, please try again!";
    }
}


if ($_FILES['certificate']['tmp_name']) {

    $target_path = "studentDocuments/";
    $target_path .= basename($_FILES['certificate']['name']);
    $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));

    if ($_FILES["certificate"]["size"] > 300000) {
        echo 1;
    }

    if ($imageFileType !== "pdf") {
        echo 2;
    }

    if (move_uploaded_file($_FILES['certificate']['tmp_name'], $target_path)) {

    } else {
        //echo "Sorry, file not uploaded, please try again!";
    }
}
//INSERT TO STUDENTS TABLE

if ($studentNumber === "NA") {
    echo 3;
    exit;
}

$password = rand(100000000, 999999999);

$sql = 'INSERT INTO `students`
  ( 
  `studentName`,
   studentLastName,
  `studentEmail`,
  `gender`,
  `identityNo`,
  `studentNumber`, 
  `studentDOB`, 
  `studentPhone`,
  `passport`,
  `studentCountry`,
  `studentAddress`,
  `disability`,
  `hearing`,
  `physicalHealth`,
 `intellectual`,
 `learning`,
  `mental`,
  `vision`,
  `medical`,
  `other`,
  `aggrement`,
  `passportDOC`,
  `proofOfPayment`,
  `certificates`,
  `activeStatus`,
   `studentPassword`
  ) 

VALUES (
        "' . htmlspecialchars($_POST["firstName"]) . '",
        "' . htmlspecialchars($_POST["lastName"]) . '",
        "' . $studentEmail . '",
        "' . htmlspecialchars($_POST["gender"]) . '",
        "' . htmlspecialchars($_POST['idNumber']) . '",
        "' . $studentNumber . '",
        "' . htmlspecialchars($_POST['dateOfBirth']) . '",
        "' . htmlspecialchars($_POST['cellPhoneNumber']) . '",
        "' . htmlspecialchars($_POST['PassportNo']) . '",
        "' . htmlspecialchars($_POST["country"]) . '",
        "' . htmlspecialchars($_POST["address"]) . '",
        "' . htmlspecialchars($_POST["check"]) . '",
        "' . htmlspecialchars($_POST["condition"]) . '",
        "' . htmlspecialchars($_POST["condition1"]) . '",
        "' . htmlspecialchars($_POST["condition2"]) . '",
        "' . htmlspecialchars($_POST["condition3"]) . '",
        "' . htmlspecialchars($_POST["condition4"]) . '",
        "' . htmlspecialchars($_POST["condition5"]) . '",
        "' . htmlspecialchars($_POST["condition6"]) . '",
        "' . htmlspecialchars($_POST["other"]) . '",
        "' . htmlspecialchars($signature) . '",
        "' . basename($_FILES['passport']['name']) . '",
        "' . basename($_FILES['proofOfPayment']['name']) . '",
        "' . basename($_FILES['certificate']['name']) . '",
        "0",
        "' . md5($password) .'"
        )';


$last_id = "";

if ($conn->query($sql) === TRUE) {

    $last_id = $conn->insert_id;

    $sql1 = 'INSERT INTO `parentInfo`(
                            `studentID`,
                            `kinName`,
                            `relationship`,
                            `kinPhone`,
                            `kinCellPhone`,
                            `kinAddress`,
                            `schoolName`,
                            `qualification`,
                            `year`)  

              VALUES 
                     (
                     "' . $last_id . '",
                     "' . htmlspecialchars($_POST['kinName']) . '",
                     "' . htmlspecialchars($_POST['relationship']) . '",
                     "' . htmlspecialchars($_POST['kinPhone']) . '",
                     "' . htmlspecialchars($_POST['kinCellPhone']) . '",
                     "' . htmlspecialchars($_POST['kinAddress']) . '",
                     "' . htmlspecialchars($_POST['schoolName']) . '",
                     "' . htmlspecialchars($_POST['qualification']) . '",
                     "' . htmlspecialchars($_POST['year']) . '"
                     )';


    if ($conn->query($sql1) === TRUE) {

        //assign student

        assignModules($conn, isset($_POST['code']), isset($_POST['intake']), $_POST['delivery'], $_SESSION['departmentID'], $last_id);

        //send email to student
        //$data = getCourseLocation($conn,$coursesID);  //get course details
        $data = getCourseLocation($conn, $_POST['code'], $_POST['intake'], $_POST['delivery'], $_SESSION['departmentID']);
        $name = htmlspecialchars($_POST["firstName"]) . " " . htmlspecialchars($_POST["lastName"]);

        sendStudentMail($studentEmail, $data[1], $data[0], $name, $studentNumber);
        //send email to HOD CC "College Owner"
        sendStaffMail($data[1], $name, $data[0], $_SESSION['departmentID'], $_POST['cellPhoneNumber']);
        echo 200;
    }

} else {
    echo mysqli_error($conn);
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

function sendStudentMail($email, $coursename, $location, $name, $studentNumber)
{

    $to = $email;
    $subject = "Application for Certicate in " . $coursename . " in " . $location;
    $txt = "Hi  $name !
  \nStudent Number : $studentNumber
  \nYour registration at Bytesize College for Certicate in  $coursename  in  $location  was successful.
  \nYour student account on Vinco Learning Management System (LMS) will be activated after we have received your payment and on the commencement of your course.
  \nUpon the activation of your account, you will receive an email via the email address you provided, which will inlude: your college email address (which will serve as your username), as well as the passwords for Vinco LMS and webmail details.
 \n If you not yet paid your academic fees, please pay these fees  into one of the following accounts:

\nByte Size College Bank Details
\nBANK NAME: FIRST NATIONAL BANK
\nACCOUNT NAME: IT SOLUTIONS & TRAINING (PTY) LTD
\nACCOUNT NUMBER: 62067622772
\nSWIFT CODE: FIRNBWGX
\nBRANCH CODE: 281467
\nBRANCH: MAIN BRANCH
\nYOUR REFERENCE: $studentNumber 

\n\nBANK NAME: ABSA BANK BOTSWANA LIMITED
\nACCOUNT NAME: BYTE SIZE COLLEGE
\nACCOUNT NUMBER: 1305725
\nSWIFT CODE: BARCBWGX
\nBRANCH CODE: 290167
\nBRANCH: MALL BRANCH
\nYOUR REFERENCE:  $studentNumber 

\n\nPlease send the proof of payment to the following email : gmmwewa@info.bw 



\n\nRegards,
\nByte Size College

\nTel: +267 3903324 / +267 3907072

\nFax: +267 3950048

\nMobile: +267 71557489 / +267 74166435
\nMotto “A College with a Difference”";

    $headers = "From: noreply@bytesizecollege.org";
    mail($to, $subject, $txt, $headers);

}

/* SEND STAFF MAIL */
function sendStaffMail($coursename, $name, $location, $departmentID, $phone)
{

    $email = "gaborone@bytesizecollege.org";

    $to = $email;
    $subject = "New Student Registration Notification";
    $txt = "Hello!
  \nPlease note that the following new student has succesfully registered on Vinco Learning Management System: 
  \nName: " . $name . " 
  \nCourse: " . $coursename . "
   \nLocation: " . $location . "
 \nPhone : " . $phone . "

  \n\nRegards,
  \nBytesize College Team";
    $headers = "From: <noreply@bytesizecollege.org>" . "\r\n";
    $headers .= 'Cc: gmmwewa@bytesizecollege.org' . "\r\n";

    mail($to, $subject, $txt, $headers);

}

function getHODEmail($conn, $code, $departmentID)
{

    $result = mysqli_query($conn, "SELECT managementEmail 
                              FROM `department` 
                              Inner join management on management.managementID = department.hodID 
                              Inner join courses on courses.courseDepartment = department.departmentID 
                              where courses.courseCode = " . $code . " 
                              and department.departmentID =" . $departmentID);

    $row = mysqli_fetch_array($result);

    return $row['managementEmail'];

}


function getCourseLocation($conn, $courseCode, $courseIntake, $courseDelivery, $courseDepartment): array
{

    $result = mysqli_query($conn, "SELECT departmentName,courseName 
                              FROM `department` 
                              Inner join courses on courses.courseDepartment = department.departmentID 
                              WHERE `departmentID` = " . $courseDepartment . " 
                              and courses.courseCode = " . $courseCode . " 
                              and courses.courseIntake = '" . $courseIntake . "' 
                              and courses.courseDelivery = '" . $courseDelivery . "'");

    $row = mysqli_fetch_array($result);

    $data[0] = $row['departmentName'];
    $data[1] = $row['courseName'];


    return $data;

}


function assignModules($conn, $courseCode, $courseIntake, $courseDepartment, $studentID)
{

    $getCourse = "SELECT `coursesID` FROM `courses` 
                    WHERE `courseCode` = " . $courseCode . " 
                    and `courseIntake` = '" . $courseIntake . "' 
                    and `courseDepartment` = " . $courseDepartment . ".";

    $course = mysqli_query($conn, $getCourse);

    $row = mysqli_fetch_array($course);


    mysqli_query($conn, "INSERT INTO assignedCourses(courseID,studentID) values('" . $row['coursesID'] . "','" . $studentID . "')");

    $get = mysqli_query($conn, "SELECT *  FROM modules where moduleCourseID='" . $row['coursesID'] . "'");
    $test = mysqli_num_rows($get);

    while ($row2 = mysqli_fetch_array($get)) {

        $sql2 = "INSERT INTO moduleAssign(moduleID,courseID,studentID) 
        values('" . $row2['moduleID'] . "','" . $row['coursesID'] . "','" . $studentID . "')";
        mysqli_query($conn, $sql2);

    }
}

function storeDocuments($file)
{


    //upload image
    $target_dir = "file/";
    $target_file = $target_dir . basename($_FILES["identityDoc"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if ($_FILES["identityDoc"]["size"] > 500000000) {
        $uploadOk = 0;
    }

    if ($fileType !== "pdf" && $fileType !== "doc" && $fileType !== "docx") {
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk != 0) {
        move_uploaded_file($_FILES["identityDoc"]["tmp_name"], $target_file);
    }
}


//GENERATE STUDENT NUMBER
function studentNumber($conn, $courseCode, $courseIntake, $courseDelivery, $courseDepartment)
{
    $studentNumber = "";

    $sql = "SELECT `coursesID`,`courseCode`,`courseDepartment`,`courseIntake` FROM `courses`

                WHERE `courseCode` = '" . $courseCode . "' 
                and `courseIntake` = '" . $courseIntake . "' 
                 
                and `courseDepartment` = '" . $courseDepartment . "'";


    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($results);


    //get Campus
    if ($row['courseDepartment'] === 23) {

        // print_r($row);

        $studentNumber = "GB";

    } elseif ($row['courseDepartment'] === 24) {

        $studentNumber = "PY";

    } elseif ($row['courseDepartment'] === 25) {

        $studentNumber = "LT";

    } elseif ($row['courseDepartment'] === 32) {

        $studentNumber = "OL";
    }


    //End Campus

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


    if ($courseDelivery === "Fulltime") {

        $studentNumber .= "F";

    } elseif ($courseDelivery === "Parttime") {

        $studentNumber .= "P";

    } elseif ($courseDelivery === "Distance") {

        $studentNumber .= "D";

    }


    if ($row['courseIntake'] === "Jan") {

        $studentNumber .= "01";

    } elseif ($row['courseIntake'] === "Mar") {

        $studentNumber .= "03";

    } elseif ($row['courseIntake'] === "Jun") {

        $studentNumber .= "06";

    } elseif ($row['courseIntake'] === "Sep") {

        $studentNumber .= "09";

    }


    $getNumber = mysqli_query($conn, "SELECT * FROM `assignedCourses` WHERE `courseID` =  " . $row['coursesID']);

    $number = mysqli_num_rows($getNumber);

    $studentNumber .= $number;

    return $studentNumber;

}

?>
