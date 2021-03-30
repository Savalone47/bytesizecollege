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



        if (secure($_FILES["img"]["size"]) > 5000000) {
    //echo "Sorry, your file is too large.";
            $uploadOk = 0;

        }
// Allow certain file formats
        if($imageFileType != "docx" && $imageFileType != "pdf" && $imageFileType != "mp4") {
    //echo "Sorry, only docx, pdf files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {


            if (move_uploaded_file(secure($_FILES["img"]["tmp_name"]), $target_file)) {

// delete previes file

    //get file path

                $sql = "SELECT * FROM `assignment` WHERE id = '".secure($_POST['id'])."'";

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
                SET assignment ="'.basename(secure($_FILES["img"]["name"])).'",
                assignmentNo= "'.secure($_POST['assignmentNo']).'",
                marks= "'.secure($_POST['marks']).'",
                dueDate= "'.secure($_POST['date']).'" ,
                facilitatorID= "'.secure($_SESSION['adminID']).'"
                where  id = "'.secure($_POST['id']).'"'; 


                $res = mysqli_query($conn,$sql);


                if(!$res){

                    $error= "true";
                    header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');

                }else{

                    $error= "false";
                    header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');
                }


            } else {

                $error= "true";
                header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');

            }
        }



    }else{

//if no image 

     $sql = 'UPDATE assignment 
     SET 
     assignmentNo= "'.secure($_POST['assignmentNo']).'",
     marks= "'.secure($_POST['marks']).'",
     dueDate= "'.secure($_POST['date']).'" ,
     facilitatorID= "'.secure($_SESSION['adminID']).'"
     where  id = "'.secure($_POST['id']).'"'; 


     $res = mysqli_query($conn,$sql);

     if(!$res){

        $error= "true.";
        header('Location: ' . $_SERVER['HTTP_REFERER'].'&error='.$error.'');
       //header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');

    }else{

        $error= "false";
        header('Location: ' . $_SERVER['HTTP_REFERER'].'&error='.$error.'');
        //header('location:../my_assignment.php?id='.$_POST['moduleID'].'&error='.$error.'');
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