
<?php 
$id_penjualan = $_GET["id"];

// menampilkan data pembelian yang id_pembelian dari url

$ambil_penjualan = $koneksi->query("SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan' ");
$penjualan = $ambil_penjualan->fetch_assoc();


$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk");
while($tiap = $ambil->fetch_assoc())
{
	$produk[] = $tiap;
}
// echo "<pre>";
// print_r ($produk);
// echo "</pre>";

// echo "<pre>";
// print_r ($pembelian);
// echo "</pre>";


?>
<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow bg-white rounded p-5 my-5 border-top border-primary border-5">
			<p>Penjualan Ubah</p>
			<form method="post">
				<div class="mb-3">
					<label>Produk</label>
					<select class="form-control" name="id_produk">

						<option class="text-muted">--pilih produk--</option>
						
						<?php foreach ($produk as $key => $value): ?>
							<option value="<?php echo $value['id_produk'] ?>"    <?php 
                                if ($value["id_produk"]==$penjualan["id_produk"]) {
                                 echo "selected";
                                }
							 ?>><?php echo $value["nama_produk"] ?></option>
						<?php endforeach ?>
					</select>

				</div>
				<div class="mb-3">
					<label>Tanggal</label>
					<input type="date" name="tanggal_penjualan" class="form-control" value="<?php echo $penjualan['tanggal_penjualan']; ?>">
				</div>
				<div class="mb-3">
					<label>Jumlah</label>
					<input type="number" name="jumlah_penjualan" class="form-control" value="<?php echo $penjualan['jumlah_penjualan']; ?>">
				</div>
				<div class="mb-3">
					<label>Nominal</label>
					<input type="number" name="nominal_penjualan" class="form-control" value="<?php echo $penjualan['nominal_penjualan']; ?>">
				</div>
				<button class="btn btn-primary" name="ubah" type="submit">Ubah</button>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["ubah"]))
 {
	$id_produk = $_POST["id_produk"];
	$tanggal_penjualan = $_POST["tanggal_penjualan"];
	$jumlah_penjualan = $_POST["jumlah_penjualan"];
	$nominal_penjualan = $_POST["nominal_penjualan"];

	$koneksi->query("UPDATE penjualan SET id_produk = '$id_produk',
	tanggal_penjualan = '$tanggal_penjualan',
	jumlah_penjualan = '$jumlah_penjualan',
	nominal_penjualan = '$nominal_penjualan' WHERE id_penjualan = '$id_penjualan' ");

	echo "<script>alert('Data Penjualan Berhasil Ubah')</script>";
	echo "<script>location='index.php?page=penjualan'</script>";
}

 ?>