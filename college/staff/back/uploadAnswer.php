<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
session_start();
include "../../action.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	//upload file

	if(secure($_FILES["file"]["name"])){

//if there is an image 
		$target_dir = "../exams/";
		$target_file = $target_dir .basename(secure($_FILES["file"]["name"]));
		$uploadOk = 1;

		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Allow certain file formats


			//no error upload

			if(move_uploaded_file(secure($_FILES["file"]["tmp_name"]), $target_file)) {


				//end 


		

				//$date = strtotime($date);

				$sql = 'INSERT INTO examAnswer(moduleID,answer,examName) 
				VALUES ("'.$_POST['moduleID'].'","'.$_FILES['file']['name'].'","'.$_POST['examName'].'")';
				
				mysqli_query($conn,$sql);

			


				//if file ccould not upload
		} 

	



	}


}
