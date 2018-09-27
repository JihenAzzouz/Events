<?php

$NoErrEName=false;
$NoErrSdate=false;
$NoErrEdate=false;
$NoErrLocation=false;
$NoErrOpenings=false;

if (!isset($messages))
    $messages=[];

if (!isset($_SESSION)){
    session_start();
}


if (isset($_POST['Ename'])){
    if (strlen($_POST['Ename'])) {
         $NoErrEName=true;$EventName=$_POST['Ename'];
    } else{$messages['ename']="Please verify your input (Event Name)";}
}


if (isset($_POST['Sdate'])){
    if (strlen($_POST['Sdate'])){
        if (strtotime($_POST['Sdate'])<time()){
            $messages['sdate']="please write a valid start date (in the future)";

        }
        else{$NoErrSdate=true;$StartDate=$_POST['Sdate'];}
    }
    else{ $messages['sdate']="please enter a start date";}
}


if (isset($_POST['Edate'])){
    if (strlen($_POST['Edate'])){
        if (strtotime($_POST['Edate'])<strtotime($_POST['Sdate'])){
            $messages['edate']="please write a valid end date (in the future)";
        }
        else{$NoErrEdate=true;$EndDate=$_POST['Edate'];}
    }
    else{ $messages['edate']="please enter a end date";}
}

if (isset($_POST['Location'])){
    if (strlen($_POST['Location'])) {
        $NoErrLocation=true;$EventLocation=$_POST['Location'];
    } else{$messages['location']="Please verify your input (Event Location)";}
}


if (isset($_POST['Openings'])){
    if ($_POST['Openings']<2){
        //echo "please enter a valid input (openings)";
        $messages['openings']="please enter a valid input (openings)";
    }
    else{
        $NoErrOpenings=true;$Openings=$_POST['Openings'];
    }
}
if ($NoErrLocation&&$NoErrOpenings&&$NoErrSdate&&$NoErrEName&&$NoErrEdate){
    require_once "../Model/events.php";
    $event=new events();
    $event->addEvent($EventName,$StartDate,$EndDate,$EventLocation,$Openings);
    echo "added: ";
    echo $Openings." ".$EndDate." ".$StartDate." ".$EventLocation." ".$EventName;
}


header('location:../View/manage_events.php');