<?php

    $db_name= 'mysql:host=<localhost:3308></localhost:3308>;dbname=dispatchers';
    $user='root';
    $password='';
    $option= array(
        PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8',
    );

    try {
        $con= new PDO($db_name,$user,$password,$option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }

    catch(PDOException $e){
        echo 'fail' . $e->getMessage();
    }