<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: loginform.php");
    exit;
}
require 'functions.php';
$addshipment = query("SELECT * FROM addshipment WHERE username='{$_SESSION['username']}'");

if (isset($_POST["cari"])) {
    $addshipment = cari($_POST["keyword"]);
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

    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 118px;
            left: 210px;
            z-index: -1;
            display: none;
        }

        @media print {

            .logout,
            .tambah,
            .form-cari,
            .aksi {
                display: none;
            }
        }
    </style>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <div class="hero" id="Home">
        <nav>
            <h2 class="header" id="navbar">Enroute<span>Express</span></h2>
            <ul>
                <li><a href="customer.php">Home </a></li>
                <li><a href="addshipment.php">Add </a></li>
                <li><a href="statusshipment.php">Status</a></li>
                <li><a href="updateshipment.php">Cancellation</a></li>
                <li><a href="invoiceshipment.php">Invoice</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <div class="container mt-5">
            <h1>Status Shipment</h1>
            <form action="" method="post" class="form-cari">

                <input type="text" name="keyword" size="40" class="mt-4" autofocus placeholder="Enter search keyword.." autocomplete="off" id="keyword">
                <button type="submit" name="cari" id="tombol-cari" class="btn btn-primary">Submit</button>
                <img src="img/loader.gif" class="loader">

            </form>
            <br>
            <div id="container">
                <table id="data" class="table table-striped table-responsive text-center mt-4" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Item ID</th>
                            <th>Product Desc</th>
                            <th>Weight</th>
                            <th>Shipment Type</th>
                            <th>Item Type</th>
                            <th>Address</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1; ?>
                        <?php foreach ($addshipment as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>

                                <td><?= $row["idaddshipment"]; ?></td>
                                <td><?= $row["productdesc"]; ?></td>
                                <td><?= $row["weight"]; ?></td>
                                <td><?= $row["shipmenttype"]; ?></td>
                                <td><?= $row["itemtype"]; ?></td>
                                <td><?= $row["address"]; ?></td>
                                <td><?= $row["status"]; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>