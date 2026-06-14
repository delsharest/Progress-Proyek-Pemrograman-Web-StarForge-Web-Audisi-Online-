<?php
$host = "localhost";
$user = "root"; // Username default database Laragon
$pass = "";     // Password default Laragon itu kosong
$db   = "starforge_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>