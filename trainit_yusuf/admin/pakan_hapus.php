<?php 
$id_kolam = $_GET["id"];

$koneksi->query("DELETE FROM pakan WHERE id_pakan = '$id_pakan' ");

echo "<script>alert('Data Pakan Di Hapus')</script>";
	echo "<script>location='index.php?page=pakan'</script>";


 ?>