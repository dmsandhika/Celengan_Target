<?php
    include("koneksi.php");

    if(isset($_POST['save'])){
        $nama=$_POST['nama'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $ttl=$_POST['ttl'];
        $kelamin=$_POST['kelamin'];
        $alamat=$_POST['alamat'];
        $pass=$_POST['pass'];
        $peker=$_POST['pekerjaan'];
        $no=$_POST['no'];
      
        $result=mysqli_query($koneksi,"INSERT INTO akun(nama, email, username,alamat, ttl, kelamin, pass,pekerjaan, no)
        VALUES ('$nama', '$email','$username','$alamat', '$ttl','$kelamin','$pass','$peker', '$no')");
        if ($result){
            header("location:index.php");
        }
        else{
            echo("ERROR");
        }
    }
    
    ?>