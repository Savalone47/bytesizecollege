<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){


$target_dir = "../img/";


// Check if assignment has been submitted

$sql1 = "SELECT * FROM assignmentReply 
WHERE moduleID='".secure($_POST['moduleID'])."' AND studentID = '".secure($_SESSION['adminID'])."'
AND assignmentRef='".secure($_POST['ref'])."'";
$query = mysqli_query($conn,$sql1);
$num = mysqli_num_rows($query);

############################


if($num > 0){



header('location:my_assignment.php?id='.$_POST['moduleID'].'&error=false');



}else{


// INSERT  assignment on database
$sql ="INSERT INTO  assignmentReply(moduleID,assignmentID,assignmentRef,studentID,deleteStatus) 
values('".secure($_POST['moduleID'])."','".secure($_POST['id']). "','".secure($_POST['ref'])."','".secure($_SESSION['adminID'])."','0')";
$res = mysqli_query($conn,$sql);
$last_id = $conn->insert_id;



}


//send email notification for assignment submission
  
    //header('location:my_assignment.php?id='.$_POST['moduleID'].'&error=false');

     $sql1 = "SELECT * FROM modules where moduleID='".secure($_POST['moduleID'])."'";
    $query1=mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($query1);
    
    $sql = "SELECT * FROM students where studentID='".secure($_SESSION['adminID'])."'";
    $query=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    $from = 'From :'.$row['studentEmail'].'';
    $to = $row['studentEmail'];
    $message ="Dear ".$row['studentTitle']." ".$row['studentName']."
    \nYour ".$row1['moduleName']." Assignment ".$_POST['ref']." has been successfully received!

     ";
     $subject ="Submission of ".$row1['moduleName']." Assignment";
     mail($to,$subject,$message,$from);

     ##################################################


// upload assignment

$total = count($_FILES['img']['name']);

for($i = 0; $i < $total; $i++){
$target_file = $target_dir .secure(basename($_FILES["img"]["name"][$i]));

$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




// Allow certain file formats

// Check if $uploadOk is set to 0 by an error

move_uploaded_file(secure($_FILES["img"]["tmp_name"][$i]), $target_file);
  

if($num > 0){


// INSERT  assignment on database
$sql4 = "UPDATE assignmentFiles SET file='".$_FILES['img']['name'][$i]."' 
WHERE assignmentID = '".secure($_POST['id'])."' and studentID = '".secure($_SESSION['adminID'])."'  ";
$getQuery = mysqli_query($conn,$sql4);

}else{

        $sql3 = "INSERT INTO assignmentFiles(assignmentID,file,studentID) values('".$_POST['id']."','".$_FILES['img']['name'][$i]."','".$_SESSION['adminID']."')";
        $query3 = mysqli_query($conn,$sql3);


}



}

###################################################################










}else{

    echo "<script> alert('Error! Please Log in');
        window.location='student_logout.php';
        </script>";
}


?>