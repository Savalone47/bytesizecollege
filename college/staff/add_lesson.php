<?php 
header('location:lesson.php?id='.$_POST['id'].'&chapter='.$_POST['chapter'].'');
include "../action.php";

$comment = addslashes($_POST['comment']);
$name = addslashes($_POST['lesson']);


$sql = 'INSERT INTO learning(learningName,learningTopic,moduleID,comment) 
values("'.$name.'", "'.$_POST['chapter'].'","'.$_POST['id'].'","'.$comment.'")';
$query = mysqli_query($conn,$sql);




$last_id = $conn->insert_id;




$target_dir = "resources/";

 $countfiles = count($_FILES['img']['name']);

 for($i = 0; $i < $countfiles; $i++){

$target_file = $target_dir .basename($_FILES["img"]["name"][$i]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


//Check if file is uploaded
 
  if(move_uploaded_file($_FILES["img"]["tmp_name"][$i], $target_file)){
 
        
 $sql1 = 'INSERT INTO learningMaterial(file,learningID) values("'.$_FILES['img']['name'][$i].'","'.$last_id.'")';
 $query1 = mysqli_query($conn,$sql1);

   }

}


?>