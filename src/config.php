<?php 

function Config() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rezi_app";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    return $conn;
}

?>