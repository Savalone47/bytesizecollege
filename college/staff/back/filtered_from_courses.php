<?php
/**
 * FILE filtered_from_courses.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 6/2/2021 - 12:54 PM
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



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('../../SSP.php');
include_once '../../util/connect_db.php';

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
