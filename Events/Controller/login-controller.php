<?php

if (!isset($_SESSION)){
    session_start();
}
require_once "../Model/users.php";

if (isset($_GET['email'])){
    if (strlen($_GET['email'])){
        $user=new users();
        if ($user->exists($_GET['email'])){

            header('location:../View/show-events.php');
        }
        else{

            $_SESSION['not subscribed']="you're not subscribed";
            header('location:../View/subscription_form.php');
        }
    }
}
if ($_POST['remember']) {
    $remember_token = str_random(60);
    $user=new users();
    $email=$_GET['email'];
    $tab=$user->showUsers();
    $pdo->prepare("UPDATE  user SET remember_token=? WHERE email='$email'")->execute([$remember_token]);
    setcookie('remember', $user[6]. '==' . $remember_token, time() + 60 * 60 * 24 * 7);

}