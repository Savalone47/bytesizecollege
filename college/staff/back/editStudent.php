<?php 
header('Location:'.$_SERVER['HTTP_REFERER']);
include "../../action.php";

$sql = "UPDATE `students` SET 
            `studentName`=  '".$_POST['name']."',
            `studentLastName`=  '".$_POST['lastName']."',
            `studentDOB`=  '".$_POST['dateofbirth']."',
            `studentCountry`=  '".$_POST['country']."',
            `studentNumber`=  '".$_POST['phone']."',
        
            `gender`=  '".$_POST['gender']."',
            
            `studentPhone`= '".$_POST['phone']."'
            
            WHERE studentID = '".$_POST['studentID']."'";

mysqli_query($conn, $sql);