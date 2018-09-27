<?php

if (!isset($_SESSION)){
    session_start();
}

require_once "../Model/Subscription.php";
$enroll=new Subscription();
$PendingEnroll=$enroll->showPendingEnrollement();
