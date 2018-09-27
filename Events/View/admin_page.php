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
    <title></title>
    <link rel="stylesheet" href="../web/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../web/bootstrap/css/sb-admin.css">
    <link rel="stylesheet" href="../web/bootstrap/css/all.min.css">
</head>
<body>

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
            <a class="nav-link dropdown-toggle" href="admin_page.php" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <p href="#">hello foulen </p>
                </li>

            </ol>
        </div>
    </div>

<?php
}
?>
</div>

<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © reserved to me</span>
        </div>
    </div>
</footer>

</body>
</html>
