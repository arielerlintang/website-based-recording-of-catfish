<?php 
$id_kolam = $_GET["id"];

$koneksi->query("DELETE FROM kolam WHERE id_kolam = '$id_kolam' ");

echo "<script>alert('Data Kolam Di Hapus')</script>";
	echo "<script>location='index.php?page=kolam'</script>";


 ?>