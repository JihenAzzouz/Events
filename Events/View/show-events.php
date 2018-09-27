<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['role'] == true){
    echo "you're the admin go back";
} else {

?>


<html>
<head>
    <title> events</title>
    <link href="../web/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../web/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../web/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="../web/bootstrap/css/style.css" rel="stylesheet">

</head>
<body>


<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Go My Code Events</a>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>


            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search_btn">Search</button>
                <div><a href="../Controller/disconnect.php">disconnect</a></div>
            </form>
        </div>
    </nav>
</header>

<div role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide"
                     src="https://www.northamptonshiregrowthhub.co.uk/wp-content/uploads/2017/08/UpcomingEvents.jpg"
                     alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left">

                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign for Upcoming events</a></p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <hr class="featurette-divider">
    <br>
    <br>
    <div class="container marketing">
        <div class="row">
            <?php
            $etat_event = true;
            require_once "../Controller/show_events.php";
            for ($i = 0;
                 $i < count($eventRow);
                 $i++) {
                $Slink = "Subscribed_list.php?id=" . $eventRow[$i]['ID'];
                ?>

                <div class="col-lg-4">
                    <img class="rounded-circle" src="../web/event.png" alt="Generic placeholder image" width="140"
                         height="140">
                    <h2><?php echo $eventRow[$i]['Event_name']; ?></h2>

                    <p> Start Date will be : <?php echo $eventRow[$i]['start_date']; ?></p>
                    <p> Ending Date will be : <?php echo $eventRow[$i]['end_date']; ?></p>
                    <p> Address : <?php echo $eventRow[$i]['location']; ?></p>
                    <ul>
                        <li>
                            Openings : <?php echo $eventRow[$i]['openings']; ?>
                        </li>
                        <li>
                            Subscriptions : <?php echo $eventRow[$i]['subscription']; ?>
                        </li>
                    </ul>

                    <?php if ($eventRow[$i]['openings'] > $eventRow[$i]['subscription']) {

                        $etat_event = true;
                        $Elink = "../Controller/enroll_to_event.php?id=" . $eventRow[$i]['ID'];
                        ?>

                        <a href=<?= $Elink ?>>Participate</a>

                    <?php } else { ?>
                        <span class="text-danger">no more available places</span>

                    <?php } ?>
                </div>
            <?php } ?>

        </div>

    </div>

</div>
<?php } ?>
</body>
</html>
