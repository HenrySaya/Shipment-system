<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if (registrasiemployee($_POST) > 0) {
        echo "<script>
				alert('user!');
			  </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=League+Spartan&family=Sora:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://unpkg.com/feather-icons"></script>

    <title>Employee Registration</title>
    <style>
        label {
            display: block;
        }

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


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
            <h1>Registration</h1>

            <form action="" method="post" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Select User Type:</label>
                    <select class="form-select" name="role" aria-label="Default select example" id="role">
                        <option selected value="customer">Customer</option>
                        <option selected value="admin">Admin</option>
                        <option selected value="loader">Loader</option>
                        <option selected value="shipper">Shipper</option>
                        <option selected value="courier">Courier</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label">Username :</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label">Name :</label>
                    <input type="text" class="form-control" name="name" id="username">
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-md-6">
                    <label for="password2" class="form-label">Confirm password :</label>
                    <input type="password" class="form-control" name="password2" id="password2">
                </div>
                <div class="col-md-12">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </div>

            </form>
        </div>

</body>

</html>