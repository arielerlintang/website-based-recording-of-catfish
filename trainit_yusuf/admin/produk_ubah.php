<?php
$id_produk = $_GET["id"];
$ambil_produk = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' "); 
$detail_produk = $ambil_produk->fetch_assoc();
// echo "<pre>";
// print_r ($detail_produk);
// echo "</pre>";


?>
<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow bg-white rounded p-5 my-5">
			<p>Ubah Produk :</p>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label>Kode</label>
					<input type="number" name="kode_produk" class="form-control" value="<?php echo $detail_produk['kode_produk'] ?>">
				</div>
				<div class="mb-3">
					<label>Jenis</label>
					<input type="text" name="jenis_produk" class="form-control"  value="<?php echo $detail_produk['jenis_produk'] ?>">
				</div>
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_produk" class="form-control"  value="<?php echo $detail_produk['nama_produk'] ?>">
				</div>
				<div class="mb-3">
					<label>Harga</label>
					<input type="number" name="harga_produk" class="form-control"  value="<?php echo $detail_produk['harga_produk'] ?>">
				</div>
				<div class="mb-3">
					<label>Berat</label>
					<input type="number" name="berat_produk" class="form-control"  value="<?php echo $detail_produk['berat_produk'] ?>">
				</div>
				<div class="mb-3">
					<label>stok</label>
					<input type="number" name="stok_produk" class="form-control"  value="<?php echo $detail_produk['stok_produk'] ?>">
				</div>	
				<div class="mb-3">
					<label>Deskripsi</label>
					<textarea name="deskripsi_produk" class="form-control"><?php echo $detail_produk["deskripsi_produk"] ?>
							
						</textarea>
				</div>
				<div class="mb-3">
					<label>Foto</label>
					<img src="../assets/foto_produk/<?php echo $detail_produk['foto_produk'] ?>">
					<input type="file" name="foto_produk" class="form-control">
				</div>
				<button name="ubah" class="btn btn-primary" type="submit">Ubah</button>
			</form>
		</div>

	</div>
</div>
<?php 

if (isset($_POST["ubah"]))
{
	$kode_produk = $_POST["kode_produk"];
	$jenis_produk = $_POST["jenis_produk"];
	$nama_produk = $_POST["nama_produk"];
	$harga_produk = $_POST["harga_produk"];
	$berat_produk = $_POST["berat_produk"];
	$stok_produk = $_POST["stok_produk"];
	$deskripsi_produk = $_POST["deskripsi_produk"];

	$nama_foto = $_FILES["foto_produk"]["name"];
	$file_foto = $_FILES["foto_produk"]["tmp_name"];

	$waktu = date("dmYHis");
	$waktu_foto = $waktu.$nama_foto;

	if (empty($file_foto))
	{
		$koneksi->query("UPDATE produk SET kode_produk = '$kode_produk',
			jenis_produk = '$jenis_produk',
			nama_produk = '$nama_produk',
			harga_produk = '$harga_produk',
			berat_produk = '$berat_produk',
			stok_produk = '$stok_produk',
			deskripsi_produk = '$deskripsi_produk' WHERE id_produk = '$id_produk' ");
	}
	else
	{
		move_uploaded_file($file_foto, "../assets/foto_produk/$waktu_foto");
		
		$ap = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
		$dp = $ap->fetch_assoc();

		$foto_lama = $dp['foto_produk'];
		unlink("../assets/foto_produk/".$foto_lama);

		$koneksi->query("UPDATE produk SET kode_produk = '$kode_produk',
			jenis_produk = '$jenis_produk',
			nama_produk = '$nama_produk',
			harga_produk = '$harga_produk',
			berat_produk = '$berat_produk',
			stok_produk = '$stok_produk',
			deskripsi_produk = '$deskripsi_produk',
			foto_produk = '$waktu_foto' WHERE id_produk = '$id_produk' ");



	}

	echo "<script>alert('Data Produk Berhasil Di Ubah')</script>";
	echo "<script>location='index.php?page=produk'</script>";
}


?>