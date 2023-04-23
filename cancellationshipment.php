<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: loginform.php");
    exit;
}
require 'functions.php';
// $idaddshipment = $_GET["id"];
$cancellation = query("SELECT * FROM cancellation");

if (isset($_POST["deny"])) {
    if (deny($_POST) > 0) {
        echo "
        			<script>
        				alert('Denied!');
        				document.location.href = 'cancellationshipment.php';
        			</script>
        		";
    } else {
        echo "
        			<script>
        				alert('Failed request!');
        				document.location.href = 'cancellationshipment.php';
        			</script>
        		";
    }
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
                <li><a href="admin.php">Home </a></li>
                <li><a href="requestshipment.php">Status</a></li>
                <li><a href="cancellationshipment.php">Cancellation</a></li>
                <li><a href="registeremployee.php">Register</a></li>
                <li><a href="forward.php">Forward</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


        
        <div class="container mt-5">
            <h1>Cancellation</h1>
            <br>
            <div id="container">
                <table id="data" class="table table-striped table-responsive text-center mt-4" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Idaddshipment</th>
                            <th>Username</th>
                            <th>Product Desc</th>
                            <th>Request</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1; ?>
                        <?php foreach ($cancellation as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>

                                <td><?= $row["idaddshipment"]; ?></td>
                                <td><?= $row["username"]; ?></td>
                                <td><?= $row["productdesc"]; ?></td>
                                <td><?= $row["status"]; ?></td>
                                <td class="aksi">
                                    <a href="cancel.php?id=<?= $row["idaddshipment"]; ?>">Cancel</a>
                                    <a href="deny.php?id=<?= $row["idaddshipment"]; ?>">Deny</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>