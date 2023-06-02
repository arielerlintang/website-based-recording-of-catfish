<?php 

$id_kolam = $_GET["id"];
$ambil_kolam = $koneksi->query("SELECT * FROM kolam WHERE id_kolam = '$id_kolam' ");
$kolam = $ambil_kolam->fetch_assoc();

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow rounded bg-white p-5 my-5 border-top border-primary border-5">
			<p>Ubah Kolam :</p>
			<form method="post">
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_kolam" class="form-control" value="<?php echo $kolam['nama_kolam']; ?>">
				</div>
				<div class="mb-3">
					<label>Lebar</label>
					<input type="text" name="lebar_kolam" class="form-control" value="<?php echo $kolam['lebar_kolam']; ?>">
				</div>
				<button type="submit" class="btn btn-primary" name="ubah">UBAH</button>
			</form>
		</div>
	</div>
</div>
<?php 

if (isset($_POST["ubah"]))
 {
	$nama_kolam = $_POST["nama_kolam"];
	$lebar_kolam = $_POST["lebar_kolam"];

	$koneksi->query("UPDATE kolam SET nama_kolam = '$nama_kolam',
	lebar_kolam = '$lebar_kolam' WHERE id_kolam = '$id_kolam' ");

	echo "<script>alert('Data Kolam Di Ubah')</script>";
	echo "<script>location='index.php?page=kolam'</script>";
}

 ?>