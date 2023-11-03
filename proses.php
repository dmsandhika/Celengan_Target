<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celengan_target";

// Mengatur koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Data dari form
$utamaValue1 = $_POST["nama"];
$utamaValue2 = $_POST["harga"];
$referensiValue1 = $_POST["hari_target"];
$referensiValue2 = $_POST["masuk"];
$referensiValue3 = $_POST["hari_ini"];

// Query untuk insert ke tabel utama
$sqlUtama = "INSERT INTO target (nama, harga, hari_target) VALUES ('$utamaValue1', '$utamaValue2', '$referensiValue1')";
$resultUtama = $conn->query($sqlUtama);

if ($resultUtama) {
    // Ambil nilai kunci utama yang baru saja di-generate
    $lastInsertId = $conn->insert_id;

    // Query untuk insert ke tabel yang memiliki foreign key
    $sqlReferensi = "INSERT INTO pemasukkan (masuk, hari_ini, id_target) VALUES ( '$referensiValue2','$referensiValue3', '$lastInsertId')";
    $resultReferensi = $conn->query($sqlReferensi);

    if ($resultReferensi) {
        header("location: submit.php");
    } else {
        echo "Terjadi kesalahan saat memasukkan data ke tabel referensi: " . $conn->error;
    }
} else {
    echo "Terjadi kesalahan saat memasukkan data ke tabel utama: " . $conn->error;
}

// Menutup koneksi
$conn->close();

?>
