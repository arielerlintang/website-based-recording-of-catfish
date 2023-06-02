<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow bg-white rounded p-5 my-5">
			<p>Tambah Produk :</p>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label>Kode</label>
					<input type="number" name="kode_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label>Jenis</label>
					<input type="text" name="jenis_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label>Harga</label>
					<input type="number" name="harga_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label>Berat</label>
					<input type="number" name="berat_produk" class="form-control">
				</div>
				<div class="mb-3">
					<label>stok</label>
					<input type="number" name="stok_produk" class="form-control">
				</div>	
				<div class="mb-3">
					<label>Deskripsi</label>
					<textarea name="deskripsi_produk" class="form-control"></textarea>
				</div>
				<div class="mb-3">
					<label>Foto</label>
					<input type="file" name="foto_produk" class="form-control">
				</div>
				<button name="tambah" class="btn btn-primary" type="submit">Tambah</button>
			</form>
		</div>

	</div>
</div>
<?php 

if (isset($_POST["tambah"]))
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

	// untuk membedaklan foto 1 dengan foto ke 2 (nama foto)

	// fungsi waktu 
	$waktu =  date("dmYHis");
	$waktu_foto = $waktu.$nama_foto;


	move_uploaded_file($file_foto, "../assets/foto_produk/$waktu_foto");

	$koneksi->query("INSERT INTO produk (kode_produk,jenis_produk,nama_produk,harga_produk,berat_produk,stok_produk,deskripsi_produk,foto_produk) 
		VALUES ('$kode_produk','$jenis_produk','$nama_produk','$harga_produk','$berat_produk','$stok_produk','$deskripsi_produk','$waktu_foto') ");

	echo "<script>alert('Data Produk Berhasil Disimpan')</script>";
	echo "<script>location='index.php?page=produk'</script>";
}


 ?>