<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "login";
$conn = mysqli_connect($server, $user, $pass, $database);
session_start();
if (!$conn) {
    echo "<script>('Connectiom Failed')</script>";
}
