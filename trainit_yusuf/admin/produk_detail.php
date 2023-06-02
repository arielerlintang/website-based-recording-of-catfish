<?php 
$id_produk = $_GET["id"];

// menampilkan data pembelian yang id_pembelian dari url

$ambil_produk = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
$produk = $ambil_produk->fetch_assoc();
// echo "<pre>";
// print_r ($penjualan);
// echo "</pre>";


 ?>
<div class="container">
	<div class="row">
		<div class="col-md-5 shadow rounded bg-white p-5 my-5">
			<p>Detail Produk</p>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nama</th>
						<td><?php echo strtoupper($produk["nama_produk"]); ?></td>
					</tr>
					<tr>
						<th>Harga</th>
						<td><?php echo number_format($produk["harga_produk"]); ?></td>
					</tr>
					<tr>
						<th>Stok</th>
						<td><?php echo number_format($produk["stok_produk"]); ?></td>
					</tr>
					<tr>
						<th>Berat</th>
						<td><?php echo number_format($produk["berat_produk"]); ?></td>
					</tr>
					<tr>
						<th>Deskripsi</th>
						<td><?php echo $produk["deskripsi_produk"]; ?></td>
					</tr>
				</thead>
			</table>
		</div>
		<div class="col-md-6 offset-md-1 shadow rounded bg-white p-5 my-5">
			<p>Foto</p>
			<div class="text-center">
				<img src="../assets/foto_produk/<?php echo $produk["foto_produk"]; ?>" width="200">
			</div>
			
		</div>
	</div>

</div>