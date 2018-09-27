<?php

if (!isset($_SESSION)){
    session_start();
}
class users {

    private $Fname="";
    private $Lname="";
    private $Email="";


    public function addUser($Fname,$Lname,$Email){
        require_once "Connection.php";
        $this->Fname=$Fname;
        $this->Lname=$Lname;
        $this->Email=$Email;
        require_once 'functions.php';
        $token = str_random(60);
        $query="INSERT INTO user (first_name,last_name,email,role,token) VALUES ('$this->Fname','$this->Lname','$this->Email','user','$token');";
        Connection::getInstance()->query($query);
    }

    public function deleteUser($id){
        require_once "Connection.php";
        $query="DELETE FROM user WHERE ID='$id'";
        Connection::getInstance()->query($query);
    }


    public function showUsers(){
        require_once "Connection.php";
        $query="SELECT * FROM user WHERE role='user'";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function verifyUser($col,$val){
        require_once "Connection.php";
        $this->Email=$Email;
        $query="SELECT email FROM user where '$col'='$val';";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        if ($row){return true;}
        else { return false;}
    }

    public function matchEnrollementsForUsers($id){
        require_once "Subscription.php";
        $enroll=new Subscription();
        $result=$enroll->showPendingEnrollement();
        require_once "Connection.php";
        $query="SELECT email FROM user where ID='$id'";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        return $row;

    }


    public function exists($email){
        require_once "Connection.php";
        $query="SELECT * FROM user where email='$email';";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        if (!$row){

            return false;
        }
        else {$_SESSION['id']=$row['ID'];return true;}
    }


    public function getUserID($email){
        require_once "Connection.php";
        $query="SELECT ID FROM user WHERE email='$email';";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        $id=$row['ID'];
        return $id;
    }


}