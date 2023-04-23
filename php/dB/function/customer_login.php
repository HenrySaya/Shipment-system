<?php


 if (isset($_SESSION['username'])) {
    header('LOCATION: view/customer_profile.php');
    $getUserName = $_SESSION['username'];
 }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['Username'];
    $password = $_POST['password'];
    $haspass  = sha1($password);
    
    $stmt= $con->prepare("SELECT id, Username, Password FROM customers WHERE Username=? AND Password=? limit 1");
    $stmt->execute(array($username, $haspass));
    $row= $stmt->fetch();
    $count= $stmt->rowCount();
    
    // $uname= $_POST['username'];
    // $pass= $_POST['pass'];
    



    if ($count>0) {
        $_SESSION['username']= $username;
        $_SESSION['id']= $row['id'];
        header('LOCATION: view/customer_profile.php');
        exit();
    }else{
        echo ('sorry');
        
    }
  }

