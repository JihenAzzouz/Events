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
    <title>List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<h1>Subscribed list</h1>
<table class="table table-striped">
    <?php
    require_once "../Controller/show_subscribed.php";
    for ($i = 0; $i < count($subbedUsers); $i++) {
        ?>

        <tr>
            <th><?= $subbedUsers[$i] ?></th>
        </tr>

        <?php
    }
    }
    ?>
</table>


</body>
</html>
