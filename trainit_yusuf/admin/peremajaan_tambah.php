<?php 
$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk");
while($tiap = $ambil->fetch_assoc())
{
	$produk[] = $tiap;
}

$pakan = array();
$ambil = $koneksi->query("SELECT * FROM pakan");
while($tiap = $ambil->fetch_assoc())
{
	$pakan[] = $tiap;
}

$kolam = array();
$ambil = $koneksi->query("SELECT * FROM kolam");
while($tiap = $ambil->fetch_assoc())
{
	$kolam[] = $tiap;
}
// echo "<pre>";
// print_r ($produk);
// echo "</pre>";


?>
<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow rounded bg-white p-5 my-5 border-top border-primary border-5">
			<form method="post">
				<div class="mb-3">
					<label>Produk</label>
					<select class="form-control" name="id_produk">
						<option value="" class="text-muted">--pilih produk--</option>

						<?php foreach ($produk as $key => $value): ?>
							<option value="<?php echo $value["id_produk"] ?>"><?php echo $value["nama_produk"]; ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mb-3">
					<label>Pakan</label>
					<select name="id_pakan" class="form-control">
						<option value="" class="text-muted">--pilih pakan--</option>

						<?php foreach ($pakan as $key => $value): ?>
							<option value="<?php echo $value['id_pakan']; ?>"><?php echo $value["nama_pakan"]; ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mb-3">
					<label>Kolam</label>

					<select name="id_kolam" class="form-control">
						<option value="" class="text-muted">--pilih kolam--</option>

						<?php foreach ($kolam as $key => $value): ?>
							<option value="<?php echo $value['id_kolam']; ?>"><?php echo $value["nama_kolam"]; ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mb-3">
					<label>Jumlah Peremajaan</label>
					<input type="text" name="jumlah_produk" class="form-control">
				</div>

				<div class="mb-3">
					<label>Tanggal Mulai</label>
					<input type="date" name="tanggal_mulai_peremajaan" class="form-control">
				</div>

				<div class="mb-3">
					<label>Tanggal Selesai</label>
					<input type="date" name="tanggal_selesai_peremajaan" class="form-control">
				</div>

				<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["simpan"])) {
	
	$id_produk = $_POST["id_produk"];
	$id_kolam = $_POST["id_kolam"];
	$id_pakan = $_POST["id_pakan"];
	$jumlah_produk = $_POST["jumlah_produk"];
	$tanggal_mulai_peremajaan = $_POST["tanggal_mulai_peremajaan"];
	$tanggal_selesai_peremajaan = $_POST["tanggal_selesai_peremajaan"];

	$koneksi->query("INSERT INTO peremajaan (id_produk,id_kolam,id_pakan,jumlah_produk,status_peremajaan,tanggal_mulai_peremajaan,tanggal_selesai_peremajaan) 
		VALUES ('$id_produk','$id_kolam','$id_pakan','$jumlah_produk','belum siap dijual','$tanggal_mulai_peremajaan','$tanggal_selesai_peremajaan') ");

	echo "<script>alert('Data Peremajaan Berhasil Disimpan')</script>";
	echo "<script>location='index.php?page=peremajaan'</script>";
}


 ?>