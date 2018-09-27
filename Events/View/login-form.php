<?php

if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['role'] == true){
    echo "admin you should type your password";
} else {
?>
<html>
<head>
    <title>Go My Code events</title>
    <link href="../web/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="../web/bootstrap/css/style.css" rel="stylesheet">
</head>

<body class="bg">
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-2 text">
                    <h1> This is really the end !</h1>
                    <div class="description">
                        <p>
                            the prossus is annoing huh? just log in dude
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Welcome</h3>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">

                        <form action="../Controller/login-controller.php">
                            <div class="form-group">
                                <label class="sr-only">Email :</label>
                                <input type="text" name="email" placeholder="email..."
                                       class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" value="1">Remember Me
                            </div>
                            <button type="submit" class="btn btn-primary">login</button>
                        </form>
                    </div>
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo $_SESSION['id'];
                    }
                    }
                    ?>
</body>
</html>
