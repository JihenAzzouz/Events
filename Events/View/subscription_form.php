<?php

if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['role'] == true){
    echo "you're an admin go back";
} else {
?>

<html>
<head>
    <link rel="stylesheet" href="../web/bootstrap/css/style.css">
    <link rel="stylesheet" href="../web/bootstrap/css/bootstrap.css">
    <title> Go my Code Subscribe</title>
</head>
<body class="bg">

<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1> Subscribe !</h1>
                    <div class="description">
                        <p>
                    when you subscribe you can join our events and the most important that you will be informed with our news :D
                        </p>
                        <p>
                            <a href="login-form.php" class="text-primary">
                               you already have an account ?
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3 class="text-primary">please enter correct infos </h3>

                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>

                    <div class="form-bottom">
                        <form action="../Controller/subscription_Controller.php" method="post">
                            <div class="form-group">
                                <label for="">First name</label>
                                <input type="text" name="Fname" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Last name</label>
                                <input type="text" name="Lname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control ">
                            </div>
                            <div class="form-group">
                                <label for="">Phone number</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>



               <!-- <?php
                //if (isset($_SESSION['not subscribed'])) {
                    ?>
                    <div>
                        <? //=$_SESSION['not subscribed'] ?>
                    </div>
                    <?php
                }
                //if (isset($_SESSION['messages'])) { ?>
                <div>
                    <ul>
                        <?php //for ($i = 0; $i < count($_SESSION['messages']); $i++) { ?>
                +            <li class="errors">  <?php //echo $_SESSION['messages'][$i] ?>  </li>
                        <?php // }
                        //} ?>
                    </ul>
                  </div>  -->
            </div>



        <?php// } ?>


</body>
</html>