<?php
/**
 * FILE students_numbers.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 5/5/2021 - 11:41 AM
 */
include "../util/connect_db.php";

$sql = "SELECT * FROM students";
$result = $mysqli->query($sql);

echo "<strong>started</strong>";

while ($student = $result->fetch_assoc()) {
    $student['studentNumber'] = str_replace(' ', '', $student['studentNumber']);
    $strlen = mb_strlen($student['studentNumber']);
    $nb = ($strlen <= 15) ?  15 - $strlen : 0;
    $studentNumber = $student['studentNumber'] . (($nb > 0) ? rand_string($nb) : "") ;
    $id = $student['studentID'];
    $sql = "UPDATE students SET studentNumber = '{$studentNumber}' WHERE studentID = {$id}";

    var_dump($mysqli->query($sql));
}

echo "<h1>Finish</h1>";
