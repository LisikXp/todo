<?php
require_once  $_SERVER['DOCUMENT_ROOT']. "/application/models/functions.php";

$task = new Task();
$user = new User();
$event = new Event();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['ajax_date'])) {
        $date = $_POST['date'];
        $fulldate = $_POST['fulldate'];
        $task->get_list($date);
    }

    if (isset($_POST['add_user'])) {
        $name = $_POST['name'];
        $user->set_user($name);
    }
    if (isset($_POST['update_user'])) {
     $user->get_user_list();
 }

 if (isset($_POST['add_event'])) {
    $user = $_POST['user'];
    $newevent = $_POST['event'];
    $newdate = $_POST['newdate'];
    $fulldate = $_POST['fulldate'];
    $event->set_event($newdate, $fulldate, $user, $newevent);
}

if (isset($_POST['open-popup'])) {
   $event->get_popup();
}

if (isset($_POST['ajax_remove'])) {
   $event->delete_event($_POST['id']);
}

if (isset($_POST['ajax_done'])) {
   $event->edit_event($_POST['id'], $_POST['done']);
}

if (isset($_POST['ajax_remove_task'])) {
   $task->delete_task($_POST['ndate'], $_POST['nuser']);
}
}
?>