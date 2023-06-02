<?php 
$id_pembelian = $_GET["id"];

// menampilkan data pembelian yang id_pembelian dari url

$ambil_pembelian = $koneksi->query("SELECT * FROM pembelian LEFT JOIN produk ON produk.id_produk = pembelian.id_produk WHERE id_pembelian = '$id_pembelian' ");
$pembelian = $ambil_pembelian->fetch_assoc();
// echo "<pre>";
// print_r ($pembelian);
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
						<td><?php echo strtoupper($pembelian["nama_produk"]); ?></td>
					</tr>
					<tr>
						<th>Harga</th>
						<td><?php echo number_format($pembelian["harga_produk"]); ?></td>
					</tr>
					<tr>
						<th>Stok</th>
						<td><?php echo number_format($pembelian["stok_produk"]); ?></td>
					</tr>
					<tr>
						<th>Berat</th>
						<td><?php echo number_format($pembelian["berat_produk"]); ?></td>
					</tr>
					<tr>
						<th>Deskripsi</th>
						<td><?php echo $pembelian["deskripsi_produk"]; ?></td>
					</tr>
				</thead>
			</table>
		</div>
		<div class="col-md-6 offset-md-1 shadow rounded bg-white p-5 my-5">
			<p>Detail Pembelian</p>
			<table class="table table-bordered">
				<thead>
					<th>Tanggal</th>
					<th>Jumlah</th>
					<th>Nominal</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo date("d M Y", strtotime($pembelian["tanggal_pembelian"])); ?></td>
						<td><?php echo number_format($pembelian["jumlah_pembelian"]); ?></td>
						<td><?php echo number_format($pembelian["nominal_pembelian"]); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>