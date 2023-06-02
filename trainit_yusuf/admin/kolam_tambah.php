<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow rounded bg-white p-5 my-5 border-top border-primary border-5">
			<p>Tambah Kolam :</p>
			<form method="post">
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_kolam" class="form-control">
				</div>
				<div class="mb-3">
					<label>Lebar</label>
					<input type="text" name="lebar_kolam" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
			</form>
		</div>
	</div>
</div>
<?php 

if (isset($_POST["tambah"])) 
{
	$nama_kolam = $_POST["nama_kolam"];
	$lebar_kolam = $_POST["lebar_kolam"];

	$koneksi->query("INSERT INTO kolam (nama_kolam,lebar_kolam) 
		VALUES ('$nama_kolam','$lebar_kolam') ");

	echo "<script>alert('Data Kolam Di Tambahkan')</script>";
	echo "<script>location='index.php?page=kolam'</script>";
}


 ?>