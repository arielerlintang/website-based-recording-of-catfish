<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow rounded bg-white p-5 my-5 border-top border-primary border-5">
			<p>Tambah Pakan :</p>
			<form method="post">
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_pakan" class="form-control">
				</div>
				<div class="mb-3">
					<label>Harga</label>
					<input type="number" name="harga_pakan" class="form-control">
				</div>
				<div class="mb-3">
					<label>Berat</label>
					<input type="number" name="berat_pakan" class="form-control">
				</div>
				<div class="mb-3">
					<label>Jumlah</label>
					<input type="number" name="jumlah_pakan" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
			</form>
		</div>
	</div>
</div>
<?php 

if (isset($_POST["tambah"])) 
{
	$nama_pakan = $_POST["nama_pakan"];
	$harga_pakan = $_POST["harga_pakan"];
	$berat_pakan = $_POST["berat_pakan"];
	$jumlah_pakan = $_POST["jumlah_pakan"];

	$koneksi->query("INSERT INTO pakan (nama_pakan,harga_pakan,berat_pakan,jumlah_pakan) 
		VALUES ('$nama_pakan','$harga_pakan','$berat_pakan','$jumlah_pakan') ");

	echo "<script>alert('Data Pakan Di Tambahkan')</script>";
	echo "<script>location='index.php?page=pakan'</script>";
}


 ?>