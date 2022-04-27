<?php
    $conn = mysqli_connect("localhost","group13","ObCMxC","group13");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } 
?>