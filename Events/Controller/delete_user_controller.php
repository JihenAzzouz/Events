<?php

if (!isset($_SESSION)){
    session_start();
}

require_once  "../Model/users.php";
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $user=new users();
    $user->deleteUser($id);

}