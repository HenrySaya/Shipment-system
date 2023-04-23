<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
    <!DOCTYPE html>
    <html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Login</title>
    </head>

    <body style="background-color:#2f3a27;">
        <div class="container">
            <div class="row vh-100 align-items-center justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-8 bg-white rounded p-4 shadow">
                    <div class="row justify-content-center mb-4">
                        <img src="" class="w-25">
                    </div>
                    <form action="login.php" method="post">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                        <?php } ?>
                        <ul>
                            <div class="mb-2">
                                <label class="form-label">Username :</label>
                                <input type="text" name="username" id="username" class="w-100">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Select User Type:</label>
                                <select class="form-select" name="role" aria-label="Default select example" id="role">
                                    <option selected value="customer">Customer</option>
                                    <option selected value="admin">Admin</option>
                                    <option selected value="loader">Loader</option>
                                    <option selected value="shipper">Shipper</option>
                                    <option selected value="courier">Courier</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Password :</label>
                                <input type="password" name="password" id="password" class="w-100">
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-success mt-4" name="login">Login</button>
                                <a href="registeruser.php" class="mb-4 row justify-content-center" name="backtohome">Register Account</a>
                                <a href="index1.html" class="mb-4 row justify-content-center" name="backtohome">Back to Home</a>
                            </div>
                        </ul>



                    </form>
                </div>

            </div>

        </div>

    </body>

    </html>
<?php } else {
    header("Location: role.php");
} ?>