<?php

if (!isset($_SESSION)) {
    session_start();
}


if (isset($_POST['type'])) {
    if ($_POST['type'] == "admin") {
        if (isset($_POST['pwd'])) {
            if ($_POST['pwd'] == "password") {
                $_SESSION['role'] = true;
                header('location:../View/admin_page.php');
            } else {
                echo "go back";
            }
        }
    } elseif ($_POST['type'] == "user") {
        $_SESSION['role'] = false;
        header('location:../View/subscription_form.php');
    }
}

