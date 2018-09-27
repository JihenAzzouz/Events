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
                    List of Events
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>


                            <tr class="success">
                                <th>Event Name</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>Location</th>
                                <th>Openings</th>
                                <th>Subscription</th>
                                <th>Delete Event</th>
                            </tr>
                            </thead>

                            <?php

                            require_once "../Controller/show_events.php";
                            for ($i = 0; $i < count($eventRow); $i++) {
                                $Slink = "../Controller/show_subscribed.php?id=" . $eventRow[$i]['ID'];
                                $Dlink = "../Controller/delete_event_controller.php?id=" . $eventRow[$i]['ID'];
                                ?>

                                <tr>
                                    <td><?php echo $eventRow[$i]['Event_name']; ?></td>
                                    <td><?php echo $eventRow[$i]['start_date']; ?></td>
                                    <td><?php echo $eventRow[$i]['end_date']; ?></td>
                                    <td><?php echo $eventRow[$i]['location']; ?></td>
                                    <td><?php echo $eventRow[$i]['openings']; ?></td>

                                    <td><?php echo $eventRow[$i]['subscription']; ?></td>
                                    <td><a href=<?= $Dlink ?>>Delete</span></a></td>

                                </tr>

                                <?php
                            }
                            }
                            ?>
                            
                        </table>
                    </div>
                </div>
            </div>


    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            <h2> Add an event </h2>
        </div>
        <div class="card-body">
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


                    <?php ?>

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
