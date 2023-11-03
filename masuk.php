
<?php
require 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CelenganKu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script>
        function konfirmasiHapus() {
            var konfirmasi = confirm("Apakah Anda yakin ingin menghapus?");
            if (konfirmasi) {
                // Kode untuk menghapus data atau melakukan tindakan lainnya
                alert("Data telah dihapus.");
                
                // Mengarahkan pengguna ke halaman lain
                window.location.href = "hapus.php";
            } else {
                // Tindakan yang diambil jika pengguna membatalkan penghapusan
                alert("Penghapusan dibatalkan.");
            }
        }
    </script>
</head>

<body>
  <!-- ======= Header ======= -->
  
  <?php
include 'header.php';
?>
  <!-- ======= Sidebar ======= -->
  <?php
include 'sidebar.php';
?>

  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Pemasukkan Target</h1>
      
    </div>
    <?php

    ?>
  <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Nama Target</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Hari Target</th>
                    <th scope="col">Sisa Hari</th>
                    <th scope="col">Pemasukkan</th>
                    <th scope="col">Presentase</th>
                    <th scope="col">Kurangan</th>
                    <th scope="col">Action</th>
                   
                  </tr>
                </thead>
                
                <tbody>
                 <?php 
                 
                 $sql = "SELECT target.nama, target.harga, target.hari_target, pemasukkan.id_target, SUM(pemasukkan.masuk) AS masuk FROM target JOIN pemasukkan ON target.id=pemasukkan.id_target GROUP BY target.nama";
                 $result = mysqli_query($koneksi, $sql);
                 $query = "SELECT SUM(masuk) FROM pemasukkan GROUP BY id_target";
                 $data = array();

                
                 // Menampilkan data dalam tabel
                 if (mysqli_num_rows($result) > 0) {
                   while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                    }

                    // Loop melalui setiap data dalam array
                    foreach ($data as $row) {
                    $tanggalDariDatabase = $row['hari_target'];

                    // Menghitung selisih hari dengan hari ini
                    $today = date("Y-m-d");
                    $dataharga = $row['harga'];
                    
                $datamasuk = $row['masuk'];
                $persen = ($datamasuk/$dataharga)*100;
                $persenn = number_format($persen, 2);
                      $anu = $dataharga - $datamasuk;
                      
                    // Update tanggal pada database
                   
                    $diff = date_diff(date_create($today), date_create($tanggalDariDatabase));
                    $selisihHari = $diff->format("%a"); 
                    $anuu = $anu/$selisihHari;
                    if (empty($nilai)) {
                        $nilai = 0; // Mengisi nilai kosong dengan 0
                      }
                     
                    echo "<tr>";
                     echo "<td>" . $row['nama'] . "</td>";
                     echo "<td>" . $row['harga'] . "</td>";
                     echo "<td>" . $tanggalDariDatabase. "</td>";
                     echo "<td> ".$selisihHari."</td>";
                     echo "<td>" . $row['masuk'] . "</td>";
                     echo "<td>" . $persenn . "%</td>";
                     echo "<td>" . $anu . "</td>";
                     echo "<td><a href='tambahmasuk.php?id_target=$row[id_target]'>Tambah</a> 
                     | <a  onclick='return konfirmasiHapus()' href='hapus.php?nama=$row[nama]'>Hapus</a>";
                    echo"</tr>";
                   }
                   
                  
                 
                 } 
                 
                
                 ?>
                 
            </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
         
            
             <div class="ps-3">
                    <div class="d-grid gap-2 mt-3" style="text-align: right;">
                <a href="dash.php"><button  class="btn btn-primary" type="button" style="margin-top: -90px; margin-right: 50px;">Kembali</button></a>
              </div>
                    </div>
                </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php'; ?><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>