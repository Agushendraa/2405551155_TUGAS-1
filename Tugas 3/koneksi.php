<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kampus";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// atur karakter UTF-8
$conn->set_charset('utf8mb4');
?>
