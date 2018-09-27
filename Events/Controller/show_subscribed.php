<?php

if (isset($_GET['id'])){
$id=$_GET['id'];

$subbedUsers=[];
require_once "../Model/Subscription.php";
require_once "../Model/users.php";
$enrollement= new Subscription();
$user =new users();
$userRow=$enrollement->getSubscribedUsers($id);
for ($i=0;$i<count($userRow);$i++){
    $userEmail=$user->matchEnrollementsForUsers($userRow[$i]['ID']);
    array_push($subbedUsers,$userEmail['email']);
}
//var_dump($subbedUsers);
require_once "../View/Subscribed_list.php";

}