<?php

if (!isset($_SESSION)){
    session_start();
}
require_once "../Model/Subscription.php";
require_once "../Model/events.php";
$event=new events();
$uid=$_SESSION['id'];
$eid=$_GET['id'];
$enrollement=new Subscription();
$enrollement->enrollToEvent($uid,$eid);
header('location:../View/show-events.php');
