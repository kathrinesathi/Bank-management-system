<?php

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'final';

    $con = mysqli_connect($server, $user, $password, $db);

    if(!$con){
        
        die('Could not connect');
    }
    // if (!$con) {
    //     die("Connection failed: " . mysqli_connect_error());
    //   }
    //   echo "Connected successfully";
    //   ?>
