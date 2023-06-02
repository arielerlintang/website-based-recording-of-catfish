<?php 
$id_peremajaan = $_GET["id"];
$ambil_peremajaan = $koneksi->query("SELECT * FROM peremajaan LEFT JOIN produk ON produk.id_produk = peremajaan.id_produk LEFT JOIN pakan ON pakan.id_pakan = peremajaan.id_pakan LEFT JOIN kolam ON kolam.id_kolam = peremajaan.id_kolam WHERE id_peremajaan = '$id_peremajaan' ");
$peremajaan = $ambil_peremajaan->fetch_assoc();
// echo "<pre>";
// print_r ($peremajaan);
// echo "</pre>";

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-5 shadow rounded bg-white p-5 my-5">
			<p>Produk</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nama</th>
						<td><?php echo $peremajaan["nama_produk"]; ?></td>
					</tr>
					<tr>
						<th>Harga</th>
						<td><?php echo $peremajaan["harga_produk"]; ?></td>
					</tr>
					<tr>
						<th>Berat</th>
						<td><?php echo $peremajaan["berat_produk"]; ?></td>
					</tr>
					<tr>
						<th>Stok</th>
						<td><?php echo $peremajaan["stok_produk"]; ?></td>
					</tr>
				</thead>
			</table>
		</div>
		<div class="col-md-6 offset-md-1 shadow rounded bg-white p-5 my-5">
			<p>Pakan</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nama</th>
						<td><?php echo $peremajaan["nama_pakan"]; ?></td>
					</tr>
					<tr>
						<th>Harga</th>
						<td><?php echo $peremajaan["harga_pakan"]; ?></td>
					</tr>
					<tr>
						<th>Berat</th>
						<td><?php echo $peremajaan["berat_pakan"]; ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td><?php echo $peremajaan["jumlah_pakan"]; ?></td>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 shadow rounded bg-white p-5 my-3">
			<p>Kolam</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nama</th>
						<td><?php echo $peremajaan["nama_kolam"]; ?></td>
					</tr>
					<tr>
						<th>Lebar</th>
						<td><?php echo $peremajaan["lebar_kolam"]; ?></td>
					</tr>
				</thead>
			</table>
		</div>

		<div class="col-md-6 offset-md-1 shadow rounded bg-white p-5 my-3">
			<p>Kolam</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Jumlah Ikan</th>
						<td><?php echo $peremajaan["jumlah_produk"]; ?></td>
					</tr>
					<tr>
						<th>Tanggal Mulai</th>
						<td><?php echo $peremajaan["tanggal_mulai_peremajaan"]; ?></td>
					</tr>
					<tr>
						<th>Tanggal Selesai</th>
						<td><?php echo $peremajaan["tanggal_selesai_peremajaan"]; ?></td>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>