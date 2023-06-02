<?php 
$id_penjualan = $_GET["id"];

$koneksi->query("DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan' ");

echo "<script>alert('Data Penjualan Di Hapus')</script>";
echo "<script>location='index.php?page=penjualan'</script>";

 ?>