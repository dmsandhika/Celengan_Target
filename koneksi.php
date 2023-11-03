<?php
$host = 'localhost'; // Ganti dengan nama host Anda
$user = 'root'; // Ganti dengan nama pengguna MySQL Anda
$password = ''; // Ganti dengan kata sandi MySQL Anda
$database = 'celengan_target'; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa apakah koneksi berhasil atau tidak
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
