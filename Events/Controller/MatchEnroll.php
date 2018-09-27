<?php

if (!isset($_SESSION)){
    session_start();
}
require_once "../Model/users.php";
require_once "show-pending-enrollements.php";
require_once "show-users.php";
require_once "show_events.php";
$enrUsers=array();
$enrEvents=array();
    for ($i=0;$i<count($PendingEnroll);$i++){
        $user=new users();
       $enrUsers[$i]= $user->matchEnrollementsForUsers($PendingEnroll[$i]['userID']);

    }
    for ($i=0;$i<count($PendingEnroll);$i++){
        $event=new events();
        $enrEvents[$i]= $event->matchEnrollementsForevents($PendingEnroll[$i]['eventID']);


    };

