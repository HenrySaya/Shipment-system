<?php
session_start();
include "functions.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin.php");
    } else if ($_SESSION['role'] == 'customer') {
        header("Location: customer.php");
    } else if ($_SESSION['role'] == 'shipper') {
        header("Location: shipper.php");
    } else if ($_SESSION['role'] == 'loader') {
        header("Location: loader.php");
    } else {
        header("Location: courier.php");
    }
?>

  
<?php } else {
    header("Location: loginform.php");
} ?>