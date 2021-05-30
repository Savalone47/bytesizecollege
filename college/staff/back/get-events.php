<?php
/**
 * FILE get-events.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 5/28/2021 - 1:06 PM
 */

include "../../action.php";

// Require our Event class and datetime utilities
require 'utils.php';

// Short-circuit if the client did not give us a date range.
if (!isset($_GET['start']) || !isset($_GET['end'])) {
    die("Please provide a date range.");
}


// Parse the start/end parameters.
// These are assumed to be ISO8601 strings with no time nor timeZone, like "2013-12-29".
// Since no timeZone will be present, they will parsed as UTC.
$range_start = new DateTime();
$range_end = new DateTime();
try {
    $range_start = parseDateTime($_GET['start']);
    $range_end = parseDateTime($_GET['end']);
} catch (Exception $e) {
}

// Parse the timeZone parameter if it is present.
$time_zone = null;
if (isset($_GET['timeZone'])) {
    $time_zone = new DateTimeZone($_GET['timeZone']);
}

// Read and parse our events JSON file into an array of event data arrays.
$sql = "SELECT * FROM events ORDER BY eventTimestamp DESC";
$req = mysqli_query($conn, $sql);
$input_arrays = [];

while ($json = mysqli_fetch_all($req, MYSQLI_ASSOC)) {
    $input_arrays = $json;
}

// Accumulate an output array of event data arrays.
$output_arrays = array();
foreach ($input_arrays as $array) {
    // Convert the input array into a useful Event object
    try {
        $array['start'] = $array['eventDate'].'T'.$array['eventstatTime'].'-05:00';
        $array['end'] = $array['eventDate'].'T'.$array['eventendTime'].'-05:00';
        $array['title'] = $array['eventTitle'];
        $event = new Event($array, $time_zone);
        // If the event is in-bounds, add it to the output
        if ($event->isWithinDayRange($range_start, $range_end)) {
            $output_arrays[] = $event->toArray();
        }
    } catch (Exception $e) {
    }
}

// Send JSON to the client.
header('Content-Type: application/json');
echo json_encode($output_arrays);
