<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
				alert('new user has been added successfully!');
			  </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Login</title>
</head>

<body style="background-color:#2f3a27;">
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-8 bg-white rounded p-4 shadow">
                <div class="row justify-content-center mb-4">
                    <img src="" class="w-25">
                </div>
                <form action="" method="post">
                    <ul>
                        <div class="mb-2">
                            <label for="username" class="form-label">Username :</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Select User Type:</label>
                            <select class="form-select mb-4" name="role" aria-label="Default select example" id="role">
                                <option selected value="customer">Customer</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password :</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-2">
                            <label for="password2" class="form-label">Confirm password :</label>
                            <input type="password" class="form-control" name="password2" id="password2">
                        </div>
                        <div class="mb-2">
                            <button type="submit" name="register" class="btn btn-success mb-2 mt-4">Register</button>
                        </div>
                        <div class="mb-2">
                            <a href="loginform.php" class="mb-4 row justify-content-center" name="backtohome">Back to Login</a>
                        </div>
                    </ul>



                </form>
            </div>

        </div>

    </div>

</body>

</html>