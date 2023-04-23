<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: loginform.php");
    exit;
}



// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (addshipment($_POST) > 0) {
        echo "
			<script>
				alert('Request shipment is successfully added!');
				document.location.href = 'statusshipment.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('Failed request!');
				document.location.href = 'statusshipment.php';
			</script>
		";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add data</title>
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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <title>Add Shipment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                <li><a href="customer.php">Home </a></li>
                <li><a href="addshipment.php">Add </a></li>
                <li><a href="statusshipment.php">Status</a></li>
                <li><a href="updateshipment.php">Cancellation</a></li>
                <li><a href="invoiceshipment.php">Invoice</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>




        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <div class="container mt-5">
            <h1>Add New Shipment</h1>
            <form action="" method="post" enctype="multipart/form-data" class="row g-3">
                <div class="col-md-6">
                    <label for="productdesc" class="form-label"> Product Desc: </label>
                    <input type="text" class="form-control" name="productdesc" id="productdesc" required>
                </div>
                <div class="col-md-6">
                    <label for="weight" class="form-label"> Weight(KG) :</label>
                    <input type="text" class="form-control" name="weight" id="weight" required>
                </div>
                <div class="col-md-6">
                    <label for="shipmenttype" class="form-label">Select Shipment Type:</label>
                    <select class="form-select" name="shipmenttype" aria-label="Default select example" id="shipmenttype">
                        <option selected value="cepFastat">Fast</option>
                        <option selected value="Urgent">Urgent</option>
                        <option selected value="Express">Express</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="itemtype" class="form-label">Select Item Type:</label>
                    <select class="form-select" name="itemtype" aria-label="Default select example" id="itemtype">
                        <option selected value="normal">Normal</option>
                        <option selected value="liquid">Liquid</option>
                        <option selected value="fragile">Fragile</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label"> Address :</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>



</body>

</html>