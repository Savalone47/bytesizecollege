<?php
include "../../action.php";

if (htmlentities($_POST['action']) == 'activateChapter') {

  if (htmlspecialchars($_POST['status']) == 1) {

    $query = "UPDATE topics SET status = '0' WHERE id = '".htmlentities($_POST['id'])."'";
  if (mysqli_query($conn,$query)) {
    echo "Chapter deactivated";
  }
      
    

  }else{
         $query = "UPDATE topics SET status = '1' WHERE id = '".htmlentities($_POST['id'])."'";
  if (mysqli_query($conn,$query)) {
    echo "Chapter activated";
  }
      
        
  }
  
}

?>