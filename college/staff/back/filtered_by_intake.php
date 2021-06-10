<?php
/**
 * FILE filtered_by_intake.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 6/2/2021 - 11:08 PM
 */

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'students';

// Table's primary key
$primaryKey = 'studentId';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db' => 'studentTimestamp',
        'dt' => 6,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array('db' => 'studentName', 'dt' => 1),
    array('db' => 'studentLastName', 'dt' => 2),
    array('db' => 'studentEmail', 'dt' => 3),
    array('db' => 'studentNumber', 'dt' => 4),
    array('db' => 'gender', 'dt' => 5),
);


include_once '../../util/connect_db.php';
//.studentID AND JOIN courses on courses.coursesId = courses.coursesID = assignedc
$join = "JOIN assignedcourses ON assignedcourses.studentID = students.studentID JOIN courses ON courses.coursesID = assignedcourses.courseID JOIN department ON department.departmentID = courses.courseDepartment";

$department = (isset($_GET['department']) && $_GET['department'] !== 'all')? "AND department.departmentName = '{$_GET['department']}'" : "";
$course = (isset($_GET['course']) && $_GET['course'] !== 'all') ? " AND courses.courseCode = '{$_GET['course']}' " : '';
$intake = (isset($_GET['intake']) && $_GET['intake'] !== 'all') ? " AND courses.courseIntake = '{$_GET['intake']}' " : '';
$year = (isset($_GET['year']) && $_GET['year'] !== 'all') ? " AND students.year = '{$_GET['year']}' " : '';

$where = "TRUE " . $department . $course . $intake. $year;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('../../SSP.php');

echo json_encode(
    SSP::simplemorejoin($_GET, $sql_details, $table, $primaryKey, $columns, $join, $where)
);
