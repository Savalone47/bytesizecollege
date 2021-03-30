<?php
session_start();
include "../../action.php";


$uip=$_SERVER['REMOTE_ADDR'];
$email = $conn->real_escape_string(secure($_POST['username']));
$password = $conn->real_escape_string(secure($_POST['pass']));
$pass = md5($password);

  if($email !=''){
        if($password !=''){

        $sql = "SELECT * FROM students WHERE studentPassword='".$pass."' AND studentEmail='".$email."'";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                  echo mysqli_error($conn);
                }
                $queryResult = mysqli_num_rows($result);  
                if($queryResult > 0 ){
                  while ($row = mysqli_fetch_array($result)){
                    
                   $_SESSION['adminID'] = $row['studentID'];
                   $_SESSION['adminName'] = $row['studentName'];
                   $_SESSION['adminEmail'] = $row['studentEmail'];
                   $_SESSION['adminLevel'] = $row['student'];


                   //track login 
         mysqli_query($conn,"insert into userlog(userID,userType,userIP) values('".$row['studentID']."','student','$uip')");


                   //end tracking


							    
                         echo 200;
                         exit;
                    
                      
                  }
                }else{
                  echo 201;
                  exit;
                } 
        }else{
            echo 201;
            exit;
        }
  }else{
      echo 201;
      exit;
  }
  
  




?>
