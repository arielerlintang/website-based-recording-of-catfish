<?php 

session_start();

$koneksi = new mysqli("localhost","root","","trainit_yusuf");

session_destroy();

echo "<script>alert('Anda Berhasil  Log out')</script>";
echo "<script>location='../index.php'</script>";



 ?>