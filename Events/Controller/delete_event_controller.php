<?php

if (!isset($_SESSION)){
    session_start();
}
require_once  "../Model/events.php";
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $event=new events();
    $event->deleteEvent($id);
    // echo $id;

     header('location:../View/manage_events.php');
}