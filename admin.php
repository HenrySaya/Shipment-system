<?php
session_start();
include "functions.php";
if (!isset($_SESSION["login"])) {
    header("Location: loginform.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=League+Spartan&family=Sora:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="hero" id="Home">
        <nav>
            <h2 class="header" id="navbar">Enroute<span>Express</span></h2>
            <ul>
                <li><a href="requestshipment.php">Status</a></li>
                <li><a href="cancellationshipment.php">Cancellation</a></li>
                <li><a href="registeremployee.php">Register</a></li>
                <li><a href="forward.php">Forward</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>

        <div class="content">
            <h4 id="home">Keep your spirits up!</h4>
            <h1><span><?= $_SESSION['name'] ?></span></h1>
            <h3>Hard work will never betray you</h3>
            <div class="newslatter">
                <a href="requestshipment.php" class="about-us">Check Shipment Request</a>
            </div>
        </div>
    </div>

</body>

</html>