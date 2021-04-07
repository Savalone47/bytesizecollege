<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../action.php";

     $emails= $_POST['parent2lastname']." '   '".$_POST['parent2email']." ";
    $parentfullname = $_POST['parentfirstname']." ".$_POST['parentlastName']; 
     
    $parent2fullname = $_POST['parent2firstname']." ".$_POST['parent2lastName']; 
         
    $pupilfullname = $_POST['pupilfirstname']." ".$_POST['pupillastname'];
    
    $address = $_POST['streetaddress']." ".$_POST['city']." ".$_POST['state']." ".$_POST['code']." ".$_POST['country'];
    $studentname = $_POST['startDate'];

    $checkbox1 = $_POST['needs'];  
     $grade = $_POST['grade']; 
    $chk="";  
    foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }

//upload image 
$target_dir = "file/";
 $target_file = $target_dir .basename($_FILES["identityDoc"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



if ($_FILES["identityDoc"]["size"] > 500000000) {
    
  
 

    $uploadOk = 0;
    
}

if($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {

   

    $uploadOk =0;
}

if ($uploadOk == 0) {
    
  
   

} else {

    if (move_uploaded_file($_FILES["identityDoc"]["tmp_name"], $target_file)) {

       


    } else {

       
    }
}
   

        
$studentNumber =  getNumber(); 

$password = getPassword(5);

$passwordHash = $md5 = md5($password); 



//INSERT TO STUDENTS TABLE 

    $sql = 'INSERT INTO `students`
      ( 
      `studentName`,
      `studentAKA`,  
      `studentDOB`, 
      `studentCountry`, 
      `gender`, 
      `studentEmail`,
      `studentPassword`, 
      `studentPhone`,  
      `studentHistory`, 
      `studentAddress`,
      `studentLang`,
      `studentNeeds`,
      `studentDoc`,
      `activeStatus`
      ) 

    VALUES (
            "'.$pupilfullname.'",
            "'.$_POST["pupilaka"].'",
            "'.$_POST["pupildateofbirth"].'",
            "'.$_POST["nationality"].'",
            "'.$_POST["pupilgender"].'",
            "'.$_POST["parentemail"].'",
            "'.$passwordHash.'",
            "'.$_POST["parentphone"].'",
            "'.$_POST["eduHistory"].'",
            "'.$address.'",
            "'.$_POST["lang"].'",
            "'.$chk.'",
            "'.basename($_FILES["identityDoc"]["name"]).'",
            "0"
            )';


  $last_id = "";
 
         if ($conn->query($sql) === TRUE){

         $last_id = $conn->insert_id;

         $sql1 = 'INSERT INTO `parentInfo`
                              (
                              `studentID`,
                              `parentFullName`, 
                              `parent2fullName`, 
                              `parent2email`, 
                              `parent2phone`, 
                              `otherChild`, 
                              `reasonLeaving`, 
                              `research`, 
                              `further`, 
                              `enrolment`,
                              `tcs`,
                              `data`,
                              `communication`
                              

                              ) VALUES 
                              (
                              "'.$last_id.'",
                              "'.$parentfullname.'",
                              "'.$parent2fullname.'",
                              "'.$_POST['parent2email'].'",
                              "'.$_POST['parent2phone'].'",
                              "'.$_POST['otherNames'].'",
                              "'.$_POST['reasonLeaving'].'",
                              "'.$_POST['research'].'",
                              "'.$_POST['further'].'",
                              "'.$_POST['enr'].'",
                              "'.$_POST['tcs'].'",
                              "'.$_POST['store'].'",
                              "'.$_POST['communication'].'"
                              
                              )';


        if ($conn->query($sql1) === TRUE) {

              $to = $_POST['parentemail'];
              $subject = "Account Registration";
              $txt = "Hello ".$parentFullName."!
              \nYour registration on Sagan Academy was successful. 
              \nHere are your login credentials:
              \nUsername: ".$_POST['parentemail']." 
              \nPassword: ".$password."
              \nYour account will be activated within 48 hours to allow the allocation of your student/participant number.
              \n Follow the link below to go to our payment page where you can make your payment.
                https://sagan.columnaeducation/payment.php?email=".$_POST['parentemail']."&course=".$_POST['course']."
              ";
              $headers = "From: registration@columnaeducation.com";

              mail($to,$subject,$txt,$headers);


           
   $sql ="SELECT * FROM students WHERE studentEmail='".$_POST['parentemail']."' AND studentPhone ='".$_POST['parentphone']."'";
    $query=  mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);


                 
   
    $sql = "INSERT INTO assignedCourses(courseID,studentID) values('".$_POST['course']."','".$row['studentID']."')";
    $res = mysqli_query($conn,$sql);

    $sql1 = "SELECT *  FROM modules where moduleCourseID='".$_POST['course']."'";
    $get = mysqli_query($conn,$sql1);
    $test = mysqli_num_rows($get);

    while($row2 = mysqli_fetch_array($get)){

        $sql2 = "INSERT INTO moduleAssign(moduleID,courseID,moduleType,studentID) 
        values('".$row2['moduleID']."','".$row2['moduleCourseID']."','".$row2['moduleType']."','".$row['studentID']."')";
         $insert = mysqli_query($conn,$sql2);



    }
 

        } 

        } 

        $conn->close();   




  function getNumber() { 
          $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          $randomString = ''; 
        
          for ($i = 0; $i < 6; $i++) { 
              $index = rand(0, strlen($characters) - 1); 
              $randomString .= $characters[$index]; 
          } 
        
          return $randomString; 
      }

   function getPassword($par){ 
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          $randomString = ''; 
        
          for ($i = 0; $i < 10; $i++) { 
              $index = rand(0, strlen($characters) - 1); 
              $randomString .= $characters[$index]; 
          } 
        
          return $randomString; 
      } 




 
?>