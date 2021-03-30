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

				$sql = 'INSERT INTO exam(moduleID,date,start,end, exam, marks,title) 
				VALUES (
				"'.$_POST['moduleID'].'",
				"'.$_POST['examDate'].'",
				"'.$_POST['examTime'].'",
				"'.$_POST['endTime'].'",
				"'.basename(secure($_FILES["file"]["name"])).'",
				"'.$_POST['marks'].'",
				"'.$_POST['examName'].'"
			)';


			mysqli_query($conn,$sql);

			//send notification to students
			$subject = "New Exam Created!";
			$messageBody = "Good Day\nNew exam has been created!";

			sendNotification($_POST['moduleID'],$messageBody,$subject,$conn);
			


				
		} 

	}


}
