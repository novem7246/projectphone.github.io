<?php 

    $conn = mysqli_connect("localhost", "root", "12345678", "pongsakorn");

    if (!$conn) {
        die("Failed to connect to database " . mysqli_error());
    }


?>