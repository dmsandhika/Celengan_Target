<?php
include ("koneksi.php");


	$id=$_POST['id'];
	$pass=$_POST['passbaru'];
	

	mysqli_query($koneksi, "UPDATE akun SET pass='$pass' WHERE id=$id ");
 
    
	header("Location: relog.php");

?>   