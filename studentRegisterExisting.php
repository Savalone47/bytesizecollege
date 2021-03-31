<?php
include 'college/action.php';
require_once ('college/util/connectDB.php');


$studentEmail = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
//echo checkEmail($conn,$studentEmail);
//$data = getCourseLocation($conn,$_POST['code'],$_POST['departmentID']);


if(checkEmail(isset($conn),$studentEmail) == "1"){
  echo 202;
  exit;

}

//INSERT TO STUDENTS TABLE

$sql = 'INSERT INTO `students`
  ( 
  `studentName`,
   studentLastName,
  `personalEmail`,
  `gender`,
  `studentDOB`, 
  `studentPhone`,
  studentNumber,
  `activeStatus`
  ) 

VALUES (
        "'.htmlspecialchars($_POST["firstName"]).'",
        "'.htmlspecialchars($_POST["lastName"]).'",
        "'.$studentEmail.'",
        "'.htmlspecialchars($_POST["gender"]).'",
        "'.htmlspecialchars($_POST['dateOfBirth']).'",
        "'.htmlspecialchars($_POST['cellPhoneNumber']).'",
        "'.htmlspecialchars($_POST['studentNumber']).'",
        "0"
        )';


$last_id = "";
$conn ="";

if ($conn->query($sql) === TRUE){



$last_id = $conn->insert_id;

$sql1 = 'INSERT INTO `parentInfo`(
                            `studentID`,
                            `kinName`,
             courseEnd
                            )  

              VALUES 
             (
             "'.$last_id.'",
             "Byte Size",
             "'.htmlspecialchars($_POST['endDate']).'"
             )';



if ($conn->query($sql1) === TRUE) {

 $data = getCourseLocation($conn,htmlspecialchars(!empty($_POST['code'])),htmlspecialchars(!empty($_POST['departmentID'])));  //get course details

 //assign student
 assignModules($conn,$data[2],$last_id);


 //send email to student
 $name = htmlspecialchars($_POST["firstName"])." ".htmlspecialchars($_POST["lastName"]);

 sendStudentMail($studentEmail,$data[1],$name);

  //send email to HOD CC "College Owner"

 sendStaffMail(getHODEmail($conn, 1, $data[2]),$data[1],$name,htmlspecialchars($_POST['endDate']),$data[0]);

 echo 200;

}

}

$conn->close();   

 

function checkEmail($conn,$email){
    $result = mysqli_query($conn,"SELECT studentEmail FROM students where studentEmail ='".$email."'");

    if(mysqli_num_rows($result) >= 1){
    return '1';
  }
    return '0';
}

function sendStudentMail($email,$coursename,$name){

 $to = $email;
  $subject = "Existing Student Registration Notification";
  $txt = "Hello! ".$name."
  \nYour registration on Bytesize College was successful for ".$coursename.". 
  \nYour account will be activated within 48 hours to allow the allocation of your student/participant number.
  \n\nRegards,
  \nBytesize College Team";
  $headers = "From: noreply@bytesizecollege.org";

  mail($to,$subject,$txt,$headers);

}

function sendStaffMail($email,$coursename,$name,$endDate,$location){

  $to = $email;
  $subject = "Student Registration Notification";
  $txt = "Hi!
  \nPlease note that the following existing student has succesfully registered on Vinco Learning Management System: 
  \nName: ".$name." 
 \nCourse: ".$coursename."
  \nCourse End Date: ".$endDate."
  \nLocation: ".$location."
  \n\nRegards,
  \nBytesize College Team";
  $headers = "From: noreply@bytesizecollege.org" . "\r\n" .
  "CC: gmmwewa@info.bw";

  mail($to,$subject,$txt,$headers);

}

function getHODEmail($conn,$code,$departmentID){

$result = mysqli_query($conn,"SELECT managementEmail FROM `department` 
          Inner join management on management.managementID = department.hodID 
          Inner join courses on courses.courseDepartment = department.departmentID 
          WHERE courses.courseCode =".$code."
          and department.departmentID = ".$departmentID);

$row = mysqli_fetch_array($result);

return $row['managementEmail'];

}


function getCourseLocation($conn,$code,$departmentID){

$result = mysqli_query($conn,"SELECT courses.coursesID, departmentName,courseName 
          FROM `department` 
          Inner join courses on courses.courseDepartment = department.departmentID 
          where courses.courseCode = '".$code."' and departmentID = '".$departmentID."'");




$row = mysqli_fetch_array($result);

$data[0] = $row['departmentName'];
$data[1] = $row['courseName'];
$data[2] = $row['coursesID'];    

return $data;

}


function assignModules($conn,$coursesID,$studentID){
    mysqli_query($conn,"INSERT INTO assignedCourses(courseID,studentID) values('".$coursesID."','".$studentID."')");
    $get = mysqli_query($conn,"SELECT *  FROM modules where moduleCourseID='".$coursesID."'");
    $test = mysqli_num_rows($get);

    while($row2 = mysqli_fetch_array($get)){

        $sql2 = "INSERT INTO moduleAssign(moduleID,courseID,studentID) 
        values('".$row2['moduleID']."','".$row2['moduleCourseID']."','".$studentID."')";
        mysqli_query($conn,$sql2);

    }
}


//GENERATE STUDENT NUMBER
function studentNumber($conn,$courseCode,$courseIntake,$courseDelivery,$courseDepartment){

  $studentNumber="";

  $sql = "SELECT `coursesID`,`courseCode`,`courseDepartment`,`courseDelivery`,`courseIntake` FROM `courses`

                WHERE `courseCode` = ".$courseCode." 
                and `courseIntake` = '".$courseIntake."' 
                and `courseDelivery` = '".$courseDelivery."' 
                and `courseDepartment` = ".$courseDepartment."";

   
    $results = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($results);

    //get Campus

    if($row['courseDepartment'] == 23){

      $studentNumber = "GB";

    }elseif($row['courseDepartment'] == 24){

      $studentNumber = "LT";

    }elseif($row['courseDepartment'] == 25){

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



    if($row['courseDelivery'] == "Fulltime"){

      $studentNumber .= "F";

    }elseif($row['courseDelivery'] == "Parttime"){

      $studentNumber .= "P";

    }elseif($row['courseDelivery'] == "Distance"){

      $studentNumber .= "D";

    }


    if($row['courseIntake'] == "Jun"){

      $studentNumber .= "06";

    }elseif($row['courseIntake'] == "Sep"){

      $studentNumber .= "09";

    }


    $getNumber = mysqli_query($conn,"SELECT * FROM `assignedCourses` WHERE `courseID` =  ".$row['coursesID']);

    $number = mysqli_num_rows($getNumber);

    $studentNumber .= $number;


    return $studentNumber;

    }
 
?>