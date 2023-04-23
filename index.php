<?php 
session_start();
// $noNavBar='';
include 'DashBord\php\routes\init.php';
include 'php\dB\function\customer_login.php'; 
include 'DashBord\view\footer.php'; 

if (isset($_SESSION['username'])) { ?><br><?php
    include 'navbar.php';
     
 }
?>