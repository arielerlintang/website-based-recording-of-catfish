<?php 
$id_pakan = $_GET["id"];
$ambil_pakan = $koneksi->query("SELECT * FROM pakan WHERE id_pakan = '$id_pakan' ");
$pakan = $ambil_pakan->fetch_assoc();

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow rounded bg-white p-5 my-5 border-top border-primary border-5">
			<p>Tambah Pakan :</p>
			<form method="post">
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_pakan" class="form-control" value="<?php echo $pakan['nama_pakan']; ?>">
				</div>
				<div class="mb-3">
					<label>Harga</label>
					<input type="number" name="harga_pakan" class="form-control" class="form-control" value="<?php echo $pakan['harga_pakan']; ?>">
				</div>
				<div class="mb-3">
					<label>Berat</label>
					<input type="number" name="berat_pakan" class="form-control" class="form-control" value="<?php echo $pakan['berat_pakan']; ?>">
				</div>
				<div class="mb-3">
					<label>Jumlah</label>
					<input type="number" name="jumlah_pakan" class="form-control" class="form-control" value="<?php echo $pakan['jumlah_pakan']; ?>">
				</div>
				<button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
			</form>
		</div>
	</div>
</div>
<?php 

if (isset($_POST["ubah"])) 
{
	$nama_pakan = $_POST["nama_pakan"];
	$harga_pakan = $_POST["harga_pakan"];
	$berat_pakan = $_POST["berat_pakan"];
	$jumlah_pakan = $_POST["jumlah_pakan"];

	$koneksi->query("UPDATE pakan SET nama_pakan = '$nama_pakan',
	harga_pakan = '$harga_pakan',
	berat_pakan = '$berat_pakan',
	jumlah_pakan = '$jumlah_pakan' WHERE id_pakan = '$id_pakan' ");

	echo "<script>alert('Data Pakan Di Ubah')</script>";
	echo "<script>location='index.php?page=pakan'</script>";
}


 ?>