<?php

if (!isset($_SESSION)){
    session_start();
}
class Subscription
{
    public function enrollToEvent($uid,$eid){
        require_once "Connection.php";
        $query="INSERT INTO subscriptions (eventID,userID,confirmation) values ('$eid','$uid','0')";
        Connection::getInstance()->query($query);
    }

    public function showPendingEnrollement(){
        require_once "Connection.php";
        $query="SELECT eventID,userID FROM subscriptions where confirmation='0';";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }


    public function confirmEnrollement($email,$eventName){
        require_once "Connection.php";
        require_once "users.php";
        require_once "events.php";
        $user=new users();
        $event=new events();
        $eventID=$event->getEventID($eventName);
        $userID=$user->getUserID($email);

        $query="UPDATE subscriptions SET Confirmation = '1' WHERE eventID='$eventID' and userID='$userID';";
        Connection::getInstance()->query($query);

    }

    public function getEventEnrollements($id){
        require_once "Connection.php";
        $query="SELECT userID FROM subscriptions WHERE eventID='$id';";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        return count($row);
    }


    public function getEnrollementState($uid,$eid){
        require_once "Connection.php";
        $query="SELECT confirmation FROM subscriptions WHERE eventID='$eid',userID='$uid';";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        return $row['confirmation'];
    }


    public function getSubscribedUsers($id){
        require_once "Connection.php";
        $query="SELECT userID FROM subscriptions WHERE eventID='$id';";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}