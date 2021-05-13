<?php

try {
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'bytesxayep_db1');
} catch (Exception $e) {
    print "system failed" . $e->getMessage();
}

