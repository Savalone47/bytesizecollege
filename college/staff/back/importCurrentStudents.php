<?php 
session_start();
include "../../action.php";


if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];
    
$fp = fopen($fileName, "r");

$num= 0;

while( !feof($fp) ) {
  if( !$line = fgetcsv($fp, 10000, ",")) {
     continue;
  }
if($num == 0){ //skip first row with headers
   $num++;
} else{

$password = rand_string(10);

 
// strart 

      $importSQL = "INSERT INTO `students`(`studentName`,
                                                `studentLastName`,
                                                `studentDOB`,
                                                `studentCountry`,
                                                `studentNumber`,
                                                `identityNo`,
                                                `gender`,
                                                `studentEmail`,
                                                `studentPassword`,
                                                `studentPhone`,
                                                `studentHomeNo`,
                                                `studentAddress`,
                                                `activeStatus`
                                                 )

            VALUES ('".$line[4]."',
                '".$line[5]."',
                '".$line[6]."',
                '".$line[7]."',
                '".$line[8]."',
                '".$line[9]."',
                '".$line[10]."',
                '".$line[11]."',
                '".md5($password)."',
                '".$line[12]."',
                '".$line[13]."',
                '".$line[14]."',
                1
            )";

if(mysqli_query($conn,$importSQL)){

   

$last_id = mysqli_insert_id($conn);

assignModules($conn,$last_id,$line[0],$line[1],$line[3]);

sendStudentMail($line[11],$line[4],$password);

//assignModules($conn,$studentID,$courseCode,$courseIntake,$courseDelivery,$courseDepartment);


$parentIfo = "INSERT INTO `parentInfo`( 
                                        `studentID`,
                                        `kinName`,
                                        `relationship`, 
                                        `kinPhone`, 
                                        `kinCellPhone`, 
                                        `kinAddress`) 

                                        VALUES ('".$last_id."',
                                        '".$line[15]."',
                                        '".$line[16]."',
                                        '".$line[17]."',
                                        '".$line[18]."',
                                        '".$line[19]."'
                                    )";

if(mysqli_query($conn,$parentIfo)){

  echo 200;

} else{

  echo 202;



  }





 
 } else{

    mysqli_error($conn);



  }
// end

 
}
}

fclose($fp);

}





function sendStudentMail($email,$name,$password){

  $to = $email;
  $subject = "Student Registration";
  $txt = "Hi!
  \nYour registration at Bytesize College Vinco LMS was successful.
  \nYour student account on Vinco Learning Management System (LMS) will be activated after we have proceed and on the commencement of your course. 
  \nUsername : ".$email."

  \nPassword : ".$password."  

 \n If you have not yet paid your academic fees, please pay these fees  into one of the following accounts:


\n\nRegards,
\nByte Size College

\nTel: +267 3903324 / +267 3907072

\nFax: +267 3950048

\nMobile: +267 71557489 / +267 74166435
\nMotto “A College with a Difference”";

  $headers = "From: onreply@bytesizecollege.org";

  mail($to,$subject,$txt,$headers);

}




// function rand_string( $length ) {
//     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//     return substr(str_shuffle($chars),0,$length);
// }

function assignModules($conn,$studentID,$courseCode,$courseIntake,$courseDepartment){

    $department;

    if($courseDepartment == "GB"){

     $department =   33;
    }elseif($courseDepartment == "LT"){
        $department =   35;

    }elseif($courseDepartment == "PY"){

        $department =   34;
    }

  $getCourse = "SELECT `coursesID` FROM `courses` 

                WHERE `courseCode` = ".$courseCode." 
                and `courseIntake` = '".$courseIntake."'  
                and `courseDepartment` = ".$department."";




  $course = mysqli_query($conn,$getCourse);

  $row = mysqli_fetch_array($course);

   
    mysqli_query($conn,"INSERT INTO assignedCourses(courseID,studentID) values('".$row['coursesID']."','".$studentID."')");

    $get = mysqli_query($conn,"SELECT *  FROM modules where moduleCourseID='".$row['coursesID']."'");
    

    while($row2 = mysqli_fetch_array($get)){

        $sql2 = "INSERT INTO moduleAssign(moduleID,courseID,studentID) 
        values('".$row2['moduleID']."','".$row['coursesID']."','".$studentID."')";
        mysqli_query($conn,$sql2);

    }
}

?>