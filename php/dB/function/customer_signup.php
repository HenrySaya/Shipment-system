<?php

include '../php/dB/db_connect.php';

 if (isset($_SESSION['username'])) {
    header('LOCATION: customer_profile.php');
    
 }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['Username'];
        $fullname = $_POST['Fullname'];
        $Email    = $_POST['Email'];
        $password = $_POST['Password'];
        $address  = $_POST['Address'];
        $phone    = $_POST['Phone'];
        $haspass  = sha1($password);
        
        $stmt= $con->prepare("INSERT INTO customers (Username,Fullname,Email,Password,Address,phone) VALUES ('$username','$fullname','$Email','$haspass','$address','$phone')");
        $stmt->execute(array($username, $fullname, $Email, $haspass, $address, $phone));
        // $count= $stmt->rowCount();;
        echo 'done';
    }


