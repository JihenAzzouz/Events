<?php

if (!isset($_SESSION)){
    session_start();
}


$_SESSION['messages']=[];

//Testin the input Fname
if (isset($_POST['Fname'])){
    if (strlen($_POST['Fname'])) {
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['Fname'])){
            $_SESSION['messages'][0]="Only letters and white spaces allowed for first name";
        }
        else {$NoErrFName=true;$FirstName=$_POST['Fname'];}
    } else{$_SESSION['messages'][0]="Please verify your input for first name";}
}

if (isset($_POST['Lname'])){
    if (strlen($_POST['Lname'])) {
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['Lname'])){
            $_SESSION['messages'][1]="Only letters and white spaces allowed for last name";
        }
        else {$NoErrLName=true;$LastName=$_POST['Lname'];}
    } else{$_SESSION['messages'][1]="Please verify your input for last name";}
}


if (isset($_POST['email'])){
    if (strlen($_POST['email']))
    {   $PotEmail=$_POST['email'];
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['messages'][2]="Please enter a valid input for email";
        }
        else {$NoErrEmail=true;$Email=$_POST['email'];}
    } else{$_SESSION['messages'][2]="Please verify your input for email";}
}

if (isset($_POST['phone'])){
    if (strlen((string)$_POST['phone'])){
        if ($_POST['phone']<10000000||$_POST['phone']>100000000){
            $_SESSION['messages'][3]="Please write a valid phone number";
        }else
            $NoErrPhone=true;$Phone=$_POST['phone'];
    }
    else {
        $_SESSION['messages'][3]="Please verify your phone number";
    }
}
//session_destroy();
if (isset($NoErrPhone)&&isset($NoErrFName)&&isset($NoErrEmail)&&isset($NoErrLName)&&($NoErrFName&&$NoErrLName&&$NoErrEmail&&$NoErrPhone))
{
    require_once "../Model/users.php";
    $user=new users();
        if ($user->verifyUser("email",$Email)){
            //echo 'jexiste pas';
            $messages['subscribed']="this email already used";
            header('localtion:../View/subscription_form.php');
        }
        else {
            //echo 'jexiste';
            $user->addUser($FirstName,$LastName,$Email);
            header('location:../View/login-form.php');
        }
    }










?>





