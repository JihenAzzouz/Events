<?php

if (!isset($_SESSION)){
    session_start();
}
class events
{
    private $Ename="";
    private $Sdate="";
    private $Edate="";
    private $Location="";
    private $Openings=0;
    private $Subscriptions=0;

    /**
     * @param $Ename
     * @param $Sdate
     * @param $Edate
     * @param $Openings
     * @param $Subscriptions
     */
    public function addEvent($Ename, $Sdate, $Edate,$Location, $Openings){
        require_once "Connection.php";
        $this->Ename=$Ename;
        $this->Sdate=$Sdate;
        $this->Edate=$Edate;
        $this->Location=$Location;
        $this->Openings=$Openings;

        $AddEventquery="INSERT INTO event (Event_name,start_date,end_date,location,openings,subscription) VALUES ('$this->Ename','$this->Sdate','$this->Edate','$this->Location','$this->Openings','0');";
        Connection::getInstance()->query($AddEventquery);
    }


    public function showEvents(){
        require_once "Connection.php";
        $query="SELECT * FROM event";
        $result=Connection::getInstance()->query($query);
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function deleteEvent($id){
        require_once "Connection.php";
        $query="DELETE FROM event WHERE ID='$id'";
        Connection::getInstance()->query($query);
    }


    public function matchEnrollementsForEvents($id){
        require_once "Subscription.php";
        $enroll=new Subscription();
        $result=$enroll->showPendingEnrollement();
        require_once "Connection.php";
        $query="SELECT Event_name FROM event where ID='$id'";

        $result=Connection::getInstance()->query($query);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        return $row;

    }


    public function getEventID($eventName){
        require_once "Connection.php";
        $query="SELECT ID FROM event WHERE Event_name='$eventName';";

        $result=Connection::getInstance()->query($query);

        $row=$result->fetch(PDO::FETCH_ASSOC);

        $id=$row['ID'];
        return  $id;
    }

    public function InsertSubscription($id){
        require_once "Connection.php";
        require_once "Subscription.php";
        $enroll=new Subscription();
        $subs=$enroll->getEventEnrollements($id);
        $query="UPDATE  event SET subscription='$subs' WHERE ID='$id';";
        Connection::getInstance()->query($query);
    }

}