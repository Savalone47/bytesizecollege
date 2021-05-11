<?php
/**
 * FILE intake.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 5/7/2021 - 12:30 AM
 */

echo "Veuillez patienter s'il vous plait...";
set_time_limit(300);

include "college/util/connect_db.php";

$sql = "SELECT * FROM courses GROUP BY courseCode";
$courses = $mysqli->query($sql);

while ($course = $courses->fetch_assoc()) {
    extract($course);
//var_dump(str_replace(',,', ',NULL,', implode(',',$course)));die;
    $courseIntake = 'Jun';
    for ($i = 24; $i <= 25; $i++) {
        $courseDepartment = $i;
        $delivery = ['Fulltime', 'Parttime', 'Distance'];
        for ($j = 0; $j < 3; $j++) {
            $courseDelivery = $delivery[$j];
            $sql2 = "INSERT INTO courses (courseName, courseType, courseDepartment, curriculum, courseManager, courseCode, courseDuration, courseTimeline, courseLevel, courseCredits, coursePrice, courseOverview, courseIntake, courseDelivery, courseStartDate) VALUES ('$courseName', '$courseType', '$courseDepartment', '$curriculum', '$courseManager', '$courseCode', '$courseDuration', '$courseTimeline', '$courseLevel', '$courseCredits', '$coursePrice', '$courseOverview', '$courseIntake', '$courseDelivery', '$courseStartDate')";
            $results = $mysqli->query($sql2);
            var_dump($results);
        }
    }
}
echo "finish...";
