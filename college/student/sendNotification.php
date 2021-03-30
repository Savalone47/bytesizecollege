<?php
include "../action.php";

if (isset($_POST['val'])) {
	mysqli_query($conn,"INSERT INTO `viewedNotification`(`userID`, `userType`, `notificationID`) 
						VALUES ('".$_SESSION['adminID']."','Student', '".$_POST['val']."')"
}




?>