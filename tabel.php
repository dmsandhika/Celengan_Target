<?php $query = "SELECT  * FROM target JOIN pemasukkan ON target.id=pemasukkan.id_target";

// Menjalankan query
$result = mysqli_query($koneksi, $query);

// Memeriksa hasil query
if (!$result) {
  die("Query error: " . mysqli_error($koneksi));
}

// Menyiapkan variabel untuk menyimpan data berdasarkan nama
$dataPerNama = array();

// Memisahkan data per nama
while ($row = mysqli_fetch_assoc($result)) {
  $nama = $row['nama'];

  // Menambahkan data ke array yang berdasarkan nama
  if (!isset($dataPerNama[$nama])) {
    $dataPerNama[$nama] = array();
  }
  $dataPerNama[$nama][] = $row;
}
// Koneksi ke database


// Query untuk mengambil data pemasukkan
$query1 = "SELECT target.nama , pemasukkan.id_target, pemasukkan.hari_ini, pemasukkan.masuk, SUM(pemasukkan.masuk) AS masukkan FROM target JOIN pemasukkan ON target.id=pemasukkan.id_target GROUP BY pemasukkan.hari_ini, target.nama "; 

// Eksekusi query
$result1 = mysqli_query($koneksi, $query1);

// Membuat array untuk menyimpan data tanggal dan pemasukkan
$tanggal = array();
$pemasukkan = array();
$masukkan = array();
$tanggal = array();

// Mendapatkan data dari hasil query
while ($row = mysqli_fetch_assoc($result1)) {
  $tanggal[] = $row['hari_ini'];
  $pemasukkan[] = $row['masuk'];
  $masukkan[] = $row['masukkan'];
  $tanggal[] = $row['hari_ini'];
}

// Menampilkan tabel per nama
foreach ($dataPerNama as $nama => $data) {
  echo "<h3>Rekap data untuk target : $nama</h3>";
  echo "<table class ='table defaulttable'>";
  echo "<tr><th>Nama</th><th>Nominal</th><th>Tanggal Masuk</th></tr>";

  foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $nama . "</td>";
    echo "<td>" . $row['masuk'] . "</td>";
    echo "<td>" . $row['hari_ini'] . "</td>";
    echo "</tr>";
  }

  echo "</table>";
}
?>