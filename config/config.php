<?php
    $servername = "sql8.freesqldatabase.com"; 
    $username = "sql8709721";
    $password = "jFHwFA7INV";
    $dbname = "sql8709721";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
?>