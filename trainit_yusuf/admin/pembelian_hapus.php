<?php 
$pembelian = $_GET["id"];

$koneksi->query("DELETE FROM pembelian WHERE pembelian = '$pembelian' ");

echo "<script>alert('Data pembelian Di Hapus')</script>";
echo "<script>location='index.php?page=pembelian'</script>";

 ?>