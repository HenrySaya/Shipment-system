<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


$idaddshipment = $_GET["id"];


$shipment = query("SELECT * FROM addshipment WHERE idaddshipment = $idaddshipment")[0];


// To check whether a submit button has been clicked or not
if (isset($_POST["submit"])) {

    
    if (cancellation($_POST) > 0) {
        echo "
			<script>
				alert('In Process');
				document.location.href = 'updateshipment.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('Error');
				document.location.href = 'updateshipment.php';
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
            <br>
            <br>
            <h1>Cancel</h1>
            <br>

            <form action="" method="post" enctype="multipart/form-data" class="row g-3">
                <input type="hidden" name="idaddshipment" value="<?= $shipment["idaddshipment"]; ?>">
                <div class="col-md-6">
                    <label for="name">Username : </label>
                    <input type="text" name="username" class="form-control" id="username" value="<?= $shipment["username"]; ?>">
                </div>
                <div class="col-md-6">
                    <label for="supplier">Product Description :</label>
                    <input type="text" name="productdesc" class="form-control" id="productdesc" value="<?= $shipment["productdesc"]; ?>">
                </div>
                <div class="col-md-6">
                    <label for="price">Weight :</label>
                    <input type="text" name="weight" class="form-control" id="weight" value="<?= $shipment["weight"]; ?>">
                </div>
                <div class="col-md-6">
                    <label for="price">Shipment Type :</label>
                    <input type="text" name="shipmenttype" class="form-control" id="shipmenttype" value="<?= $shipment["shipmenttype"]; ?>">
                </div>
                <div class="col-md-6">
                    <label for="price">Item Type :</label>
                    <input type="text" name="itemtype" class="form-control" id="itemtype" value="<?= $shipment["itemtype"]; ?>">
                </div>
                <div class="col-md-6">
                    <label for="price">Address :</label>
                    <input type="text" name="address" class="form-control" id="address" value="<?= $shipment["address"]; ?>">
                </div>
                <input type="hidden" name="status" value="<?= "request to cancel"; ?>">
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-primary">Cancel Shipment</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>