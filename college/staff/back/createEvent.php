<?php

session_start();
//header('Location: ' . $_SERVER['HTTP_REFERER']);
include "../../action.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $category = $_POST['categorySelect'];
    $starts_at = $_POST['starts_at'].":00";
    $ends_at = $_POST['ends_at'].":00";
    $details = $_POST['eventDetails'];

    $sql = "INSERT INTO events_table(title, className, start, end, details) VALUES ('{$title}', '{$category}', '{$starts_at}', '{$ends_at}', '{$details}')";
    
    if (mysqli_query($conn, $sql)) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
    }

    echo json_encode($data);
}
