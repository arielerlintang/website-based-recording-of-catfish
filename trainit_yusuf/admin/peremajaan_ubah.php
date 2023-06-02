<?php 
$id_peremajaan = $_GET["id"];
$ambil_peremajaan = $koneksi->query("SELECT * FROM peremajaan WHERE id_peremajaan = '$id_peremajaan' ");
$peremajaan = $ambil_peremajaan->fetch_assoc();
echo "<pre>";
print_r ($peremajaan);
echo "</pre>";

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
							<option value="<?php echo $value["id_produk"] ?>"  <?php if ($value['id_produk']==$peremajaan['id_produk']) {
								echo "selected";
							} ?>><?php echo $value["nama_produk"]; ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mb-3">
					<label>Pakan</label>
					<select name="id_pakan" class="form-control">
						<option value="" class="text-muted">--pilih pakan--</option>

						<?php foreach ($pakan as $key => $value): ?>
							<option value="<?php echo $value['id_pakan']; ?>"   <?php if ($value['id_pakan']==$peremajaan["id_pakan"]) {
								echo "selected";
							} ?>><?php echo $value["nama_pakan"]; ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mb-3">
					<label>Kolam</label>

					<select name="id_kolam" class="form-control">
						<option value="" class="text-muted">--pilih kolam--</option>

						<?php foreach ($kolam as $key => $value): ?>
							<option value="<?php echo $value['id_kolam']; ?>"  <?php if ($value["id_kolam"]==$peremajaan["id_kolam"]) {
								echo "selected";
							}
							 ?>><?php echo $value["nama_kolam"]; ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mb-3">
					<label>Jumlah Peremajaan</label>
					<input type="text" name="jumlah_produk" class="form-control" value="<?php echo $peremajaan['jumlah_produk']; ?>">
				</div>
				<!-- jika kondisi sama maka otomatis terseleksi ==  1 kondiis harus benar -->
				<div class="mb-3">
					<label>Status</label>
					<select class="form-control" name="status_peremajaan">
						<option class="text-muted">pilih status</option>
						<option value="belum siap dijual"   <?php 
						if ($peremajaan["status_peremajaan"]=="belum siap dijual") {
							echo "selected";
						}
						 ?>>Belum Siap Dijual</option>
						<option value="siap dijual"   <?php if ($peremajaan["status_peremajaan"]=="siap dijual") {
							echo "selected";
						} ?>>Siap Dijual</option>
					</select>
				</div>

				<div class="mb-3">
					<label>Tanggal Mulai</label>
					<input type="date" name="tanggal_mulai_peremajaan" class="form-control" value="<?php echo $peremajaan['tanggal_mulai_peremajaan']; ?>">
				</div>

				<div class="mb-3">
					<label>Tanggal Selesai</label>
					<input type="date" name="tanggal_selesai_peremajaan" class="form-control" value="<?php echo $peremajaan['tanggal_selesai_peremajaan'] ?>">
				</div>

				<button type="submit" name="edit" class="btn btn-primary">Edit</button>

			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["edit"])) {
	
	$id_produk = $_POST["id_produk"];
	$id_kolam = $_POST["id_kolam"];
	$id_pakan = $_POST["id_pakan"];
	$jumlah_produk = $_POST["jumlah_produk"];
	 $status_peremajaan = $_POST["status_peremajaan"];
	$tanggal_mulai_peremajaan = $_POST["tanggal_mulai_peremajaan"];
	$tanggal_selesai_peremajaan = $_POST["tanggal_selesai_peremajaan"];

	$koneksi->query("UPDATE peremajaan SET id_produk = '$id_produk',
	id_kolam = '$id_kolam',
	id_pakan = '$id_pakan',
	jumlah_produk = '$jumlah_produk',
	status_peremajaan = '$status_peremajaan',
	tanggal_mulai_peremajaan = '$tanggal_mulai_peremajaan',
	tanggal_selesai_peremajaan = '$tanggal_selesai_peremajaan' WHERE id_peremajaan = '$id_peremajaan' ");

	echo "<script>alert('Data Peremajaan Berhasil Disimpan')</script>";
	echo "<script>location='index.php?page=peremajaan'</script>";
}


 ?>