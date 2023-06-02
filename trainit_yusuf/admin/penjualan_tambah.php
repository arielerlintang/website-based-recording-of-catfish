
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
		
		<div class="col-md-5 shadow rounded bg-white p-5 my-4 border-top border-primary border-5">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Harga / Kg</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produk as $key => $value): ?>
						
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_produk"]; ?></td>
							<td><?php echo number_format($value["harga_produk"]); ?>/Kg</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-6 offset-md-1 shadow bg-white rounded p-5 my-5 border-top border-primary border-5">
			<p>Penjualan Tambah</p>
			<form method="post">
				<div class="mb-3">
					<label>Produk</label>
					<select class="form-control" name="id_produk">

						<option class="text-muted">--pilih produk--</option>
						
						<?php foreach ($produk as $key => $value): ?>
							<option value="<?php echo $value['id_produk'] ?>"><?php echo $value["nama_produk"] ?></option>
						<?php endforeach ?>
					</select>

				</div>
				<div class="mb-3">
					<label>Tanggal</label>
					<input type="date" name="tanggal_penjualan" class="form-control">
				</div>
				<div class="mb-3">
					<label>Jumlah</label>
					<input type="number" name="jumlah_penjualan" class="form-control">
				</div>

				<div class="mb-3">
					<label>Nominal</label>
					<input type="number" name="nominal_penjualan" class="form-control" value="">
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
	$tanggal_penjualan = $_POST["tanggal_penjualan"];
	$jumlah_penjualan = $_POST["jumlah_penjualan"];
	$nominal_penjualan = $_POST["nominal_penjualan"];

	$koneksi->query("INSERT INTO penjualan (id_produk,tanggal_penjualan,jumlah_penjualan,nominal_penjualan) 
		VALUES ('$id_produk','$tanggal_penjualan','$jumlah_penjualan','$nominal_penjualan') ");

	$ambil_p = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
	$detail_p = $ambil_p->fetch_assoc();
	$stok_produk = $detail_p["stok_produk"];

	$total = $stok_produk-$jumlah_penjualan;

	$koneksi->query("UPDATE produk SET stok_produk = '$total' WHERE id_produk = '$id_produk' ");

	echo "<script>alert('Data Penjualan Berhasil Tambah')</script>";
	echo "<script>location='index.php?page=penjualan'</script>";
}

?>