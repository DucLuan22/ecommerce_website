<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "ecommerce";
$conn = mysqli_connect($server, $user, $pass, $database);
session_start();
if (!$conn) {
    echo "<script>('Connectiom Failed')</script>";
}

