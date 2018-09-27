<?php


if (!isset($_SESSION)){
    session_start();
}
require_once "../Model/users.php";
$user=new users();
$userRow=$user->showUsers();
