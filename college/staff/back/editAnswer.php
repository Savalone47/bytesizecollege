<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){
  

    if(secure($_FILES["img"]["name"])){

//if there is an image 
        $target_dir = "../assignment/";
        $target_file = $target_dir .basename(secure($_FILES["img"]["name"]));
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));






 if (move_uploaded_file(secure($_FILES["img"]["tmp_name"]), $target_file)) {

// delete previes file

    //get file path

                $sql = 'SELECT * FROM examAnswer WHERE answerID="'.secure($_POST['id']).'"';

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
  // output data of each row
                $row = mysqli_fetch_assoc($result);


                    $Path = "../exams/".$row['answer'];
                    if (file_exists($Path)){
                        unlink($Path);   
                    } 

                }
//end delete 


                $sql = 'UPDATE examAnswer 
                SET answer = "'.basename(secure($_FILES["img"]["name"])).'",
                examName = "'.secure($_POST['examName']).'",
                where  answerID = "'.secure($_POST['id']).'"'; 


                $res = mysqli_query($conn,$sql);




            }
        



    }else{

//if no image 

$sql = 'UPDATE examAnswer 
SET examName = "'.secure($_POST['examName']).'"
where  answerID = "'.secure($_POST['id']).'"'; 


     $res = mysqli_query($conn,$sql);

  


}

// end of Update


}else{

//if user not logged in

    echo "<script> alert('Error! Please Log in');
    window.location='logout.php';
    </script>";
}

?>