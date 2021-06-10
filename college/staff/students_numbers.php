<?php
/**
 * FILE students_numbers.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 5/5/2021 - 11:41 AM
 */
include "../util/connect_db.php";

set_time_limit(300);

$sql = "SELECT s.studentID, c.courseCode, c.courseIntake, c.courseDepartment FROM students s, courses c, assignedcourses a WHERE a.studentID = s.studentID AND a.courseID = c.coursesID";
$result = $mysqli->query($sql);

$courses = [
    '1000' => 'COSB',
    '1001' => 'COSA',
    '1002' => 'OHSF',
    '1003' => 'ECED',
    '1004' => 'CIPS',
    '1005' => 'SECM',
    '1006' => 'CISM',
    '1008' => 'SOCW',
    '1009' => 'PUBH'
];

$departments = [
    '23' => 'GB',
    '24' => 'PY',
    '25' => 'LT',
    '32' => 'ON',
    '33' => 'GB',
    '34' => 'PY',
    '35' => 'LT'
];

$intakes = [
    'Jan' => '01',
    'Mar' => '03',
    'Jun' => '06',
    'Sep' => '09'
];

echo "<strong>started</strong>";

while ($student = $result->fetch_assoc()) {
    $course = $courses["{$student['courseCode']}"];
    $branch = $departments["{$student['courseDepartment']}"];
    $year = "021";

    if (in_array($student['courseDepartment'], array('33', '34', '35'))) {
        $year = '020';
    }

    $intake = $intakes["{$student['courseIntake']}"];
//    var_dump($studentNumber);die;

    $reqSql = "SELECT MAX(number)+1 as number FROM students JOIN assignedcourses a on students.studentID = a.studentID JOIN courses c on a.courseID = c.coursesID WHERE c.courseCode = {$student['courseCode']} AND c.courseDepartment = {$student['courseDepartment']}";
    $req = $mysqli->query($reqSql);
    $res = $req->fetch_assoc();
    $number = $res['number'] ?? 1;

    $studentNumber = sprintf("%s%s%s%s%03d", $course, $branch, $year, $intake, $number);
    $sql = "UPDATE students SET studentNumber = '{$studentNumber}', 
                    number = {$number} WHERE studentID = {$student['studentID']}";

    var_dump($mysqli->query($sql));
}

echo "<h1>Finish</h1>";
