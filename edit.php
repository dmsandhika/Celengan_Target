<?php
include ("koneksi.php");


	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$peker=$_POST['pekerjaan'];
	$alamat=$_POST['alamat'];
	$no=$_POST['no'];
	$ttl=$_POST['ttl'];

	mysqli_query($koneksi, "UPDATE akun SET nama='$nama',pekerjaan='$peker',alamat='$alamat' ,
    no='$no',ttl='$ttl' WHERE id=$id ");
 
    
	header("Location: profil.php");

?>   