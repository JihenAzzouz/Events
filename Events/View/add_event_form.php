<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['role'] == false){
    echo "go back you're not allowed here";
} else {
?>

<html>
<head>

    <title>Go my code Events</title>

    <link href="../web/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../web/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../web/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="../web/bootstrap/css/style.css" rel="stylesheet">
</head>
<body>

<div class="form container ">


    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                  <h1>Add an event</h1>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box ">
                        <div class="form-top">

                        </div>

                        <div class="form-bottom">
                            <form action="../Controller/add_event_controller.php" method="post">
                                <div class="form-group">
                                    <label for="">Event name</label>
                                    <input type="text" name="Ename" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Starting date</label>
                                    <input type="datetime-local" name="Sdate" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Ending date</label>
                                    <input type="datetime-local" name="Edate" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Event Location</label>
                                    <input type="text" name="Location" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Openings</label>
                                    <input type="number" name="Openings" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-primary btn">ADD</button>
                                </div>
                            </form>


                            <?php
                            if (isset($_SESSION['not subscribed'])) {
                                ?>
                                <div>
                                    <?= $_SESSION['not subscribed'] ?>
                                </div>
                                <?php
                            }
                            if (isset($_SESSION['messages'])) { ?>
                            <div>
                                <ul>
                                    <?php for ($i = 0; $i < count($_SESSION['messages']); $i++) { ?>

                                        <li class="errors">  <?php echo $_SESSION['messages'][$i] ?>  </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>


                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>