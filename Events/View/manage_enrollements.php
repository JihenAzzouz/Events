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
    <title>Go My code events -Admin-</title>
    <link rel="stylesheet" href="../web/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../web/bootstrap/css/sb-admin.css">
    <link rel="stylesheet" href="../web/bootstrap/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Go My Code events</a>


    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
                   aria-describedby="basic-addon2" name="search_admin">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>


    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a href="../Controller/disconnect.php">disconnect</a>
        </li>
    </ul>

</nav>
<div id="wrapper">
    <ul class="sidebar navbar-nav">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="admin_page.php" id="pagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>dashboard</span>
            </a>

        </li>

        <li class="nav-item">
            <a class="nav-link" href="manage-users.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage_events.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Events</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage_enrollements.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Subscriptions</span></a>
        </li>
    </ul>
    <div id="content-wrapper">

        <div class="container-fluid">


            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    List of subscriptions
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                            <tr class="success">
                                <th>User</th>
                                <th>Event</th>
                                <th>Confirm Enrollement</th>
                                <th>Delete Enrollement</th>
                            </tr>
                            </thead>
                            <?php
                            require_once "../Controller/MatchEnroll.php";
                            for ($i = 0; $i < count($enrUsers); $i++) {
                                $Clink = "../Controller/confirm_enrollement.php?email=" . $enrUsers[$i]['email'] . "&Eventname=" . $enrEvents[$i]['Event_name'];
                                ?>

                                <tr>
                                    <th><?= $enrUsers[$i]['email'] ?></th>
                                    <th><?= $enrEvents[$i]['Event_name'] ?></th>
                                    <th><a href="<?= $Clink ?>">validate</a></th>
                                </tr>
                                <?php
                            }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © reserved to me</span>
        </div>
    </div>
</footer>

</body>
</html>
