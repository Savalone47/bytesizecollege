<?php
session_start();

// List of events
$json = array();


// Query that retrieves events
$request = "SELECT title, CONCAT(date,' ',start) as start, CONCAT(date,' ',end) as end FROM exam ";

// connection to the database
include "calendar/database.php";

// Execute the query
$result = $bdd->query($request) or die(print_r($bdd->errorInfo()));

// sending the encoded result to success page
echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
