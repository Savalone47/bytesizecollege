<?php
/**
 * FILE connect_db.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 5/5/2021 - 1:21 PM
 */

$mysqli = new mysqli("localhost", "root", "", "bytesxayep_db1");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

function rand_string($length): string
{
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars), 0, $length);
}
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db' => 'bytesxayep_db1',
    'host' => 'localhost'
);

