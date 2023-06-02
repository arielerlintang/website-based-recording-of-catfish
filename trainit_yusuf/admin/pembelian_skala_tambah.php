<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow bg-white p-5 card">
			<h6>Tambah</h6>
			<form method="post">
				<div class="mb-3">
					<label>Kategori</label>
					<select class="form-control" name="kategori">
						<option class="text-muted" value="">pilih kategori</option>
						<option value="pakan">Pakan</option>
						<option value="kolam">Kolam</option>
					</select>
				</div>
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="mb-3">
					<label>Deskripsi</label>
					<textarea class="form-control" name="deskripsi"></textarea>
				</div>
				<button name="tambah" class="btn btn-primary" name="tambah">Tambah</button>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["tambah"]))
{
	$kategori = $_POST["kategori"];
	$nama = $_POST["nama"];
	$deskripsi = $_POST["deskripsi"];

	if ($kategori=="pakan")
	{
		$koneksi->query("INSERT INTO pakan (nama_pakan) VALUES ('$nama')");

		$id_pakan_sebelumnya = $koneksi->insert_id;

		$koneksi->query("INSERT INTO pembelian_skala (id_pakan,id_kolam,nama,deskripsi) VALUES ('$id_pakan_sebelumnya','0','$nama','$deskripsi')");

		echo "<script>alert('Berhasil')</script>";
		echo "<script>location='index.php?page=pembelian_skala'</script>";
	}
	elseif ($kategori=="kolam") {
		
		$koneksi->query("INSERT INTO kolam (nama_kolam) VALUES ('$nama')");
		$id_kolam_sebelumnya = $koneksi->insert_id;
		$koneksi->query("INSERT INTO pembelian_skala (id_pakan,id_kolam,nama,deskripsi) VALUES ('0','$id_kolam_sebelumnya','$nama','$deskripsi')");

		echo "<script>alert('Berhasil')</script>";
		echo "<script>location='index.php?page=pembelian_skala'</script>";

	}
	else
	{
		echo "<script>alert('Silahkan Isi Kategori')</script>";
			echo "<script>location='index.php?page=pembelian_skala'</script>";
	}
}
?>