<?php

try {
    $conn = mysqli_connect('localhost','root','','bytesxayep_db1');
}catch (Exception $e){
    print "system failed" .$e->getMessage();
}


