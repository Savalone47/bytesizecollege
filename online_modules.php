<?php
/**
 * FILE online_modules.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 5/11/2021 - 5:53 PM
 */

echo "Veuillez patienter s'il vous plait...";
set_time_limit(300);

include "college/util/connect_db.php";

$sql = "SELECT * FROM courses GROUP BY courseCode";
$courses = $mysqli->query($sql);

while ($course = $courses->fetch_assoc()) {
    extract($course);
//var_dump(str_replace(',,', ',NULL,', implode(',',$course)));die;
    $courseIntake = ['Jan', 'Mar', 'Jun', 'Sep'];
//    $delivery = ['Fulltime', 'Parttime', 'Distance'];
    $courseDelivery = 'Distance';
    $courseDepartment = 32;
    for ($i = 0; $i < count($courseIntake); $i++) {
//        for ($j = 0; $j < count($delivery); $j++) {
        $sql2 = "INSERT INTO courses (courseName, courseType, courseDepartment, curriculum, courseManager, courseCode, courseDuration, courseTimeline, courseLevel, courseCredits, coursePrice, courseOverview, courseIntake, courseDelivery, courseStartDate) VALUES ('$courseName', '$courseType', '$courseDepartment', '$curriculum', '$courseManager', '$courseCode', '$courseDuration', '$courseTimeline', '$courseLevel', '$courseCredits', '$coursePrice', '$courseOverview', '$courseIntake', '$courseDelivery', '$courseStartDate')";
        $results = $mysqli->query($sql2);
        var_dump($results);
//        }
    }
}
echo "finish...";
