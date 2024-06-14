<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "blog";
$port = "3308";

$conn = mysqli_connect($host, $user, $pass, $db, $port);
mysqli_select_db($conn, $db);
