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
  <style>
    .hidden-input {
      display: none;
    }
  </style>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
      <h1>Target Baru</h1>
      
    </div>
    <?php
     $id_target= $_GET['id_target'];
     $result= mysqli_query($koneksi,"SELECT * FROM target JOIN pemasukkan ON target.id=pemasukkan.id_target WHERE pemasukkan.id_target='$id_target'");
    
     $data = array();
     if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
         $data[] = $row;
        }
        foreach ($data as $row) {
          $tanggalDariDatabase = $row['hari_target'];

          // Menghitung selisih hari dengan hari ini
          $today = date("Y-m-d");
          $dataharga = $row['harga'];
          $nama=$row['nama'];
      $datamasuk = $row['masuk'];
      $persen = ($datamasuk/$dataharga)*100;
      $persenn = number_format($persen, 2);
            $anu = $dataharga - $datamasuk;
            
          // Update tanggal pada database
         
          $diff = date_diff(date_create($today), date_create($tanggalDariDatabase));
          $selisihHari = $diff->format("%a"); 
          $anuu = $anu/$selisihHari;
          $anuun = ROUND($anuu);
          if (empty($nilai)) {
              $nilai = 0; // Mengisi nilai kosong dengan 0
            }
     ?>
    
  <form id="target"  action="save.php?id_target=<?php echo $id_target; ?>" method="post">
                <div class="row mb-3">
                  
                  <input type="number" class="hidden-input" name="id_target" value = "<?php echo $id_target?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Tambah Pemasukkan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="masuk" value ="<?php echo $anuun?>">
                    <small>Nominal default yang ditampilkan adalah Pemasukkan minimal dalam sehari sesuai target</small>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="Tanggal" name="hari_ini" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>
                

<div class="row mb-3">
                 
                 <div class="col-sm-10">
                   <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                 </div>
               </div>

             </form>
            <?php }}?>
             <div class="ps-3">
                    <div class="d-grid gap-2 mt-3" style="text-align: right;">
                <a href="masuk.php"><button  class="btn btn-primary" type="button" style="margin-top: -90px;">Kembali</button></a>
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