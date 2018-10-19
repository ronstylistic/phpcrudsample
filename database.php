<?php
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'crud_db';

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

?>