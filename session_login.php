<?php
    session_start();
    include ("koneksi.php");

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    

    $query = mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$username' AND pass='$pass' ");

    $cek = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);

    if ($cek){
       
        $_SESSION ['id'] = $data ['id'];
        $_SESSION ['nama'] = $data ['nama'];
        $_SESSION ['username'] = $username;
        $_SESSION ['alamat'] = $data['alamat'];
        $_SESSION ['no'] = $data['no'];
        $_SESSION ['pekerjaan'] = $data['pekerjaan'];
        $_SESSION ['ttl'] = $data['ttl'];
        $_SESSION ['email'] = $data['email'];
        $_SESSION ['kelamin'] = $data['kelamin'];
        $_SESSION ['pass'] = $data['pass'];
       

       header("location:dash.php");
    }
    else{
       
        header("location:ulang.php");}
?>