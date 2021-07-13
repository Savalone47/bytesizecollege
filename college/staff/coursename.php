<?php
/**
 * FILE coursename.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 6/28/2021 - 3:48 PM
 */

include "../util/connect_db.php";

$sql = "SELECT courseCode, courseName FROM courses GROUP BY courseCode";
$courses = $mysqli->query($sql);

$courses_list = [];
while ($course = $courses->fetch_assoc()) {
    $courses_list[] = $course;
    $sql2 = "UPDATE courses SET courseName = '{$course['courseName']}' WHERE courses.courseCode = '{$course['courseCode']}'";
    var_dump($mysqli->query($sql2));
}

var_dump(count($courses_list));
