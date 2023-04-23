<?php

$noNavBar='';
$getUserName = '';
 if (isset($_SESSION['username'])) {
    header('LOCATION: DashBord\view\dashboard.php');
    $getUserName = $_SESSION['username'];
 }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $haspass  = sha1($password);
    
    $stmt= $con->prepare("SELECT id, u_name, u_password FROM users WHERE u_name=? AND u_password=?  limit 1");
    $stmt->execute(array($username, $password));
    $row= $stmt->fetch();
    $count= $stmt->rowCount();
    
    // $uname= $_POST['username'];
    // $pass= $_POST['pass'];
    



    if ($count>0) {
        $_SESSION['username']= $username;
        $_SESSION['id']= $row['id'];
        header('LOCATION: DashBord\view\dashboard.php');
        exit();
    }else{
        echo ('sorry');
        
    }
  }

