<?php


function redirect($sec=3){
    echo "<div class='alert alert-danger'>$errormsg</div>";
    echo "<div class='alert alert-info>will redirect in $sec seconds...</div>";
    header("refresh:$sec;url=customer_signup.php");
    exit();
}