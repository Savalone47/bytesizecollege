<?php
include '../action.php';

    function generateRandomString($length) {
    $characters = '012345678982523';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }

            $sql = "SELECT * FROM students WHERE studentEmail = '".secure($_POST['email'])."'";
            $query = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            $row = mysqli_fetch_array($query);
           

                if($num==0){

                        $error = "Email doesnt exist";
                       echo'<script>window.location="login.php?error='.$error.'";</script>';

                }else{



               $name = $row['studentName'];
               $id = $row['studentID'];

            $otp = generateRandomString(6);


            $sql1 = 'UPDATE students SET otp = "'.$otp.'" WHERE studentID="'.secure($id).'" AND studentEmail="'.secure($_POST['email']).'" ';
            $query1 = mysqli_query($conn,$sql1);
                                  if($query1){
                           
                        $to = $_POST['email'];
                       $headers = 'From: <noreply@vinco.com>';
                        $subject = "Password reset";
                        $message = "Hello ".$name."!\nHere is your One Time Reset Pin: ".$otp."
           
            \nIf you did not request password reset please change your password for security purposes!!!";

                        mail($to,$subject,$message,$headers);
                         echo"<script>window.location='student_otp.php';</script>";

                    }

                }

            ?>