<?php

include 'DashBord\php\dB\db_connect.php';
include 'DashBord\view\header.php'; 
include 'vendor\mpdf\mpdf\data\patterns\en.php';
// include 'lib/lang/ar.php';
include 'DashBord\php\functions\admin_login.php';
if (!isset($noNavBar)) {
    include 'DashBord\view\navbar.php';
}
