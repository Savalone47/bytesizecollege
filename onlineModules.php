<?php

/**
 * FILE onlineModules.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 6/10/2021 - 2:09 PM
 */

set_time_limit(600);
include_once 'college/util/connect_db.php';

$onlines = [];
$sql4 = "SELECT courseCode, coursesID FROM courses WHERE courseDepartment = 32 ORDER BY courseCode DESC";
$req4 = $mysqli->query($sql4);
while ($online = $req4->fetch_assoc()) {
    $onlines[] = $online;
}

$sql = "SELECT courseCode, coursesID FROM courses WHERE courseDepartment = 23 GROUP BY courseCode";
$req = $mysqli->query($sql);
$courses = [];

while ($course = $req->fetch_assoc()) {
    $sql2 = "SELECT DISTINCT moduleCourseID, moduleName, moduleCode, moduleCredit, moduleName, moduleType, moduleCourseID, moduleLevel, moduleOverview, moduleCredit, moduleDuration, modulePeriod, modulePrerequisites, moduleEligible, modulePrice, moduleCode, moduleFile FROM modules WHERE moduleCourseID = {$course['coursesID']}";
    $req2 = $mysqli->query($sql2);
    $courses[$course['courseCode']] = $course;
    $courses[$course['courseCode']]['modules'] = [];

    while ($module = $req2->fetch_assoc()) {
        $courses[$course['courseCode']]['modules'][] = $module;
    }
}

foreach ($onlines as $online) {
//    var_dump($courses[$online['courseCode']]['modules']);die;
    foreach ($courses[$online['courseCode']]['modules'] as $modul){
        extract($modul);
        $sql5 = "INSERT INTO modules(moduleName, moduleType, moduleCourseID, moduleLevel, moduleOverview, moduleCredit, moduleDuration, modulePeriod, modulePrerequisites, moduleEligible, modulePrice, moduleCode, moduleFile) VALUES ('{$moduleName}', '{$moduleType}', '{$online['coursesID']}', '{$moduleLevel}', '{$moduleOverview}', '{$moduleCredit}', '{$moduleDuration}', '{$modulePeriod}', '{$modulePrerequisites}', '{$moduleEligible}', '{$modulePrice}', '{$moduleCode}', '{$moduleFile}')";
        var_dump($mysqli->query($sql5));
    }
}
