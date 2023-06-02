
<?php 
$id_pembelian = $_GET["id"];

// menampilkan data pembelian yang id_pembelian dari url

$ambil_pembelian = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian' ");
$pembelian = $ambil_pembelian->fetch_assoc();
$jumlah_pembelian_sebelumnya = $pembelian["jumlah_pembelian"];


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
		<div class="col-md-7 offset-md-2 shadow bg-white rounded p-5 my-5">
			<p>Pembelian Ubah</p>
			<form method="post">
				<div class="mb-3">
					<label>Produk</label>
					<select class="form-control" name="id_produk">

						<option class="text-muted">--pilih produk--</option>
						
						<?php foreach ($produk as $key => $value): ?>
							<option value="<?php echo $value['id_produk'] ?>"    <?php 
                                if ($value["id_produk"]==$pembelian["id_produk"]) {
                                 echo "selected";
                                }
							 ?>><?php echo $value["nama_produk"] ?></option>
						<?php endforeach ?>
					</select>

				</div>
				<div class="mb-3">
					<label>Tanggal</label>
					<input type="date" name="tanggal_pembelian" class="form-control" value="<?php echo $pembelian['tanggal_pembelian']; ?>">
				</div>
				<div class="mb-3">
					<label>Nominal</label>
					<input type="number" name="nominal_pembelian" class="form-control" value="<?php echo $pembelian['nominal_pembelian']; ?>">
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
	$tanggal_pembelian = $_POST["tanggal_pembelian"];
	$nominal_pembelian = $_POST["nominal_pembelian"];

	 $koneksi->query("UPDATE pembelian SET id_produk = '$id_produk',
	 tanggal_pembelian = '$tanggal_pembelian',
	 nominal_pembelian = '$nominal_pembelian' WHERE id_pembelian = '$id_pembelian' ");


	 echo "<script>alert('Data Pembelian Berhasil Ubah')</script>";
	 echo "<script>location='index.php?page=pembelian'</script>";
}

 ?>