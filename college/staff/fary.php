<?php
/**
 * FILE fary.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 6/10/2021 - 11:29 PM
 */

include "../util/connect_db.php";

set_time_limit(300);


$sql = "SELECT s.studentID, c.courseDepartment FROM students s, courses c, assignedcourses a WHERE a.studentID = s.studentID AND a.courseID = c.coursesID";
$result = $mysqli->query($sql);

while ($student = $result->fetch_assoc()) {

    if (in_array($student['courseDepartment'], array('33', '34', '35'))) {
        $year = 2020;
    } else {
        $year = 2021;
    }
    $sql = "UPDATE students SET year = {$year} WHERE studentID = {$student['studentID']}";
    var_dump($mysqli->query($sql));
}

$sql3 = "UPDATE students SET year = 2020 WHERE year IS NULL";

var_dump($mysqli->query($sql3) ? "Tokoss..." : "Pas du tout");
