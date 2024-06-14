<?php
session_start();
 
$server = "localhost";
$user = "root";
$pass = "";
$database = "log";
$port = 3308;
$conn = mysqli_connect($server, $user, $pass, $database, $port);
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>