<?php 
header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../action.php";


$total = count($_FILES['img']['name']);
$target_dir = '../img/';




for($i = 0; $i < $total; $i++){

$target_file = $target_dir .basename($_FILES["img"]["name"][$i]);

move_uploaded_file($_FILES["img"]["tmp_name"][$i], $target_file);

$sql0 = "INSERT INTO learningMaterial(file,learningID) values('".$_FILES['img']['name'][$i]."','".$_POST['learningID']."')";
$query = mysqli_query($conn,$sql0);
if($query){
	echo "true";
}else{

	echo "false";
}

}




?>