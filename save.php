
<?php
// Ambil data yang dikirimkan melalui metode POST
$id_target = $_POST['id_target'];
$masuk = $_POST['masuk'];
$hari_ini = $_POST['hari_ini'];

// Lakukan koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'celengan_target');
if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Lakukan query INSERT untuk menyimpan data ke dalam tabel
$query = "INSERT INTO pemasukkan (id_target, masuk, hari_ini) VALUES ('$id_target', '$masuk', '$hari_ini') ";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil dijalankan
if ($result) {
    header("location: submit1.php");
} else {
  echo "Terjadi kesalahan: " . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
