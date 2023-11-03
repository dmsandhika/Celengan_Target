<?php
//include dataabse connection file
include ("koneksi.php");

//Check if from submitted, insert form data into users table
$nama= $_GET['nama'];

mysqli_query($koneksi, "delete from target where nama='$nama'");

header("location: masuk.php");
?>