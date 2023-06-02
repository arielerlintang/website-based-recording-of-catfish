<?php 
$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk");
while($tiap = $ambil->fetch_assoc())
{
	$produk[] = $tiap;
}

// echo "<pre>";
// print_r ($produk);
// echo "</pre>";


?>
<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow bg-white rounded p-5 my-5">
			<p>Pembelian Tambah</p>
			<form method="post">
				<div class="mb-3">
					<label>Produk</label>
					<select class="form-control" name="id_produk">

						<option class="text-muted">--pilih produk--</option>
						
						<?php foreach ($produk as $key => $value): ?>
							<option value="<?php echo $value['id_produk']; ?>"><?php
							 echo $value["nama_produk"] ?></option>
						<?php endforeach ?>
					</select>

				</div>
				<div class="mb-3">
					<label>Tanggal</label>
					<input type="date" name="tanggal_pembelian" class="form-control">
				</div>
				<div class="mb-3">
					<label>Jumlah</label>
					<input type="number" name="jumlah_pembelian" class="form-control">
				</div>
				<div class="mb-3">
					<label>Nominal</label>
					<input type="number" name="nominal_pembelian" class="form-control">
				</div>
				<button class="btn btn-primary" name="tambah" type="submit">Tambah</button>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["tambah"]))
 {
	$id_produk = $_POST["id_produk"];
	$tanggal_pembelian = $_POST["tanggal_pembelian"];
	$jumlah_pembelian = $_POST["jumlah_pembelian"];
	$nominal_pembelian = $_POST["nominal_pembelian"];



	$koneksi->query("INSERT INTO pembelian (id_produk,tanggal_pembelian,jumlah_pembelian,nominal_pembelian) 
		VALUES ('$id_produk','$tanggal_pembelian','$jumlah_pembelian','$nominal_pembelian') ");

	$ambil_p = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
	$detail_p = $ambil_p->fetch_assoc();
	 $stok_produk = $detail_p["stok_produk"];

	  $total_stok = $stok_produk+$jumlah_pembelian;

	  $koneksi->query("UPDATE produk SET stok_produk = '$total_stok' WHERE id_produk = '$id_produk'  ");

	echo "<script>alert('Data Pembelian Berhasil Tambah')</script>";
	echo "<script>location='index.php?page=pembelian'</script>";
}

 ?>