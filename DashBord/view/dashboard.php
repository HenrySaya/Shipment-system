<?php
session_start();

 if (isset($_SESSION['username'])) { ?><br><?php
    include 'navbar.php';
    // echo ' welcom'.' '. $_SESSION['username']; 
 }else{
     header('LOCATION: DashBord\index.php');
     exit();
 }

 include 'DashBord\php\routes\routes.php';

 ?>


