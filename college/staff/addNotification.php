<?php
/**
 * FILE addNotification.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 5/27/2021 - 11:28 AM
 */
session_start();
include '../action.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../HTMLPurifier/HTMLPurifier.auto.php';

    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.ForbiddenElements', array('script','applet'));
    $purifier = new HTMLPurifier($config);

    $message = addslashes($purifier->purify($_POST['formsummernote']));
    $title = addslashes(secure($_POST['title']));

    $sql = "INSERT into notification(title, notification, adminID, viewedBy) VALUES ('{$title}', '{$message}', '{$_SESSION['adminID']}', 0)";

    header('Content-Type: application/json');
    if (mysqli_query($conn, $sql) === true) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    header('location: notification.php');
}
