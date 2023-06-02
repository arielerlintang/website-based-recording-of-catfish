<?php 
$id_penjualan = $_GET["id"];

// menampilkan data pembelian yang id_pembelian dari url

$ambil_penjualan = $koneksi->query("SELECT * FROM penjualan LEFT JOIN produk ON produk.id_produk = penjualan.id_produk WHERE id_penjualan = '$id_penjualan' ");
$penjualan = $ambil_penjualan->fetch_assoc();
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
						<td><?php echo strtoupper($penjualan["nama_produk"]); ?></td>
					</tr>
					<tr>
						<th>Harga</th>
						<td><?php echo number_format($penjualan["harga_produk"]); ?></td>
					</tr>
					<tr>
						<th>Stok</th>
						<td><?php echo number_format($penjualan["stok_produk"]); ?></td>
					</tr>
					<tr>
						<th>Berat</th>
						<td><?php echo number_format($penjualan["berat_produk"]); ?></td>
					</tr>
					<tr>
						<th>Deskripsi</th>
						<td><?php echo $penjualan["deskripsi_produk"]; ?></td>
					</tr>
				</thead>
			</table>
		</div>
		<div class="col-md-6 offset-md-1 shadow rounded bg-white p-5 my-5">
			<p>Detail Penjualan</p>
			<table class="table table-bordered">
				<thead>
					<th>Tanggal</th>
					<th>Jumlah</th>
					<th>Nominal</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo date("d M Y", strtotime($penjualan["tanggal_penjualan"])); ?></td>
						<td><?php echo number_format($penjualan["jumlah_penjualan"]); ?></td>
						<td><?php echo number_format($penjualan["nominal_penjualan"]); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>