<?php
session_start();

// List of events
$json = array();


// Query that retrieves events
$request = "SELECT title, CONCAT(date,' ',start) as start, CONCAT(date,' ',end) as end FROM exam inner join moduleAssign on `moduleAssign`.`moduleID` = exam.moduleID
where moduleAssign.studentID = '".$_SESSION['adminID']."' ";

// connection to the database
try {
    include "../staff/calendar/database.php";
} catch (Exception $e) {
    exit('Unable to connect to database.');
}
// Execute the query
$result = $bdd->query($request) or die(print_r($bdd->errorInfo()));

// sending the encoded result to success page
echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));

?>