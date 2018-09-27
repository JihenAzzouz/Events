<?php


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['role'])){
    echo "disconnect first bro";
} else {
?>

<html>
<head>
    <link href="../web/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../web/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../web/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="../web/bootstrap/css/style.css" rel="stylesheet">
    <title>Go My Code events</title>
</head>
<body class="bg">
<div class="top-content">

    <div class="inner-bg">
        <div class="container col-md-offset-2">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-2 text">
                    <h1> Hello Boy !</h1>
                    <div class="description">
                        <p>
                            Sorry we have an this intermediaire option to know that your know if your a lovely user or
                            the evil master of this kingdom
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to our site</h3>
                            <p>You are :</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form action="../Controller/userType.php" method="post">
                            <div class="form-group">
                                <select name="type" onchange="showDiv(this)" class="form-control">
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                            <div id="hidden_div" style="display: none;" class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="pwd" placeholder="Password..." class="form-control">
                            </div>

                            <button type="submit" class="btn-primary btn">Go !</button>
                        </form>
                    </div>
                    <script src="../web/bootstrap/js/show.js"></script>
                    <?php
                    }
                    ?>
</body>
</html>