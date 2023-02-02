<?php
    $host = 'localhost';
    $username = 'v0503sah_newusr';
    $password = 'rev$X,#zm9hlG1~;=P';
    $database = 'v0503sah_saestatedb';

    // Create DB Connection
    $con = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>