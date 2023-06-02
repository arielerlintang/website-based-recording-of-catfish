<?php 
$id_produk = $_GET["id"];
// menampilkan data produk berdasar id_produk

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
$detail = $ambil->fetch_assoc();

// mendapatkan nama foto

$namafoto = $detail['foto_produk'];

// ggunakan funngsi unlink untuk menghapus file nya juga seklaian

unlink("../assets/foto_produk/".$namafoto);

$koneksi->query("DELETE FROM produk WHERE id_produk = '$id_produk' ");

echo "<script>alert('Data produk Di Hapus')</script>";
echo "<script>location='index.php?page=produk'</script>";

 ?>