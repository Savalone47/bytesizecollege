<?php

set_time_limit(300);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'college/action.php';


$location = "";

$tagname = $_POST['firstName'][0] . $_POST['lastName'][0];

try {
    $studentNumber = studentNumber($conn, $_POST['code'], $_POST['intake'], $_POST['delivery'], $tagname);
} catch (Exception $e) {
}

$signature = "I " . $_POST["signature"] . " do bind myself in payment for " . $_POST['program'] . " Tuition and examination fees at this institution. I also agree that I have read and understood the contents of the above policies. I further do bind myself to pay the said fees by the said deadlines. I therefore agree that I will comply with the information contained in this application form. By Signing this document, I further commit myself to pay all the full amount of school fees even if I miss classes or withdraw from school before finishing the course and failure to do so will result in legal action and I
  will be liable for all legal costs";


$coursesID = base64_decode(urldecode($_POST['coursesID']));

$studentEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
//echo checkEmail($conn,$studentEmail);

if (checkEmail($conn, $studentEmail) == "1") {
    echo 202;

    exit;
} else {
    if ($_FILES['passport']['tmp_name']) {
        $target_path = "studentDocuments/";
        $target_path = $target_path . basename($_FILES['passport']['name']);
        $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));


        if ($_FILES["passport"]["size"] > 300000) {
            echo 1;
        }


        if ($imageFileType != "pdf") {
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
        $target_path = $target_path . basename($_FILES['proofOfPayment']['name']);
        $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));


        if ($_FILES["proofOfPayment"]["size"] > 300000) {
            echo 1;
        }


        if ($imageFileType != "pdf") {
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
        $target_path = $target_path . basename($_FILES['certificate']['name']);
        $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));


        if ($_FILES["certificate"]["size"] > 300000) {
            echo 1;
        }


        if ($imageFileType != "pdf") {
            echo 2;
        }

        if (move_uploaded_file($_FILES['certificate']['tmp_name'], $target_path)) {
        } else {
            //echo "Sorry, file not uploaded, please try again!";
        }
    }
//INSERT TO STUDENTS TABLE

    if ($studentNumber == "NA") {
        echo 3;
        exit;
    }

    $condition = $_POST['condition'] ?? 0;
    $condition1 = $_POST['condition1'] ?? 0;
    $condition2 = $_POST['condition2'] ?? 0;
    $condition3 = $_POST['condition3'] ?? 0;
    $condition4 = $_POST['condition4'] ?? 0;
    $condition5 = $_POST['condition5'] ?? 0;
    $condition6 = $_POST['condition6'] ?? 0;


    $sql = 'INSERT INTO `students`
      ( 
      `studentName`, `studentLastName`, `studentEmail`, `gender`, `identityNo`, `studentNumber`, `studentDOB`, 
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
      `activeStatus`
      ) 

    VALUES (
            "' . escape($_POST["firstName"]) . '",
            "' . escape($_POST["lastName"]) . '",
            "' . $studentEmail . '",
            "' . escape($_POST["gender"]) . '",
            "' . escape($_POST['idNumber']) . '",
            "' . $studentNumber . '",
            "' . escape($_POST['dateOfBirth']) . '",
            "' . escape($_POST['cellPhoneNumber']) . '",
            "' . escape($_POST['PassportNo']) . '",
            "' . escape($_POST["country"]) . '",
            "' . escape($_POST["address"]) . '",
            "' . escape($_POST["check"]) . '",
             ' . escape($condition) . ',
             ' . escape($condition1) . ',
             ' . escape($condition2) . ',
             ' . escape($condition3) . ',
             ' . escape($condition4) . ',
             ' . escape($condition5) . ',
             ' . escape($condition6) . ',
            "' . escape($_POST["other"]) . '",
            "' . escape($signature) . '",
            "' . basename($_FILES['passport']['name']) . '",
            "' . basename($_FILES['proofOfPayment']['name']) . '",
            "' . basename($_FILES['certificate']['name']) . '",
            "0"
            )';
//    echo $sql;die;


    $last_id = "";

    if ($conn->query($sql) === true) {
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
                              "' . escape($_POST['kinName']) . '",
                              "' . escape($_POST['relationship']) . '",
                              "' . escape($_POST['kinPhone']) . '",
                              "' . escape($_POST['kinCellPhone']) . '",
                              "' . escape($_POST['kinAddress']) . '",
                              "' . escape($_POST['schoolName']) . '",
                              "' . escape($_POST['qualification']) . '",
                              "' . escape($_POST['year']) . '"
                              )';


        if ($conn->query($sql1) === true) {
            //assign student

            assignModules($conn, $_POST['code'], $_POST['intake'], $_SESSION['departmentID'], $last_id);


            //send email to student
            //$data = getCourseLocation($conn,$coursesID);  //get course details
            $data = getCourseLocation(
                $conn,
                htmlspecialchars($_POST['code']),
                htmlspecialchars($_SESSION['departmentID'])
            );  //get course details

//            var_dump($data);die;
            $name = htmlspecialchars($_POST["firstName"]) . " " . htmlspecialchars($_POST["lastName"]);
            sendStudentMail($studentEmail, $data['courseName'], $data['departmentName'], $name, $studentNumber);
            //send email to HOD CC "College Owner"
            sendStaffMail(
                $data['courseName'],
                $name,
                $data['departmentName'],
                $data['departmentID'],
                $_POST['cellPhoneNumber']
            );
            echo 200;
        }
    } else {
        echo mysqli_error($conn);
    }
}

$conn->close();


function checkEmail($conn, $email): string
{
    $result = mysqli_query($conn, "SELECT studentEmail FROM students where studentEmail ='" . $email . "'");

    if (mysqli_num_rows($result) >= 1) {
        return '1';
    } else {
        return '0';
    }
}

function sendStudentMail($email, $coursename, $location, $name, $studentNumber)
{
    $to = $email;
    $subject = "Application for Certicate in " . $coursename . " in " . $location;
    $txt = "Hi " . $name . "!
  \nStudent Number : " . $studentNumber . "
  \nYour registration at Bytesize College for Certicate in " . $coursename . " in " . $location . " was successful.
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
\nYOUR REFERENCE: " . $studentNumber . "

\n\nBANK NAME: ABSA BANK BOTSWANA LIMITED
\nACCOUNT NAME: BYTE SIZE COLLEGE
\nACCOUNT NUMBER: 1305725
\nSWIFT CODE: BARCBWGX
\nBRANCH CODE: 290167
\nBRANCH: MALL BRANCH
\nYOUR REFERENCE: " . $studentNumber . "

\n\nPlease send the proof of payment to the following email : gmmwewa@info.bw 



\n\nRegards,
\nByte Size College

\nTel: +267 3903324 / +267 3907072

\nFax: +267 3950048

\nMobile: +267 71557489 / +267 74166435
\nMotto “A College with a Difference”";

    $headers = "From: info@bytesizecollege.org";

    mail($to, $subject, $txt, $headers);
}

/* SEND STAFF MAIL */
function sendStaffMail($coursename, $name, $location, $departmentID, $phone)
{
    $email = "";

    if ($departmentID == 23) {
        $email = "gaborone@bytesizecollege.org";
    } elseif ($departmentID == 24) {
        $email = "palapye@bytesizecollege.org";
    } elseif ($departmentID == 25) {
        $email = "letlhakane@bytesizecollege.org";
    } elseif ($departmentID == 32) {
        $email = "gaborone@bytesizecollege.org";
    } else {
        $email = "dikabelo@bytesizecollege.org";
    }

    $to = $email . "anantle@bytesizecollege.org";
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
    $headers .= 'Cc: gmmwewa@bytesizecollege.org, gmmwewa@info.bw' . "\r\n";

    mail($to, $subject, $txt, $headers);
}

function getHODEmail($conn, $code, $departmentID)
{
    $result = mysqli_query(
        $conn,
        "SELECT managementEmail 
                              FROM `department` 
                              Inner join management on management.managementID = department.hodID 
                              Inner join courses on courses.courseDepartment = department.departmentID 
                              where courses.courseCode = " . $code . " 
                              and department.departmentID =" . $departmentID
    );

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


function assignModules($conn, $courseCode, $courseIntake, $courseDepartment, $studentID)
{
    $getCourse = "SELECT `coursesID` FROM `courses` 

                WHERE `courseCode` =   $courseCode  
                and `courseIntake` = '$courseIntake' 
                and `courseDepartment` = $courseDepartment";

    $course = mysqli_query($conn, $getCourse);

    $row = mysqli_fetch_array($course);


    mysqli_query(
        $conn,
        "INSERT INTO assignedCourses(courseID,studentID) values('" . $row['coursesID'] . "','" . $studentID . "')"
    );

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

    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk != 0) {
        move_uploaded_file($_FILES["identityDoc"]["tmp_name"], $target_file);
    }
}


/**
 * GENERATE STUDENT NUMBER
 *
 * @param $conn
 * @param $courseCode
 * @param $courseIntake
 * @param $courseDelivery
 * @param $tagname
 * @return string
 * @throws Exception
 */
function studentNumber($conn, $courseCode, $courseIntake, $courseDelivery, $tagname): string
{
    $studentNumber = $tagname;

    $sql = "SELECT `coursesID`,`courseCode`,`courseDepartment`,`courseIntake` FROM `courses`
                WHERE `courseCode` =  $courseCode
                and `courseIntake` =  '$courseIntake'";

    $results = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($results);

    //get Campus ECED030

    if ($row['courseDepartment'] == 23) {
        $studentNumber .= "GB";
    } elseif ($row['courseDepartment'] == 24) {
        $studentNumber .= "PY";
    } elseif ($row['courseDepartment'] == 25) {
        $studentNumber .= "LT";
    } elseif ($row['courseDepartment'] == 32) {
        $studentNumber .= "OL";
    }


    //end campus ECED030

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

            $studentNumber .= "PS0";

            break;
        case '1005':

            $studentNumber .= "SM0";

            break;
        case '1006':

            $studentNumber .= "CIS";

            break;
        case '1008':

            $studentNumber .= "SW0";

            break;
        case '1009':

            $studentNumber .= "PH0";

            break;

        default:

            $studentNumber .= "NA0";

            break;
    }


    if ($courseDelivery == "Fulltime") {
        $studentNumber .= "F";
    } elseif ($courseDelivery == "Parttime") {
        $studentNumber .= "P";
    } elseif ($courseDelivery == "Distance") {
        $studentNumber .= "D";
    }


    if ($row['courseIntake'] == "Jan") {
        $studentNumber .= "01";
    } elseif ($row['courseIntake'] == "Mar") {
        $studentNumber .= "03";
    } elseif ($row['courseIntake'] == "Jun") {
        $studentNumber .= "06";
    } elseif ($row['courseIntake'] == "Sep") {
        $studentNumber .= "09";
    }


    $getNumber = mysqli_query($conn, "SELECT * FROM `assignedCourses` WHERE `courseID` =  " . $row['coursesID']);

    $number = mysqli_num_rows($getNumber);

    $studentNumber .= $number;

    $strlen = mb_strlen($studentNumber);
    $nb = ($strlen < 15) ? 15 - $strlen : 0;
    $studentNumber .= (($nb > 0) ? rand_string($nb) : "") ;
    return $studentNumber;
}

function escape($string = null)
{
    return isset($string) ? htmlspecialchars($string) : null;
}
