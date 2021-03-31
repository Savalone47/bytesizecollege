<?php
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){
    

    if(secure($_FILES["img"]["name"])){

//if there is an image 
        $target_dir = "../assignment/";
        $target_file = $target_dir .basename(secure($_FILES["img"]["name"]));
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



 
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {


            if (move_uploaded_file(secure($_FILES["img"]["tmp_name"]), $target_file)) {

// delete previes file

    //get file path

                $sql = 'SELECT * FROM assignment WHERE id ="'.secure($_POST['id']).'"';

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
  // output data of each row
                $row = mysqli_fetch_assoc($result);


                    $Path = "../assignment/".$row['assignment'];
                    if (file_exists($Path)){
                        unlink($Path);   
                    } 

                }
//end delete 


                $sql = 'UPDATE assignment 
                SET assignment= "'.basename(secure($_FILES["img"]["name"])).'",
                assignmentNo= "'.secure($_POST['assignmentNo']).'",
                marks= "'.secure($_POST['marks']).'",
                dueDate= "'.secure($_POST['date']).'" ,
                facilitatorID= "'.secure($_SESSION['adminID']).'"
                where  id = "'.secure($_POST['id']).'"'; 


                $res = mysqli_query($conn,$sql);


                if(!$res){

                    $error= "Sorry, there was an error uploading your file.";
                    header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');

                }else{

                    $error= "Assignment successful Edited";
                    header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');
                }


            } else {

                $error= "Sorry, there was an error uploading your file.";
                header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');

            }
        }



    }else{

//if no image 

     $sql = 'UPDATE assignment 
     SET 
     assignmentNo= "'.secure($_POST['assignmentNo']).'",
     marks= "'.secure($_POST['marks']).'",
     dueDate= "'.secure($_POST['date']).'",
     facilitatorID= "'.secure($_SESSION['adminID']).'"
     where  id = "'.secure($_POST['id']).'"'; 


     $res = mysqli_query($conn,$sql);

     if(!$res){

        $error= "Sorry, there was an error uploading your file.";
        header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');

    }else{

        $error= "Assignment successful added";
        header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');
    }



}

// end of Update


}else{

//if user not logged in

    echo "<script> alert('Error! Please Log in');
    window.location='logout.php';
    </script>";
}

?>