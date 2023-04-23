<?php

session_start();
session_unset();
session_destroy();
header('LOCATION: DashBord\index.php');
exit();