<?php

if (!isset($_SESSION)){
    session_start();
}
require_once "../Model/events.php";
$event=new events();
$eventRow=$event->showEvents();
