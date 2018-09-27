<?php

if (!isset($_SESSION)){
    session_start();
}

if (isset($_GET['email'])){
    if (isset($_GET['Eventname'])){
        $email=htmlentities($_GET['email']);
        $eventname=$_GET['Eventname'];
        require_once "../Model/Subscription.php";
        $enrollement=new Subscription();
        $enrollement->confirmEnrollement($email,$eventname);
        $event=new events();
        $eid=$event->getEventID($eventname);
        $event->InsertSubscription($eid);

        require_once 'mail.php';
        header('location:../View/manage_enrollements.php');
    }
}