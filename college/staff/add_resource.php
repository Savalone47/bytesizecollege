<?php 
header('location:chapter.php?id='.$_POST['id'].'&chapter='.$_POST['chapter'].'');
include "../action.php";




$target_dir = "../img/";

 $countfiles = count($_FILES['img']['name']);

 for($i = 0; $i < $countfiles; $i++){

$target_file = $target_dir .basename($_FILES["img"]["name"][$i]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


//Check if file is uploaded
 
  if(move_uploaded_file($_FILES["img"]["tmp_name"][$i], $target_file)){
 
        
 $sql1 = "INSERT INTO moduleMaterial(moduleName,topicName,moduleFile) values('".$_POST['id']."','".$_POST['topicID']."', '".$_FILES['img']['name'][$i]."')";
 $query1 = mysqli_query($conn,$sql1);

   }

}


?>